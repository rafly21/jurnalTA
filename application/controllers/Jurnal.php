<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jurnal extends CI_Controller {
	function __construct(){
	parent::__construct();
	$this->load->database();
	$this->load->model(['M_Jurnal','M_users']);
	$this->load->helper('url');
	$this->load->library('form_validation');
		if($this->session->userdata('permission')!="manajemen"){
	 		redirect ('cekpermission');
		}
	}
	public function index()
	{
		// $return = $this->M_Jurnal->tampil_data();
		$filter['portal'] = $this->input->get('portal') !== 'undefined' ? $this->input->get('portal') : null;
		$filter['akreditasi'] = $this->input->get('akreditasi') !== 'undefined' ? $this->input->get('akreditasi') : null;
		$filter['penerbit'] = $this->input->get('penerbit') !== 'undefined' ? $this->input->get('penerbit') : null;
		$filter['tahun_mulai'] = $this->input->get('tahun_mulai') !== 'undefined' ? $this->input->get('tahun_mulai') : null;
		$filter['blnterbit'] = $this->input->get('blnterbit') !== 'undefined' ? $this->input->get('blnterbit') : null;
		$filter['bahasa'] = $this->input->get('bahasa') !== 'undefined' ? $this->input->get('bahasa') : null;
		$filter['pengindeks'] = $this->input->get('pengindeks') !== 'undefined' ? $this->input->get('pengindeks') : null;
		$filter['DOI'] = $this->input->get('DOI') !== 'undefined' ? $this->input->get('DOI') : null;
		$filter['eissn'] = $this->input->get('eissn') !== 'undefined' ? $this->input->get('eissn') : null;
// var_dump($filter);
// die();
		if(!empty($_GET)) {
			$data['data'] = $this->M_Jurnal->tampil_data($filter);
		} else {
			$data['data'] = $this->M_Jurnal->tampil_data();
		}

		$data['portal'] = $this->M_Jurnal->getPortal();
		$data['fakultas'] = $this->M_Jurnal->getFakultas();
		$data['indeks'] = $this->M_Jurnal->getPengindeks();






    // $data['data2'] = $this->M_Jurnal->tampil_data2();
    // var_dump($data);
    // die;
		// echo json_encode($data);
		$this->load->view('manajemen/v_jurnal',$data);
	}

	function getGraphData($tahun) {
		$byLembaga = $this->M_Jurnal->countJurnalAkreditasiByLembaga($tahun);
		$byFakultas = $this->M_Jurnal->countJurnalAkreditasiByFakultas($tahun);
		$byDepartemen = $this->M_Jurnal->countJurnalAkreditasiByDepartemen($tahun);

		$total = 0;
		foreach ($byLembaga as $key => $value) {
				$total += intval($value->jumlah);
		}
		$data["gFakultas"][0]["label"] = "Puslit/lembaga";
		$data["gFakultas"][0]["value"] = $total;

		foreach ($byDepartemen as $key => $value) {
				$namaFakultas = $this->M_Jurnal->getFakultas($value->fakultas)[0]->nama_fak;
				$fakultas["label"] = $namaFakultas;
				$fakultas["value"] = intval($value->jumlah);
				$data["gFakultas"][$value->fakultas] = $fakultas;
		}

		foreach ($byFakultas as $key => $value) {
				$namaFakultas = $this->M_Jurnal->getFakultas($value->fakultas)[0]->nama_fak;
				if(isset($data["gFakultas"][$value->fakultas])) {
						$data["gFakultas"][$value->fakultas]["value"] += $value->jumlah;
				} else {
					$fakultas["label"] = $namaFakultas;
					$fakultas["value"] = intval($value->jumlah);
					$data["gFakultas"][$value->fakultas] = $fakultas;
				}
		}

		$result = array();
		$colors = ["#0058B2", "#B21C12", "#E6FF19", "#8812B2", "#14CC7E", "#00C0CC", "#998C3D", "#FF5800", "#400300", "#B4BCE5", "#E5AB63", "#FF1C00", "#FFA593", "#B8E886"];
		foreach ($data["gFakultas"] as $key => $value) {
				$value = (object)$value;
				$value->color = $colors[$key];
				$value->highlight = $colors[$key];
				array_push($result, $value);
		}

		return json_encode($result);
	}

	public function grafikJurnal(){
		// $data['res'] = $this->M_Jurnal->getJurnalAkreditasi();

		// var_dump($data['graphData']);
		// die;

		// $data['res'] = array();
		// foreach ($jurnals as $key => $jurnal) {
		// 		$penerbit = $this->M_Jurnal->getPenerbitJurnal($jurnal->id_jurnal);
		// 		array_push($data["res"], $push);
		// }
		// $data['res'] = $this->M_Jurnal->getFakultasPenerbit();

		$data["graphData"] = $this->getGraphData(date('Y'));
		$data["graphData2"] = $this->getGraphData(date('Y')-1);

		$this->load->view('manajemen/grafik', $data);

	}
	public function submitJurnal(){
		$this->form_validation->set_rules('judul', 'Judul Jurnal', 'required');
		$this->form_validation->set_rules('nomorjurnal', 'Nomor Jurnal', 'required|numeric');
		$this->form_validation->set_rules('portal', 'Portal', 'required|callback_validate_portal');
		$this->form_validation->set_rules('urlportal', 'URL', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required|callback_validate_penerbit');
		$this->form_validation->set_rules('id_penerbit', 'Penerbit', 'required|callback_validate_idpenerbit');
		// $this->form_validation->set_rules('sponsor', 'Sponsor', 'required');
		$this->form_validation->set_rules('pengelola', 'Pengelola', 'required|callback_validate_pengelola');
		$this->form_validation->set_rules('singkatan', 'Singkatan', 'required');
		// $this->form_validation->set_rules('pissn', 'P-Issn', 'required');
		// $this->form_validation->set_rules('eissn', 'E-Issn', 'required');
		$this->form_validation->set_rules('english', 'English', 'required');
		$this->form_validation->set_rules('mpgundip', 'MpgUndip', 'required');
		// $this->form_validation->set_rules('doi', 'DOI', 'required');
		$this->form_validation->set_rules('thnmulai', 'Tahun Mulai', 'required|numeric|exact_length[4]');
		$this->form_validation->set_rules('blnterbit[]', 'Bulan Terbit', 'required');
		$this->form_validation->set_rules('terbitakhir', 'Terbit Terakhir', 'required|numeric|exact_length[4]');
		$this->form_validation->set_rules('noterakhir', 'Jumlah Nomor Terakhir', 'required|numeric');
		// $this->form_validation->set_rules('pengindeks[]', 'Pengindeks', 'required');
		$this->form_validation->set_rules('akreditasi', 'Terakreditasi', 'required');
		// $this->form_validation->set_rules('mulaisk', 'Tanggal Mulai SK', 'required');
		// $this->form_validation->set_rules('tetapsk', 'Tanggal Penetapan SK', 'required');
		// $this->form_validation->set_rules('akhirsk', 'Tanggal Berakhir SK', 'required');
		// if($this->input->post('portal') === 0) {
		// 	$this->form_validation->set_message('portal', 'Portal mohon diisi');
		// }


		if(!empty($this->input->post('sk'))) {
			$this->form_validation->set_rules('sk', 'SK Akreditasi', 'required');
		}
		if(!empty($this->input->post('peringkatsinta'))) {
			$this->form_validation->set_rules('peringkatsinta', 'Peringkat SINTA', 'required|alpha_numeric');
		}
		$this->form_validation->set_rules('urlsinta', 'URL SINTA', 'valid_url');
		if ($this->form_validation->run() == FALSE)
		{
			$this->add_jurnal();
		}
		else
		{
			// var_dump($this->M_Jurnal->getJenisPenerbit());
			// die();
			$dataJurnal = array(
				'no_jurnal' => $this->input->post('nomorjurnal'),
				'id_pengelola' => $this->input->post('pengelola'),
				'judul' => $this->input->post('judul'),
				'singkatan' => $this->input->post('singkatan'),
				'sponsor' => $this->input->post('sponsor'),
				'e_issn' => $this->input->post('eissn'),
				'p_issn' => $this->input->post('pissn'),
				'english' => $this->input->post('english'),
				'thn_mulai' => $this->input->post('thnmulai'),
				'no_terakhir' => $this->input->post('noterakhir'),
				'terbit_terakhir' => $this->input->post('terbitakhir'),
				'doi' => $this->input->post('doi'),
				'mpgundip' => $this->input->post('mpgundip'),
				'id_portal' => $this->input->post('portal'),
				'url' => $this->input->post('urlportal'),
				'url_sinta' => $this->input->post('urlsinta'),
			);
			$result = false;
			if(!empty($this->input->post('peringkatsinta'))) {
				$dataJurnal['peringkat_sinta'] = $this->input->post('peringkatsinta');
			}
			$id_jurnal = $this->M_Jurnal->add_jurnal($dataJurnal, true);
			if($id_jurnal !== null) {
				$bulan_terbit = $this->input->post('blnterbit');
				foreach ($bulan_terbit as $key => $value) {
					$dataPenerbitan = array(
						'id_jurnal' => $id_jurnal,
						'bulan_terbit' => $bulan_terbit[$key]
					);
					$result = $this->M_Jurnal->add_penerbitan($dataPenerbitan);
				}

				$dataPenerbit = array(
					'id_jurnal' => $id_jurnal,
					'jenis_penerbit' => $this->input->post('penerbit'),
					'id_jenis' => $this->input->post('id_penerbit')
				);
				$result .= $this->M_Jurnal->add_penerbit($dataPenerbit);

				$pengindeks = $this->input->post('pengindeks');
				$url_pengindeks = $this->input->post('url_pengindeks');
				foreach ($pengindeks as $key => $value) {
					$name = strtolower(str_replace(' ', '_', $this->M_Jurnal->getPengindeksName($value)->nama));
					$dataPengindeks = array(
						'id_jurnal' => $id_jurnal,
						'id_pengindeks' => $value,
						'url_pengindeks' => $url_pengindeks[$name],
					);
					$result .= $this->M_Jurnal->add_pengindeks($dataPengindeks);
				}

				$is_akreditasi = $this->input->post('akreditasi');
				if($is_akreditasi === "true") {
					$dataSK = array(
						'id_jurnal' => $id_jurnal,
						'id_sk' => $this->input->post('sk'),
					);
					$result .= $this->M_Jurnal->addSkJurnal($dataSK);
				}
			}
			if ($result) {
					$this->session->set_flashdata('success_msg', 'jurnal berhasil ditambahkan');
			} else {
					$this->session->set_flashdata('error_msg', 'Gagal menambah jurnal. Silahkan coba lagi atau hubungi administrator');
			}

			redirect('jurnal');
		}
	}

	public function add_jurnal()
 	{
		 // $id = $this->uri->segment(3);
		 // $this->load->model('M_users');
		 // // edit ini cok, atas model dept, bawah karyawan
		 $data['pengelola']   = $this->M_users->get_pengelola();
		 $data['pengindeks']  = $this->M_Jurnal->getPengindeks();
		 $data['portal']	  = $this->M_Jurnal->getPortal();
		 $data['sk']		  = $this->M_Jurnal->tampil_sk();
		 // $data['record']=  $this->M_users->get_one($id)->row_array();
		 $this->load->view('manajemen/v_add_jurnal',$data);
 	}
	public function edit_jurnal($id)
	{
		$data['jurnal'] = $this->M_Jurnal->getJurnalById($id);
		$data['pengelola']   = $this->M_users->get_pengelola();
		$data['pengindeks']  = $this->M_Jurnal->getPengindeks();
		$data['portal']	  = $this->M_Jurnal->getPortal();
		$data['sk']		  = $this->M_Jurnal->tampil_sk();
		$data['penerbit'] = $this->M_Jurnal->getPenerbitJurnal($id);
		$data['jurnal_pengindeks']= $this->M_Jurnal->getJurnalPengindeks($id);
		$data['jurnal_pengindeks_id']= $this->M_Jurnal->getJurnalPengindeks($id, true);
		// $detail = $this->M_Jurnal->detail_data($a->id_jurnal);
		$data['bulan_terbit'] = $this->M_Jurnal->getIdBulanTerbit($id);
		$data['skJurnal'] = $this->M_Jurnal->getSkJurnal($id);
		 // var_dump($data['pengelola']);
		// die();
		$this->load->view('manajemen/v_edit_jurnal', $data);
	}

	public function update_jurnal($id)
	{
		$this->form_validation->set_rules('judul', 'Judul Jurnal', 'required');
		$this->form_validation->set_rules('nomorjurnal', 'Nomor Jurnal', 'required|numeric');
		$this->form_validation->set_rules('portal', 'Portal', 'required|callback_validate_portal');
		$this->form_validation->set_rules('urlportal', 'URL', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required|callback_validate_penerbit');
		$this->form_validation->set_rules('id_penerbit', 'Penerbit', 'required|callback_validate_idpenerbit');
		// $this->form_validation->set_rules('sponsor', 'Sponsor', 'required');
		$this->form_validation->set_rules('pengelola', 'Pengelola', 'required|callback_validate_pengelola');
		$this->form_validation->set_rules('singkatan', 'Singkatan', 'required');
		// $this->form_validation->set_rules('pissn', 'P-Issn', 'required');
		// $this->form_validation->set_rules('eissn', 'E-Issn', 'required');
		$this->form_validation->set_rules('english', 'English', 'required');
		$this->form_validation->set_rules('mpgundip', 'MpgUndip', 'required');
		// $this->form_validation->set_rules('doi', 'DOI', 'required');
		$this->form_validation->set_rules('thnmulai', 'Tahun Mulai', 'required|numeric|exact_length[4]');
		$this->form_validation->set_rules('blnterbit[]', 'Bulan Terbit', 'required');
		$this->form_validation->set_rules('terbitakhir', 'Terbit Terakhir', 'required|numeric|exact_length[4]');
		$this->form_validation->set_rules('noterakhir', 'Jumlah Nomor Terakhir', 'required|numeric');
		// $this->form_validation->set_rules('pengindeks[]', 'Pengindeks', 'required');
		$this->form_validation->set_rules('akreditasi', 'Terakreditasi', 'required');
		// $this->form_validation->set_rules('mulaisk', 'Tanggal Mulai SK', 'required');
		// $this->form_validation->set_rules('tetapsk', 'Tanggal Penetapan SK', 'required');
		// $this->form_validation->set_rules('akhirsk', 'Tanggal Berakhir SK', 'required');
		// if($this->input->post('portal') === 0) {
		// 	$this->form_validation->set_message('portal', 'Portal mohon diisi');
		// }


		if(!empty($this->input->post('sk'))) {
			$this->form_validation->set_rules('sk', 'SK Akreditasi', 'required');
		}
		if(!empty($this->input->post('peringkatsinta'))) {
			$this->form_validation->set_rules('peringkatsinta', 'Peringkat SINTA', 'required|alpha_numeric');
		}
		$this->form_validation->set_rules('urlsinta', 'URL SINTA', 'valid_url');
		if ($this->form_validation->run() == FALSE)
		{
			$this->edit_jurnal($id);
		} else
		{
			// var_dump($this->M_Jurnal->getJenisPenerbit());
			// die();
			$dataJurnal = array(
				'no_jurnal' => $this->input->post('nomorjurnal'),
				'id_pengelola' => $this->input->post('pengelola'),
				'judul' => $this->input->post('judul'),
				'singkatan' => $this->input->post('singkatan'),
				'sponsor' => $this->input->post('sponsor'),
				'e_issn' => $this->input->post('eissn'),
				'p_issn' => $this->input->post('pissn'),
				'english' => $this->input->post('english'),
				'thn_mulai' => $this->input->post('thnmulai'),
				'no_terakhir' => $this->input->post('noterakhir'),
				'terbit_terakhir' => $this->input->post('terbitakhir'),
				'doi' => $this->input->post('doi'),
				'mpgundip' => $this->input->post('mpgundip'),
				'id_portal' => $this->input->post('portal'),
				'url' => $this->input->post('urlportal'),
				'url_sinta' => $this->input->post('urlsinta'),
			);

			$result = false;

			if(!empty($this->input->post('peringkatsinta'))) {
				$dataJurnal['peringkat_sinta'] = $this->input->post('peringkatsinta');
			}
			$bulan_terbit = $this->input->post('blnterbit');
			// var_dump($bulan_terbit);
			// die();
			// var_dump($dataJurnal);
			// die();
			$result =	$this->M_Jurnal->update_jurnal($dataJurnal,$id);
			// if($id_jurnal) {
				// var_dump('jurnal updated');
				// die();
				// $bulan_terbit = $this->input->post('blnterbit');
				// var_dump($bulan_terbit);
				// die();
				if(isset($bulan_terbit)) {

						$this->M_Jurnal->deletePenerbitanJurnal($id);
					foreach ($bulan_terbit as $key => $value) {
						$dataPenerbitan = array(
							'id_jurnal' => $id,
							'bulan_terbit' => $bulan_terbit[$key]
						);
							$result .= $this->M_Jurnal->add_penerbitan($dataPenerbitan);
					}
				}

				// die();

				$dataPenerbit = array(
					'jenis_penerbit' => $this->input->post('penerbit'),
					'id_jenis' => $this->input->post('id_penerbit')
				);
				// var_dump($dataPenerbit);
				// die();
				$result .=	$this->M_Jurnal->update_penerbit($dataPenerbit,'id_jurnal',$id);

				$pengindeks = $this->input->post('pengindeks');
				$url_pengindeks = $this->input->post('url_pengindeks');
				if(isset($pengindeks) && isset($url_pengindeks)) {
					$this->M_Jurnal->deleteJurnalPengindeks($id);
					foreach ($pengindeks as $key => $value) {
						$name = strtolower(str_replace(' ', '_', $this->M_Jurnal->getPengindeksName($value)->nama));
						$dataPengindeks = array(
							'id_jurnal' => $id,
							'id_pengindeks' => $value,
							'url_pengindeks' => $url_pengindeks[$name],
						);
					$result .=		$this->M_Jurnal->add_pengindeks($dataPengindeks);
					}
				}
				else {
					$this->M_Jurnal->deleteJurnalPengindeks($id);
				}
				// var_dump($dataPengindeks);
				// die();
				$is_akreditasi = $this->input->post('akreditasi');
				if($is_akreditasi === "true") {
					$skjr = $this->M_Jurnal->getSkJurnal($id);
					$dataSK = array(
						'id_sk' => $this->input->post('sk'),
					);
					$result .=	$this->M_Jurnal->updateSkJurnal($dataSK,'id_sk_jurnal',$skjr->id_sk_jurnal);
				} else {
					$skjr = $this->M_Jurnal->getSkJurnal($id);
					if(!empty($skjr)) {
						$result .=	$this->M_Jurnal->deleteSKJurnal($id);
					}
				}

				if ($result) {
						$this->session->set_flashdata('success_msg', 'jurnal berhasil diedit');
				} else {
						$this->session->set_flashdata('error_msg', 'Gagal edit jurnal. Silahkan coba lagi atau hubungi administrator');
				}

			redirect('jurnal');
		}

	}

	public function delete_jurnal ($id)
	{
		$result =$this->M_Jurnal->delete_jurnal($id);

		if ($result) {
				$this->session->set_flashdata('success_msg', 'jurnal berhasil dihapus');
		} else {
				$this->session->set_flashdata('error_msg', 'Gagal menghapus jurnal. Silahkan coba lagi atau hubungi administrator');
		}

		redirect('jurnal');


	}


	public function validate_portal($portal) {
		if($portal === "0") {
			$this->form_validation->set_message('validate_portal', 'Mohon isi kolom portal');
			return false;
		} else {
			return true;
		}
	}

	public function validate_penerbit($penerbit) {
		if($penerbit === "kosong") {
			$this->form_validation->set_message('validate_penerbit', 'Mohon isi kolom penerbit');
			return false;
		} else {
			return true;
		}
	}

	public function validate_idpenerbit($idpenerbit) {
		if($idpenerbit === "0") {
			$this->form_validation->set_message('validate_idpenerbit', 'Mohon isi kolom penerbit');
			return false;
		} else {
			return true;
		}
	}

	public function validate_pengelola($pengelola) {
		if($pengelola === "0") {
			$this->form_validation->set_message('validate_pengelola', 'Mohon isi kolom pengelola');
			return false;
		} else {
			return true;
		}
	}
	public function riwayatSK($jurnal){
		$data['riwayatsk'] = $this->M_Jurnal->getSkJurnal($jurnal, true);
		$data['sk']		  = $this->M_Jurnal->tampil_sk();
		$data['jurnal'] = $jurnal;

		$this->load->view('manajemen/v_riwayat', $data);


	}
	public function perbaruiSK(){
		$this->form_validation->set_rules('sk', 'NO SK', 'required');
    if ($this->form_validation->run()== FALSE)
    {
      $this->riwayatSK();
    }
    else
    {
      $data = array(
          'id_sk' => $this->input->post('sk'),
					'id_jurnal' => $this->input->post('jurnal')
        );
        $result=$this->M_Jurnal->addSkJurnal($data);
        if ($result) {
            $this->session->set_flashdata('success_msg', 'SK berhasil diperbarui');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal memperbarui sk. Silahkan coba lagi atau hubungi administrator');
        }

        redirect('jurnal/riwayat/'.$data['id_jurnal']);
    }


	}

	// // public function detail_jurnal($id)
	// {
	// 	$data['detail']			= $this->M_Jurnal->detail_data($id);
	// 	$data['penerbit']		= $this->M_Jurnal->getPenerbitJurnal($id);
	//
	// 	$this->load->
	// }



}

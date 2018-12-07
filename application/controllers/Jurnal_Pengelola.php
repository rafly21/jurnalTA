<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jurnal_Pengelola extends CI_Controller {
	function __construct(){
	parent::__construct();
	$this->load->database();
	$this->load->model(['M_Jurnal','M_users','M_JurnalPengelola']);
	$this->load->helper('url');
	$this->load->library('form_validation');
		if($this->session->userdata('permission')!="pengelola"){
	 		redirect ('cekpermission');
		}
	}
	public function index()
	{
		$a=$this->session->userdata('id_pengelola');

    $data['data'] = $this->M_JurnalPengelola->tampil_data($a);

    // var_dump($data);
    // die;
		// echo json_encode($data);
		$this->load->view('pengelola/v_p_jurnal',$data);

	}
	public function edit_jurnal($id)
	{
		$data['jurnal'] = $this->M_Jurnal->getJurnalById($id);
		// $data['pengelola']   = $this->M_users->get_pengelola();
		$data['pengindeks']  = $this->M_Jurnal->getPengindeks();
		$data['portal']	  = $this->M_Jurnal->getPortal();
		$data['sk']		  = $this->M_Jurnal->tampil_sk();
		$data['penerbit'] = $this->M_Jurnal->getPenerbitJurnal($id);
		$data['jurnal_pengindeks']= $this->M_Jurnal->getJurnalPengindeks($id);
		$data['jurnal_pengindeks_id']= $this->M_Jurnal->getJurnalPengindeks($id, true);
		// $detail = $this->M_Jurnal->detail_data($a->id_jurnal);
		$data['bulan_terbit'] = $this->M_Jurnal->getIdBulanTerbit($id);
		$data['skJurnal'] = $this->M_Jurnal->getSkJurnal($id);
		//  var_dump($data['jurnal_pengindeks_id']);
		// die();
		$this->load->view('pengelola/v_p_editjurnal', $data);
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
		// $this->form_validation->set_rules('pengelola', 'Pengelola', 'required|callback_validate_pengelola');
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
				// 'id_pengelola' => $this->input->post('pengelola'),
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
					$dataSK = array(
						'id_sk' => $this->input->post('sk'),
					);
					$result .=	$this->M_Jurnal->updateSkJurnal($dataSK,'id_jurnal',$id);
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

			redirect('jurnal-p');
		}

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
}

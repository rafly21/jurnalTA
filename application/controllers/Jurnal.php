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
		$data['data'] = $this->M_Jurnal->tampil_data();
    // $data['data2'] = $this->M_Jurnal->tampil_data2();
    // var_dump($data);
    // die;
		// echo json_encode($data);
		$this->load->view('manajemen/v_jurnal',$data);
	}
	public function submitJurnal(){
		$this->form_validation->set_rules('judul', 'Judul Jurnal', 'required');
		$this->form_validation->set_rules('nomorjurnal', 'Nomor Jurnal', 'required|numeric');
		$this->form_validation->set_rules('portal', 'Portal', 'required');
		$this->form_validation->set_rules('urlportal', 'URL', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('id_penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('sponsor', 'Sponsor', 'required');
		$this->form_validation->set_rules('pengelola', 'Pengelola', 'required');
		$this->form_validation->set_rules('singkatan', 'Singkatan', 'required');
		// $this->form_validation->set_rules('pissn', 'P-Issn', 'required');
		// $this->form_validation->set_rules('eissn', 'E-Issn', 'required');
		$this->form_validation->set_rules('english', 'English', 'required');
		$this->form_validation->set_rules('mpgundip', 'MpgUndip', 'required');
		$this->form_validation->set_rules('doi', 'DOI', 'required');
		$this->form_validation->set_rules('thnmulai', 'Tahun Mulai', 'required|numeric|exact_length[4]');
		$this->form_validation->set_rules('blnterbit[]', 'Bulan Terbit', 'required');
		$this->form_validation->set_rules('terbitakhir', 'Terbit Terakhir', 'required|numeric|exact_length[4]');
		$this->form_validation->set_rules('noterakhir', 'Jumlah Nomor Terakhir', 'required|numeric');
		$this->form_validation->set_rules('pengindeks[]', 'Pengindeks', 'required');
		$this->form_validation->set_rules('akreditasi', 'Terakreditasi', 'required');
		// $this->form_validation->set_rules('mulaisk', 'Tanggal Mulai SK', 'required');
		// $this->form_validation->set_rules('tetapsk', 'Tanggal Penetapan SK', 'required');
		// $this->form_validation->set_rules('akhirsk', 'Tanggal Berakhir SK', 'required');
		if(!empty($this->input->post('sk'))) {
			$this->form_validation->set_rules('sk', 'SK Akreditasi', 'required');
		}
		if(!empty($this->input->post('peringkatsinta'))) {
			$this->form_validation->set_rules('peringkatsinta', 'Peringkat SINTA', 'required|alpha_numeric');
		}
		$this->form_validation->set_rules('urlsinta', 'URL SINTA', 'required|valid_url');
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
					$this->M_Jurnal->add_penerbitan($dataPenerbitan);
				}

				$dataPenerbit = array(
					'id_jurnal' => $id_jurnal,
					'jenis_penerbit' => $this->input->post('penerbit'),
					'id_jenis' => $this->input->post('id_penerbit')
				);
				$this->M_Jurnal->add_penerbit($dataPenerbit);

				$pengindeks = $this->input->post('pengindeks');
				$url_pengindeks = $this->input->post('url_pengindeks');
				foreach ($pengindeks as $key => $value) {
					$name = strtolower(str_replace(' ', '_', $this->M_Jurnal->getPengindeksName($value)->nama));
					$dataPengindeks = array(
						'id_jurnal' => $id_jurnal,
						'id_pengindeks' => $value,
						'url_pengindeks' => $url_pengindeks[$name],
					);
					$this->M_Jurnal->add_pengindeks($dataPengindeks);
				}

				$is_akreditasi = $this->input->post('akreditasi');
				if($is_akreditasi === "true") {
					$dataSK = array(
						'id_jurnal' => $id_jurnal,
						'id_sk' => $this->input->post('sk'),
					);
					$this->M_Jurnal->addSkJurnal($dataSK);
				}
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
		$data['bulan_terbit'] = $this->M_Jurnal->getBulanTerbit($id, true);
		$data['skJurnal'] = $this->M_Jurnal->getSkJurnal($id);
		$this->load->view('manajemen/v_edit_jurnal', $data);
	}

	// // public function detail_jurnal($id)
	// {
	// 	$data['detail']			= $this->M_Jurnal->detail_data($id);
	// 	$data['penerbit']		= $this->M_Jurnal->getPenerbitJurnal($id);
	//
	// 	$this->load->
	// }


	public function submit_user()
  {
		$this->form_validation->set_rules('inputusername', 'Username duplicate!', 'is_unique[auth.username]');
			if ($this->form_validation->run() == FALSE)
          {
							$this->session->set_flashdata('duplicateUsername','ok');
            	redirect('tambah_pengelola');
          }
          else
          {
            $dataauth = array(
              'username'=> $this->input->post('inputusername'),
              'password'=> md5($this->input->post('inputpassword')),
							'permission'=> "pengelola",
            );
            $this->M_users->input_data('auth' ,$dataauth);
        $hasil= $this->M_users->get_auth( 'auth', $dataauth );
            $data = array(
              'id_user'=>$hasil->id_user,
              'nama'=> $this->input->post('inputnama'),
              'email'=> $this->input->post('inputemail'),
              'no_telp'=> $this->input->post('inputtelepon'),
              );
						$this->M_users->input_data('data_pengelola',$data);
						$this->session->set_flashdata('successAddUser','ok');
						redirect('kelola_pengelola');
          }
	}
	public function username_check()
	{
	$cu = $this->db->select('username')->get('auth')->row();
	$iu = $this->input->post('inputusername');
                if ($cu->username == $iu)
                {
										$this->session->set_flashdata('duplicateUsername','ok');
		                    return FALSE;
                }
                else
                {
                        return TRUE;
                }
			}
	public function update_user()
	{
	  $id = $this->input->post('inputiduser');
	    $data=array(
				'id_user'=> $this->input->post('inputiduser'),
				'nama'=> $this->input->post('inputnama'),
				'email'=> $this->input->post('inputemail'),
				'no_telp'=> $this->input->post('inputtelepon'),
	    );
	  $this->M_users->update($data,$id);
		$this->session->set_flashdata('successUpdateUser','ok');
	  redirect('kelola_pengelola');
	}
	function edit_user()
	    {
	            $id=  $this->uri->segment(3);
	            $this->load->model('M_users');
							// edit ini cok
	            $data['data']   =  $this->M_users->tampil_data()->result();
	            $data['record']=  $this->M_users->get_one($id)->row_array();
	            $this->load->view('manajemen/v_edit_user',$data);
	    }
	function edit_pass($id)
  {
			$id = $this->uri->segment(3);
			$return['record'] = $this->M_users->getPassword($id);
			$this->load->view('manajemen/v_edit_pass',$return);
  }
	function change_pass($id)
	{
		 $data=array(
			 'password'=> md5($this->input->post('inputpassword'))
		 );
$hasil =$this->M_users->updatepassword($data,$id);
	if($hasil){
		$this->session->set_flashdata('successChangePass','o k');
 	 	redirect('kelola_pengelola');
	}else{
		$this->session->set_flashdata('failedChangePass','o k');
	 	redirect('kelola_pengelola');
	}
	}
	public function delete_user()
  {
		$id = $this->uri->segment(3);
		$hasil = $this->M_users->delete_pengelola($id);
    // $query= $this->db->query('DELETE FROM auth WHERE id_user="'.$del.'"');
		// // $query= $this->db->query('DELETE FROM data_pengelola WHERE id_pengelola="'.$del.'"');
		// $this->session->set_flashdata('successDeleteUser','o k');
     // redirect('kelola_pengelola');
		 if($hasil){
			 $this->session->set_flashdata('successDeleteUser','o k');
 	     redirect('kelola_pengelola');
		 }else{
			 $this->session->set_flashdata('FailedDeleteUser','o k');
 			redirect('kelola_pengelola');
		 }
  }
}

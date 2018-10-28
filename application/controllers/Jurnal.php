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
		$return = $this->M_Jurnal->tampil_data();
		$data['data'] = $this->M_Jurnal->tampil_data();
    $data['data2'] = $this->M_Jurnal->tampil_data2();
    // var_dump($data);
    // die;
		// echo json_encode($data);
		$this->load->view('manajemen/v_jurnal',$data);
	}
	public function submitJurnal(){
		// $this->form_validation->set_rules('judul', 'Judul Jurnal', 'required');
    // $this->form_validation->set_rules('nomorjurnal', 'Nomor Jurnal', 'required');
    // $this->form_validation->set_rules('portal', 'Portal', 'required');
		// $this->form_validation->set_rules('urlportal', 'URL', 'required');
		// $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		// $this->form_validation->set_rules('sponsor', 'Sponsor', 'required');
		// $this->form_validation->set_rules('pengelola', 'Pengelola', 'required');
		// $this->form_validation->set_rules('singkatan', 'Singkatan', 'required');
		// $this->form_validation->set_rules('pissn', 'P-Issn', 'required');
		// $this->form_validation->set_rules('eissn', 'E-Issn', 'required');
		// $this->form_validation->set_rules('english', 'English', 'required');
		// $this->form_validation->set_rules('mpgundip', 'MpgUndip', 'required');
		// $this->form_validation->set_rules('doi', 'DOI', 'required');
		// $this->form_validation->set_rules('thnmulai', 'Tahun Mulai', 'required');
		// $this->form_validation->set_rules('blnterbit', 'Bulan Terbit', 'required');
		// $this->form_validation->set_rules('terbitakhir', 'Terbit Terakhir', 'required');
		// $this->form_validation->set_rules('noterakhir', 'Jumlah Nomor Terakhir', 'required');
		// $this->form_validation->set_rules('pengindeks', 'Pengindeks', 'required');
		// $this->form_validation->set_rules('akreditasi', 'Terakreditasi', 'required');
		// $this->form_validation->set_rules('sk', 'SK Akreditasi', 'required');
		// $this->form_validation->set_rules('mulaisk', 'Tanggal Mulai SK', 'required');
		// $this->form_validation->set_rules('tetapsk', 'Tanggal Penetapan SK', 'required');
		// $this->form_validation->set_rules('akhirsk', 'Tanggal Berakhir SK', 'required');
		// $this->form_validation->set_rules('peringkatsinta', 'Peringkat SINTA', 'required');
		// $this->form_validation->set_rules('urlsinta', 'URL SINTA', 'required');

// if ($this->form_validation->run() == FALSE)
// {
// 		$this->add_jurnal();
// }
// else
// {
	$data = array(
			'judul' => $this->input->post('judul'),
			'no_jurnal' => $this->input->post('nomorjurnal'),
			// 'nama_portal' => $this->input->post('portal'),
			'url' => $this->input->post('urlportal'),
			// 'grade' => $this->input->post('penerbit'),
			'grade' => $this->input->post('sponsor'),
			'id_pengelola' => $this->input->post('pengelola'),
			'singkatan' => $this->input->post('singkatan'),
			'p_issn' => $this->input->post('pissn'),
			'e_issn' => $this->input->post('eissn'),
			'english' => $this->input->post('english'),
			'mpgundip' => $this->input->post('mpgundip'),
			'doi' => $this->input->post('doi'),
			'thn_mulai' => $this->input->post('thnmulai'),
			// 'grade' => $this->input->post('blnterbit'),
			'terbit_terakhir' => $this->input->post('terbitakhir'),
			'no_terakhir' => $this->input->post('noterakhir'),
			// 'grade' => $this->input->post('pengindeks'),
			// 'grade' => $this->input->post('akreditasi'),
			// 'grade' => $this->input->post('sk'),
			// 'grade' => $this->input->post('mulaisk'),
			// 'grade' => $this->input->post('tetapsk'),
			// 'grade' => $this->input->post('akhirsk'),
			'peringkat_sinta' => $this->input->post('peringkatsinta'),
			'url_sinta' => $this->input->post('urlsinta'),


		);
var_dump($this->input->post());
die();

// }


	}

	public function add_jurnal()
 	{
		 // $id = $this->uri->segment(3);
		 // $this->load->model('M_users');
		 // // edit ini cok, atas model dept, bawah karyawan
		 $data['pengelola']   = $this->M_users->get_pengelola();
		 $data['pengindeks']  = $this->M_Jurnal->getPengindeks();
		 $data['portal']			= $this->M_Jurnal->getPortal();
		 // $data['record']=  $this->M_users->get_one($id)->row_array();
		 $this->load->view('manajemen/v_add_jurnal',$data);
 	}
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

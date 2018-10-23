<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends CI_Controller {

	function __construct(){
	parent::__construct();
	$this->load->database();
	$this->load->model('M_Jurnal');
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
		$data['fakultas'] = $this->M_Jurnal->getFakultas($return[0]->id_fak);
		$data['departemen'] = $this->M_Jurnal->getDepartemen($return[0]->id_dept);
		$data['lembaga'] = $this->M_Jurnal->getlembaga($return[0]->id_lembaga);
		$data['lab'] = $this->M_Jurnal->getlab($return[0]->id_lab);
		// $query = $this->M_Jurnal->tampil_data();
		// return $query;
    // var_dump($data1);
    //
    // var_dump($data);
    // die;

		$this->load->view('manajemen/v_jurnal',$data);
	}
	// public function getFakultas($id){
	// 	$return = $this->M_Jurnal->getFakultas($id);
	// 	var_dump( $return);
	// }
	public function add_user()
 	{
		 $id = $this->uri->segment(3);
		 $this->load->model('M_users');
		 // edit ini cok, atas model dept, bawah karyawan
		 $data['auth']   =  $this->M_users->tampil_data()->result();
		 $data['record']=  $this->M_users->get_one($id)->row_array();
		 $this->load->view('manajemen/v_add_user');
 	}

	public function add_jurnal()
 	{
		 // $id = $this->uri->segment(3);
		 // $this->load->model('M_users');
		 // // edit ini cok, atas model dept, bawah karyawan
		 // $data['auth']   =  $this->M_users->tampil_data()->result();
		 // $data['record']=  $this->M_users->get_one($id)->row_array();
		 $this->load->view('manajemen/v_add_jurnal');
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

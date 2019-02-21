<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengindeks extends CI_Controller {
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
		$return = $this->M_Jurnal->tampil_pengindeks();
		$data['data'] = $this->M_Jurnal->tampil_pengindeks();
    // var_dump($data);
    // die;
		// echo json_encode($data);
		$this->load->view('manajemen/pengindeks',$data);
	}
  public function add_pengindeks()
 	{
		 $this->load->view('manajemen/v_add_pengindeks');
 	}
  public function insert_pengindeks()
  {
    // var_dump($this->input->post());
    // die;
    $this->form_validation->set_rules('nama', 'nama pengindeks', 'required');
    // $this->form_validation->set_rules('tingkatan', 'Tingkatan', 'required');
    // $this->form_validation->set_rules('grade', 'Grade', 'required');

    if ($this->form_validation->run() == FALSE)
    {
        $this->add_pengindeks();
    }
    else
    {


      $data = array(
          'nama' => $this->input->post('nama'),
					'dibuat_pada' => date('Y-m-d H:i:s')

        );

      // var_dump($data);
      // die();

      $result = $this->M_Jurnal->input_pengindeks($data);

      if ($result) {
          $this->session->set_flashdata('success_msg', 'Pengindeks berhasil ditambahkan');
      } else {
          $this->session->set_flashdata('error_msg', 'Gagal menambah pengindeks. Silahkan coba lagi atau hubungi administrator');
      }

      redirect('pengindeks');
    }

  }
  public function delete_pengindeks($id){
    $result =$this->M_Jurnal->delete_pengindeks($id);
    if ($result) {
        $this->session->set_flashdata('success_msg', 'Pengindeks berhasil dihapus');
    } else {
        $this->session->set_flashdata('error_msg', 'Gagal menghapus pengindeks. Silahkan coba lagi atau hubungi administrator');
    }

    redirect('pengindeks');
  }

  public function update_pengindeks($id){
    $data['pengindeks']=$this->M_Jurnal->getPengindeksById($id);
    // var_dump($data);
    // die();
    $this->load->view('manajemen/v_edit_pengindeks',$data);
  }

  public function edit_pengindeks($id){
    $this->form_validation->set_rules('nama', 'nama pengindeks', 'required');
    $this->form_validation->set_rules('tingkatan', 'Tingkatan', 'required');
    // $id=$this->input->post('id_pengindeks');
    if ($this->form_validation->run() == FALSE)
    {
        $this->update_pengindeks($id);
    }
    else
    {

    $data = array(
      'nama' => $this->input->post('nama'),
			'diubah_pada' => date('Y-m-d H:i:s')

);
    $result = $this->M_Jurnal->update_pengindeks($data,'id_pengindeks',$id);
    if ($result) {
        $this->session->set_flashdata('success_msg', 'Pengindeks berhasil diiupdate');
    } else {
        $this->session->set_flashdata('error_msg', 'Gagal update pengindeks. Silahkan coba lagi atau hubungi administrator');
    }
    redirect('pengindeks');
  }
  }
	// public function getFakultas($id){
	// 	$return = $this->M_Jurnal->getFakultas($id);
	// 	var_dump( $return);
	// }
	// public function add_user()
 	// {
	// 	 $id = $this->uri->segment(3);
	// 	 $this->load->model('M_users');
	// 	 // edit ini cok, atas model dept, bawah karyawan
	// 	 $data['auth']   =  $this->M_users->tampil_data()->result();
	// 	 $data['record']=  $this->M_users->get_one($id)->row_array();
	// 	 $this->load->view('manajemen/v_add_user');
 	// }
}

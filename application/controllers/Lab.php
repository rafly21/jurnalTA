<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lab extends CI_Controller {
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
		$return = $this->M_Jurnal->tampil_lab();
		$data['data'] = $this->M_Jurnal->tampil_lab();
    // var_dump($data);
    // die;
		// echo json_encode($data);
		$this->load->view('manajemen/v_lab',$data);
	}
  public function add_lab()
 	{
		 $this->load->view('manajemen/v_add_lab');
 	}
  public function insert_lab()
  {
    $this->form_validation->set_rules('nama_lab', 'nama lab', 'required');
    if ($this->form_validation->run()== FALSE)
    {
      $this->add_lab();
    }
    else
    {
      $data = array(
          'nama_lab' => $this->input->post('nama_lab'),
					'diubah_pada' => date('Y-m-d H:i:s')

        );
        $result=$this->M_Jurnal->input_lab($data);
        if ($result) {
            $this->session->set_flashdata('success_msg', 'lab berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menambah lab. Silahkan coba lagi atau hubungi administrator');
        }

        redirect('lab');
    }
  }
	public function delete_lab($id){
		$result =$this->M_Jurnal->delete_lab($id);
		// var_dump($result);
    // die;
		if ($result) {
				$this->session->set_flashdata('success_msg', 'lab berhasil dihapus');
		} else {
				$this->session->set_flashdata('error_msg', 'Gagal menghapus lab. Silahkan coba lagi atau hubungi administrator');
		}

		redirect('lab');
	}
	public function edit_lab($id){
    $data['lab']=$this->M_Jurnal->getLabById($id);
    // var_dump($data);
    // die();
    $this->load->view('manajemen/v_edit_lab',$data);
  }
	public function update_lab($id){
    $this->form_validation->set_rules('nama_lab', 'nama lab', 'required');
    // $id=$this->input->post('id_lembaga');
    if ($this->form_validation->run() == FALSE)
    {
        $this->edit_lab($id);
    }
    else
    {

    $data = array(
      'nama_lab' => $this->input->post('nama_lab'),
			'diubah_pada' => date('Y-m-d H:i:s')

		);
    $result = $this->M_Jurnal->update_lab($id,$data);
    if ($result) {
        $this->session->set_flashdata('success_msg', 'lab berhasil diupdate');
    } else {
        $this->session->set_flashdata('error_msg', 'Gagal update lab. Silahkan coba lagi atau hubungi administrator');
    }
    redirect('lab');
  }
  }






}

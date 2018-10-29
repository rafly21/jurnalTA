<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lembaga extends CI_Controller {
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
		$return = $this->M_Jurnal->tampil_lembaga();
		$data['data'] = $this->M_Jurnal->tampil_lembaga();
    // var_dump($data);
    // die;
		// echo json_encode($data);
		$this->load->view('manajemen/v_lembaga',$data);
	}
  public function add_lembaga()
 	{
		 $this->load->view('manajemen/v_add_lembaga');
 	}
  public function insert_lembaga()
  {
    $this->form_validation->set_rules('nama', 'nama lembaga', 'required');
    if ($this->form_validation->run()== FALSE)
    {
      $this->add_lembaga();
    }
    else
    {
      $data = array(
          'nama_lembaga' => $this->input->post('nama'),
        );
        $result=$this->M_Jurnal->input_lembaga($data);
        if ($result) {
            $this->session->set_flashdata('success_msg', 'Lembaga berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menambah lembaga. Silahkan coba lagi atau hubungi administrator');
        }

        redirect('lembaga');
    }
  }

}

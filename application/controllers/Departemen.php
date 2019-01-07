<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Departemen extends CI_Controller {
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
		$return = $this->M_Jurnal->tampil_dept();
		$data['data'] = $this->M_Jurnal->tampil_dept();
    // var_dump($data);
    // die;
		// echo json_encode($data);
		$this->load->view('manajemen/v_departemen',$data);
	}
  public function add_departemen()
  {

    $data['fakultas'] = $this->M_Jurnal->getFakultas();
    // var_dump($data);
    // die;
    $this->load->view('manajemen/v_add_departemen',$data);

  }
  public function insert_departemen()
  {
    $this->form_validation->set_rules('nama', 'nama departemen', 'required');
    $this->form_validation->set_rules('fakultas', 'fakultas', 'required');

    if ($this->form_validation->run()== FALSE)
    {
      $this->add_departemen();
    }
    else
    {
      $data = array(
          'nama_dept' => $this->input->post('nama'),
          'id_fak'       => $this->input->post('fakultas'),
        );
        $result=$this->M_Jurnal->input_dept($data);
        if ($result) {
            $this->session->set_flashdata('success_msg', 'Departemen berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menambah Departemen. Silahkan coba lagi atau hubungi administrator');
        }

        redirect('dept');
    }
    // var_dump($data);
    // die;
  }
  public function edit_departemen($id)
  {
  $data['departemen']=$this->M_Jurnal->getDeptById($id);
  $data['fakultas'] =$this->M_Jurnal->getFakultas();
  // var_dump($data);
  // die();
  $this->load->view('manajemen/v_edit_departemen',$data);
  }
	public function delete_departemen($id){
		$result =$this->M_Jurnal->delete_dept($id);
		if ($result) {
				$this->session->set_flashdata('success_msg', 'Departemen berhasil dihapus');
		} else {
				$this->session->set_flashdata('error_msg', 'Gagal menghapus departemen. Silahkan coba lagi atau hubungi administrator');
		}

		redirect('dept');
	}
}

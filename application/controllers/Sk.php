<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sk extends CI_Controller {
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
		$return = $this->M_Jurnal->tampil_sk();
		$data['data'] = $this->M_Jurnal->tampil_sk();
    // var_dump($data);
    // die;
		// echo json_encode($data);
		$this->load->view('manajemen/v_kelola_sk',$data);
	}
  public function add_sk()
  {
    $this->load->view('manajemen/v_add_sk');
  }
  public function insert_sk()
  {
    $this->form_validation->set_rules('sk', 'nomor sk', 'required');
    $this->form_validation->set_rules('mulaisk', 'Tanggal Mulai', 'required');
    $this->form_validation->set_rules('tetapsk', 'Tanggal Penetapan', 'required');
    $this->form_validation->set_rules('akhirsk', 'Tanggal Berakhir', 'required');
    if ($this->form_validation->run()== FALSE)
    {
      $this->add_sk();
    }
    else
    {
      $data = array(
          'no_sk' => $this->input->post('sk'),
          'tanggal_mulai' => $this->input->post('mulaisk') ,
          'tanggal_penetapan' => $this->input->post('tetapsk') ,
          'tanggal_berakhir' => $this->input->post('akhirsk') ,
        );
        $result=$this->M_Jurnal->input_sk($data);
        if ($result) {
            $this->session->set_flashdata('success_msg', 'SK berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menambah SK. Silahkan coba lagi atau hubungi administrator');
        }

        redirect('sk');
    }
  }

  public function delete_sk($id){
		$result =$this->M_Jurnal->delete_sk($id);
		// var_dump($result);
    // die;
		if ($result) {
				$this->session->set_flashdata('success_msg', 'SK berhasil dihapus');
		} else {
				$this->session->set_flashdata('error_msg', 'Gagal menghapus SK. Silahkan coba lagi atau hubungi administrator');
		}

		redirect('sk');
	}
  public function update_sk($id)
  {
    $data['sk']=$this->M_Jurnal->getSKById($id);
    // var_dump($data);
    // die();
    $this->load->view('manajemen/v_edit_sk',$data);
  }
	public function edit_sk($id){
    // $this->form_validation->set_rules('no_sk', 'nomor sk', 'required');
		// $this->form_validation->set_rules('tanggal_mulai', 'tanggal mulai SK', 'required');
		// $this->form_validation->set_rules('tanggal_penetapan', 'tanggal penetapan SK', 'required');
		// $this->form_validation->set_rules('tanggal_berakhir', 'tanggal berakhir SK', 'required');

    if ($this->form_validation->run() == FALSE)
    {
        $this->update_sk($id);
    }
    else
    {

    $data = array(
			'no_sk' => $this->input->post('sk'),
			'tanggal_mulai' => $this->input->post('mulaisk') ,
			'tanggal_penetapan' => $this->input->post('tetapsk') ,
			'tanggal_berakhir' => $this->input->post('akhirsk') ,
		);
    $result = $this->M_Jurnal->update_sk($id,$data);
    if ($result) {
        $this->session->set_flashdata('success_msg', 'SK berhasil diupdate');
    } else {
        $this->session->set_flashdata('error_msg', 'Gagal update SK. Silahkan coba lagi atau hubungi administrator');
    }
    redirect('sk');
  }
  }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jurnal_Guest extends CI_Controller {
	function __construct(){
	parent::__construct();
	$this->load->database();
	$this->load->model(['M_Jurnal','M_users']);
	$this->load->helper('url');
	$this->load->library('form_validation');

	}
	public function index($param=null)
	{
		// var_dump ($param);
		// die();
		if ($param!=null){
			if ($param == 'acr'){
				$data['data'] = $this->M_Jurnal->tampil_dataacr();
			}
			if ($param == 'eng'){
				$data['data'] = $this->M_Jurnal->tampil_data_eng();

			}

		}
		else {
				$data['data'] = $this->M_Jurnal->tampil_data();
		}
		// $return = $this->M_Jurnal->tampil_data();

    // $data['data2'] = $this->M_Jurnal->tampil_data2();
    // var_dump($data);
    // die;
		// echo json_encode($data);
		$this->load->view('guest/v_jurnal',$data);
	}
	public function riwayatSK($jurnal){
		$data['riwayatsk'] = $this->M_Jurnal->getSkJurnal($jurnal, true);
		$data['sk']		  = $this->M_Jurnal->tampil_sk();
		$data['jurnal'] = $jurnal;

		$this->load->view('guest/v_riwayat', $data);


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

				redirect('jurnal_guest/riwayat/'.$data['id_jurnal']);
		}
}
}

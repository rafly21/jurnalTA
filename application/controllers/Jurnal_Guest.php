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
	public function index()
	{
		// $return = $this->M_Jurnal->tampil_data();
		$data['data'] = $this->M_Jurnal->tampil_data();
    // $data['data2'] = $this->M_Jurnal->tampil_data2();
    // var_dump($data);
    // die;
		// echo json_encode($data);
		$this->load->view('guest/v_jurnal',$data);
	}
}

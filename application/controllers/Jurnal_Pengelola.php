<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jurnal_Pengelola extends CI_Controller {
	function __construct(){
	parent::__construct();
	$this->load->database();
	$this->load->model(['M_Jurnal','M_users','M_JurnalPengelola']);
	$this->load->helper('url');
	$this->load->library('form_validation');
		if($this->session->userdata('permission')!="pengelola"){
	 		redirect ('cekpermission');
		}
	}
	public function index()
	{
		$a=$this->session->userdata('id_pengelola');

    $data['data'] = $this->M_JurnalPengelola->tampil_data($a);

    // var_dump($data);
    // die;
		// echo json_encode($data);
		$this->load->view('pengelola/v_p_jurnal',$data);
	}
}

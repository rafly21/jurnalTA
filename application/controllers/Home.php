<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->load->model('M_Jurnal'); 

			if($this->session->userdata('permission') != NULL){
				redirect("cekpermission");
			}
		}

	public function index()
	{
		$data['datajurnal'] = $this->M_Jurnal->tampil_data();

		$this->load->view('guest/home',$data);
	}
}

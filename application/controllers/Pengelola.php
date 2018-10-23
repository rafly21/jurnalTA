<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelola extends CI_Controller {

	function __construct(){
			parent::__construct();

			if($this->session->userdata('permission') != "pengelola"){
				redirect("cekpermission");
			}
		}

	public function index()
	{
		$this->load->view('pengelola/p_home');
	}
}

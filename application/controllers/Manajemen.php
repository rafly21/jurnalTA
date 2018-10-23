<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen extends CI_Controller {

	function __construct(){
			parent::__construct();

			if($this->session->userdata('permission') != "manajemen"){
				redirect("cekpermission");
			}
		}

	public function index()
	{
		$this->load->view('manajemen/man_home');
	}
}

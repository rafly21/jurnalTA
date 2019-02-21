<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hom extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->load->model('M_Jurnal');

			if($this->session->userdata('permission') != NULL){
				redirect("cekpermission");
			}
		}
    public function index()
  	{

  		// var_dump($coba);
  		// die();

  		$this->load->view('guest/landing');
  	}
  }

<?php

class Logout extends CI_Controller {

	public function index(){
				$this->load->model('M_auth');
  			$this->M_auth->destroySession();
  			redirect(site_url('Home'));
		}
	}

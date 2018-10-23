<?php

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_auth');
		$this->load->helper('url');

		//TENDANG USER YG UDAH LOGIN KE HOME YANG SEHARUSNYA
		switch ($this->session->userdata('permission')){
			case "manajemen" : redirect ("manajemen");
				break;
			case "pengelola" : redirect ("pengelola");
				break;
			default : base_url();
	}
}

	public function index(){
		//echo "hello";
		$this->load->view('auth');
	}

	public function auth_process(){
		//echo "masuk ke auth_process";
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);


		$cek = $this->M_auth->auth_check("auth",$where);
		if($cek->num_rows()>0){
 				$data_session = array(
				'username' => $username,
				'status' => "login",
				'name' => $cek->row(0)->name,
				'permission' => $cek->row(0)->permission
				);
 		 			$this->db->where('username',$username);
 			$this->session->set_userdata($data_session);

 				if ($this->session->userdata('permission') === "manajemen"){
					redirect ("manajemen");
				} else if($this->session->userdata('permission') === "pengelola"){
					redirect ("pengelola");
				}
		}
		else {
		      echo '<script>alert("Username atau Password salah. Harap cek kembali.");</script>';
					$this->index();
				}

	}

		public function cekpermission(){
				if($this->session->userdata('permission') === "manajemen"){
				redirect ("manajemen");
			} else if($this->session->userdata('permission') === "pengelola"){
				redirect ("pengelola");
			} else {
				redirect ("auth");
			}
		}


}

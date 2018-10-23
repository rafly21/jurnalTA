<?php

class M_auth extends CI_Model{
	function auth_check($table,$where){
		return $this->db->get_where($table,$where);
	}

	function selectAll(){
		return $this->db->get('auth')->result();
	}

	function tampil_data(){
		return $this->db->get('auth');
	}

	function destroySession(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('permission');
		$this->session->sess_destroy();
	}
}

?>

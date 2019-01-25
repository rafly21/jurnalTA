<?php

class M_users extends CI_Model{

	function tampil_data(){
  	// $query= "SELECT
		// data_pengelola.id_user AS id_user,
		// auth.username AS username,
		// data_pengelola.nama AS nama,
		// data_pengelola.email AS email,
		// data_pengelola.no_telp AS telepon,
		// data_pengelola.foto AS foto
		// FROM auth JOIN data_pengelola
		// ON auth.id_user = data_pengelola.id_user
		// WHERE permission = 'pengelola'
		// ORDER BY id_pengelola";
  	// return $this->db->query($query);

		$this->db->select('d.id_user as id_user, a.username as username, d.nama as nama, d.email as email, d.no_telp as telepon, d.foto as foto');
		$this->db->join('data_pengelola d', 'a.id_user = d.id_user');
		$this->db->where('a.permission', 'pengelola');
		$this->db->where('a.dihapus_pada', NULL);
		$this->db->order_by('d.id_pengelola');

		return $this->db->get('auth a');

  }
	function getPengelolaByid($id){
		$this->db->where('id_pengelola',$id);
		return $this->db->get('data_pengelola')->row_array();

	}
	function get_pengelola(){
		$this->db->join('auth','data_pengelola.id_user=auth.id_user');
		$this->db->where('permission','pengelola');
		return $this->db->get('data_pengelola')->result();
	}
	function getJurnalPengelola($id_user){
		$this->db->select('*');
		$this->db->from('data_pengelola');
		$this->db->join('jurnal', 'jurnal.id_pengelola = data_pengelola.id_pengelola');
		// $this->db->join('auth', 'auth.id_user = data_pengelola.id_user');
		$this->db->where('data_pengelola.id_user',$id_user);
		$query = $this->db->get();
		return $query->result();
		// var_dump($query->row());
		// die();
	}

	function get_auth($tabel, $where)
	{
	 return	$this->db->get_where($tabel, $where)->row();

	}

	function input_data($tabel,$data)
  {
     $this->db->insert($tabel,$data);
  }

	function edit($data){
  $this->db->where($data);
  $edit = $this->db->get('auth');
  return $edit->result();
  }

  function update($data,$id){
  	$this->db->where('id_user', $id);
  	$a = $this->db->update('data_pengelola',$data);
		if ($a) {
			return true;
		} else {
			return false;
		}

  }

	function updatepassword($data,$id){

		$where = ['id_user'=> $id];
		$query = $this->db->update('auth',$data,$where);
		return $query;

	}
	function get_one($id)
	 {
			 $param = array('id_user'=>$id);
			 return $this->db->get_where('data_pengelola',$param);
	 }
	 function getPassword($id){
		 $param = array('id_user'=>$id);
		 return $this->db->get_where('auth',$param)->result();
	 }

	 function update_photo($id,$data){
   $this->db->where('username', $id);
   $this->db->update('data_pengelola',$data);
   }

	 function delete_pengelola($id,$data=null)
	 {
 			if($data != null) {
					$this->db->where('id_user', $id);
				  $this->db->update('auth', $data);

					$this->db->where('id_user', $id);
 					$this->db->update('data_pengelola', $data);
 			} else {
				$this->db->where('id_user', $id);
				$query1 = $this->db->delete('auth');

				$this->db->where('id_user', $id);
				$query2 = $this->db->delete('data_pengelola');
 			}
 			if($query1 && $query2)
 			{
 					return true; // to the controller
 			} else {
 					return false;
 			}
	 }

	 function get_where()
 	 {
 			 $param = array('username'=> $this->input->post('inputusername'));
 			 $result = $this->db->get_where('auth',$param)->row();
 			 return $result;
 	 }

//  function isUsernameExist($un) {
//     $this->db->select('auth');
//     $this->db->where('username', $un);
//     $query = $this->db->get('Users');
//
//     if ($query->num_rows() > 0) {
//         return true;
//     } else {
//         return false;
//     }
//
// }

// function checkUserexist($userName) {
//   $this->db->where('username', $username);
//   $this-db->from('auth');
//   $query = $this->db->get();
//   if ($query->num_rows() > 0) {
//     return true;
//   }
//   return false;
// }


	// function tampil_data(){
	// 	return $this->db->get('Users');
	// }


}

?>

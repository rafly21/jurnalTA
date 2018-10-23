<?php

class M_users extends CI_Model{

	function tampil_data(){
  	$query= "SELECT
		data_pengelola.id_user AS id_user,
		auth.username AS username,
		data_pengelola.nama AS nama,
		data_pengelola.email AS email,
		data_pengelola.no_telp AS telepon
		FROM auth JOIN data_pengelola
		ON auth.id_user = data_pengelola.id_user
		WHERE permission = 'pengelola'
		ORDER BY id_pengelola";
  	return $this->db->query($query);
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
  	$this->db->update('data_pengelola',$data);
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

	 function delete_pengelola($id)
	 {
		   $query1 = $this->db->delete('auth', array('id_user' => $id));
			 $query2 = $this->db->delete('data_pengelola', array('id_user' => $id));
			 if($query1 && $query2){
				 return true;
			 }else{
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

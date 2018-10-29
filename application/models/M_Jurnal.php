<?php
class M_Jurnal extends CI_Model{
	function getFakultas($id=null){
		$where =[
			'id_fak'=>$id
		];
		$result = $this->db->get_where('fakultas',$where);
		if($result->num_rows() > 0){
				return $result->result();
		}else{
			return false;
		}
	}
	function getDepartemen($id=null){
		$where =[
			'id_dept'=>$id
		];
		$result = $this->db->get_where('departemen',$where);
		if($result->num_rows() > 0){
				return $result->result();
		}else{
			return false;
		}
	}
	function getlembaga($id=null){
		$where =[
			'id_lembaga'=>$id
		];
		$result = $this->db->get_where('lembaga',$where);
		if($result->num_rows() > 0){
				return $result->result();
		}else{
			return false;
		}
	}
	function getlab($id=null){
		$where =[
			'id_lab'=>$id
		];
		$result = $this->db->get_where('lab',$where);
		if($result->num_rows() > 0){
				return $result->result();
		}else{
			return false;
		}
	}
	function tampil_data(){
  $this->db->select('*');
	$this->db->from('jurnal');
  $this->db->join('data_pengelola','jurnal.id_pengelola = data_pengelola.id_pengelola');
	$this->db->join('penerbit','jurnal.id_penerbit = penerbit.id_penerbit');
	$query = $this->db->get()->result();
	return $query;
  }
	function tampil_data2(){
	$this->db->select('penerbit.id_penerbit AS penerbit,
 		fakultas.nama_fak AS fakultas,
 		departemen.nama_dept AS departemen,
 		lembaga.nama_lembaga AS lembaga,
 		lab.nama_lab AS lab');
	$this->db->from ('penerbit');
	$this->db->join('fakultas',' penerbit.id_fak = fakultas.id_fak','left');
	$this->db->join('departemen','penerbit.id_dept = departemen.id_dept','left');
	$this->db->join('lembaga','penerbit.id_lembaga = lembaga.id_lembaga','left');
	$this->db->join('lab','penerbit.id_lab = lab.id_lab','left');
	$query = $this->db->get()->result();
	}
	function getPengindeks(){
		$this->db->select('nama,id_pengindeks');
		return $this->db->get('pengindeks')->result();
	}
	function getPortal(){
		$this->db->select('id_portal,nama_portal,');
		return $this->db->get('portal')->result();
	}
	function tampil_pengindeks(){
		// $this->db->select('nama,tingkatan,grade');
		return $this->db->get('pengindeks')->result();
	}
	function input_pengindeks($data){
			// $this->db->insert('pengindeks', $data);
			// if($this->db->affected_rows() > 0)
			// {
			//     return true; // to the controller
			// } else {
			// 		return false;
			// }

			return $this->db->insert('pengindeks', $data) ? true : false;
	}
	function delete_pengindeks($id){
		$this->db->where('id_pengindeks', $id);
		$this->db->delete('pengindeks');
		if($this->db->affected_rows() > 0)
		{
		    return true; // to the controller
		} else {
				return false;
		}
	}

	function update_pengindeks($id,$data){
		$this->db->where('id_pengindeks', $id);
		$this->db->update('pengindeks', $data);
		if($this->db->affected_rows() > 0)
		{
		    return true; // to the controller
		} else {
				return false;
		}
	}
	function getPengindeksById($id){
		$this->db->where('id_pengindeks',$id);
		return $this->db->get('pengindeks')->row();

	}
	function tampil_lembaga(){
		return $this->db->get('lembaga')->result();
	}
	function input_lembaga($data){

		return $this->db->insert('lembaga', $data) ? true : false;
	}
	function delete_lembaga($id){
		$this->db->where('id_lembaga', $id);
		$this->db->delete('lembaga');
		if($this->db->affected_rows() > 0)
		{
		    return true; // to the controller
		} else {
				return false;
		}
	}
	function getLembagaById($id){
		$this->db->where('id_lembaga',$id);
		return $this->db->get('lembaga')->row();

	}
	// function tampil_data_coba(){
  // 	$query= "SELECT
  //   jurnal.id_jurnal,
	// 	jurnal.judul AS nama_jurnal,
  //   jurnal.id_penerbit AS id_penerbit1,
	// 	jurnal.singkatan AS singkatan,
  //   jurnal.no_jurnal AS no_jurnal,
  //   jurnal.sponsor AS sponsor,
  //   jurnal.e_issn AS e_issn,
  //   jurnal.p_issn AS p_issn,
  //   jurnal.english AS english,
  //   jurnal.thn_mulai AS tahun_mulai,
  //   jurnal.no_terakhir AS no_terakhir,
  //   jurnal.terbit_terakhir AS terbit_terakhir,
  //   jurnal.frekuensi AS frekuensi,
  //   jurnal.bln_terbit1 AS bln_terbit1,
  //   jurnal.bln_terbit2 AS bln_terbit2,
  //   jurnal.bln_terbit3 AS bln_terbit3,
  //   jurnal.bln_terbit4 AS bln_terbit4,
  //   jurnal.doi AS DOI
	// 	-- data_pengelola.nama AS pengelola
	// 	FROM jurnal WHERE id_penerbit IN
	// 		(SELECT
	//     penerbit.id_penerbit AS id_penerbit1,
	// 		fakultas.nama_fak AS fakultas,
	// 		departemen.nama_dept AS departemen,
	//     lembaga.nama_lembaga AS lembaga,
	//     lab.nama_lab AS lab
	// 		FROM ((((penerbit
	//     LEFT JOIN fakultas ON penerbit.id_fak = fakultas.id_fak)
	//     LEFT JOIN departemen ON penerbit.id_dept = departemen.id_dept)
	//     LEFT JOIN lembaga ON penerbit.id_lembaga = lembaga.id_lembaga)
	//     LEFT JOIN lab ON penerbit.id_lab = lab.id_lab));
	// 	 	-- JOIN data_pengelola ON jurnal.id_pengelola = data_pengelola.id_pengelola
	// 		-- JOIN penerbit ON jurnal.id_penerbit = penerbit.id_penerbit
	// 	";
  // 	return $this->db->query($query);
  // }
	// function get_auth($tabel, $where)
	// {
	//  return	$this->db->get_where($tabel, $where)->row();
	// }
	// function input_data($tabel,$data)
  // {
  //    $this->db->insert($tabel,$data);
  // }
	// function edit($data){
  // $this->db->where($data);
  // $edit = $this->db->get('auth');
  // return $edit->result();
  // }
  // function update($data,$id){
  // 	$this->db->where('id_user', $id);
  // 	$this->db->update('data_pengelola',$data);
  // }
	// function updatepassword($data,$id){
	// 	$where = ['id_user'=> $id];
	// 	$query = $this->db->update('auth',$data,$where);
	// 	return $query;
	// }
	// function get_one($id)
	//  {
	// 		 $param = array('id_user'=>$id);
	// 		 return $this->db->get_where('data_pengelola',$param);
	//  }
	//  function getPassword($id){
	// 	 $param = array('id_user'=>$id);
	// 	 return $this->db->get_where('auth',$param)->result();
	//  }
	//  function update_photo($id,$data){
  //  $this->db->where('username', $id);
  //  $this->db->update('data_pengelola',$data);
  //  }
	//  function delete_pengelola($id)
	//  {
	// 	   $query1 = $this->db->delete('auth', array('id_user' => $id));
	// 		 $query2 = $this->db->delete('data_pengelola', array('id_user' => $id));
	// 		 if($query1 && $query2){
	// 			 return true;
	// 		 }else{
	// 			 return false;
	// 		 }
	//  }
	//  function get_where()
 	//  {
 	// 		 $param = array('username'=> $this->input->post('inputusername'));
 	// 		 $result = $this->db->get_where('auth',$param)->row();
 	// 		 return $result;
 	//  }
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

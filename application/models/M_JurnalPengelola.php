<?php

class M_JurnalPengelola extends CI_Model{

  function tampil_data($id){
    $this->db->select('id_jurnal, judul, singkatan ');
    $this->db->where('id_pengelola',$id);
    return $this->db->get('jurnal')->result();

  }




}

?>

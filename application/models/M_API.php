<?php

class M_API extends CI_Model{
	   public function getFakultas() {
          $this->db->select('id_fak AS id, nama_fak AS nama');
          return $this->db->get('fakultas')->result();
     }
     public function getDepartemen() {
          $this->db->select('id_dept AS id, nama_dept AS nama');
          return $this->db->get('departemen')->result();
     }
     public function getLab() {
          $this->db->select('id_lab AS id, nama_lab AS nama');
          return $this->db->get('lab')->result();
     }
     public function getLembaga() {
          $this->db->select('id_lembaga AS id, nama_lembaga AS nama');
          return $this->db->get('lembaga')->result();
     }
}

?>

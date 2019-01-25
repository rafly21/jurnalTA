<?php
class M_Jurnal extends CI_Model{
	function getFakultas($id=null){
		if($id!==NULL){
			$this->db->where('id_fak',$id);
		}
		$result = $this->db->get('fakultas');
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
// 	function tampil_data(){
// 		$this->db->select('*');
// 			$this->db->from('jurnal');
// 		$this->db->join('data_pengelola','jurnal.id_pengelola = data_pengelola.id_pengelola');
// 			$this->db->join('penerbit','jurnal.id_penerbit = penerbit.id_penerbit');
// 			$query = $this->db->get()->result();
// 			return $query;
//   }
// 	function tampil_data2(){
// 		$this->db->select('penerbit.id_penerbit AS penerbit,
// 			fakultas.nama_fak AS fakultas,
// 			departemen.nama_dept AS departemen,
// 			lembaga.nama_lembaga AS lembaga,
// 			lab.nama_lab AS lab');
// 		$this->db->from ('penerbit');
// 		$this->db->join('fakultas',' penerbit.id_fak = fakultas.id_fak','left');
// 		$this->db->join('departemen','penerbit.id_dept = departemen.id_dept','left');
// 		$this->db->join('lembaga','penerbit.id_lembaga = lembaga.id_lembaga','left');
// 		$this->db->join('lab','penerbit.id_lab = lab.id_lab','left');
// 		$query = $this->db->get()->result();
// 	}
	public function getFakultasPenerbit() {
		$query = 'SELECT DISTINCT fakultas.nama_fak, fakultas.id_fak FROM fakultas JOIN departemen ON departemen.id_fak = fakultas.id_fak WHERE fakultas.id_fak IN (SELECT penerbit.id_jenis FROM penerbit WHERE penerbit.jenis_penerbit = "fakultas") OR fakultas.id_fak IN (SELECT fakultas.id_fak FROM fakultas JOIN departemen ON fakultas.id_fak = departemen.id_fak JOIN penerbit ON departemen.id_dept = penerbit.id_jenis WHERE penerbit.jenis_penerbit = "departemen")';

		return $this->db->query($query)->result();
	}
	// ===================================== GRAPH ===================================

		public function countJurnalAkreditasiByDepartemen($tahun=null, $sinta=null) {
				$this->db->select("COUNT(DISTINCT skj.id_jurnal) as jumlah, d.id_fak as fakultas");
				if ($tahun !== null) {
					$this->db->where('YEAR(skj.tanggal_mulai)', $tahun);
				}

				if ($sinta !== null) {
					$this->db->select('skj.peringkat_sinta as sinta');
					$this->db->where('peringkat_sinta', $sinta);
				}

				$this->db->join('penerbit p', 'skj.id_jurnal = p.id_jurnal AND p.jenis_penerbit = "departemen"');
				$this->db->join('departemen d', 'd.id_dept = p.id_jenis');
				// $this->db->where('p.jenis_penerbit', 'departemen');
				$this->db->where('skj.dihapus_pada', NULL);
				$this->db->group_by('d.id_fak');
				// $this->db->order_by('skj.id_sk_jurnal', 'DESC');
				return $this->db->get('sk_jurnal skj')->result();
		}

		public function countJurnalAkreditasiByLembaga($tahun=null, $sinta=null) {
				$this->db->select("COUNT(DISTINCT skj.id_jurnal) as jumlah");
				if ($tahun !== null) {
					$this->db->where('YEAR(skj.tanggal_mulai)', $tahun);
				}
				if ($sinta !== null) {
					$this->db->select('skj.peringkat_sinta as sinta');
					$this->db->where('peringkat_sinta', $sinta);
				}
				// $this->db->join('sk', 'skj.id_sk = sk.id_sk');
				$this->db->join('penerbit p', 'skj.id_jurnal = p.id_jurnal AND p.jenis_penerbit = "lembaga"');
				// $this->db->where('p.jenis_penerbit', 'lembaga');
				// $this->db->where('YEAR(sk.tahun_mulai)', '2018', NULL, FALSE);
				$this->db->where('skj.dihapus_pada', NULL);
				$this->db->group_by('p.id_jenis');
				// $this->db->order_by('skj.id_sk_jurnal', 'DESC');
				return $this->db->get('sk_jurnal skj')->result();
		}

		public function countJurnalAkreditasiByFakultas($tahun=null, $sinta=null) {
				$this->db->select("COUNT(DISTINCT skj.id_jurnal) as jumlah, p.id_jenis as fakultas");
				if ($tahun !== null) {
					$this->db->where('YEAR(skj.tanggal_mulai)', $tahun);
				}
				if ($sinta !== null) {
					$this->db->select('skj.peringkat_sinta as sinta');
					$this->db->where('peringkat_sinta', $sinta);
				}
				// $this->db->join('sk', 'skj.id_sk = sk.id_sk');
				$this->db->join('penerbit p', 'skj.id_jurnal = p.id_jurnal AND p.jenis_penerbit = "fakultas"');
				$this->db->join('fakultas f', 'f.id_fak = p.id_jenis');
				// $this->db->where('p.jenis_penerbit', 'fakultas');
				// $this->db->where('YEAR(sk.tahun_mulai)', '2018', NULL, FALSE);
				$this->db->group_by('f.id_fak');
				// $this->db->order_by('skj.id_sk_jurnal', 'DESC');
				$this->db->where('skj.dihapus_pada', NULL);
				return $this->db->get('sk_jurnal skj')->result();
		}
		public function countJurnalAkreditasiByYear($tahun=null) {
				$this->db->select("skj.id_jurnal");
				$this->db->from('sk_jurnal skj');
				$this->db->where('skj.dihapus_pada', NULL);
				if ($tahun !== null) {
					$this->db->where('YEAR(skj.tanggal_mulai)', $tahun);
				}
				// $this->db->join('sk', 'skj.id_sk = sk.id_sk');
				// $this->db->join('penerbit p', 'skj.id_jurnal = p.id_jurnal AND p.jenis_penerbit = "fakultas"');
				// $this->db->join('fakultas f', 'f.id_fak = p.id_jenis');
				// $this->db->where('p.jenis_penerbit', 'fakultas');
				// $this->db->where('YEAR(sk.tahun_mulai)', '2018', NULL, FALSE);
				// $this->db->group_by('f.id_fak');
				// $this->db->order_by('skj.id_sk_jurnal', 'DESC');
				return $this->db->count_all_results();
		}

		public function countJurnalAkreditasiBySinta($sinta=null) {
				$this->db->select("id_jurnal");
				$this->db->from('jurnal j');
				$this->db->join('sk_jurnal skj', 'skj.id_jurnal = j.id_jurnal');
				$this->db->where('skj.dihapus_pada', NULL);
				if ($sinta) {
					$this->db->where('skj.peringkat_sinta', $sinta);
				}
				return $this->db->count_all_results();
		}

		public function countJurnalAkreditasiByPengindeks($pengindeks=null) {
				$this->db->select("COUNT(jp.id_jurnal) as jumlah, p.nama");
				$this->db->from('jurnal_pengindeks jp');
				$this->db->join('pengindeks p', 'jp.id_pengindeks = p.id_pengindeks');
				$this->db->group_by("jp.id_pengindeks");
				if ($pengindeks) {
					$this->db->where('LOWER(p.nama)', $pengindeks);
				}
				$res = $this->db->get()->row();
				return $res;
				// die(var_dump($res->jumlah));
		}

		// ===================================== END OF GRAPH ==================================
	public function getJurnalAkreditasi() {
		$countLembaga = $this->countJurnalAkreditasiByLembaga();
		$countFakultas = $this->countJurnalAkreditasiByFakultas();
		$countDepartemen = $this->countJurnalAkreditasiByDepartemen();


		// $this->db->select('skj.id_jurnal, p.jenis_penerbit, p.id_jenis');
		// $this->db->from('sk_jurnal skj');
		// $this->db->join('sk', 'skj.id_sk = sk.id_sk');
		// $this->db->join('penerbit p', 'skj.id_jurnal = p.id_jurnal');
		// $this->db->join('fakultas f', 'p.')
		// $this->db->where('YEAR(sk.tanggal_mulai)', $tahun);
		// $this->db->group_by('skj.id_jurnal');
		// $this->db->order_by('skj.id_sk_jurnal', 'DESC');
		// $count = $this->db->count_all_results();

		// $this->db->select('jenis_penerbit as jenis, id_jenis as id');
		// $this->db->join('jurnal j', 'j.id_jurnal = p.id_jurnal');
		// // $this->db->where('p.id_jurnal', $jurnal);
		// $penerbit = $this->db->get('penerbit p')->row();
		//
		// if ($penerbit->jenis === 'departemen') {
		// 	$fid = 'id_dept';
		// 	$fname = 'nama_dept';
		// }
		// if ($penerbit->jenis === 'fakultas') {
		// 	$fid = 'id_fak';
		// 	$fname = 'nama_fak';
		// }
		// if ($penerbit->jenis === 'lembaga') {
		// 	$fid = 'id_lembaga';
		// 	$fname = 'nama_lembaga';
		// }
		// if ($penerbit->jenis === 'lab') {
		// 	$fid = 'id_lab';
		// 	$fname = 'nama_lab';
		// }
		// $fakultasPenerbit = $this->getNamaPenerbit($penerbit->jenis, $fid, $fname, $penerbit->id)[0];

		$result = [
			"l" => $countLembaga,
			"f"   => $countFakultas,
			"d" => $countDepartemen
		];
		return $result;
		// return $this->db->get()->result();
	}

	public function getPenerbitJurnal($jurnal) {
		$this->db->select('jenis_penerbit as jenis, id_jenis as id');
		$this->db->join('jurnal j', 'j.id_jurnal = p.id_jurnal');
		$this->db->where('p.id_jurnal', $jurnal);
		$penerbit = $this->db->get('penerbit p')->row();

		if ($penerbit->jenis === 'departemen') {
			$fid = 'id_dept';
			$fname = 'nama_dept';
		}
		if ($penerbit->jenis === 'fakultas') {
			$fid = 'id_fak';
			$fname = 'nama_fak';
		}
		if ($penerbit->jenis === 'lembaga') {
			$fid = 'id_lembaga';
			$fname = 'nama_lembaga';
		}
		if ($penerbit->jenis === 'lab') {
			$fid = 'id_lab';
			$fname = 'nama_lab';
		}
		return $this->getNamaPenerbit($penerbit->jenis, $fid, $fname, $penerbit->id, true)[0];
	}

	function getNamaPenerbit($table, $kolom_id, $kolom_nama, $id, $showDept=null) {
		if ($table === 'departemen') {
			$this->db->where($kolom_id, $id);
			$dept = $this->db->get($table)->row();

			$this->db->where('id_fak', $dept->id_fak);
			$fak = $this->db->get('fakultas')->row();

			if($showDept) {
				return array((object)array('nama' => $dept->nama_dept.", ".$fak->nama_fak));
			} else {
				return array((object)array('nama' => $fak->nama_fak));
			}
		} else {
			$this->db->select("$kolom_nama AS nama");
			$this->db->where($kolom_id, $id);
			return $this->db->get($table)->result();
		}
	}

	function tampil_data($filter=null) {
		if($filter !== null) {
			 // $this->db->join('bulan_penerbitan bp', 'bp.id_jurnal = j.id_jurnal');
			 // $this->db->join('jurnal_pengindeks jp', 'jp.id_jurnal = j.id_jurnal');
			 // $this->db->join('pengindeks pn', 'pn.id_pengindeks = jp.id_pengindeks');

			 if($filter['portal'] !== null) {
				  $this->db->where('j.id_portal', $filter['portal']);
			 }
			 if($filter['akreditasi'] !== null) {
				  $this->db->where('j.peringkat_sinta', $filter['akreditasi']);
			 }
			 if($filter['penerbit'] !== null) {
				 $id = $filter['penerbit'];
				 $this->db->join('penerbit', 'penerbit.id_jurnal = j.id_jurnal');
				 $this->db->where("(penerbit.id_jenis = ANY(SELECT departemen.id_dept FROM departemen JOIN fakultas ON departemen.id_fak = fakultas.id_fak WHERE fakultas.id_fak = $id) AND penerbit.jenis_penerbit = 'departemen') OR (penerbit.id_jenis = ANY(SELECT fakultas.id_fak FROM fakultas WHERE fakultas.id_fak = $id) AND penerbit.jenis_penerbit = 'fakultas')", NULL, FALSE);
			 }
			 if($filter['tahun_mulai'] !== null) {
				  $this->db->where('j.thn_mulai', $filter['tahun_mulai']);
			 }
			 if($filter['blnterbit'] !== null) {
				 $this->db->join('bulan_penerbitan bp', 'bp.id_jurnal = j.id_jurnal');
				  $this->db->where_in('bp.bulan_terbit', $filter['blnterbit']);
			 }
			 if($filter['bahasa'] !== null) {
				  $this->db->where('j.english', $filter['bahasa']);
			 }
			 if($filter['pengindeks'] !== null) {
				 $this->db->join('jurnal_pengindeks jp', 'jp.id_jurnal = j.id_jurnal');
				  $this->db->where_in('jp.id_pengindeks', $filter['pengindeks']);
			 }
			 if($filter['eissn'] !== null) {
				 	if($filter['eissn'] === 'yes') {
						$this->db->where('j.e_issn !=', '');
					} else {
						$this->db->where('j.e_issn', '');
					}
			 }
			 if($filter['DOI'] !== null) {
				 	if($filter['DOI'] === 'yes') {
						$this->db->where('j.doi !=', '');
					} else {
						$this->db->where('j.doi', '');
					}
			 }

		}
		$this->db->distinct();
		$this->db->join('penerbit p', 'p.id_jurnal = j.id_jurnal');
		$this->db->join('data_pengelola d', 'd.id_pengelola = j.id_pengelola');
		$this->db->order_by('j.id_jurnal','asc');
		return $this->db->get('jurnal j')->result();
	}
	function tampil_dataacr()
	{
		// $this->db->select('j.judul, j.no_jurnal, j.url, j.singkatan, d.nama, j.sponsor, j.p_issn, j.e_issn, j.english, j.doi, j.thn_mulai, j.terbit_terakhir, j.peringkat_sinta, j.url_sinta, sj.id_sk, p.id_penerbit, p.jenis_penerbit, p.id_jenis');
		// $this->db->distinct();
		$this->db->join('penerbit p', 'p.id_jurnal = j.id_jurnal');
		$this->db->join('data_pengelola d', 'd.id_pengelola = j.id_pengelola');
		$this->db->join('sk_jurnal sj', 'sj.id_jurnal = j.id_jurnal');
		$this->db->where('sj.dihapus_pada', NULL);
		$this->db->group_by('j.id_jurnal');
		$this->db->order_by('j.id_jurnal','asc');

		return $this->db->get('jurnal j')->result();
	}

	function tampil_data_eng()
	{
		$this->db->join('penerbit p', 'p.id_jurnal = j.id_jurnal');
		$this->db->join('data_pengelola d', 'd.id_pengelola = j.id_pengelola');
		$this->db->order_by('j.id_jurnal','asc');
		$this->db->where('english',1);
		return $this->db->get('jurnal j')->result();
	}

	function detail_data($id){
		// $this->db->select()
		$this->db->join('penerbit p', 'p.id_jurnal = j.id_jurnal');
		$this->db->join('data_pengelola d', 'd.id_pengelola = j.id_pengelola');
		// $this->db->join('sk_jurnal sj', 'sj.id_jurnal = j.id_jurnal');
		// $this->db->join('pengindeks ps', 'jp.id_pengindeks = ps.id_pengindeks');
		// $this->db->join('sk s', 'j.id_jurnal = s.id_jurnal');
		$this->db->join('portal pt', 'j.id_portal = pt.id_portal');
		// $this->db->join('bulan_penerbitan bp', 'j.id_jurnal = bp.id_jurnal');
		$this->db->where('j.id_jurnal', $id);

		// var_dump($this->db->get('jurnal j')->row());
		// die();
		return $this->db->get('jurnal j')->row();
	}
	function getJurnalPengindeks($jurnal, $onlyId = null){
		$this->db->join('jurnal j', 'jp.id_jurnal = j.id_jurnal');
		$this->db->join('pengindeks ps', 'jp.id_pengindeks = ps.id_pengindeks');
		$this->db->where('jp.id_jurnal',$jurnal);

		if ($onlyId) {
			$this->db->select('ps.id_pengindeks');
			$res =	$this->db->get('jurnal_pengindeks jp')->result_array();
			$data = array();
			foreach ($res as $key => $value) {
					array_push($data, $value['id_pengindeks']);
			}
			return $data;
		} else {
			$this->db->select('ps.nama, jp.url_pengindeks');
			return	$this->db->get('jurnal_pengindeks jp')->result();
		}

	}

	function getNamaBulan($id) {
			$id = intval($id);
			if($id === 1) {
					return 'Januari';
			}
			if($id === 2) {
					return 'Februari';
			}
			if($id === 3) {
					return 'Maret';
			}
			if($id === 4) {
					return 'April';
			}
			if($id === 5) {
					return 'Mei';
			}
			if($id === 6) {
					return 'Juni';
			}
			if($id === 7) {
					return 'Juli';
			}
			if($id === 8) {
					return 'Agustus';
			}
			if($id === 9) {
					return 'September';
			}
			if($id === 10) {
					return 'Oktober';
			}
			if($id === 11) {
					return 'November';
			}
			if($id === 12) {
					return 'Desember';
			}
	}

	public function getBulanTerbit($jurnal) {
			$this->db->select('bp.bulan_terbit');
			// $this->db->group_by('bp.id_jurnal');
		 	$this->db->join('jurnal j', "j.id_jurnal = bp.id_jurnal");
			$this->db->where("bp.id_jurnal", $jurnal);
			$res = $this->db->get('bulan_penerbitan bp')->result_array();
			$data = array();
			// $db = array();
			foreach ($res as $key => $value) {
					foreach ($value as $k => $b) {
							$db[$key] = $this->getNamaBulan($b);
					}
					array_push($data, $db[$key]);
			}
			return implode(', ',$data);
	}

	public function getIdBulanTerbit($jurnal){
		$this->db->select('bulan_terbit');
		$this->db->where('id_jurnal',$jurnal);
		$res = $this->db->get('bulan_penerbitan')->result_array();
		$data = array();
		foreach ($res as $key => $value) {
				array_push($data, $value['bulan_terbit']);
		}
		return $data;
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

	public function deleteSKJurnal($jurnal) {
		$this->db->where('id_jurnal', $jurnal);
		$this->db->order_by('id_jp', 'DESC');
		$this->db->limit(1);
		$this->db->delete('sk_jurnal');
	}

	public function deleteSK($jurnal,$data=null) {
		$this->db->where('id_sk_jurnal', $jurnal);
		if($data != null) {
				$this->db->update('sk_jurnal', $data);
		} else {
			 $this->db->delete('sk_jurnal');
		}
		if($this->db->affected_rows() > 0)
		{
				return true; // to the controller
		} else {
				return false;
		}
	}
	// function update_pengindeks($id,$data){
	// 	$this->db->where('id_pengindeks', $id);
	// 	$this->db->update('pengindeks', $data);
	// 	if($this->db->affected_rows() > 0)
	// 	{
	// 	    return true; // to the controller
	// 	} else {
	// 			return false;
	// 	}
	// }
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


	// function tampil_data_coba(){
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
	function update_lembaga($id,$data){
		$this->db->where('id_lembaga', $id);
		$this->db->update('lembaga', $data);
		if($this->db->affected_rows() > 0)
		{
		    return true; // to the controller
		} else {
				return false;
		}
}
function tampil_lab(){
	return $this->db->get('lab')->result();

}
function input_lab($data){

	return $this->db->insert('lab', $data) ? true : false;
}
function delete_lab($id){
	$this->db->where('id_lab', $id);
	$this->db->delete('lab');
	if($this->db->affected_rows() > 0)
	{
			return true; // to the controller
	} else {
			return false;
	}
}
function getLabById($id){
	$this->db->where('id_lab',$id);
	return $this->db->get('lab')->row();

}
function update_lab($id,$data){
	$this->db->where('id_lab', $id);
	$this->db->update('lab', $data);
	if($this->db->affected_rows() > 0)
	{
			return true; // to the controller
	} else {
			return false;
	}
}
function tampil_sk()
{
	return $this->db->get('sk')->result();

}
function input_sk($data)
{
	return $this->db->insert('sk', $data) ? true : false;

}
function delete_sk($id){
	$this->db->where('id_sk', $id);
	$this->db->delete('sk');
	if($this->db->affected_rows() > 0)
	{
			return true; // to the controller
	} else {
			return false;
	}
}
function getSKById($id){
	$this->db->where('id_sk',$id);
	return $this->db->get('sk')->row();

}
function update_sk($id,$data){
	$this->db->where('id_sk',$id);
	$this->db->update('sk', $data);
	if($this->db->affected_rows() > 0)
	{
			return true; // to the controller
	} else {
			return false;
	}
}
function tampil_dept()
{
	$this->db->order_by('id_fak', 'ASC');
	return $this->db->get('departemen')->result();

}
function input_dept($data)
{

	return $this->db->insert('departemen', $data) ? true : false;

}
function getDeptById($id){
	$this->db->where('id_dept',$id);
	return $this->db->get('departemen')->row();

}
function delete_dept($id)
{
	$this->db->where('id_dept', $id);
	$this->db->delete('departemen');
	if($this->db->affected_rows() > 0)
	{
			return true; // to the controller
	} else {
			return false;
	}
}

function update_dept($id,$data)
{
	$this->db->where('id_dept', $id);
	$this->db->update('departemen', $data);
	if($this->db->affected_rows() > 0)
	{
			return true; // to the controller
	} else {
			return false;
	}
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
	public function update_jurnal($data,$id)
	{
		$this->db->where('id_jurnal',$id);
		$this->db->update('jurnal',$data);
		if($this->db->affected_rows() > 0)
		{
				return true; // to the controller
		} else {
				return false;
		}

	}
	public function deletePenerbitanJurnal($id) {
		$this->db->where('id_jurnal',$id);
		$this->db->delete('bulan_penerbitan');

	}
	public function deleteJurnalPengindeks($id) {
		$this->db->where('id_jurnal',$id);
		$this->db->delete('jurnal_pengindeks');
	}
 	// public function update_penerbitan($data,$field,$id) {
	// 	$this->db->where($field,$id);
	// 	$this->db->delete('bulan_penerbitan');
	// 	if($this->db->affected_rows() > 0)
	// 	{
	// 			return $this->add_penerbitan($data);
	// 	} else {
	// 			return false;
	// 	}

	// }

	public function update_penerbit($data,$field,$id) {
		 $this->db->where($field,$id);
		 $this->db->update('penerbit', $data);
		 if($this->db->affected_rows() > 0)
 		{
 				return true; // to the controller
 		} else {
 				return false;
 		}
	}
	public function update_pengindeks($data,$field,$id) {
		 $this->db->where($field,$id);
		 $this->db->update('pengindeks', $data);
		 if($this->db->affected_rows() > 0)
 		{
 				return true; // to the controller
 		} else {
 				return false;
 		}
	}

	public function updateJurnalPengindeks($data,$field,$id) {
		 $this->db->where($field,$id);
		 $this->db->delete('jurnal_pengindeks');
		 if($this->db->affected_rows() > 0)
	 		{
	 			return $this->add_pengindeks($data);
	 		} else {
	 				return false;
	 		}
	}

	public function updateSkJurnal($data,$field,$id) {
		$this->db->where($field,$id);
		$this->db->update('sk_jurnal', $data);
		if($this->db->affected_rows() > 0)
		 {
				 return true; // to the controller
		 } else {
				 return false;
		 }
		}

		public function delete_jurnal($id,$data=null)
		{
			$this->db->where('id_jurnal', $id);
			if($data != null) {
					$this->db->update('jurnal', $data);
			} else {
				 $this->db->delete('jurnal');
			}
			if($this->db->affected_rows() > 0)
			{
					return true; // to the controller
			} else {
					return false;
			}
		}


	public function add_jurnal($data, $isReturnId = null) {
		if($isReturnId) {
			$this->db->insert('jurnal', $data);
			return $this->db->insert_id();
		} else {
			return $this->db->insert('jurnal', $data) ? true : false;
		}
	}

	public function add_penerbitan($data) {
		return $this->db->insert('bulan_penerbitan', $data) ? true : false;
	}

	public function add_penerbit($data) {
		return $this->db->insert('penerbit', $data) ? true : false;
	}

	public function add_pengindeks($data) {
		return $this->db->insert('jurnal_pengindeks', $data) ? true : false;
	}

	public function getPengindeksName($id) {
		$this->db->select('nama');
		$this->db->where('id_pengindeks', $id);
		return $this->db->get('pengindeks')->row();
	}

	public function add_sk($data) {
		return $this->db->insert('sk', $data) ? true : false;
	}


	public function addSkJurnal($data) {
			return $this->db->insert('sk_jurnal', $data) ? true : false;
		}


		function getSkJurnal($jurnal, $all=null) {
			$this->db->join('sk s', 's.id_sk = sj.id_sk');
			$this->db->where('id_jurnal',$jurnal);
			$this->db->where('dihapus_pada',NULL);
			$this->db->order_by('id_sk_jurnal', 'desc');
			if($all) {
					return $this->db->get('sk_jurnal sj')->result();
			} else {
				$this->db->limit(1);
				return $this->db->get('sk_jurnal sj')->row();
			}
		}
	function getJurnalById($id){
		$this->db->join('penerbit p', 'j.id_jurnal = p.id_jurnal');
		$this->db->where('j.id_jurnal',$id);
		return $this->db->get('jurnal j')->row();

	}
	function getJurnalBySK($idsk){
		$this->db->where('id_sk_jurnal', $idsk);
		$this->db->select('id_jurnal');
		return $this->db->get('sk_jurnal')->row();
	}

	// Data charts
	// public function getJumlahJurnalAkreditasiByFakultas() {
	// 		$this->db->select()
	// }

}
   ?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->load->model('M_Jurnal');

			if($this->session->userdata('permission') != NULL){
				redirect("cekpermission");
			}
		}

	public function index()
	{
		$data['datajurnal'] = $this->M_Jurnal->tampil_data();
		$data['dataacr'] = $this->M_Jurnal->tampil_dataacr();
		// $data['dataeng'] = $this->M_Jurnal->tampil_data_eng();

		$data['dataeng'] = $this->M_Jurnal->tampil_data_eng();
		$data["graphDataJurnalAkreditasiByPenerbitSinta"] = $this->getGraphDataJurnalAkreditasiByPenerbitSinta();
		$data["graphDataJurnalAkreditasiByYear"] = $this->getGraphDataJurnalAkreditasiByYear();
		$data["graphDataJurnalAkreditasiByPenerbit"] = $this->getGraphDataJurnalAkreditasiByPenerbit();
		$data["graphDataJurnalAkreditasiBySinta"] = $this->getGraphDataJurnalAkreditasiBySinta();
		$data["graphDataJurnalAkreditasiByPengindeks"] = $this->getGraphDataJurnalAkreditasiByPengindeks();

		// var_dump($coba);
		// die();

		$this->load->view('guest/home',$data);
	}
	// ================================ GRAPH ==============================================



		function getGraphDataJurnalAkreditasiByPenerbitSinta($tahun=null) {
			$sinta = ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'];
			$faks = $this->M_Jurnal->getFakultas();
			$categories = array();
			$resultSeries = array();

			if (empty($categories)) {
				$categories[0] = "Puslit/lembaga";
			}

			foreach ($faks as $v) {
				$categories[$v->id_fak] = $v->nama_fak;
			}

			for ($i = 0; $i < count($sinta); $i++) {
				$byLembaga = $this->M_Jurnal->countJurnalAkreditasiByLembaga($tahun, $sinta[$i]);
				$byFakultas = $this->M_Jurnal->countJurnalAkreditasiByFakultas($tahun, $sinta[$i]);
				$byDepartemen = $this->M_Jurnal->countJurnalAkreditasiByDepartemen($tahun, $sinta[$i]);
				$series = array_fill(0, count($categories), 0);
				for ($j = 0; $j < count($categories) ; $j++) {
					$series[$j] = 0;
				}

				if (!empty($byLembaga)) {
					foreach ($byLembaga as $key => $v) {
						if (isset($series[0])) {
							$series[0] += intval($v->jumlah);
						} else {
							$series[0] = intval($v->jumlah);
						}
					}
				}

				if (!empty($byDepartemen)) {
					foreach ($byDepartemen as $key => $v) {
						if (isset($series[$v->fakultas])) {
							$series[$v->fakultas] += intval($v->jumlah);
						} else {
							$series[$v->fakultas] = intval($v->jumlah);
						}
					}
				}

				if (!empty($byFakultas)) {
					foreach ($byFakultas as $key => $v) {
						if (isset($series[$v->fakultas])) {
							$series[$v->fakultas] += intval($v->jumlah);
						} else {
							$series[$v->fakultas] = intval($v->jumlah);
						}
					}
				}

				array_push($resultSeries, [
					'name' => $sinta[$i],
					'data' => $series,
				]);

			}

			return json_encode([
				'categories' => $categories,
				'series' => $resultSeries
			]);
		}

		function getGraphDataJurnalAkreditasiByPenerbit($tahun=null) {
			$byLembaga = $this->M_Jurnal->countJurnalAkreditasiByLembaga($tahun);
			$byFakultas = $this->M_Jurnal->countJurnalAkreditasiByFakultas($tahun);
			$byDepartemen = $this->M_Jurnal->countJurnalAkreditasiByDepartemen($tahun);

			$total = 0;
			foreach ($byLembaga as $key => $value) {
					$total += intval($value->jumlah);
			}
			$data["gFakultas"][0]["name"] = "Puslit/lembaga";
			$data["gFakultas"][0]["y"] = $total;

			foreach ($byDepartemen as $key => $value) {
					$namaFakultas = $this->M_Jurnal->getFakultas($value->fakultas)[0]->nama_fak;
					$fakultas["name"] = $namaFakultas;
					$fakultas["y"] = intval($value->jumlah);
					$data["gFakultas"][$value->fakultas] = $fakultas;
			}

			foreach ($byFakultas as $key => $value) {
					$namaFakultas = $this->M_Jurnal->getFakultas($value->fakultas)[0]->nama_fak;
					if(isset($data["gFakultas"][$value->fakultas])) {
							$data["gFakultas"][$value->fakultas]["y"] += $value->jumlah;
					} else {
						$fakultas["name"] = $namaFakultas;
						$fakultas["y"] = intval($value->jumlah);
						$data["gFakultas"][$value->fakultas] = $fakultas;
					}
			}

			$result = array();
			// $colors = ["#0058B2", "#B21C12", "#E6FF19", "#8812B2", "#14CC7E", "#00C0CC", "#998C3D", "#FF5800", "#400300", "#B4BCE5", "#E5AB63", "#FF1C00", "#FFA593", "#B8E886"];
			foreach ($data["gFakultas"] as $key => $value) {
				$value = (object)$value;
				// $value->color = $colors[$key];
				// $value->highlight = $colors[$key];
				array_push($result, $value);
			}

			return json_encode($result);
		}

		function getGraphDataJurnalAkreditasiByYear() {
			$year = date('Y')-4;
			$months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
			$data = null;
			for ($i = 0; $i < 5; $i++) {
				$jurnal = $this->M_Jurnal->countJurnalAkreditasiByYear($year);
				$data['years'][$i] = $year;
				$data['jurnal'][$i] = $jurnal;
				if ($i > 0) {
					$data['kumulatif'][$i] = $data['kumulatif'][$i-1] + $jurnal;
				} else {
					$data['kumulatif'][$i] = $data['jurnal'][$i];
				}
				$year += 1;
			}
			$data['year'] = date('Y');
			$data['month'] = $months[date('n')-1];

			return json_encode((object)$data);
		}

		function getGraphDataJurnalAkreditasiBySinta() {
		// $year = date('Y')-4;
		$sinta = ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'];
		// for ($i = 0; $i < count($sinta); $i++) {
		// 	$jurnal = $this->M_Jurnal->countJurnalAkreditasiBySinta($sinta[$i]);
		// 	$data['jumlah'][$i] = $jurnal;
		// }
		$res = $this->M_Jurnal->countJurnalAkreditasiBySinta();
		$jumlah = [0,0,0,0,0,0];
		foreach ($res as $key => $val) {
			for ($i = 0; $i < count($sinta); $i++) {
				if($val['ps'] === $sinta[$i]) {
					$jumlah[$i] += 1;
				}
			}
		}

		// die(var_dump($jumlah[0]));
		$data['jumlah'] = $jumlah;
		$data['kategori'] = $sinta;

		return json_encode((object)$data);
	}

		function getGraphDataJurnalAkreditasiByPengindeks() {
			$pengindeks = ['DOAJ', 'ESCI', 'Scopus', 'EBSCO'];
			$res = null;
			// $data = $this->M_Jurnal->countJurnalAkreditasiByPengindeks($pengindeks[0]);
			for ($i = 0; $i < count($pengindeks); $i++) {
				$d = $this->M_Jurnal->countJurnalAkreditasiByPengindeks(strtolower($pengindeks[$i]));
				if ($d !== null) {
					$res['categories'][$i] = $d->nama;
					$res['jumlah'][$i] = (int)$d->jumlah;
				} else {
					$res['categories'][$i] = $pengindeks[$i];
					$res['jumlah'][$i] = 0;
				}
			}
			return json_encode($res);
		}
}

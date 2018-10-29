<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

  	function __construct(){
      	parent::__construct();
      	$this->load->database();
      	$this->load->model('M_API');
      	$this->load->helper('url');
  	}

    public function getPenerbit($penerbit) {
        $data = null;
        switch ($penerbit) {
          case 'fakultas':
            $data = $this->M_API->getFakultas();
            break;
          case 'departemen':
            $data = $this->M_API->getDepartemen();
            break;
          case 'lembaga':
            $data = $this->M_API->getLembaga();
            break;
          case 'lab':
            $data = $this->M_API->getLab();
            break;
          default:
            break;
        }

        echo json_encode($data);
    }
}

?>

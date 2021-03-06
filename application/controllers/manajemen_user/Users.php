 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
	parent::__construct();
	$this->load->database();
	$this->load->model('M_users');
	$this->load->helper('url');
	$this->load->library('form_validation');
		if($this->session->userdata('permission')!="manajemen"){
	 		redirect ('cekpermission');
		}

	}

	public function index()
	{
		$data['data'] = $this->M_users->tampil_data()->result();
		$this->load->view('manajemen/v_users',$data);
	}

	public function add_user()
 	{
		 $id = $this->uri->segment(3);
		 $this->load->model('M_users');
		 // edit ini cok, atas model dept, bawah karyawan
		 $data['auth']   =  $this->M_users->tampil_data()->result();
		 $data['record']=  $this->M_users->get_one($id)->row_array();
		 $this->load->view('manajemen/v_add_user');
 	}

	public function submit_user()
  {
		$this->form_validation->set_rules('inputusername', 'Username duplicate!', 'is_unique[auth.username]');

			if ($this->form_validation->run() == FALSE)
          {
							$this->session->set_flashdata('duplicateUsername','ok');
            	redirect('tambah_pengelola');
          }
          else
          {
						$slug = url_title($this->input->post('inputnama'), 'dash', true);
						$filename = date('dmy')."-".$slug;
						$config['upload_path']          = './assets/Foto/';
	           $config['allowed_types']        = 'gif|jpg|png|jpeg';
	           $config['max_size']             = 2048;
	           // $config['max_width']            = 1024;
	           // $config['max_height']           = 768;
						 $config['file_name']        = $filename;
	           $this->load->library('upload', $config);

	           if ( ! $this->upload->do_upload('foto'))
	           {
							 die(var_dump($this->upload->display_errors()));
	           }
	           else
	           {
								$file = $this->upload->data();
								// die(var_dump($file));
	                   // $this->load->view('upload_success', $data);
										 $dataauth = array(
											 'username'=> $this->input->post('inputusername'),
											 'password'=> md5($this->input->post('inputpassword')),
											 'permission'=> "pengelola",

										 );
										 $this->M_users->input_data('auth' ,$dataauth);

										 $hasil= $this->M_users->get_auth( 'auth', $dataauth );
										 $data = array(
											 'id_user'=>$hasil->id_user,
											 'nama'=> $this->input->post('inputnama'),
											 'email'=> $this->input->post('inputemail'),
											 'no_telp'=> $this->input->post('inputtelepon'),
											 'foto' => 'assets/Foto/'.$file['file_name']
										 );
										 $this->M_users->input_data('data_pengelola',$data);
										 $this->session->set_flashdata('successAddUser','ok');
										 redirect('kelola_pengelola');
	           }
          }
	}

	public function username_check()
	{
	$cu = $this->db->select('username')->get('auth')->row();
	$iu = $this->input->post('inputusername');

                if ($cu->username == $iu)
                {
										$this->session->set_flashdata('duplicateUsername','ok');
		                    return FALSE;
                }
                else
                {
                        return TRUE;
                }

			}

	public function update_user()
	{
		$slug = url_title($this->input->post('inputnama'), 'dash', true);
		$filename = date('dmy')."-".$slug;
		$config['upload_path']          = './assets/Foto/';
		 $config['allowed_types']        = 'gif|jpg|png|jpeg';
		 $config['max_size']             = 2048;
		 // $config['max_width']            = 1024;
		 // $config['max_height']           = 768;
		 $config['file_name']        = $filename;
		 $this->load->library('upload', $config);

		 if ( ! $this->upload->do_upload('foto'))
		 {
			 $this->session->set_flashdata('failedUpdateUser',$this->upload->display_errors());
		 }
		 else
		 {
			 $id = $this->input->post('inputiduser');
				$file = $this->upload->data();
				$user = $this->M_users->get_one($id)->result();
				$old_foto = $user[0]->foto;

	    $data=array(
				'id_user'=> $this->input->post('inputiduser'),
				'nama'=> $this->input->post('inputnama'),
				'email'=> $this->input->post('inputemail'),
				'no_telp'=> $this->input->post('inputtelepon'),
				'foto' => 'assets/Foto/'.$file['file_name']
	    );

	  $up = $this->M_users->update($data,$id);
		if ($up) {
			if($old_foto !== "") {
				unlink("./".$old_foto);
			}
			$this->session->set_flashdata('successUpdateUser','ok');
		} else {
			$this->session->set_flashdata('failedUpdateUser','ERROR : Gagal update user !');
		}

	  redirect('kelola_pengelola');
	}
}
	function edit_user()
	    {
	            $id=  $this->uri->segment(3);
	            $this->load->model('M_users');
							// edit ini cok
	            $data['data']   =  $this->M_users->tampil_data()->result();
	            $data['record']=  $this->M_users->get_one($id)->row_array();
	            $this->load->view('manajemen/v_edit_user',$data);
	    }

	function edit_pass($id)
  {
			$id = $this->uri->segment(3);
			$return['record'] = $this->M_users->getPassword($id);

			$this->load->view('manajemen/v_edit_pass',$return);
  }

	function change_pass($id)
	{

		 $data=array(
			 'password'=> md5($this->input->post('inputpassword'))
		 );

$hasil =$this->M_users->updatepassword($data,$id);
	if($hasil){
		$this->session->set_flashdata('successChangePass','o k');
 	 	redirect('kelola_pengelola');
	}else{
		$this->session->set_flashdata('failedChangePass','o k');
	 	redirect('kelola_pengelola');
	}

	}

	public function delete_user()
  {
		$id = $this->uri->segment(3);
		$hasil = $this->M_users->delete_pengelola($id);
    // $query= $this->db->query('DELETE FROM auth WHERE id_user="'.$del.'"');
		// // $query= $this->db->query('DELETE FROM data_pengelola WHERE id_pengelola="'.$del.'"');
		// $this->session->set_flashdata('successDeleteUser','o k');
     // redirect('kelola_pengelola');
		 if($hasil){
			 $this->session->set_flashdata('successDeleteUser','o k');
 	     redirect('kelola_pengelola');
		 }else{
			 $this->session->set_flashdata('FailedDeleteUser','o k');
 			redirect('kelola_pengelola');
		 }
  }
}

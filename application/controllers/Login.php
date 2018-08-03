<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index() {

		$valid = $this->form_validation;

		$valid->set_rules('username','Username','required',
			array('required' =>'Nama Pengguna harus disi'));
		$valid->set_rules('password','Password','required',
			array('required' =>'Password Pengguna harus disi'));

		if ($valid->run()) {

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//compare(membandingkan) input dengan data di database
			$check_login = $this->user_model->login($username,$password);

			if (count($check_login) == 1 ) {
				// kalau ada data yg cocok maka akan dibuat session dibawah ini
				$this->session->set_userdata('id_user',$check_login->id_user);
				$this->session->set_userdata('username',$check_login->username);
				$this->session->set_userdata('nama',$check_login->nama);
				$this->session->set_userdata('akses_level',$check_login->akses_level);
				$this->session->set_flashdata('sukses', 'Anda Berhasil Login');

				$id_user = $this->session->userdata('id_user');
				$user_login = $this->user_model->detail($id_user);

				if (($user_login->akses_level)== 'Admin') {
					$this->session->set_flashdata('sukses', 'Anda  Berhasil Login');
					redirect(base_url('admin/dashboard'));
				}elseif (($user_login->akses_level)== 'Kontributor') {
					$this->session->set_flashdata('sukses', 'Anda  Berhasil Login');
					redirect(base_url('Kontributor/dashboard'));
				}

				
			}else{
				$this->session->set_flashdata('sukses', 'Username atau Password anda salah!');
				redirect(base_url('login'));
			}

		}//endvalidasi
		$data=array('title' => 'Login ');
		$this->load->view('login_view', $data, FALSE);
	}

	public function logout(){
		$this->check_login->logout();
	}

	
	

}

?>
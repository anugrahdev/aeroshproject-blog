<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$konfigurasi=$this->konfigurasi_model->listing();
		$user = $this->user_model->listing();
		$data = array('title'=> 'Data User',
			'konfigurasi' => $konfigurasi,
			'isi' => 'admin/user/list',
			'user' => $user);
		$this->load->view('layoutadmin/admin',$data);
	}

	public function tambah(){
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required', 
			array('required' =>'Nama Pengguna harus disi'));
		$valid->set_rules('username','Username','required|is_unique[users.username]',
			array('required' =>'Nama Pengguna harus disi', 
				'is_unique' => 'Maaf, username'.$this->input->post('username').'telah digunakan'));
		$valid->set_rules('password','Password','required|min_length[6]|max_length[32]', 
			array('required' =>'Password harus disi',
				'min_length' => 'Password minimal 6 karakter','max_length' => 'Password tidak boleh lebih dari 32 karakter'));
		$valid->set_rules('email','Email','required|valid_email', 
			array('required' =>'Password harus disi',
				'valid_email' => 'Maaf format email salah'));

		if ($valid->run()===FALSE) {
			//Default dan jika ada kesalahan input yang membuat validasi berjalan
			$data = array('title'=> 'Tambah Data User',
				'konfigurasi' => $konfigurasi,
				'isi' => 'admin/user/tambah'
			);
			$this->load->view('layoutadmin/admin',$data);

		}else{
			//masuk database
			$i = $this->input;

			$data = array('username' 	 => $i->post('username'),
				'nama'   		 => $i->post('nama'),
				'password'	 => sha1($i->post('password')),
				'email'    	 => $i->post('email'),
				'akses_level'  => $i->post('akses_level'),
				'gambar'       => $i->post('gambar'));
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'User telah berhasil ditambahkan');
			redirect(base_url('admin/user'));

		}


	}

	public function edit($id_user){
		$user = $this->user_model->detail($id_user);
		// validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required', array ('required' => 'Nama harus di isi !'));

			$valid->set_rules('email','Email','required|valid_email', array ('required' => 'email harus di isi !',
				'valid_email' => 'Email tidak valid'
			));
			$valid->set_rules('password','password','max_length[32]|min_length[6]', array (
				'min_length' => 'Password minimal 6 karakter',

				'max_length' => 'Password maximal 32 Karakter'));
			//end validasi
			if ($valid->run()===FALSE){
			
				//default
				$data = array ('title' => 'Edit Administrator',
					'user'=> $user,
					'konfigurasi' => $konfigurasi,
					'isi' => 'admin/user/edit');
				$this->load->view ('admin/layout/wrapper',$data);
		// Masuk Database

			}else{
				$i = $this->input;
		//kalau password tidak memenuhi requir

				if(strlen($i->post('password')) <6 || strlen($i->post('password')) > 32 ){

					$data = array(
						'id_user' => $id_user,
						'nama' => $i->post('nama'),
						'email' => $i->post('email'),
						'username' => $i->post('username'),
						//'password' => sha1($i->post('password')), //password dimatikan
						'akses_level' => $i->post('akses_level')
					);
				}else{
					$data = array(
						'id_user' => $id_user,
						'nama' => $i->post('nama'),
						'email' => $i->post('email'),
						'username' => $i->post('username'),
						'password' => sha1($i->post('password')), //enskirpsi sha1
						'akses_level' => $i->post('akses_level')
		);
				}
				$this->user_model->edit($data);
				$this->session->set_flashdata('sukses','User/Admin Telah berhasil diedit');
				redirect(base_url('admin/user'));
			}
		// end masuk database

		}	

		public function delete($id_user){
		//proteksidelete
			$this->check_login->check();

			$data = array ('id_user' => $id_user);
			$this->user_model->delete($data);
			$this->session->set_flashdata('sukses','User/Admin Telah berhasil dihapus');
			redirect(base_url('admin/user'),'refresh');

		}



	}

	/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */
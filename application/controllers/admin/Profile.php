<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
		$konfigurasi=$this->konfigurasi_model->listing();
		$id_user = $this->session->userdata('id_user');
			$user_aktif = $this->user_model->detail($id_user);
		$data = array('title' => 'Halaman Profile - '.$user_aktif->nama,
						  'user_aktif' => $user_aktif,
						  'konfigurasi' => $konfigurasi,
						  'isi'   => 'admin/profile/list');
			$this->load->view('layoutadmin/admin',$data);
		
		
	}

	public function edit($id_user){
		$konfigurasi=$this->konfigurasi_model->listing();
		$id_user = $this->session->userdata('id_user');
		$user_aktif = $this->user_model->detail($id_user);
		$valid=$this->form_validation;
		$valid->set_rules('nama','Nama','required', array ('required' => 'Nama harus di isi !'));

			$valid->set_rules('email','Email','required|valid_email', array ('required' => 'email harus di isi !',
				'valid_email' => 'Email tidak valid'
			));
			$valid->set_rules('password','password','max_length[32]|min_length[6]', array (
				'min_length' => 'Password minimal 6 karakter',

				'max_length' => 'Password maximal 32 Karakter'));

		if($valid->run()) {

			//kalau ada gambar baru yg di upload
			if(!empty($_FILES['gambar']['name'])){
			
			$config['upload_path'] 		= './assets/upload/images/profile/'; //lokasi folder upload
			$config['allowed_types'] 	= 'gif|jpg|png|svg'; //ekstensi
			$config['max_size']			= '12000'; // KB	ukuran maximal
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
				if(!$this->upload->do_upload('gambar')){
			
			$data = array('title' => 'Halaman Profile - '.$user_aktif->nama,
						  'user_aktif' => $user_aktif,
						  'konfigurasi' => $konfigurasi,
						  'error'		=> $this->upload->display_errors(),
						  'isi'   => 'admin/profile/edit');
			$this->load->view('layoutadmin/admin',$data);
// Masuk database
				}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor bikin thumbnail
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/images/profile/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/images/profile/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= FALSE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 360; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				

			$i=$this->input;
			if ($user_aktif->gambar!="" && $user_aktif->gambar!='defaultprofile.png' ) {
					//jika ada gambar lama yg di simpan maka di hapus dulu
					unlink('./assets/upload/images/profile/'.$user_aktif->gambar);
					unlink('./assets/upload/images/profile/thumbs/'.$user_aktif->gambar);
				}
			$data = array(
						'id_user' => $id_user,
						'nama' => $i->post('nama'),

						'email' => $i->post('email'),
						'gambar' => $upload_data['uploads']['file_name']
						//'password' => sha1($i->post('password')), //password dimatikan
						
					);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Profile Berhasil Di Edit');
			redirect(base_url('admin/profile'));
			}}else{
				$i = $this->input;
				//else jika tidak ada gambar baru yg di upload
				$data = array(
						'id_user' => $id_user,
						'nama' => $i->post('nama'),
						'email' => $i->post('email')
						//'gambar'			    => $upload_data['uploads']['file_name'],
						//'password' => sha1($i->post('password')), //password dimatikan
						
					);
				$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Profile Berhasil Di Edit');
			redirect(base_url('admin/profile'));

				}}
		
		$data = array('title' => 'Halaman Profile - '.$user_aktif->nama,
						  'user_aktif' => $user_aktif,
						  'konfigurasi' => $konfigurasi,
						  'isi'   => 'admin/profile/edit');
			$this->load->view('layoutadmin/admin',$data);
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/admin/Profile.php */
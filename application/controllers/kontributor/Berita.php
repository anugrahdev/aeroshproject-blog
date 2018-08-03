<?php 

class Berita extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('kategori_berita_model');

	}


	public function index(){
		$konfigurasi=$this->konfigurasi_model->listing();
		$kategori = $this->kategori_berita_model->listing();
		$berita = $this->berita_model->listingkontributor();
		$data = array ('title' => 'Manajemen Berita',
			'berita' => $berita,
			'konfigurasi' => $konfigurasi,
			'kategori' => $kategori,
			'isi' => 'kontributor/berita/list');
		$this->load->view('layoutadmin/kontributor',$data);

	}

	public function tambah (){

		$kategori = $this->kategori_berita_model->listing();
		$akhir		= $this->berita_model->akhir();

		//validasi
		$v = $this->form_validation;
		$v->set_rules('judul','Judul','required',
			array('required' => 'Judul Harus Di isi'));
		$v->set_rules('isi','isi','required',
			array('required' => 'isi berita Harus Di isi'));
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/images/'; //lokasi folder upload
			$config['allowed_types'] 	= 'gif|jpg|png|svg'; //ekstensi
			$config['max_size']			= '12000'; // KB	ukuran maximal
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('gambar')){


				$data = array ('title' => 'Tambah Berita',
					'kategori' => $kategori,
					'error'		=> $this->upload->display_errors(),
					'konfigurasi' => $konfigurasi,
					'isi' => 'kontributor/berita/tambah');
				$this->load->view('layoutadmin/kontributor',$data);
// Masuk database
			}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor bikin thumbnail
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/images/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/images/thumbs/';
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
				
				$i = $this->input;
				$url_akhir	= $akhir->id_berita+1;
				$slug = $url_akhir.'-'.url_title($i->post('judul'),'dash', TRUE);
				$data = array(	'slug_berita'					=> $slug,
					'judul'					=> $i->post('judul'),
					'id_kategori_berita'	=> $i->post('id_kategori_berita'),
					'isi'				    => $i->post('isi'),
					'gambar'			    => $upload_data['uploads']['file_name'],
					'id_user'			    => $this->session->userdata('id_user'),
					'status_berita'		    => $i->post('status_berita')

				);
				$this->berita_model->tambah($data);
				$this->session->set_flashdata('sukses','Berita has been added successfully');
				redirect(base_url('kontributor/berita'));
			}}
		// End masuk database
			$data = array ('title' => 'Tambah Berita',
				'kategori' => $kategori,
				'konfigurasi' => $konfigurasi,
				'isi' => 'kontributor/berita/tambah');
			$this->load->view('layoutadmin/kontributor',$data);

		}

		public function edit($id_berita){

		$kategori = $this->kategori_berita_model->listing();
		$berita   =$this->berita_model->detail($id_berita);

		//validasi
		$v = $this->form_validation;
		$v->set_rules('judul','Judul','required',
			array('required' => 'Judul Harus Di isi'));
		$v->set_rules('isi','isi','required',
			array('required' => 'isi berita Harus Di isi'));
		if($v->run()) {

			//kalau ada gambar baru yg di upload
			if(!empty($_FILES['gambar']['name'])){
			
			$config['upload_path'] 		= './assets/upload/images/'; //lokasi folder upload
			$config['allowed_types'] 	= 'gif|jpg|png|svg'; //ekstensi
			$config['max_size']			= '12000'; // KB	ukuran maximal
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
				if(!$this->upload->do_upload('gambar')){


				$data = array ('title' => 'Edit Berita',
					'kategori' => $kategori,
					'berita' =>$berita,
					'konfigurasi' => $konfigurasi,
					'error'		=> $this->upload->display_errors(),
					'isi' => 'kontributor/berita/edit');
				$this->load->view('layoutadmin/kontributor',$data);
// Masuk database
				}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor bikin thumbnail
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/images/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/images/thumbs/';
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
				
				$i = $this->input;
				
				if ($berita->gambar!="") {
					//jika ada gambar lama yg di simpan maka di hapus dulu
					unlink('./assets/upload/image/'.$berita->gambar);
					unlink('./assets/upload/image/thumbs/'.$berita->gambar);
				}
				


				$data = array(	'id_berita'					=> $id_berita,
					'judul'					=> $i->post('judul'),
					'id_kategori_berita'	=> $i->post('id_kategori_berita'),
					'isi'				    => $i->post('isi'),

					'gambar'			    => $upload_data['uploads']['file_name'],
					'id_user'			    => $this->session->userdata('id_user'),
					'status_berita'		    => $i->post('status_berita')

				);
				$this->berita_model->tambah($data);
				$this->session->set_flashdata('sukses','Berita has been added successfully');
				redirect(base_url('kontributor/berita'));
			}}else{
				$i = $this->input;
				//else jika tidak ada gambar baru yg di upload
				$data = array(	'id_berita'					=> $id_berita,
					'judul'					=> $i->post('judul'),
					'id_kategori_berita'	=> $i->post('id_kategori_berita'),
					'isi'				    => $i->post('isi'),
					//'gambar'			    => $upload_data['uploads']['file_name'],
					'id_user'			    => $this->session->userdata('id_user'),
					'status_berita'		    => $i->post('status_berita')

				);
				$this->berita_model->edit($data);
				$this->session->set_flashdata('sukses','Berita has been edited successfully');
				redirect(base_url('kontributor/berita'));

				

		}}
				$data = array ('title' => 'Edit Berita',
					'kategori' => $kategori,
					'berita' =>$berita,
					'konfigurasi' => $konfigurasi,
					'isi' => 'kontributor/berita/edit');
				$this->load->view('layoutadmin/kontributor',$data);
		}		

		public function delete($id_berita){

			$berita =$this->berita_model->detail($id_berita);

			//hapus gambar
			if ($berita->gambar!="") {
				# code...
				unlink('./assets/upload/images/'.$berita->gambar);
				unlink('./assets/upload/images/thumbs/'.$berita->gambar);
			}
			//end hapus gambar

			$data = array ('id_berita' => $id_berita);
			$this->berita_model->delete($data);
			$this->session->set_flashdata('sukses', 'Berita berhasil di hapus');
			redirect(base_url('kontributor/berita'),'refresh');
		}


		



	}




	?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_berita extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Kategori_berita_model');
	}

	public function index()
	{
		$konfigurasi=$this->konfigurasi_model->listing();
		$kategori = $this->Kategori_berita_model->listing();
		$data = array('title'	 => 'Kategori berita',
					 	  'isi'  	 => 'kontributor/kategori_berita/list',
					 	  'konfigurasi' => $konfigurasi,
					  	  'kategori' => $kategori);
			$this->load->view('layoutadmin/kontributor',$data);
		


		}
				
	

	public function tambah(){
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori_berita', 'nama_kategori_berita', 'required|is_unique[kategori_berita.nama_kategori_berita]', 
			        array('required'  => 'Nama Kategori Harus di isi !!',
			    		  'is_unique' => 'Opppss.... kategori dengan nama <strong>' .$this->input->post('nama_kategori_berita'). 'sudah ada !!....'));

		if ($valid->run()===FALSE) {
			$kategori = $this->Kategori_berita_model->listing();
			$data = array('title'	 => 'Kategori berita',
					 	  'isi'  	 => 'kontributor/kategori_berita/list',
					 	  'konfigurasi' => $konfigurasi,
					  	  'kategori' => $kategori);
			$this->load->view('kontributor/layout/wrapper', $data);

		}else{
			//masuk database
			$i=$this->input;

			$slug = url_title($this->input->post('nama_kategori_berita'), 'dash', TRUE);
			$data = array('nama_kategori_berita' 	=> $i->post('nama_kategori_berita'),
						  'keterangan'				=> $i->post('keterangan'),
						  'urutan'					=> $i->post('urutan'),
						  'slug_kategori_berita' 	=> $slug);
			$this->Kategori_berita_model->tambah($data);
			$this->session->set_flashdata('sukse', 'Data Kategori Berita Berhasil Ditambahkan');
			redirect(base_url('kontributor/kategori_berita/'),'refresh');



	}
}
	public function edit($id_kategori_berita){
		$kategori = $this->Kategori_berita_model->detail($id_kategori_berita);
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori_berita', 'nama_kategori_berita', 'required', 
			        array('required'  => 'Nama Kategori Harus di isi !!'));

		if ($valid->run()===FALSE) {
			
			$data = array('title'	 => 'Edit Kategori berita',
						  'kategori' => $kategori,
						  'konfigurasi' => $konfigurasi,
					 	  'isi'  	 => 'kontributor/kategori_berita/edit'
					  	  );
			$this->load->view('kontributor/layout/wrapper', $data);

		}else{
			//masuk database
			$i=$this->input;

			$slug = url_title($this->input->post('nama_kategori_berita'), 'dash', TRUE);
			$data = array('id_kategori_berita'      => $id_kategori_berita,
						  'nama_kategori_berita' 	=> $i->post('nama_kategori_berita'),
						  'keterangan'				=> $i->post('keterangan'),
						  'urutan'					=> $i->post('urutan'),
						  'slug_kategori_berita' 	=> $slug);
			$this->Kategori_berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data Kategori Berita Berhasil Diedit');
			redirect(base_url('kontributor/kategori_berita/'));

	}
}
	public function delete($id_kategori_berita){
		$data = array('id_kategori_berita' =>$id_kategori_berita);
		$this->Kategori_berita_model->delete($data);
		$this->session->set_flashdata('sukses', 'data kategori berhasil dihapus');
		redirect(base_url('kontributor/Kategori_berita'));
	}

}

/* End of file Kategori_berita.php */
/* Location: ./application/controllers/kontributor/Kategori_berita.php */
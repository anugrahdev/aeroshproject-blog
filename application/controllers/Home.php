<?php 

class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('kategori_berita_model');
	}

	public function index(){
		$berita=$this->berita_model->beritahome();
		$konfigurasi=$this->konfigurasi_model->listing();
		$beritasidebar=$this->berita_model->beritasidebar();
		$kategori=$this->kategori_berita_model->listing();
		$data = array('title' => 'Aerosh Blog Project',
					  'isi' => 'home/list',
					  'berita' => $berita,
					  'beritasidebar' => $beritasidebar,
					  'konfigurasi' => $konfigurasi,
					  'kategori' => $kategori
					  );
		$this->load->view('layout/wrapper',$data);

	} 

}

 ?>
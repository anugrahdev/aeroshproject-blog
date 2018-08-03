<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('kategori_berita_model');
	}

	public function index()
	{
		$konfigurasi=$this->konfigurasi_model->listing();
		// LISTING BERITA DENGAN PAGINATION
		$this->load->library('pagination');

		$config['base_url']  	 = base_url('berita/index/');
		$config['total_rows'] 	 = count($this->berita_model->total());
		$config['per_page']		 = 3;
		$config['uri_segment']   = 3;

			//limit dan start
			$limit 					 = $config['per_page'];
			$start					 = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
			$this->pagination->initialize($config);
			//end limit start
		
		$berita  				     = $this->berita_model->berita($limit,$start);
	
		// END PAGINASI

		$kategori = $this->kategori_berita_model->listing();
		$beritasidebar=$this->berita_model->beritasidebar();
		$data = array ('title'  => 'Berita Terbaru | Aerosh Project Blog',
						'isi'    => 'berita/list',
						'kategori'    => $kategori,
						'beritasidebar' => $beritasidebar,
						'konfigurasi' => $konfigurasi,
						'paginasi'   => $this->pagination->create_links(),
						'berita' => $berita

		);
		$this->load->view('layout/wrapper', $data);
		
	}

	public function read($slug_berita){

		$konfigurasi=$this->konfigurasi_model->listing();
		$kategori = $this->kategori_berita_model->listing();
		$beritasidebar=$this->berita_model->beritasidebar();
		$berita = $this->berita_model->read($slug_berita);
		$data = array ('title'  => $berita->judul,
			'kategori'    => $kategori,
			'beritasidebar' => $beritasidebar,
			'isi'    => 'berita/detail',
			'konfigurasi' => $konfigurasi,
			'berita' => $berita

		);
		$this->load->view('layout/wrapper', $data);

	}

	// Kategori 
	public function kategori($slug_kategori_berita) {
		$beritasidebar=$this->berita_model->beritasidebar();
		$konfigurasi=$this->konfigurasi_model->listing();
		$kategori 				= $this->kategori_berita_model->listing();
		//
		$namakategori			= $this->kategori_berita_model->read($slug_kategori_berita);
		$id_kategori_berita		= $namakategori->id_kategori_berita;

		// LISTING BERITA DENGAN PAGINATION
		$this->load->library('pagination');

		$config['base_url']  	 = base_url('berita/kategori/'.$slug_kategori_berita.'/index/');
		$config['total_rows'] 	 = count($this->berita_model->total_kategori($id_kategori_berita));
		$config['per_page']		 = 6;
		$config['uri_segment']   = 5;

			//limit dan start
			$limit 					 = $config['per_page'];
			$start					 = ($this->uri->segment(5)) ? ($this->uri->segment(5)) : 0;
			$this->pagination->initialize($config);
			//end limit start
		
			$berita  				     = $this->berita_model->kategori($id_kategori_berita,$limit,$start);
	
		// END PAGINASI

		// ini untuk list di sidebar
		
		
		$data	= array( 'title'	=> 'Kategori Berita '.$namakategori->nama_kategori_berita,
			'kategori'    => $kategori,
			'berita'	=> $berita,
			'konfigurasi' => $konfigurasi,
			'beritasidebar' => $beritasidebar,
			'paginasi'   => $this->pagination->create_links(),
			'isi'		=> 'berita/list');
		$this->load->view('layout/wrapper',$data); 
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */
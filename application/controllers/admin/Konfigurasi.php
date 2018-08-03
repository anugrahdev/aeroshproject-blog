<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		

		$valid = $this->form_validation;
		$valid->set_rules('namaweb','Nama Website','required',array
						 ('required' => 'Nama website wajib di isi !!'));

		if($valid->run()===FALSE){
			$data = array('title' 		=> 'Konfigurasi Website',
					  	'isi'   		=> 'admin/Konfigurasi/list',
					 	  'konfigurasi' => $konfigurasi);

			$this->load->view('layoutadmin/admin',$data);
		}else{
			$data = array ('id_konfigurasi'=> $konfigurasi->id_konfigurasi,
						   'namaweb' 	  => $this->input->post('namaweb'),
						   'tagline'	  => $this->input->post('tagline'),
						   'email'  	  => $this->input->post('email'),
						   'alamat' 	  => $this->input->post('alamat'),
						   'telepon'	  => $this->input->post('telepon'),
						   'keywords'	  => $this->input->post('keywords'),
						   'description'  => $this->input->post('description'),
						   'metatext'     => $this->input->post('metatext'),
						   'google_maps'  => $this->input->post('google_maps'),
						   'hp' 		  => $this->input->post('hp'),
						   'telepon'  	  => $this->input->post('telepon'),
						   'facebook'	  => $this->input->post('facebook'),
						   'instagram'	  => $this->input->post('instagram'),
						   'webaddress'   => $this->input->post('webaddress'));
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Konfigurasi Berhasil Di update');
			redirect(base_url('admin/konfigurasi'));
		}

	}

}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */
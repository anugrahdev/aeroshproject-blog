<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$konfigurasi=$this->konfigurasi_model->listing();
		$logged['username'] = $this->session->userdata('username');
		$logged['gambar'] = $this->session->userdata('gambar');
		$user = $this->user_model->listing();
		$data = array('title' => 'Dashboard Kontributor',
					  'isi'   => 'kontributor/dashboard/list',
					'logged' => $logged,
					'konfigurasi' => $konfigurasi,
						'user' => $user);
		$this->load->view('layoutadmin/kontributor',$data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/kontributor/dashboard.php */
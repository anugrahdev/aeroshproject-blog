<?php  

class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
	}

	public function index(){
		$konfigurasi=$this->konfigurasi_model->listing();
		$logged['username'] = $this->session->userdata('username');
		$logged['gambar'] = $this->session->userdata('gambar');
		$user = $this->user_model->listing();
		$berita = $this->berita_model->listing();
		$data = array ('title' => 'Admin Dashboard',
					   'isi' => 'admin/dashboard/list',
					   'logged' => $logged,
					   'konfigurasi' => $konfigurasi,
						'user' => $user,
						'berita' => $berita
					);
		$this->load->view('layoutadmin/admin',$data);
	}
	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect(base_url('login'));
	}

}

?>
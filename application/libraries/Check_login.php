<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_login
{
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	//check loginnya ke halaman kontributor

	public function check_kontributorpage(){

		if($this->CI->session->userdata('username') == "" &&
			$this->CI->session->userdata('akses_level') == "")
		{
			$this->CI->session->set_flashdata('sukses', 'Anda Belum Login!!');
			redirect(base_url('login'),'refresh');

		}
	}
	//check loginnya untuk kehalaman admin
	public function check_adminpage(){

		if($this->CI->session->userdata('username') == "" &&
			$this->CI->session->userdata('akses_level') == ""){
			$this->CI->session->set_flashdata('sukses', 'Anda Belum Login!!');
			redirect(base_url('login'),'refresh');

		}
		

		elseif($this->CI->session->userdata('username') != "" && 
	         	$this->CI->session->userdata('akses_level') == "Kontributor"){
			$this->CI->session->set_flashdata('sukses', 'Anda Tidak Diperbolehkan mengakses halaman admin!!');
			redirect(base_url('Kontributor/dashboard'),'refresh');

		}
	}

	//logout

	public function logout(){
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('akses_level');
		$this->CI->session->set_flashdata('sukses', 'Anda Berhasil Logout');
		redirect(base_url('login'),'refresh');

	}


}

/* End of file Check_login.php */
/* Location: ./application/libraries/Check_login.php */

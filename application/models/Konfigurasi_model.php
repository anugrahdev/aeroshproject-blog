<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing(){
		$query = $this->db->get('konfigurasi');
		return $query->row();
	}

	public function detail($id_konfigurasi){
		$query = $this->db->get_where('konfigurasi',array('id_konfigurasi' => $id_konfigurasi));
	}

	public function tambah($data){
		$this->db->insert('konfigurasi',$data);
	}	

	public function edit($data){
		$this->db->where('id_konfigurasi', $data['id_konfigurasi'] );
		$this->db->update('konfigurasi',$data);
	}
	public function delete($data){
		$this->db->where('id_konfigurasi', $data['id_konfigurasi'] );
		$this->db->delete('konfigurasi',$data);
	}

}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */
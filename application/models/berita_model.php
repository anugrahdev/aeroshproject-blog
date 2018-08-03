<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function listing(){
		$this->db->select('berita.*, kategori_berita.nama_kategori_berita, users.nama');
		$this->db->from('berita');

		//relasi user dan kategori berita.

		$this->db->join('kategori_berita','kategori_berita.id_kategori_berita = berita.id_kategori_berita','LEFT');
		$this->db->join('users','users.id_user = berita.id_user');
		//endrelasi

		$this->db->order_by('id_berita','DESC');
		$query=$this->db->get();
		return $query->result();

	}

	public function listingkontributor(){
		$id_user = $this->session->userdata('id_user');
		$user_aktif = $this->user_model->detail($id_user);
		$this->db->select('berita.*, kategori_berita.nama_kategori_berita, users.nama');
		$this->db->from('berita');

		//relasi user dan kategori berita.

		$this->db->join('kategori_berita','kategori_berita.id_kategori_berita = berita.id_kategori_berita','LEFT');
		$this->db->join('users','users.id_user = berita.id_user');
		//endrelasi
		$this->db->where('berita.id_user',$user_aktif->id_user);

		$this->db->order_by('id_berita','DESC');
		$query=$this->db->get();
		return $query->result();

	}
	//LISTING BERITA UNTUK HOMEPAGE
	public function beritahome(){
		$this->db->select('berita.*, kategori_berita.nama_kategori_berita, users.nama');
		$this->db->from('berita');

		//relasi user dan kategori berita.

		$this->db->join('kategori_berita','kategori_berita.id_kategori_berita = berita.id_kategori_berita','LEFT');
		$this->db->join('users','users.id_user = berita.id_user');
		//endrelasi
		$this->db->where('status_berita','Publish');
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(3);
		$query=$this->db->get();
		return $query->result();

	}
	//LISTING BERITA UNTUK SIDEBAR BERITA TERBARU
	public function beritasidebar(){
		$this->db->select('berita.*, kategori_berita.nama_kategori_berita, users.nama');
		$this->db->from('berita');

		//relasi user dan kategori berita.

		$this->db->join('kategori_berita','kategori_berita.id_kategori_berita = berita.id_kategori_berita','LEFT');
		$this->db->join('users','users.id_user = berita.id_user');
		//endrelasi
		$this->db->where('status_berita','Publish');
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(3);
		$query=$this->db->get();
		return $query->result();

	}
	//BERITA LISTING PAGINATION
	public function berita($limit,$start){
		$this->db->select('berita.*, kategori_berita.nama_kategori_berita, users.nama');
		$this->db->from('berita');

		//relasi user dan kategori berita.

		$this->db->join('kategori_berita','kategori_berita.id_kategori_berita = berita.id_kategori_berita','LEFT');
		$this->db->join('users','users.id_user = berita.id_user');
		//endrelasi
		$this->db->where('status_berita','Publish');
		$this->db->order_by('id_berita','DESC');
		$this->db->limit($limit,$start);
		$query=$this->db->get();
		return $query->result();

	}

	//TOTAL BERITA LISTING PAGINATION
	public function total(){
		$this->db->select('berita.*, kategori_berita.nama_kategori_berita, users.nama');
		$this->db->from('berita');

		//relasi user dan kategori berita.

		$this->db->join('kategori_berita','kategori_berita.id_kategori_berita = berita.id_kategori_berita','LEFT');
		$this->db->join('users','users.id_user = berita.id_user');
		//endrelasi
		$this->db->where('status_berita','Publish');
		$this->db->order_by('id_berita','DESC');
		$query=$this->db->get();
		return $query->result();

	}


//Kategori
	public function kategori($id_kategori_berita, $limit,$start) {
		$this->db->select('berita.*, kategori_berita.nama_kategori_berita, users.nama');
		$this->db->from('berita');

		//relasi user dan kategori berita.

		$this->db->join('kategori_berita','kategori_berita.id_kategori_berita = berita.id_kategori_berita','LEFT');
		$this->db->join('users','users.id_user = berita.id_user');
		//endrelasi
		$this->db->where(array('berita.id_kategori_berita' => $id_kategori_berita,
						 'status_berita' => 'Publish'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//TOTAL KATEGORI BERITA LISTING PAGINATION
	public function total_kategori($id_kategori_berita){
		$this->db->select('berita.*, kategori_berita.nama_kategori_berita, users.nama');
		$this->db->from('berita');

		//relasi user dan kategori berita.

		$this->db->join('kategori_berita','kategori_berita.id_kategori_berita = berita.id_kategori_berita','LEFT');
		$this->db->join('users','users.id_user = berita.id_user');
		//endrelasi
		$this->db->where(array('berita.id_kategori_berita' => $id_kategori_berita,
						 'status_berita' => 'Publish'));
		$this->db->order_by('id_berita','DESC');
		$query=$this->db->get();
		return $query->result();

	}

	public function read($slug_berita){
		$query = $this->db->get_where('berita',array('slug_berita' => $slug_berita,
													 'status_berita' => 'publish'));
		return $query->row();
	}



	public function detail($id_berita){
		$query = $this->db->get_where('berita',array('id_berita' => $id_berita));
		return $query->row();
	}
	public function akhir(){
		$query=$this->db->query('SELECT * FROM berita ORDER BY id_berita DESC');
		return $query->row();
	}

	public function tambah($data){
		$this->db->insert('berita',$data);
	}

	public function edit($data){
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->update('berita',$data);
	}

	public function delete($data){
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->delete('berita',$data);
	}

}

/* End of file berita_model.php */
/* Location: ./application/models/berita_model.php */
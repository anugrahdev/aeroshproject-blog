<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model {
 public function cek_user($data) {
			$query = $this->db->get_where('users', $data);
			return $query;
		}
}
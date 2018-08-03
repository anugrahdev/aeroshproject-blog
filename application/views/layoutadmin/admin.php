<?php 
$id_user = $this->session->userdata('id_user');
$user_aktif = $this->user_model->detail($id_user);
	$this->check_login->check_adminpage();


//menggabungkan semua bagian layout
require('head.php');
require('header.php');
require('sidebar.php');
require('content.php');
require('footer.php');

 ?>
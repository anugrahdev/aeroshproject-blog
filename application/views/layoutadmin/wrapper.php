<?php 
$id_user = $this->session->userdata('id_user');
$user_aktif = $this->user_model->detail($id_user);

$this->check_login->check_adminpage();

//menggabungkan semua bagian layout
require_once('head.php');
require_once('header.php');
require_once('sidebar.php');
require_once('content.php');
require_once('footer.php');

 ?>
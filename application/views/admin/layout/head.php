<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Ready Bootstrap Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

	<link rel="stylesheet" href="<?php echo base_url () ?>assets/readyadmin/assets/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>


	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="<?php echo base_url () ?>assets/readyadmin/assets/css/ready.css">
	<link rel="stylesheet" href="<?php echo base_url () ?>assets/readyadmin/assets/css/demo.css">

	<!-- Summernote -->
	
    <link href="<?php echo base_url () ?>assets/readyadmin/assets/module/summernote/summernote-lite.css" rel="stylesheet">
    <script src="<?php echo base_url () ?>assets/readyadmin/assets/module/summernote/summernote-lite.js"></script>
	<!-- end summernote -->
	 


	<?php 
// ambil data user dari yang login
$id_user = $this->session->userdata('id_user');
$user_aktif = $this->user_model->detail($id_user);
 ?>
	

</head>


<div class="main-panel">
	<div class="content">
		<div class="container-fluid">
			<h4 class="page-title"><?php echo $title ?></h4>
			<div class="row">
				<!-- openlist -->
				<div class="col-md-12">
					<div class="card">

						<div class="card-body">
							<?php 
//cetak notifikasi
							if ($this->session->flashdata('sukses')) {
								echo '<div class="alert alert-success">';
								echo $this->session->flashdata('sukses');
								echo '</div>';
    # code...
							}
							?>

							<?php include('tambah.php') ?><br><br>

							<div class="table-responsive">
								<table id="data" class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">



									<thead>
										<tr>
											<th>#</th>
											<th>Username</th>
											<th>Nama</th>
											<th>Email</th>
											<th>Hak Akses</th>
											<th></th>

										</tr>
									</thead>
									<tbody>

										<?php 
										$i=1;
										foreach ($user as $user) {
											
											
											?>		

											<tr>

												<td scope="row"><?php echo $i ?></td>
												<td><?php echo $user->username ?></td>
												<td><?php echo $user->nama ?></td>
												<td><?php echo $user->email ?></td>
												<td><?php echo $user->akses_level ?></td>
												<td width="90px">
													<a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-warning btn-sm"><i class="la la-edit"></i></a>
													<?php include ('delete.php') ?>
												</div>


											</td>

										</tr>
										<?php 
										$i++;}
										?>		

									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>
				<!-- closelist -->
			</div>
		</div>
	</div>


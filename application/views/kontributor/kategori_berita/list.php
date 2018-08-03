

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
											<th width="200px">Judul</th>
											<th width="300px">Keterangan</th>
											<th width="20px" >Urutan</th>
											<th>Slug</th>
											<th width="110px"></th>

										</tr>
									</thead>
									<tbody>

										<?php 
										$i=1;
										foreach ($kategori as $kategori) {
											
											
											?>		

											<tr>

												<td scope="row"><?php echo $i ?></td>
												<td><?php echo $kategori->nama_kategori_berita ?></td>
												<td><?php echo $kategori->keterangan ?></td>
												<td><?php echo $kategori->urutan ?></td>
												<td><?php echo $kategori->slug_kategori_berita ?></td>
												<td width="90px">
													<a href="<?php echo base_url('admin/kategori_berita/edit/'.$kategori->id_kategori_berita) ?>" class="btn btn-warning btn-sm"><i class="la la-edit"></i></a>
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


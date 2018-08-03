

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

							<a href="<?php echo base_url('admin/berita/tambah') ?>" class="btn btn-info" >Tambah <i class="
       la la-plus"></i></a>
       <br><br>

							<div class="table-responsive">
								<table id="data" class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">



									<thead>
										<tr>
											<th width="40px">#</th>
											<th width="80px">Gambar</th>
											<th >Judul</th>
											<th width="120px">Kategori</th>
											<th width="120px">Author</th>
											<th width="120px">Status</th>
											<th width="100px"></th>

										</tr>
									</thead>
									<tbody>

										<?php 
										$i=1;
										foreach ($berita as $berita) {
											
											
											?>		

											<tr>

												<td scope="row"><?php echo $i ?></td>
												<td><img src="<?php echo base_url('assets/upload/images/thumbs/'.$berita->gambar) ?>" width="50px"></td>
												<td><?php echo $berita->judul ?></td>
												<td><?php echo $berita->nama_kategori_berita ?></td>
												<td><?php echo $berita->nama ?></td>
												<td><?php echo $berita->status_berita ?></td>
												<td width="90px">
													<a href="<?php echo base_url('admin/berita/edit/'.$berita->id_berita) ?>" class="btn btn-warning btn-sm"><i class="la la-edit"></i></a>
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


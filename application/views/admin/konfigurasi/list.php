

<div class="main-panel">
	<div class="content">
		<div class="container-fluid">
			<h4 class="page-title"><?php echo $title ?></h4>
			<div class="row">
				<!-- openlist -->
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title"><?php echo $title ?></div>
						</div>
						<!-- CARDBODY -->
						<div class="card-body">
							<?php 
//valdiasi input
							echo validation_errors('<div class="alert alert-warning">','</div>');

//erroruploadfile

							if(isset($error)){
								echo '<div class="aler alert-warning">';
								echo $error;
								echo '</div';
							}

//openform
							echo form_open(base_url('admin/konfigurasi/'));

							?>
							<div class="row">
								<div class="col-md-6">
									<h3>Basic information <i class="la la-mouse-pointer
										"></i></h3>
										<hr>
										<div class="form-group">
											<label>Nama Website</label>
											<input type="text" name="namaweb" class="form-control" value="<?php echo $konfigurasi->namaweb ?>" >
										</div>
										<div class="form-group">
											<label>Tagline Website</label>
											<input type="text" name="tagline" class="form-control" value="<?php echo $konfigurasi->tagline ?>" >
										</div>
										<div class="form-group">
											<label>Deskripsi Website</label>
											<input type="text" name="description" class="form-control" value="<?php echo $konfigurasi->description ?>" >
										</div>
										<div class="form-group">
											<label>Alamat Website</label>
											<input type="text" name="webaddress" class="form-control" value="<?php echo $konfigurasi->webaddress ?>" >
										</div>
										<div class="form-group">
											<label>Official Email</label>
											<input type="email" name="email" class="form-control" value="<?php echo $konfigurasi->email ?>" >
										</div>
										<div class="form-group">
											<label>Alamat</label>
											<textarea name="alamat" class="form-control"><?php echo $konfigurasi->alamat ?></textarea>
										</div>
										<div class="form-group">
											<label>Nomor Telepon</label>
											<input type="text" name="telepon" class="form-control" value="<?php echo $konfigurasi->telepon ?>" >
										</div>
										<div class="form-group">
											<label>Nomor HP/Cellular</label>
											<input type="text" name="hp" class="form-control" value="<?php echo $konfigurasi->hp ?>" >
										</div>
										<h3>Sosial Media <i class="la la-feed"></i></h3>
										<div class="form-group">
											<label>Facebook <i class="
												la la-facebook"></i></label>
												<input type="text" name="facebook" class="form-control" value="<?php echo $konfigurasi->facebook ?>" >
											</div>
											<div class="form-group">
												<label>Instagram <i class="
													la la-instagram"></i></label>
													<input type="text" name="instagram" class="form-control" value="<?php echo  $konfigurasi->instagram ?>" >
												</div>
											</div>
											<div class="col-md-6">
												<h4>Modul SEO (Search Engine Optimization) <i class="la la-google"></i>
												</h4>
												<hr>
												<div class="form-group">
													<label>Keywords (Keyword search for Google, Bing, etc)</label>
													<textarea name="keywords" class="form-control"><?php echo $konfigurasi->keywords ?></textarea>
												</div>
												<div class="form-group">
													<label>Metatext</label>
													<textarea name="metatext" class="form-control"><?php echo $konfigurasi->metatext ?></textarea>
												</div>
												<h4>Google Map <i class="la la-map-marker"></i>
												</h4>
												<hr>
												<div class="form-group">
													<label>Google Maps</label>
													<textarea name="google_maps" class="form-control"><?php echo $konfigurasi->google_maps ?></textarea>
												</div>
												<div class="form-group map">
													<iframe src="<?php echo $konfigurasi->google_maps ?>"width="465" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
												</div>		


											</div>
										</div>

										<input type="submit" name="submit" value="Simpan Konfigurasi" class="btn btn-success">
										
										

										<?php echo form_close(); ?>


									</div>
									<!-- closelist -->
								</div>
							</div>
						</div>


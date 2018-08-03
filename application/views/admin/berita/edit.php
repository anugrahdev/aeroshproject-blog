

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
echo form_open_multipart(base_url('admin/berita/edit/'.$berita->id_berita));

 ?>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Judul Berita</label>
             <input type="text" name="judul" class="form-control" placeholder="judul" value="<?php echo $berita->judul ?>" required>
            </div>
          </div> 
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" name="gambar" class="form-control">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
 <label>kategori berita <sup><a href="<?php echo base_url('admin/kategori_berita') ?>"><i class="fa fa-plus"></i></a></sup></label> 
  <select class="form-control" name="id_kategori_berita">
    <?php foreach ($kategori as $kategori) { ?>
    <option value="<?php echo $kategori->id_kategori_berita ?>">
      <?php echo $kategori->nama_kategori_berita ?>
    </option>
  <?php } ?>
    
  </select>

 </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>Status Berita</label>
              
              <select name="status_berita" class="form-control" required>

                <option value="Publish">Publish</option>
                <option value="Draft">Simpan Dalam Draft</option>

              </select>


              
            </div>
          </div>
        </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-control">
                <label>Isi Berita</label>
                <textarea id="summernote" name="isi" required><?php echo $berita->isi ?></textarea>
                <script>
                  $('#summernote').summernote({
                    
                    tabsize: 2,
                    height: 100
                  });
                </script>

              </div>
            </div>



          </div>
          <input type="submit" name="submit" value="Edit" class="btn btn-success">
    <input type="reset" name="reset" value="Reset" class="btn btn-default">

          <?php echo form_close(); ?>


        </div>
        <!-- closelist -->
      </div>
    </div>
  </div>


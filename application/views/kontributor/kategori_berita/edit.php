






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
            <div class="card-body">

 <?php 
//valdiasi input
        echo validation_errors('<div class="alert alert-warning">','</div>');

//openform
        echo form_open(base_url('admin/kategori_berita/edit/'.$kategori->id_kategori_berita));

        ?>

        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label>Judul Kategori</label>
              <input type="text" class="form-control" name="nama_kategori_berita" placeholder="Masukkan Judul Kategori Berita" value="<?php echo $kategori->nama_kategori_berita ?>" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Urutan</label>
              <input type="number" class="form-control" name="urutan" placeholder="Masukkan Urutan" value="<?php echo $kategori->urutan ?>">
            </div>
          </div>
        </div>  

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Keterangan</label>
              <textarea name="keterangan" class="form-control" value="<?php echo $kategori->keterangan ?>"><?php echo $kategori->keterangan ?></textarea>
            </div>
          </div>
        </div>

        <!-- END MODAL BODY -->
        <?php form_close(); ?>
   <div class="row">
     <div class="col-md-10">
       <input type="submit" name="submit" value="Edit" class="btn btn-success">
        <input type="reset" name="reset" value="Reset" class="btn btn-default">
     </div>
     <div class="col-md-2">
       
     </div>
   </div>
 </div>
<?php form_close(); ?>
</div>
</div>
</div>

      <!-- closelist -->
    </div>
  </div>
</div>


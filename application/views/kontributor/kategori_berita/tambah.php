<!-- Button to Open the Modal -->

<a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-info" data-toggle="modal" data-target="#tambah">Tambah <i class="
 la la-user-plus"></i></a>

 <!-- The Modal -->
 <div class="modal fade" id="tambah">
  <div class="modal-dialog modal-dialog-centered modal-lg">
   <div class="modal-content">

    <!-- Modal Header -->
    <div class="modal-header bg-primary">
     <h4 class="modal-title">Tambah Data</h4>
     <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>

   <!-- Modal body -->
   <div class="modal-body">
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
        echo form_open(base_url('admin/kategori_berita/tambah'));

        ?>

        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label>Judul Kategori</label>
              <input type="text" class="form-control" name="nama_kategori_berita" placeholder="Masukkan Judul Kategori Berita" value="<?php set_value('nama_kategori_berita') ?>" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Urutan</label>
              <input type="number" class="form-control" name="urutan" placeholder="Masukkan Urutan" value="<?php set_value('urutan') ?>">
            </div>
          </div>
        </div>  

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Keterangan</label>
              <textarea name="keterangan" class="form-control" value="<?php set_value('keterangan') ?>"></textarea>
            </div>
          </div>
        </div>

        <!-- END MODAL BODY -->
        <?php form_close(); ?>
      </div>
    </div>
  </div>

  
</div>

<!-- Modal footer -->
<div class="modal-footer">
  <input type="submit" name="submit" value="Tambah" class="btn btn-success">
  <input type="reset" name="reset" value="Reset" class="btn btn-default">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<!-- end modal -->
</div>
</div>
</div>
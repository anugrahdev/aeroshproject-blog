<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $berita->id_berita ?>" title="delete">
  <i class="la la-trash-o"></i>
</button>


<!-- Modal -->
  <div class="modal fade" id="delete<?php echo $berita->id_berita ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        
        <div class="modal-header bg-danger">
          <h6 class="modal-title"> Delete berita</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">                  
           Apakah anda yakin ingin menghapus data ini ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="<?php echo base_url('kontributor/berita/delete/'.$berita->id_berita) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i>Hapus</a>
        </div>
      </div>
    </div>
  </div>

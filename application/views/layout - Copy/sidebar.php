<div class="col-md-3">

         <div class="list-group" style="box-shadow: 0 0px 1px 0px rgba(0, 0, 0, 0.26);">
         
         <a href="#" class="list-group-item active">Total <?php echo count($kategori) ?> Kategori <small class="pull-right">Lihat Semua  <i class="fa fa-share "></i> </small> </a>

         <?php foreach ($kategori as $kategori) { ?>

         <a href="#" class="list-group-item"><?php echo $kategori->nama_kategori_berita ?><span class="badge badge-primary">6 Posts</span></a>

        <?php } ?>

        </div>
        <div class="ads-img" style="border: 11px solid #eee;">
          <img src="images/img-sid.jpeg" style="width: 100%; height: auto;">
         </div>
         </div>


    </div><!-- end row -->
</div>
</section>
        
</div><!-- end con fluid -->

<div class="col-md-3">

   <div class="list-group" style="box-shadow: 0 0px 1px 0px rgba(0, 0, 0, 0.26);">

       <a href="#" class="list-group-item active">Total <?php echo count($kategori) ?> Kategori <small class="pull-right">Lihat Semua  <i class="fa fa-share "></i> </small> </a>

       <?php foreach ($kategori as $kategori) { ?>

           <a href="<?php echo base_url  ('berita/kategori/'.$kategori->slug_kategori_berita) ?>" class="list-group-item"><?php echo $kategori->nama_kategori_berita ?><span class="badge badge-primary"></span></a>

       <?php } ?>

   </div>

   <aside>
    <h3>Berita Terbaru</h3>
    <ul>
        <?php foreach ($beritasidebar as $beritasidebar) { ?>
        
        <li><a href="<?php echo base_url('berita/read/'.$beritasidebar->slug_berita) ?>"><?php echo $beritasidebar->judul ?></a></li>
        <?php } ?>
  </ul>
</aside>
</div>


</div><!-- end row -->
<div class="row">
    <div class="paginasi col-md-12 text-center">

        <?php if(isset($paginasi)) {
           echo $paginasi; 
       } ?>
   </div>
</div>
</div>
</section>





</div><!-- end con fluid -->



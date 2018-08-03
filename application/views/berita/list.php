

<div class="container-fluid">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
              
    <?php foreach ($berita as $berita) { ?>
         <div class="item col-md-4">
            <div class="thumbnail as">
               <img src="<?php echo base_url('assets/upload/images/thumbs/'.$berita->gambar) ?>" alt="" />
                <div class="caption">
                    <div class="c_hr">
                    <h4 ><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>"><?php echo $berita->judul ?></a></h4>
                        <?php 
                        $tanggal = date("D, d F Y", strtotime($berita->tanggal)) ?>
                         <small> <?php echo $tanggal ?></small> | by <a href="#"><?php echo $berita->nama ?></a>

                     </div>
                    <p class="group inner list-group-item-text" style="font-family: arial; font-size: 14px;"><?php echo character_limiter(strip_tags($berita->isi),220); ?> </p>
                    <div class="row"></div>
                </div>
                
            </div>
        </div>
     <?php } ?>

    

</div>


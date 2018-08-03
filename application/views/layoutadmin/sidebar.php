
  
<div class="sidebar">
        <div class="scrollbar-inner sidebar-wrapper">
          <div class="user">
            <div class="photo">
              <img src="<?php echo base_url ('assets/upload/images/profile/thumbs/'.$user_aktif->gambar) ?>">
            </div>
            <div class="info">
              <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                <span>
                  <?php echo $user_aktif->nama ?>
                  <span class="user-level"><?php echo $user_aktif->akses_level ?></span>
                  <span class="caret"></span>
                </span>
              </a>
              <div class="clearfix"></div>

              <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                <ul class="nav">
                  <li>
                    <a href="#profile">
                      <span class="link-collapse"><a href="<?php echo base_url('admin/profile/') ?>">My Profile</a></span>
                    </a>
                  </li>
                  <li>
                    <a href="#edit">
                      <span class="link-collapse"><a href="<?php echo base_url('admin/profile/edit/'.$user_aktif->id_user) ?>">Edit Profile</a></span>
                    </a>
                  </li>
                  <li>
                    <a href="#settings">
       
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <?php if ($user_aktif->akses_level == 'Admin') { ?>
          <ul class="nav">
            
            <li class="nav-item">
              <a href="<?php echo base_url('admin/Dashboard') ?>">
                <i class="la la-dashboard"></i>
                <p>Dashboard</p>
                <!-- <span class="badge badge-count">14</span> -->
              </a>
            </li>
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="la la-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Menu</h4>
            </li>
            
            <li class="nav-item">
              <a href="<?php echo base_url('admin/user') ?>">
                <i class="la la-users"></i>
                <p>Users</p>
                <!-- <span class="badge badge-count">50</span> -->
              </a>
            </li>
            <li class="nav-item">
              <a data-toggle="collapse" href="#tables">
                <i class="la la-book"></i>
                <p>Berita</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="<?php echo base_url('admin/berita') ?>">
                      <span class="sub-item">Data Berita</span>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('admin/kategori_berita') ?>">
                      <span class="sub-item">Kategori Berita</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="la la-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Setting</h4>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/Konfigurasi') ?>">
                <i class="la la-wrench"></i>
                <p>Konfigurasi Website</p>
              </a>
            </li>
            
          </ul>
         <?php }else{ ?> 
           <ul class="nav">
            
            <li class="nav-item">
              <a href="<?php echo base_url('kontributor/Dashboard') ?>">
                <i class="la la-dashboard"></i>
                <p>Dashboard</p>
                <!-- <span class="badge badge-count">14</span> -->
              </a>
            </li>
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="la la-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Menu</h4>
            </li>
            

            <li class="nav-item">
              <a data-toggle="collapse" href="#tables">
                <i class="la la-book"></i>
                <p>Berita</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="<?php echo base_url('kontributor/berita') ?>">
                      <span class="sub-item">Data Berita</span>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('kontributor/kategori_berita') ?>">
                      <span class="sub-item">Kategori Berita</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            
          </ul>
              <?php } ?>

        </div>
      </div>







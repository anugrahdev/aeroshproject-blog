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
                                          echo validation_errors ('<div class="alert alert-warning">','</div>');

                                          echo form_open(base_url('admin/user/tambah'));
                                          ?>

                                          <div class="form-row">
                                                 <div class="col-md-5">
                                                        <div class="form-group">
                                                               <label for="username">Username</label>
                                                               <input type="text" name="username" class="form-control" placeholder="Masukkan Username " value="<?php echo set_value('username') ?>" required>

                                                        </div>
                                                 </div>

                                                 <div class="col-md-5">
                                                        <div class="form-group">
                                                               <label for="name">Nama</label>
                                                               <input type="text" name="nama" value="<?php echo set_value('nama') ?>" class="form-control" placeholder="Masukkan Nama " required>
                                                        </div>

                                                 </div>
                                                 <div class="col-md-2">
                                                        <div class="form-group">
                                                               <label for="akses_level">Akses Level</label>
                                                               <select class="form-control" name="akses_level">
                                                                      <option value="Admin">Admin</option>
                                                                      <option value="Kontributor">Kontributor</option>
                                                               </select>
                                                        </div>

                                                 </div>

                                                 <input type="hidden" name="gambar" value="defaultprofile.png">

                                          </div>


                                          <div class="form-row">
                                                 <div class="col-md-6">
                                                        <div class="form-group">
                                                               <label for="email">Email Address</label>
                                                               <input type="email" class="form-control" id="email" value="<?php echo set_value('email') ?>" placeholder="Masukkan Email" name="email" required>
                                                               <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                        </div> 
                                                 </div>
                                                 <div class="col-md-6">
                                                        <div class="form-group">
                                                               <label for="password">Password</label>
                                                               <input type="password" value="<?php echo set_value('password') ?>" class="form-control" id="password" placeholder="Password" name="password" required>
                                                        </div>
                                                 </div>
                                          </div>
                                          
                                   </div>
                            </div>
                     </div>

                     <?php form_close(); ?>
              </div>
              
              <!-- Modal footer -->
              <div class="modal-footer">
                    <input type="submit" name="submit" value="Tambah" class="btn btn-success">
                    <input type="reset" name="reset" value="Reset" class="btn btn-default">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             </div>
             
      </div>
</div>
</div>
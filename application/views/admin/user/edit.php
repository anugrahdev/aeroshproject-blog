






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
              echo validation_errors ('<div class="alert alert-warning">','</div>');

              echo form_open(base_url('admin/user/edit/'.$user->id_user));
              ?>

              <div class="form-row">
               <div class="col-md-5">
                <div class="form-group">
                 <label for="username">Username</label>
                 <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $user->username ?>"readonly>

               </div>
             </div>

             <div class="col-md-5">
              <div class="form-group">
               <label for="name">Nama</label>
               <input type="text" name="nama" value="<?php echo $user->nama ?>" class="form-control" placeholder="Masukkan Nama " required>
             </div>

           </div>
           <div class="col-md-2">
            <div class="form-group">
             <label for="akses_level">Akses Level</label>
             <select class="form-control" name="akses_level">
              <option value="Admin">Admin</option>
              <option value="Kontributor" <?php if($user->akses_level=='Kontributor'){ echo "selected"; } ?>>Kontributor</option>
            </select>
          </div>

        </div>


      </div>


      <div class="form-row">
       <div class="col-md-6">
        <div class="form-group">
         <label for="email">Email Address</label>
         <input type="email" class="form-control" id="email" value="<?php echo $user->email ?>" placeholder="Masukkan Email" name="email" required>
         <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div> 
     </div>
     <div class="col-md-6">
      <div class="form-group">
       <label for="password">Password</label>
       <input type="password" class="form-control" id="password" placeholder="Password" name="password">
     </div>
   </div>
 </div>
   <div class="row">
     <div class="col-md-10">
       <input type="submit" name="submit" value="Edit" class="btn btn-success">
        <input type="reset" name="reset" value="Reset" class="btn btn-default">
     </div>
     <div class="col-md-2">
       <a href="<?php echo base_url('admin/user') ?>"><i class="la la-arrow-circle-o-left
"></i>Back to user data</a>
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


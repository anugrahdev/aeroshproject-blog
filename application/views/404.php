<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title><?php echo $title; ?></title>

  <link rel="stylesheet" href="<?php echo base_url () ?>assets/stisla-admin/dist/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url () ?>assets/stisla-admin/dist/css/style.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>404</h1>
            <div class="page-description">
              The page you were looking for could not be found.
            </div>
            <div class="page-search">
            
              <div class="mt-3">
                <a href="<?php echo base_url('home') ?>">Back to Home</a>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="simple-footer mt-5">
          Copyright &copy; Stisla 2018
        </div> -->
      </div>
    </section>
  </div>

  <script src="<?php echo base_url () ?>assets/stisla-admin/dist/modules/jquery.min.js"></script>
  <script src="<?php echo base_url () ?>assets/stisla-admin/dist/modules/popper.js"></script>
  <script src="<?php echo base_url () ?>assets/stisla-admin/dist/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url () ?>assets/stisla-admin/dist/js/scripts.js"></script>
  <script src="<?php echo base_url () ?>assets/stisla-admin/dist/js/custom.js"></script>
</body>
</html>
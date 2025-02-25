<?php require_once('./config.php'); ?>
 <!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<style>
  /* Make the navbar transparent */
  #top-Nav {
    background-color: transparent !important;
    box-shadow: none !important;
  }

  #top-Nav a.nav-link.active {
    color: #001f3f;
    font-weight: 900;
    position: relative;
  }
  #top-Nav a.nav-link.active:before {
    content: "";
    position: absolute;
    border-bottom: 2px solid #001f3f;
    width: 33.33%;
    left: 33.33%;
    bottom: 0;
  }

  #header {
    height: 70vh;
    width: 100%;
    position: relative;
    top: -1em;
  }

  /* Change background to custom image */
  #header:before {
    content: "";
    position: absolute;
    height: 100%;
    width: 100%;
    background-image: url('/uploads/logo.jpg'); /* Replace this with your uploaded image URL */
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
  }

  #header > div {
    position: absolute;
    height: 100%;
    width: 100%;
    z-index: 2;
  }

  /* Remove the welcome message and body */
  #header .d-flex {
    display: none;
  }
</style>

<?php require_once('inc/header.php') ?>
<body class="layout-top-nav layout-fixed layout-navbar-fixed" style="height: auto;">
  <div class="wrapper">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
    <?php require_once('inc/topBarNav.php') ?>
    
    <?php if ($_settings->chk_flashdata('success')): ?>
      <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
      </script>
    <?php endif; ?>    

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-5" style="">
      <?php if ($page == "home" || $page == "about_us"): ?>
        <div id="header" class="shadow mb-4">
          <!-- Removed the welcome message and its body -->
        </div>
      <?php endif; ?>

      <!-- Main content -->
      <section class="content ">
        <div class="container">
          <?php 
            if (!file_exists($page.".php") && !is_dir($page)) {
              include '404.html';
            } else {
              if (is_dir($page)) {
                include $page.'/index.php';
              } else {
                include $page.'.php';
              }
            }
          ?>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    <?php require_once('inc/footer.php') ?>
  </div>
</body>
</html>

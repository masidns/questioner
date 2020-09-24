<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?=base_url('assets/dist/img/logo.png');?>">
  <title>Tingkat Kepuasan | <?=$title['title']?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/lib/form/css/smart_wizard.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/lib/form/css/smart_wizard_theme_arrows.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/lib/form/css/smart_wizard_theme_circles.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/lib/form/css/smart_wizard_theme_dots.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url('assets/dist/css/styleuser.css')?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <strong>LOGOUT</strong>
          </a>
        </li>
      </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?=base_url()?>assets/index3.html" class="brand-link">
        <img src="<?=base_url()?>assets/dist/img/logo.png" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><strong>TIKAM</strong></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <a href="#" class="d-block"><?= $this->session->userdata('NamaUser')?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?=base_url("user/home")?>" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Home
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url("user/pertanyaan")?>" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Pertanyaan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url("user/pertanyaan")?>" class="nav-link">
                <i class="nav-icon fa fa-SignOut"></i>
                <p>
                  LOGOUT
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?=$title['title']?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?=$title['title']?></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <?php
if (isset($_view) && $_view) {
    $this->load->view($_view);
}

?>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.5
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <!-- <aside class="control-sidebar control-sidebar-dark"> -->
      <!-- Control sidebar content goes here -->
    <!-- </aside> -->
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/lib/angular/angular.min.js"></script>
  <script src="<?=base_url('assets/js/user.apps.js')?>"></script>
  <script src="<?=base_url('assets/js/controllers/user.controllers.js')?>"></script>
  <script src="<?=base_url('assets/js/services/services.js')?>"></script>
  <script src="<?=base_url('assets/js/services/helper.service.js')?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url('assets/lib/form/js/jquery.smartWizard.js')?>"></script>
  <!-- AdminLTE App -->
  <script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?=base_url()?>assets/dist/js/demo.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?=base_url('assets/dist/js/tes.js')?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
  <script>
    // $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
    //   //alert("You are on step "+stepNumber+" now");
    //   if (stepPosition === 'first') {
    //     $("#prev-btn").addClass('disabled');
    //   } else if (stepPosition === 'final') {
    //     $("#next-btn").addClass('disabled');
    //   } else {
    //     $("#prev-btn").removeClass('disabled');
    //     $("#next-btn").removeClass('disabled');
    //   }
    // });

    $(function () {
      $(document).ready(function () {
          var data = $('.data-flush').data('flash');
          console.log(data);
          if (data) {
              var a = data.split(',');
              if (a[1].replace(/\s/g, '') == 'success') {
                  swal("Information!", a[0], "success");
              } else {
                  swal("Information!", a[0], "error");
              }
          }
      })
    })
  </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SICAPERPEDIA | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini">

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?=base_url()?>assets/dist/img/LogoKebumen.png" alt="AdminLTELogo" height="60" width="60">
</div>

<div class="wrapper">

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!--
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
    </ul>
  </nav>
  <!-- /.navbar -->


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>das" class="brand-link">
      <img src="<?=base_url()?>assets/dist/img/LogoKebumen.png" alt="AdminLTE Logo" class="brand-image img elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SICAPERPEDIA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>assets/dist/img/avatar.png" class="img-circle elevation-2" alt="<?php echo $session['username']; ?>">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $session['username']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if($session['role_name']=='superadmin' || $session['role_name']=='admin' || $session['role_name']=='operator' || $session['role_name']=='visitor') { ?>
          <li class="nav-item">
            <a href="<?=base_url()?>dashboard" class="nav-link <?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Dasboard
                </p>
            </a>
          </li>
          <?php } ?>
          <?php if($session['role_name']=='superadmin' || $session['role_name']=='admin' || $session['role_name']=='operator' ) { ?>
         
          <li class="nav-item">
                <a href="<?=base_url()?>transaksi" class="nav-link <?php if($this->uri->segment(1)=="pindah"){echo "active";}?>">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Transaksi
                  </p>
                </a>
          </li>                                                                                           
        </li> 
          <?php } ?> 

          <?php if($session['role_name']=='superadmin' || $session['role_name']=='admin' || $session['role_name']=='visitor') { ?>
          <li class="nav-item <?php if($this->uri->segment(1)=="pbi"){echo "menu-open";}?>">
            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="pbi"){echo "active";}?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Barang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>barang" class="nav-link <?php if($this->uri->segment(2)=="aktif"){echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>kategori" class="nav-link <?php if($this->uri->segment(2)=="nonaktif"){echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>stok" class="nav-link <?php if($this->uri->segment(2)=="nonaktif"){echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <?php if($session['role_name']=='superadmin' || $session['role_name']=='admin' || $session['role_name']=='visitor') { ?>
          <li class="nav-item <?php if($this->uri->segment(1)=="pbi"){echo "menu-open";}?>">
            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="pbi"){echo "active";}?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>laporan/kartuStok" class="nav-link <?php if($this->uri->segment(3)=="aktif"){echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kartu Stok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>laporan/tahunan" class="nav-link <?php if($this->uri->segment(3)=="nonaktif"){echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tahunan</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <?php if($session['role_name']=='superadmin' || $session['role_name']=='admin') { ?>
          <li class="nav-item">
                <a href="<?=base_url()?>user" class="nav-link <?php if($this->uri->segment(1)=="user"){echo "active";}?>">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Pengguna
                  </p>
                </a>
          </li>
          <?php } ?> 
          <li class="nav-item">
                <a href="<?=base_url()?>user/logout" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>
                    Sign Out
                  </p>
                </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
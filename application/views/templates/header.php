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
      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>assets/index3.html" class="brand-link">
      <img src="<?=base_url()?>assets/dist/img/LogoKebumen.png" alt="AdminLTE Logo" class="brand-image img elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SICAPER <sub>Persediaan</sub></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$session['username'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if($session['role_name']=='superadmin' || $session['role_name']=='admin' || $session['role_name']=='operator' | $session['role_name']=='visitor') { ?>
          <li class="nav-item">
            <a href="<?=base_url()?>dashboard" class="nav-link <?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Dasboard
                </p>
            </a>
          </li>
         
          <?php if($session['role_name']=='superadmin' || $session['role_name']=='admin' || $session['role_name']=='operator') { ?>
          <li class="nav-item">
                <a href="<?=base_url()?>pindah" class="nav-link <?php if($this->uri->segment(1)=="pindah"){echo "active";}?>">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Pembelian
                  </p>
                </a>
          </li>
          <?php } ?> 

          <?php if($session['role_name']=='superadmin' || $session['role_name']=='admin' || $session['role_name']=='operator') { ?>
          <li class="nav-item">
                <a href="<?=base_url()?>pindah" class="nav-link <?php if($this->uri->segment(1)=="pindah"){echo "active";}?>">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Persediaan
                  </p>
                </a>
          </li>
          <?php } ?> 

          <?php if($session['role_name']=='superadmin' || $session['role_name']=='admin' || $session['role_name']=='operator') { ?>
          <li class="nav-item">
                <a href="<?=base_url()?>laporan" class="nav-link <?php if($this->uri->segment(1)=="laporan"){echo "active";}?>">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Laporan
                  </p>
                </a>
          </li>
          <?php } ?> 

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


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
         
        <div class="row">
        <?php if($session['role_name']=='superadmin' || $session['role_name']=='admin' || $session['role_name']=='operator' ) { ?>
       
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?= $jumlah_barang[0]->jumlah ?></h3>

                <p>Data Barang</p>
              </div>
              <div class="icon">
                <i class="ion ion-folder"></i>
              </div>
              <a href="<?=base_url()?>barang" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $jumlah_kategori[0]->jumlah ?></h3>
                
                <p>Data Kategori</p>
              </div>
              <div class="icon">
                <i class="ion ion-filing"></i>
              </div>
              <a href="<?=base_url()?>kategori" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?>
          <!-- ./col -->
          <?php if($session['role_name']=='superadmin' || $session['role_name']=='admin' || $session['role_name']=='visitor' ) { ?>
       
          <div class="col-lg-3 col-6">
         
            <!-- small box -->
           
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $jumlah_transaksi_bulan[0]->jumlah ?></h3>

                <p>Data Transaksi Bulan Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="<?=base_url()?>transaksi" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
            </div>

          </div>
          <!-- ./col --> 
          <div class="col-lg-3 col-6">

            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3>
              <h3><?= $jumlah_transaksi_tahun[0]->jumlah ?></h3>
                </h3>
                <p>Data Transaksi Tahun Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?=base_url()?>transaksi" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            
          </div>
          <!-- ./col -->
        </div>
        
        <?php } ?>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
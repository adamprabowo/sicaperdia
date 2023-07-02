<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Stok Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Barang</a></li>
              <li class="breadcrumb-item active">Stok Barang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-12">
            <!-- Alert -->
            <?php if(!empty($this->session->flashdata('status'))){ ?>
            <div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
            <?php } ?>

            <div class="card">
              <?php if($session['role_name']=='operator') { ?>
              <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">Input 
                    <i class="fa fa-plus"></i>
                </button>
              </div>
              <?php } ?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="pindahTable" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Tahun</th>
                    <th>Jumlah Stok</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($list_barang)) {
                    $no=1; foreach($list_barang as $dt){ ?>
                    <tr>
                    <td width="5%"><?=$no; ?></td>
                    <td><?=$dt->kode_barang; ?></td>
                    <td><?=$dt->nama_barang; ?></td>
                    <td><?=rupiah($dt->harga); ?></td>
                    <td><?=$dt->tahun; ?></td>
                    <td><?=$dt->jumlah_stok_terbaru; ?></td>
                    </tr>
                  <?php $no++; }} ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>


      
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
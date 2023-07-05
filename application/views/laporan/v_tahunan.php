<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Laporan Tahunan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Laporan</a></li>
              <li class="breadcrumb-item active">Tahunan</li>
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
            <!-- .card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Persediaan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Uraian</th>
                    <th>Satuan</th>
                    <th>Persediaan Fisik </br> per 31 Des 2022</th>
                    <th>Pembelian</th>
                    <th>Pemakaian</th>
                    <th>Persediaan Fisik </br> per 30 Jun 2023</th>
                    <th>Harga Satuan</th>
                    <th>Nilai Stok Fisik</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($laporan_tahunan)) {
                      $no=1; 
                      foreach($laporan_tahunan as $lt){ ?>
                      <tr>
                      <td width="5%"><?=$no; ?></td>
                      <td><?=$lt->kode_barang; ?></td>
                      <td><?=$lt->uraian ?></td>
                      <td><?=$lt->satuan; ?></td>
                      <td><?=$lt->persediaan_fisik_awal; ?></td>
                      <td><?=$lt->pembelian; ?></td>
                      <td><?=$lt->pemakaian; ?></td>
                      <td><?=$lt->persediaan_fisik_terbaru; ?></td>
                      <td><?= "Rp " . number_format($lt->harga_satuan, 0, ",", "."); ?></td>
                      <td><?= "Rp " . number_format($lt->nilai_stok_fisik, 0, ",", "."); ?></td>
                      </tr>
                    <?php $no++;  }} ?>
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
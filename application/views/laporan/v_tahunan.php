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
                <table id="laporanTahunan" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="2%">No</th>
                    <th width="5%">Kode Barang</th>
                    <th width="10%">Uraian</th>
                    <th width="5%">Satuan</th>
                    <th width="5%">Persediaan Fisik per 31 Des 2022</th>
                    <th width="10%">Pembelian</th>
                    <th width="10%">Pemakaian</th>
                    <th width="5%">Persediaan Fisik per 30 Jun 2023</th>
                    <th width="5%">Harga Satuan</th>
                    <th width="10%">Nilai Stok Fisik</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($laporan_tahunan)) {
                      $no=1;
                      $jml_pfa=0;//pfa (persediaan fisik awal)
                      $jml_pembelian=0;
                      $jml_pemakaian=0;
                      $jml_pft=0;//pft (perseidaan fisik terbaru)
                      $jml_nsf=0;// nsf (nilai stok fisik)
                      foreach($laporan_tahunan as $lt){ ?>
                      <tr>
                      <td width="2%"><?=$no; ?></td>
                      <td width="5%"><?=$lt->kode_barang; ?></td>
                      <td width="10%"><?=$lt->uraian ?></td>
                      <td width="5%"><?=$lt->satuan; ?></td>
                      <td width="5%"><?=$lt->persediaan_fisik_awal; ?></td>
                      <td width="10%"><?=$lt->pembelian; ?></td>
                      <td width="10%"><?=$lt->pemakaian; ?></td>
                      <td width="5%"><?=$lt->persediaan_fisik_terbaru; ?></td>
                      <td width="5%"><?= "Rp " . number_format($lt->harga_satuan, 0, ",", "."); ?></td>
                      <td width="10%"><?= "Rp " . number_format($lt->nilai_stok_fisik, 0, ",", "."); ?></td>
                      </tr>
                    <?php 
                        $no++; 
                        $jml_pfa+=$lt->persediaan_fisik_awal; 
                        $jml_pembelian+=$lt->pembelian; 
                        $jml_pemakaian+=$lt->pemakaian; 
                        $jml_pft+=$lt->persediaan_fisik_terbaru; 
                        $jml_nsf+=$lt->nilai_stok_fisik; 
                    }} ?>
                  </tbody>
                  <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <th>Jumlah <span class="totalForks"></span></th>
                        <td></td>
                        <th><?= number_format($jml_pfa, 0, ",", ".") ?><span class=""></span></th>
                        <th><?= number_format($jml_pembelian, 0, ",", ".") ?><span class=""></span></th>
                        <th><?= number_format($jml_pemakaian, 0, ",", ".") ?><span class=""></span></th>
                        <th><?= number_format($jml_pft, 0, ",", ".") ?><span class=""></span></th>
                        <td></td>
                        <th><?= number_format($jml_nsf, 0, ",", ".") ?><span class=""></span></th>
                    </tr>
                    </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a class="btn btn-success float-right" href="<?=base_url().'/laporan/generateXls'?>"><i class="fas fa-download"></i> Generate Excel</a>
              </div>
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
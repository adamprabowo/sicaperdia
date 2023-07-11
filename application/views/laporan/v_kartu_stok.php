 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kartu Stok Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Laporan</a></li>
              <li class="breadcrumb-item active">Kartu Stok</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- info row -->
              <div class="row invoice-info">
                <!-- /.col -->
                <div class="col-sm-6 invoice-col">
                  <address>
                    Nama Barang : <b><?= $barang->nama_barang ?></b><br>
                    Satuan : <b><?= $barang->satuan ?></b> <br>
                    Harga Satuan : <b><?= rupiah($barang->harga_terbaru) ?></b>
                  </address>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>No Bukti</th>
                      <th>Keterangan</th>
                      <th>Masuk</th>
                      <th>Keluar</th>
                      <th>Sisa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($barang)) {
                      $no=1; 
                      $jml_masuk=0;
                      $jml_keluar=0;
                      foreach($kartu_stok as $ks){ ?>
                        <?php 
                          if ($no==1) { ?>
                              <tr style="background-color:#fbeddf">
                              <td width="5%"><?=$no; ?></td>
                              <td><?=$ks->tanggal; ?></td>
                              <td> - </td>
                              <td> Saldo Awal </td>
                              <td> </td>
                              <td> </td>
                              <td><?= $data_awal->jumlah_stok ?></td>
                              </tr>
                        <?php } else { ?>
                              <tr>
                              <td width="5%"><?=$no; ?></td>
                              <td><?=$ks->tanggal; ?></td>
                              <td><?=$ks->no_bukti ?></td>
                              <td><?=$ks->keterangan; ?></td>
                              <td><?= ($ks->status==1) ? $ks->jumlah : '' ; ?></td>
                              <td><?= ($ks->status==2) ? $ks->jumlah : '' ;?></td>
                              <td><?=$sisa ?></td>
                              </tr>
                        <?php } ?>
                    <?php $no++; ($ks->status==1) ? $jml_masuk+=$ks->jumlah : $jml_keluar+=$ks->jumlah ;  }} ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Jumlah <span class="totalForks"></span></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th><?=$jml_masuk ?><span class=""></span></th>
                        <th><?=$jml_keluar ?><span class=""></span></th>
                        <td></td>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a class="btn btn-primary float-right" style="margin-right: 5px;" href="<?=base_url().'laporan/pdfKartuStok/'.$kode_barang ?>" target="_blank"><i class="fa fa-file-pdf-o" style="font-size:24px"></i>  Generate PDF</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
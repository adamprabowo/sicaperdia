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
                    <table id="table2" style="border-collapse: collapse; border: none;">
                        <tbody>
                            <tr style="border: none;">
                                <td style="border: none;"><b>Nama Barang</b></td>
                                <td style="border: none;"><b>:</b></td>
                                <td style="border: none;"><b>&emsp;<?= $barang->nama_barang ?></b> </td>
                            </tr>
                            <tr style="border: none;">
                                <td style="border: none;"><b>Satuan</b></td>
                                <td style="border: none;"><b>:</b></td>
                                <td style="border: none;"><b>&emsp;<?= $barang->satuan ?></b></td>
                            </tr>
                            <tr style="border: none;">
                                <td style="border: none;"><b>Harga Satuan</b></td>
                                <td style="border: none;"><b>:</b></td>
                                <td style="border: none;"><b>&emsp;<?= rupiah($barang->harga_terbaru) ?></td>
                            </tr>
                            </br>
                        </tbody> 
                    </table> 
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
                    <tr style="background-color:#fbeddf">
                      <th width="5%"> </th>
                      <th> <?= date_indo($data_awal->tanggal_awal) ?> </th>
                      <th>  </th>
                      <th> Saldo Awal </th>
                      <th> </th>
                      <th> </th>
                      <th><?= $data_awal->jumlah_stok ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($barang)) {
                      $no=1; 
                      $jml_masuk=0;
                      $jml_keluar=0;
                      foreach($kartu_stok as $ks){ ?>
                        <tr>
                        <td width="5%"><?=$no; ?></td>
                        <td><?=date_indo($ks->tanggal); ?></td>
                        <td><?=$ks->no_bukti ?></td>
                        <td><?=$ks->keterangan; ?></td>
                        <td><?= ($ks->status==1) ? $ks->jumlah : '' ; ?></td>
                        <td><?= ($ks->status==2) ? $ks->jumlah : '' ;?></td>
                        <td></td>
                        </tr>
                    <?php $no++; ($ks->status==1) ? $jml_masuk+=$ks->jumlah : $jml_keluar+=$ks->jumlah ;  }} ?>
                    </tbody>
                    <tfoot>
                    <tr style="background-color:#D0F5BE">
                        <th>Jumlah <span class="totalForks"></span></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th><?=$jml_masuk ?><span class=""></span></th>
                        <th><?=$jml_keluar ?><span class=""></span></th>
                        <th><?=$sisa ?><span class=""></span></th>
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
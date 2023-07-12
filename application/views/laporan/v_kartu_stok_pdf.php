<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title_pdf;?></title>
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }

            #table2 {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 30%;
            }

            #hh3 {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 30%;
                text-align:center;
            }
        </style>
    </head>
    <body>
        <div style="text-align:center">
            <h3 style="font-family:Helvetica;"> KARTU STOK BARANG</h3>
        </div>
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
        <table id="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>No Bukti</th>
                    <th>KETERANGAN</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>SISA</th>
                </tr>
                <tr style="background-color:#FFF7D4">
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
                <th colspan="4">Jumlah <span class="totalForks"></span></th>
                <th><?=$jml_masuk ?><span class=""></span></th>
                <th><?=$jml_keluar ?><span class=""></span></th>
                <th><?=$sisa ?><span class=""></span></th>
            </tr>
            </tfoot>
        </table>
    </body>
</html>
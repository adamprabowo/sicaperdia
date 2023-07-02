<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <div class="float-sm-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">Input 
                    <i class="fa fa-plus"></i>
                </button>
</div>
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
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="pindahTable" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th> 
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($list_transaksi)) {
                    $no=1; foreach($list_transaksi as $dt){ ?>
                    <tr>
                    <td width="5%"><?=$no; ?></td>
                    <td><?=date_indo($dt->tanggal); ?></td>
                    <td><?=$dt->nama_barang; ?></td>
                    <td><?=$dt->keterangan; ?></td>
                    <td><?=$dt->jumlah; ?></td>
                    <td><?=rupiah($dt->harga); ?></td>
                    <td><?=$dt->status; ?></td>
                    <td>
                        <!-- Call to action buttons -->
                        <ul class="list-inline m-0">
                            
                            <?php if($session['role_name']=='superadmin' || $session['role_name']=='admin') { ?>
                            <li class="list-inline-item">
                                <a href="#" class="delete_data" data-toggle="modal" data-target="#modal_delete_data<?=$no?>" id="delete">
                                  <i class="fa fa-trash" style="color:red"></i>
                                </a>
                            </li>
                            <?php }?>
                        </ul>
                    </td>
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


      <!-- modal -->
      <!-- CREATE -->
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form method="POST" enctype="multipart/form-data" onsubmit="return cek_input()" action="<?=base_url()?>transaksi/inputData">
              <div class="modal-header">
                <h4 class="modal-title">Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- jquery validation -->
                  <!-- /.card-header -->
                  <!-- form start -->
                      <div class="card-body">
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Pilih Tanggal" required>
                                </div>

                                <div class="form-group">
                                  <label for="stok">Stok Terbaru</label>
                                  <input type="number" name="stok" class="form-control" id="stok" placeholder="Isikan Angka" required>
                              </div>

                              <div class="form-group">
                                  <label for="harga">Status</label>
                                  <select name="status" id="status" class="form-control" >
                    
                                        <option  value="" >- Pilih Status -</option>
                                        <option  value="0" <?php //$transaksi->kode_barang == $barang->id_barang ? "selected" : ""; ?>>Masuk</option>
                                        <option  value="1" >Keluar</option>
                                        
                                        

                                    </select>
                                  
                                  </div>
                                
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Isikan Keterangan" required>
                                </div>
                          </div>
                        <div class="col-6">

                              
                              <div class="form-group">
                                    <label for="nik">Pilih Barang</label>
                                    <select name="id_barang" id="id_barang" class="form-control" >
                    
                                        <option  value="">- Pilih Barang -</option>
                                        <?php foreach ($list_barang as $barang){
                                            $selected = $transaksi->kode_barang == $barang->id_barang ? "selected" : "";
                                            ?>
                                            <option value="<?php echo $barang->kode_barang; ?>" <?php echo $selected; ?>>
                                                <?php echo $barang->nama_barang; ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                </div>
                              <div class="form-group">
                                  <label for="harga">Harga</label>
                                  <input type="number" name="harga" class="form-control" id="harga" placeholder="Isikan Angka" required>
                              </div>
                              
                                
                        <div class="form-group">
                                  <label for="jumlah">Jumlah</label>
                                  <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Isikan Angka" required>
                              </div>
                        </div>
                              
                            </div>    
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <?php if (!empty($list_transaksi)) {
        $no=1; foreach($list_transaksi as $dt){ ?> 

        <!-- DELETE -->
        <div class="modal fade" id="modal_delete_data<?=$no?>">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p id="confirm_str">Yakin Hapus Data <b><?=$dt->nama_barang?></b> tanggal <?=$dt->tanggal?></p>
              </div>
              <div class="modal-footer">
                <a class="btn btn-danger" href="<?=base_url().'transaksi/delete/'.$dt->id_transaksi ?>"> Hapus </a>
                <button class="btn btn-default" data-dismiss="modal"> Tidak</button>
              </div>
            </div>
          </div>
        </div>

        
      <?php $no++; } } ?>

      <!-- /.modal -->
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript" src="<?php echo base_url().'assets/dist/js/jquery.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/dist/js/bootstrap.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
 
            $('#id_barang').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('transaksi/get_detail_barang');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        // for(i=0; i<data.length; i++){
                        //     html += '<input type=text value='+data[i].harga+'/>';
                        // }
                        $('#harga').val(data[0].harga);
                        $('#stok').val(data[0].jumlah_stok_terbaru);
 
                    }
                });
                return false;
            }); 
             
        });
    </script>

<script>
        function cek_input(){
            let a = document.getElementById("id_barang").value;
            if(a == ""){
                alert('Harus memilih salah satu barang');
                document.getElementById("id_barang").focus();
                return false;
            }
            
            let b = document.getElementById("status").value;
            if(b == ""){
                alert('Harus memilih salah satu status transaksi');
                document.getElementById("status").focus();
                return false;
            }
            

            let c = document.getElementById("jumlah").value;
            let d = document.getElementById("stok").value;

            if(c == ""){
                alert('Harus mengisi jumlah');
                document.getElementById("jumlah").focus();
                return false;
            }else{

              if(b == "1"){
                if(d<c){
                  alert('Periksa kembali stok barang');
                  document.getElementById("jumlah").focus();
                  return false;
                }
                
            }

            }
            


            
        }
    </script>

  
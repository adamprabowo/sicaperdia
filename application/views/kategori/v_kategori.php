<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Barang</a></li>
              <li class="breadcrumb-item active">Kategori</li>
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
                    <th>Aksi</th> 
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($list_kategori)) {
                    $no=1; foreach($list_kategori as $dt){ ?>
                    <tr>
                    <td width="5%"><?=$no; ?></td>
                    <td><?=$dt->id_kategori; ?></td>
                    <td><?=$dt->nama_kategori; ?></td>
                    <td>
                        <!-- Call to action buttons -->
                        <ul class="list-inline m-0">
                            <?php if($session['role_name']=='operator') { ?>
                            <li class="list-inline-item">
                                <a href="#" class="edit_kematian" data-toggle="modal" data-target="#modal_edit_kematian<?=$no?>" id="edit">
                                  <i class="fa fa-edit" style="color:orange"></i>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if($session['role_name']=='superadmin' || $session['role_name']=='admin') { ?>
                            <li class="list-inline-item">
                                <a href="#" class="delete_kematian" data-toggle="modal" data-target="#modal_delete_kematian<?=$no?>" id="delete">
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
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
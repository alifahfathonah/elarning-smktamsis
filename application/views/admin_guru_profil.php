  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>/themes/adminlte/adminlte.io/themes/dev/adminlte/plugins/datatables/dataTables.bootstrap4.css">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Informasi Profil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/beranda">Beranda</a></li>
              <li class="breadcrumb-item active">Informasi Profil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- <div class="card-header"> -->
              <!-- <h3 class="card-title">Daftar Informasi Kelas</h3> -->
            <!-- </div> -->
            <!-- /.card-header -->
            <div class="card-body">
              
                <div class="form-group">
                  <label for="inputNama">NIP</label>
                  <input value="<?php echo $row->guru_nip ?>" readonly name="nip" type="text" class="form-control" id="inputNama" placeholder="*) Nama Admin" required="">
                </div>
                <div class="form-group">
                  <label for="inputNama">Nama Guru</label>
                  <input value="<?php echo $row->guru_nama ?>" readonly name="nama" type="text" class="form-control" id="inputNama" placeholder="*) Nama Admin" required="">
                </div>
                <div class="form-group">
                  <label for="inputNoTelp">No Telpon</label>
                  <input value="<?php echo $row->guru_telp ?>" readonly name="telp" type="text" class="form-control" id="inputNoTelp" placeholder="*) Ex: 08123456789" required="">
                </div>
                <div class="form-group">
                  <label for="inputEmail">Email</label>
                  <input value="<?php echo $row->guru_email ?>" readonly name="email" type="email" class="form-control" id="inputEmail" placeholder="*) Ex: email@gmail.com" required="">
                </div>
                <div class="form-group">
                  <label for="inputAlamat">Alamat</label>
                  <textarea name="alamat" class="form-control" id="inputAlamat" required="" readonly>
                    <?php echo $row->guru_alamat?>
                  </textarea>
                </div>
                <div class="form-group">
                  <label for="inputUsername">Username</label>
                  <input value="<?php echo $row->guru_username ?>" readonly name="username" type="text" class="form-control" id="inputUsername" placeholder="*) Username" required="">
                </div>
                <div class="form-group">
                  <label for="inputPassword">Password</label>
                  <input value="<?php echo $row->guru_password ?>" readonly name="text" type="password" class="form-control" id="inputPassword" placeholder="*******" required="">
                </div>
                <a href="<?php echo base_url() ?>admin/form-edit-data-admin/<?php echo $row->guru_id ?>" class="btn btn-primary edit">Edit</a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- DataTables -->
<script src="<?php echo base_url()?>/themes/adminlte/adminlte.io/themes/dev/adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>/themes/adminlte/adminlte.io/themes/dev/adminlte/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>

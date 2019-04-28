  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>/themes/adminlte/adminlte.io/themes/dev/adminlte/plugins/datatables/dataTables.bootstrap4.css">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Informasi Kelas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Informasi Kelas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-sm-6">
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Informasi Kelas</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo base_url() ?>admin/add-kelas" role="form" id="addNewKelas" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="inputKelas">Nama Kelas</label>
                  <input name="kelas" type="text" class="form-control" id="inputKelas" placeholder="*) Nama Kelas Baru" required="">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Publish</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <div class="col-sm-6">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Kelas</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  foreach ($kelas as $key => $value) {
                    echo "
                      <tr>
                        <td>{$value->kelas_nama}</td>
                        <td>
                          <div class='btn-group'>
                            <button type='button' class='btn btn-default'>Action</button>
                            <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                              <span class='caret'></span>
                              <span class='sr-only'>Toggle Dropdown</span>
                            </button>
                            <div class='dropdown-menu' role='menu' x-placement='top-start' style='position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(67px, -165px, 0px);'>
                              <a class='dropdown-item edit' href='".base_url('admin/edit-kelas/'.$value->kelas_id)."'>Edit</a>
                              <a class='dropdown-item delete' href='".base_url('admin/delete-kelas/'.$value->kelas_id)."'>Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    ";
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Kelas</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
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

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- /.modal -->

<!-- DataTables -->
<script src="<?php echo base_url()?>/themes/adminlte/adminlte.io/themes/dev/adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>/themes/adminlte/adminlte.io/themes/dev/adminlte/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });

  $("form#addNewKelas").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: $(this).attr("action"),
        type: 'POST',
        data: formData,
        success: function (data) {
            alert( (data=='1') ? 'Data Berhasil Disimpan' : 'Data Gagal Disimpan' )
            location.reload()
        },
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json'

    });
  });

  $('.edit').on('click', function(e){
    e.preventDefault(); 
    $.get( $(this).attr('href'), function(data){
      $('#myModal .modal-title').html('Edit Informasi Kelas');
      $('#myModal .modal-body').html(data);
      $('#myModal').modal('show');
    } ,'html');

  });
  
  $('.delete').on('click', function(e){
    e.preventDefault(); 
    $.get( $(this).attr('href'), function(data){
      alert( (data=='1') ? 'Data Berhasil Dihapus' : 'Data Gagal Dihapus' )
      location.reload()
    } ,'json');
  });

  $(document).on('submit','form#editKelas',function(e){
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: $(this).attr("action"),
        type: 'POST',
        data: formData,
        success: function (data) {
            alert( (data=='1') ? 'Data Berhasil Diupdate' : 'Data Gagal Diupdate' )
            location.reload()
        },
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json'
    });
  });
</script>

<?php
if (! session_id())session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
  $module="modul/mod_kelas/kelas_c.php?module=kelas";


?>


      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-users"></i> Kelas</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Akademik</a>
          <span class="divider">/</span> 
          <a href="media.php?module=kelas" class="bread-current">Kelas</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">



            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Kelas</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                       <div style="padding-bottom: 10px;" align="right"><a href="#add" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Data Kelas</a></div>
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Nama Kelas</b></th>
                        <th><b>Wali Kelas</b></th>
                        <th width="100px"><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysql_query("SELECT * FROM kelas ");
                      while ($row = mysql_fetch_array($data)) {

                      $dguru = mysql_query("SELECT * FROM guru WHERE guru_id = '$row[guru_id]' ");
                      $guru = mysql_fetch_array($dguru);
                      // $sql = mysql_query("SELECT * FROM guru WHERE guru_id='$row[guru_id]' ");
                      // $guru = mysql_fetch_array($sql);
                       ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['kelas_nama']; ?></td>
                        <td><?php echo $guru['guru_nama']; ?></td>
                        <!-- <td><?php if ($row[block]=='Y') { echo "<span class='label label-danger'>Non Aktif</span>";
                        }elseif ($row[block]=='N') { echo "<span class='label label-success'>Aktif</span>"; }  ?></td> -->

                        <td width="120px">
                          <div class="btn-group1">
                          <!-- <a href="media.php?module=siswa&id=<?php echo $row[kelas_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-info" title="Lihat data siswa kelas <?php echo $row[kelas_nama]; ?>"><i class="fa fa-eye"></i></button></a> -->

                          <a href="#edit<?php echo $row[kelas_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-pencil"></i></button></a>

                          <a href="#delete<?php echo $row[kelas_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></button></a>
                          

                          
                        
                        </div>
                        </td>
                      </tr>
                      <?php $no++; } ?>
                      
                    </tbody>
                    
                  </table>
                  <div class="clearfix"></div>
                </div>
                </div>
              </div>

          
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
            </div>
            </div>
          </div>
        </div>


<!-- Tambah Data -->
    
     <div id="add" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header biru">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"><i class="fa fa-plus"></i> Tambah Data Kelas</h4>
                      </div>
                      <div class="modal-body">
                      <form method="POST" action="<?php echo $module; ?>&act=insert" enctype="multipart/form-data">
                      
                      <link rel="stylesheet" href="../../../assets/css/bootstrap-datetimepicker.min.css">
                      <script src="../../../assets/js/bootstrap-datetimepicker.min.js"></script>
                      <script src="../../../assets/js/custom.js"></script>


                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Kelas</label></div>
                          <div class="col-md-7">
                            <input type="text" class="form-control" name="nama_kelas"  required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Wali Kelas</label></div>
                          <div class="col-md-7">
                            <select name="guru" class="form-control selectlive" required>
                            <option value="">-Pilih Wali Kelas- </option>
                            <?php 
                            $dguru = mysql_query("SELECT * FROM guru");
                            while ($guru = mysql_fetch_array($dguru)) { ?>
                              <option value="<?php echo $guru[guru_id]; ?>"><?php echo $guru[guru_nama]; ?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>

                      
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                      </form> 
                    </div>
      </div>
     </div>
    <!-- End Tambah Data -->

    

<!-- Edit Data -->
    <?php 
                      
                      $data = mysql_query("SELECT * FROM kelas");
                      while ($row = mysql_fetch_array($data)) {
                      $sql = mysql_query("SELECT * FROM guru WHERE guru_id='$row[guru_id]' ");
                      $guru = mysql_fetch_array($sql);                      
    ?>       
      <div id="edit<?php echo $row[kelas_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header kuning">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"><i class="fa fa-pencil"></i> Edit Data Kelas</h4>
                      </div>
                      <div class="modal-body">
                      <form method="POST" action="<?php echo $module; ?>&act=update" enctype="multipart/form-data">
                      
                     


                     <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Kelas</label></div>
                          <div class="col-md-7">
                            <input type="hidden" name="id" value="<?php echo $row[kelas_id]; ?>">
                            <input type="text"  class="form-control" name="nama_kelas" value="<?php echo $row[kelas_nama]; ?>" required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Wali Kelas</label></div>
                          <div class="col-md-7">
                            <select name="guru" class="form-control selectlive" required>
                            <option value="<?php echo $guru[guru_id]; ?>"><?php echo $guru[guru_nama]; ?></option>
                            <!-- <option value="">-Pilih Wali Kelas- </option> -->
                            <?php 
                            $dguru = mysql_query("SELECT * FROM guru");
                            while ($guru = mysql_fetch_array($dguru)) { ?>
                              <option value="<?php echo $guru[guru_id]; ?>"><?php echo $guru[guru_nama]; ?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                      </div>
                      </form>
                    </div>
      </div>
     </div>
     <?php } ?>
    <!-- End Edit Data -->


<!-- Hapus Data -->
    <?php 
                      
                      $data = mysql_query("SELECT * FROM kelas ");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>    
      <div id="delete<?php echo $row[kelas_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header merah">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"><i class="fa fa-trash"></i> Hapus Data Kelas</h4>
                      </div>
                      <div class="modal-body">
                      
                      <form method="POST" action="<?php echo $module; ?>&act=delete">
                      
                      <div class="alert alert-danger">
                      <h4><i class="icon fa fa-ban"></i> <b>Peringatan!</b></h4>
                      Apakah Anda ingin menghapus Kelas <b><?php echo $row[kelas_nama]; ?></b> ? 
                      
                      </div>

                      <input type="hidden" name="id" value="<?php echo $row[kelas_id]; ?>">


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </div>
                      </form> 
                    </div>
      </div>
     </div>
     <?php } ?>
    <!-- End Hapus Data -->
        <?php } ?>  
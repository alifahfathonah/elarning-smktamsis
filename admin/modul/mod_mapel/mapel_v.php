<?php
if (! session_id())session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
  $module="modul/mod_mapel/mapel_c.php?module=mapel";


?>


      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-text"></i> Data Pelajaran</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="#" class="bread-current"> Akademik</a>
          <span class="divider">/</span> 
          <a href="media.php?module=mapel" class="bread-current"> Pelajaran</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Mata Pelajaran</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                       <div style="padding-bottom: 10px;" align="right"><a href="#add" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Data Mata Pelajaran</a></div>
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Nama Pelajaran</b></th>
                        <th width="100px"><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysql_query("SELECT * FROM pelajaran");
                      while ($row = mysql_fetch_array($data)) {
                       ?>
                      <tr>
                        <td width="5%"><?php echo $no; ?></td>
                        <td><?php echo $row['pelajaran_nama']; ?></td>
                        
                        <!-- <td>
                        <?php if ($row[block]=='Y') {
                          echo "<span class='label label-danger'>Non Aktif</span>";
                        }elseif ($row[block]=='N') {
                          echo "<span class='label label-success'>Aktif</span>";
                        }  ?>
                        </td> -->
                        <td width="120px">
                          <div class="btn-group1">
                        <a href="#edit<?php echo $row[pelajaran_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-pencil"></i></button></a>

                        <a href="#delete<?php echo $row[pelajaran_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></button></a>

                        <?php if ($row[block]=='Y') {?>
                          <a href="<?php echo $module; ?>&act=aktif&id=<?php echo $row['lesson_id']; ?>"><button type='button' class='btn btn-sm btn-success' title="Aktifkan"><i class="fa fa-check"></i></button>
                          <?php }elseif ($row[block]=='N') {?> 
                          <a href="#blokir<?php echo $row[lesson_id]; ?>" data-toggle="modal"><button type='button' class='btn btn-sm btn-danger' title="Non Aktifkan"><i class="fa fa-ban"></i></button></a>
                          <?php }  ?>
                        
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
                        <h4 class="title"><i class="fa fa-plus"></i> Tambah Data Mata Pelajaran</h4>
                      </div>
                      <div class="modal-body">
                      <form method="POST" action="<?php echo $module; ?>&act=insert" enctype="multipart/form-data">


                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Pelajaran</label></div>
                          <div class="col-md-7">
                            <input type="text" class="form-control" name="nama_pelajaran"  required>
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
                      
                      $data = mysql_query("SELECT * FROM pelajaran");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>       
      <div id="edit<?php echo $row[pelajaran_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header kuning">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"><i class="fa fa-pencil"></i> Edit Data Mata Pelajaran</h4>
                      </div>
                      <div class="modal-body">
                      <form method="POST" action="<?php echo $module; ?>&act=update" enctype="multipart/form-data">
                    
                     <div class="form-group">
                        <div class="row">
                          <div class="col-md-5"><label>Nama Mata Pelajaran</label></div>
                          <div class="col-md-6">
                            <input type="hidden" name="id" value="<?php echo $row[pelajaran_id]; ?>">
                            <input type="text"  class="form-control" name="nama_pelajaran" value="<?php echo $row[pelajaran_nama]; ?>" required>
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
                      
                      $data = mysql_query("SELECT * FROM pelajaran ");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>    
      <div id="delete<?php echo $row[pelajaran_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header merah">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-trash"></i></button>
                        <h4 class="title"><i class="fa fa-trash"></i> Hapus Mata Pelajaran</h4>
                      </div>
                      <div class="modal-body">
                      
                      <form method="POST" action="<?php echo $module; ?>&act=delete">
                      
                      <div class="alert alert-danger">
                      <h4><i class="icon fa fa-ban"></i> <b>Peringatan!</b></h4>
                      Apakah Anda ingin menghapus Mata Pelajaran <b><?php echo $row[pelajaran_nama]; ?></b> ? 
                      
                      </div>

                      <input type="hidden" name="id" value="<?php echo $row[pelajaran_id]; ?>">


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
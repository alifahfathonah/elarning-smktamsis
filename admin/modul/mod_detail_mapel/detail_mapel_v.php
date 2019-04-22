<?php
session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
  $module="modul/mod_detail_mapel/detail_mapel_c.php?module=detail_mapel";


?>


      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-text"></i> Detail Mata Pelajaran</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=mapel" class="bread-current">Detail Mata Pelajaran</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left"> Data Detail Mata Pelajaran</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                       <div style="padding-bottom: 10px;" align="right"><a href="#add" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Data Detail Mata Pelajaran</a></div>
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Nama Pelajaran</b></th>
                        <th><b>Pengajar</b></th>
                        <th><b>Kelas</b></th>
                        <th><b>Status</b></th>
                        <th width="100px"><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysql_query("SELECT * FROM detail_lesson ORDER BY class_id ASC");
                      while ($row = mysql_fetch_array($data)) {
                       $pel = mysql_query("SELECT * FROM lesson WHERE lesson_id = '$row[lesson_id]'");
                       $mapel = mysql_fetch_array($pel);

                       $kel = mysql_query("SELECT * FROM class WHERE class_id ='$row[class_id]' ");
                       $kelas = mysql_fetch_array($kel);

                       $gu = mysql_query("SELECT * FROM teacher WHERE teacher_id ='$row[teacher_id]'");
                       $guru = mysql_fetch_array($gu);
                       ?>
                      <tr>
                        <td width="5%"><?php echo $no; ?></td>
                        <td><?php echo $mapel[lesson_name]; ?></td>
                        <td><?php echo $guru[name]; ?></td>
                        <td><?php echo $kelas[class_name]; ?></td>
                        <td>
                        <?php if ($row[block]=='Y') {
                          echo "<span class='label label-danger'>Non Aktif</span>";
                        }elseif ($row[block]=='N') {
                          echo "<span class='label label-success'>Aktif</span>";
                        }  ?>
                        </td>
                        <td width="120px">
                          <div class="btn-group1">
                        <a href="#edit<?php echo $row[detail_lesson_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-pencil"></i></button></a>

                        <?php if ($row[block]=='Y') {?>
                          <a href="<?php echo $module; ?>&act=aktif&id=<?php echo $row[detail_lesson_id]; ?>"><button type='button' class='btn btn-sm btn-success' title="Aktifkan"><i class="fa fa-check"></i></button>
                          <?php }elseif ($row[block]=='N') {?> 
                          <a href="#blokir<?php echo $row[detail_lesson_id]; ?>" data-toggle="modal"><button type='button' class='btn btn-sm btn-danger' title="Non Aktifkan"><i class="fa fa-ban"></i></button></a>
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
                        <h4 class="title-putih"><i class="fa fa-plus"></i> Tambah Data Detail Mata Pelajaran</h4>
                      </div>
                      <div class="modal-body">
                      <form method="POST" action="<?php echo $module; ?>&act=insert" enctype="multipart/form-data">


                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Pelajaran</label></div>
                          <div class="col-md-6">
                            <select name="mapel" class="form-control selectlive" required>
                            <option value="">-pilih- </option>
                            <?php 
                            $data = mysql_query("SELECT * FROM lesson ORDER BY lesson_name ASC ");
                            while ($mapel = mysql_fetch_array($data)) { ?>
                              <option value="<?php echo $mapel[lesson_id]; ?>"><?php echo $mapel[lesson_name]; ?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Pengajar</label></div>
                          <div class="col-md-6">
                            <select name="guru" class="form-control selectlive" required>
                            <option value="">-pilih- </option>
                            <?php 
                            $data = mysql_query("SELECT * FROM teacher WHERE block = 'N' ORDER BY name ASC ");
                            while ($guru = mysql_fetch_array($data)) { ?>
                              <option value="<?php echo $guru[teacher_id]; ?>"><?php echo $guru[name]; ?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Kelas</label></div>
                          <div class="col-md-6">
                            <select name="kelas" class="form-control selectlive" required>
                            <option value="">-pilih- </option>
                            <?php 
                            $data = mysql_query("SELECT * FROM class WHERE block = 'N' ORDER BY class_name ASC ");
                            while ($kelas = mysql_fetch_array($data)) { ?>
                              <option value="<?php echo $kelas[class_id]; ?>"><?php echo $kelas[class_name]; ?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                      </form> 
                    </div>
      </div>
     </div>
    <!-- End Tambah Data -->

<!-- Edit Data -->
    <?php 
                      
                      $data = mysql_query("SELECT * FROM detail_lesson");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>       
      <div id="edit<?php echo $row[detail_lesson_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header kuning">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title-putih"><i class="fa fa-pencil"></i> Edit Data Detail Mata Pelajaran</h4>
                      </div>
                      <div class="modal-body">
                      <form method="POST" action="<?php echo $module; ?>&act=update" enctype="multipart/form-data">
                    
                     <div class="form-group">
                        <div class="row">
                          <div class="col-md-5"><label>Nama Mata Pelajaran</label></div>
                          <div class="col-md-6">
                            <input type="hidden" name="id" value="<?php echo $row[detail_lesson_id]; ?>">

                            <select name="mapel" class="form-control selectlive" required>
                              <?php 
                              $sql = mysql_query("SELECT * FROM lesson WHERE lesson_id ='$row[lesson_id]' ");
                              $mapel = mysql_fetch_array($sql);
                              ?>
                            <option value="<?php echo $mapel[lesson_id]; ?>"><?php echo $mapel[lesson_name]; ?> </option>

                              <?php 
                             $sql = mysql_query("SELECT * FROM lesson WHERE NOT lesson_id ='$row[lesson_id]' ORDER BY lesson_name ASC");
                             while ($mapel = mysql_fetch_array($sql)) { ?>
                              <option value="<?php echo $mapel[lesson_id]; ?>"><?php echo $mapel[lesson_name]; ?></option>
                             <?php } ?> 
                            </select>

                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-5"><label>Pengajar</label></div>
                          <div class="col-md-6">
                            <select name="guru" class="form-control selectlive" required>
                              <?php 
                              $sql = mysql_query("SELECT * FROM teacher WHERE teacher_id ='$row[teacher_id]'");
                              $tch = mysql_fetch_array($sql);
                              ?>
                            <option value="<?php echo $tch[teacher_id]; ?>"><?php echo $tch[name]; ?> </option>

                              <?php 
                             $sql = mysql_query("SELECT * FROM teacher WHERE NOT teacher_id ='$row[teacher_id]' ORDER BY name ASC ");
                             while ($tch = mysql_fetch_array($sql)) { ?>
                              <option value="<?php echo $tch[teacher_id]; ?>"><?php echo $tch[name]; ?></option>
                             <?php } ?>                            
                         
                            </select>
                          </div>
                        </div>
                      </div>

                       <div class="form-group">
                        <div class="row">
                          <div class="col-md-5"><label>Kelas</label></div>
                          <div class="col-md-6">
                            <select name="kelas" class="form-control selectlive" required>
                              <?php 
                              $sql = mysql_query("SELECT * FROM class WHERE class_id ='$row[class_id]' ");
                              $kls = mysql_fetch_array($sql);
                              ?>
                            <option value="<?php echo $kls[class_id]; ?>"><?php echo $kls[class_name]; ?> </option>

                              <?php 
                             $sql = mysql_query("SELECT * FROM class WHERE NOT class_id ='$row[class_id]' ORDER BY class_name ASC");
                             while ($kls = mysql_fetch_array($sql)) { ?>
                              <option value="<?php echo $kls[class_id]; ?>"><?php echo $kls[class_name]; ?></option>
                             <?php } ?>                            
                         
                            </select>
                          </div>
                        </div>
                      </div>


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                      </div>
                      </form>
                    </div>
      </div>
     </div>
     <?php } ?>
    <!-- End Edit Data -->


<!-- Blokir Data -->
    <?php 
                      
                      $data = mysql_query("SELECT * FROM detail_lesson ");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>    
      <div id="blokir<?php echo $row[detail_lesson_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header merah">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title-putih">Non Aktifkan Data Detail Mata Pelajaran</h4>
                      </div>
                      <div class="modal-body">
                      
                      <form method="POST" action="<?php echo $module; ?>&act=blokir">
                      <?php 
                      $spel = mysql_query("SELECT * FROM lesson WHERE lesson_id = '$row[lesson_id]' ");
                      $pel = mysql_fetch_array($spel);
                      $sgr = mysql_query("SELECT * FROM teacher WHERE teacher_id = '$row[teacher_id]' ");
                      $guru = mysql_fetch_array($sgr);
                       ?>
                      <div class="alert alert-danger">
                      <h4><i class="icon fa fa-ban"></i> <b>Peringatan!</b></h4>
                      Apakah Anda ingin Non Aktifkan Mata Pelajaran <b><?php echo $pel[lesson_name]; ?></b> dengan guru <b><?php echo $guru[name]; ?></b> ? 
                      Jika data tersebut dinon Aktifkan maka data tersebut tidak akan terbaca saat penginputan.  
                      </div>

                      <input type="hidden" name="id" value="<?php echo $row[detail_lesson_id]; ?>">


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" class="btn btn-danger">Non Aktifkan</button>
                      </div>
                      </form> 
                    </div>
      </div>
     </div>
     <?php } ?>
    <!-- End Blokir Data -->
        <?php } ?>  
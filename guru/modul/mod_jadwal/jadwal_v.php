<?php
session_start();

if (empty($_SESSION['nip']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
  $module="modul/mod_jadwal/jadwal_c.php?module=jadwal";


?>





<?php 
switch ($_GET['act']) {
default:
?>

      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-calendar"></i> Jadwal Ujian</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=jadwal" class="bread-current">Jadwal Ujian</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Jadwal Ujian</div>
                  <div class="widget-icons pull-right">
                    <a href="dynamic-tables.html#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="dynamic-tables.html#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                  <div style="padding-bottom: 10px;" align="right"><a href="media.php?module=jadwal&act=add" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Jadwal Ujian</a></div>    
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Nama Ujian</b></th>
                        <th><b>Kelas</b></th>
                        <th><b>Pelajaran</b></th>
                        <th><b>Guru</b></th>
                        <th><b>Tanggal</b></th>
                        <th><b>Jam</b></th>
                        <th><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysql_query("SELECT * FROM exm_schedule ");
                      while ($row = mysql_fetch_array($data)) {
                        $qk = mysql_query("SELECT * FROM detail_lesson, class WHERE class.class_id = detail_lesson.class_id AND detail_lesson.detail_lesson_id ='$row[detail_lesson_id]'  ");
                       $rk = mysql_fetch_array($qk);
                       $qp = mysql_query("SELECT * FROM detail_lesson, lesson WHERE lesson.lesson_id = detail_lesson.lesson_id AND detail_lesson.detail_lesson_id ='$row[detail_lesson_id]'  ");
                       $rp = mysql_fetch_array($qp);
                       $qg = mysql_query("SELECT * FROM detail_lesson, teacher WHERE teacher.teacher_id = detail_lesson.teacher_id AND detail_lesson.detail_lesson_id = '$row[detail_lesson_id]' ");
                       $rg = mysql_fetch_array($qg);
                        
                       ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row[exm_schedule_name]; ?></td>
                        <td><?php echo $rk[class_name]; ?></td>
                        <td><?php echo $rp[lesson_name]; ?></td>
                        <td><?php echo $rg[name]; ?></td>
                        <td><?php echo TanggalIndo($row[exm_date]); ?></td>
                        <td><?php echo $row[exm_hour]; ?></td>
                        <td width="120px">
                          <div class="btn-group1">

                          <a href="media.php?module=jadwal&act=edit&id=<?php echo $row[exm_schedule_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-pencil"></i></button></a>

                          <a href="#hapus<?php echo $row[exm_schedule_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i> </button></a>


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

<!-- Hapus Data -->
          <?php 
                      
                      $data = mysql_query("SELECT * FROM exm_schedule ");
                      while ($row = mysql_fetch_array($data)) {      
                      $qk = mysql_query("SELECT * FROM detail_lesson, class WHERE class.class_id = detail_lesson.class_id AND detail_lesson.detail_lesson_id ='$row[detail_lesson_id]'  ");
                       $rk = mysql_fetch_array($qk);
                       $qp = mysql_query("SELECT * FROM detail_lesson, lesson WHERE lesson.lesson_id = detail_lesson.lesson_id AND detail_lesson.detail_lesson_id ='$row[detail_lesson_id]'  ");
                       $rp = mysql_fetch_array($qp);
                       $qg = mysql_query("SELECT * FROM detail_lesson, teacher WHERE teacher.teacher_id = detail_lesson.teacher_id AND detail_lesson.detail_lesson_id = '$row[detail_lesson_id]' ");
                       $rg = mysql_fetch_array($qg);                
    ?>    
      <div id="hapus<?php echo $row[exm_schedule_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header merah">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title-putih"><i class="fa fa-trash"></i> Hapus Data Jadwal Ujian</h4>
                      </div>
                      <div class="modal-body">
                      
                      <form method="POST" action="<?php echo $module; ?>&act=delete">
                      
                      <div class="alert alert-danger">
                      <h4><i class="icon fa fa-ban"></i> <b>Peringatan!</b></h4>
                      Apakah Anda ingin menghapus data :
                      <hr />
                      Nama Ujian : <?php echo $row[exm_schedule_name]; ?>
                      <hr>
                      Kelas : <?php echo $rk[class_name]; ?>
                      <hr>
                      Pelajaran : <?php echo $rp[lesson_name]; ?>
                      <hr>
                      Guru : <?php echo $rg[name]; ?>
                      <hr>
                      Tanggal : <?php echo $row[exm_date]; ?>
                      <hr>
                      Jam : <?php echo $row[exm_hour]; ?>
                      </div>

                      <input type="hidden" name="id" value="<?php echo $row[exm_schedule_id]; ?>">


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </div>
                      </form> 
                    </div>
      </div>
     </div>
     <?php } ?>

<!-- End Hapus Data -->
<?php 
break;
case 'add';
 ?>

      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-calendar"></i> Tambah Jadwal Ujian</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=jadwal" class="bread-current">Jadwal Ujian</a>
          <span class="divider">/</span> 
          <a href="media.php?module=jadwal&act=add" class="bread-current">Tambah Jadwal Ujian</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">

          <div class="row">

                      <div class="col-md-2">
                      </div>
                      <div class="col-md-7">
                          <div class="alert alert-info">
                      <p align="center"><b>Pilih mata pelajaran, guru dan kelas yang akan ditambahkan sebagai jadwal ujian.</b></p>
                          </div>
                      </div>
                      <div class="col-md-2">
                      </div>

                    </div>


          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left"> 
                    <a href="media.php?module=jadwal" class="btn btn-default">
                     <i class="fa fa-arrow-left"></i> Jadwal Ujian
                    </a>
                  </div>
                  <div class="widget-icons pull-right">
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Mata Pelajaran</b></th>
                        <th><b>Pengajar</b></th>
                        <th><b>Kelas</b></th>
                        <th width="100px"><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysql_query("SELECT * FROM detail_lesson WHERE block = 'N' ORDER BY class_id ASC");
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
                        <td width="120px">
                          <div class="btn-group1">
                        <a href="media.php?module=jadwal&act=addjadwal&id=<?php echo $row[detail_lesson_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-primary"><i class="fa fa-check-square"></i> Pilih</button></a>
                        
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



<?php 
break;
case 'addjadwal';
$id = $_GET[id];
$ql = mysql_query("SELECT * FROM detail_lesson WHERE detail_lesson_id = '$id' ");
$r = mysql_fetch_array($ql);
 ?>

      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-calendar"></i> Tambah Jadwal Ujian</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=jadwal" class="bread-current">Jadwal Ujian</a>
          <span class="divider">/</span> 
          <a href="media.php?module=jadwal&act=add" class="bread-current">Tambah Jadwal Ujian</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">

          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left"><i class="fa fa-plus"></i> Tambah Jadwal Ujian</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                    
       

       <div class="row">
         
        <div class="col-md-12">
          <form class="form-horizontal" role="form" method="POST" action="<?php echo $module; ?>&act=insert" enctype="multipart/form-data">

                    <input type="hidden" name="id_dpl" value="<?php echo $id; ?>">

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Nama Jadwal Ujian </label>
                        <div class="col-lg-8">
                        <input type="text" class="form-control" name="nama" required>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Mata Pelajaran </label>
                        <div class="col-lg-4">
                        <?php 
                        $sql = mysql_query("SELECT * FROM lesson WHERE lesson_id ='$r[lesson_id]' ");
                        $mapel = mysql_fetch_array($sql);
                        ?>
                           <input type="text" class="form-control" readonly value="<?php echo $mapel[lesson_name]; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Pengajar </label>
                        <div class="col-lg-6">
                     <?php 
                              $sql = mysql_query("SELECT * FROM teacher WHERE teacher_id ='$r[teacher_id]'");
                              $tch = mysql_fetch_array($sql);
                              ?>
                            
                            <input type="text" class="form-control" readonly value="<?php echo $tch[name]; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Kelas </label>
                        <div class="col-lg-4">
                              <?php 
                              $sql = mysql_query("SELECT * FROM class WHERE class_id ='$r[class_id]' ");
                              $kls = mysql_fetch_array($sql);
                              ?>
                           <input type="text" class="form-control" readonly value="<?php echo $kls[class_name]; ?>">
                        </div>
                    </div>                    

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Tahun Ajaran </label>
                        <div class="col-lg-3">
                        <select name="ta" class="form-control selectlive" required>
                              <option value=""> -Pilih- </option>
                              <?php 
                               $sql = mysql_query("SELECT * FROM sch_year ORDER BY sch_year DESC");
                               while ($ta = mysql_fetch_array($sql)) { ?>
                              <option value="<?php echo $ta[sch_year_id]; ?>"><?php echo $ta[sch_year]; ?></option>
                             <?php } ?>                            
                         
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Semester </label>
                        <div class="col-lg-4">
                        <select name="semester" class="form-control selectlive" required>
                              <option value=""> -Pilih- </option>
                              <option value="Semester Ganjil"> Semester Ganjil</option>
                              <option value="Semester Genap"> Semester Genap</option>  
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Formula LCG </label>
                        <div class="col-lg-3">
                        <select name="formula" class="form-control selectlive" required>
                              <option value=""> -Pilih- </option>
                              <?php 
                               $sql = mysql_query("SELECT * FROM formula_lcg ORDER BY formula_lcg_id DESC");
                               while ($lcg = mysql_fetch_array($sql)) { ?>
                              <option value="<?php echo $lcg[formula_lcg_id]; ?>"><?php echo $lcg[formula_name]; ?></option>
                             <?php } ?>                          
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Tanggal </label>
                        <div class="col-lg-4">
                        <div id="6" class="input-append input-group dtpicker">
                            <input required data-format="yyyy-MM-dd" readonly type="text" name="tgl" class="form-control" >
                            <span class="input-group-addon add-on">
                            <i data-time-icon="fa fa-times" data-date-icon="fa fa-calendar"></i>
                            </span>
                          </div>
                        </div>
                    </div>  

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Waktu Pelaksanaan</label>
                        <div class="col-lg-3">
                        <select name="jam" class="form-control selectlive" required>
                              <option value=""> -Pilih- </option>
                              <option value="07:00:00"> 07:00:00 </option>
                              <option value="10:00:00"> 10:00:00 </option>  
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Waktu Pengerjaan</label>
                        <div class="col-lg-3">
                        <select name="waktu" class="form-control selectlive" required>
                              <option value=""> -Pilih- </option>
                              <option value="60">  60 Menit</option>
                              <option value="90">  90 Menit</option>
                              <option value="120"> 120 Menit</option>  
                            </select>
                        </div>
                    </div>   
                        
                     

                                <div class="form-group">
                                  <label class="col-lg-3 control-label"></label>
                                  <div class="col-lg-8">
                                    <a href="media.php?module=jadwal&act=add" class="btn btn-default">
                                    <i class="fa fa-arrow-left"></i> Batal
                                    </a>
                                    <input style="float: right;" class="btn btn-primary" type="submit" value="Simpan">
                                  </div>
                                </div>                                

                              </form>
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


<?php 
break;
case 'edit';
$id = $_GET[id];
$ql = mysql_query("SELECT * FROM exm_schedule WHERE exm_schedule_id = '$id' ");
$r = mysql_fetch_array($ql);
 ?>
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-pencil"></i> Edit Jadwal Ujian</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=jadwal" class="bread-current">Jadwal Ujian</a>
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Edit Jadwal Ujian</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">

          <div class="row">
            <div class="col-md-3"></div>
                      <div class="col-md-6">
                        <div class="widget">

                <div class="widget-head">
                  <div class="pull-left"> <i class="fa fa-pencil"></i> Jadwal Ujian Yang Akan Diedit</div>
                  <div class="widget-icons pull-right">
                  </div>  
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">

                    <?php 
                    $id = $_GET[id];
                    $data = mysql_query("SELECT * FROM exm_schedule WHERE exm_schedule_id = '$id' ");
                    $row = mysql_fetch_array($data);

                     ?>
          
          <div class="row">
                        <div class="col-md-12">
                          <div class="well" style="padding: 10px 20px; margin-bottom: 0px;">
                          <table>
                            
                            <tr>
                              <td width="150px"><b>Nama Ujian</b> </td>
                              <td><b> : <?php echo $row[exm_schedule_name]; ?></b></td>
                            </tr>
                            
                            <?php 
                            $qk = mysql_query("SELECT * FROM class, detail_lesson WHERE class.class_id = detail_lesson.class_id AND detail_lesson.detail_lesson_id = '$row[detail_lesson_id]' ");
                            $kr = mysql_fetch_array($qk);
                             ?>

                            <tr>
                              <td><b>Kelas </b> </td>
                              <td><b> : <?php echo $kr[class_name]; ?></b></td>
                            </tr>
                            
                            <?php 
                            $qp = mysql_query("SELECT * FROM lesson, detail_lesson WHERE lesson.lesson_id = detail_lesson.lesson_id AND detail_lesson.detail_lesson_id = '$row[detail_lesson_id]' ");
                            $pr = mysql_fetch_array($qp);
                             ?>

                            <tr>
                              <td><b>Mata Pelajaran</b></td>
                              <td><b> : <?php echo $pr[lesson_name]; ?></b></td>
                            </tr>

                             <?php 
                            $qg = mysql_query("SELECT * FROM teacher, detail_lesson WHERE teacher.teacher_id = detail_lesson.teacher_id AND detail_lesson.detail_lesson_id = '$row[detail_lesson_id]' ");
                            $gr = mysql_fetch_array($qg);
                             ?>


                            <tr>
                              <td><b>Pengajar</b></td>
                              <td><b> : <?php echo $gr[name]; ?></b></td>
                            </tr>

                            <?php 
                            $qta = mysql_query("SELECT * FROM  sch_year WHERE sch_year_id = '$row[sch_year_id]' ");
                            $tar = mysql_fetch_array($qta);
                             ?>



                            <tr>
                              <td><b>Tahun Ajaran</b></td>
                              <td><b> : <?php echo $tar[sch_year]; ?></b></td>
                            </tr>




                            <tr>
                              <td><b>Semester</b></td>
                              <td><b> : <?php echo $row[semester]; ?></b></td>
                            </tr>

                            <tr>
                              <td><b>Tanggal Ujian</b></td>
                              <td><b> : <?php echo TanggalIndo($row[exm_date]); ?></b></td>
                            </tr>

                            <tr>
                              <td><b>Waktu Pelaksanaan</b></td>
                              <td><b> : <?php echo $row[exm_hour]; ?></b></td>
                            </tr>

                            <tr>
                              <td><b>Waktu Pengerjaan</b></td>
                              <td><b> : <?php echo $row[exm_time]; ?> Menit</b></td>
                            </tr>






                          </table>
                          
                          
                        </div>
                        </div>
                      </div>
          
                    <div class="widget-foot">
                    <div class="clearfix"></div> 
                    </div>

                  </div>
                </div>
                      </div>

                    </div>


          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left"> 
                    Pilih Jadwal Ujian Yang Akan Digantikan
                  </div>
                  <div class="widget-icons pull-right">
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Mata Pelajaran</b></th>
                        <th><b>Pengajar</b></th>
                        <th><b>Kelas</b></th>
                        <th width="100px"><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysql_query("SELECT * FROM detail_lesson WHERE block = 'N' ORDER BY class_id ASC");
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
                        <td width="120px">
                          <div class="btn-group1">
                        <a href="media.php?module=jadwal&act=editjadwal&id=<?php echo $_GET[id]; ?>&dp_id=<?php echo $row[detail_lesson_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Pilih</button></a>
                        
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

<?php 
break;
case 'editjadwal';
$id = $_GET[id];
$dp_id = $_GET[dp_id];
$ql = mysql_query("SELECT * FROM exm_schedule WHERE exm_schedule_id = '$id' ");
$r = mysql_fetch_array($ql);

$ql =  mysql_query("SELECT * FROM detail_lesson WHERE detail_lesson_id = '$dp_id' ");
$pljr = mysql_fetch_array($ql);
 ?>
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-pencil"></i> Edit Jadwal Ujian</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=jadwal" class="bread-current">Jadwal Ujian</a>
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Edit Jadwal Ujian</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">

          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left"><i class="fa fa-pencil"></i> Edit Jadwal Ujian</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                    
       

       <div class="row">
         
        <div class="col-md-12">
          <form class="form-horizontal" role="form" method="POST" action="<?php echo $module; ?>&act=update" enctype="multipart/form-data">

                    <input type="hidden" name="dp_id" value="<?php echo $dp_id; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Nama Jadwal Ujian </label>
                        <div class="col-lg-8">
                        <input type="text" class="form-control" name="nama" value="<?php echo  $r[exm_schedule_name]; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Mata Pelajaran </label>
                        <div class="col-lg-4">
                        <?php 
                        $sql = mysql_query("SELECT * FROM lesson WHERE lesson_id ='$pljr[lesson_id]' ");
                        $mapel = mysql_fetch_array($sql);
                        ?>
                           <input type="text" class="form-control" readonly value="<?php echo $mapel[lesson_name]; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Pengajar </label>
                        <div class="col-lg-6">
                     <?php 
                              $sql = mysql_query("SELECT * FROM teacher WHERE teacher_id ='$pljr[teacher_id]'");
                              $tch = mysql_fetch_array($sql);
                              ?>
                            
                            <input type="text" class="form-control" readonly value="<?php echo $tch[name]; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Kelas </label>
                        <div class="col-lg-4">
                              <?php 
                              $sql = mysql_query("SELECT * FROM class WHERE class_id ='$pljr[class_id]' ");
                              $kls = mysql_fetch_array($sql);
                              ?>
                           <input type="text" class="form-control" readonly value="<?php echo $kls[class_name]; ?>">
                        </div>
                    </div>                    

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Tahun Ajaran </label>
                        <div class="col-lg-3">
                        <select name="ta" class="form-control selectlive" >
                              <?php 
                               $sql = mysql_query("SELECT * FROM sch_year WHERE sch_year_id = '$r[sch_year_id]' ");
                               while ($ta = mysql_fetch_array($sql)) { ?>
                              <option value="<?php echo $ta[sch_year_id]; ?>"><?php echo $ta[sch_year]; ?></option>
                             <?php } ?>    

                              <?php 
                               $sql1 = mysql_query("SELECT * FROM sch_year WHERE NOT sch_year_id = '$r[sch_year_id]' ");
                               while ($ta1 = mysql_fetch_array($sql1)) { ?>
                              <option value="<?php echo $ta1[sch_year_id]; ?>"><?php echo $ta1[sch_year]; ?></option>
                             <?php } ?>                        
                         
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Semester </label>
                        <div class="col-lg-4">
                        <select name="semester" class="form-control selectlive" >
                              <?php 
                              if ($r[semester] == 'Semester Ganjil') { ?>
                              <option value="Semester Ganjil"> Semester Ganjil</option>
                              <option value="Semester Genap"> Semester Genap</option>
                              <?php }else{?>
                              <option value="Semester Genap"> Semester Genap</option>
                              <option value="Semester Ganjil"> Semester Ganjil</option>
                              <?php } ?>  
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Formula LCG </label>
                        <div class="col-lg-3">
                        <select name="formula" class="form-control selectlive" >
                              <?php 
                               $sql = mysql_query("SELECT * FROM formula_lcg WHERE formula_lcg_id = '$r[formula_lcg_id]' ");
                               while ($lcg = mysql_fetch_array($sql)) { ?>
                              <option value="<?php echo $lcg[formula_lcg_id]; ?>"><?php echo $lcg[formula_name]; ?></option>
                             <?php } ?>  

                             <?php 
                               $sql1 = mysql_query("SELECT * FROM formula_lcg WHERE NOT formula_lcg_id = '$r[formula_lcg_id]' ");
                               while ($lcg1 = mysql_fetch_array($sql1)) { ?>
                              <option value="<?php echo $lcg1[formula_lcg_id]; ?>"><?php echo $lcg1[formula_name]; ?></option>
                             <?php } ?> 

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Tanggal </label>
                        <div class="col-lg-4">
                        <div id="6" class="input-append input-group dtpicker">
                            <input  data-format="yyyy-MM-dd" readonly type="text" name="tgl" class="form-control" value="<?php echo $r[exm_date]; ?>">
                            <span class="input-group-addon add-on">
                            <i data-time-icon="fa fa-times" data-date-icon="fa fa-calendar"></i>
                            </span>
                          </div>
                        </div>
                    </div>  

                     <div class="form-group">
                      <label class="col-lg-3 control-label">Waktu Pelaksanaan</label>
                        <div class="col-lg-3">
                        <select name="jam" class="form-control selectlive" required>
                              
                              <?php 
                              if ($r[exm_hour] == '07:00:00') { ?>                               
                              <option value="07:00:00"> 07:00:00 </option>
                              <option value="10:00:00"> 10:00:00 </option>
                              <?php }elseif ($r[exm_hour] == '10:00:00') { ?>
                              <option value="10:00:00"> 10:00:00 </option>
                              <option value="07:00:00"> 07:00:00 </option>
                              <?php } ?>  

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                      <label class="col-lg-3 control-label">Waktu Pengerjaan</label>
                        <div class="col-lg-3">
                        <select name="waktu" class="form-control selectlive" >
                              
                              <?php if ($r[exm_time] == 60 ) { ?>
                              <option value="60">  60 Menit</option>
                              <option value="90">  90 Menit</option>
                              <option value="120"> 120 Menit</option> 
                              <?php } elseif ($r[exm_time] == 90 ) { ?>
                              <option value="90">  90 Menit</option>
                              <option value="60">  60 Menit</option>
                              <option value="120"> 120 Menit</option>
                              <?php }elseif ($r[exm_time] == 120) { ?>
                              <option value="120"> 120 Menit</option>
                              <option value="60">  60 Menit</option>
                              <option value="90">  90 Menit</option>
                              <?php } ?>  
                            </select>
                        </div>
                    </div>

                   

                                <div class="form-group">
                                  <label class="col-lg-3 control-label"></label>
                                  <div class="col-lg-8">
                                    <a href="media.php?module=jadwal&act=edit&id=<?php echo $_GET[id]; ?>" class="btn btn-default">
                                    <i class="fa fa-arrow-left"></i> Batal
                                    </a>
                                    <input style="float: right;" class="btn btn-warning" type="submit" value="Update">
                                  </div>
                                </div>                                

                              </form>
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


<?php
break;
 }?>




        <?php } ?>  
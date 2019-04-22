<?php
session_start();

if (empty($_SESSION['nip']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
$module="modul/mod_jadwalujian/jadwalujian_c.php?module=jadwalujian";


?>





<?php 
switch ($_GET['act']) {
default:
?>

      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-text"></i> Data Siswa Belum Mengikuti Ujian</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=belum" class="bread-current">Data Siswa belum Ujian</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Ujian</div>
                  <div class="widget-icons pull-right">
                    <a href="dynamic-tables.html#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="dynamic-tables.html#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                  <div style="padding-bottom: 10px;" align="right"></div>    
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
                        <th><b>Semester</b></th>
                        <th><b>Tahun Ajaran</b></th>
                        <th><b>Tanggal Ujian</b></th>
                        <th><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $idgr = $_SESSION[id_guru];
                      $data = mysql_query("SELECT * FROM exm_schedule, detail_lesson WHERE detail_lesson.detail_lesson_id = exm_schedule.detail_lesson_id AND detail_lesson.teacher_id = '$idgr' ORDER BY exm_schedule_id DESC");
                      while ($row = mysql_fetch_array($data)) {
                        $qk = mysql_query("SELECT * FROM detail_lesson, class WHERE class.class_id = detail_lesson.class_id AND detail_lesson.detail_lesson_id ='$row[detail_lesson_id]'  ");
                       $rk = mysql_fetch_array($qk);
                       $qp = mysql_query("SELECT * FROM detail_lesson, lesson WHERE lesson.lesson_id = detail_lesson.lesson_id AND detail_lesson.detail_lesson_id ='$row[detail_lesson_id]'  ");
                       $rp = mysql_fetch_array($qp);
                       $qg = mysql_query("SELECT * FROM detail_lesson, teacher WHERE teacher.teacher_id = detail_lesson.teacher_id AND detail_lesson.detail_lesson_id = '$row[detail_lesson_id]' ");
                       $rg = mysql_fetch_array($qg);
                       $sta = mysql_query("SELECT * FROM sch_year WHERE sch_year_id = '$row[sch_year_id]'");
                       $thn = mysql_fetch_array($sta);
                        
                       ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row[exm_schedule_name]; ?></td>
                        <td><?php echo $rk[class_name]; ?></td>
                        <td><?php echo $rp[lesson_name]; ?></td>
                        <td><?php echo $row[semester]; ?></td>
                        <td><?php echo $thn[sch_year]; ?></td>
                        <td><?php echo TanggalIndo($row[exm_date]); ?></td>
                        <td width="120px">
                          <div class="btn-group1">
                          
                            <a href="media.php?module=belum&act=lihat&id=<?php echo $row[exm_schedule_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-primary" ><i class="fa fa-eye"></i> Lihat Siswa</button></a>

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
case 'lihat';
$id = $_GET[id];
$ql = mysql_query("SELECT * FROM exm_schedule WHERE exm_schedule_id = '$id' ");
$r = mysql_fetch_array($ql);
 ?>
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-text"></i> Data Siswa Belum Mengikuti Ujian</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=belum" class="bread-current">Data Siswa Belum Ujian</a>

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
                  <div class="pull-left"> <i class="fa fa-file-text"></i> Jadwal Ujian</div>
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
                    Data Siswa Yang Belum Mengikuti Ujian
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
                        <th><b>NIS</b></th>
                        <th><b>Nama Siswa</b></th>
                        <th><b>Kelas</b></th>
                        <th width="100px"><b>Status</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysql_query("SELECT * FROM student, class WHERE student.student_id NOT IN(SELECT exm_reg.student_id FROM exm_reg WHERE exm_schedule_id = '$id' ) AND class.class_id = student.class_id AND student.class_id = '$kr[class_id]' ");
                      while ($row = mysql_fetch_array($data)) {
                      
                       ?>
                      <tr>
                        <td width="5%"><?php echo $no; ?></td>
                        <td><?php echo $row[nis]; ?></td>
                        <td><?php echo $row[name]; ?></td>
                        <td><?php echo $row[class_name]; ?></td>
                        <td width="120px">
                        <span class="label label-danger">Belum Mendaftar Ujian</span>
                        
                        </div>
                        </td>
                      </tr>
                      <?php $no++; } ?>


                      <?php 
                      $n = $no ;
                      $data = mysql_query("SELECT * FROM exm_reg, exm_schedule WHERE  exm_reg.exm_reg_id NOT IN (SELECT process_exm.exm_reg_id FROM process_exm) AND exm_reg.exm_schedule_id = exm_schedule.exm_schedule_id AND exm_schedule.exm_schedule_id = '$id' ");
                      while ($row = mysql_fetch_array($data)) {
                      $sqlsiswa = mysql_query("SELECT * FROM student, class WHERE class.class_id = student.class_id AND student.student_id = $row[student_id] ");
                      $rosis = mysql_fetch_array($sqlsiswa);
                       ?>
                      <tr>
                        <td width="5%"><?php echo $n; ?></td>
                        <td><?php echo $rosis[nis]; ?></td>
                        <td><?php echo $rosis[name]; ?></td>
                        <td><?php echo $rosis[class_name]; ?></td>
                        <td width="120px">
                        <span class="label label-warning">Belum Mengerjakan Ujian</span>
                        
                        </div>
                        </td>
                      </tr>
                      <?php $n++; } ?>

                      <?php 
                      $i = $n ;
                      $data = mysql_query("SELECT * FROM exm_reg, exm_schedule WHERE  exm_reg.exm_reg_id IN (SELECT process_exm.exm_reg_id FROM process_exm) AND exm_reg.exm_schedule_id = exm_schedule.exm_schedule_id AND exm_schedule.exm_schedule_id = '$id' ");
                      while ($row = mysql_fetch_array($data)) {
                      $sqlsiswa = mysql_query("SELECT * FROM student, class WHERE class.class_id = student.class_id AND student.student_id = $row[student_id] ");
                      $rosis = mysql_fetch_array($sqlsiswa);
                       ?>
                      <tr>
                        <td width="5%"><?php echo $i; ?></td>
                        <td><?php echo $rosis[nis]; ?></td>
                        <td><?php echo $rosis[name]; ?></td>
                        <td><?php echo $rosis[class_name]; ?></td>
                        <td width="120px">
                        <span class="label label-success">Sudah Mengerjakan Ujian</span>
                        
                        </div>
                        </td>
                      </tr>
                      <?php $i++; } ?>
                      
                    </tbody>
                    
                  </table>
                  <div class="clearfix"></div>
                </div>
                </div>
              </div>

          
                  </div>
                  <div class="widget-foot">

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
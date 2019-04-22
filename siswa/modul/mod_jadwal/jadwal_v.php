<?php
session_start();

if (empty($_SESSION['nis']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
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
                  <div class="pull-left">Jadwal Ujian</div>
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
                        <th><b>Guru</b></th>
                        <th><b>Tanggal</b></th>
                        <th><b>Jam</b></th>
                        <th><b>Waktu Pengerjaan</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysql_query("SELECT * FROM exm_schedule, detail_lesson WHERE exm_schedule.detail_lesson_id = detail_lesson.detail_lesson_id AND detail_lesson.class_id = '$_SESSION[id_kelas]' ORDER BY exm_date DESC ");
                      while ($row = mysql_fetch_array($data)) {
                        $qk = mysql_query("SELECT * FROM detail_lesson, class WHERE class.class_id = detail_lesson.class_id AND detail_lesson.detail_lesson_id ='$row[detail_lesson_id]'  ");
                       $rk = mysql_fetch_array($qk);
                       $qp = mysql_query("SELECT * FROM detail_lesson, lesson WHERE lesson.lesson_id = detail_lesson.lesson_id AND detail_lesson.detail_lesson_id ='$row[detail_lesson_id]'  ");
                       $rp = mysql_fetch_array($qp);
                       $qg = mysql_query("SELECT * FROM detail_lesson, teacher WHERE teacher.teacher_id = detail_lesson.teacher_id AND detail_lesson.detail_lesson_id = '$row[detail_lesson_id]' ");
                       $rg = mysql_fetch_array($qg);
                       ?>

                       <?php 
                       $tgl = date('Y-m-d');
                       if ($row[exm_date]>=$tgl) {?>
                       <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row[exm_schedule_name]; ?></td>
                        <td><?php echo $rk[class_name]; ?></td>
                        <td><?php echo $rp[lesson_name]; ?></td>
                        <td><?php echo $rg[name]; ?></td>
                        <td><?php echo TanggalIndo($row[exm_date]); ?></td>
                        <td><?php echo $row[exm_hour]; ?></td>
                        <td><?php echo $row[exm_time]; ?> Menit</td>
                      </tr>
                       <?php $no++; }}?>
                      
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
 }?>




        <?php } ?>  
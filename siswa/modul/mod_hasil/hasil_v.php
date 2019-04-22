<?php
session_start();

if (empty($_SESSION['nis']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';


?>

<?php 
$id_reg  = $_GET[reg];
$id_ujian  = $_GET[id_ujian];

$qreg = mysql_query("SELECT * FROM exm_reg WHERE exm_reg_id ='$id_reg' ");
$reg  = mysql_fetch_array($qreg);

$qujian = mysql_query("SELECT * FROM process_exm WHERE process_exm_id = '$id_ujian' ");
$uji = mysql_fetch_array($qujian);

$jdwl = mysql_query("SELECT * FROM exm_schedule WHERE exm_schedule_id = '$reg[exm_schedule_id]' ");
$row = mysql_fetch_array($jdwl);
?>


<?php 
switch ($_GET['act']) {
 default: 
 ?>
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-text"></i> Hasil Ujian</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=hasil&act=daftar_nilai" class="bread-current">Hasil Ujian</a>
          
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
                  <div class="pull-left">
                  Hasil Ujian Anda
                  </div>
                  <div class="widget-icons pull-right"> 
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                    <div class="row">
                      <div class="col-md-12">
                        <div style="padding-bottom: 10px;" align="right"></div>   
                      </div>

                    </div>
<div class="row">
  <div class="col-md-12">
            <div class="col-md-12">
                        <table width="100%">
                            <tr align="center">
                              <td><h2><?php echo $row[exm_schedule_name]; ?></h2></td>
                            </tr>
                        </table>
            </div>
            <div class="col-md-5 well">
                  <table>
                            <tr>
                              <td><b>Jumlah Soal </b> </td>
                              <td><b> : <?php echo $uji[total_question]; ?></b></td>
                            </tr>


                            <tr>
                              <td><b>Jawaban Benar </b> </td>
                              <td><b> : <?php echo $uji[correct_answr]; ?></b></td>
                            </tr>
                            


                             <tr>
                              <td><b>Jawaban Salah</b></td>
                              <td><b> : <?php echo $uji[wrong_answr]; ?></b></td>
                            </tr>



                            <tr>
                              <td><b>Tidak Dijawab</b></td>
                              <td><b> : <?php echo $uji[not_answr]; ?></b></td>
                            </tr>



                            
                          </table>

                  
            </div>
<div class="col-md-2"></div>

            <div class="col-md-5 well">
                <?php 
                $qn = mysql_query("SELECT * FROM exm_result WHERE process_exm_id = '$uji[process_exm_id]' ");
                $nilai = mysql_fetch_array($qn);
                 ?>
                 <table width="100%">
                       <tr align="center">
                           <td><h3>Nilai Anda</h3></td>
                       </tr>
                       <tr align="center"><td><h1><?php echo $nilai[grades]; ?> </h1></td></tr>
                   </table>

                  
            </div>

            <div class="row">
                           <div class="col-md-12" style="margin-top: 10px;">
                           
                           
                         
                            <a style="float: right;" href="media.php?module=hasil&act=daftar_nilai" class="btn btn-primary">OK </a>
                          
                                   
                          
                           </div>
                       </div>

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
case 'daftar_nilai':
 ?>


      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-text"></i> Nilai Hasil Ujian</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=hasil&act=daftar_nilai" class="bread-current"> Nilai Hasil Ujian</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Nilai Hasil Ujian</div>
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
                        <th><b>Nama Pelajaran</b></th>
                        <th><b>Kelas</b></th>
                        <th><b>Tahun Ajaran</b></th>
                        <th><b>Semester</b></th>
                        <th><b>Nilai</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                       $qry = mysql_query("SELECT * FROM exm_reg, process_exm, exm_result WHERE exm_reg.exm_reg_id = process_exm.exm_reg_id AND process_exm.process_exm_id = exm_result.process_exm_id AND exm_reg.student_id = '$_SESSION[id_siswa]' ");
                       while ($data = mysql_fetch_array($qry)) {
                        $qj = mysql_query("SELECT * FROM exm_schedule, detail_lesson WHERE detail_lesson.detail_lesson_id = exm_schedule.detail_lesson_id AND exm_schedule_id = '$data[exm_schedule_id]' ");
                        $qjd = mysql_fetch_array($qj);
                        $qpl = mysql_query("SELECT * FROM lesson WHERE lesson_id = '$qjd[lesson_id]' ");
                        $pel = mysql_fetch_array($qpl);
                        $qkl = mysql_query("SELECT * FROM class WHERE class_id ='$qjd[class_id]' ");
                        $kel = mysql_fetch_array($qkl);
                        $qta = mysql_query("SELECT * FROM sch_year WHERE sch_year_id ='$qjd[sch_year_id]' ");
                        $ta = mysql_fetch_array($qta);
                       
                       ?>
                       
                       <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $pel[lesson_name]; ?></td>
                        <td><?php echo $kel[class_name]; ?></td>
                        <td><?php echo $ta[sch_year]; ?></td>
                        <td><?php echo $qjd[semester]; ?></td>
                        <td><?php echo $data[grades]; ?></td>
                        

                      </tr>

                       <?php $no++;}?>
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
}

 ?>



   

 





        <?php } ?>  
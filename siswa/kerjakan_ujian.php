<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../system/koneksi.php';
$jm = date('H:i:s');
$jam = date('H');
$tglskrg = date('Y-m-d');


 $qj = mysql_query("SELECT * FROM exm_schedule WHERE exm_schedule_id = '$_GET[id_jdwl]' ");
 $j = mysql_fetch_array($qj);

$mnt = '02:00:00';
$jamlebih = $j[exm_hour] + $mnt;

if ( $_GET[id_jdwl]=='' AND $_GET[id_reg]=='' AND $_GET[waktu]==''){
  echo "<script>alert('Anda tidak diperbolehkan mengakses halaman ini!'); window.location = 'media.php?module=home';</script>";
}elseif (empty($_SESSION['nis']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Anda tidak diperbolehkan mengakses halaman ini!'); window.location = 'index.php';</script>";

}elseif ($tglskrg != $j[exm_date]) {
echo "<script>alert('Maaf! Pengerjaan ujian tanggal ".$j[exm_date].".'); window.location = 'media.php?module=ujian';</script>";
}elseif ($jm < $j[exm_hour]) {
  echo "<script>alert('Maaf! Pengerjaan ujian Jam ".$j[exm_hour].".'); window.location = 'media.php?module=ujian';</script>";
  }elseif ($jam >= $jamlebih) {
  echo "<script>alert('Waktu ujian sudah berakhir.'); window.location = 'media.php?module=ujian';</script>";
  }

else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
$module="modul/mod_kerjakan/kerjakan_c.php?module=kerjakan";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Ujian Online | SMA PGRI 1 Temanggung</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css"> 
  <link rel="stylesheet" href="../assets/css/font-awesome.css">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/jquery-ui.css">
  <link rel="stylesheet" href="../assets/css/fullcalendar.css">
  <link rel="stylesheet" href="../assets/css/prettyPhoto.css">  
  <link rel="stylesheet" href="../assets/css/rateit.css">
  <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="../assets/css/jquery.cleditor.css"> 
  <link rel="stylesheet" href="../assets/css/jquery.dataTables.css"> 
  <link rel="stylesheet" href="../assets/css/jquery.onoff.css">
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/widgets.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/modif.css">
  <script src="../assets/js/respond.min.js"></script>

<script type="text/javascript">
    var waktunya;
waktunya = <?php echo "$_GET[waktu]"; ?>*60;
var waktu;
var jalan = 0;
var habis = 0;
</script>

  <script src="ujianjs/ujian.js"></script>
  <script src="ujianjs/simpan.js"></script>
  <link rel="shortcut icon" href="../assets/img/favicon/vgri.png">
  <script type="text/javascript">
    window.history.forward();
    function noBack(){ window.history.forward(); }
</script>


</head>

<body onload="init(),noBack();" onpageshow="if (event.persisted) noBack();" onunload="keluar()">

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
      <div class="navbar-header">
          <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
            <span>Menu</span>
          </button>
          <a href="#" class="navbar-brand hidden-lg">Ujian Online</a>
        </div>
      
      

      <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">         

        <ul class="nav navbar-nav pull-right">
          <li class="dropdown pull-right">            
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-user"></i> <?php echo $_SESSION[namalengkap]; ?> <b class="caret"></b>              
            </a>
            <ul class="dropdown-menu">
              <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
              <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
        
      </nav>
    </div>
  </div>



  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="logo">
            <h1><a href="#">Ujian <span class="bold">Online</span></a></h1>
            <p class="meta" style="margin-left: 4%;">SMA PGRI 1 Temanggung</p>
          </div>
        </div>
        <div class="col-md-4">
 

        </div>
        <div class="col-md-4">
          
        </div>

      </div>
    </div>
  </header>


<div class="content">
    <?php 
    $query = mysql_query("SELECT * FROM exm_schedule WHERE exm_schedule_id = '$_GET[id_jdwl]' ");
    $row = mysql_fetch_array($query);
     ?>
<div class="mainbar" style="margin-left:0px; ">
  <div class="matter">
    <div class="container">
      

        <div class="col-md-12" style="margin-top:10px; ">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 well">
                    <div class="col-md-12">
                        <table width="100%">
                            <tr align="center">
                              <td><h2><?php echo $row[exm_schedule_name]; ?></h2></td>
                            </tr>
                        </table>
                    </div>
                <div class="col-md-6">
                    <table>
                            <tr>
                              <td><b>Nama </b> </td>
                              <td><b> : <?php echo $_SESSION[namalengkap]; ?></b></td>
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
                          </table>
                </div>

                <div class="col-md-6">
                    <table>
                         <tr>
                              <td><b>Semester</b></td>
                              <td><b> : <?php echo $row[semester]; ?></b></td>
                            </tr>

                            <tr>
                              <td><b>Tanggal Ujian</b></td>
                              <td><b> : <?php echo TanggalIndo($row[exm_date]); ?></b></td>
                            </tr>

                            <tr>
                              <td><b>Jam</b></td>
                              <td><b> : <?php echo $row[exm_hour]; ?></b></td>
                            </tr>

                            <tr>
                              <td><b>Waktu Pengerjaan</b></td>
                              <td><b> : <?php echo $row[exm_time]; ?> Menit</b></td>
                            </tr>

                    </table>
                </div>
                </div>
                <div class="col-md-2 well" style="margin-left:10px; ">
                   <table width="100%">
                       <tr align="center">
                           <td><h3>Sisa Waktu</h3></td>
                       </tr>
                       <tr align="center"><td><p id="divwaktu"></p></td></tr>
                   </table>
                    
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <form action="nilai.php" method="post" id="formulir">
                <div class="col-md-1"></div>
                <div class="col-md-10">

              <div class="widget wred">
                <div class="widget-head">
                  <div class="pull-left"><i class="fa fa-file-text"></i> SOAL UJIAN</div>
                  <div class="widget-icons pull-right">
                   
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                    <div id="myTabContent" class="tab-content">
                    <?php
                     $sg = mysql_query("SELECT * FROM question_group WHERE question_group_id ='$row[question_group_id]' ");
                     $dgs = mysql_fetch_array($sg);
                     $reg = mysql_query("SELECT * FROM exm_reg WHERE exm_schedule_id = '$row[exm_schedule_id]' AND student_id = '$_SESSION[id_siswa]' ");
                     $dreg = mysql_fetch_array($reg);
                     $for = mysql_query("SELECT * FROM formula_lcg WHERE formula_lcg_id = '$row[formula_lcg_id]' ");
                     $fml = mysql_fetch_array($for);

                     $sql = mysql_query("SELECT * FROM question WHERE question_group_id ='$dgs[question_group_id]' ");
                     while ($key=mysql_fetch_object($sql)) {
                        $sl[]=$key->question;
                        $id[]=$key->question_id;
                        $gbr[]=$key->picture;
                        $pil_a[]=$key->a;
                        $pil_b[]=$key->b;
                        $pil_c[]=$key->c;
                        $pil_d[]=$key->d;
                        $knc[]=$key->answer_key;
                     }
                        $a = $fml[a];
                        $b = $fml[b];
                        $m = $fml[m];
                        $x[0] = $dreg[x0];
                        $jsl = $m;
                        for ($i=1;$i<=$jsl;$i++){
                           $x[$i] = (($a * $x[$i-1]) + $b) % ($m);
                          $ack=$x[$i];
                          $soal=$sl[$ack]; ?>

                      <div class="tab-pane fade in <?php if($i==1){echo"active";} ?>" id="id<?php echo $i; ?>">
                      <div class="row">
                      <div class="col-md-12">
                          <b>NO. <?php echo $i; ?></b><br/>
                          <?php echo $soal; ?> 
                          <?php if ($gbr[$ack] !='') {?>
                            <br>
                              <img style="width: 10%; margin-left: 20px;" src="../image/soal/<?php echo $gbr[$ack]; ?>">
                          <?php } ?>

                      </div>
                      </div>
                      <table class="table">
                          <input type="hidden" name="id<?php echo $i; ?>" value="<?php echo $id[$ack]; ?>">
                          <tr>
                              <th width="50">A <input type="radio" name="jwb<?php echo $i; ?>" value="A"></th>
                              <td> <?php echo $pil_a[$ack]; ?></td>
                          </tr>

                          <tr>
                              <th>B <input type="radio" name="jwb<?php echo $i; ?>" value="B"></th>
                              <td> <?php echo $pil_b[$ack]; ?></td>
                          </tr>

                          <tr>
                              <th>C <input type="radio" name="jwb<?php echo $i; ?>" value="C"></th>
                              <td> <?php echo $pil_c[$ack]; ?></td>
                          </tr>

                          <tr>
                              <th>D <input type="radio" name="jwb<?php echo $i; ?>" value="D"></th>
                              <td> <?php echo $pil_d[$ack]; ?></td>
                          </tr>
                      </table>
                       
                       <div class="row">
                           <div class="col-md-12" style="margin-top: 10px;">
                            <?php 
                            if ($i == $m ) { ?>
                            <input type="hidden" name="reg" value="<?php echo $dreg[exm_reg_id]; ?>">
                            <input type="hidden" name="jmlsoal" value="<?php echo $i; ?>">
                            <button style="float: right;" class="btn btn-primary" onclick="selesai()">Simpan</button>
                            <?php }else{ ?>
                            <a style="float: right;" href="#id<?php echo $i+1; ?>" data-toggle="tab" class="btn btn-primary">NEXT <i class="fa fa-arrow-right"></i></a>
                            <?php } ?>

                                   
                                
                                <?php if ($i!=1 ) { ?>
                                   <a style="float: left;" href="#id<?php echo $i-1; ?>" data-toggle="tab" class="btn btn-danger"><i class="fa fa-arrow-left"></i> BACK </a>
                                <?php } ?>
                           </div>
                       </div>
                     
                       
                        
                      </div>
                     <?php } ?>
                     
                    </div>
                   
                   
                  </div>
                </div>
                  <div class="widget-foot">

                  </div>
              </div>  

            </div>




                </form>  
                
            </div>
        </div>
          </div>
</div>
</div>
</div>
</div>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
            <p class="copy">Copyright &copy; 2017 | <a href="media.php?module=home">SMA PGRI 1 Temanggung</a> | Developer By <a href="https://www.instagram.com/adibsugandi/?hl=id" target="_blank">Adib Sugandi</a></p>
      </div>
    </div>
  </div>
</footer>   

<span class="totop"><a href=""><i class="fa fa-chevron-up"></i></a></span> 

<script src="../assets/js/jquery.js"></script> <!-- jQuery -->
<script src="../assets/js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="../assets/js/jquery-ui.min.js"></script> <!-- jQuery UI -->
<script src="../assets/js/moment.min.js"></script> <!-- Moment js for full calendar -->
<script src="../assets/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="../assets/js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="../assets/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->
<script src="../assets/js/jquery.slimscroll.min.js"></script> <!-- jQuery Slim Scroll -->
<script src="../assets/js/jquery.dataTables.min.js"></script> <!-- Data tables -->

<script src="../assets/js/excanvas.min.js"></script>
<script src="../assets/js/jquery.flot.js"></script>
<script src="../assets/js/jquery.flot.resize.js"></script>
<script src="../assets/js/jquery.flot.pie.js"></script>
<script src="../assets/js/jquery.flot.stack.js"></script>

<script src="../assets/js/jquery.noty.js"></script> <!-- jQuery Notify -->
<script src="../assets/js/themes/default.js"></script> <!-- jQuery Notify -->
<script src="../assets/js/layouts/bottom.js"></script> <!-- jQuery Notify -->
<!-- <script src="../assets/js/layouts/topRight.js"></script>  --><!-- jQuery Notify -->
<script src="../assets/js/layouts/top.js"></script> <!-- jQuery Notify -->

<script src="../assets/js/sparklines.js"></script> <!-- Sparklines -->
<script src="../assets/js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="../assets/js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<script src="../assets/js/jquery.onoff.min.js"></script> <!-- Bootstrap Toggle -->
<script src="../assets/js/filter.js"></script> <!-- Filter for support page -->
<script src="../assets/js/custom.js"></script> <!-- Custom codes -->
<script src="../assets/js/charts.js"></script> <!-- Charts & Graphs -->

</body>
</html>

<?php } ?>
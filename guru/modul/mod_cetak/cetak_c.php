<?php
$nama_dokumen='data_nilai_hasil_ujian';
define('_MPDF_PATH','../../../assets/MPDF57/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8','A4');

ob_start();
?>

<?php
   	include "../../../system/koneksi.php";
?>



<!DOCTYPE html>
<html>
<head>
	<title>Ujian Online | SMA PGRI 1 Temanggung</title>
</head>
<body>

<table id="surat"  width="100%" >
      <tr>
      <td rowspan="2" width="10%" align="center"><img width="110" height="70" src="../../../assets/img/favicon/vgri.png"></td>
      <td align="center"><h1>SMA PGRI 1 TEMANGGUNG</h1></td>
      <tr><td  align="center"><h6>Jln. Kartini no.34 C Temanggung, Jawa Tengah, 65215, ( 0293 ) 491113, smapgri_tmg@yahoo.co.id </h6></td></tr>
      </tr>
</table>
<hr style="height: 3px;">

<table width="70%" align="center" style="margin-top:20px;">
	<tr>
		<td align="center"><h3>Nilai Hasil Ujian </h3></td>
	</tr>
</table>

<table>

<?php 
$qp = mysql_query("SELECT * FROM lesson WHERE lesson_id = '$_GET[pelajaran]' ");
$p = mysql_fetch_array($qp);

$qk = mysql_query("SELECT * FROM class WHERE class_id = '$_GET[kelas]' ");
$k = mysql_fetch_array($qk);

$qt = mysql_query("SELECT * FROM sch_year WHERE sch_year_id = '$_GET[ta]' ");
$t = mysql_fetch_array($qt);

 ?>


<tr><td width="30%">Pelajaran</td><td>:  <?php echo $p[lesson_name]; ?></td></tr>
				<tr><td width="30%">Kelas</td><td>: <?php echo $k[class_name]; ?></td></tr>
				<tr><td width="30%">Semester</td><td>:  <?php echo $_GET[semester]; ?></td></tr>
				<tr><td width="30%">Tahun Ajaran</td><td>: <?php echo $t[sch_year]; ?> </td></tr>			
</table>

<table border="1"  width="100%" style="margin-top: 20px;">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Nilai</th>
	</tr>

	<?php 

$pljr = $_GET[pelajaran];
$kls = $_GET[kelas];
$ta = $_GET[ta];
$smt = $_GET[semester];
$no = 1;
$qry = mysql_query("SELECT * FROM exm_result, process_exm, exm_reg, student, exm_schedule, detail_lesson, lesson WHERE exm_result.process_exm_id = process_exm.process_exm_id AND process_exm.exm_reg_id = exm_reg.exm_reg_id AND exm_reg.exm_schedule_id = exm_schedule.exm_schedule_id AND student.student_id = exm_reg.student_id AND exm_schedule.detail_lesson_id = detail_lesson.detail_lesson_id AND detail_lesson.lesson_id = lesson.lesson_id AND lesson.lesson_id = '$pljr' AND detail_lesson.class_id = '$kls' AND exm_schedule.sch_year_id = '$ta' AND exm_schedule.semester = '$smt' ORDER BY student.name ASC ");
while ($data = mysql_fetch_array($qry)) {
	?>
	
	<tr>
		<td align="center"><?php echo $no; ?></td>
		<td style="padding-left: 10px;"><?php echo $data[name]; ?></td>
		<td align="center"><?php echo $data[grades]; ?></td>
	</tr>

<?php $no++;} ?>

</table>


<table width="100%">
<tr><td width="25%">&nbsp;</td><td width="25%"><p>&nbsp;</p></td><td width="20%">&nbsp;</td><td><p>&nbsp;</p></td></tr>
 <?php

$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Okotober","November","Desember");

$month = intval(date('m')) - 1;

$days  = date('w');

$tg_angka = date('d');

$year  = date('Y');

?>
  <tr><td width="25%">&nbsp;</td><td width="40%"><p>&nbsp;</p></td><td width="35%" align="center"><p><?php echo 'Tanggal Cetak : '.$tg_angka.' '.$bulan[$month].' '.$year;?></p></td></tr>
</table>



</body>
</html>

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exite;
?>


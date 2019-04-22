    <?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
else{
include "../system/koneksi.php";

$no = 1;
$benar = 0;
$salah = 0;
$kosong = 0;
$jmlsoal = $_POST[jmlsoal];

while ($no <= $jmlsoal) {
  $jwb = $_POST[jwb.$no];
  $id  = $_POST[id.$no];

  $cek = mysql_query("SELECT * FROM question WHERE question_id = '$id'");
  $soal = mysql_fetch_array($cek);
  if (empty($jwb)) {
    $kosong++;
  }elseif ($soal[answer_key] == $jwb ) {
    $benar++;
  }elseif (($soal[answer_key] != $jwb )){
    $salah++;
  }
$no++;}

$persen = $benar / $jmlsoal;
$hasil = $persen * 100;


mysql_query("INSERT INTO `process_exm`( 
                                              `exm_reg_id`, 
                                              `wrong_answr`,
                                              `correct_answr`,
                                              `not_answr`,
                                              `total_question`) 
                                      VALUES ( 
                                              '$_POST[reg]', 
                                              '$salah',
                                              '$benar',
                                              '$kosong', 
                                              '$jmlsoal')");


$dt = mysql_query("SELECT * FROM process_exm WHERE exm_reg_id = '$_POST[reg]' ");
$data = mysql_fetch_array($dt);

mysql_query("INSERT INTO `exm_result`( 
                                              `process_exm_id`,
                                              `grades`) 
                                      VALUES ( 
                                              '$data[process_exm_id]', 
                                              '$hasil')");


                echo "<script>alert('Sukses! Anda telah selesai mengerjakan ujian'); window.location = 'media.php?module=hasil&reg=".$_POST[reg]."&id_ujian=".$data[process_exm_id]."';</script>";



}
?>

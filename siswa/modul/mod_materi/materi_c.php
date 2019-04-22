    <?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
else{
include "../../../system/koneksi.php";

$module	= $_GET['module'];
$act	= $_GET['act'];


if($act=='insert')
{
	// Insert
	if ($module=='daftar' AND $act=='insert')
	{

    $cekquery = mysql_query("SELECT * FROM exm_schedule WHERE exm_schedule_id = '$_POST[id]' ");
    $cek = mysql_fetch_array($cekquery);

    if ($cek[enrol_key] == $_POST[enrol]) {
      $cekdaftar = mysql_query("SELECT count(exm_schedule_id) FROM exm_reg WHERE exm_schedule_id = '$_POST[id]' ");
      $cd = mysql_fetch_array($cekdaftar);
      $x0 = $cd[0] + 1 ;

        if ($cd[0] >= 30) {
        echo "<script>alert('Maaf! Jumlah Pendaftar Sudah Penuh'); window.location = '../../media.php?module=$module';</script>";  
        }else{
                    mysql_query("INSERT INTO `exm_reg`( 
                                              `exm_schedule_id`, 
                                              `student_id`, 
                                              `x0`) 
                                      VALUES ( 
                                              '$_POST[id]', 
                                              '$_SESSION[id_siswa]', 
                                              '$x0')");

                echo "<script>alert('Sukses! Anda Sudah Terdaftar'); window.location = '../../media.php?module=$module';</script>";


        }



    }else{
    echo "<script>alert('Maaf! Enrol Key Salah, Silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";   
    }



}
else{
	echo "<script>alert('Maaf! Data Gagal Disimpan, Silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}


}
?>

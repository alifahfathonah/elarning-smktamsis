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
	if ($module=='formula' AND $act=='insert')
	{

        mysql_query("INSERT INTO formula_lcg(
                                 formula_name,
                                 a,
                                 b,
                                 m) 
	                       VALUES('$_POST[nama]',
                                '$_POST[a]',
                                '$_POST[b]',
                                '$_POST[m]'
                                )");
        	echo "<script>alert('Sukses! Data berhasil di simpan'); window.location = '../../media.php?module=$module';</script>";

}
else{
	echo "<script>alert('Maaf! Data Gagal Disimpan, Silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}


elseif ($act == 'delete') {
  if ($module=='formula' AND $act='delete') {
    
    mysql_query("DELETE FROM formula_lcg WHERE formula_lcg_id = '$_POST[id]' ");

    echo "<script>alert('Sukses! Data berhasil di Hapus'); window.location = '../../media.php?module=$module';</script>";


  }else{
    echo "<script>alert('Data Gagal Dihapus, Silahkan Coba Lagi !'); window.location = '../../media.php?module=$module';</script>";
  }
}



}
?>

    <?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
else{
include "../../../system/koneksi.php";

$module = $_GET['module'];
$act  = $_GET['act'];


if($act=='insert')
{
  // Insert
  if ($module=='ta' AND $act=='insert')
  {

    $sql = mysql_query("SELECT * FROM sch_year WHERE sch_year ='$_POST[tahun_ajaran]' ");
    $cek = mysql_fetch_array($sql);

    if ($cek == 0) {
        mysql_query("INSERT INTO sch_year(
                                 sch_year) 
                         VALUES('$_POST[tahun_ajaran]'
                                )");
          echo "<script>alert('Sukses! Data berhasil di simpan'); window.location = '../../media.php?module=$module';</script>";
    }else{
          echo "<script>alert('Maaf! Tahun Ajaran Sudah Ada Mohon Menginputkan Dengan Tahun Ajaran Yang Berbeda.'); window.location = '../../media.php?module=$module';</script>";
    }
}
else{
  echo "<script>alert('Maaf! Data Gagal Disimpan, Silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}elseif($act=='update'){
    
    if ($module=='ta' AND $act=='update')
    {
            mysql_query("UPDATE sch_year SET 
                                  sch_year   = '$_POST[tahun_ajaran]'
                                  WHERE sch_year_id = '$_POST[id]'");
        
    echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module';</script>";
}else{
    echo "<script>alert('Maaf! Data Gagal di Update, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}





}


}
?>

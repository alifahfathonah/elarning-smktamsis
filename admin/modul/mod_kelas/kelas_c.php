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
  if ($module=='kelas' AND $act=='insert')
  {
      $sql = mysql_query("SELECT * FROM kelas WHERE kelas_nama = '$_POST[kelas_nama]'");
      $cek = mysql_fetch_array($sql);
      $sql = mysql_query("SELECT * FROM guru WHERE guru_id='$row[guru_id]' ");
      $guru = mysql_fetch_array($sql);
      if ($cek == 0) {
      mysql_query("INSERT INTO kelas(kelas_nama,
                                     guru_id) 
                         VALUES('$_POST[nama_kelas]',
                                '$_POST[guru]'
                                )");
          echo "<script>alert('Sukses! Data berhasil di simpan'); window.location = '../../media.php?module=$module';</script>";
      }else{
        echo "<script>alert('Maaf! Nama Kelas Sudah Ada Mohon Menginputkan Dengan Nama yang Berbeda.'); window.location = '../../media.php?module=$module';</script>";
      }

}
else{
  echo "<script>alert('Maaf! Data Gagal Disimpan, Silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}elseif($act=='update'){
    
    if ($module=='kelas' AND $act=='update')
    {
            mysql_query("UPDATE kelas SET 
                                  kelas_nama     = '$_POST[nama_kelas]',
                                  guru_id        = '$_POST[guru]'
                                  WHERE kelas_id = '$_POST[id]'");
        
    echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module';</script>";
}else{
    echo "<script>alert('Maaf! Data Gagal di Update, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}
elseif($act=='delete')
{
    // Insert
    if ($module=='kelas' AND $act=='delete')
    {
        
            mysql_query("DELETE FROM kelas WHERE kelas_id = '$_POST[id]' ");
            
    echo "<script>alert('Sukses! Data Kelas berhasil di hapus.'); window.location = '../../media.php?module=$module';</script>";
}
else{
    echo "<script>alert('Maaf! Data  Kelas Gagal di hapus, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}


elseif($act=='aktif')
{
    // Insert
    if ($module=='kelas' AND $act=='aktif')
    {
        
            mysql_query("UPDATE kelas SET block = 'N'
                           WHERE kelas_id      = '$_GET[id]'");

    $sql = mysql_query("SELECT * FROM kelas WHERE kelas_id = '$_GET[id]' ");
    $cek = mysql_fetch_array($sql);

    echo "<script>alert('Sukses! Data Kelas ".$cek[kelas_nama]." telah Aktif kembali.'); window.location = '../../media.php?module=$module';</script>";
}
else{
    echo "<script>alert('Maaf! Data Gagal di Aktifkan, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}



}
?>

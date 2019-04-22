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
  if ($module=='mapel' AND $act=='insert')
  {

    $data = mysql_query("SELECT * FROM pelajaran WHERE pelajaran_nama ='$_POST[nama_pelajaran]'  ");
    $cek  = mysql_fetch_array($data);

    if ($cek==0) {
        mysql_query("INSERT INTO pelajaran(pelajaran_nama,
                                           pelajaran_id) 
                          VALUES('$_POST[nama_pelajaran]',
                                 '$_POST[id]')");
          echo "<script>alert('Sukses! Data berhasil di simpan'); window.location = '../../media.php?module=$module';</script>";
    }else{
          echo "<script>alert('Maaf! Nama Pelajaran Sudah Ada !'); window.location = '../../media.php?module=$module';</script>";
    }

}
else{
  echo "<script>alert('Maaf! Data Gagal Disimpan, Silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}elseif($act=='update'){
    
    if ($module=='mapel' AND $act=='update')
    {
            mysql_query("UPDATE pelajaran SET 
                                  pelajaran_nama     = '$_POST[nama_pelajaran]'
                                  WHERE pelajaran_id = '$_POST[id]'");
        
    echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module';</script>";
}else{
    echo "<script>alert('Maaf! Data Gagal di Update, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}elseif($act=='delete'){
    // Insert
    if ($module=='mapel' AND $act=='delete')
    {
                          
  $sql = mysql_query("DELETE FROM pelajaran WHERE pelajaran_id = '$_POST[id]' ");
            

    echo "<script>alert('Sukses! Data Mata Pelajaran Telah di Hapus.'); window.location = '../../media.php?module=$module';</script>";

}
else{
    echo "<script>alert('Maaf! Data Gagal di Hapus, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}


// elseif($act=='aktif')
// {
//     // Insert
//     if ($module=='mapel' AND $act=='aktif')
//     {
        
//             mysql_query("UPDATE lesson SET block = 'N'
//                            WHERE lesson_id      = '$_GET[id]'");

//     $sql = mysql_query("SELECT * FROM lesson WHERE lesson_id = '$_GET[id]' ");
//     $cek = mysql_fetch_array($sql);

//     echo "<script>alert('Sukses! Data Mata Pelajaran ".$cek[lesson_name]." telah Aktif kembali.'); window.location = '../../media.php?module=$module';</script>";
// }
// else{
//     echo "<script>alert('Maaf! Data Gagal di Aktifkan, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
// }

// }



}
?>

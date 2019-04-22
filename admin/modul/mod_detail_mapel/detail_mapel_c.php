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
  if ($module=='detail_mapel' AND $act=='insert')
  {

    $data = mysql_query("SELECT * FROM detail_lesson WHERE lesson_id ='$_POST[mapel]' AND class_id ='$_POST[kelas]' ");
    $cek  = mysql_fetch_array($data);

    if ($cek==0) {
        mysql_query("INSERT INTO detail_lesson(lesson_id,
                                        class_id,
                                        teacher_id,
                                        block) 
                          VALUES('$_POST[mapel]',
                                 '$_POST[kelas]',
                                 '$_POST[guru]',
                                 'N'
                                )");
          echo "<script>alert('Sukses! Data berhasil di simpan'); window.location = '../../media.php?module=$module';</script>";
    }else{
          $pel = mysql_query("SELECT * FROM lesson WHERE lesson_id = '$_POST[mapel]' ");
          $mapel = mysql_fetch_array($pel);
          $kel = mysql_query("SELECT * FROM class WHERE class_id = '$_POST[kelas]' ");
          $kelas = mysql_fetch_array($kel);

          echo "<script>alert('Maaf! Mata Pelajaran ".$mapel[lesson_name]." Sudah Ada Di Kelas ".$kelas[class_name]." !'); window.location = '../../media.php?module=$module';</script>";
    }

}
else{
  echo "<script>alert('Maaf! Data Gagal Disimpan, Silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}elseif($act=='update'){
    
    if ($module=='detail_mapel' AND $act=='update')
    {
     mysql_query("UPDATE detail_lesson SET 
                                  lesson_id     = '$_POST[mapel]',
                                  teacher_id    = '$_POST[guru]',
                                  class_id      = '$_POST[kelas]'
                                  WHERE detail_lesson_id = '$_POST[id]'");
        
    echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module';</script>";
}else{
    echo "<script>alert('Maaf! Data Gagal di Update, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}elseif($act=='blokir'){
    // Insert
    if ($module=='detail_mapel' AND $act=='blokir')
    {
        
            mysql_query("UPDATE detail_lesson SET block = 'Y'
                           WHERE detail_lesson_id      = '$_POST[id]'");

    echo "<script>alert('Sukses! Data Telah Dinon Aktifkan.'); window.location = '../../media.php?module=$module';</script>";


}
else{
    echo "<script>alert('Maaf! Data Gagal di Blokir, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}


elseif($act=='aktif')
{
    // Insert
    if ($module=='detail_mapel' AND $act=='aktif')
    {
        
            mysql_query("UPDATE detail_lesson SET block = 'N'
                           WHERE detail_lesson_id      = '$_GET[id]'");


    echo "<script>alert('Sukses! Data telah Aktif kembali.'); window.location = '../../media.php?module=$module';</script>";
}
else{
    echo "<script>alert('Maaf! Data Gagal di Aktifkan, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}



}
?>

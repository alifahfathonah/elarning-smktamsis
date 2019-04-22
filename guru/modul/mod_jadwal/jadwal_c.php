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
	if ($module=='jadwal' AND $act=='insert')
	{
    $q = mysql_query("SELECT * FROM exm_schedule WHERE exm_date = '$_POST[tgl]' AND exm_hour = '$_POST[jam]' ");
    $cek = mysql_num_rows($q);

    $tgl = date('Y-m-d');
    if ($_POST[tgl] <= $tgl) {
    echo "<script>alert('Maaf! Tanggal yang diinputkan tidak boleh sebelum atau sama dengan tanggal sekarang.'); window.location = '../../media.php?module=$module&act=addjadwal&id=".$_POST[id_dpl]."';</script>";
    }elseif ($cek > 0) {
    echo "<script>alert('Maaf! Tanggal dan jam yang diinputkan telah dipakai untuk jadwal ujian. Mohon untuk menginputkan tanggal yang lain.'); window.location = '../../media.php?module=$module&act=addjadwal&id=".$_POST[id_dpl]."';</script>";
    }

    else{
        mysql_query("INSERT INTO exm_schedule(
                                 exm_schedule_name,
                                 detail_lesson_id,
                                 sch_year_id,
                                 semester,
                                 formula_lcg_id,
                                 exm_date,
                                 exm_hour,
                                 exm_time) 
                         VALUES('$_POST[nama]',
                                '$_POST[id_dpl]',
                                '$_POST[ta]',
                                '$_POST[semester]',
                                '$_POST[formula]',
                                '$_POST[tgl]',
                                '$_POST[jam]',
                                '$_POST[waktu]'
                                )");
          echo "<script>alert('Sukses! Data berhasil di simpan'); window.location = '../../media.php?module=$module';</script>";

    }

}
else{
	echo "<script>alert('Maaf! Data Gagal Disimpan, Silahkan coba lagi.'); window.location = '../../media.php?module=$module&act=addjadwal&id=".$_POST[id_dpl]."';</script>";
}

}

elseif($act=='update')
{
    // Insert
    if ($module=='jadwal' AND $act=='update')
    {

            mysql_query("UPDATE exm_schedule SET 
                                  exm_schedule_name    = '$_POST[nama]',
                                  detail_lesson_id     = '$_POST[dp_id]',
                                  sch_year_id          = '$_POST[ta]',
                                  semester             = '$_POST[semester]',
                                  formula_lcg_id       = '$_POST[formula]',
                                  exm_date             = '$_POST[tgl]',
                                  exm_hour             = '$_POST[jam]',
                                  exm_time             = '$_POST[waktu]'                 
                           WHERE  exm_schedule_id      = '$_POST[id]'");

    echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module';</script>";
}
else{
    echo "<script>alert('Maaf! Data Gagal di Update, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}

elseif ($act == 'delete') {
  if ($module=='jadwal' AND $act='delete') {
  
  $sql = mysql_query("SELECT * FROM exm_schedule WHERE exm_schedule_id = '$_POST[id]' ");
  $data = mysql_fetch_array($sql);

  if ($data[question_group_id] == 0 ) {
  
    mysql_query("DELETE FROM exm_schedule WHERE exm_schedule_id = '$_POST[id]' ");
    
    echo "<script>alert('Sukses! Data berhasil di Hapus'); window.location = '../../media.php?module=$module'; </script>";

  }else{
  echo "<script>alert('Data tidak bisa dihapus karena data jadwal ujian telah digunakan untuk ujian'); window.location = '../../media.php?module=$module';</script>";

  }

  }else{
    echo "<script>alert('Data Gagal Dihapus, Silahkan Coba Lagi !'); window.location = '../../media.php?module=$module';</script>";
  }
}



}
?>

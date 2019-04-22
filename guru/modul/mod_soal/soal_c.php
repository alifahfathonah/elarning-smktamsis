    <?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
else{
include "../../../system/koneksi.php";
include "../../../system/fungsi_upload.php";

$module	= $_GET['module'];
$act	= $_GET['act'];


if($act=='insert')
{
	// Insert
	if ($module=='soal' AND $act=='insert')
	{

    
    $lokasi_file  = $_FILES['fupload']['tmp_name'];
    $tipe_file    = $_FILES['fupload']['type'];
    $nama_file    = $_FILES['fupload']['name'];
    $acak           = rand(000,999);
    $nama_gambar = $acak.'-'.$nama_file;
    if(!empty($lokasi_file))
    {
    
      if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/gif" AND $tipe_file != "image/png"){
        echo "<script>alert('Data tidak tersimpan! Upload Gagal, Pastikan File yang di Upload bertipe *.JPG, *.GIF, *.PNG.'); window.location = '../../media.php?module=$module&act=add&id_gs=".$_POST[id_gs]."';</script>";
        die();
      }
      
      ImageUpload($fupload_name=$nama_gambar, $to_dir='../../../image/soal/');
      
        //data yang akan di insert

                        mysql_query("INSERT INTO question(
                                 question_group_id,
                                 question,
                                 picture,
                                 a,
                                 b,
                                 c,
                                 d,
                                 answer_key)
                         VALUES('$_POST[id_gs]',
                                '$_POST[soal]',
                                '$nama_gambar',
                                '$_POST[pil_a]',
                                '$_POST[pil_b]',
                                '$_POST[pil_c]',
                                '$_POST[pil_d]',
                                '$_POST[kunci]')");

    }
    else
    {
                mysql_query("INSERT INTO question(
                                 question_group_id,
                                 question,
                                 a,
                                 b,
                                 c,
                                 d,
                                 answer_key)
                         VALUES('$_POST[id_gs]',
                                '$_POST[soal]',
                                '$_POST[pil_a]',
                                '$_POST[pil_b]',
                                '$_POST[pil_c]',
                                '$_POST[pil_d]',
                                '$_POST[kunci]')");
    }

    echo "<script>alert('Sukses! Data berhasil di Simpan'); window.location = '../../media.php?module=$module&id_gs=".$_POST[id_gs]."';</script>";




}
else{
	echo "<script>alert('Maaf! Data Gagal Disimpan, Silahkan coba lagi.'); window.location = '../../media.php?module=$module&id_gs=".$_POST[id_gs]."';</script>";
}

}

elseif($act=='update')
{
    // Insert
    if ($module=='soal' AND $act=='update')
    {
      $lokasi_file    = $_FILES['fupload']['tmp_name'];
                  $tipe_file      = $_FILES['fupload']['type'];
                  $nama_file      = $_FILES['fupload']['name'];

                  $acak           = rand(000,999);
                  $nama_gambar = $acak.'-'.$nama_file; 

    //jika Foto Dirubah
            if(!empty($lokasi_file))
                {
                
                  if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/gif" AND $tipe_file != "image/png"){
                    echo "<script>alert('Data tidak tersimpan! Upload Gagal, Pastikan File yang di Upload bertipe *.JPG, *.GIF, *.PNG.'); window.location = '../../media.php?module=$module&act=edit&id_gs=".$_POST[id_gs]."&id_sl=".$_POST[id_sl]."';</script>";
                    die();
                  }
                  
                  $show = mysql_query("SELECT * FROM question WHERE question_id='$_POST[id_sl]'");
                  $row  = mysql_fetch_array($show);
                  if($row['picture'] != '')
                  {
                    unlink("../../../image/soal/$row[picture]");
                  }

                  ImageUpload($fupload_name=$nama_gambar, $to_dir='../../../image/soal/');

                 
                  mysql_query("UPDATE question SET
                                        question_group_id  = '$_POST[id_gs]',
                                        question           = '$_POST[soal]',
                                        picture            = '$nama_gambar',
                                        a                  = '$_POST[pil_a]',
                                        b                  = '$_POST[pil_b]',
                                        c                  = '$_POST[pil_c]',
                                        d                  = '$_POST[pil_d]',
                                        answer_key         = '$_POST[kunci]'
                                 WHERE  question_id        = '$_POST[id_sl]'");
                echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module&id_gs=".$_POST[id_gs]."';</script>";
        }
        else{
                mysql_query("UPDATE question SET
                                        question_group_id  = '$_POST[id_gs]',
                                        question           = '$_POST[soal]',
                                        a                  = '$_POST[pil_a]',
                                        b                  = '$_POST[pil_b]',
                                        c                  = '$_POST[pil_c]',
                                        d                  = '$_POST[pil_d]',
                                        answer_key         = '$_POST[kunci]'
                                 WHERE  question_id        = '$_POST[id_sl]'");
                echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module&id_gs=".$_POST[id_gs]."';</script>";

        }
  
}
else{
    echo "<script>alert('Maaf! Data Gagal di Update, silahkan coba lagi.'); window.location = '../../media.php?module=$module&id_gs=".$_POST[id_gs]."';</script>";
}

}

elseif ( $act=='delete') {
  //delete
  if ($module=='soal' AND $act=='delete') {
    $show = mysql_query("SELECT * FROM question WHERE question_id='$_POST[id_sl]'");
                  $row  = mysql_fetch_array($show);
                  if($row['picture'] != '')
                  {
                    unlink("../../../image/soal/$row[picture]");
                    mysql_query("DELETE FROM question WHERE question_id = '$_POST[id_sl]'");
                    echo "<script>alert('Sukses! Data berhasil di Hapus'); window.location = '../../media.php?module=$module&id_gs=".$_POST[id_gs]."';</script>";
                  }else{
                    mysql_query("DELETE FROM question WHERE question_id = '$_POST[id_sl]'");
                    echo "<script>alert('Sukses! Data berhasil di Hapus'); window.location = '../../media.php?module=$module&id_gs=".$_POST[id_gs]."';</script>";
                  }



  }else{
    echo "<script>alert('Maaf! Data Gagal Dihapus, Silahkan coba lagi.'); window.location = '../../media.php?module=$module&id_gs=".$_POST[id_gs]."';</script>";
  }


}
elseif ($act=='import') {

if ($module=='soal' AND $act=='import') {

require "../../../system/excel_reader.php";



    $target = basename($_FILES['fupload']['name']) ;
    move_uploaded_file($_FILES['fupload']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['fupload']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);

    //    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)
      $id_gs           = $_POST[id_gs];
      $soal   = $data->val($i, 1);
      $pil_a  = $data->val($i, 2);
      $pil_b  = $data->val($i, 3);
      $pil_c  = $data->val($i, 4);
      $pil_d  = $data->val($i, 5);
      $kunci  = $data->val($i, 6);

                      mysql_query("INSERT INTO question(
                                 question_group_id,
                                 question,
                                 a,
                                 b,
                                 c,
                                 d,
                                 answer_key)
                         VALUES('$id_gs',
                                '$soal',
                                '$pil_a',
                                '$pil_b',
                                '$pil_c',
                                '$pil_d',
                                '$kunci')");

    }
//    hapus file xls yang udah dibaca
    unlink($_FILES['fupload']['name']);

  echo "<script>alert('Sukses! Data soal berhasil diimport.'); window.location = '../../media.php?module=$module&id_gs=".$_POST[id_gs]."';</script>";


}else{
echo "<script>alert('Maaf! Data soal gagal diimport.'); window.location = '../../media.php?module=$module&id_gs=".$_POST[id_gs]."';</script>";

}


}


}
?>

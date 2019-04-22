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
  if ($module=='tugas' AND $act=='insert')
  {
    // echo "save";die();
      $lokasi_file  = $_FILES['file']['tmp_name'];
      $tipe_file    = $_FILES['file']['type'];
      $nama_file    = $_FILES['file']['name'];
      $fileSize     = $_FILES['file']['size'];
      $get_type     = explode('.', $nama_file);
      $type         = end($get_type);
      // print_r($_FILES['file']);die();
      // echo $tipe_file;
      // die();
        $acak             = rand(000,999);
        $nama_f           = $acak.'-'.$nama_file; 
        $tanggal_sekarang = date('Y-m-d');
        // $format           =pathinfo($name, pathinfo_extension);
      
      if(!empty($lokasi_file))
      {
        if ( $fileSize < 2044070 ) 
        // if ($format === 'doc' || $format ==='docx' || $format === 'pdf')
        {
        

        if ($type != "doc" AND $type != "docx" AND $type != "pdf"  ){
          echo "<script>alert('Data tidak tersimpan! Upload Gagal, Pastikan File yang di Upload bertipe *.DOC, *.DOCX, *.PDF.'); window.location = '../../media.php?module=$module';</script>";
          die();
        }

        $tipe_file2 = substr($tipe_file, 12);
        // move_uploaded_file($fupload_name=$nama_f, $to_dir='../../../image/materi/');
        move_uploaded_file($lokasi_file,'../../../image/tugas/'.$nama_f);
        
          //data yang akan di insert
                          

        $save = "INSERT INTO materi(judul,
                                  pelajaran_id,
                                  kelas_id,
                                  tanggal_tugas,
                                  file)
         VALUES('$_POST[nama]',
                '$_POST[pelajaran]',
                '$_POST[kelas]',
                '$_POST[guru]',
                '$tanggal_sekarang',
                '$nama_f')";
      // print_r($save);die();
      $insert = mysql_query($save);

      // }
      if ($insert) {
        # code...

            echo "<script>alert('Sukses! Data berhasil di simpan'); window.location = '../../media.php?module=$module';</script>";
      }
      else{
       // print_r($to_dir); exit();
        die();
      echo "<script>alert('Gagal'); window.location = '../../media.php?module=$module';</script>";
      }
    } else {
      echo "<script>alert('ukuran file maksimal 2 mb !!!'); window.location = '../../media.php?module=$module';</script>";
    }

  }else{
    echo "<script>alert('Maaf! Data Gagal Disimpan, Silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
  }
}
}





elseif($act=='update')
{
	// Insert
	if ($module=='tugas' AND $act=='update')
	{

    $cekquery = mysql_query("SELECT * FROM soal WHERE soal_id ='$_POST[id]' ");
    $cek = mysql_num_rows($cekquery);

    $qj = mysql_query("SELECT * FROM exm_schedule WHERE exm_schedule_id = '$_POST[id]' ");
    $j = mysql_fetch_array($qj);

    $formula = mysql_query("SELECT * FROM formula_lcg WHERE formula_lcg_id = '$j[formula_lcg_id]' ");
    $df = mysql_fetch_array($formula);

    if ($cek >= $df[m]) {
      
      mysql_query(" UPDATE exm_schedule SET 
                                  question_group_id    = '$_POST[gs]',
                                  enrol_key            = '$_POST[enrol]'                  
                           WHERE  exm_schedule_id      = '$_POST[id]'");

      echo "<script>alert('Sukses! Data berhasil di simpan'); window.location = '../../media.php?module=$module';</script>";

    }else{
      echo "<script>alert('Maaf! Soal Ujian Kurang Dari ".$df[m]." Soal, Harap Soal Dilengkapi.'); window.location = '../../media.php?module=$module';</script>";
    }

}
else{
	echo "<script>alert('Maaf! Data Gagal Disimpan, Silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}


}

elseif($act=='delete')
{
    // Insert
    if ($module=='tugas' AND $act=='delete')
    {

       $show = mysql_query("SELECT * FROM soal WHERE soal_id='$_POST[id]'");
                  
                  while ($row  = mysql_fetch_array($show)) {
                      
                      if($row['file'] != '')
                      {
                      unlink("../../../image/tugas/$row[file]");
                      mysql_query("DELETE FROM soal WHERE soal_id = '$_POST[id]'");
                      }else{
                      mysql_query("DELETE FROM soal WHERE soal_id = '$_POST[id]'");
                      }
                      }

        // mysql_query("DELETE FROM question_group WHERE question_group_id = '$_POST[id]'");
        
        echo "<script>alert('Sukses! Data berhasil di Hapus'); window.location = '../../media.php?module=$module';</script>";
  }else{
      echo "<script>alert('Maaf! Data Gagal di hapus, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
  }

}
}

?>

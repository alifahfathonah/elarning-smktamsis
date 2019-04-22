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
    // echo "<pre>";
    // print_r($_FILES[file]);
    // echo "</pre>";
//    die();
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
        // $acak             = rand(000,999);
        $nama_f           = $nama_file; 
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
                          

        $save = "INSERT INTO soal(judul,
                                  pelajaran_id,
                                  tipe_file,
                                  ukuran_file,
                                  kelas_id,
                                  guru_nama,
                                  tanggal_tugas,
                                  file,
                                  guru_id)
         VALUES('$_POST[nama]',
                '$_POST[pelajaran]',
                '$type',
                '$fileSize',
                '$_POST[kelas]',
                '$_POST[guru]',
                '$tanggal_sekarang',
                '$nama_f',
                '$_SESSION[id_guru]')";
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

    if ( $module=='tugas' AND $act=='update' )
    {
          $lokasi_file  = $_FILES['file']['tmp_name'];
          $tipe_file    = $_FILES['file']['type'];
          $nama_file    = $_FILES['file']['name'];
          $fileSize       = $_FILES['file']['size'];
          $nama_f           = $nama_file; 
          $tanggal_sekarang = date('Y-m-d');
            

      // if(empty($nama_file)) {
      if ( empty($nama_file) ){

       mysql_query ("UPDATE soal SET 
                          judul                 = '$_POST[nama]',
                          pelajaran_id          = '$_POST[pelajaran]',
                          kelas_id              = '$_POST[kelas]',
                          guru_nama             = '$_POST[guru]',
                          tanggal_tugas         = '$tanggal_sekarang',
                          batas_upload          = '$_POST[tanggal]',
                          guru_id               = '$_SESSION[id_guru]'
                   WHERE  soal_id               = '$_POST[id]'");
      }
      else{
        $typef = end(explode('.', $nama_f ) );
        move_uploaded_file($lokasi_file,'../../../image/tugas/'.$nama_f);
        mysql_query ("UPDATE soal SET 
                              judul                 = '$_POST[nama]',
                              pelajaran_id          = '$_POST[pelajaran]',
                              tipe_file             = '$typef',
                              ukuran_file           = '$fileSize',
                              kelas_id              = '$_POST[kelas]',
                              guru_nama             = '$_POST[guru]',
                              file                  = '$nama_f',
                              tanggal_tugas         = '$tanggal_sekarang',
                              batas_upload          = '$_POST[tanggal]',
                              guru_id               = '$_SESSION[id_guru]'
                       WHERE  soal_id               = '$_POST[id]'");
      }
    }
  // die();
        // if($sql) {
            echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module';</script>";
    // }
        // }

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
                  // die();

        // mysql_query("DELETE FROM question_group WHERE question_group_id = '$_POST[id]'");
        
        echo "<script>alert('Sukses! Data berhasil di Hapus'); window.location = '../../media.php?module=$module';</script>";
  }else{
      echo "<script>alert('Maaf! Data Gagal di hapus, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
  }

}
}



?>


<?php
error_reporting(0);
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
  	if ($module=='materi' AND $act=='insert')
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
      // $acak             = rand(000,999);
      $nama_f           = $nama_file; 
      $tanggal_sekarang = date('Y-m-d');
      // $format           =pathinfo($name, pathinfo_extension);
      
      // if ( $fileSize < 2044070 )
      if ( $fileSize > 12044070 ) 
      // if ($format === 'doc' || $format ==='docx' || $format === 'pdf')
      {
        echo "<script>alert('ukuran file maksimal 2 mb !!!'); window.location = '../../media.php?module=$module';</script>";
        die();

      }else{
        $tipe_file2 = substr($tipe_file, 12);
        move_uploaded_file($lokasi_file,'../../../image/materi/'.$nama_f);
        
          //data yang akan di insert
                          

        $save = "INSERT INTO materi(nama_file,
        pelajaran_id,
        tipe_file,
        ukuran_file,
        kelas_id,
        guru_nama,
        tanggal_upload,
        file)
        VALUES('$_POST[nama]',
        '$_POST[pelajaran]',
        '$type',
        '$fileSize',
        '$_POST[kelas]',
        '$_POST[guru]',
        '$tanggal_sekarang',
        '$nama_f')";

        // print_r($save);
        // die();

        if (mysql_query($save))
        {
          echo "<script>alert('Sukses! Data berhasil di simpan'); window.location = '../../media.php?module=$module';</script>";
        }
        else{
          echo "<script>alert('Maaf ! Data Gagal Di Simpan'); window.location = '../../media.php?module=$module';</script>";
        }

      }
      
    }
    else{
        echo "<script>alert('Maaf Modul Salah'); window.location = '../../media.php?module=$module';</script>";
    }
  }

  elseif($act=='update')
  {
    // Insert        

      if ($module=='materi' AND $act=='update')
      {
        $lokasi_file  = $_FILES['file']['tmp_name'];
        $tipe_file    = $_FILES['file']['type'];
        $nama_file    = $_FILES['file']['name'];
        $fileSize       = $_FILES['file']['size'];

        //            $acak             = rand(000,999);
        $nama_f           = $nama_file; 
        $tanggal_sekarang = date('Y-m-d');
              

        // if(empty($nama_file)) {
        if ( empty($nama_file) )
        {

          mysql_query("UPDATE materi SET 
            nama_file             = '$_POST[nama]',
            pelajaran_id          = '$_POST[pelajaran]',
            kelas_id              = '$_POST[kelas]',
            guru_nama             = '$_POST[guru]',
            tanggal_upload        = '$tanggal_sekarang'
            WHERE  id                    = '$_POST[id]'");

        }
        else{
          $typef = end(explode('.', $nama_f ) );
          mysql_query("UPDATE materi SET 
            nama_file             = '$_POST[nama]',
            pelajaran_id          = '$_POST[pelajaran]',
            tipe_file             = '$typef',
            ukuran_file           = '$fileSize',
            kelas_id              = '$_POST[kelas]',
            guru_nama             = '$_POST[guru]',
            file                  = '$nama_f',
            tanggal_upload        = '$tanggal_sekarang'
            WHERE  id                    = '$_POST[id]'");
          
        }
        echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module';</script>";
      }
      else{
        echo "<script>alert('Maaf ! Modul Salah'); window.location = '../../media.php?module=$module';</script>"; 
      }
  }



  elseif($act=='delete')
  {
    // Insert
    if ($module=='materi' AND $act=='delete')
    {
      $show = mysql_query("SELECT * FROM materi WHERE id='$_POST[id]'");
      while ($row  = mysql_fetch_array($show))
      {
        if($row['file'] != '')
        {
          unlink("../../../image/materi/$row[file]");
          mysql_query("DELETE FROM materi WHERE id = '$_POST[id]'");
        }else{
          mysql_query("DELETE FROM materi WHERE id = '$_POST[id]'");
        }
      }
      echo "<script>alert('Sukses! Data berhasil di Hapus'); window.location = '../../media.php?module=$module';</script>";
    }
    else{
      echo "<script>alert('Maaf! Modul Salah.'); window.location = '../../media.php?module=$module';</script>";
    }
  }

}
?>
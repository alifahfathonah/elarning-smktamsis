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
	if ($module=='guru' AND $act=='insert')
	{

      if (!is_numeric($_POST[nip])) {
    echo "<script>alert('Maaf! NIP Harus Angka.'); window.location = '../../media.php?module=$module';</script>";
    die();
  }
    if (!is_numeric($_POST[no_telp])) {
    echo "<script>alert('Maaf! Nomor Telpon Harus Angka.'); window.location = '../../media.php?module=$module';</script>";
    die();
  }
    $ceknip = mysql_query("SELECT * FROM guru WHERE guru_nip ='$_POST[nip]'");
    $cek    = mysql_fetch_array($ceknip);
    if ($cek == 0) {
    
    // echo $_POST[nama].' '.$_POST[username].' '.$_POST[password].' '.$_POST[guru].' '.$_POST[no_telp].' '.$_POST[alamat].' '.$_POST[email]' '.$_POST[kelas].' '.$_POST[pelajaran].' ';
    //      die();

   mysql_query("INSERT INTO guru (guru_nip,
                                 guru_nama,
                                 guru_username,
                                 guru_password,
                                 guru_level,
                                 guru_telp,
                                 guru_alamat,
                                 guru_email,
                                 kelas_id,
                                 pelajaran_id)
                         VALUES ('$_POST[nip]',
                                '$_POST[nama]',
                                '$_POST[username]',
                                '$_POST[password]',
                                'guru',
                                '$_POST[no_telp]',
                                '$_POST[alamat]',
                                '$_POST[email]',
                                '$_POST[kels]',
                                '$_POST[pljr]')");

    echo "<script>alert('Sukses! Data berhasil di Simpan'); window.location = '../../media.php?module=$module';</script>";
    }else{
          echo "<script>alert('Maaf ! NIP sudah ada dengan Nama ".$cek[name]." Mohon di cek kembali'); window.location = '../../media.php?module=$module';</script>";
    }
}else{
  echo "<script>alert('Maaf! Data Gagal di simpan'); window.location = '../../media.php?module=$module';</script>";
}

}

elseif($act=='update')
{

    
    if ($module=='guru' AND $act=='update')
    {  

  if (!is_numeric($_POST[nip])) {
    echo "<script>alert('Maaf! NIP Harus Angka.'); window.location = '../../media.php?module=$module';</script>";
    die();
  }
    if (!is_numeric($_POST[no_telp])) {
    echo "<script>alert('Maaf! Nomor Telpon Harus Angka.'); window.location = '../../media.php?module=$module';</script>";
    die();
  }

        $nama_file    = $_FILES['fupload']['name'];
        //jika Password tidak dirubah
        if (empty($_POST[password]) ) {
        
        mysql_query("UPDATE guru SET 
                                guru_nip      ='$_POST[nip]',
                                guru_nama     ='$_POST[nama]',
                                guru_username ='$_POST[username]',
                                guru_level    ='guru',
                                guru_telp     ='$_POST[no_telp]',
                                guru_alamat   ='$_POST[alamat]',
                                guru_email    ='$_POST[email]',
                                kelas_id      ='$_POST[kels]',
                                pelajaran_id  ='$_POST[pljr]' 
                          WHERE guru_id       ='$_POST[id]'");
         

          echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module';</script>"; 
          //Jika password di rubah
        }
        elseif (!empty($_POST[password])) {
            
            mysql_query("UPDATE guru SET 
                                guru_nip      ='$_POST[nip]',
                                guru_nama     ='$_POST[nama]',
                                guru_username ='$_POST[username]',
                                guru_password ='$_POST[password]',
                                guru_level    ='guru',
                                guru_telp     ='$_POST[no_telp]',
                                guru_alamat   ='$_POST[alamat]',
                                guru_email    ='$_POST[email]',
                                kelas_id      ='$_POST[kels]',
                                pelajaran_id  ='$_POST[pljr]' 
                          WHERE guru_id       ='$_POST[id]'");
            
          echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module';</script>";
        //jika password dirubah dan foto dirubah  
        }
        elseif (!empty($_POST[password]) AND !empty($nama_file)) {
            $lokasi_file    = $_FILES['fupload']['tmp_name'];
                  $tipe_file      = $_FILES['fupload']['type'];
                  $nama_file      = $_FILES['fupload']['name'];

                  $acak           = rand(000,999);
                  $nama_gambar = $acak.'-'.$nama_file; 

            if(!empty($lokasi_file))
                {
                
                  if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/gif" AND $tipe_file != "image/png"){
                    echo "<script>alert('Data tidak tersimpan! Upload Gagal, Pastikan File yang di Upload bertipe *.JPG, *.GIF, *.PNG.'); window.location = '../../media.php?module=$module';</script>";
                    die();
                  }
                  
                  $show = mysql_query("SELECT * FROM teacher WHERE teacher_id='$_POST[id]'");
                  $row  = mysql_fetch_array($show);
                  if($row['picture'] != '')
                  {
                    unlink("../../../image/guru/$row[picture]");
                  }

                  ImageUpload($fupload_name=$nama_gambar, $to_dir='../../../image/guru/');

                  $pass = md5($_POST[password]);
                  mysql_query("UPDATE teacher SET
                                        nip         = '$_POST[nip]',
                                        name        = '$_POST[nama]',
                                        password    = '$pass',
                                        address     = '$_POST[alamat]',
                                        po_birth    = '$_POST[tempat_lahir]',
                                        do_birth    = '$_POST[tgl_lahir]',
                                        gender      = '$_POST[jk]',
                                        religion    = '$_POST[agama]',
                                        no_telp     = '$_POST[no_telp]',
                                        email       = '$_POST[email]',
                                        picture     = '$nama_gambar',
                                        position    = '$_POST[jabatan]'
                                 WHERE  teacher_id  = '$_POST[id]'");
                echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module';</script>";
            }else{
              echo "<script>alert('Maaf! Data Gagal di Update, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
            }
        //jika password tidak dirubah dan foto dirubah  
        }elseif (empty($_POST[password]) AND !empty($nama_file)) {
          $lokasi_file    = $_FILES['fupload']['tmp_name'];
                  $tipe_file      = $_FILES['fupload']['type'];
                  $nama_file      = $_FILES['fupload']['name'];

                  $acak           = rand(000,999);
                  $nama_gambar = $acak.'-'.$nama_file; 

            if(!empty($lokasi_file))
                {
                
                  if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/gif" AND $tipe_file != "image/png"){
                    echo "<script>alert('Data tidak tersimpan! Upload Gagal, Pastikan File yang di Upload bertipe *.JPG, *.GIF, *.PNG.'); window.location = '../../media.php?module=$module';</script>";
                    die();
                  }
                  
                  $show = mysql_query("SELECT * FROM teacher WHERE teacher_id='$_POST[id]'");
                  $row  = mysql_fetch_array($show);
                  if($row['picture'] != '')
                  {
                    unlink("../../../image/guru/$row[picture]");
                  }

                  ImageUpload($fupload_name=$nama_gambar, $to_dir='../../../image/guru/');

                 
                  mysql_query("UPDATE teacher SET
                                        nip        = '$_POST[nip]',
                                        name       = '$_POST[nama]',
                                        address    = '$_POST[alamat]',
                                        po_birth   = '$_POST[tempat_lahir]',
                                        do_birth   = '$_POST[tgl_lahir]',
                                        gender     = '$_POST[jk]',
                                        religion   = '$_POST[agama]',
                                        no_telp    = '$_POST[no_telp]',
                                        email      = '$_POST[email]',
                                        picture    = '$nama_gambar',
                                        position   = '$_POST[jabatan]'
                                 WHERE  teacher_id = '$_POST[id]'");
                echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module';</script>";
            }else{
              echo "<script>alert('Maaf! Data Gagal di Update, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
            }
        }

       
}
else{
    echo "<script>alert('Maaf! Data Gagal di Update, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}

elseif($act=='delete')
{
    // Insert
    if ($module=='guru' AND $act=='delete')
    {
        
            mysql_query("DELETE FROM guru WHERE guru_id = '$_POST[id]' ");
            
    echo "<script>alert('Sukses! Data Guru Telah di Hapus.'); window.location = '../../media.php?module=$module';</script>";
}
else{
    echo "<script>alert('Maaf! Data Gagal di Hapus, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}


elseif($act=='aktif')
{
    // Insert
    if ($module=='guru' AND $act=='aktif')
    {
        
            mysql_query("UPDATE teacher SET block = 'N'
                           WHERE teacher_id      = '$_GET[id]'");

    $sql = mysql_query("SELECT * FROM teacher WHERE teacher_id = '$_GET[id]' ");
    $cek = mysql_fetch_array($sql);

    echo "<script>alert('Sukses! Data Guru ".$cek[name]." telah Aktif kembali.'); window.location = '../../media.php?module=$module';</script>";
}
else{
    echo "<script>alert('Maaf! Data Gagal di Aktifkan, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}



}
?>

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


if($act=='update')
{
    
    if ($module=='profil' AND $act=='update')
    {   

      if (!is_numeric($_POST[no_telp])) {
          echo "<script>alert('Maaf! Nomor Telpon Harus Angka.'); window.location = '../../media.php?module=$module';</script>";
          die();
        }
      
        $nama_file    = $_FILES['fupload']['name'];
        //jika Password dan foto tidak dirubah
        if (empty($_POST[password]) AND empty($nama_file)) {
        
        mysql_query("UPDATE siswa SET
                                  siswa_nis      = '$_POST[nis]',
                                  siswa_nama     = '$_POST[nama]',
                                  siswa_username = '$_POST[username]',
                                  siswa_level    = 'siswa',
                                  siswa_alamat   = '$_POST[alamat]',
                                  siswa_telp     = '$_POST[no_telp]',
                                  siswa_email    = '$_POST[email]'
                           WHERE  siswa_id       = '$_POST[id]'"); 

          echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module';</script>"; 
          //Jika password di rubah dan foto tidak dirubah
        }elseif (!empty($_POST[password]) AND empty($nama_file)) {
            // $pass = md5($_POST[password]);
            mysql_query("UPDATE siswa SET
                                  siswa_nis        = '$_POST[nis]',
                                  siswa_nama       = '$_POST[nama]',
                                  siswa_username   = '$_POST[username]',
                                  siswa_password   = '$_POST[password]',
                                  siswa_level      = 'siswa',
                                  siswa_alamat     = '$_POST[alamat]',
                                  siswa_telp       = '$_POST[no_telp]',
                                  siswa_email      = '$_POST[email]'
                           WHERE  siswa_id         = '$_POST[id]'");
          echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module';</script>";
        //jika password dirubah dan foto dirubah  
        }elseif (!empty($_POST[password]) AND !empty($nama_file)) {
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
                  
                  $show = mysql_query("SELECT * FROM student WHERE student_id='$_POST[id]'");
                  $row  = mysql_fetch_array($show);
                  if($row['picture'] != '')
                  {
                    unlink("../../../image/siswa/$row[picture]");
                  }

                  ImageUpload($fupload_name=$nama_gambar, $to_dir='../../../image/siswa/');

                  $pass = md5($_POST[password]);
                  mysql_query("UPDATE student SET
                                  nis            = '$_POST[nis]',
                                  name           = '$_POST[nama]',
                                  password       = '$pass',
                                  class_id       = '$_POST[kelas]',
                                  address        = '$_POST[alamat]',
                                  po_birth       = '$_POST[tempat_lahir]',
                                  do_birth       = '$_POST[tgl_lahir]',
                                  gender         = '$_POST[jk]',
                                  religion       = '$_POST[agama]',
                                  father_name    = '$_POST[nama_ayah]',
                                  mother_name    = '$_POST[nama_ibu]',
                                  no_telp        = '$_POST[no_telp]',
                                  email          = '$_POST[email]',
                                  picture        = '$nama_gambar'
                           WHERE  student_id     = '$_POST[id]'");
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
                  
                  $show = mysql_query("SELECT * FROM student WHERE student_id='$_POST[id]'");
                  $row  = mysql_fetch_array($show);
                  if($row['foto'] != '')
                  {
                    unlink("../../../image/siswa/$row[picture]");
                  }

                  ImageUpload($fupload_name=$nama_gambar, $to_dir='../../../image/siswa/');

                 
                  mysql_query("UPDATE student SET
                                  nis            = '$_POST[nis]',
                                  name           = '$_POST[nama]',
                                  class_id       = '$_POST[kelas]',
                                  address        = '$_POST[alamat]',
                                  po_birth       = '$_POST[tempat_lahir]',
                                  do_birth       = '$_POST[tgl_lahir]',
                                  gender         = '$_POST[jk]',
                                  religion       = '$_POST[agama]',
                                  father_name    = '$_POST[nama_ayah]',
                                  mother_name    = '$_POST[nama_ibu]',
                                  no_telp        = '$_POST[no_telp]',
                                  email          = '$_POST[email]',
                                  picture        = '$nama_gambar'
                           WHERE  student_id     = '$_POST[id]'");
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





}
?>

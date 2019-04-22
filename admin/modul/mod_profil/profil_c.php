    <?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
else{
include "../../../system/koneksi.php";

$module	= $_GET['module'];
$act	= $_GET['act'];




if($act=='update')
{
    // Insert
    if ($module=='profil' AND $act=='update')
    {

      if (!is_numeric($_POST[no_telp])) {
          echo "<script>alert('Maaf! Nomor Telpon Harus Angka.'); window.location = '../../media.php?module=$module';</script>";
          die();
        }

        if (empty($_POST[password])) {
            mysql_query("UPDATE admin SET 
                                  admin_nama     = '$_POST[nama]',
                                  admin_username = '$_POST[username]',
                                  admin_level    = 'admin',
                                  alamat         = '$_POST[alamat]',
                                  email          = '$_POST[email]',
                                  no_telp        = '$_POST[no_telp]'                  
                           WHERE  admin_id       = '$_POST[id]'");
        }
        // Apabila password diubah
        else {
            $pass = md5($_POST[password]);
            mysql_query("UPDATE admin SET 
                                  admin_nama      = '$_POST[nama]',
                                  admin_username  = '$_POST[username]',
                                  password        = '$pass',
                                  admin_level     = 'admin',
                                  alamat          = '$_POST[alamat]',
                                  email           = '$_POST[email]',
                                  no_telp         = '$_POST[no_telp]'
                           WHERE admin_id         = '$_POST[id]'");
        }
    echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module';</script>";
}
else{
    echo "<script>alert('Maaf! Data Gagal di Update, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}








}
?>

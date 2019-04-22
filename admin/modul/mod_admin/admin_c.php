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
	if ($module=='admin' AND $act=='insert')
	{

  if (!is_numeric($_POST[no_telp])) {
    echo "<script>alert('Maaf! Nomor Telpon Harus Angka.'); window.location = '../../media.php?module=$module';</script>";
    die();
  }


		
        mysql_query("INSERT INTO admin (admin_nama,
                                 admin_username,
                                 admin_password,
                                 admin_level,
                                 alamat, 
                                 email,
                                 no_telp
                                 ) 
	                       VALUES('$_POST[nama]',
                                '$_POST[username]',
                                '$_POST[password]',
                                'admin',
                                '$_POST[alamat]',
                                '$_POST[email]',
                                '$_POST[no_telp]'
                                )");
        	echo "<script>alert('Sukses! Data berhasil di simpan'); window.location = '../../media.php?module=$module';</script>";

}
else{
	echo "<script>alert('Maaf! Data Gagal Disimpan, Silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}

elseif($act=='update')
{
    // Insert
    if ($module=='admin' AND $act=='update')
    {
        if (empty($_POST[password])) {
            mysql_query("UPDATE admin SET 
                                            `admin_nama`      ='$_POST[nama]',
                                            `admin_username`  ='$_POST[username]',
                                            `admin_level`     ='admin',
                                            `alamat`          ='$_POST[alamat]',
                                            `email`           ='$_POST[email]',
                                            `no_telp`         ='$_POST[no_telp]' 
                                       WHERE admin_id         ='$_POST[id]' ");
        }
        // Apabila password diubah
        else {
         
         // echo $_POST[nama].' '.$_POST[username].' '.$_POST[password].' '.$_POST[alamat].' '.$_POST[email].' '.$_POST[no_telp].' '.$_POST[id].' ';
         // die();


            mysql_query("UPDATE `admin` SET `admin_nama`      = '$_POST[nama]',
                                            `admin_username`  ='$_POST[username]',
                                            `admin_password`  ='$_POST[password]',
                                            `admin_level`     ='admin',
                                            `alamat`          ='$_POST[alamat]',
                                            `email`           ='$_POST[email]',
                                            `no_telp`         ='$_POST[no_telp]' 
                                       WHERE admin_id         ='$_POST[id]' ");
        }
    echo "<script>alert('Sukses! Data berhasil di Update'); window.location = '../../media.php?module=$module';</script>";
}
else{
    echo "<script>alert('Maaf! Data Gagal di Update, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}

elseif($act=='blokir')
{
    // Insert
    if ($module=='admin' AND $act=='blokir')
    {
        
            mysql_query("UPDATE admin SET block = 'Y'
                           WHERE admin_id        = '$_POST[id]'");
      
  $sql = mysql_query("SELECT * FROM admin WHERE admin_id = '$_POST[id]' ");
            $cek = mysql_fetch_array($sql);

    echo "<script>alert('Sukses! Data Admin ".$cek[name]." telah Terblokir.'); window.location = '../../media.php?module=$module';</script>";


}
else{
    echo "<script>alert('Maaf! Data Gagal di Blokir, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}


elseif($act=='aktif')
{
    // Insert
    if ($module=='admin' AND $act=='aktif')
    {
        
            mysql_query("UPDATE admin SET block = 'N'
                           WHERE admin_id      = '$_GET[id]'");

    $sql = mysql_query("SELECT * FROM admin WHERE admin_id = '$_GET[id]' ");
    $cek = mysql_fetch_array($sql);

    echo "<script>alert('Sukses! Data Admin ".$cek[name]." telah Aktif kembali.'); window.location = '../../media.php?module=$module';</script>";
}
else{
    echo "<script>alert('Maaf! Data Gagal di Aktifkan, silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
}

}



}
?>

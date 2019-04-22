<?php

include_once"../system/koneksi.php";


$username = $_POST['username'];
$pass = $_POST['password'];

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR ! ctype_alnum($pass)) {
    echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
} else {
    $login = mysql_query("SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$pass' ");
    $ketemu = mysql_num_rows($login);
    $r = mysql_fetch_array($login);



// Apabila username dan password ditemukan
    if ($ketemu > 0) {
        session_start();
        include "../system/timeout.php";

        $_SESSION[namauser] = $r[admin_username];
        $_SESSION[nama] = $r[admin_nama];
        $_SESSION[passuser] = $r[admin_password];
        $_SESSION[level] = $r[admin_level];
        $_SESSION[idadmin] = $r[admin_id];

        // session timeout
        $_SESSION[login] = 1;
        timer();


        header('location:media.php?module=home');
    } else {
        echo "<script>alert('Maaf! Username atau Password anda salah atau anda sedang di blokir!'); window.location = 'index.php';</script>";
    }
}
?>

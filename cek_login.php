<?php

include_once"system/koneksi.php";


$username = $_POST['username'];
$pass = $_POST['password'];

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR ! ctype_alnum($pass)) {
    echo "<script>alert('Silahkan masukkan username dan password yang benar!!!'); window.location = 'index.php';</script>";
} else {
    $login = mysql_query("SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$pass' ");
    $ketemu = mysql_num_rows($login);
    $r = mysql_fetch_array($login);
    $login_guru = mysql_query("SELECT * FROM guru WHERE guru_username='$username' AND guru_password='$pass' ");
    $ktemu = mysql_num_rows($login_guru);
    $rg = mysql_fetch_array($login_guru);

    $login_sis = mysql_query("SELECT * FROM siswa WHERE siswa_username='$username' AND siswa_password='$pass' ");
    $ktm = mysql_num_rows($login_sis);
    $rsis = mysql_fetch_array($login_sis);


// Apabila username dan password ditemukan
    if ($ketemu > 0) {
        session_start();
        include "system/timeout.php";

        $_SESSION[namauser] = $r[admin_username];
        $_SESSION[namalengkap] = $r[admin_nama];
        $_SESSION[passuser] = $r[admin_password];
        $_SESSION[level] = $r[admin_level];
        $_SESSION[idadmin] = $r[admin_id];

        // session timeout
        $_SESSION[login] = 1;
        timer();


        header('location:admin/media.php?module=home');
    } 
    // Apabila username dan password ditemukan
    if ($ktemu > 0) {
        session_start();
        include "system/timeout.php";
        $_SESSION[nip] = $rg[guru_nip];
        $_SESSION[nama] = $rg[guru_nama];
        $_SESSION[username] = $rg[guru_username];
        $_SESSION[passuser] = $rg[guru_password];
        $_SESSION[level] = $rg[guru_level];
        $_SESSION[id_guru] = $rg[guru_id];

        // session timeout
        $_SESSION[login] = 1;
        timer();


        header('location:guru/media.php?module=home');

    }

    elseif ($ktm > 0) {
        session_start();
        include "system/timeout.php";
        $_SESSION[nis] = $rsis[siswa_nis];
        $_SESSION[nama] = $rsis[siswa_nama];
        $_SESSION[username] = $rsis[siswa_username];
        $_SESSION[passuser] = $rsis[siswa_password];
        $_SESSION[level] = $rsis[siswa_level];
        $_SESSION[id_siswa] = $rsis[siswa_id];
        $_SESSION[id_kelas] = $rsis[kelas_id];

        // session timeout
        $_SESSION['login'] = 1;
        timer();


        header('location:siswa/media.php?module=home'); 
    }
    else {
        echo "<script>alert('Maaf! Username atau Password anda salah!'); window.location = 'index.php';</script>";
    }
}
?>

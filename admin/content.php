<?php
if (! session_id())session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
?>

<?php
// Bagian home
if ($_GET['module']=='home'){
  if ($_SESSION['level']=='admin'){
    include "modul/mod_home/home_v.php";
  }
}

elseif ($_GET['module']=='admin'){
  if ($_SESSION['level']=='admin'){
    include "modul/mod_admin/admin_v.php";
  }
}

elseif ($_GET['module']=='guru'){
  if ($_SESSION['level']=='admin'){
    include "modul/mod_guru/guru_v.php";
  }
}

elseif ($_GET['module']=='siswa'){
  if ($_SESSION['level']=='admin'){
    include "modul/mod_siswa/siswa_v.php";
  }
}

elseif ($_GET['module']=='kelas'){
  if ($_SESSION['level']=='admin'){
    include "modul/mod_kelas/kelas_v.php";
  }
}

elseif ($_GET['module']=='ta'){
  if ($_SESSION['level']=='admin'){
    include "modul/mod_ta/ta_v.php";
  }
}

elseif ($_GET['module']=='mapel'){
  if ($_SESSION['level']=='admin'){
    include "modul/mod_mapel/mapel_v.php";
  }
}

// elseif ($_GET['module']=='detail_mapel'){
//   if ($_SESSION['level']=='admin'){
//     include "modul/mod_detail_mapel/detail_mapel_v.php";
//   }
// }

elseif ($_GET['module']=='profil'){
  if ($_SESSION['level']=='admin'){
    include "modul/mod_profil/profil_v.php";
  }
}
// Apabila modul tidak ditemukan
else{
  echo "<p><b><center>MODUL BELUM ADA ATAU BELUM LENGKAP</center></b></p>";
}
}
?>

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
        move_uploaded_file($lokasi_file,'../../../image/tsiswa/'.$nama_f);
        
          //data yang akan di insert
                          
        $data_guru= mysql_fetch_assoc(mysql_query("SELECT * FROM guru WHERE pelajaran_id='{$_POST["pelajaran_id"]}'"));
        $save = "INSERT INTO jawaban(judul,
                                  file,
                                  tipe_file,
                                  ukuran_file,
                                  tanggal_upload,
                                  guru_id,
                                  kelas_id,
                                  siswa_id,
                                  pelajaran_id,
                                  soal_id)
         VALUES('$_POST[nama]',
                '$nama_f',
                '$type',
                '$fileSize',
                '$tanggal_sekarang',
                '{$data_guru["guru_id"]}',
                '$_POST[kelas_id]',
                '$_POST[siswa_id]',
                '$_POST[pelajaran_id]',
                '$_POST[soal_id]')";
      // print_r($save);die();
      $insert = mysql_query($save);

      // }
      if ($insert) {
        # code...

            echo "<script>alert('Sukses! Data berhasil di simpan'); window.location = '../../media.php?module=jawaban';</script>";
      }
      else{
       // print_r($to_dir); exit();
        // die();
      // echo "<script>alert('Gagal'); window.location = '../../media.php?module=$module';</script>";
        die(mysql_error());
      }
    } else {
      echo "<script>alert('ukuran file maksimal 2 mb !!!'); window.location = '../../media.php?module=$module';</script>";
    }

  }else{
    echo "<script>alert('Maaf! Data Gagal Disimpan, Silahkan coba lagi.'); window.location = '../../media.php?module=$module';</script>";
  }
}
}


}
?>

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
  if ($module=='jawaban' AND $act=='insert')
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
                          
        $data_guru= mysql_fetch_assoc(mysql_query("SELECT * FROM guru WHERE pelajaran_id='{$_POST["pelajaran"]}'"));
        $save = "INSERT INTO jawaban(judul,
                                  pelajaran_id,
                                  tipe_file,
                                  ukuran_file,
                                  kelas_id,
                                  siswa_id,
                                  tanggal_upload,
                                  guru_id,
                                  file)
         VALUES('$_POST[nama]',
                '$_POST[pelajaran]',
                '$type',
                '$fileSize',
                '$_POST[kelas]',
                '$_POST[siswa_id]',
                '$tanggal_sekarang',
                '{$data_guru["guru_id"]}',
                '$nama_f')";
      // print_r($save);die();
      $insert = mysql_query($save);

      // }
      if ($insert) {
        # code...

            echo "<script>alert('Sukses! Data berhasil di simpan'); window.location = '../../media.php?module=$module';</script>";
      }
      else{
       // print_r($to_dir); exit();
        // die();
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

    if ( $module=='jawaban' AND $act=='update' )
    {
      $data= array();
      $data['lokasi_file']      = $_FILES['file']['tmp_name'];
      $data['tipe_file']        = $_FILES['file']['type'];
      $data['nama_file']        = $_FILES['file']['name'];
      $data['fileSize']         = $_FILES['file']['size'];
      $data['nama_f']           = $data['nama_file']; 
      $data['tanggal_sekarang'] = date('Y-m-d');
      $data['jawaban_id']       = $_POST['id'];
            
      if(!empty($data['lokasi_file']))
      {

        if ( $data['fileSize'] < 2044070 )
        {
          $data['typef']  = end(explode('.', $data['nama_f'] ) );
          $data['show']   = mysql_fetch_assoc(mysql_query("SELECT file FROM jawaban WHERE jawaban_id='{$data["jawaban_id"]}'"));
                
          if($data['show']['file'] != '')
          {
            unlink("../../../image/tsiswa/".$data['show']['file']) ;
          }

          move_uploaded_file($data['lokasi_file'],'../../../image/tsiswa/'.$data['nama_f']);
          $data['insert'] =  mysql_query ("UPDATE jawaban SET 
                                tipe_file             = '{$data["typef"]}',
                                ukuran_file           = '{$data["fileSize"]}',
                                file                  = '{$data["nama_f"]}',
                                tanggal_upload        = '{$data["tanggal_sekarang"]}'
                         WHERE  jawaban_id            = '{$data["jawaban_id"]}'");
          // echo "<pre>";
          // print_r($data);
          // echo "</pre>";
          // die();


          if ($data['insert']) {
            echo "<script>alert('Sukses! Data berhasil di simpan'); window.location = '../../media.php?module=$module';</script>";
          
          }
          else{
            echo "<script>alert('Gagal'); window.location = '../../media.php?module=$module';</script>";
          
          }

        }
        else {
          echo "<script>alert('ukuran file maksimal 2 mb !!!'); window.location = '../../media.php?module=$module';</script>";
        
        }

      }
      else{
        echo "<script>alert('Maaf Anda belum memilih file.'); window.location = '../../media.php?module=$module';</script>";
      
      }


    }

}

elseif($act=='delete')
{
    // Insert
    if ($module=='jawaban' AND $act=='delete')
    {

       $show = mysql_query("SELECT * FROM jawaban WHERE jawaban_id='$_POST[id]'");
                  
                  while ($row  = mysql_fetch_array($show)) {
                      
                      if($row['file'] != '')
                      {
                        unlink("../../../image/tsiswa/$row[file]");
                        mysql_query("DELETE FROM jawaban WHERE jawaban_id = '$_POST[id]'");
                      }else{
                        mysql_query("DELETE FROM jawaban WHERE jawaban_id = '$_POST[id]'");
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

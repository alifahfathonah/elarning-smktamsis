<?php
//=================================================================================================================
//                                                  FUNGSI UPLOAD FILE
//=================================================================================================================
function UploadFile($fupload_name, $to_dir){
  //direktori file
  $vdir_upload = $to_dir;
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
//=================================================================================================================
//                                                  FUNGSI UPLOAD IMAGE
//=================================================================================================================
function ImageUpload($fupload_name, $to_dir){
  //direktori Header
  $vdir_upload = $to_dir;
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

//=================================================================================================================
//                                                  FUNGSI RESIZE IMAGE
//=================================================================================================================
function ImageResize($fupload_name, $from_dir, $to_dir, $resize){
  //direktori gambar
  $vdir_upload = $from_dir;
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 350 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = $resize; //perubahan ukuran gambar
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagejpeg($im,$to_dir . "small_" . $fupload_name);

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
?>

<?php
if (!session_id())session_start();

if (empty($_SESSION['nip']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
$module="modul/mod_kumpul/kumpul_c.php?module=kumpul";


?>





<?php 
switch ($_GET['act']) {
default:
?>

      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-text"></i> Data Siswa Belum Upload</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=kumpul" class="bread-current"> Siswa Belum Upload Tugas</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Siswa Belum Upload Tugas</div>
                  <div class="widget-icons pull-right">
                    <a href="dynamic-tables.html#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="dynamic-tables.html#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  
                  <div class="padd">

              <form class="form-horizontal" method="POST" action="media.php?module=kumpul">
                <!-- Username -->
                <div class="form-group">
                  <label class="control-label col-lg-1" for="inputUsername">Pilih Tugas</label>
                  <div class="col-lg-4">
                    <select class="form-control" name="soal_id" >
                      <option value="">-pilih- </option>
                      <?php 
                          $data = mysql_query("SELECT * FROM `soal` `a`
                                  LEFT JOIN `pelajaran` `b` ON b.`pelajaran_id`=a.`pelajaran_id`
                                  LEFT JOIN `kelas` `c` ON c.`kelas_id`=a.`kelas_id`
                                  WHERE a.`guru_id`='".$_SESSION['id_guru']."' ");
                          while ($row = mysql_fetch_assoc($data)) {
                            echo "
                                <option value=\"".$row['soal_id']."\">".$row['pelajaran_nama']." || ".$row['judul']." || ".$row['kelas_nama']."</option>
                            ";
                          }
                      ?>
                    </select>
                  </div>
                  <div class="col-lg-2">
                    <button type="submit" class="btn btn-info btn-sm">Lihat Data</button>
                  </div>
                </div>
            
                
                <br>
              </form>
              
              <?php if ($_POST): ?>
              <hr>   
                       
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Nama Siswa</b></th>
                        <th><b>Kelas</b></th>
                        <th><b>Pelajaran</b></th>
                        <th><b>Nama Tugas</b></th>
                        <th><b>Batas Akhir</b></th>
                        <th><b>Keterangan</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      // print_r($_SESSION);
                      $no = 1;
                      $idgr = $_SESSION[id_guru];
                      $soal_id=$_POST['soal_id'];
                      // echo $soal_id;die();
                      // $data = mysql_query("SELECT * FROM jawaban, kelas, pelajaran, guru WHERE jawaban.kelas_id = kelas.kelas_id AND jawaban.pelajaran_id = pelajaran.pelajaran_id AND guru.pelajaran_id = pelajaran.pelajaran_id AND guru.guru_id = '$idgr' ");

                       // $sis = mysql_query("SELECT s.siswa_id,s.siswa_nama,k.kelas_nama,p.pelajaran_nama FROM siswa s,kelas k,guru g,pelajaran p WHERE 1=1 AND k.kelas_id=s.kelas_id AND g.guru_id=11 AND p.pelajaran_id=g.pelajaran_id AND s.siswa_id NOT IN(SELECT siswa_id FROM jawaban)");
                       // $sis = ("SELECT s.siswa_id,s.siswa_nama,k.kelas_nama,p.pelajaran_nama,so.judul,so.tanggal_tugas,so.batas_upload FROM siswa s,kelas k,guru g,pelajaran p,soal so WHERE 1=1 AND k.kelas_id=s.kelas_id AND g.guru_id='$idgr' AND p.pelajaran_id=g.pelajaran_id AND so.pelajaran_id=g.pelajaran_id AND s.siswa_id NOT IN(SELECT siswa_id FROM jawaban WHERE pelajaran_id=g.pelajaran_id AND soal_id !='')");
                       
                      $siskampling = mysql_query("SELECT  a.`soal_id`, c.`pelajaran_nama`, a.`judul`, b.`siswa_id`, b.`siswa_nama`,b.`kelas_id`, d.`kelas_nama`, a.`batas_upload`
                        FROM  `siswa` `b` ,`soal` `a`
                        LEFT JOIN `pelajaran` `c` ON c.`pelajaran_id` = a.`pelajaran_id`
                        LEFT JOIN `kelas` `d` ON d.`kelas_id`=a.`kelas_id`
                        WHERE a.`guru_id`='".$idgr."' 
                        AND b.`kelas_id` = a.`kelas_id`
                        AND a.`soal_id`='".$soal_id."'
                        AND b.`siswa_id` NOT IN (SELECT `siswa_id` FROM `jawaban` WHERE `soal_id`='".$soal_id."')");
                      // print_r($siskampling);die();
                       
                       // $qg = mysql_query("SELECT * FROM detail_lesson, teacher WHERE teacher.teacher_id = detail_lesson.teacher_id AND detail_lesson.detail_lesson_id = '$row[detail_lesson_id]' ");
                       // $rg = mysql_fetch_array($qg);
                       ?>
                       <?php 
                       while ($key = mysql_fetch_assoc($siskampling)) {
                          
                          $status = ($key[batas_upload] > date('Y-m-d')) ? 'Tugas Belum Berakhir' : 'Tugas Sudah Berakhir' ;
                          echo "
                          <tr>
                            <td>".$no."</td>
                            <td>".$key[siswa_nama]."</td>
                            <td>".$key[kelas_nama]."</td>
                            <td>".$key[pelajaran_nama]."</td>
                            <td>".$key[judul]."</td>
                            <td>".tanggal_indo(strval($key[batas_upload]),TRUE)."</td>
                            <td>".$status."</td>
                          </tr>
                          ";
                        $no++;
                       }
                        ?>

                      
                    </tbody>
                    
                  </table>
                  <div class="clearfix"></div>
                </div>
                </div>
              </div>

              <?php endif ?> 
          
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>

            </div>




            </div>
          </div>
        </div>



<!-- Blokir Data -->
    <?php 
                      
                      $data = mysql_query("SELECT * FROM soal ");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>    
      <div id="hapus<?php echo $row[soal_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header merah">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"><i class="fa fa-warning"></i> Sanksi Tugas</h4>
                      </div>
                      <div class="modal-body">
                      
                      <form method="POST" action="<?php echo $module; ?>&act=delete">
                      
                      <div class="alert alert-danger">
                      <h4><i class="icon fa fa-ban"></i> <b>Peringatan!</b></h4>
                      Apakah Anda ingin memberi sanksi pada siswa <b><?php echo $sw[siswa_nama]; ?></b>?
                      </div>

                      <input type="hidden" name="id" value="<?php echo $row[soal_id]; ?>">


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="submit" class="btn btn-warning"> <i class="fa fa-warning"></i> Ya</button>
                      </div>
                      </form> 
                    </div>
      </div>
     </div>
     <?php } ?>
    <!-- End Blokir Data -->
<?php
break;
 }?>




        <?php } ?>  
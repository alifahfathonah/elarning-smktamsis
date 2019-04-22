<?php
session_start();

if (empty($_SESSION['nip']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
$module="modul/mod_jawaban/jawaban_c.php?module=jawaban";


?>





<?php 
switch ($_GET['act']) {
default:
?>

      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-text"></i> Data Jawaban Tugas</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="#"><i class=""></i> Tugas</a>
          <span class="divider">/</span> 
          <a href="media.php?module=tugas" class="bread-current"> Download Tugas Siswa</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Jawaban Tugas Siswa</div>
                  <div class="widget-icons pull-right">
                    <a href="dynamic-tables.html#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="dynamic-tables.html#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                  
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
                        <th><b>File</b></th>
                        <th><b>Tanggal Upload</b></th>
                        <th><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $idgr = $_SESSION[id_guru];
                      $data = mysql_query("SELECT 
                          j.judul,
                          j.file,
                          j.tanggal_upload,
                          s.siswa_nama,
                          k.kelas_nama,
                          p.pelajaran_nama
                        FROM jawaban j,siswa s, kelas k,pelajaran p
                        WHERE 1=1 
                          AND j.guru_id='{$_SESSION["id_guru"]}'
                          AND s.siswa_id=j.siswa_id 
                          AND k.kelas_id=j.kelas_id 
                          AND p.pelajaran_id=j.pelajaran_id 
                          -- group by s.siswa_nama limit 1
                      ");
                      while ($row = mysql_fetch_assoc($data)) {
                       // echo "<pre>";
                       // print_r($row);
                       // echo "</pre>";
                        
                       ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row[siswa_nama]; ?></td>
                        <td><?php echo $row[kelas_nama]; ?></td>
                        <td><?php echo $row[pelajaran_nama]; ?></td>
                        <td><?php echo $row[judul]; ?></td>
                        <td><?php echo $row[file]; ?></td>
                        <td><?php echo tanggal_indo($row[tanggal_upload],TRUE) ?></td>
                        <!-- <td><?php if ($row[soal_id] == 0 ) {
                        //   echo "<span class='label label-danger'>Belum Ada Soal Ujian</span>";
                        // }else {
                        //   echo "<span class='label label-success'>Soal Sudah Ada</span>";
                        }  ?></td>
                        <td><?php echo $row[enrol_key]; ?></td>
                        
                        <td width="120px">
                          <div class="btn-group1">
                          
                          <?php if ($row[question_group_id] == 0 ) { ?>
                            <a href="#soalenrolkey<?php echo $row[exm_schedule_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-primary" ><i class="fa fa-plus"></i> Masukkan Soal & Enrol Key</button></a>
                         <?php }else{ ?>
                            <a href="#editsoalenrolkey<?php echo $row[exm_schedule_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-warning" ><i class="fa fa-pencil"></i> Edit Soal & Enrol Key</button></a>
                         <?php } ?> -->

                          <td width="200px">
                          <div class="btn-group1">

                          <a href="http:/elearning/image/tsiswa/<?php echo $row[file]; ?>" download data-toggle="modal"><button type="button" class="btn btn-sm btn-download" title="Download"><i class="fa fa-download"></i></button></a>
                          
                          <!-- <a href="#hapus<?php echo $row[soal_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i></button></a> -->

                        
                        </div>
                        </td>

                          </div>
                        </td>
                      </tr>
                      <?php $no++; } ?>
                      
                    </tbody>
                    
                  </table>
                  <div class="clearfix"></div>
                </div>
                </div>
              </div>

          
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>

            </div>




            </div>
          </div>
        </div>






<?php
break;
 }?>




        <?php } ?>  
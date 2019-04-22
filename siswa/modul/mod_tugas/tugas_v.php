<?php
session_start();

if (empty($_SESSION['nip']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
$module="modul/mod_tugas/tugas_c.php?module=tugas";


?>





<?php 
switch ($_GET['act']) {
default:
?>

      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-text"></i> Data Tugas</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="#"><i class=""></i> Tugas</a>
          <span class="divider">/</span> 
          <a href="media.php?module=tugas" class="bread-current"> Data Tugas</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Tugas</div>
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
                        <th><b>Nama Tugas</b></th>
                        <th><b>Pelajaran</b></th>
                        <th><b>Kelas</b></th>
                        <th><b>File</b></th>
                        <th><b>Tipe file</b></th>
                        <th><b>Pengajar</b></th>
                        <th><b>Tanggal Upload</b></th>
                        <th><b>Batas Akhir</b></th>
                        <th><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      

                      $grnm = $_SESSION['nama']; 
                      $data = mysql_query("SELECT * FROM soal where kelas_id='$_SESSION[id_kelas]'");
                      while ($row = mysql_fetch_array($data)) {
                        
                        $p = mysql_query("SELECT * FROM pelajaran where pelajaran_id='$row[pelajaran_id]'");
                        $pel = mysql_fetch_array($p);
                        
                        $k= mysql_query("SELECT * FROM kelas where kelas_id='$row[kelas_id]'");
                        $kls = mysql_fetch_array($k);
                   
                       
                        
                       ?>
                      
                       <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row[judul]; ?></td>
                        <td><?php echo $pel[pelajaran_nama]; ?></td>
                        <td><?php echo $kls[kelas_nama]; ?></td>
                        <td><?php echo $row[file]; ?></td>
                        <td><?php echo $row[tipe_file]; ?></td>
                        <td><?php echo $row[guru_nama]; ?></td>
                        <td><?php echo tanggal_indo($row[tanggal_tugas],TRUE) ?></td>
                        <td><?php echo tanggal_indo($row[batas_upload],TRUE) ?></td>
                        <!-- <td><?php if ($row[soal_id] == 0 ) {
                          echo "<span class='label label-danger'>Belum Ada Soal Ujian</span>";
                        }else {
                          echo "<span class='label label-success'>Soal Sudah Ada</span>";
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

                          <?php 
                            if ($row[batas_upload] > date('Y-m-d') ) {
                              ?>
                              <a href="http:/elearning/image/tugas/<?php echo $row[file]; ?>" download data-toggle="modal"><button type="button" class="btn btn-sm btn-download" title="Download"><i class="fa fa-download"></i></button></a>
                              <!-- <a href="#add" data-toggle="modal" class="btn btn-sm btn-upload"><i class="fa fa-upload"></i> Upload Jawaban</a> -->
                              <a href="#add<?php echo $row[soal_id]; ?>" data-toggle="modal" class="btn btn-sm btn-upload"><i class="fa fa-upload"></i> Upload Jawaban</a>
                              <!-- <a href="http:/elearning/image/tsiswa/<?php echo $row[file]; ?>" upload data-toggle="modal"><button type="button" class="btn btn-sm btn-upload" title="Upload"><i class="fa fa-upload"></i></button></a> -->
                              <?php

                            }else {
                              echo 'Tugas Sudah Berakhir';
                            }
                            ?>
                          
                          <!-- <a href="#hapus<?php echo $row[soal_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i></button></a> -->

                        
                        </div>
                        </td>

                          </div>
                        </td>
                      </tr>

                      <div id="add<?php echo $row[soal_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header biru">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"> <i class="fa fa-plus"></i> Upload Jawaban Tugas</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="<?php echo $module; ?>&act=insert" enctype="multipart/form-data">
                        <input type="hidden" name="siswa_id" value="<?php echo $_SESSION['id_siswa']?>">                                             
                        <input type='hidden' name="soal_id" value="<?php echo $row[soal_id]?>">
                        <input type='hidden' name="pelajaran_id" value="<?php echo $row[pelajaran_id]?>">
                        <input type='hidden' name="kelas_id" value="<?php echo $row[kelas_id]?>">

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Tugas</label></div>
                          <div class="col-md-6">
                            <input type="text" name="nama" class="form-control" readonly value="<?php echo $row[judul] ?>">
                          </div>
                        </div>
                      </div>
                      
                      <!-- <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Pelajaran</label></div>
                          <div class="col-md-6">  
                            <input type="text" name="pelajaran" class="form-control" readonly value="<?php echo $pel[pelajaran_nama] ?>">
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Kelas</label></div>
                          <div class="col-md-6">  
                            <input type="text" name="pelajaran" class="form-control" readonly value="<?php echo $kls[kelas_nama] ?>">
                            </select>
                          </div>
                        </div>
                      </div> -->

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Uploader</label></div>
                          <div class="col-md-6"> 
                              <input type="text" name="siswa" class="form-control" readonly value="<?php echo $_SESSION[nama]?>">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Upload Jawaban Tugas</label></div>
                          <div class="col-md-6"> 
                              <input type="file" name="file" required>
                          </div>
                        </div>
                      </div>
                     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                      </div>
                      </form>
                      
                    </div>
      </div>
     </div>

                      <?php $no++; } //}?>
                      
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
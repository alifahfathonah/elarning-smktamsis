<?php
session_start();

if (empty($_SESSION['nis']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
  $module="modul/mod_materi/materi_c.php?module=materi";


?>


<?php 
switch ($_GET['act']) {
default:
?>

      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-text"></i> Materi</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=materi" class="bread-current"> Materi</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Materi</div>
                  <div class="widget-icons pull-right">
                    <a href="dynamic-tables.html#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="dynamic-tables.html#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                  <div style="padding-bottom: 10px;" align="right"></div>    
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Nama Materi</b></th>
                        <th><b>Pelajaran</b></th>
                        <th><b>Kelas</b></th>
                        <th><b>File</b></th>
                        <th><b>Tipe file</b></th>
                        <th><b>Pengajar</b></th>
                        <th><b>Tanggal Upload</b></th>
                        <th><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      

                      $grnm = $_SESSION['nama']; 
                      $data = mysql_query("SELECT * FROM materi where kelas_id='$_SESSION[id_kelas]'");
                      while ($row = mysql_fetch_array($data)) {
                        
                        $p = mysql_query("SELECT * FROM pelajaran where pelajaran_id='$row[pelajaran_id]'");
                        $pel = mysql_fetch_array($p);
                        
                        $k= mysql_query("SELECT * FROM kelas where kelas_id='$row[kelas_id]'");
                        $kls = mysql_fetch_array($k);
                   
                       
                        
                       ?>
                      
                       <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row[nama_file]; ?></td>
                        <td><?php echo $pel[pelajaran_nama]; ?></td>
                        <td><?php echo $kls[kelas_nama]; ?></td>
                        <td><?php echo $row[file]; ?></td>
                        <td><?php echo $row[tipe_file]; ?></td>
                        <td><?php echo $row[guru_nama]; ?></td>
                        <td><?php echo tanggal_indo($row[tanggal_upload],TRUE) ?></td>
                        
                        
                        
                        <td width="120px">
                          <div class="btn-group1">
                          
                          <a href="http:/elearning/image/materi/<?php echo $row[file]; ?>" download data-toggle="modal"><button type="button" class="btn btn-sm btn-download" title="download"><i class="fa fa-download"></i></button></a>

                          <!-- <a href="#hapus<?php echo $row[id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i></button></a> -->


                          </div>
                        </td>
                      </tr>

                       <?php $no++; }?>
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
 } ?>




        <?php } ?>  


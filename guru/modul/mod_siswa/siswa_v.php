<?php
session_start();

if (empty($_SESSION['nip']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
  $module="modul/mod_siswa/siswa_c.php?module=siswa";


?>

<?php 
$id  = $_GET[id];
$sql = mysql_query("SELECT * FROM class WHERE class_id = '$id' ");
$k = mysql_fetch_array($sql);
 ?>


      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-users"></i> Data Siswa</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=siswa" class="bread-current">Siswa Kelas <?php echo $k[class_name]; ?></a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Siswa kelas <?php echo $k[class_name]; ?></div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
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
                        <th><b>Nis</b></th>
                        <th><b>Nama</b></th>
                        <th><b>Kelas</b></th>
                        <th><b>Jenis Kelamin</b></th>
                        <th><b>Alamat</b></th>
                        <th><b>No tlp</b></th>
                        <th><b>Setatus</b></th>
                        <th width="100px"><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $id = $_GET[id];
                      $data = mysql_query("SELECT * FROM student WHERE class_id = '$id' ");
                      while ($row = mysql_fetch_array($data)) {
                        $sql = mysql_query("SELECT * FROM class WHERE class_id='$row[class_id]'");
                        $kelas = mysql_fetch_array($sql);
                       ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row[nis]; ?></td>
                        <td><?php echo $row[name]; ?></td>
                        <td><?php echo $kelas[class_name]; ?></td>
                        <td><?php if ($row[gender]=='L') { echo "Laki-laki"; }elseif ( $row[gender]=='P') { echo "Perempuan"; } ?></td>
                        <td><?php echo $row[address]; ?></td>
                        <td><?php echo $row[no_telp]; ?></td>
                        <td><?php if ($row[block]=='Y') { echo "<span class='label label-danger'>Blokir</span>";
                        }elseif ($row[block]=='N') { echo "<span class='label label-success'>Aktif</span>"; }  ?></td>

                        <td width="120px">
                          <div class="btn-group1">
                          <a href="#detail<?php echo $row[student_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-info" title="detail"><i class="fa fa-eye"></i></button></a>
                        
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






    <!-- Detail Data -->
    <?php 
                      
                      $data = mysql_query("SELECT * FROM student ");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>
      <div id="detail<?php echo $row[student_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header biru-langit">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title-putih"><i class="fa fa-eye"></i> Detail Data Siswa</h4>
                      </div>
                      <div class="modal-body">

                      <div class="form-group">
                        <div class="row imgbacground" align="center">
                        
                        <img class="gambar" src="../image/siswa/<?php echo $row[picture]; ?>" alt="" width="30%">
                        <div class="jabatan"><b><?php echo $row[name]; ?></b></div>
                        <div class="jabatan"><b>NIS : <?php echo $row[nis]; ?></b></div>
                        </div>
                      </div>

                      <div class="alert alert-info">
                        
                        <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Kelas</label></div>
                          <div class="col-md-8">
                            : <?php 
                             $kl = mysql_query("SELECT * FROM class WHERE class_id='$row[class_id]'");
                             $kelas = mysql_fetch_array($kl);
                             echo $kelas[class_name]; ?>
                          </div>
                        </div>
                      </div>

                        <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Alamat</label></div>
                          <div class="col-md-8">
                            : <?php echo $row[address]; ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Tempat Lahir</label></div>
                          <div class="col-md-8">
                            : <?php echo $row[po_birth]; ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Tanggal Lahir</label></div>
                          <div class="col-md-8">
                            :  <?php echo TanggalIndo($row[do_birth]); ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Jenis Kelamin</label></div>
                          <div class="col-md-8">
                            : <?php $jk =$row[gender];
                            if ($jk=='P') {
                              echo "Perempuan";
                            }elseif ($jk=='L') {
                              echo "Laki-laki";
                            } ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Agama</label></div>
                          <div class="col-md-8">
                            : <?php echo $row[religion]; ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Ayah</label></div>
                          <div class="col-md-8">
                            : <?php echo $row[father_name]; ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Ibu</label></div>
                          <div class="col-md-8">
                            : <?php echo $row[mother_name]; ?>
                          </div>
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>No Tlp</label></div>
                          <div class="col-md-5">
                            : <?php echo $row[no_telp]; ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Email</label></div>
                          <div class="col-md-6">
                            : <?php echo $row[email]; ?>
                          </div>
                        </div>
                      </div>

                      </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                      </div>
                    </div>
      </div>
     </div>
     <?php } ?>
    <!-- End detail Data -->





        <?php } ?>  
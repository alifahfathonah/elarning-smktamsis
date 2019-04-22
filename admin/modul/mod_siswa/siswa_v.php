<?php
if (! session_id())session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
  
?>


      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-users"></i> User Siswa</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="#" class="bread-current">User</a>
          <span class="divider">/</span> 
          <a href="media.php?module=siswa" class="bread-current">Siswa</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

<?php
error_reporting (E_ALL ^ E_WARNING||E_NOTICE);
$module = $_GET['module'];
$id = $_GET['id'];
$module="modul/mod_siswa/siswa_c.php?module=siswa";
if (!empty($module) AND !empty($id)) { 

$sql = mysql_query("SELECT * FROM kelas WHERE kelas_id = '$id'");
$d = mysql_fetch_array($sql);

  ?>

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Siswa<?php echo $d[kelas_nama]; ?></div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                       <div style="padding-bottom: 10px;" align="right"><a href="#add" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Data Siswa</a></div>
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>NIS</b></th>
                        <th><b>Nama</b></th>
                        <th><b>Telepon</b></th>
                        <th><b>Email</b></th>
                        <th><b>Kelas</b></th>
                        <th><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysql_query("SELECT * FROM siswa  WHERE kelas_id = '$id' ");
                      while ($row = mysql_fetch_array($data)) {
                        $sql = mysql_query("SELECT * FROM kelas WHERE kelas_id='$row[kelas_id]' ");
                        $kelas = mysql_fetch_array($sql);
                       ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row[siswa_nis]; ?></td>
                        <td><?php echo $row[siswa_nama]; ?></td>
                        <td><?php echo $row[siswa_telp]; ?></td>
                        <!-- <td><?php if ($row[gender]=='L') { echo "Laki-laki"; }elseif ( $row[gender]=='P') { echo "Perempuan"; } ?></td> -->
                        <td><?php echo $row[siswa_email]; ?></td>
                        <td><?php echo $kelas[kelas_nama]; ?></td>
                        <!-- <td><?php if ($row[block]=='Y') { echo "<span class='label label-danger'>Blokir</span>";
                        }elseif ($row[block]=='N') { echo "<span class='label label-success'>Aktif</span>"; }  ?></td> -->

                        <td width="120px">
                          <div class="btn-group1">
                          <!-- <a href="#detail<?php echo $row[siswa_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-info" title="detail"><i class="fa fa-eye"></i></button></a> -->

                          <a href="#edit<?php echo $row[siswa_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-pencil"></i></button></a>
                          

                          <?php if ($row[block]=='Y') {?>
                          <a href="<?php echo $module; ?>&act=aktif&id=<?php echo $row[siswa_id]; ?>"><button type='button' class='btn btn-sm btn-success' title="Aktifkan"><i class="fa fa-check"></i></button>
                          <?php }elseif ($row[block]=='N') {?> 
                          <a href="#blokir<?php echo $row[siswa_id]; ?>" data-toggle="modal"><button type='button' class='btn btn-sm btn-danger' title="Blokir"><i class="fa fa-ban"></i></button></a>
                          <?php }  ?>
                        
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

<?php }else{ ?>

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Siswa</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                       <div style="padding-bottom: 10px;" align="right"><a href="#add" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Data Siswa</a></div>
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>NIS</b></th>
                        <th><b>Nama</b></th>
                        <th><b>Telepon</b></th>
                        <th><b>Email</b></th>
                        <th><b>Kelas</b></th>
                        <th width="100px"><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysql_query("SELECT * FROM siswa ");
                      while ($row = mysql_fetch_array($data)) {
                        $sql = mysql_query("SELECT * FROM kelas WHERE kelas_id='$row[kelas_id]'");
                        $kelas = mysql_fetch_array($sql);
                       ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['siswa_nis']; ?></td>
                        <td><?php echo $row['siswa_nama']; ?></td>
                        <td><?php echo $row['siswa_telp']; ?></td>
                        <td><?php echo $row['siswa_email']; ?></td>
                        <!-- <td><?php if ($row[gender]=='L') { echo "Laki-laki"; }elseif ( $row[gender]=='P') { echo "Perempuan"; } ?></td> -->
                        <td><?php echo $kelas['kelas_nama']; ?></td>
                        
                        <!-- <td><?php if ($row[block]=='Y') { echo "<span class='label label-danger'>Blokir</span>";
                        }elseif ($row[block]=='N') { echo "<span class='label label-success'>Aktif</span>"; }  ?></td> -->

                        <td width="120px">
                          <div class="btn-group1">
                          <!-- <a href="#detail<?php echo $row[siswa_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-info" title="detail"><i class="fa fa-eye"></i></button></a> -->

                          <a href="#edit<?php echo $row[siswa_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-pencil"></i></button></a>

                          <a href="#delete<?php echo $row[siswa_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></button></a>
                          
                          

                          <?php if ($row['block']=='Y') {?>
                          <a href="<?php echo $module; ?>&act=aktif&id=<?php echo $row[siswa_id]; ?>"><button type='button' class='btn btn-sm btn-success' title="Aktifkan"><i class="fa fa-check"></i></button>
                          <?php }elseif ($row['block']=='N') {?> 
                          <a href="#blokir<?php echo $row[siswa_id]; ?>" data-toggle="modal"><button type='button' class='btn btn-sm btn-danger' title="Blokir"><i class="fa fa-ban"></i></button></a>
                          <?php }  ?>
                        
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

<?php } ?>


            </div>
          </div>
        </div>


<!-- Tambah Data -->
    
     <div id="add" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header biru">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"><i class="fa fa-plus"></i> Tambah Data Siswa</h4>
                      </div>
                      <div class="modal-body">
                      <form method="POST" action="<?php echo $module; ?>&act=insert" enctype="multipart/form-data">
                      
                      <link rel="stylesheet" href="../../../assets/css/bootstrap-datetimepicker.min.css">
                      <script src="../../../assets/js/bootstrap-datetimepicker.min.js"></script>
                      <script src="../../../assets/js/custom.js"></script>


                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>NIS</label></div>
                          <div class="col-md-7">
                            <input type="text" class="form-control" name="nis"  required>
                          </div>
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Lengkap</label></div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="nama"  required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Username</label></div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="username"  required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Password</label></div>
                          <div class="col-md-8">
                            <input type="password" class="form-control" name="password">
                            
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Kelas</label></div>
                          <div class="col-md-4">
                            <select name="kelas_id" class="form-control selectlive" required>
                            <option value="">-pilih- </option>
                            <?php 
                            $data = mysql_query("SELECT * FROM kelas");
                            while ($kelas = mysql_fetch_array($data)) { ?>
                              <option value="<?php echo $kelas[kelas_id]; ?>"><?php echo $kelas[kelas_nama]; ?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Alamat</label></div>
                          <div class="col-md-8">
                            <textarea class="form-control" name="alamat" required></textarea>
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>No Telp</label></div>
                          <div class="col-md-5">
                            <input type="text" class="form-control" name="no_telp" required >
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Email</label></div>
                          <div class="col-md-6">
                            <input type="email" class="form-control" name="email" required >
                          </div>
                        </div>
                      </div>
                      
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                      </form> 
                    </div>
      </div>
     </div>
    <!-- End Tambah Data -->



    <!-- Detail Data -->
    <?php 
                      
                      $data = mysql_query("SELECT * FROM siswa ");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>
      <div id="detail<?php echo $row[siswa_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header biru-langit">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"><i class="fa fa-eye"></i> Detail Data Siswa</h4>
                      </div>
                      <div class="modal-body">

                      <div class="form-group">
                        <div class="row imgbacground" align="center">
                        
                        <img class="gambar" src="../image/siswa/<?php echo $row[picture]; ?>" alt="" width="30%">
                        <div class="jabatan"><b><?php echo $row[siswa_nama]; ?></b></div>
                        <div class="jabatan"><b>NIS : <?php echo $row[siswa_nis]; ?></b></div>
                        </div>
                      </div>

                      <div class="alert alert-info">
                        
                        <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Kelas</label></div>
                          <div class="col-md-8">
                            : <?php 
                             $kl = mysql_query("SELECT * FROM kelas WHERE kelas_id='$row[kelas_id]'");
                             $kelas = mysql_fetch_array($kl);
                             echo $kelas[kelas_nama]; ?>
                          </div>
                        </div>
                      </div>

                        <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Alamat</label></div>
                          <div class="col-md-8">
                            : <?php echo $row[siswa_alamat]; ?>
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>No Telp</label></div>
                          <div class="col-md-5">
                            : <?php echo $row[siswa_telp]; ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Email</label></div>
                          <div class="col-md-6">
                            : <?php echo $row[siswa_email]; ?>
                          </div>
                        </div>
                      </div>

                      </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
                      </div>
                    </div>
      </div>
     </div>
     <?php } ?>
    <!-- End detail Data -->


<!-- Edit Data -->
    <?php 
                      
                      $data = mysql_query("SELECT * FROM siswa, kelas WHERE siswa.kelas_id=kelas.kelas_id");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>       
      <div id="edit<?php echo $row[siswa_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header kuning">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"><i class="fa fa-pencil"></i> Edit Data Siswa</h4>
                      </div>
                      <div class="modal-body">
                      <form method="POST" action="<?php echo $module; ?>&act=update" enctype="multipart/form-data">
                      
                      
                     <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>NIS</label></div>
                          <div class="col-md-7">
                            <input type="hidden" name="id" value="<?php echo $row[siswa_id]; ?>">
                            <input type="text" class="form-control" name="nis" value="<?php echo $row[siswa_nis]; ?>" required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Lengkap</label></div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="nama" value="<?php echo $row[siswa_nama]; ?>" required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Username</label></div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="username" value="<?php echo $row[siswa_username]; ?>" required>
                          </div>
                        </div>
                      </div>

                       <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Password</label></div>
                          <div class="col-md-8">
                            <input type="password" class="form-control" name="password">
                            <p>Jika password tidak di ubah di kosongkan saja</p>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Kelas</label></div>
                          <div class="col-md-5">
                            <select name="kels" class="form-control selectlive" required>
                            <option value="<?php echo $row[kelas_id]; ?>"><?php echo $row[kelas_nama]; ?></option>
                           <?php 
                           $dat = mysql_query("SELECT * FROM kelas WHERE NOT kelas.kelas_nama = '$row[kelas_nama]'");
                           while ($kls = mysql_fetch_array($dat)) {
                            echo "<option value='$kls[kelas_id]'>$kls[kelas_nama]</option>";
                           }
                            ?> 
                            </select>
                          </div>
                        </div>
                      </div>
                                            
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Alamat</label></div>
                          <div class="col-md-8">
                            <textarea class="form-control" name="alamat" required><?php echo $row[siswa_alamat]; ?></textarea>
                          </div>
                        </div>
                      </div>

                      
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>No Telp</label></div>
                          <div class="col-md-5">
                            <input type="text" class="form-control" name="no_telp" required value="<?php echo $row[siswa_telp]; ?>">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Email</label></div>
                          <div class="col-md-6">
                            <input type="email" class="form-control" name="email" required value="<?php echo $row[siswa_email]; ?>">
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                      </div>
                      </form>
                    </div>
            </div>
          </div>
     </div>
     <?php } ?>
    <!-- End Edit Data -->


<!-- Hapus Data -->
    <?php 
                      
                      $data = mysql_query("SELECT * FROM siswa ");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>    
      <div id="delete<?php echo $row[siswa_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header merah">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"><i class="fa fa-trash"></i> Hapus Data Siswa</h4>
                      </div>
                      <div class="modal-body">
                      
                      <form method="POST" action="<?php echo $module; ?>&act=delete">
                      
                      <div class="alert alert-danger">
                      <h4><i class="icon fa fa-ban"></i> <b>Peringatan!</b></h4>
                      Apakah Anda ingin menghapus user <b><?php echo $row[siswa_nama]; ?></b> ? 
                      Jika user <b><?php echo $row[siswa_nama]; ?></b> di hapus, maka user <b><?php echo $row[siswa_nama]; ?></b> tidak akan bisa login kembali.  
                      </div>

                      <input type="hidden" name="id" value="<?php echo $row[siswa_id]; ?>">


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </div>
                      </form> 
                    </div>
      </div>
     </div>
     <?php } ?>
    <!-- End Hapus Data -->
        <?php } ?>  
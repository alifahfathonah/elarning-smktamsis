<?php
if (! session_id())session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
  $module="modul/mod_admin/admin_c.php?module=admin";
?>


	    <div class="page-head">
	      <h2 class="pull-left"><i class="fa fa-users"></i> User Admin</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="#" class="bread-current">User</a>
          <span class="divider">/</span> 
          <a href="media.php?module=admin" class="bread-current">Admin</a>
        </div>
        <div class="clearfix"></div>
	    </div>

	    <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Admin</div>
                  <div class="widget-icons pull-right">
                    <a href="dynamic-tables.html#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="dynamic-tables.html#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                  <div style="padding-bottom: 10px;" align="right"><a href="#add" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Data Admin</a></div>    
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Nama</b></th>
                        <th><b>Username</b></th>
                        <th><b>Alamat</b></th>
                        <th><b>No telp</b></th>
                        <th><b>Email</b></th>
                        <th><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysql_query("SELECT * FROM admin order by admin_id DESC");
                      while ($row = mysql_fetch_array($data)) {
                       ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['admin_nama']; ?></td>
                        <td><?php echo $row['admin_username']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['no_telp']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <!-- <td><?php if ($row[block]=='Y') {
                          echo "<span class='label label-danger'>Blokir</span>";
                        }elseif ($row[block]=='N') {
                          echo "<span class='label label-success'>Aktif</span>";
                        }  ?></td> -->

                        <td width="120px">
                          <div class="btn-group1">
                          <!-- <a href="#detail<?php echo $row[admin_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-info" title="detail"><i class="fa fa-eye"></i></button></a> -->

                          <a href="#edit<?php echo $row[admin_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-pencil"></i></button></a>
                          

                          <?php 
                          if ($_SESSION['idadmin']==$row['admin_id']) {
                            echo " ";
                          }else{?>
                           <?php if ($row[block]=='Y') {?>
                          <a href="<?php echo $module; ?>&act=aktif&id=<?php echo $row[admin_id]; ?>"><button type='button' class='btn btn-sm btn-success' title="Aktifkan"><i class="fa fa-check"></i></button>
                          <?php }elseif ($row[block]=='N') {?> 
                          <a href="#blokir<?php echo $row[admin_id]; ?>" data-toggle="modal"><button type='button' class='btn btn-sm btn-danger' title="Blokir"><i class="fa fa-ban"></i></button></a>
                          <?php }  ?>
                          <?php }?>
                        
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




<!-- Tambah Data -->
    
      <div id="add" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header biru">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"> <i class="fa fa-plus"></i> Tambah Data Admin</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="<?php echo $module; ?>&act=insert">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Lengkap</label></div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="nama" required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Username</label></div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="username" required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Password</label></div>
                          <div class="col-md-6">
                            <input type="password" class="form-control" name="password" required>
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
                            <input type="text" class="form-control" name="no_telp" required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Email</label></div>
                          <div class="col-md-6">
                            <input type="email" class="form-control" name="email" required>
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
                      
                      $data = mysql_query("SELECT * FROM admin ");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>
      <div id="detail<?php echo $row[admin_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      
          <div class="modal-dialog" style="width: 510px;">
            <div class="modal-content">
                      <div class="modal-header biru-langit">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"><i class="fa fa-eye"></i> Detail Data Admin</h4>
                      </div>
                      <div class="modal-body">
                      <div class="alert alert-info">
                        <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Lengkap</label></div>
                          <div class="col-md-8">
                            : <?php echo $row[admin_nama]; ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Username</label></div>
                          <div class="col-md-6">
                           : <?php echo $row[admin_username]; ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Alamat</label></div>
                          <div class="col-md-5">
                            : <?php echo $row[alamat]; ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>No Telp</label></div>
                          <div class="col-md-8">
                            : <?php echo $row[no_telp]; ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Email</label></div>
                          <div class="col-md-5">
                            : <?php echo $row[email]; ?>
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
    <!-- End Detail Data -->




<!-- Edit Data -->
    <?php 
                      
                      $data = mysql_query("SELECT * FROM admin ");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>    
      <div id="edit<?php echo $row[admin_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header kuning">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"><i class="fa fa-pencil"></i> Edit Data Admin</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="<?php echo $module; ?>&act=update">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Lengkap</label></div>
                          <div class="col-md-8">
                          <input type="hidden" name="id" value="<?php echo $row[admin_id]; ?>">
                            <input type="text" class="form-control" name="nama" value="<?php echo $row[admin_nama]; ?>" required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Username</label></div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="username" value="<?php echo $row[admin_username]; ?>" required>
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
                          <div class="col-md-4"><label>Alamat</label></div>
                          <div class="col-md-8">
                            <textarea class="form-control" name="alamat" required><?php echo $row[alamat]; ?></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>No Telp</label></div>
                          <div class="col-md-5">
                            <input type="text" class="form-control" name="no_telp" value="<?php echo $row[no_telp]; ?>" required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Email</label></div>
                          <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="<?php echo $row[email]; ?>" required>
                          </div>
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
     <?php } ?>
    <!-- End Edit Data -->

<!-- Blokir Data -->
    <?php 
                      
                      $data = mysql_query("SELECT * FROM admin ");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>    
      <div id="blokir<?php echo $row[admin_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header merah">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"><i class="fa fa-ban"></i> Blokir Data Admin</h4>
                      </div>
                      <div class="modal-body">
                      
                      <form method="POST" action="<?php echo $module; ?>&act=blokir">
                      
                      <div class="alert alert-danger">
                      <h4><i class="icon fa fa-ban"></i> <b>Peringatan!</b></h4>
                      Apakah Anda ingin memblokir user <b><?php echo $row[admin_nama]; ?></b> ? 
                      Jika user <b><?php echo $row[admin_nama]; ?></b> di blokir, maka user <b><?php echo $row[admin_nama]; ?></b> tidak akan bisa login kembali.  
                      </div>

                      <input type="hidden" name="id" value="<?php echo $row[admin_id]; ?>">


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" class="btn btn-danger">Blokir</button>
                      </div>
                      </form> 
                    </div>
      </div>
     </div>
     <?php } ?>
    <!-- End Blokir Data -->
        <?php } ?>  
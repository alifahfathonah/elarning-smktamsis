<?php
if (!session_id())session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
  $module="modul/mod_profil/profil_c.php?module=profil";
?>


	    <div class="page-head">
	      <h2 class="pull-left"><i class="fa fa-user"></i> Profil</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>>
          <span class="divider">/</span> 
          <a href="media.php?module=profil" class="bread-current">Profil</a>
        </div>
        <div class="clearfix"></div>
	    </div>

	    <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Profil</div>
                  <div class="widget-icons pull-right">
                    <a href="dynamic-tables.html#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                  <div style="padding-bottom: 10px;" align="right"></div>    
             
                  <?php 
                  $sql = mysql_query("SELECT * FROM admin WHERE admin_id = '$_SESSION[idadmin]' ");
                  $row = mysql_fetch_array($sql);
                   ?>

                  <div class="alert alert-info">
                        <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Lengkap</label></div>
                          <div class="col-md-8">
                            : <?php echo $row['admin_nama']; ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Username</label></div>
                          <div class="col-md-6">
                           : <?php echo $row['admin_username']; ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Alamat</label></div>
                          <div class="col-md-8">
                            : <?php echo $row['alamat']; ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>No Telepon</label></div>
                          <div class="col-md-5">
                            : <?php echo $row['no_telp']; ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Email</label></div>
                          <div class="col-md-6">
                            : <?php echo $row['email']; ?>
                          </div>
                        </div>
                      </div>
                      </div>


                  </div>

                  </div>
                  <div class="widget-foot">
                    <a href="#edit" class="btn btn-warning" data-toggle="modal"><i class="fa fa-pencil"></i> Edit</a>
                  </div>
                </div>

            </div>
            </div>
          </div>
        </div>




<!-- Edit Data -->                  

      <div id="edit" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header kuning">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title-putih"><i class="fa fa-pencil"></i> Edit Data Admin</h4>
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
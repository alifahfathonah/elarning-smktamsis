<?php
session_start();

if (empty($_SESSION['nip']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = '../../index.php';</script>";
}
    else{
include '../system/tgl_indo.php';
$module="modul/mod_profil/profil_c.php?module=profil";

$sql = mysql_query("SELECT * FROM guru WHERE guru_id = '$_SESSION[id_guru]' ");
$row = mysql_fetch_array($sql);

?>

      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-user"></i> Profil</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=profil" class="bread-current"> Profil</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

             <!-- <div class="widget">
                <div class="widget-head">
                  <div class="widget-icons pull-right"> 
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                  <img width="100%" src="../image/guru/<?php echo $row[picture]; ?>">
              
              
                  </div>
                  </div>
                  <div class="widget-foot"> -->
                    <!-- Footer goes here
                  </div>
                
                </div>

            </div> -->

            <div class="col-md-3"></div>            
            <div class="col-md-6">            
             <div class="widget">
                <div class="widget-head"> Data Profil
                  <div class="widget-icons pull-right"> 
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                  <div class="alert alert-info">

                    <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>NIP</label></div>
                          <div class="col-md-8">
                            : <?php echo $row[guru_nip]; ?>
                          </div>
                        </div>
                      </div>

                    <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama</label></div>
                          <div class="col-md-8">
                            : <?php echo $row[guru_nama]; ?>
                          </div>
                        </div>
                      </div>

                       <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Alamat</label></div>
                          <div class="col-md-8">
                            : <?php echo $row[guru_alamat]; ?>
                          </div>
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>No Telepon</label></div>
                          <div class="col-md-5">
                            : <?php echo $row[guru_telp]; ?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Email</label></div>
                          <div class="col-md-6">
                            : <?php echo $row[guru_email]; ?>
                          </div>
                        </div>
                      </div>

                     
              
              
                  </div>
                  </div>
                  <div class="widget-foot">
                    <div class="row">
                      <div class="col-md-1">
                        <a href="#edit" data-toggle="modal"><button class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</button></a>
                      </div>
                    </div>

                  </div>
                
                </div>

            </div>




            </div>
          </div>
        </div>


<!-- EDIT DATA  -->
      <div id="edit" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header kuning">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"><i class="fa fa-pencil"></i> Edit Data Guru</h4>
                      </div>
                      <div class="modal-body">
                      <form method="POST" action="<?php echo $module; ?>&act=update" enctype="multipart/form-data">
                      
                      <link rel="stylesheet" href="../../../assets/css/bootstrap-datetimepicker.min.css">
                      <script src="../../../assets/js/bootstrap-datetimepicker.min.js"></script>
                      <script src="../../../assets/js/custom.js"></script>


                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-3"><label>NIP</label></div>
                          <div class="col-md-7">
                            <input type="hidden" name="id" value="<?php echo $row[guru_id]; ?>">
                            <input type="text" readonly class="form-control" name="nip" value="<?php echo $row[guru_nip]; ?>" required>
                          </div>
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-3"><label>Nama Lengkap</label></div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="nama" value="<?php echo $row[guru_nama]; ?>" required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-3"><label>Username</label></div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="username" value="<?php echo $row[guru_username]; ?>" required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-3"><label>Password</label></div>
                          <div class="col-md-7">
                            <input type="password" class="form-control" name="password">
                            <p>Jika password tidak di ubah di kosongkan saja</p>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-3"><label>Alamat</label></div>
                          <div class="col-md-8">
                            <textarea class="form-control" name="alamat" required><?php echo $row[guru_alamat]; ?></textarea>
                          </div>
                        </div>
                      </div>

                      

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-3"><label>No Telepon</label></div>
                          <div class="col-md-5">
                            <input type="text" class="form-control" name="no_telp" required value="<?php echo $row[guru_telp]; ?>">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-3"><label>Email</label></div>
                          <div class="col-md-6">
                            <input type="email" class="form-control" name="email" required value="<?php echo $row[guru_email]; ?>">
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

    <!-- End Edit Data -->



<?php } ?>
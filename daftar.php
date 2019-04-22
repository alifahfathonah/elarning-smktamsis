<?php include 'system/koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Register | Ujian Online smk tamansiswa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Font awesome icon -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
  <!-- font awesome -->
  <link rel="stylesheet" href="assets/css/font-awesome.css">
  <!-- jQuery UI -->
  <link rel="stylesheet" href="assets/css/jquery-ui.css"> 
  <!-- Calendar -->
  <link rel="stylesheet" href="assets/css/fullcalendar.css">
  <!-- prettyPhoto -->
  <link rel="stylesheet" href="assets/css/prettyPhoto.css">  
  <!-- Star rating -->
  <link rel="stylesheet" href="assets/css/rateit.css">
  <!-- Date picker -->
  <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
  <!-- CLEditor -->
  <link rel="stylesheet" href="assets/css/jquery.cleditor.css">  
  <!-- Data tables -->
  <link rel="stylesheet" href="assets/css/jquery.dataTables.css">
  <!-- Bootstrap toggle -->
  <link rel="stylesheet" href="assets/css/jquery.onoff.css">
  <!-- Main stylesheet -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- Widgets stylesheet -->
  <link href="assets/css/widgets.css" rel="stylesheet">   
  
  <script src="assets/js/respond.min.js"></script>
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Favicon -->
<link rel="shortcut icon" href="assets/img/favicon/vgri.png">
</head>

<body>

<div class="admin-form" style="max-width: 500px;">
  <div class="container">
    <div class="row">
    <div class="col-md-12">
          <!-- Logo. -->
          <div class="logo" align="center">
            <h1>Ujian <span class="bold">Online</span></h1>
            <p class="meta">SMA PGRI 1 Temanggung</p>
          </div>
          <!-- Logo ends -->
        </div>
      <div class="col-lg-12">
        <!-- Widget starts -->
            <div class="widget wred">
              <div class="widget-head">
                <i class="fa fa-lock"></i> Register 
              </div>
              <div class="widget-content">
                <div class="padd">
                  
                  <form class="form-horizontal" method="POST" action="register.html" enctype="multipart/form-data">
                    <!-- Registration form starts -->
                                      <!-- Name -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" >NIS</label>
                                            <div class="col-lg-6">
                                              <input type="text" class="form-control"  name="nis" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-3" >Nama Lengkap</label>
                                            <div class="col-lg-7">
                                              <input type="text" class="form-control" name="nama" required >
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-3" >Username</label>
                                            <div class="col-lg-7">
                                              <input type="text" required class="form-control" name="username">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-3" >Password</label>
                                            <div class="col-lg-7">
                                              <input type="password" required class="form-control" name="password">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-3">Kelas</label>
                                            <div class="col-lg-4">                               
                                                <select class="form-control" required name="kelas">
                                                <option value="0">-Pilih-</option>
                                                <?php 
                                                $sql = mysql_query("SELECT * FROM kelas");
                                                while ($row = mysql_fetch_array($sql)) { ?>
                                                  <option value="<?php echo $row['id_kelas']; ?>"><?php echo $row['nama_kelas']; ?></option>
                                                <?php }
                                                 ?>

                                                </select>  
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-3" >Alamat</label>
                                            <div class="col-lg-8">
                                              <textarea class="form-control" required name="alamat"></textarea>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-3" >Tempat Lahir</label>
                                            <div class="col-lg-5">
                                              <input type="text" class="form-control" required name="tempat_lahir">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="col-md-3"><label>Tanggal Lahir</label></div>
                                            <div class="col-md-5">
                                            
                                              <div id="tanggal" class="input-append input-group dtpicker">
                                              <input data-format="yyyy-MM-dd" readonly type="text" name="tgl_lahir" class="form-control" value="">
                                              <span class="input-group-addon add-on">
                                              <i data-time-icon="fa fa-times" data-date-icon="fa fa-calendar"></i>
                                              </span>
                                            </div>
                                          </div>
                                        </div>
                                          
                                          <div class="form-group">
                                            <label class="control-label col-lg-3">Jenis Kelamin</label>
                                            <div class="col-lg-5">                               
                                                <select class="form-control" name="jk" required>
                                                <option value="0">-Pilih-</option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                                </select>  
                                            </div>
                                          </div>                                           
                                          
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" >Agama</label>
                                            <div class="col-lg-5">
                                              <input type="text" class="form-control" name="agama" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-3" >Nama Ayah</label>
                                            <div class="col-lg-7">
                                              <input type="text" class="form-control" name="nama_ayah" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-3" >Nama Ibu</label>
                                            <div class="col-lg-7">
                                              <input type="text" class="form-control" name="nama_ibu" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-3" >Email</label>
                                            <div class="col-lg-6">
                                              <input type="email" class="form-control" name="email" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-3" >No Telp</label>
                                            <div class="col-lg-6">
                                              <input type="text" class="form-control" name="no_telp" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-3" >Foto</label>
                                            <div class="col-lg-9">
                                              <input type="file" class="btn btn-default" name="fupload" required>
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <div class="col-lg-9 col-lg-offset-3">
											  
                                              <button type="submit" class="btn btn-sm btn-info">Register</button>
                                              <button type="reset" class="btn btn-sm btn-default">Reset</button>
                                            </div>
                                          </div>
                  </form>

                </div>
              </div>
                <div class="widget-foot">
                  Already Registred? <a href="ujian-online-sma-pgri-1-temanggung.html">Login</a>
                </div>
            </div>  
      </div>
    </div>
  </div> 
</div>
	
<script src="assets/js/jquery.js"></script> <!-- jQuery -->
<script src="assets/js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="assets/js/jquery-ui.min.js"></script> <!-- jQuery UI -->
<script src="assets/js/moment.min.js"></script> <!-- Moment js for full calendar -->
<script src="assets/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="assets/js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="assets/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->
<script src="assets/js/jquery.slimscroll.min.js"></script> <!-- jQuery Slim Scroll -->
<script src="assets/js/jquery.dataTables.min.js"></script> <!-- Data tables -->

<!-- jQuery Flot -->
<script src="assets/js/excanvas.min.js"></script>
<script src="assets/js/jquery.flot.js"></script>
<script src="assets/js/jquery.flot.resize.js"></script>
<script src="assets/js/jquery.flot.pie.js"></script>
<script src="assets/js/jquery.flot.stack.js"></script>

<!-- jQuery Notification - Noty -->

<script src="assets/js/themes/default.js"></script> <!-- jQuery Notify -->
<script src="assets/js/layouts/bottom.js"></script> <!-- jQuery Notify -->
<script src="assets/js/layouts/topRight.js"></script> <!-- jQuery Notify -->
<script src="assets/js/layouts/top.js"></script> <!-- jQuery Notify -->
<!-- jQuery Notification ends -->

<script src="assets/js/sparklines.js"></script> <!-- Sparklines -->
<script src="assets/js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="assets/js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<script src="assets/js/jquery.onoff.min.js"></script> <!-- Bootstrap Toggle -->
<script src="assets/js/filter.js"></script> <!-- Filter for support page -->
<script src="assets/js/custom.js"></script> <!-- Custom codes -->
<script src="assets/js/charts.js"></script> <!-- Charts & Graphs -->

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssK8gJMLyx%2fuK2iOJbhG%2fe1PTE1a75zIJNDTOrlnUECyLle7Sv2QKNpWDJZ13wjMYqe%2bFw9eKDM3DbnQ1bJuBB4F7VXUODuRmV3MWgkooDS9kY44%2b4s%2fMd6nc%2bYKRstp2bQN5JCbEt9w8jRHaTFpP6%2fMPWJwz8EcL77dV1qLz3Mm%2fvQwDlY%2fDiQ8f%2bFmHOeOuYRJQBdI0Ls1iTnS8FqaAIllZbiY161qiIAFngiUVfblon70Ni8u9faKOE5K8HqcKx6NRi7HvTCGRwTKqbpFA9OixyLIPmXpYtlId5yExzcuPUvQ9uPyDIBrHOWzY8oWHYDGc9w%2fghe8T8mxYEJ0zpiwZv9t00TGAcPcTnOCZarFvCbEki%2bIWp4%2bI5HJSZG9uXORMmnxqBNI5qL51ky0nJWzPHMvZs5xTJ8zPmGIzia5uZxNufhrK0DpgIvVk0BASZo34rsEW0BjqgZFC3JmpxPy8vycXrVnSdm1%2bj3j9tcr0gvns4OrQC2EtcBPMNJL1frhT%2biadyxALoQP0s6pAaZ2g%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>		
</body>
</html>
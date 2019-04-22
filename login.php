<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Login - E-Learning smk tamansiswa jetis</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!-- Stylesheets -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Font awesome icon -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
  <!-- font awesome --> 
  <link rel="stylesheet" href="assets/css/font-awesome.css">
  <link href="assets/css/style.css" rel="stylesheet">
  
  <script src="assets/js/respond.min.js"></script>
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <!-- <link rel="shortcut icon" href="assets/img/favicon/vgri.png"> -->
</head>

<body>

<!-- Form area -->
<div class="admin-form">
  <div class="container">
<div class="row">
  
  <div class="col-md-12">
          <!-- Logo. -->
          <div class="logo" align="center">
            <h1><span class="bold">E-Learning</span></h1>
            <p class="meta">smk tamansiswa jetis</p>
          </div>
          <!-- Logo ends -->
        </div>
</div>
    <div class="row">
      <div class="col-md-12">
        <!-- Widget starts -->
            <div class="widget worange">
              <!-- Widget head -->
              <div class="widget-head">
                <i class="fa fa-lock"></i> Silahkan Login
              </div>

              <div class="widget-content">
                <div class="padd">
                  <!-- Login form -->
                  <form class="form-horizontal" method="POST" action="cek_login.php">
                    <!-- Username -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputUsername">Username</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="username" required placeholder="Username">
                      </div>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword">Password</label>
                      <div class="col-lg-9">
                        <input type="password" class="form-control" required name="password" placeholder="Password">
                      </div>
                    </div>
                    <!-- Remember me checkbox and sign in button -->
                
                <div class="col-lg-9 col-lg-offset-3">
							<button type="submit" class="btn btn-info btn-sm">Login</button>
						</div>
                    <br />
                  </form>
				  
				</div>
                </div>
              
                <div class="widget-foot">
                  <!-- Belum Mendaftar? <a href="daftar-ujian-online-sma-pgri-1-temanggung.html">Daftar disini</a> -->
                </div>
            </div>  
      </div>
    </div>
  </div> 
</div>
	
		

<!-- JS -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/dev/AdminLTE/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Apr 2019 02:46:01 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Elearning | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="themes/adminlte/maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="themes/adminlte/code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="themes/adminlte/adminlte.io/themes/dev/adminlte/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="themes/adminlte/adminlte.io/themes/dev/adminlte/plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>E-</b>Learning</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login SMK Tamansiswa Jetis</p>

      <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
        <div class="input-group mb-3">
          <input name="username" type="text" class="form-control" placeholder="Username" required="">
          <div class="input-group-append">
              <span class="fa fa-user input-group-text"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password" required="">
          <div class="input-group-append">
              <span class="fa fa-lock input-group-text"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="themes/adminlte/adminlte.io/themes/dev/adminlte/   plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="themes/adminlte/adminlte.io/themes/dev/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="themes/adminlte/adminlte.io/themes/dev/adminlte/plugins/iCheck/icheck.min.js"></script>
</body>

<!-- Mirrored from adminlte.io/themes/dev/AdminLTE/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Apr 2019 02:46:01 GMT -->
</html>

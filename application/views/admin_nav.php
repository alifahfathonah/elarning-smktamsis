<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <div class="navbar-nav ml-auto">
      <a href="<?php echo base_url() ?>admin/profil" class="btn btn-default mr-2">Admin</a>
      <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-default">Logout</a>
      
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fa fa-th-large"></i>
      </a>
    
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>admin/beranda" class="brand-link">
      <img src="<?php echo base_url()?>/themes/adminlte/adminlte.io/themes/dev/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E-Learning</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="<?php echo base_url() ?>admin/beranda" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url() ?>admin/profil" class="nav-link">
              <i class="nav-icon fa fa-user-circle-o"></i>
              <p>
                Administrator
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                User
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/data-admin" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/data-guru" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/data-siswa" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-graduation-cap"></i>
              <p>
                Akademik
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/kelas" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/kelas')?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Pelajaran</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
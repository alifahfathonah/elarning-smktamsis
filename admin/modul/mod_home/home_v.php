<!-- CSS -->

<style type="text/css">
.well:hover {
    box-shadow: 0px 2px 10px rgb(190, 190, 190) !important;
}
a {
    color: #666;
}
</style>

<!-- CSS/ -->





<?php
if (! session_id())session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = '../../index.php';</script>";
}
    else{

?>



	    <div class="page-head">
	      <h2 class="pull-left"><i class="fa fa-home"></i> Dashboard</h2>
        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="fa fa-home"></i> Home</a> 
          <span class="divider">/</span> 
          <a href="index.html#" class="bread-current">Dashboard</a>
        </div>
        <div class="clearfix"></div>
	    </div>

	    <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Quick Link</div>
                  <div class="widget-icons pull-right">
                    <a href="widgets2.html#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="widgets2.html#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">





                  <div class="padd statement">
                    
                    <div class="row">

                      <!-- <div class="col-md-3">
                        <a href="media.php?module=ta">
                          <div class="well" align="center">
                          <h1><i class="fa fa-calendar"></i></h1>
                          <b><p>Tahun Ajaran</p></b>
                        </div>
                        </a>
                      </div> -->

                      <div class="col-md-3">
                        <a href="media.php?module=kelas">
                          <div class="well" align="center">
                          <h1><i class="fa fa-users"></i></h1>
                          <b><p>Kelas</p></b>
                        </div>
                        </a>
                      </div>

                      <div class="col-md-3">
                        <a href="media.php?module=mapel">
                          <div class="well" align="center">
                          <h1><i class="fa fa-file-text"></i></h1>
                          <b><p>Mata Pelajaran</p></b>
                        </div>
                        </a>
                      </div>

                      <!-- <div class="col-md-3">
                        <a href="media.php?module=detail_mapel">
                          <div class="well" align="center">
                          <h1><i class="fa fa-file-text"></i></h1>
                          <b><p>Detail Mata Pelajaran</p></b>
                        </div>
                        </a>
                      </div>
                    
                    </div> -->

                    <div class="row">
                      
                       <div class="col-md-3">
                        <a href="media.php?module=siswa">
                          <div class="well" align="center">
                          <h1><i class="fa fa-user"></i></h1>
                          <b><p>Siswa</p></b>
                        </div>
                        </a>
                      </div>

                      <div class="col-md-3">
                        <a href="media.php?module=guru">
                          <div class="well" align="center">
                          <h1><i class="fa fa-user"></i></h1>
                          <b><p>Guru</p></b>
                        </div>
                        </a>
                      </div>

                      <div class="col-md-3">
                        <a href="media.php?module=admin">
                          <div class="well" align="center">
                          <h1><i class="fa fa-user"></i></h1>
                          <b><p>Admin</p></b>
                        </div>
                        </a>
                      </div>

                      <div class="col-md-3">
                        <a href="media.php?module=profil">
                          <div class="well" align="center">
                          <h1><i class="fa fa-user"></i></h1>
                          <b><p>Profil</p></b>
                        </div>
                        </a>
                      </div>
                      
                    </div>

                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  
            </div>

         <!--    <div class="col-md-3">
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Siswa</div>
                  <div class="widget-icons pull-right">
                    <a href="widgets3.html#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="widgets3.html#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd scroll-chat">
                    <ul class="recent">


                      <li>
                        <div class="avatar pull-left">
                          <img src="../assets/img/user.jpg" alt="">
                        </div>

                        <div class="recent-content">
                          
                          <div> Nama  : Xxxxxx</div>
                          <br>
                          <div>Kelas : XXX</div>
                          <br>

                          <div class="btn-group">
                            <button class="btn btn-xs btn-primary" title="Terima"><i class="fa fa-check"></i></button>
                            <button class="btn btn-xs btn-info" title="Detail"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-xs btn-danger" title="Blokir"><i class="fa fa-times"></i></button>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </li>

                    </ul>
                    
                  </div>
                  <div class="widget-foot">
                    
                  </div>
                </div>
              </div>  
            </div> -->


            </div>
          </div>
        </div>

        <?php } ?>
<?php
session_start();

if (empty($_SESSION['nip']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = '../../index.php';</script>";
}
    else{

?>

<style type="text/css">
.well:hover {
    box-shadow: 0px 2px 10px rgb(190, 190, 190) !important;
}
a {
    color: #666;
}
</style>


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
                  <div class="padd">


                 <div class="row">

                      <!-- <div class="col-md-3">
                        <a href="media.php?module=jadwal">
                          <div class="well" align="center">
                          <h1><i class="fa fa-calendar"></i></h1>
                          <b><p>Jadwal Ujian</p></b>
                        </div>
                        </a>
                      </div> -->

                      <div class="col-md-3">
                        <a href="media.php?module=materi">
                          <div class="well" align="center">
                          <h1><i class="fa fa-file-text"></i></h1>
                          <b><p>Materi</p></b>
                        </div>
                        </a>
                      </div>

                      <div class="col-md-3">
                        <a href="media.php?module=tugas">
                          <div class="well" align="center">
                          <h1><i class="fa fa-pencil"></i></h1>
                          <b><p>Tugas</p></b>
                        </div>
                        </a>
                      </div>

                      <!-- <div class="col-md-3">
                        <a href="media.php?module=hasil&act=daftar_nilai">
                          <div class="well" align="center">
                          <h1><i class="fa fa-file-text"></i></h1>
                          <b><p>Nilai Hasil Ujian</p></b>
                        </div>
                        </a>
                      </div>
                    
                    </div> -->

                    <div class="row">
                      
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

        


            </div>
          </div>
        </div>

        <?php } ?>
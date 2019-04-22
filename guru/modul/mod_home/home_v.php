<?php
if (!session_id())session_start();

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
                   
                  <?php 
                  error_reporting (E_ALL ^ E_WARNING||E_NOTICE);
                  $sql = mysql_query("SELECT * FROM guru WHERE guru_id= '$_SESSION[id_guru]' ");
                  $ses = mysql_fetch_array($sql);

                  if ($ses[position]=='Kepala Lab Komputer' || $ses[position]=='Ka Lab Komputer') { ?>
                    
                <div class="row">

                      <div class="col-md-3">
                        <a href="media.php?module=group_soal">
                          <div class="well" align="center">
                          <h1><i class="fa fa-file-text"></i></h1>
                          <b><p>Group Soal Ujian</p></b>
                        </div>
                        </a>
                      </div>

                      <div class="col-md-3">
                        <a href="media.php?module=formula">
                          <div class="well" align="center">
                          <h1><i class="fa fa-random"></i></h1>
                          <b><p>Formula LCG</p></b>
                        </div>
                        </a>
                      </div>

                      <div class="col-md-3">
                        <a href="media.php?module=jadwla">
                          <div class="well" align="center">
                          <h1><i class="fa fa-file-text"></i></h1>
                          <b><p>Jadwal Ujian</p></b>
                        </div>
                        </a>
                      </div>

                      <div class="col-md-3">
                        <a href="media.php?module=jadwalujian">
                          <div class="well" align="center">
                          <h1><i class="fa fa-file-text"></i></h1>
                          <b><p>Soal & Jadwal Ujian</p></b>
                        </div>
                        </a>
                      </div>
                    
                    </div>

                    <div class="row">

                <?php 
                $id_guru = $_SESSION['id_guru'];
                $sql = mysql_query("SELECT * FROM detail_lesson WHERE teacher_id = '$id_guru' GROUP BY lesson_id ORDER BY lesson_id ASC");
                while ($data = mysql_fetch_array($sql)) { 
                $pel = mysql_query("SELECT * FROM pelajaran WHERE pelajaran_id = '$data[pelajaran_id]'");
                $pljr   = mysql_fetch_array($pel);
                ?>

                      <div class="col-md-3">
                        <a href="media.php?module=nilai&id=<?php echo $pljr[pelajaran_id]; ?>">
                          <div class="well" align="center">
                          <h1><i class="fa fa-file-text"></i></h1>
                          <b><p>Nilai Mata Pelajaran <?php echo $pljr[pelajaran_nama]; ?></p></b>
                        </div>
                        </a>
                      </div>
                    
                    <?php } ?>

                      <div class="col-md-3">
                        <a href="media.php?module=profil">
                          <div class="well" align="center">
                          <h1><i class="fa fa-user"></i></h1>
                          <b><p>Profil</p></b>
                        </div>
                        </a>
                      </div>

                    </div>


                 <?php }else{ ?>

                 <div class="row">

                      <div class="col-md-3">
                        <a href="media.php?module=materi">
                          <div class="well" align="center">
                          <h1><i class="fa fa-file-text"></i></h1>
                          <b><p>Data Materi</p></b>
                        </div>
                        </a>
                      </div>

                      <div class="col-md-3">
                        <a href="media.php?module=tugas">
                          <div class="well" align="center">
                          <h1><i class="fa fa-file-text"></i></h1>
                          <b><p>Data Soal</p></b>
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

                   <!--  <div class="row">

                    <?php 
                $id_guru = $_SESSION['id_guru'];
                // $sql = mysql_query("SELECT * FROM detail_lesson WHERE teacher_id = '$id_guru' GROUP BY lesson_id ORDER BY lesson_id ASC");
                // while ($data = mysql_fetch_array($sql)) 
                { 
                $pel = mysql_query("SELECT * FROM pelajaran WHERE pelajaran_id = '$data[pelajaran_id]'");
                $pljr   = mysql_fetch_array($pel);
                ?>

                      <div class="col-md-3">
                        <a href="media.php?module=nilai&id=<?php echo $pljr[pelajaran_id]; ?>">
                          <div class="well" align="center">
                          <h1><i class="fa fa-file-text"></i></h1>
                          <b><p>Nilai Mata Pelajaran <?php echo $pljr[pelajaran_nama]; ?></p></b>
                        </div>
                        </a>
                      </div>
                    
                    <?php } ?>

                    </div> -->


                 <?php } ?>



                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  
            </div>

            <!-- <div class="col-md-3">
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
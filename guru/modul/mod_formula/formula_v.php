<?php
session_start();

if (empty($_SESSION['nip']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
  $module="modul/mod_formula/formula_c.php?module=formula";


?>


<?php 
switch ($_GET['act']) {
 default: 
 ?>

      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-random"></i> Formula Linear Congruential Generator</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=formula" class="bread-current">Formula Linear Congruential Generator</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Formula Linear Congruential Generator</div>
                  <div class="widget-icons pull-right">
                    <a href="dynamic-tables.html#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="dynamic-tables.html#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                  <div style="padding-bottom: 10px;" align="right"><a href="#add" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Data Linear Congruential Generator</a></div>    
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Nama Formula LCG</b></th>
                        <th><b>variabel a</b></th>
                        <th><b>variabel b</b></th>
                        <th><b>variabel m</b></th>
                        <th><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysql_query("SELECT * FROM formula_lcg ");
                      while ($row = mysql_fetch_array($data)) {
                        
                       ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row[formula_name]; ?></td>
                        <td><?php echo $row[a]; ?></td>
                        <td><?php echo $row[b]; ?></td>
                        <td><?php echo $row[m]; ?></td>

                        <td width="120px">
                          <div class="btn-group1">

                          <a href="#hapus<?php echo $row[formula_lcg_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i> </button></a>


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
                        <h4 class="title-putih"> <i class="fa fa-plus"></i> Tambah Data Formula Linear Congruential Generator</h4>
                      </div>
                      <div class="modal-body">
                      <form method="GET" action="">
                        <input type="hidden" name="module" value="formula">
                        <input type="hidden" name="act" value="implementasi">

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Pilih Group Soal</label></div>
                          <div class="col-md-5">
                          <select name="gs" class="form-control selectlive" required>
                              <option value=""> -Pilih- </option>
                              <?php 
                               $sql = mysql_query(" SELECT * FROM question_group");
                               while ($ta = mysql_fetch_array($sql)) { ?>
                              <option value="<?php echo $ta[question_group_id]; ?>"><?php echo $ta[question_group_name]; ?></option>
                             <?php } ?>
                          </select>

                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Jumlah Soal</label></div>
                          <div class="col-md-5">
                          <select name="jml_soal" class="form-control selectlive" required>
                              <option value=""> -Pilih- </option>
                              <option value="50">50  Soal</option>
                              <option value="100">100 Soal</option>
                          </select>

                          </div>
                        </div>
                      </div>
                     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" class="btn btn-primary">Lanjut Pengujian</button>
                      </div>
                      </form>
                      
                    </div>
      </div>
     </div>
    <!-- End Tambah Data -->


<!-- Edit Data -->
    <?php 
    $data = mysql_query("SELECT * FROM formula_lcg");
    while ($row = mysql_fetch_array($data)) {
           
            
    ?>    
      <div id="edit<?php echo $row[lcg_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header kuning">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title-putih"><i class="fa fa-pencil"></i> Edit Data Formula Linear Congruential Generator</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="<?php echo $module; ?>&act=update">
                      

 <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Formula LCG</label></div>
                          <div class="col-md-6">
                            <input type="hidden" name="id" value="<?php echo $row[lcg_id]; ?>">
                            <input type="text" class="form-control" name="nama" value="<?php echo $row[formula_name]; ?>">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Variabel a</label></div>
                          <div class="col-md-3">
                            <input type="number" class="form-control" name="a" value="<?php echo $row[a
                              ]; ?>" >
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Variabel b</label></div>
                          <div class="col-md-3">
                            <input type="number" class="form-control" name="b" value="<?php echo $row[b]; ?>">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Variabel m</label></div>
                          <div class="col-md-3">
                            <input type="number" class="form-control" name="m" value="<?php echo $row[m]; ?>">
                          </div>
                        </div>
                      </div>
                     
                      
                      </div>
                       <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                      </div>
                      </form>
                    </div>
      </div>
     </div>
    <!-- End Edit Data -->
<?php } ?>

<!-- Blokir Data -->

    <?php 
                      
                      $data = mysql_query("SELECT * FROM formula_lcg ");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>    
      <div id="hapus<?php echo $row[formula_lcg_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header merah">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title-putih"><i class="fa fa-trash"></i> Hapus Data Formula Linear Congruential Generator</h4>
                      </div>
                      <div class="modal-body">
                      
                      <form method="POST" action="<?php echo $module; ?>&act=delete">
                      
                      <div class="alert alert-danger">
                      <h4><i class="icon fa fa-ban"></i> <b>Peringatan!</b></h4>
                      Apakah Anda ingin menghapus data formula <b><?php echo $row[formula_name]; ?></b> ?
                      </div>

                      <input type="hidden" name="id" value="<?php echo $row[formula_lcg_id]; ?>">


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </div>
                      </form> 
                    </div>
      </div>
     </div>
     <?php } ?>





 <?php 
break;
case 'implementasi':
 $id_gs = $_GET[gs];
 $jml_soal = $_GET[jml_soal];

 $sql= mysql_query("SELECT count(question_id) FROM question WHERE question_group_id = '$id_gs' ");
 $jml = mysql_fetch_array($sql);

 if ($jml_soal > $jml[0]) {
   echo "<script>alert('Maaf! Jumlah Soal yang diinputkan melebihi jumlah soal yang ada di group soal, mohon harap di cek kembali.'); window.location = 'media.php?module=formula';</script>";
 }
 ?>

<div class="page-head">
        <h2 class="pull-left"><i class="fa fa-random"></i> Pengujian Formula LCG</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="media.php?module=formula" class="bread-current">Formula LCG</a>
        </div>

        <div class="clearfix"></div>

      </div>

<div class="matter">
        <div class="container">

          <!-- Table -->

            <div class="row">

              <div class="col-md-12">

                <div class="widget">

                <div class="widget-head">
                  <div class="pull-left">Data Soal</div>
                  <div class="widget-icons pull-right">
                  </div>  
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
          
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
              <thead>
              <tr>
                <th>Nomor Soal</th>
                <th>Soal</th>
                
              </tr>
              </thead>
              <tbody>
<?php 
$no = 1 ;
$qry = mysql_query("SELECT * FROM question WHERE question_group_id= '$id_gs' LIMIT $jml_soal ");
while ($data = mysql_fetch_array($qry)) {
 ?>
              <tr>
                <td width="10%"><?php echo $no; ?></td>
                <td><?php echo $data[question]; ?></td>
              </tr>  
<?php $no++; } ?>
              </tbody>
            </table>
          </div>
          
                    <div class="widget-foot">
                      
                      <div class="clearfix"></div> 

                    </div>

                  </div>
                </div>






              </div>

            </div>


  <div class="row">
    <div class="col-md-10 col-lg-offset-1">           
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Variabel LCG</div>
                  <div class="widget-icons pull-right">
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                     
                    <!--  <div class="row">
                       <div class="col-md-6">
                      <div class="alert alert-info">
                         <b>Xn = ((a Xn - 1) + b) mod m</b>
                         <p>Xn = bilangan acak ke-n dari deretnya</p>
                         <p>Xn-1 = bilangan acak sebelumnya</p>
                         <p>a = faktor pengali</p>
                         <p>b = Increment</p>
                         <p>m = modulus</p> 

                     </div>
                     </div>

                     <div class="col-md-6">
                       <div class="alert alert-info">
                         <b>Syarat metode LCG memiliki periode penuh jika:</b>
                         <p>1. b relatif prima terhadap m</p>
                         <p>2. a – 1 dapat dibagi dengan setiap faktor prima dari m</p>
                         <p>3. a – 1 adalah kelipatan 4 jika m adalah kelipatan 4</p>
                         <p>4. m > maks(a,b,X0)</p>
                         <p>5. a > 0</p>
                         <p>6. b > 0</p> 

                     </div>
                     </div>

                     </div> -->


                    <div class="form quick-post">
                                    
                                      <form class="form-horizontal" method="GET" action="">
                                        <input type="hidden" name="module" value="formula">
                                        <input type="hidden" name="act" value="proses">
                                        <input type="hidden" name="gs" value="<?php echo $id_gs; ?>">
                                        <input type="hidden" name="x0" value="1">

                                      <div class="form-group">
                                      <label class="control-label col-lg-3" for="title">Pilih Variabel LCG</label>
                                      <div class="col-lg-6"> 
                                      <select name="var_lcg" class="form-control selectlive" required>
                                        <option value=""> -Pilih- </option>
                                        <?php 
                                        if ($_GET[jml_soal] == 100) { ?>
                                        <option value="101"> a = 21, b = 97, x0 = 1, m = 100 </option>
                                        <option value="102"> a = 21, b = 89, x0 = 1, m = 100 </option>
                                        <option value="103"> a = 41, b = 83, x0 = 1, m = 100 </option>
                                        <option value="104"> a = 61, b = 79, x0 = 1, m = 100 </option>
                                        <option value="105"> a = 41, b = 79, x0 = 1, m = 100 </option>
                                       <?php }elseif ($_GET[jml_soal] == 50) { ?>
                                        <option value="51"> a = 11, b = 17, x0 = 1, m = 50 </option>
                                        <option value="52"> a = 1, b = 19, x0 = 1, m = 50 </option>
                                        <option value="53"> a = 21, b = 29, x0 = 1, m = 50 </option>
                                        <option value="54"> a = 31, b = 13, x0 = 1, m = 50 </option>
                                        <option value="55"> a = 21, b = 23, x0 = 1, m = 50 </option>
                                       <?php }
                                         ?>


                                      </select>
                                      </div>
                                      </div>

                                      <div class="form-group">
                                      <label class="control-label col-lg-3" for="title">Jumlah Soal</label>
                                      <div class="col-lg-3"> 
                                      <input readonly class="form-control" type="text" name="m" value="<?php echo $jml_soal; ?>">
                                      </div>
                                      </div>


                                          <!-- <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Variabel a</label>
                                            <div class="col-lg-2"> 
                                              <input class="form-control" min="1" max="<?php echo $jml_soal; ?>" type="number" name="a">
                                            </div>

                                            <label class="control-label col-lg-2" for="title">Variabel b</label>
                                            <div class="col-lg-2"> 
                                              <input class="form-control" type="number" min="1" max="<?php echo $jml_soal; ?>" name="b">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Variabel X0</label>
                                            <div class="col-lg-2"> 
                                              <input class="form-control" type="number" min="1" max="<?php echo $jml_soal; ?>" name="x0">
                                            </div>

                                            <label class="control-label col-lg-2" for="title">Variabel m</label>
                                            <div class="col-lg-1"> 
                                              <input readonly class="form-control" type="text" name="m" value="<?php echo $jml_soal; ?>">
                                            </div>
                                          </div>  -->

                                          

                                          <div class="form-group">

                       <div class="col-lg-offset-10 col-lg-2">
                        <button type="submit" class="btn btn-sm btn-primary"> Proses</button>
                       </div>
                                          </div>
                                      </form>
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


 <?php 
break;
case 'proses':
$id_gs = $_GET[gs];
$vm = $_GET[m];
$vx0 = $_GET[x0];

if ($_GET[var_lcg] == 101) {
$va = 21;
$vb = 97;
}elseif ($_GET[var_lcg] == 102) {
$va = 21;
$vb = 89;
}elseif ($_GET[var_lcg] == 103) {
$va = 41;
$vb = 83;
}elseif ($_GET[var_lcg] == 104) {
$va = 61;
$vb = 79;
}elseif ($_GET[var_lcg] == 105) {
$va = 41;
$vb = 79;
}elseif ($_GET[var_lcg] == 51) {
$va = 11;
$vb = 17;
}elseif ($_GET[var_lcg] == 52) {
$va = 1;
$vb = 19;
}elseif ($_GET[var_lcg] == 53) {
$va = 21;
$vb = 29;
}elseif ($_GET[var_lcg] == 54) {
$va = 31;
$vb = 13;
}elseif ($_GET[var_lcg] == 55) {
$va = 21;
$vb = 23;
}



 if ($va <= 0 || $vb <= 0 || $vx0 <= 0 ) {
   echo "<script>alert('Maaf! Nilai tidak boleh ada dibawah angka 0.'); window.location = 'media.php?module=formula&act=implementasi&gs=".$id_gs."&jml_soal=".$m."';</script>";
 }
?>

<div class="page-head">
        <h2 class="pull-left"><i class="fa fa-random"></i> Pengujian Formula LCG</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="media.php?module=formula" class="bread-current">Formula LCG</a>
        </div>

        <div class="clearfix"></div>

      </div>

<div class="matter">
        <div class="container">

  <div class="row">
    <div id="variabel" class="col-md-10 col-lg-offset-1">           
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Variabel LCG</div>
                  <div class="widget-icons pull-right">
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                     
                    <!--  <div class="row">
                       <div class="col-md-6">
                      <div class="alert alert-info">
                         <b>Xn = ((a Xn - 1) + b) mod m</b>
                         <p>Xn = bilangan acak ke-n dari deretnya</p>
                         <p>Xn-1 = bilangan acak sebelumnya</p>
                         <p>a = faktor pengali</p>
                         <p>b = Increment</p>
                         <p>m = modulus</p> 

                     </div>
                     </div>

                     <div class="col-md-6">
                       <div class="alert alert-info">
                         <b>Syarat metode LCG memiliki periode penuh jika:</b>
                         <p>1. b relatif prima terhadap m</p>
                         <p>2. a – 1 dapat dibagi dengan setiap faktor prima dari m</p>
                         <p>3. a – 1 adalah kelipatan 4 jika m adalah kelipatan 4</p>
                         <p>4. m > maks(a,b,X0)</p>
                         <p>5. a > 0</p>
                         <p>6. b > 0</p> 

                     </div>
                     </div>

                     </div> -->


                    <div class="form quick-post">
                                    
                                      <form class="form-horizontal" method="GET" action="">
                                        <input type="hidden" name="module" value="formula">
                                        <input type="hidden" name="act" value="proses">
                                        <input type="hidden" name="gs" value="<?php echo $id_gs; ?>">
                                        <input type="hidden" name="x0" value="1"> 
                                      <div class="form-group">
                                      <label class="control-label col-lg-3" for="title">Pilih Variabel LCG</label>
                                      <div class="col-lg-6"> 
                                      <select name="var_lcg" class="form-control selectlive" required>
                                        
                                        <?php if ($_GET[var_lcg] == 101) { ?>
                                        <option value="101"> a = 21, b = 97, x0 = 1, m = 100 </option>
                                        <option value="102"> a = 21, b = 89, x0 = 1, m = 100 </option>
                                        <option value="103"> a = 41, b = 83, x0 = 1, m = 100 </option>
                                        <option value="104"> a = 61, b = 79, x0 = 1, m = 100 </option>
                                        <option value="105"> a = 41, b = 79, x0 = 1, m = 100 </option>
                                        <?php }elseif ($_GET[var_lcg] == 102) { ?>
                                        <option value="102"> a = 21, b = 89, x0 = 1, m = 100 </option>
                                        <option value="101"> a = 21, b = 97, x0 = 1, m = 100 </option>
                                        <option value="103"> a = 41, b = 83, x0 = 1, m = 100 </option>
                                        <option value="104"> a = 61, b = 79, x0 = 1, m = 100 </option>
                                        <option value="105"> a = 41, b = 79, x0 = 1, m = 100 </option>
                                        <?php }elseif ($_GET[var_lcg] == 103) { ?>
                                        <option value="103"> a = 41, b = 83, x0 = 1, m = 100 </option>
                                        <option value="101"> a = 21, b = 97, x0 = 1, m = 100 </option>
                                        <option value="102"> a = 21, b = 89, x0 = 1, m = 100 </option>
                                        <option value="104"> a = 61, b = 79, x0 = 1, m = 100 </option>
                                        <option value="105"> a = 41, b = 79, x0 = 1, m = 100 </option>
                                        <?php }elseif ($_GET[var_lcg] == 104) { ?>
                                        <option value="104"> a = 61, b = 79, x0 = 1, m = 100 </option>
                                        <option value="101"> a = 21, b = 97, x0 = 1, m = 100 </option>
                                        <option value="102"> a = 21, b = 89, x0 = 1, m = 100 </option>
                                        <option value="103"> a = 41, b = 83, x0 = 1, m = 100 </option>
                                        <option value="105"> a = 41, b = 79, x0 = 1, m = 100 </option>
                                        <?php }elseif ($_GET[var_lcg] == 105) { ?>
                                        <option value="105"> a = 41, b = 79, x0 = 1, m = 100 </option>
                                        <option value="101"> a = 21, b = 97, x0 = 1, m = 100 </option>
                                        <option value="102"> a = 21, b = 89, x0 = 1, m = 100 </option>
                                        <option value="103"> a = 41, b = 83, x0 = 1, m = 100 </option>
                                        <option value="104"> a = 61, b = 79, x0 = 1, m = 100 </option>
                                        
                                        <?php }elseif ($_GET[var_lcg] == 51) { ?>
                                        <option value="51"> a = 11, b = 17, x0 = 1, m = 50 </option>
                                        <option value="52"> a = 1, b = 19, x0 = 1, m = 50 </option>
                                        <option value="53"> a = 21, b = 29, x0 = 1, m = 50 </option>
                                        <option value="54"> a = 31, b = 13, x0 = 1, m = 50 </option>
                                        <option value="55"> a = 21, b = 23, x0 = 1, m = 50 </option>
                                        
                                        <?php }elseif ($_GET[var_lcg] == 52) { ?>
                                        <option value="52"> a = 1, b = 19, x0 = 1, m = 50 </option>
                                        <option value="51"> a = 11, b = 17, x0 = 1, m = 50 </option>
                                        <option value="53"> a = 21, b = 29, x0 = 1, m = 50 </option>
                                        <option value="54"> a = 31, b = 13, x0 = 1, m = 50 </option>
                                        <option value="55"> a = 21, b = 23, x0 = 1, m = 50 </option>

                                        <?php }elseif ($_GET[var_lcg] == 53) { ?>
                                        <option value="53"> a = 21, b = 29, x0 = 1, m = 50 </option>
                                        <option value="51"> a = 11, b = 17, x0 = 1, m = 50 </option>
                                        <option value="52"> a = 1, b = 19, x0 = 1, m = 50 </option>
                                        <option value="54"> a = 31, b = 13, x0 = 1, m = 50 </option>
                                        <option value="55"> a = 21, b = 23, x0 = 1, m = 50 </option>
                                        
                                        <?php }elseif ($_GET[var_lcg] == 54) { ?>
                                        <option value="54"> a = 31, b = 13, x0 = 1, m = 50 </option>
                                        <option value="51"> a = 11, b = 17, x0 = 1, m = 50 </option>
                                        <option value="52"> a = 1, b = 19, x0 = 1, m = 50 </option>
                                        <option value="53"> a = 21, b = 29, x0 = 1, m = 50 </option>
                                        <option value="55"> a = 21, b = 23, x0 = 1, m = 50 </option>
                                        
                                        <?php }elseif ($_GET[var_lcg] == 55) { ?>
                                        <option value="55"> a = 21, b = 23, x0 = 1, m = 50 </option>
                                        <option value="51"> a = 11, b = 17, x0 = 1, m = 50 </option>
                                        <option value="52"> a = 1, b = 19, x0 = 1, m = 50 </option>
                                        <option value="53"> a = 21, b = 29, x0 = 1, m = 50 </option>
                                        <option value="54"> a = 31, b = 13, x0 = 1, m = 50 </option>
                                        <?php } ?>


                                      </select>
                                      </div>
                                      </div>

                                      <div class="form-group">
                                      <label class="control-label col-lg-3" for="title">Jumlah Soal</label>
                                      <div class="col-lg-3"> 
                                      <input readonly class="form-control" type="text" name="m" value="<?php echo $vm; ?>">
                                      </div>
                                      </div>

                                        <!--   <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Variabel a</label>
                                            <div class="col-lg-2"> 
                                              <input class="form-control" min="1" max="<?php echo $vm; ?>" type="text" name="a" value="<?php echo $va; ?>" readonly>
                                            </div>

                                            <label class="control-label col-lg-2" for="title">Variabel b</label>
                                            <div class="col-lg-2"> 
                                              <input class="form-control" type="text" min="1" max="<?php echo $vm; ?>" name="b" value="<?php echo $vb; ?>" readonly>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Variabel X0</label>
                                            <div class="col-lg-2"> 
                                              <input class="form-control" type="text" min="1" max="<?php echo $vm; ?>" name="x0" value="<?php echo $vx0; ?>" readonly>
                                            </div>

                                            <label class="control-label col-lg-2" for="title">Variabel m</label>
                                            <div class="col-lg-2"> 
                                              <input readonly class="form-control" type="text" name="m" value="<?php echo $vm; ?>">
                                            </div>
                                          </div>  -->

                                          

                                          <div class="form-group">

                       <div class="col-lg-offset-8 col-lg-4">
                        <button type="submit" class="btn btn-sm btn-warning"> Proses Ulang</button>
                        <a href="#" class="btn btn-sm btn-primary" onClick="$('#variabel').hide(); $('#simpanvar').show()"> Simpan</a>
                       </div>
                                          </div>
                                      </form>
                                    </div>
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  


    </div>

<!-- Simpan LCG -->
    <div style="display:none" id="simpanvar" class="col-md-10 col-lg-offset-1">           
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Variabel LCG</div>
                  <div class="widget-icons pull-right">
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                    <div class="form quick-post">
                                    
                                      <form class="form-horizontal" method="POST" action="<?php echo $module; ?>&act=insert">
                                          
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="title">Nama Formula LCG</label>
                                            <div class="col-lg-8"> 
                                              <input required class="form-control" type="text" name="nama" >
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="title">Variabel a</label>
                                            <div class="col-lg-2"> 
                                              <input class="form-control" min="1" max="<?php echo $vm; ?>" type="text" name="a" value="<?php echo $va; ?>" readonly>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="title">Variabel b</label>
                                            <div class="col-lg-2"> 
                                              <input class="form-control" type="text" min="1" max="<?php echo $vm; ?>" name="b" value="<?php echo $vb; ?>" readonly>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                          <label class="control-label col-lg-3" for="title">Variabel m</label>
                                            <div class="col-lg-2"> 
                                              <input readonly class="form-control" type="text" name="m" value="<?php echo $vm; ?>">
                                            </div>
                                          </div> 

                                          

                                          <div class="form-group">

                       <div class="col-lg-offset-8 col-lg-4">
                        <a class="btn btn-sm btn-danger" onClick="$('#simpanvar').hide(); $('#variabel').show()"> Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary"> Simpan</button>
                        
                        
                       </div>
                                          </div>
                                      </form>
                                    </div>
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  


    </div>


<!-- AND Simpan LCG -->

  </div>




          <!-- Table -->
          <div class="row">
          </div>

            <div class="row">

              <div class="col-md-12">

                <div class="widget">

                <div class="widget-head">
                  <div class="pull-left">Data Soal Hasil Pengujian</div>
                  <div class="widget-icons pull-right">
                  </div>  
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
          
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
              <thead>
              <tr>
                <th>Nomor Soal</th>
                <th>Xn = (aXn-1 + b) mod m</th>
              
                <th>Soal</th>
                
              </tr>
              </thead>
              <tbody>
<?php 
$sql = mysql_query("SELECT * FROM question WHERE question_group_id ='$id_gs' ");
while ($key=mysql_fetch_object($sql)) {
$sl[]=$key->question;
$id[]=$key->question_id;
}

$a = $va;
$b = $vb;
$m = $vm;
$x[0] = $vx0;
$jsl = $vm;
for ($i=1;$i<=$jsl;$i++){
$x[$i] = (($a * $x[$i-1]) + $b) % ($m);
$ack=$x[$i];
$soal=$sl[$ack]; ?>

              <tr>
                <td width="10%" align="center"><?php echo $i; ?></td>
                <td width="25%"><?php echo  "X".$i." = (( ".$a." * ".$x[$i-1]." ) + ".$b." ) mod ".$m." = ".$ack; ?> </td>
                <td> <?php echo $soal; ?></td>
              </tr>  
<?php } ?>
              </tbody>
            </table>
          </div>
          
                    <div class="widget-foot">
                      
                      <div class="clearfix"></div> 

                    </div>

                  </div>
                </div>






              </div>

            </div>



        </div>
      </div>








 <?php 

break;
}

 ?>





 <!-- End Blokir Data -->   
        <?php } ?>  
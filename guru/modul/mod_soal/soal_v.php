
<?php
session_start();

if (empty($_SESSION['nip']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
  $module="modul/mod_soal/soal_c.php?module=soal";


?>

<?php 
$id  = $_GET[id_gs];
$sql = mysql_query("SELECT * FROM question WHERE question_group_id = '$id' ");
$sl = mysql_fetch_array($sql);
$dgr = mysql_query("SELECT * FROM question_group WHERE question_group_id = '$id'");
$grp = mysql_fetch_array($dgr);
$p = mysql_query("SELECT * FROM lesson WHERE lesson_id = '$grp[lesson_id]' ");
$pljr = mysql_fetch_array($p);
$sql= mysql_query("SELECT count(question_id) FROM question WHERE question_group_id = '$id' ");
$jml = mysql_fetch_array($sql);
?>


<?php 
switch ($_GET['act']) {
 default: 
 ?>
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-text"></i> Data Soal Ujian</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=group_soal" class="bread-current">Group Soal Ujian</a>
          <span class="divider">/</span>
          <a href="media.php?module=soal&id_gs=<?php echo $id; ?>" class="bread-current"><?php echo $grp[question_group_name]; ?></a> 
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">

          <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                        <div class="well">
                          <table>
                            <tr>
                              <td width="45%"><b>Nama Group Soal</b> </td>
                              <td><b> : <?php echo $grp[question_group_name]; ?></b></td>
                            </tr>
                            <tr>
                              <td><b>Mata Pelajaran </b> </td>
                              <td><b> : <?php echo $pljr[lesson_name]; ?></b></td>
                            </tr>
                            <tr>
                              <td><b>Jumlah Soal</b></td>
                              <td><b> : <?php echo $jml[0]; ?></b></td>
                            </tr>
                          </table>
                          
                          
                        </div>
            </div>
            <div class="col-md-3">
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">
                    <a href="media.php?module=group_soal" class="btn btn-default">
                                    <i class="fa fa-arrow-left"></i> Group Soal Ujian
                                    </a>
                  </div>
                  <div class="widget-icons pull-right">
                   
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                    <div class="row">
                      <div class="col-md-12">
                        <div style="padding-bottom: 10px;" align="right">
                        <a href="download/Template_Soal.xls" class="btn btn-default"><i class="fa fa-download"></i> Download Template Soal</a>
                        <a href="#import" data-toggle="modal" class="btn btn-info"><i class="fa fa-upload"></i> Import</a>
                        <a href="media.php?module=soal&act=add&id_gs=<?php echo $id; ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Soal</a>
                      </div>   
                      </div>

                    </div>
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Soal</b></th>
                        <th><b>Gambar</b></th>
                        <th><b>pilihan A</b></th>
                        <th><b>Pilihan B</b></th>
                        <th><b>Pilihan C</b></th>
                        <th><b>Pilihan D</b></th>
                        <th><b>Kunci Jawaban</b></th>
                        <th width="100px"><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $qry = mysql_query("SELECT * FROM question WHERE question_group_id= '$id' ORDER BY question_id DESC ");
                      while ($soal = mysql_fetch_array($qry)) {
                       ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        
                        <td><?php echo substr(strip_tags($soal['question']), 0, 100) ?></td>
                        <td><?php 
                        if (empty($soal[picture])) {
                          echo " ";
                        }else{
                          echo "<img style='width: 50px;' src='../image/soal/".$soal[picture]."'>";
                        }
                         ?></td>
                        
                        
                        <td><?php echo substr(strip_tags($soal['a']), 0, 100) ?></td>
                        <td><?php echo substr(strip_tags($soal['b']), 0, 100) ?></td>
                        <td><?php echo substr(strip_tags($soal['c']), 0, 100) ?></td>
                        <td><?php echo substr(strip_tags($soal['d']), 0, 100) ?></td>
                        <td><?php echo $soal[answer_key]; ?></td>

                        <td width="120px">
                          <div class="btn-group1">

                          <a href="media.php?module=soal&act=edit&id_gs=<?php echo $id; ?>&id_sl=<?php echo $soal[question_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-pencil"></i></button></a>
                         
                          <a href="#delete<?php echo $soal[question_id]; ?>" data-toggle="modal"><button type='button' class='btn btn-sm btn-danger' title="Hapus"><i class="fa fa-trash"></i></button></a>
                       
                        
                        </div>
                        </td>
                        <?php $no++; } ?>
                      </tr>
                     
                      
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


<?php 
break;
case 'add':
 ?>

   <div class="page-head">
        <h2 class="pull-left"></h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=group_soal" class="bread-current">Group Soal Ujian</a>
          <span class="divider">/</span>
          <a href="media.php?module=soal&id_gs=<?php echo $id; ?>" class="bread-current"><?php echo $grp[question_group_name]; ?></a> 
          <span class="divider">/</span>
          <a href="media.php?module=soal&act=add&id_gs=<?php echo $id; ?>" class="bread-current">Tambah Data Soal</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">

          <div class="row">

                      <div class="col-md-3">
                      </div>
                      <div class="col-md-6">
                        <div class="well">
                          <table>
                            <tr>
                              <td width="45%"><b>Nama Group Soal</b> </td>
                              <td><b> : <?php echo $grp[question_group_name]; ?></b></td>
                            </tr>
                            <tr>
                              <td><b>Mata Pelajaran </b> </td>
                              <td><b> : <?php echo $pljr[lesson_name]; ?></b></td>
                            </tr>
                             <tr>
                              <td><b>Jumlah Soal</b></td>
                              <td><b> : <?php echo $jml[0]; ?></b></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-3">
                      </div>

                    </div>

          <div class="row">
            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left"><i class="fa fa-plus"></i> Data Soal Ujian <?php echo $pljr[lesson_name]; ?></div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                    
       

       <div class="row">
         
        <div class="col-md-12">
          <form class="form-horizontal" role="form" method="POST" action="<?php echo $module; ?>&act=insert" enctype="multipart/form-data">

                                <input type="hidden" name="id_gs" value="<?php echo $id; ?>">
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Soal </label>
                                  <div class="col-lg-6">
                                    <textarea class="cleditor" name="soal"></textarea>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Gambar </label>
                                  <div class="col-lg-6">
                                    <input class="btn btn-default" type="file" name="fupload">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Pilihan A</label>
                                  <div class="col-lg-6">
                                    <textarea class="cleditor" name="pil_a"></textarea>
                                  </div>
                                </div> 

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Pilihan B</label>
                                  <div class="col-lg-6">
                                    <textarea class="cleditor" name="pil_b"></textarea>
                                  </div>
                                </div> 

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Pilihan C</label>
                                  <div class="col-lg-6">
                                    <textarea class="cleditor" name="pil_c"></textarea>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Pilihan D</label>
                                  <div class="col-lg-6">
                                    <textarea class="cleditor" name="pil_d"></textarea>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Kunci Jawaban</label>
                                  <div class="col-lg-8">

                                    <div class="radio">
                                      <label>
                                      <input type="radio" name="kunci" id="optionsRadios1" value="A">
                                        <b>A</b>
                                      </label>
                                    </div>

                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="kunci" id="optionsRadios1" value="B">
                                        <b>B</b>
                                      </label>
                                    </div>

                                    <div class="radio">
                                      <label>
                                      <input type="radio" name="kunci" id="optionsRadios1" value="C">
                                        <b>C</b>
                                      </label>
                                    </div>

                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="kunci" id="optionsRadios1" value="D">
                                        <b>D</b>
                                      </label>
                                    </div>

                                  </div>
                                </div> 

                                <div class="form-group">
                                  <label class="col-lg-2 control-label"></label>
                                  <div class="col-lg-6">
                                    <a href="media.php?module=soal&id_gs=<?php echo $id; ?>" class="btn btn-default">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                    </a>
                                    <input style="float: right;" class="btn btn-primary" type="submit" value="Simpan">
                                  </div>
                                </div>                                
                                
                                
                              </form>
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

<?php 
break;
case 'edit':
$id_gs = $_GET[id_gs];
$id_sl = $_GET[id_sl];
$ql = mysql_query("SELECT * FROM question WHERE question_id = '$id_sl' ");
$sl = mysql_fetch_array($ql);
?>
   <div class="page-head">
        <h2 class="pull-left"></h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=group_soal" class="bread-current">Group Soal Ujian</a>
          <span class="divider">/</span>
          <a href="media.php?module=soal&id_gs=<?php echo $id; ?>" class="bread-current"><?php echo $grp[question_group_name]; ?></a> 
          <span class="divider">/</span>
          <a href="media.php?module=soal&act=edit&id_gs=<?php echo $id; ?>" class="bread-current">Edit Data Soal</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">

          <div class="row">

                      <div class="col-md-3">
                      </div>
                      <div class="col-md-6">
                        <div class="well">
                          <table>
                            <tr>
                              <td width="45%"><b>Nama Group Soal</b> </td>
                              <td><b> : <?php echo $grp[question_group_name]; ?></b></td>
                            </tr>
                            <tr>
                              <td><b>Mata Pelajaran </b> </td>
                              <td><b> : <?php echo $pljr[lesson_name]; ?></b></td>
                            </tr>
                             <tr>
                              <td><b>Jumlah Soal</b></td>
                              <td><b> : <?php echo $jml[0]; ?></b></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-3">
                      </div>

                    </div>

          <div class="row">
            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left"><i class="fa fa-pencil"></i> Edit Data Soal Ujian <?php echo $pljr[lesson_name]; ?></div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                    
       

       <div class="row">
         
        <div class="col-md-12">
          <form class="form-horizontal" role="form" method="POST" action="<?php echo $module; ?>&act=update" enctype="multipart/form-data">

                                <input type="hidden" name="id_gs" value="<?php echo $id_gs; ?>">
                                <input type="hidden" name="id_sl" value="<?php echo $id_sl; ?>">
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Soal </label>
                                  <div class="col-lg-6">
                                    <textarea class="cleditor" name="soal"><?php echo $sl[question]; ?></textarea>
                                  </div>
                                </div>


                                <?php 
                                if (!empty($sl[picture])) {?>
                                  <div class="form-group">
                                  <label class="col-lg-2 control-label"></label>
                                  <div class="col-lg-6">
                                    <div class="prettyPhoto[pp_gal]">
                                      <img width="20%" src="../image/soal/<?php echo $sl[picture]; ?>">
                                    </div>
                                  </div>
                                </div>
                                <?php } ?>


                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Gambar </label>
                                  <div class="col-lg-6">
                                    <input class="btn btn-default" type="file" name="fupload" >
                                  </div>
                                </div>



                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Pilihan A</label>
                                  <div class="col-lg-6">
                                    <textarea class="cleditor" name="pil_a"><?php echo $sl[a]; ?></textarea>
                                  </div>
                                </div> 

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Pilihan B</label>
                                  <div class="col-lg-6">
                                    <textarea class="cleditor" name="pil_b"><?php echo $sl[b]; ?></textarea>
                                  </div>
                                </div> 

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Pilihan C</label>
                                  <div class="col-lg-6">
                                    <textarea class="cleditor" name="pil_c"><?php echo $sl[c]; ?></textarea>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Pilihan D</label>
                                  <div class="col-lg-6">
                                    <textarea class="cleditor" name="pil_d"><?php echo $sl[d]; ?></textarea>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Kunci Jawaban</label>
                                  <div class="col-lg-8">

                                    <div class="radio">
                                      <label>
                                      <input type="radio" name="kunci" id="optionsRadios1" value="A" <?php if ($sl[answer_key]=='A') {echo "checked";} ?> >
                                        <b>A</b>
                                      </label>
                                    </div>

                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="kunci" id="optionsRadios1" value="B" <?php if ($sl[answer_key]=='B') {echo "checked";} ?>>
                                        <b>B</b>
                                      </label>
                                    </div>

                                    <div class="radio">
                                      <label>
                                      <input type="radio" name="kunci" id="optionsRadios1" value="C" <?php if ($sl[answer_key]=='C') {echo "checked";} ?>>
                                        <b>C</b>
                                      </label>
                                    </div>

                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="kunci" id="optionsRadios1" value="D" <?php if ($sl[answer_key]=='D') {echo "checked";} ?>>
                                        <b>D</b>
                                      </label>
                                    </div>

                                  </div>
                                </div> 

                                <div class="form-group">
                                  <label class="col-lg-2 control-label"></label>
                                  <div class="col-lg-6">
                                    <a href="media.php?module=soal&id_gs=<?php echo $id_gs; ?>" class="btn btn-default">
                                    <i class="fa fa-arrow-left"></i> Batal
                                    </a>
                                    <input style="float: right;" class="btn btn-warning" type="submit" value="Update">
                                  </div>
                                </div>                                

                              </form>
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




<?php 

break;
}

 ?>


<!-- Hapus Data -->
    <?php 
                      
                      $data = mysql_query("SELECT * FROM question ");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>    
      <div id="delete<?php echo $row[question_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header merah">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title-putih">Hapus Data Soal</h4>
                      </div>
                      <div class="modal-body">
                      
                      <form method="POST" action="<?php echo $module; ?>&act=delete">
                      
                      <div class="alert alert-danger">
                      <h4><i class="icon fa fa-ban"></i> <b>Peringatan!</b></h4>
                      Apakah Anda ingin Menghapus Soal di bawah ini?
                      <hr/>
                      <p><?php echo $row[question]; ?></p>
                      </div>

                      <input type="hidden" name="id_sl" value="<?php echo $row[question_id]; ?>">
                      <input type="hidden" name="id_gs" value="<?php echo $row[question_group_id]; ?>">


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Hapus</button>
                      </div>
                      </form> 
                    </div>
      </div>
     </div>
     <?php } ?>
    <!-- End Hapus Data -->


<!-- Import Data -->


      <div id="import" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header biru-langit">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title-putih"><i class="fa fa-upload"></i> Import Data Soal</h4>
                      </div>
                      <div class="modal-body">
                      
                      <form method="POST" onSubmit="return validateForm()" action="<?php echo $module; ?>&act=import" enctype="multipart/form-data">
                      

                        <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Data Soal</label></div>
                          <div class="col-md-8">
                            <input type="file" class="btn btn-default" id="file" name="fupload" accept=".xls">
                          </div>
                        </div>
                      </div>

                      <input type="hidden" name="id_gs" value="<?php echo $id; ?>">


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" class="btn btn-info"> <i class="fa fa-upload"></i> Import</button>
                      </div>
                      </form> 
                    </div>
      </div>
     </div>

     <script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }

        if(!hasExtension('file', ['.xls'])){
            alert("Maaf! Pastikan File yang diimport bertipe *.xls");
            return false;
        }
    }
    </script>


    <!-- End Import Data -->
 





        <?php } ?>  
<?php
session_start();

if (empty($_SESSION['nip']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = '../../index.php';</script>";
}
    else{

include '../system/koneksi.php';
include '../system/tgl_indo.php';
  $module="modul/mod_cetak/cetak_c.php?module=cetak";

$les_id = $_GET[id];
$sql = mysql_query("SELECT * FROM detail_lesson WHERE lesson_id = '$les_id' ");
$de_les = mysql_fetch_array($sql);

$sql_les = mysql_query("SELECT * FROM lesson WHERE lesson_id = '$de_les[lesson_id]' ");
$less = mysql_fetch_array($sql_les);

?>

      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-text"></i> Nilai Hasil Ujian</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=nilai&id=<?php echo $_GET[id]; ?>" class="bread-current"> Nilai Mata Pelajaran <?php echo $less[lesson_name]; ?></a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Nilai Mata Pelajaran <?php echo $less[lesson_name]; ?></div>
                  <div class="widget-icons pull-right">
                    <a href="dynamic-tables.html#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="dynamic-tables.html#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                  <div style="padding-bottom: 10px;" align="right"><a href="#cetak" data-toggle="modal" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Hasil Ujian</a></div>   
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Nama Siswa</b></th>
                        <th><b>Kelas</b></th>
                        <th><b>Tahun Ajaran</b></th>
                        <th><b>Semester</b></th>
                        <th><b>Nilai</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                       $qry = mysql_query("SELECT * FROM exm_result, process_exm, exm_reg, exm_schedule, detail_lesson, lesson WHERE exm_result.process_exm_id = process_exm.process_exm_id AND process_exm.exm_reg_id = exm_reg.exm_reg_id AND exm_reg.exm_schedule_id = exm_schedule.exm_schedule_id AND exm_schedule.detail_lesson_id = detail_lesson.detail_lesson_id AND detail_lesson.lesson_id = lesson.lesson_id AND lesson.lesson_id = '$les_id' ");
                       while ($data = mysql_fetch_array($qry)) {

                       	$sq = mysql_query("SELECT * FROM student WHERE student_id = '$data[student_id]' ");
                       	$sis = mysql_fetch_array($sq);

                       	$qkel = mysql_query("SELECT * FROM class WHERE class_id = '$data[class_id]' ");
                       	$kls = mysql_fetch_array($qkel);

                       	$qta = mysql_query("SELECT * FROM sch_year WHERE sch_year_id = '$data[sch_year_id]' ");
                       	$ta = mysql_fetch_array($qta);
                       ?>
                       
                       <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $sis[name]; ?></td>
                        <td><?php echo $kls[class_name]; ?></td>
                        <td><?php echo $ta[sch_year]; ?></td>
                        <td><?php echo $data[semester]; ?></td>
                        <td><?php echo $data[grades]; ?></td>
                        

                      </tr>

                       <?php $no++;}?>
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
    
      <div id="cetak" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header biru">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title-putih"> <i class="fa fa-print"></i> Cetak Hasil Ujian</h4>
                      </div>
                      <div class="modal-body">
                        <form method="GET" target="_blank" action="<?php echo $module; ?>">
                     

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Kelas </label></div>
                          <div class="col-md-6">
                          <select name="kelas" class="form-control selectlive" required>
                          <option value=""> -pilih- </option>
                          <?php 
                          $id_guru = $_SESSION['id_guru'];
                          $sql = mysql_query("SELECT * FROM detail_lesson WHERE teacher_id = '$id_guru' GROUP BY class_id ORDER BY class_id ASC");
                          while ($data = mysql_fetch_array($sql)) { 
                          $kelas = mysql_query("SELECT * FROM class WHERE class_id = '$data[class_id]'");
                          $kls   = mysql_fetch_array($kelas);
                          ?>
                          <option value="<?php echo $kls[class_id]; ?>"><?php echo $kls[class_name]; ?></option>
                          
                          <?php } ?>

                          </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Pelajaran</label></div>
                          <div class="col-md-6">  
                            <select name="pelajaran" class="form-control selectlive" required>
                            <option value=""> -pilih- </option>
                            <?php
                            $id_guru = $_SESSION[id_guru]; 
                            $data = mysql_query("SELECT * FROM detail_lesson, lesson WHERE lesson.lesson_id=detail_lesson.lesson_id AND detail_lesson.teacher_id = '$id_guru' AND detail_lesson.block = 'N' GROUP BY lesson.lesson_name ");
                            while ($pljr = mysql_fetch_array($data)) { ?>
                              <option value="<?php echo $pljr[lesson_id]; ?>"><?php echo $pljr[lesson_name]; ?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Tahun Ajaran</label></div>
                          <div class="col-md-6">  
                            <select name="ta" class="form-control selectlive" required>
                            <option value=""> -pilih- </option>
                            <?php
                            $thn = mysql_query("SELECT * FROM sch_year");
                            while ($ta = mysql_fetch_array($thn)) { ?>
                              <option value="<?php echo $ta[sch_year_id]; ?>"><?php echo $ta[sch_year]; ?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Semester</label></div>
                          <div class="col-md-6">  
                            <select name="semester" class="form-control selectlive" required>
                            <option value="">-pilih- </option>
                              <option value="Semester Ganjil">Semester Ganjil</option>
                              <option value="Semester Genap">Semester Genap</option>

                            </select>
                          </div>
                        </div>
                      </div>
                     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
                      </div>
                      </form>
                      
                    </div>
      </div>
     </div>
    <!-- End Tambah Data -->



<?php } ?>
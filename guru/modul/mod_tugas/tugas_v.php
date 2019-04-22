<?php
if (!session_id())session_start();

if (empty($_SESSION['nip']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
$module="modul/mod_tugas/tugas_c.php?module=tugas";


?>


      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-text"></i> Data Soal</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="#"><i class=""></i> Tugas</a>
          <span class="divider">/</span> 
          <a href="media.php?module=tugas" class="bread-current"> Upload Soal Tugas</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Soal Tugas</div>
                  <div class="widget-icons pull-right">
                    <a href="dynamic-tables.html#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="dynamic-tables.html#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                  <div style="padding-bottom: 10px;" align="right"><a href="#add" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Tugas</a></div>   
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Nama Tugas</b></th>
                        <th><b>Pelajaran</b></th>
                        <th><b>Kelas</b></th>
                        <th><b>File</b></th>
                        <th><b>Tipe File</b></th>
                        <th><b>Tanggal Tugas</b></th>
                        <th><b>Batas Akhir</b></th>
                        <th><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $idgr = $_SESSION[id_guru];
                      $data = mysql_query("SELECT s.soal_id,s.judul,s.file,s.tanggal_tugas,s.batas_upload,s.tipe_file, p.pelajaran_nama,k.kelas_nama FROM soal s, pelajaran p,kelas k WHERE 1=1 AND p.pelajaran_id=s.pelajaran_id AND k.kelas_id=s.kelas_id");

                      $id_guru = $_SESSION[id_guru]; 

                      $dat = mysql_query("SELECT * FROM pelajaran,guru WHERE pelajaran.pelajaran_id=guru.pelajaran_id AND guru.guru_id='$id_guru' ");

                      while ($pljr = mysql_fetch_assoc($dat)) {

                      while ($row = mysql_fetch_assoc($data)) {
                        // echo "<pre>";
                        // print_r($row);
                        // echo "</pre>";
                      if ($pljr[pelajaran_nama] == $row[pelajaran_nama] ) {
                       ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row[judul]; ?></td>
                        <td><?php echo $row[pelajaran_nama]; ?></td>
                        <td><?php echo $row[kelas_nama]; ?></td>
                        <td><?php echo $row[file]; ?></td>
                        <td><?php echo $row[tipe_file]; ?></td>
                        <td><?php echo tanggal_indo($row[tanggal_tugas],TRUE) ?></td>
                        <td><?php echo tanggal_indo($row[batas_upload],TRUE) ?></td>

                        <td width="200px">
                          <div class="btn-group1">

                          <a href="#edit<?php echo $row[soal_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-warning" title="Edit"><i class="fa fa-pencil"></i></button></a>

                          <a href="#hapus<?php echo $row[soal_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i></button></a>

                          <a href="http:/elearning/image/tugas/<?php echo $row[file]; ?>" download data-toggle="modal"><button type="button" class="btn btn-sm btn-download" title="Download"><i class="fa fa-download"></i></button></a>

                          

                        </div>
                        </td>
                      </tr>
                      <?php $no++; } } }?>
                      
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
                        <h4 class="title"> <i class="fa fa-plus"></i> Tambah Soal Tugas</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="<?php echo $module; ?>&act=insert" enctype="multipart/form-data">
                     

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Tugas</label></div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="nama" required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Pelajaran</label></div>
                          <div class="col-md-6">  
                            <select name="pelajaran" class="form-control selectlive" required>
                            <option value="">-pilih- </option>
                            <?php
                            $id_guru = $_SESSION[id_guru]; 
                            $data_pelajaran = mysql_query("SELECT * FROM pelajaran,guru WHERE pelajaran.pelajaran_id=guru.pelajaran_id AND guru.guru_id='$id_guru' ");
                            while ($pljr = mysql_fetch_assoc($data_pelajaran)) { ?>
                              <option value="<?php echo $pljr[pelajaran_id]; ?>"><?php echo $pljr[pelajaran_nama]; ?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Kelas</label></div>
                          <div class="col-md-6">  
                            <select name="kelas" class="form-control selectlive" required>
                            <option value="">-pilih- </option>
                            <?php
                            $id_guru = $_SESSION[id_guru]; 
                            $data_insert_kelas = mysql_query("SELECT * FROM kelas ");
                            while ($pljr = mysql_fetch_assoc($data_insert_kelas)) { ?>
                              <option value="<?php echo $pljr[kelas_id]; ?>"><?php echo $pljr[kelas_nama]; ?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Uploader</label></div>
                          <div class="col-md-6"> 
                            <?php
                            $id_guru = $_SESSION[id_guru]; 
                            $data_pengajar = mysql_fetch_assoc(mysql_query("SELECT guru_nama FROM guru WHERE guru_id = '$_SESSION[id_guru]' "));
                            // var_dump($data_pengajar);
                            ?>
                              <input type="text" name="guru" class="form-control" readonly value="<?php echo $data_pengajar[guru_nama] ?>">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Batas Akhir</label></div>
                          <div class="col-md-6">
                            <input type="date" class="form-control" name="tanggal" required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Upload Tugas</label></div>
                          <div class="col-md-6"> 
                              <input type="file" name="file" required>
                          </div>
                        </div>
                      </div>
                     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                      </form>
                      
                    </div>
      </div>
     </div>
    <!-- End Tambah Data -->

<!-- Edit Data -->
    <?php 
                      
  $data_edit = mysql_query("SELECT s.soal_id,s.judul,s.file,s.tanggal_tugas,s.batas_upload,s.tipe_file, p.pelajaran_nama,k.kelas_id,k.kelas_nama FROM soal s, pelajaran p,kelas k WHERE 1=1 AND p.pelajaran_id=s.pelajaran_id AND k.kelas_id=s.kelas_id");
  
  while ( $row_edit = mysql_fetch_assoc($data_edit) ) {
    // echo "<pre>";
    // print_r($row_edit);
    // echo "</pre>";
    ?>    
      <div id="edit<?php echo $row_edit[soal_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header kuning">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"><i class="fa fa-pencil"></i> Edit Soal Tugas</h4>
                      </div>
                      <div class="modal-body">
                      <form method="POST" action="<?php echo $module; ?>&act=update" enctype="multipart/form-data">


                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Soal</label></div>
                          <div class="col-md-6">
                            <input type="hidden" name="id" value="<?php echo $row_edit[soal_id]; ?>">
                            <input type="text" class="form-control" name="nama" value="<?php echo $row_edit[judul]?>" required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Pelajaran</label></div>
                          <div class="col-md-6">  
                            <select name="pelajaran" class="form-control selectlive" required>
                            <option value="">-pilih- </option>
                            <?php
                            $id_guru = $_SESSION[id_guru]; 
                            $dat = mysql_query("SELECT * FROM pelajaran,guru WHERE pelajaran.pelajaran_id=guru.pelajaran_id AND guru.guru_id='$id_guru' ");
                            while ($pljr = mysql_fetch_assoc($dat)) { ?>
                              <option selected value="<?php echo $pljr[pelajaran_id]; ?>"><?php echo $pljr[pelajaran_nama]; ?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Kelas</label></div>
                          <div class="col-md-6">  
                            <select name="kelas" class="form-control selectlive" required>
                            <option value="">-pilih- </option>
                              <option selected value="<?php echo $row_edit[kelas_id]; ?>"><?php echo $row_edit[kelas_nama]; ?></option>
                            <?php
                            $id_guru = $_SESSION[id_guru]; 
                            $dta = mysql_query("SELECT * FROM kelas WHERE NOT kelas_id='$row_edit[kelas_id]'");
                            while ($kel = mysql_fetch_assoc($dta)) { ?>
                              <option value="<?php echo $kel[kelas_id]; ?>"><?php echo $kel[kelas_nama]; ?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Uploader</label></div>
                          <div class="col-md-6"> 
                            <?php
                            $id_guru = $_SESSION[id_guru]; 
                            $data_edit_pengajar = mysql_fetch_assoc(mysql_query("SELECT guru_nama FROM guru WHERE guru_id = '$_SESSION[id_guru]' "));
                            // var_dump($data_edit_pengajar);
                            ?>
                              <input type="text" name="guru" class="form-control" readonly value="<?php echo $data_edit_pengajar[guru_nama] ?>">
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Batas Akhir</label></div>
                          <div class="col-md-6">
                            <input type="date" class="form-control" name="tanggal" value="<?php echo $row_edit[batas_upload]?>"required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Upload Tugas</label></div>
                          <div class="col-md-6"> 
                              <input type="file" name="file">
                          </div>
                        </div>
                      </div>
                      

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                      </div>
                      </form> 
                    </div>
      </div>
     </div>
     <?php } ?>
    <!-- End Edit Data -->

<!-- Blokir Data -->
    <?php 
                      
                      $data = mysql_query("SELECT * FROM soal ");
                      while ($row = mysql_fetch_assoc($data)) {                      
    ?>    
      <div id="hapus<?php echo $row[soal_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header merah">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title"><i class="fa fa-trash"></i> Hapus Tugas</h4>
                      </div>
                      <div class="modal-body">
                      
                      <form method="POST" action="<?php echo $module; ?>&act=delete">
                      
                      <div class="alert alert-danger">
                      <h4><i class="icon fa fa-ban"></i> <b>Peringatan!</b></h4>
                      Apakah Anda ingin menghapus tugas <b><?php echo $row[judul]; ?></b>?
                      </div>

                      <input type="hidden" name="id" value="<?php echo $row[soal_id]; ?>">


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Hapus</button>
                      </div>
                      </form> 
                    </div>
      </div>
     </div>
     <?php } ?>
    <!-- End Blokir Data -->
        <?php } ?>  
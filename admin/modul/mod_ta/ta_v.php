<?php
session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
    else{
include '../system/koneksi.php';
include '../system/tgl_indo.php';
  $module="modul/mod_ta/ta_c.php?module=ta";


?>


      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-calendar"></i> Tahun Ajaran</h2> 
        <div class="bread-crumb pull-right">
          <a href="media.php?module=home"><i class="fa fa-home"></i> Home</a>
          <span class="divider">/</span> 
          <a href="media.php?module=ta" class="bread-current">Tahun Ajaran</a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="matter">
        <div class="container">
          <div class="row">

            <div class="col-md-12">            
             <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Tahun Ajaran</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">

                  <div class="padd">
                       <div style="padding-bottom: 10px;" align="right"><a href="#add" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Data Tahun Ajaran</a></div>
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="99%">
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Tahun Ajaran</b></th>
                        <th width="100px"><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $data = mysql_query("SELECT * FROM sch_year");
                      while ($row = mysql_fetch_array($data)) {
                       ?>
                      <tr>
                        <td width="5%"><?php echo $no; ?></td>
                        <td><?php echo $row[sch_year]; ?></td>

                        <td width="120px">
                          <div class="btn-group1">
                         

                          <a href="#edit<?php echo $row[sch_year_id]; ?>" data-toggle="modal"><button type="button" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-pencil"></i></button></a>
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
                      <h4 class="title-putih"><i class="fa fa-plus"></i> Tambah Data Tahun Ajaran</h4>
                      </div>
                      <div class="modal-body">
                      <form method="POST" action="<?php echo $module; ?>&act=insert" enctype="multipart/form-data">

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Tahun Ajaran</label></div>
                          <div class="col-md-7">
                            <input type="text" class="form-control" name="tahun_ajaran" placeholder="2017/2018"  required>
                          </div>
                        </div>
                      </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                      </form> 
                    </div>
      </div>
     </div>
    <!-- End Tambah Data -->

<!-- Edit Data -->
    <?php 
                      
                      $data = mysql_query("SELECT * FROM sch_year");
                      while ($row = mysql_fetch_array($data)) {                      
    ?>       
      <div id="edit<?php echo $row[sch_year_id]; ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 500px;">
            <div class="modal-content">
                      <div class="modal-header kuning">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                        <h4 class="title-putih"><i class="fa fa-pencil"></i> Edit Data Tahun Ajaran</h4>
                      </div>
                      <div class="modal-body">
                      <form method="POST" action="<?php echo $module; ?>&act=update" enctype="multipart/form-data">

                     <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Nama Tahun Ajaran</label></div>
                          <div class="col-md-7">
                            <input type="hidden" name="id" value="<?php echo $row[sch_year_id]; ?>">
                            <input type="text"  class="form-control" name="tahun_ajaran" value="<?php echo $row[sch_year]; ?>" required>
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
     <?php } ?>
    <!-- End Edit Data -->



        <?php } ?>  
<?php 

class Admin extends MY_Controller{

	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		
		$this->load->model('M_admin');
		$msg= null;
		$html= null;
		$json= null;
	}

	// beranda controller
	function beranda(){
		switch ($_SESSION['level']) {
			case 'admin':
				# beranda admin
				$this->view= 'admin_beranda';
				$this->render_pages();
				break;
			
			case 'guru':
				# beranda guru
				$this->view= 'admin_guru_beranda';
				$this->render_pages();
				break;

			case 'siswa':
				# beranda siswa
				$this->view= 'admin_siswa_beranda';
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}
	// beranda controller

	// profil:administrator,guru,siswa controller
	function profil(){
		switch ($_SESSION['level']) {
			case 'admin':
				# profil admin
				$this->view= 'admin_profil';
				$this->render_pages();
				break;
			
			case 'guru':
				# profil guru
				$this->view= 'admin_guru_profil';
				$this->render_pages();
				break;

			case 'siswa':
				# profil siswa
				$this->view= 'admin_siswa_profil';
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}
	// profil:administrator,guru,siswa controller

	// data_admin controller
	function data_admin()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->view= 'admin_user_admin';
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}
	// data_admin controller

	// data_guru controller
	function data_guru()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->view= 'admin_user_guru';
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}
	// data_guru controller

	// data_siswa controller
	function data_siswa()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->view= 'admin_user_siswa';
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}
	// data_siswa controller
	
	// kelas controller
	function kelas()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->view= 'admin_akademik_kelas';
				$this->content['kelas']= $this->M_admin->admin_kelas();
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}

	function add_kelas()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->post= $this->input->post();
				$this->msg= $this->M_admin->admin_add_kelas() ? '1' : '0' ;
				echo json_encode($this->msg);
				break;
			
			default:
				# code...
				break;
		}
	}

	function edit_kelas()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->kelas_id= $this->uri->segment(3);
				$row= $this->M_admin->admin_edit_kelas()[0];
				echo '
					<form action="'.base_url().'admin/update-kelas" role="form" id="editKelas" method="post" enctype="multipart/form-data">
						<input type="hidden" name="kelas_id" value="'.$row->kelas_id.'">	
						<div class="form-group">
							<label for="inputKelas">Nama Kelas</label>
							<input value="'.$row->kelas_nama.'" name="kelas" type="text" class="form-control" id="inputKelas" placeholder="*) Nama Kelas Baru" required="">
						</div>
						<button type="submit" class="btn btn-primary">Publish</button>
					</form>
				';
				break;
			
			default:
				# code...
				break;
		}
	}
		
	function update_kelas()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->post= $this->input->post();
				$this->msg= $this->M_admin->admin_update_kelas() ? '1' : '0' ;
				echo json_encode($this->msg);
				break;
	
			default:
				# code...
				break;
		}
	}
	
	function delete_kelas(){
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->kelas_id= $this->uri->segment(3);
				$this->msg= $this->M_admin->admin_delete_kelas() ? '1' : '0' ;
				echo json_encode($this->msg);
				break;
	
			default:
				# code...
				break;
		}
	}

	// kelas controller
	
	// pelajaran controller
	function pelajaran()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->view= 'admin_akademik_pelajaran';
				$this->content['pelajaran']= $this->M_admin->pelajaran();
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}
	function form_add_pelajaran()
	{	
		switch ($_SESSION['level']) {
			case 'admin':
				$this->html= '
				<!-- form start -->
				<form action="'.base_url().'admin/add-pelajaran" role="form" id="addNewPelajaran" method="post" enctype="multipart/form-data">
					<div class="card-body">
						<div class="form-group">
							<label for="inputPelajaran">Nama Pelajaran</label>
							<input name="pelajaran" type="text" class="form-control" id="inputPelajaran" placeholder="*) Nama Pelajaran Baru" required="">
						</div>
						<div class="form-group">
							<select name="kelas_id" class="form-control" required="">
								<option value="" selected disabled> -- Pilih Kelas -- </option>
				';
								foreach ($this->M_admin->admin_kelas() as $key => $value) {
									$this->html .= '
										<option value="'.$value->kelas_id.'">'.$value->kelas_nama.'</option>
									';
								}

				$this->html .= '
							</select>
						</div>
					</div>
					<!-- /.card-body -->
				';

				$this->html.= '
					
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Publish</button>
					</div>
				</form>
				';
				echo $this->html; 
				break;
			
			default:
				# code...
				break;
		}		
	}
	function edit_pelajaran()
	{	
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->pelajaran_id= $this->uri->segment(3);
				$pelajaran= $this->M_admin->admin_edit_pelajaran();
				$this->html= '
				<!-- form start -->
				<form action="'.base_url().'admin/update-pelajaran" role="form" id="editPelajaran" method="post" enctype="multipart/form-data">
					<input value="'.$pelajaran->pelajaran_id.'" name="pelajaran_id" type="hidden" required="">
					<div class="card-body">
						<div class="form-group">
							<label for="inputPelajaran">Nama Pelajaran</label>
							<input value="'.$pelajaran->pelajaran_nama.'" name="pelajaran" type="text" class="form-control" id="inputPelajaran" placeholder="*) Nama Pelajaran Baru" required="">
						</div>
						<div class="form-group">
							<select name="kelas_id" class="form-control" required="">
								<option value="" disabled> -- Pilih Kelas -- </option>
				';
								foreach ($this->M_admin->admin_kelas() as $key => $value) {
									$this->html .= $value->kelas_id== $pelajaran->kelas_id? '<option selected value="'.$value->kelas_id.'">'.$value->kelas_nama.'</option>' : '<option value="'.$value->kelas_id.'">'.$value->kelas_nama.'</option>';
								}

				$this->html .= '
							</select>
						</div>
					</div>
					<!-- /.card-body -->
				';

				$this->html.= '
					
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Publish</button>
					</div>
				</form>
				';
				echo $this->html; 
				break;
			
			default:
				# code...
				break;
		}		
	}
	function add_pelajaran()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->post= $this->input->post();
				if ( $this->M_admin->admin_add_pelajaran() ) {
					$this->msg= [
						'stats'=> 1,
					];
				} else {
					$this->msg= [
						'stats'=> 0,
					];
				}

				echo json_encode($this->msg);
				
				break;
			
			default:
				# code...
				break;
		}
	}
	function update_pelajaran()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->post= $this->input->post();
				if ( $this->M_admin->admin_update_pelajaran() ) {
					$this->msg= [
						'stats'=> 1,
					];
				} else {
					$this->msg= [
						'stats'=> 0,
					];
				}

				echo json_encode($this->msg);
				
				break;
			
			default:
				# code...
				break;
		}
	}
	function delete_pelajaran()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->pelajaran_id= $this->uri->segment(3);
				if ( $this->M_admin->admin_delete_pelajaran() ) {
					$this->msg= [
						'stats'=> 1,
					];
				} else {
					$this->msg= [
						'stats'=> 0,
					];
				}

				echo json_encode($this->msg);
				
				break;
			
			default:
				# code...
				break;
		}
	}
	// pelajaran controller
	
	// data_materi controller
	function data_materi()
	{
		switch ($_SESSION['level']) {
			case 'guru':
				# admin_guru_materi
				$this->view= 'admin_guru_materi';
				$this->render_pages();
				break;

			case 'siswa':
				# admin_siswa_materi
				$this->view= 'admin_siswa_materi';
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}
	// data_materi controller
	
	// data_upload controller
	function data_upload()
	{
		switch ($_SESSION['level']) {
			case 'guru':
				# admin_guru_upload
				$this->view= 'admin_guru_upload';
				$this->render_pages();
				break;

			case 'siswa':
				# admin_siswa_upload
				$this->view= 'admin_siswa_upload';
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}
	// data_upload controller
	
	// data_download controller
	function data_download()
	{
		switch ($_SESSION['level']) {
			case 'guru':
				#download admin_guru
				$this->view= 'admin_guru_download';
				$this->render_pages();
				break;
			
			case 'siswa';
				# download admin_siswa
				$this->view= 'admin_siswa_download';
				$this->render_pages();
				break;
			
			default:
				break;
		}
	}
	// data_download controller
	
	// data_siswa_belum_kumpul controller
	function data_siswa_belum_kumpul()
	{
		switch ($_SESSION['level']) {
			case 'guru':
				$this->view= 'admin_guru_siswa_belum_kumpul';
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}
	// data_siswa_belum_kumpul controller
	
}
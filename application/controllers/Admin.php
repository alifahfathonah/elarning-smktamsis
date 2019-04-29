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
				$this->content['guru']= $this->M_admin->admin_data_guru();
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}
	function form_add_data_guru()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				echo '
					<form action="'.base_url().'admin/add-data-guru" role="form" id="addNewGuru" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputNip">NIP</label>
							<input name="nip" type="text" class="form-control" id="inputNip" placeholder="*) NIP" required="">
						</div>
						<div class="form-group">
							<label for="inputNama">Nama Guru</label>
							<input name="nama" type="text" class="form-control" id="inputNama" placeholder="*) Nama Guru" required="">
						</div>
						<div class="form-group">
							<label for="inputNoTelp">No Telpon</label>
							<input name="telp" type="text" class="form-control" id="inputNoTelp" placeholder="*) Ex: 08123456789" required="">
						</div>
						<div class="form-group">
							<label for="inputEmail">Email</label>
							<input name="email" type="email" class="form-control" id="inputEmail" placeholder="*) Ex: email@gmail.com" required="">
						</div>
						<div class="form-group">
							<label for="inputAlamat">Alamat</label>
							<textarea name="alamat" class="form-control" id="inputAlamat" required="">
							</textarea>
						</div>
						<div class="form-group">
							<label for="inputUsername">Username</label>
							<input name="username" type="text" class="form-control" id="inputUsername" placeholder="*) Username" required="">
						</div>
						<div class="form-group">
							<label for="inputPassword">Password</label>
							<input name="password" type="password" class="form-control" id="inputPassword" placeholder="*******" required="">
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
	function form_edit_data_guru()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->guru_id= $this->uri->segment(3);
				$guru= $this->M_admin->admin_edit_data_guru();
				echo '
					<form action="'.base_url().'admin/update-data-guru" role="form" id="editGuru" method="post" enctype="multipart/form-data">
						<input type="hidden" name="guru_id" value="'.$guru->guru_id.'">	
						<div class="form-group">
							<label for="inputNip">NIP</label>
							<input readonly value="'.$guru->guru_nip.'" name="nip" type="text" class="form-control" id="inputNip" placeholder="*) NIP" required="">
						</div>
						<div class="form-group">
							<label for="inputNama">Nama Guru</label>
							<input value="'.$guru->guru_nama.'" name="nama" type="text" class="form-control" id="inputNama" placeholder="*) Nama Guru" required="">
						</div>
						<div class="form-group">
							<label for="inputNoTelp">No Telpon</label>
							<input value="'.$guru->guru_telp.'" name="telp" type="text" class="form-control" id="inputNoTelp" placeholder="*) Ex: 08123456789" required="">
						</div>
						<div class="form-group">
							<label for="inputEmail">Email</label>
							<input value="'.$guru->guru_email.'" name="email" type="email" class="form-control" id="inputEmail" placeholder="*) Ex: email@gmail.com" required="">
						</div>
						<div class="form-group">
							<label for="inputAlamat">Alamat</label>
							<textarea name="alamat" class="form-control" id="inputAlamat" required="">
								'.$guru->guru_alamat.'
							</textarea>
						</div>
						<div class="form-group">
							<label for="inputUsername">Username</label>
							<input readonly value="'.$guru->guru_username.'" name="username" type="text" class="form-control" id="inputUsername" placeholder="*) Username" required="">
						</div>
						<div class="form-group">
							<label for="inputPassword">Password <small>*) jika tidak ada perubahan password masih sama seperti sebelumnya</small></label>
							<input value="'.$guru->guru_password.'" name="password" type="password" class="form-control" id="inputPassword" placeholder="*******" required="">
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
	function add_data_guru()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->post= $this->input->post();
				$this->M_admin->username= $this->input->post('username');
				$cek= $this->M_admin->cek_user_admin() + $this->M_admin->cek_user_guru() + $this->M_admin->cek_user_siswa(); 
				
				if ( $cek < 1 ) {
					if ( $this->M_admin->admin_add_data_guru() ) {
						$this->msg= [
							'stats'=> 1,
							'msg'=> 'Data Berhasil Ditambahkan',
						];
					} else {
						$this->msg= [
							'stats'=> 0,
							'msg'=> 'Maaf Data Gagal Ditambahkan',
						];
					}
					
				} else {
					$this->msg= [
						'stats'=> 0,
						'msg'=> 'Maaf Username Sudah Digunakan',
					];
				}
				echo json_encode($this->msg);
				break;
			
			default:
				# code...
				break;
		}
	}
	function update_data_guru()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->post= $this->input->post();
				if ( $this->M_admin->admin_update_data_guru() ) {
					$this->msg= [
						'stats'=> 1,
						'msg'=> 'Data Berhasil Diupdate',
					];
				} else {
					$this->msg= [
						'stats'=> 0,
						'msg'=> 'Maaf Data Gagal Diupdate',
					];
				}
				echo json_encode($this->msg);
				break;
			
			default:
				# code...
				break;
		}
	}
	function delete_data_guru()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->guru_id= $this->uri->segment(3);
				if ( $this->M_admin->admin_delete_data_guru() ) {
					$this->msg= [
						'stats'=> 1,
						'msg'=> 'Data Berhasil Dihapus',
					];
				} else {
					$this->msg= [
						'stats'=> 0,
						'msg'=> 'Maaf Data Gagal Dihapus',
					];
				}
				echo json_encode($this->msg);
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
				$this->content['siswa']= $this->M_admin->admin_data_siswa();
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}
	function form_add_data_siswa()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->html= '
					<form action="'.base_url().'admin/add-data-siswa" role="form" id="addNewSiswa" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputNis">NIS</label>
							<input name="nis" type="text" class="form-control" id="inputNis" placeholder="*) Nomor Induk Siswa(NIS)" required="">
						</div>
						<div class="form-group">
							<label for="inputNama">Nama Siswa</label>
							<input name="nama" type="text" class="form-control" id="inputNama" placeholder="*) Nama Siswa" required="">
						</div>
						<div class="form-group">
							<label for="inputKelas">Kelas</label>
							<select name="kelas_id" class="form-control" id="inputKelas" required="">
								<option value="" selected disabled> -- Pilih Kelas -- </option>
							';
							foreach ($this->M_admin->admin_kelas() as $key => $value) {
								$this->html.= '<option value="'.$value->kelas_id.'">'.$value->kelas_nama.'</option>';
							}
							$this->html.= '
							</select>							
						</div>
						<div class="form-group">
							<label for="inputNoTelp">No Telpon</label>
							<input name="telp" type="text" class="form-control" id="inputNoTelp" placeholder="*) Ex: 08123456789" required="">
						</div>
						<div class="form-group">
							<label for="inputEmail">Email</label>
							<input name="email" type="email" class="form-control" id="inputEmail" placeholder="*) Ex: email@gmail.com" required="">
						</div>
						<div class="form-group">
							<label for="inputAlamat">Alamat</label>
							<textarea name="alamat" class="form-control" id="inputAlamat" required="" rows="3" placeholder="Alamat ...">
							</textarea>
						</div>
						<div class="form-group">
							<label for="inputUsername">Username</label>
							<input name="username" type="text" class="form-control" id="inputUsername" placeholder="*) Username" required="">
						</div>
						<div class="form-group">
							<label for="inputPassword">Password</label>
							<input name="password" type="password" class="form-control" id="inputPassword" placeholder="*******" required="">
						</div>
						<button type="submit" class="btn btn-primary">Publish</button>
					</form>
				';
				echo $this->html;
				break;
			
			default:
				# code...
				break;
		}
	}
	function form_edit_data_siswa()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->siswa_id= $this->uri->segment(3);
				$row= $this->M_admin->admin_edit_data_siswa();
				$this->html= '
					<form action="'.base_url().'admin/update-data-siswa" role="form" id="editSiswa" method="post" enctype="multipart/form-data">
						<input type="hidden" name="siswa_id" value="'.$row->siswa_id.'">	
						<div class="form-group">
							<label for="inputNis">NIS</label>
							<input readonly value="'.$row->siswa_nis.'" name="nis" type="text" class="form-control" id="inputNis" placeholder="*) Nomor Induk Siswa(NIS)" required="">
						</div>
						<div class="form-group">
							<label for="inputNama">Nama Siswa</label>
							<input value="'.$row->siswa_nama.'" name="nama" type="text" class="form-control" id="inputNama" placeholder="*) Nama Siswa" required="">
						</div>
						<div class="form-group">
							<label for="inputKelas">Kelas</label>
							<select name="kelas_id" class="form-control" id="inputKelas" required="">
								<option value="" disabled> -- Pilih Kelas -- </option>
							';
							foreach ($this->M_admin->admin_kelas() as $key => $value) {
								$this->html.= ($value->kelas_id == $row->kelas_id) ? '<option selected value="'.$value->kelas_id.'">'.$value->kelas_nama.'</option>' : '<option value="'.$value->kelas_id.'">'.$value->kelas_nama.'</option>';
							}
							$this->html.= '
							</select>							
						</div>
						<div class="form-group">
							<label for="inputNoTelp">No Telpon</label>
							<input value="'.$row->siswa_telp.'" name="telp" type="text" class="form-control" id="inputNoTelp" placeholder="*) Ex: 08123456789" required="">
						</div>
						<div class="form-group">
							<label for="inputEmail">Email</label>
							<input value="'.$row->siswa_email.'" name="email" type="email" class="form-control" id="inputEmail" placeholder="*) Ex: email@gmail.com" required="">
						</div>
						<div class="form-group">
							<label for="inputAlamat">Alamat</label>
							<textarea name="alamat" class="form-control" id="inputAlamat" required="" rows="3" placeholder="Alamat ...">
								'.$row->siswa_alamat.'
							</textarea>
						</div>
						<div class="form-group">
							<label for="inputUsername">Username</label>
							<input readonly value="'.$row->siswa_username.'" name="username" type="text" class="form-control" id="inputUsername" placeholder="*) Username" required="">
						</div>
						<div class="form-group">
							<label for="inputPassword">Password <small>*) jika tidak ada perubahan password masih sama seperti sebelumnya</small></label>
							<input value="'.$row->siswa_password.'" name="password" type="password" class="form-control" id="inputPassword" placeholder="*******" required="">
						</div>
						<button type="submit" class="btn btn-primary">Publish</button>
					</form>
				';
				echo $this->html;
				break;
			
			default:
				# code...
				break;
		}
	}
	function add_data_siswa()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->post= $this->input->post();
				$this->M_admin->username= $this->input->post('username');
				$cek= $this->M_admin->cek_user_admin() + $this->M_admin->cek_user_guru() + $this->M_admin->cek_user_siswa(); 
				
				if ( $cek < 1 ) {
					if ( $this->M_admin->admin_add_data_siswa() ) {
						$this->msg= [
							'stats'=> 1,
							'msg'=> 'Data Berhasil Ditambahkan',
						];
					} else {
						$this->msg= [
							'stats'=> 0,
							'msg'=> 'Maaf Data Gagal Ditambahkan',
						];
					}
					
				} else {
					$this->msg= [
						'stats'=> 0,
						'msg'=> 'Maaf Username Sudah Digunakan',
					];
				}
				echo json_encode($this->msg);
				break;
			
			default:
				# code...
				break;
		}
	}
	function update_data_siswa()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->post= $this->input->post();
				if ( $this->M_admin->admin_update_data_siswa() ) {
					$this->msg= [
						'stats'=> 1,
						'msg'=> 'Data Berhasil Diupdate',
					];
				} else {
					$this->msg= [
						'stats'=> 0,
						'msg'=> 'Maaf Data Gagal Diupdate',
					];
				}
				echo json_encode($this->msg);
				break;
			
			default:
				# code...
				break;
		}
	}
	function delete_data_siswa()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->siswa_id= $this->uri->segment(3);
				if ( $this->M_admin->admin_delete_data_siswa() ) {
					$this->msg= [
						'stats'=> 1,
						'msg'=> 'Data Berhasil Dihapus',
					];
				} else {
					$this->msg= [
						'stats'=> 0,
						'msg'=> 'Maaf Data Gagal Dihapus',
					];
				}
				echo json_encode($this->msg);
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
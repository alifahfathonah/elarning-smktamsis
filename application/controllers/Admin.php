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
				$this->M_admin->admin_id= $this->session->userdata['id'];
				$this->content['admin']= $this->M_admin->admin_edit_data_admin();
				$this->render_pages();
				break;
				
				case 'guru':
				# profil guru
				$this->view= 'admin_guru_profil';
				$this->M_admin->guru_id= $this->session->userdata['id'];
				$this->content['row']= $this->M_admin->admin_edit_data_guru();
				$this->render_pages();
				break;
				
				case 'siswa':
				# profil siswa
				$this->view= 'admin_siswa_profil';
				$this->M_admin->siswa_id= $this->session->userdata['id'];
				$this->content['row']= $this->M_admin->admin_edit_data_siswa();
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
				$this->content['admin']= $this->M_admin->admin_data_admin();
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}

	function form_add_data_admin()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				echo '
					<form action="'.base_url().'admin/add-data-admin" role="form" id="addNewAdmin" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputNama">Nama Admin</label>
							<input name="nama" type="text" class="form-control" id="inputNama" placeholder="*) Nama Admin" required="">
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
	function form_edit_data_admin()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->admin_id= $this->uri->segment(3);
				$row= $this->M_admin->admin_edit_data_admin();
				echo '
					<form action="'.base_url().'admin/update-data-admin" role="form" id="editAdmin" method="post" enctype="multipart/form-data">
						<input type="hidden" name="admin_id" value="'.$row->admin_id.'">	
						<div class="form-group">
							<label for="inputNama">Nama Guru</label>
							<input value="'.$row->admin_nama.'" name="nama" type="text" class="form-control" id="inputNama" placeholder="*) Nama Guru" required="">
						</div>
						<div class="form-group">
							<label for="inputNoTelp">No Telpon</label>
							<input value="'.$row->no_telp.'" name="telp" type="text" class="form-control" id="inputNoTelp" placeholder="*) Ex: 08123456789" required="">
						</div>
						<div class="form-group">
							<label for="inputEmail">Email</label>
							<input value="'.$row->email.'" name="email" type="email" class="form-control" id="inputEmail" placeholder="*) Ex: email@gmail.com" required="">
						</div>
						<div class="form-group">
							<label for="inputAlamat">Alamat</label>
							<textarea name="alamat" class="form-control" id="inputAlamat" required="">
								'.$row->alamat.'
							</textarea>
						</div>
						<div class="form-group">
							<label for="inputUsername">Username</label>
							<input readonly value="'.$row->admin_username.'" name="username" type="text" class="form-control" id="inputUsername" placeholder="*) Username" required="">
						</div>
						<div class="form-group">
							<label for="inputPassword">Password <small>*) jika tidak ada perubahan password masih sama seperti sebelumnya</small></label>
							<input value="'.$row->admin_password.'" name="password" type="password" class="form-control" id="inputPassword" placeholder="*******" required="">
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
	function add_data_admin()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->post= $this->input->post();
				$this->M_admin->username= $this->input->post('username');
				$cek= $this->M_admin->cek_user_admin() + $this->M_admin->cek_user_guru() + $this->M_admin->cek_user_siswa(); 
				
				if ( $cek < 1 ) {
					if ( $this->M_admin->admin_add_data_admin() ) {
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
	function update_data_admin()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->post= $this->input->post();
				if ( $this->M_admin->admin_update_data_admin() ) {
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
	function delete_data_admin()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				$this->M_admin->admin_id= $this->uri->segment(3);
				if ( $this->M_admin->admin_delete_data_admin() ) {
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
	// end pelajaran controller

	// PBM controller
	public function pbm()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				# code...
				$this->view= 'admin_pbm';
				$this->content['rows']= $this->M_admin->admin_pbm();
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}
	public function form_add_pbm()
	{	
		switch ($_SESSION['level']) {
			case 'admin':
				$this->html= '
				<!-- form start -->
				<form action="'.base_url().'admin/add-pbm" role="form" id="addNewPbm" method="post" enctype="multipart/form-data">
					<div class="card-body">
						<div class="form-group">
							<label for="inputPelajaran">Tahun Ajaran</label>
							<input name="tahun_ajaran" type="text" class="form-control" placeholder="*) Masukan Tahun Ajaran" required="">
						</div>
						<div class="form-group">
							<label for="inputPelajaran">NIS <small id="alertInputNis"></small></label>
							<input name="nis" type="text" class="form-control" id="inputNis" placeholder="*) Masukan Nomor Induk Siswa" required="">
						</div>
						<div class="form-group">
							<label for="inputPelajaran">Pelajaran</label>
							<select id="inputPelajaran" name="pelajaran_id" class="form-control" required="">
								<option value="" selected disabled> -- Pilih Pelajaran -- </option>
				';
								foreach ($this->M_admin->pelajaran() as $key => $value) {
									$this->html .= '
										<option value="'.$value->pelajaran_id.'">('.$value->kelas_nama.') '.$value->pelajaran_nama.'</option>
									';
								}

				$this->html .= '
							</select>
						</div>
						<div class="form-group">
							<label for="inputPelajaran">Guru</label>
							<select name="guru_id" class="form-control" required="">
								<option value="" selected disabled> -- Pilih Guru -- </option>
				';
								foreach ($this->M_admin->admin_data_guru() as $key => $value) {
									$this->html .= '
										<option value="'.$value->guru_id.'">'.$value->guru_nama.'</option>
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
	public function cek_nis(){
		switch ($_SESSION['level']) {
			case 'admin':
				# code...
				$this->M_admin->post= [];
				$this->M_admin->post['nis']= $this->input->get('nis');
				if ( $this->M_admin->admin_pbm_siswa()->num_rows() > 0 ) {
					# code...
					$this->msg= [
						'stats'=>1,
						'msg'=> 'Siswa dengan NIS '.$this->input->get('nis').' berhasil ditemukan',
						'siswa_id'=> $this->M_admin->admin_pbm_siswa()->row()->siswa_id,
					];
				} else {
					# code...
					$this->msg= [
						'stats'=>0,
						'msg'=> 'Siswa dengan NIS '.$this->input->get('nis').' tidak ditemukan'
					];
				}
				echo json_encode($this->msg );
				break;
			
			default:
				# code...
				break;
		}
	}
	public function pbm_pelajaran(){
		switch ($_SESSION['level']) {
			case 'admin':
				# code...
				$this->M_admin->siswa_id= $this->input->get('siswa_id');
				$this->html= '<option value="" selected disabled> -- Pilih Pelajaran -- </option>';
				foreach ($this->M_admin->admin_pbm_pelajaran() as $key => $value) {
					# code...
					$this->html.= '<option value="'.$value->pelajaran_id.'" > ('.$value->kelas_nama.') '.$value->pelajaran_nama.'</option>';
				}
				echo $this->html;
				break;
			
			default:
				# code...
				break;
		}
	}
	public function add_pbm()
	{
		switch ($_SESSION['level']) {
			case 'admin':
				# code...
				$this->M_admin->post= $this->input->post();
				if ( $this->M_admin->admin_pbm_siswa()->num_rows() > 0 ) {
					$this->M_admin->post['siswa_id']= $this->M_admin->admin_pbm_siswa()->row()->siswa_id;
					if ( $this->M_admin->admin_add_pbm() ) {
						# code...
						$this->msg=[
							'stats'=>1,
							'msg'=> 'Data Berhasil Disimpan',
						];
					} else {
						# code...
						$this->msg=[
							'stats'=>0,
							'msg'=> 'Data Gagal Disimpan',
						];
					}
					
				} else {
					$this->msg=[
						'stats'=>0,
						'msg'=> 'Maaf Siswa dengan Nis '.$this->input->post('nis').' belum terdaftar',
					];
					# code...
				}
				echo json_encode($this->msg);
				break;
			
			default:
				# code...
				break;
		}
	}
	// end PBM controller
	
	// data_materi controller
	function data_materi()
	{
		switch ($_SESSION['level']) {
			case 'guru':
				# admin_guru_materi
				$this->load->helper('date');
				$this->view= 'admin_guru_materi';
				$this->content['rows']= $this->M_admin->guru_data_materi();
				$this->render_pages();
				break;
				
			case 'siswa':
				# admin_siswa_materi
				$this->load->helper('date');
				$this->content['rows']= $this->M_admin->siswa_data_materi();
				$this->view= 'admin_siswa_materi';
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}
	function form_add_data_materi(){
		switch ($_SESSION['level']) {
			case 'guru':
				# code...
				$this->M_admin->guru_id= $this->session->userdata['id'];
				$this->html= '
					<form action="'.base_url().'admin/add-data-materi" role="form" id="addNewMateri" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputNip">Nama Materi</label>
							<input name="judul_materi" type="text" class="form-control" id="inputNip" placeholder="*) Masukan Nama Materi" required="">
						</div>
						<div class="form-group">
							<label for="inputNip">Pelajaran</label>
							<select name="pelajaran_id" class="form-control" required="">
								<option value="" selected disabled> -- Pilih Pelajaran -- </option>
				';
								foreach ($this->M_admin->guru_data_materi_input_pelajaran() as $key => $value) {
									$this->html .= '
										<option value="'.$value->pelajaran_id.'"> ('.$value->kelas_nama.') '.$value->pelajaran_nama.'</option>
									';
								}

				$this->html .= '
							</select>
						</div>
						<div class="form-group">
							<label for="inputNama">Upload Materi <small class="badge badge-info">*) type: doc,docx,ppt,pptx,pdf,mp4</small></label>
							<input name="fupload" type="file" class="form-control"  required="">
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
	function form_edit_data_materi(){
		switch ($_SESSION['level']) {
			case 'guru':
				# code...
				$this->M_admin->guru_id= $this->session->userdata['id'];
				$this->M_admin->materi_id= $this->uri->segment(3);
				$row= $this->M_admin->guru_edit_data_materi();
				$this->html= '
					<form action="'.base_url().'admin/update-data-materi" role="form" id="editMateri" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputNip">Nama Materi</label>
							<input value="'.$row->judul_materi.'" name="judul_materi" type="text" class="form-control" id="inputNip" placeholder="*) Masukan Nama Materi" required="">
						</div>
						<div class="form-group">
							<label for="inputNip">Pelajaran</label>
							<select name="pelajaran_id" class="form-control" required="">
								<option value="" disabled> -- Pilih Pelajaran -- </option>
				';
								foreach ($this->M_admin->guru_data_materi_input_pelajaran() as $key => $value) {
									$this->html .= ($value->pelajaran_id == $row->pelajaran_id)? '<option value="'.$value->pelajaran_id.'" selected> ('.$value->kelas_nama.') '.$value->pelajaran_nama.'</option>' : '<option value="'.$value->pelajaran_id.'"> ('.$value->kelas_nama.') '.$value->pelajaran_nama.'</option>';
								}

				$this->html .= '
							</select>
						</div>
						<div class="form-group">
							<label for="inputNama">File Materi <a target="_blank" href="'.base_url('src/materi/'.$row->nama_file).'" class="label-success">'.$row->nama_file.'</a></label>
						</div>
						<div class="form-group">
							<label for="inputNama">Ganti Materi Baru <small class="badge badge-info">*) type: doc,docx,ppt,pptx,pdf,mp4</small></label>
							<input name="fupload" type="file" class="form-control">
						</div>
						<input value="'.$row->materi_id.'" type="hidden" name="materi_id">
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
	function add_data_materi(){
		switch ($_SESSION['level']) {
			case 'guru':
				# code...
				$config['upload_path']          = 'src/materi/';
				$config['allowed_types']        = 'docx|doc|ppt|pptx|pdf|mp4';
				// $config['max_size']             = 1000000;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('fupload'))
                {
					$this->msg= [
						'stats'=>0,
						'msg'=> $this->upload->display_errors(),
					];
				}
				else
				{
					
					$this->M_admin->post= $this->input->post();
					$this->M_admin->post['upload_data']= $this->upload->data();
					if ( $this->M_admin->guru_add_data_materi() ) {
						$this->msg= [
							'stats'=>1,
							'msg'=> 'Data Berhasil Disimpan',
						];
						
					} else {
						$this->msg= [
							'stats'=>0,
							'msg'=> 'Maaf Data Gagal Disimpan',
						];
					}
					// $this->msg= $this->M_admin;
					
				}
				echo json_encode($this->msg);
				break;
			
			default:
				# code...
				break;
		}
	}
	function update_data_materi(){
		switch ($_SESSION['level']) {
			case 'guru':
				# code...
				$this->M_admin->post= $this->input->post();
				if ( empty($_FILES['fupload']['tmp_name']) ) {
					# code...without upload file
					if ( $this->M_admin->guru_update_materi() ) {
						$this->msg= [
							'stats'=>1,
							'msg'=> 'Data Berhasil Disimpan'
						];
					} else {
						$this->msg= [
							'stats'=>1,
							'msg'=> 'Data Gagal Disimpan'
						];
					}
					
				} else {
					# code...with upload file
					$this->M_admin->materi_id= $this->input->post('materi_id');
					$row= $this->M_admin->guru_edit_data_materi();

					$config['upload_path']          = 'src/materi/';
					$config['allowed_types']        = 'docx|doc|ppt|pptx|pdf|mp4';

					if ( file_exists($config['upload_path'].$row->nama_file) ) {
						unlink($config['upload_path'].$row->nama_file);
					}

					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('fupload'))
					{
						$this->msg= [
							'stats'=>0,
							'msg'=> $this->upload->display_errors(),
						];
					}
					else
					{
						$this->M_admin->post['nama_file']= $this->upload->data()['file_name'];
						if ( $this->M_admin->guru_update_materi() ) {
							$this->msg= [
								'stats'=>1,
								'msg'=> 'Data Berhasil Disimpan',
							];
							
						} else {
							$this->msg= [
								'stats'=>0,
								'msg'=> 'Maaf Data Gagal Disimpan',
							];
						}
						// $this->msg= $this->M_admin;
						
					}


				}
				
				echo json_encode($this->msg);
				break;
			
			default:
				# code...
				break;
		}
	}
	function delete_data_materi(){
		switch ($_SESSION['level']) {
			case 'guru':
				# code...
				$this->M_admin->materi_id= $this->uri->segment(3);
				$row= $this->M_admin->guru_edit_data_materi();

				$config['upload_path']          = 'src/materi/';

				if ( file_exists($config['upload_path'].$row->nama_file) ) {
					unlink($config['upload_path'].$row->nama_file);
				}

				if ( $this->M_admin->guru_delete_materi() ) {
					$this->msg= [
						'stats'=>1,
						'msg'=> 'Data Berhasil Dihapus',
					];
				} else {
					$this->msg= [
						'stats'=>0,
						'msg'=> 'Data Gagal Dihapus',
					];
				}
				echo json_encode($this->msg);
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
				$this->load->helper('date');
				$this->content['rows']= $this->M_admin->guru_data_upload();
				$this->view= 'admin_guru_upload';
				$this->render_pages();
				break;
				
				case 'siswa':
				# admin_siswa_upload
				$this->load->helper('date');
				$this->content['rows']= $this->M_admin->siswa_data_upload();
				$this->view= 'admin_siswa_upload';
				$this->render_pages();
				break;
			
			default:
				# code...
				break;
		}
	}
	function form_add_data_upload(){
		switch ($_SESSION['level']) {
			case 'guru':
				# code...
				$this->html= '
					<form action="'.base_url().'admin/add-data-upload" role="form" id="addNewUpload" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputNip">Nama Tugas</label>
							<input name="nama_soal" type="text" class="form-control" id="inputNip" placeholder="*) Masukan Nama Tugas" required="">
						</div>
						<div class="form-group">
							<label for="inputNip">Pilih Materi</label>
							<select name="materi_id" class="form-control" required="">
								<option value="" selected disabled> -- Pilih Materi -- </option>
				';
								foreach ($this->M_admin->guru_data_materi() as $key => $value) {
									$this->html .= '<option value="'.$value->materi_id.'">'.$value->judul_materi.' ('.$value->kelas_nama.' '.$value->pelajaran_nama.')</option>';
								}

				$this->html .= '
							</select>
						</div>
						<div class="form-group">
							<label for="inputNama">Upload Soal</label>
							<input name="fupload" type="file" class="form-control"  required="">
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
	function form_edit_data_upload(){
		switch ($_SESSION['level']) {
			case 'guru':
				# code...
				$this->M_admin->soal_id= $this->uri->segment(3);
				$row= $this->M_admin->guru_edit_data_upload();
				$this->html= '
					<form action="'.base_url().'admin/update-data-upload" role="form" id="editUpload" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputNip">Nama Tugas</label>
							<input value="'.$row->nama_soal.'" name="nama_soal" type="text" class="form-control" id="inputNip" placeholder="*) Masukan Nama Tugas" required="">
						</div>
						<div class="form-group">
							<label for="inputNip">Pilih Materi</label>
							<select name="materi_id" class="form-control" required="">
								<option value="" disabled> -- Pilih Materi -- </option>
				';
								foreach ($this->M_admin->guru_data_materi() as $key => $value) {
									$this->html .= ($row->materi_id == $value->materi_id) ? '<option value="'.$value->materi_id.'" selected >'.$value->judul_materi.' ('.$value->kelas_nama.' '.$value->pelajaran_nama.')</option>' : '<option value="'.$value->materi_id.'">'.$value->judul_materi.' ('.$value->kelas_nama.' '.$value->pelajaran_nama.')</option>';
								}

				$this->html .= '
							</select>
						</div>
						<div class="form-group">
							<label for="inputNama">File Tugas <a target="_blank" href="'.base_url('src/upload/'.$row->nama_file).'" class="label-success">'.$row->nama_file.'</a></label>
						</div>
						<div class="form-group">
							<label for="inputNama">Upload Soal</label>
							<input name="fupload" type="file" class="form-control">
						</div>
						<input value="'.$row->soal_id.'" type="hidden" name="soal_id">
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
	function add_data_upload(){
		switch ($_SESSION['level']) {
			case 'guru':
				# code...
				$config['upload_path']          = 'src/upload/';
				$config['allowed_types']        = 'docx|doc|pdf';
				// $config['max_size']             = 1000000;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('fupload'))
                {
					$this->msg= [
						'stats'=>0,
						'msg'=> $this->upload->display_errors(),
					];
				}
				else
				{
					
					$this->M_admin->post= $this->input->post();
					$this->M_admin->post['upload_data']= $this->upload->data();
					if ( $this->M_admin->guru_add_data_upload() ) {
						$this->msg= [
							'stats'=>1,
							'msg'=> 'Data Berhasil Disimpan',
						];
						
					} else {
						$this->msg= [
							'stats'=>0,
							'msg'=> 'Maaf Data Gagal Disimpan',
						];
					}
					// $this->msg= $this->M_admin;
					
				}
				echo json_encode($this->msg);
				break;
			
			default:
				# code...
				break;
		}
	}
	function update_data_upload(){
		switch ($_SESSION['level']) {
			case 'guru':
				# code...
				$this->M_admin->post= $this->input->post();
				if ( empty($_FILES['fupload']['tmp_name']) ) {
					# code...without upload file
					if ( $this->M_admin->guru_update_upload() ) {
						$this->msg= [
							'stats'=>1,
							'msg'=> 'Data Berhasil Diupdate'
						];
					} else {
						$this->msg= [
							'stats'=>1,
							'msg'=> 'Data Gagal Diupdate'
						];
					}
					
				} else {
					# code...with upload file
					$this->M_admin->soal_id= $this->input->post('soal_id');
					$row= $this->M_admin->guru_edit_data_upload();
					
					$config['upload_path']          = 'src/upload/';
					$config['allowed_types']        = 'docx|doc|pdf';

					if ( file_exists($config['upload_path'].$row->nama_file) ) {
						unlink($config['upload_path'].$row->nama_file);
					}

					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('fupload'))
					{
						$this->msg= [
							'stats'=>0,
							'msg'=> $this->upload->display_errors(),
						];
					}
					else
					{
						$this->M_admin->post['nama_file']= $this->upload->data()['file_name'];
						if ( $this->M_admin->guru_update_upload() ) {
							$this->msg= [
								'stats'=>1,
								'msg'=> 'Data Berhasil Disimpan',
							];
							
						} else {
							$this->msg= [
								'stats'=>0,
								'msg'=> 'Maaf Data Gagal Disimpan',
							];
						}
						// $this->msg= $this->M_admin;
						
					}


				}
				
				echo json_encode($this->msg);
				break;
			
			default:
				# code...
				break;
		}
	}
	function delete_data_upload(){
		switch ($_SESSION['level']) {
			case 'guru':
				# code...
				$this->M_admin->soal_id= $this->uri->segment(3);
				$row= $this->M_admin->guru_edit_data_upload();

				$config['upload_path']          = 'src/upload/';

				if ( file_exists($config['upload_path'].$row->nama_file) ) {
					unlink($config['upload_path'].$row->nama_file);
				}

				if ( $this->M_admin->guru_delete_upload() ) {
					$this->msg= [
						'stats'=>1,
						'msg'=> 'Data Berhasil Dihapus',
					];
				} else {
					$this->msg= [
						'stats'=>0,
						'msg'=> 'Data Gagal Dihapus',
					];
				}
				echo json_encode($this->msg);
				break;
			
			default:
				# code...
				break;
		}
	}

	public function form_upload_jawaban(){
		switch ($_SESSION['level']) {
			case 'siswa':
				# code...
				$this->html= '
					<form action="'.base_url().'admin/store-upload-jawaban" role="form" id="uploadJawaban" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputNama">Upload File Jawaban <small class="badge badge-info">*) type: doc,docx,pdf</small></label>
							<input name="fupload" type="file" class="form-control" required="">
						</div>
						<input value="'.$this->uri->segment(3).'" type="hidden" name="soal_id">
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
	public function store_upload_jawaban()
	{
		switch ($_SESSION['level']) {
			case 'siswa':
				# code...
				$config['upload_path']          = 'src/upload/';
				$config['allowed_types']        = 'docx|doc|pdf';
				// $config['max_size']             = 1000000;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('fupload'))
                {
					$this->msg= [
						'stats'=>0,
						'msg'=> $this->upload->display_errors(),
					];
				}
				else
				{
					
					$this->M_admin->post= $this->input->post();
					$this->M_admin->post['nama_file']= $this->upload->data()['file_name'];
					if ( $this->M_admin->siswa_store_jawaban() ) {
						$this->msg= [
							'stats'=>1,
							'msg'=> 'Data Berhasil Disimpan',
						];
						
					} else {
						$this->msg= [
							'stats'=>0,
							'msg'=> 'Maaf Data Gagal Disimpan',
						];
					}
					// $this->msg= $this->M_admin;
					
				}
				echo json_encode($this->msg);
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
				$this->content['rows']= $this->M_admin->guru_data_download();
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
				$this->content['rows']= $this->M_admin->guru_siswa_belum_kumpul();
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
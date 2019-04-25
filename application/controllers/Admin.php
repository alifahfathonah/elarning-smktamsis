<?php 

class Admin extends MY_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
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
				$this->render_pages();
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
				$this->render_pages();
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
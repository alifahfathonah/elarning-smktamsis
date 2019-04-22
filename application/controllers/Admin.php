<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	function index(){
		$this->load->view('admin');
	}
	function guru(){
		$this->load->view('admin_guru');
	}
	function siswa(){
		$this->load->view('admin_siswa');
	}
}
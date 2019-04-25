<?php
class MY_Controller extends CI_Controller{
	function __construct(){
		parent::__construct();
    }
    function render_pages()
    {
        $this->load->view('header');
        switch ($_SESSION['level']) {
            case 'admin':
                $this->load->view('admin_nav');
                break;
            case 'guru':
                $this->load->view('admin_guru_nav');
                break;
            case 'siswa':
                $this->load->view('admin_siswa_nav');
                break;
                
            default:
                # code...
                break;
        }
        $this->load->view($this->view, (empty($this->content)? [] : $this->content ) );
        $this->load->view('footer');
    }
}
    
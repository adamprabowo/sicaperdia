<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	private $getSession = null;

	public function __construct(){
		parent::__construct();
		$this->load->model('m_role');
		$this->load->model('m_user');
		$this->load->view('user/style');
		$sess = $this->getSession = $this->session->all_userdata();
		if(empty($sess['user_id'])){
            redirect('login');
        }
	}

	public function index()
	{
		// $data['laporan'] = $this->m_laporan->getLaporan();
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// die();
        $sess['session'] = $this->getSession;
        $this->load->view('templates/header',$sess);
        $this->load->view('laporan/v_laporan');
        $this->load->view('templates/footer');
	}

    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	private $getSession = null;

	public function __construct(){
		parent::__construct();
		$this->load->model('m_pbi');
		$this->load->model('m_pindah');
		$this->load->view('dashboard/style');
		$sess = $this->getSession = $this->session->all_userdata();
		// echo '<pre>';
		// print_r($sess);
		// echo '</pre>';
		// die();
		if(empty($sess['user_id'])){
            redirect('login');
        }
	}
	
	public function index()
	{
		$sess['session'] = $this->getSession;
		
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// die();
		$this->load->view('templates/header',$sess);
		$this->load->view('dashboard/v_dashboard');
		$this->load->view('templates/footer');
	}


}

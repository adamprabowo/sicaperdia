<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_laporan');
	}

	public function index()
	{
		$data['laporan'] = $this->m_laporan->getLaporan();
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		die();
        $this->load->view('templates/header');
        $this->load->view('laporan/v_laporan');
        $this->load->view('templates/footer');
	}

    
}

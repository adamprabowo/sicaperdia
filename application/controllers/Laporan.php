<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {


	public function index()
	{
        $this->load->view('templates/header');
        $this->load->view('laporan/v_laporan');
        $this->load->view('templates/footer');
        
		// $this->load->view('laporan/v_laporan',$data);
		// $this->load->view('templates/footer');
	}

    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	private $getSession = null;

	public function __construct(){
		parent::__construct();
				
        $this->load->model('M_barang');

		$sess = $this->getSession = $this->session->all_userdata();

		if(empty($sess['user_id'])){
            redirect('login');
        }
	}
	
	public function index()
	{
		// echo '<pre>';
		// print_r($this->getSession);
		// echo '</pre>';
		// die();

		$data['jumlah_barang'] = $this->M_barang->get_jumlah_barang();
		$data['jumlah_kategori'] = $this->M_barang->get_jumlah_kategori();
		// var_dump($data);
		// exit();

		$sess['session'] = $this->getSession;
		$this->load->view('templates/header',$sess);
		$this->load->view('dashboard/v_dashboard',$data);
		$this->load->view('templates/footer');
	}


}

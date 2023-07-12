<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	private $getSession = null;

	public function __construct(){
		parent::__construct();
				
        $this->load->model('M_barang');
		$this->load->model('M_transaksi');

		$sess = $this->getSession = $this->session->all_userdata();

		if(empty($sess['user_id'])){
            redirect('login');
        }
	}
	
	public function index()
	{
		$data['jumlah_barang'] = $this->M_barang->get_jumlah_barang();
		$data['jumlah_kategori'] = $this->M_barang->get_jumlah_kategori();
		$data['jumlah_transaksi_bulan'] = $this->M_transaksi->get_jumlah_bulan();
		$data['jumlah_transaksi_tahun'] = $this->M_transaksi->get_jumlah_tahun();
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// die();

		$sess['session'] = $this->getSession;
		$this->load->view('templates/header',$sess);
		$this->load->view('dashboard/v_dashboard',$data);
		$this->load->view('templates/footer');
	}


}

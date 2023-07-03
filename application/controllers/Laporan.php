<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	private $getSession = null;

	public function __construct(){
		parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('M_barang');
        $this->load->model('M_laporan');
		$this->load->model('M_role');
		$this->load->model('M_user');
		$this->load->view('laporan/style');
		$sess = $this->getSession = $this->session->all_userdata();
		if(empty($sess['user_id'])){
            redirect('login');
        }
	}

    function kartuStok(){
        $this->load->model('M_barang');

        $data['list_barang'] = $this->M_barang->get_data_join();
        
        $sess['session'] = $this->getSession;
		$this->load->view('templates/header',$sess);
		$this->load->view('laporan/v_barang',$data);
		$this->load->view('templates/footer');
    }

    function lihatKartuStok($id=''){
        $data['kode_barang'] = $id;
        $get_barang = $this->M_barang->get_detail_barang($id);
        $data['kartu_stok'] = $this->M_laporan->getKartuStok($data['kode_barang']);
        $jml_stok_terbaru = $this->M_laporan->getStokTerbaru($data['kode_barang']);

        $data['barang'] = $get_barang[0];
        $data['sisa'] = $jml_stok_terbaru->jumlah_stok_terbaru;
        // echo '<pre>';
        // print_r($data['kartu_stok']);
        // echo '</pre>';
        // die();

        $sess['session'] = $this->getSession;
		$this->load->view('templates/header',$sess);
		$this->load->view('laporan/v_kartu_stok',$data);
		$this->load->view('templates/footer');
    }

	public function tahunan()
	{
		// $data['laporan'] = $this->m_laporan->getLaporan();
        $sess['session'] = $this->getSession;
        $this->load->view('templates/header',$sess);
        $this->load->view('laporan/v_tahunan');
        $this->load->view('templates/footer');
	}

    
}

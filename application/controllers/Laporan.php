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

        $sess['session'] = $this->getSession;
		$this->load->view('templates/header',$sess);
		$this->load->view('laporan/v_kartu_stok',$data);
		$this->load->view('templates/footer');
    }

	public function tahunan()
	{
		$q_laporan_tahunan = $this->M_laporan->getLaporan();
        $i=0;
		foreach ($q_laporan_tahunan as $param) {
			$data['laporan_tahunan'][$i] = $this->returnDataTahunan($param);
			$i++;
		}
        // echo '<pre>';
        // print_r($data['laporan_tahunan']);
        // echo '</pre>';
        // die();
        
        $sess['session'] = $this->getSession;
        $this->load->view('templates/header',$sess);
        $this->load->view('laporan/v_tahunan',$data);
        $this->load->view('templates/footer');
	}

    private function returnDataTahunan($param){
		$where['kode_barang'] = $param->kode_barang;
		$transaksi = $this->M_laporan->getTransaksi($param->kode_barang);
        

		$model = [];
        if(!empty($param)){
            if (!empty($transaksi)) {
                $model = [
                    'id_stok' => $param->id_stok,
                    'tahun' => $param->tahun,
                    'kode_barang' => $param->kode_barang,
                    'uraian' => $param->nama_barang,
                    'satuan' => $param->satuan,
                    'persediaan_fisik_awal' => $param->jumlah_stok,
                    'pembelian' => ($transaksi->status==1) ? $transaksi->jumlah : 0 ,
                    'pemakaian' => ($transaksi->status==2) ? $transaksi->jumlah : 0 ,
                    'persediaan_fisik_terbaru' => $param->jumlah_stok_terbaru,
                    'harga_satuan' => $param->harga,
                    'nilai_stok_fisik' => $param->jumlah_stok_terbaru*$param->harga
                ];
            } else {
                $model = [
                    'id_stok' => $param->id_stok,
                    'tahun' => $param->tahun,
                    'kode_barang' => $param->kode_barang,
                    'uraian' => $param->nama_barang,
                    'satuan' => $param->satuan,
                    'persediaan_fisik_awal' => $param->jumlah_stok,
                    'pembelian' => 0 ,
                    'pemakaian' => 0 ,
                    'persediaan_fisik_terbaru' => $param->jumlah_stok_terbaru,
                    'harga_satuan' => $param->harga,
                    'nilai_stok_fisik' => $param->jumlah_stok_terbaru*$param->harga
                ];
            }
        }
		$return = (object) $model;

		return $return;
	}

    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	private $getSession = null;

	public function __construct(){
		parent::__construct();

		$this->load->helper('tgl_indo');
		$this->load->model('M_barang');
		$this->load->model('M_transaksi');

		$sess = $this->getSession = $this->session->all_userdata();
		if(empty($sess['user_id'])){
            redirect('login');
        }
	}
	
	

	function index(){

        $data['list_transaksi'] = $this->M_transaksi->get_data_join();
        $data['list_barang'] = $this->M_barang->get_data_barang();
        
        $sess['session'] = $this->getSession;
		$this->load->view('templates/header',$sess);
		$this->load->view('transaksi/v_transaksi',$data);
		$this->load->view('templates/footer');
    }

	function get_detail_barang(){
		// dipanggil oleh Ajax modal input data
		$id_barang 		= $this->input->post('id', TRUE);
		$data			= $this->M_barang->get_detail_barang($id_barang);
		echo json_encode($data);

	}

	public function inputData(){
		$kode_barang = $this->input->post('id_barang');
		
		$status = $this->input->post('status');
		$insert['kode_barang'] 	= $this->input->post('id_barang');
		$insert['tanggal'] 		= $this->input->post('tanggal');
		//membuat nomor bukti
		if ($status==1) {//Beli
			$max_no_bukti = $this->M_transaksi->getMaxKodeBarang($kode_barang,$status);
			if (empty($max_no_bukti)) {
				$urutan = 1;
			} else {
				$urutan = (int) substr($max_no_bukti->no_bukti, 11, 5);
			}
			
			$urutan++;
			$no_bukti_baru = $kode_barang.'/' . sprintf("%05s", $urutan);
			
			$insert['no_bukti'] 	= 'Beli/'.$no_bukti_baru;
		} else {//Mutasi
			$max_no_bukti = $this->M_transaksi->getMaxKodeBarang($kode_barang,$status);
			if (empty($max_no_bukti)) {
				$urutan = 1;
			} else {
				$urutan = (int) substr($max_no_bukti->no_bukti, 10, 5);
			}
			
			$urutan++;
			$no_bukti_baru = $kode_barang.'/' . sprintf("%05s", $urutan);
			
			$insert['no_bukti'] 	= 'Mut/'.$no_bukti_baru ;
		}
		
		
		
		$insert['jumlah'] 		= $this->input->post('jumlah');
		$insert['harga'] 		= $this->input->post('harga');

		$insert['status'] 		= $status;
		$insert['keterangan'] 	= $this->input->post('keterangan');
		$insert['tahun'] 		= date('Y');

		$jumlah_stok_terbaru	= $this->input->post('stok');
		$jumlah_input			= $this->input->post('jumlah');
		$harga_saat_ini			= $this->input->post('harga');

		if($status=='1'){
			$jumlah_stok_terbaru	= $jumlah_stok_terbaru + $jumlah_input; 
		}else{
			$jumlah_stok_terbaru	= $jumlah_stok_terbaru - $jumlah_input;
		}

		$kode_barang 					= $this->input->post('id_barang');
		$tahun	 						= date('Y');

		// var_dump($jumlah_stok_terbaru."-".$kode_barang."-".$tahun);
		// exit();
		//1 masukkan ke tabel transaksi

        $result = $this->M_transaksi->insert($insert);  
		     	
		if($result){
			
			// 2 update jumlah_stok_terbaru di tabel stok_tahunan
			
			$data['jumlah_stok_terbaru'] 	= $jumlah_stok_terbaru;
			$data['harga'] 					= $harga_saat_ini;
			$data['tanggal_diperbarui']		= date('Y-m-d');
			
			$resultUpdateStok = $this->M_transaksi->updateStokTahunan($data, $kode_barang, $tahun);

			
			// var_dump($resultUpdateStok."-".$kode_barang."-".$tahun."-".$jumlah_stok_terbaru);
			// exit();

			if($resultUpdateStok){
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Input data berhasil dibuat');
				redirect('transaksi');
			}else{
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-warning"></span> Maaf, silakan ulangi lagi');
				redirect('transaksi');
			}
			
		}else{
			$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-warning"></span> Maaf, silakan ulangi lagi');
				redirect('transaksi');
		}

   
	}

	

	public function delete($id){    
		
		
		$where['id_transaksi'] = $id;
		$data			= $this->M_transaksi->get($where);
	
		// mengambil data transaksi yang meliputi
		// 1. Jumlah dalam transaksi
		// 2. Status Transaksi (0 masuk, 1 keluar)
		// 3. Kode barang
		
		if($data) {
			$jumlah			= $data->jumlah;
			$status			= $data->status;
			$kode_barang	= $data->kode_barang;
			$jumlah_stok_terbaru = 0;

			// Mengambil data stok terbaru
			$where2['kode_barang'] 	= $kode_barang;
			$data_stok				= $this->M_transaksi->get_stok($where2);
			
			if($data_stok){
				$jumlah_stok_terbaru	= $data_stok->jumlah_stok_terbaru;
			}

			// Menentukan data stok akan ditambah atau dikurangi berdasarkan
			// status mutasi, 0 artinya status masuk, 1 artinya status keluar
			
			if($status == 2){
				// status keluar, jika dibatalkan berarti ditambahkan ke stok
				$jumlah_stok_terbaru = $jumlah_stok_terbaru + $jumlah;

			}else{
				// status masuk, jika dibatalkan berarti stok dikurangi
				$jumlah_stok_terbaru = $jumlah_stok_terbaru - $jumlah;

			}

			// Proses menghapus data transaksi
			$prosesDelete = $this->M_transaksi->delete($id);
			if ($prosesDelete) {

				// Mengupdate data stok setelah transaksi dibatalkan/dihapus

				$item['jumlah_stok_terbaru'] 	= $jumlah_stok_terbaru;
				$item['tanggal_diperbarui']		= date('Y-m-d');
				$tahun 							= date('Y');

				// var_dump($data."-".$kode_barang."-".$tahun);
				// exit();

				$resultUpdateStok = $this->M_transaksi->updateStokTahunan($item, $kode_barang, $tahun);
	
				// var_dump($resultUpdateStok);
				// exit();
				
				if($resultUpdateStok){
					$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Input data berhasil dibuat');
					redirect('transaksi');
				}else{
					$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-warning"></span> Maaf, silakan ulangi lagi');
					redirect('transaksi');
				}
	
			} 

	
		}
		


	    
    }


}

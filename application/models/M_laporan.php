<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');

class M_laporan extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	//Kartu Stok
	public function getKartuStok($where){
    	$this->db->select('*');
		$this->db->order_by('id_transaksi', 'ASC');
        $this->db->where('kode_barang',$where);
    	$query = $this->db->get('tbl_transaksi');
    	return $query->result();
    }

    public function getStokTerbaru($where){
    	$this->db->select('jumlah_stok_terbaru');
        $this->db->where('kode_barang',$where);
    	$query = $this->db->get('tbl_stok_tahunan');
    	return $query->row();
    }

	//LAPORAN TAHUNAN
	public function getLaporan(){
    	$this->db->select('*');
		$this->db->order_by('id_stok', 'ASC');
		$this->db->join('tbl_barang','tbl_barang.kode_barang=tbl_stok_tahunan.kode_barang');
    	$query = $this->db->get('tbl_stok_tahunan');
    	return $query->result();
	}

	public function getTransaksi($where){
    	$this->db->select('*');
		$this->db->where('kode_barang',$where);
    	$query = $this->db->get('tbl_transaksi');
    	return $query->row();
	}

	
}
?>
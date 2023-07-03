<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');

class M_laporan extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

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

	
}
?>
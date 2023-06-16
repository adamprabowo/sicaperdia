<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');

class M_laporan extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getLaporan(){
    	$this->db->select('*');
		// $this->db->order_by('id_barang', 'DESC');
    	$query = $this->db->get('tbl_barang');
    	return $query->result();
    }


}
?>
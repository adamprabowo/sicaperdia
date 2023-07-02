<?php

    class M_transaksi extends CI_Model{


        /** COUNT */
        public function get_jumlah(){
            $this->db->select('count(*) as jumlah');
            return $this->db->get('tbl_transaksi')->result();
        }

        /** GET */
        function get_data(){
            return $this->db->get('tbl_transaksi')->result();
        }

        /** DETAIL */

        public function get($where){
            $this->db->select('*');
            $this->db->where($where);
            $query = $this->db->get('tbl_transaksi');
            return $query->row();
        }

        public function get_stok($where){
            $this->db->select('*');
            $this->db->where($where);
            $query = $this->db->get('tbl_stok_tahunan');
            return $query->row();
        }
        

        /** INSERT */

        function insert($data){
            $this->db->insert('tbl_transaksi', $data);
            return $this->db->affected_rows();
        }

        /** UPDATE */

        function update($data, $id){
            $this->db->where('id', $id);
            $this->db->update('tbl_transaksi', $data);
            return $this->db->affected_rows();
        }

        /** UPDATE STOK */
        function updateStokTahunan($data, $kode_barang, $tahun){
            $this->db->where('kode_barang', $kode_barang);
            $this->db->where('tahun', $tahun);
            $this->db->update('tbl_stok_tahunan', $data);
            return $this->db->affected_rows();
        }

        /** DELETE */

        function delete($id){
            $this->db->where('id_transaksi', $id);
            $this->db->delete('tbl_transaksi');
           return $this->db->affected_rows();     
        }

        /** GET DATA JOIN */

        function get_data_join(){
            
            $this->db->select('a.*,  b.nama_barang');
            $this->db->from('tbl_transaksi a');  
            $this->db->join('tbl_barang b', 'a.kode_barang = b.kode_barang', 'left');

            $query = $this->db->get();

            return $query->result();
        }
        
    }

?>
<?php

    class M_barang extends CI_Model{


        /** COUNT */
        public function get_jumlah_barang(){
            $this->db->select('count(*) as jumlah');
            return $this->db->get('tbl_barang')->result();
        }

        public function get_jumlah_kategori(){
            $this->db->select('count(*) as jumlah');
            return $this->db->get('tbl_kategori')->result();
        }

        /** GET */

        function get_data_barang(){
            return $this->db->get('tbl_barang')->result();
        }

        function get_detail_barang($id){
            $this->db->select('a.*, b.jumlah_stok_terbaru, b.harga as harga_terbaru');
            $this->db->from('tbl_barang a');  
            $this->db->join('tbl_stok_tahunan b', 'a.kode_barang = b.kode_barang', 'left');
            $this->db->where('a.kode_barang', $id);
            $query = $this->db->get();

            return $query->result();
        }


        /** GET DATA JOIN */

        function get_data_join(){
            
            $this->db->select('a.*,  b.nama_kategori, c.harga as harga_terbaru');
            $this->db->from('tbl_barang a');  
            $this->db->join('tbl_kategori b', 'a.kategori = b.id_kategori', 'left');
            $this->db->join('tbl_stok_tahunan c', 'a.kode_barang = c.kode_barang', 'left');

            $query = $this->db->get();

            return $query->result();
        }

        /** GET BY ID */
        function get_by_id($id){
            $this->db->select('a.*,  c.nama as kategori');
            $this->db->from('barang a');  
            $this->db->join('barang_histori_penerima b', 'a.id = b.id_barang', 'left');
            $this->db->where('a.id', $id);
            
            return $this->db->get('barang')->row();
        }

        /** INSERT */

        function insert($data){
            $this->db->insert('tbl_barang', $data);
            return $this->db->affected_rows();
        }     

        /** UPDATE */

        function update($data, $id){
            $this->db->where('id', $id);
            $this->db->update('tbl_barang', $data);
            return $this->db->affected_rows();
        }

        /** DELETE */

        function delete($id){
            $this->db->where('id', $id);
            $this->db->delete('tbl_barang');
           return $this->db->affected_rows();     
        }

        
        
    }

?>
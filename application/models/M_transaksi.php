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


        /** GET DATA JOIN BY ID */
        function get_by_id($id){
            $this->db->select('a.*,  c.nama as kategori, c.id as id_kategori, 
                d.status as status, d.id as id_status, 
                e.nama as penerima, e.id as id_penerima');
            $this->db->from('barang a');  
            $this->db->join('barang_histori_penerima b', 'a.id = b.id_barang', 'left');
            $this->db->join('barang_kategori c', 'a.id_kategori = c.id', 'left');
            $this->db->join('barang_status d', 'a.id_status = d.id', 'left');
            $this->db->join('pegawai e', 'e.id = b.id_penerima_terbaru', 'left');

            $this->db->where('a.id', $id);
            
            return $this->db->get('barang')->row();
        }
        
    }

?>
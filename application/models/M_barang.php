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
            $this->db->select('a.*, b.jumlah_stok_terbaru');
            $this->db->from('tbl_barang a');  
            $this->db->join('tbl_stok_tahunan b', 'a.kode_barang = b.kode_barang', 'left');
            $this->db->where('a.kode_barang', $id);
            $query = $this->db->get();

            return $query->result();
        }

        function get_barang_penerima(){
            return $this->db->get('barang_histori_penerima')->result();
        }

        function get_barang_laporan(){
            return $this->db->get('barang_laporan_kondisi')->result();
        }

        function get_barang_status(){
            return $this->db->get('barang_status')->result();
        }

        function get_barang_kategori(){
            return $this->db->get('tbl_kategori')->result();
        }

        /** GET DATA JOIN */

        function get_data_join(){
            
            $this->db->select('a.*,  b.nama_kategori');
            $this->db->from('tbl_barang a');  
            $this->db->join('tbl_kategori b', 'a.kategori = b.id_kategori', 'left');

            $query = $this->db->get();

            return $query->result();
        }

        function get_data_join_penerima($id){
            
            $this->db->select('a.*,  c.nama as penerima_terbaru');
            $this->db->from('barang_histori_penerima a');  
            $this->db->where('a.id_barang', $id);
            $this->db->join('pegawai c', 'a.id_penerima_terbaru= c.id', 'left');

            $query = $this->db->get();

            return $query->result();
        }

        /** GET BY ID */
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

        /** INSERT */

        function insert($data){
            $this->db->insert('barang', $data);
            return $this->db->affected_rows();
        }

        function insert_penerima($data){
            $this->db->insert('barang_histori_penerima', $data);
            return $this->db->affected_rows();
        }

        function insert_laporan($data){
            $this->db->insert('barang_laporan_kondisi', $data);
            return $this->db->affected_rows();
        }

        function insert_kategori($data){
            $this->db->insert('barang_kateogir', $data);
            return $this->db->affected_rows();
        }

        

        /** UPDATE */

        function update($data, $id){
            $this->db->where('id', $id);
            $this->db->update('barang', $data);
            return $this->db->affected_rows();
        }

        function update_penerima($data, $id){
            $this->db->where('id', $id);
            $this->db->update('barang_histori_penerima', $data);
            return $this->db->affected_rows();
        }

        function update_laporan($data, $id){
            $this->db->where('id', $id);
            $this->db->update('barang_laporan_kondisi', $data);
            return $this->db->affected_rows();
        }

        function update_kategori($data, $id){
            $this->db->where('id', $id);
            $this->db->update('barang_kategori', $data);
            return $this->db->affected_rows();
        }

        /** DELETE */

        function delete($id){
            $this->db->where('id', $id);
            $this->db->delete('barang');
           return $this->db->affected_rows();     
        }

        function delete_penerima($id){
            $this->db->where('id', $id);
            $this->db->delete('barang_histori_penerima');
           return $this->db->affected_rows();     
        }

        function delete_laporan($id){
            $this->db->where('id', $id);
            $this->db->delete('barang_laporan_kondisi');
           return $this->db->affected_rows();     
        }

        function delete_kategori($id){
            $this->db->where('id', $id);
            $this->db->delete('barang_kategori');
           return $this->db->affected_rows();     
        }
        
    }

?>
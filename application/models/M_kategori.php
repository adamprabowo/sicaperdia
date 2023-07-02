<?php

    class M_kategori extends CI_Model{


        /** COUNT */
        public function get_jumlah(){
            $this->db->select('count(*) as jumlah');
            return $this->db->get('tbl_kategori')->result();
        }

        /** GET */
        function get_data(){
            return $this->db->get('tbl_kategori')->result();
        }

        /** DETAIL */
        function get($id){
            $this->db->select('*');
            $this->db->from('tbl_kategori a');  
            $this->db->where('id', $id);
            return $this->db->get('tbl_kategori')->row();
        }

        /** INSERT */

        function insert($data){
            $this->db->insert('tbl_kategori', $data);
            return $this->db->affected_rows();
        }

        /** UPDATE */

        function update($data, $id){
            $this->db->where('id', $id);
            $this->db->update('tbl_kategori', $data);
            return $this->db->affected_rows();
        }

        /** DELETE */

        function delete($id){
            $this->db->where('id', $id);
            $this->db->delete('tbl_kategori');
           return $this->db->affected_rows();     
        }

        /** GET DATA JOIN */

        function get_data_join(){
            
            $this->db->select('a.*,  b.nama_kategori');
            $this->db->from('tbl_barang a');  
            $this->db->join('tbl_kategori b', 'a.kategori = b.id_kategori', 'left');

            $query = $this->db->get();

            return $query->result();
        }
        
    }

?>
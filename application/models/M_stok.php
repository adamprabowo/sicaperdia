<?php

    class M_stok extends CI_Model{

        /** GET DATA JOIN */

        function get_data_join(){
            
            $this->db->select('a.*,  b.nama_barang');
            $this->db->from('tbl_stok_tahunan a');  
            $this->db->join('tbl_barang b', 'a.kode_barang = b.kode_barang', 'left');

            $query = $this->db->get();

            return $query->result();
        }


        /** INSERT */

        function insert($data){
            $this->db->insert('tbl_stok_tahunan', $data);
            return $this->db->affected_rows();
        }

        

        /** UPDATE */

        function update($data, $id){
            $this->db->where('id', $id);
            $this->db->update('tbl_stok_tahunan', $data);
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
            $this->db->where('id', $id);
            $this->db->delete('tbl_stok_tahunan');
           return $this->db->affected_rows();     
        }

    
        
    }

?>
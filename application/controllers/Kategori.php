<?php

class Kategori extends CI_Controller{

    public function __construct() 
    { 
        parent::__construct(); 
        
        $this->load->model('M_kategori');
        $this->load->helper('tgl_indo');

        $sess = $this->getSession = $this->session->all_userdata();
		if(empty($sess['user_id'])){
            redirect('login');
        }
    } 

    function index(){

        $data['list_kategori'] = $this->M_kategori->get_data();
        
        $sess['session'] = $this->getSession;
		$this->load->view('templates/header',$sess);
		$this->load->view('kategori/v_kategori',$data);
		$this->load->view('templates/footer');
    }


    function add($id=''){
        $this->load->model('M_barang'); 

        $data['list_pegawai']   = $this->M_pegawai->get_data_pegawai();
        $data['list_kategori']  = $this->M_barang->get_barang_kategori();
        $data['list_status']    = $this->M_barang->get_barang_status();
        $data['list_bidang']    = $this->M_bidang->get_bidang();
       
        if($id){
            $data['barang']    = $this->M_barang->get_by_id($id);
        }else{
            $data['barang']    = array();
        }

        $data['page']           = "barang/v_tambah";
        
        $this->load->view('template', $data);
    }


    function lihat($id=''){
        $data['list_penerima']  = $this->M_pegawai->get_data_aktif();
       
        if($id){
            $data['barang']    = $this->M_barang->get_by_id($id);
        }else{
            $data['barang']    = array();
        }

        $data['page']           = "barang/v_lihat";
        $this->load->view('template', $data);

    }

    function add_action($id=''){

        // var_dump($_POST);
        // exit();
    
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kode_barang', 'Kode', 'required');
        $this->form_validation->set_rules('tahun_pengadaan', 'Tahun Pengadaan', 'required');
        $this->form_validation->set_rules('id_bidang', 'ID Bidang', 'required');
        $this->form_validation->set_rules('nama_penyedia', 'Nama Penyedia', 'required');
        $this->form_validation->set_rules('id_penerima', 'Penerima', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required');
        
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>');
            redirect('Barang/add/'.$id);
        }else{
            $this->load->model('M_barang'); 
        
        $nama           = $this->input->post('nama', true);
        $kode_barang    = $this->input->post('kode_barang', true);
        $tahun_pengadaan= $this->input->post('tahun_pengadaan', true);
        $id_bidang      = $this->input->post('id_bidang', true);
        $nama_penyedia  = $this->input->post('nama_penyedia', true);
        $id_kategori    = $this->input->post('id_kategori', true);
        $spesifikasi    = $this->input->post('spesifikasi', true);
        
        //$status         = $this->input->post('status', true);
        $id_status         = 1; //Normal
        
        $tanggal_dibuat = date("Y-m-d");

        $data   = [
          'nama'            => html_escape($nama),
          'kode_barang'     => html_escape($kode_barang),
          'tahun_pengadaan' => html_escape($tahun_pengadaan),
          'id_bidang'       => html_escape($id_bidang),
          'nama_penyedia'   => html_escape($nama_penyedia),
          'id_kategori'     => html_escape($id_kategori),
          'spesifikasi'     => html_escape($spesifikasi),
          'id_status'          => html_escape($id_status),
          'tanggal_dibuat'  => html_escape($tanggal_dibuat),  
        ];


        if($id){
           $result = $this->M_barang->update($data, $id);
           if($result){
            $this->session->set_flashdata('notif',
            '<div class="alert alert-success" role="alert">Berhasil menyimpan update.</div>');
           }else{
                $this->session->set_flashdata('notif',
                '<div class="alert alert-danger" role="alert">Belum berhasil menyimpan update.</div>');
           }
        }else{
        
            $result = $this->M_barang->insert($data);
            // var_dump($result);
            // exit();

            if($result){

                $this->session->set_flashdata('notif',
                    '<div class="alert alert-success" role="alert">Berhasil menyimpan data baru.</div>');
                
            
            }else{
                    $this->session->set_flashdata('notif',
                    '<div class="alert alert-danger" role="alert">Belum berhasil menyimpan data baru.</div>');
            
            }

        }
        
        
        }

        
    }


    function delete($id){

        $result = $this->M_barang->delete($id);
        if($result){

            
                $this->session->set_flashdata('notif',
                '<div class="alert alert-success" role="alert">Berhasil menghapus data.</div>');
               
            redirect('Barang');
        }else{
            $this->session->set_flashdata('notif',
            '<div class="alert alert-danger" role="alert">Belum berhasil menghapus data</div>');
    
       }
    }

}
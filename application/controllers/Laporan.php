<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	private $getSession = null;

	public function __construct(){
		parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('M_barang');
        $this->load->model('M_laporan');
		$this->load->model('M_role');
		$this->load->model('M_user');
		$this->load->view('laporan/style');
		$sess = $this->getSession = $this->session->all_userdata();
		if(empty($sess['user_id'])){
            redirect('login');
        }
	}

    function kartuStok(){
        $this->load->model('M_barang');

        $data['list_barang'] = $this->M_barang->get_data_join();
        
        $sess['session'] = $this->getSession;
		$this->load->view('templates/header',$sess);
		$this->load->view('laporan/v_barang',$data);
		$this->load->view('templates/footer');
    }

    function lihatKartuStok($id=''){
        $data['kode_barang'] = $id;
        $get_barang = $this->M_barang->get_detail_barang($id);
        $data['kartu_stok'] = $this->M_laporan->getKartuStok($data['kode_barang']);
        $jml_stok_terbaru = $this->M_laporan->getStokTerbaru($data['kode_barang']);

        $data['barang'] = $get_barang[0];
        $data['sisa'] = $jml_stok_terbaru->jumlah_stok_terbaru;

        $sess['session'] = $this->getSession;
		$this->load->view('templates/header',$sess);
		$this->load->view('laporan/v_kartu_stok',$data);
		$this->load->view('templates/footer');
    }

	public function tahunan()
	{
		$q_laporan_tahunan = $this->M_laporan->getLaporan();
        $i=0;
		foreach ($q_laporan_tahunan as $param) {
			$data['laporan_tahunan'][$i] = $this->returnDataTahunan($param);
			$i++;
		}
        
        $sess['session'] = $this->getSession;
        $this->load->view('templates/header',$sess);
        $this->load->view('laporan/v_tahunan',$data);
        $this->load->view('templates/footer');
	}

    public function generateXls(){
        // create file name
        $fileName = 'data-'.time().'.xlsx';
        // load excel library
        $this->load->library('excel');
        
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        // set Header
        $objPHPExcel->getActiveSheet()->mergeCells('A1:I1');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', "PEMERINTAH KABUPATEN KEBUMEN");
        $objPHPExcel->getActiveSheet()->mergeCells('A2:I2');
        $objPHPExcel->getActiveSheet()->setCellValue('A2', "DAFTAR PERSEDIAAN");
        $objPHPExcel->getActiveSheet()->mergeCells('A3:I3');
        $objPHPExcel->getActiveSheet()->setCellValue('A3', "PER 30 JUNI 2023");
        $objPHPExcel->getActiveSheet()->mergeCells('A4:I4');
        $objPHPExcel->getActiveSheet()->setCellValue('A4', "SKPD/OPD DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL");
        $objPHPExcel->getActiveSheet()->mergeCells('A5:I5');
        $objPHPExcel->getActiveSheet()->setCellValue('A5', "");
        $styleHeader = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A1:I5')->applyFromArray($styleHeader);
        $objPHPExcel->getActiveSheet()->getStyle('A1:I5')->getFont()->setBold(true);

        $objPHPExcel->getActiveSheet()->mergeCells('A6:A7');
        $objPHPExcel->getActiveSheet()->setCellValue('A6', "No");
        $objPHPExcel->getActiveSheet()->mergeCells('B6:B7');
        $objPHPExcel->getActiveSheet()->setCellValue('B6', "URAIAN");
        $objPHPExcel->getActiveSheet()->mergeCells('C6:C7');
        $objPHPExcel->getActiveSheet()->setCellValue('C6', "SATUAN");
        $objPHPExcel->getActiveSheet()->mergeCells('D6:D7');
        $objPHPExcel->getActiveSheet()->setCellValue('D6', "Persediaan Fisik per 31 Des 2022");
        $objPHPExcel->getActiveSheet()->mergeCells('E6:E7');
        $objPHPExcel->getActiveSheet()->setCellValue('E6', "Pembelian");
        $objPHPExcel->getActiveSheet()->mergeCells('F6:F7');
        $objPHPExcel->getActiveSheet()->setCellValue('F6', "Pemakaian");
        $objPHPExcel->getActiveSheet()->mergeCells('G6:G7');
        $objPHPExcel->getActiveSheet()->setCellValue('G6', "Persediaan Fisik per 30 Juni 2023");
        $objPHPExcel->getActiveSheet()->mergeCells('H6:H7');
        $objPHPExcel->getActiveSheet()->setCellValue('H6', "Harga Satuan");
        $objPHPExcel->getActiveSheet()->mergeCells('I6:I7');
        $objPHPExcel->getActiveSheet()->setCellValue('I6', "Nilai Stok Fisik per 30 Juni 2023");

        $objPHPExcel->getActiveSheet()->SetCellValue('A8', '1');
        $objPHPExcel->getActiveSheet()->SetCellValue('B8', '2');
        $objPHPExcel->getActiveSheet()->SetCellValue('C8', '3');
        $objPHPExcel->getActiveSheet()->SetCellValue('D8', '4');
        $objPHPExcel->getActiveSheet()->SetCellValue('E8', '5');
        $objPHPExcel->getActiveSheet()->SetCellValue('F8', '6');
        $objPHPExcel->getActiveSheet()->SetCellValue('G8', '7=(4+5-6)');
        $objPHPExcel->getActiveSheet()->SetCellValue('H8', '8');
        $objPHPExcel->getActiveSheet()->SetCellValue('I8', '9=(7X8)');
        $objPHPExcel->getActiveSheet()->getStyle('A6:I8')->applyFromArray($styleHeader);
        $objPHPExcel->getActiveSheet()->getStyle('A6:I8')->getFont()->setBold(true);

        // Set auto size
        // $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getStyle('A6')->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle('B6')->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle('C6')->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle('D6')->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle('E6')->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle('F6')->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle('G6')->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle('H6')->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle('I6')->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);

        // set Row
        // $rowCount = 10;
        // foreach ($data['laporan_tahunan'] as $list) {
        //     $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->kode_barang);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->uraian);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->satuan);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->persediaan_fisik_awal);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->pembelian);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->pemakaian);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->persediaan_fisik_terbaru);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->harga_satuan);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->nilai_stok_fisik);
        //     $rowCount++;
        // }

        //set row kategori A
        $q_kategori_A = $this->M_laporan->getSubtotal('A');
        $i=0;
		foreach ($q_kategori_A as $param) {
			$data['kategori_A'][$i] = $this->returnDataTahunan($param);
			$i++;
		}
        $rowCount_header_A = 9;
        $rowCount_A = 10;
        $pfa_A = 0;
        $pembelian_A = 0;
        $pemakaian_A = 0;
        $pft_A = 0;
        $nsf_A = 0;
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_header_A, 'A. Alat Listrik');
        $objPHPExcel->getActiveSheet()->getStyle('B'. $rowCount_header_A)->getFont()->setBold(true);
        foreach ($data['kategori_A'] as $list_A) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount_A, $list_A->kode_barang);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_A, $list_A->uraian);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount_A, $list_A->satuan);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount_A, $list_A->persediaan_fisik_awal);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount_A, $list_A->pembelian);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount_A, $list_A->pemakaian);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount_A, $list_A->persediaan_fisik_terbaru);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount_A, number_format($list_A->harga_satuan, 0, ",", ".") );
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount_A, number_format($list_A->nilai_stok_fisik, 0, ",", ".") );
            
            $rowCount_A++;
            $pfa_A+=$list_A->persediaan_fisik_awal;
            $pembelian_A+=$list_A->pembelian;
            $pemakaian_A+=$list_A->pemakaian;
            $pft_A+=$list_A->persediaan_fisik_terbaru;
            $nsf_A+=$list_A->nilai_stok_fisik;
        }
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_A, 'Subtotal');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount_A, $pfa_A);
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount_A, $pembelian_A);
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount_A, $pemakaian_A);
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount_A, $pft_A);
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount_A, number_format($nsf_A, 0, ",", "."));
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount_A.':I'.$rowCount_A.'')->getFont()->setBold(true);

        //set row kategori B
        $q_kategori_B = $this->M_laporan->getSubtotal('B');
        $i=0;
		foreach ($q_kategori_B as $param) {
			$data['kategori_B'][$i] = $this->returnDataTahunan($param);
			$i++;
		}
        $rowCount_header_B = $rowCount_A+2;
        $rowCount_B = $rowCount_A+3;
        $pfa_B = 0;
        $pembelian_B = 0;
        $pemakaian_B = 0;
        $pft_B = 0;
        $nsf_B = 0;

        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_header_B, 'B. ATK');
        $objPHPExcel->getActiveSheet()->getStyle('B'. $rowCount_header_B)->getFont()->setBold(true);
        foreach ($data['kategori_B'] as $list_B) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount_B, $list_B->kode_barang);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_B, $list_B->uraian);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount_B, $list_B->satuan);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount_B, $list_B->persediaan_fisik_awal);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount_B, $list_B->pembelian);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount_B, $list_B->pemakaian);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount_B, $list_B->persediaan_fisik_terbaru);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount_B, number_format($list_B->harga_satuan, 0, ",", "."));
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount_B, number_format($list_B->nilai_stok_fisik, 0, ",", "."));

            $rowCount_B++;
            $pfa_B+=$list_B->persediaan_fisik_awal;
            $pembelian_B+=$list_B->pembelian;
            $pemakaian_B+=$list_B->pemakaian;
            $pft_B+=$list_B->persediaan_fisik_terbaru;
            $nsf_B+=$list_B->nilai_stok_fisik;
        }
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_B, 'Subtotal');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount_B, $pfa_B);
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount_B, $pembelian_B);
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount_B, $pemakaian_B);
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount_B, $pft_B);
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount_B, number_format($nsf_B, 0, ",", "."));
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount_B.':I'.$rowCount_B.'')->getFont()->setBold(true);

        //set row kategori C
        $q_kategori_C = $this->M_laporan->getSubtotal('C');
        $i=0;
		foreach ($q_kategori_C as $param) {
			$data['kategori_C'][$i] = $this->returnDataTahunan($param);
			$i++;
		}
        
        $rowCount_header_C = $rowCount_B+2;
        $rowCount_C = $rowCount_B+3;
        $pfa_C = 0;
        $pembelian_C = 0;
        $pemakaian_C = 0;
        $pft_C = 0;
        $nsf_C = 0;
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_header_C, 'C. Kertas');
        $objPHPExcel->getActiveSheet()->getStyle('B'. $rowCount_header_C)->getFont()->setBold(true);
        foreach ($data['kategori_C'] as $list_C) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount_C, $list_C->kode_barang);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_C, $list_C->uraian);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount_C, $list_C->satuan);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount_C, $list_C->persediaan_fisik_awal);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount_C, $list_C->pembelian);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount_C, $list_C->pemakaian);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount_C, $list_C->persediaan_fisik_terbaru);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount_C, number_format($list_C->harga_satuan, 0, ",", "."));
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount_C, number_format($list_C->nilai_stok_fisik, 0, ",", "."));
            
            $rowCount_C++;
            $pfa_C+=$list_C->persediaan_fisik_awal;
            $pembelian_C+=$list_C->pembelian;
            $pemakaian_C+=$list_C->pemakaian;
            $pft_C+=$list_C->persediaan_fisik_terbaru;
            $nsf_C+=$list_C->nilai_stok_fisik;
        }
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_C, 'Subtotal');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount_C, $pfa_C);
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount_C, $pembelian_C);
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount_C, $pemakaian_C);
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount_C, $pft_C);
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount_C, number_format($nsf_C, 0, ",", "."));
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount_C.':I'.$rowCount_C.'')->getFont()->setBold(true);

        //set row kategori D
        $q_kategori_D = $this->M_laporan->getSubtotal('D');
        $i=0;
		foreach ($q_kategori_D as $param) {
			$data['kategori_D'][$i] = $this->returnDataTahunan($param);
			$i++;
		}
        
        $rowCount_header_D = $rowCount_C+2;
        $rowCount_D = $rowCount_C+3;
        $pfa_D = 0;
        $pembelian_D = 0;
        $pemakaian_D = 0;
        $pft_D = 0;
        $nsf_D = 0;
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_header_D, 'D. Bahan Komputer');
        $objPHPExcel->getActiveSheet()->getStyle('B'. $rowCount_header_D)->getFont()->setBold(true);
        foreach ($data['kategori_D'] as $list_D) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount_D, $list_D->kode_barang);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_D, $list_D->uraian);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount_D, $list_D->satuan);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount_D, $list_D->persediaan_fisik_awal);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount_D, $list_D->pembelian);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount_D, $list_D->pemakaian);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount_D, $list_D->persediaan_fisik_terbaru);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount_D, number_format($list_D->harga_satuan, 0, ",", "."));
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount_D, number_format($list_D->nilai_stok_fisik, 0, ",", "."));
            
            $rowCount_D++;
            $pfa_D+=$list_D->persediaan_fisik_awal;
            $pembelian_D+=$list_D->pembelian;
            $pemakaian_D+=$list_D->pemakaian;
            $pft_D+=$list_D->persediaan_fisik_terbaru;
            $nsf_D+=$list_D->nilai_stok_fisik;
        }
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_D, 'Subtotal');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount_D, $pfa_D);
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount_D, $pembelian_D);
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount_D, $pemakaian_D);
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount_D, $pft_D);
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount_D, number_format($nsf_D, 0, ",", "."));
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount_D.':I'.$rowCount_D.'')->getFont()->setBold(true);

        //set row kategori E
        $q_kategori_E = $this->M_laporan->getSubtotal('E');
        $i=0;
		foreach ($q_kategori_E as $param) {
			$data['kategori_E'][$i] = $this->returnDataTahunan($param);
			$i++;
		}
        
        $rowCount_header_E = $rowCount_D+2;
        $rowCount_E = $rowCount_D+3;
        $pfa_E = 0;
        $pembelian_E = 0;
        $pemakaian_E = 0;
        $pft_E = 0;
        $nsf_E = 0;
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_header_E, 'E. Barang Cetakan');
        $objPHPExcel->getActiveSheet()->getStyle('B'. $rowCount_header_E)->getFont()->setBold(true);
        foreach ($data['kategori_E'] as $list_E) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount_E, $list_E->kode_barang);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_E, $list_E->uraian);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount_E, $list_E->satuan);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount_E, $list_E->persediaan_fisik_awal);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount_E, $list_E->pembelian);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount_E, $list_E->pemakaian);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount_E, $list_E->persediaan_fisik_terbaru);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount_E, number_format($list_E->harga_satuan, 0, ",", "."));
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount_E, number_format($list_E->nilai_stok_fisik, 0, ",", "."));
            
            $rowCount_E++;
            $pfa_E+=$list_E->persediaan_fisik_awal;
            $pembelian_E+=$list_E->pembelian;
            $pemakaian_E+=$list_E->pemakaian;
            $pft_E+=$list_E->persediaan_fisik_terbaru;
            $nsf_E+=$list_E->nilai_stok_fisik;
        }
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_E, 'Subtotal');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount_E, $pfa_E);
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount_E, $pembelian_E);
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount_E, $pemakaian_E);
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount_E, $pft_E);
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount_E, number_format($nsf_E, 0, ",", "."));
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount_E.':I'.$rowCount_E.'')->getFont()->setBold(true);

        //set row kategori F
        $q_kategori_F = $this->M_laporan->getSubtotal('F');
        $i=0;
		foreach ($q_kategori_F as $param) {
			$data['kategori_F'][$i] = $this->returnDataTahunan($param);
			$i++;
		}
        
        $rowCount_header_F = $rowCount_E+2;
        $rowCount_F = $rowCount_E+3;
        $pfa_F = 0;
        $pembelian_F = 0;
        $pemakaian_F = 0;
        $pft_F = 0;
        $nsf_F = 0;
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_header_F, 'F. Alat Kebersihan dan Bahan Pembersih');
        $objPHPExcel->getActiveSheet()->getStyle('B'. $rowCount_header_F)->getFont()->setBold(true);
        foreach ($data['kategori_F'] as $list_F) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount_F, $list_F->kode_barang);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_F, $list_F->uraian);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount_F, $list_F->satuan);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount_F, $list_F->persediaan_fisik_awal);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount_F, $list_F->pembelian);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount_F, $list_F->pemakaian);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount_F, $list_F->persediaan_fisik_terbaru);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount_F, number_format($list_F->harga_satuan, 0, ",", "."));
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount_F, number_format($list_F->nilai_stok_fisik, 0, ",", "."));
            
            $rowCount_F++;
            $pfa_F+=$list_F->persediaan_fisik_awal;
            $pembelian_F+=$list_F->pembelian;
            $pemakaian_F+=$list_F->pemakaian;
            $pft_F+=$list_F->persediaan_fisik_terbaru;
            $nsf_F+=$list_F->nilai_stok_fisik;
        }
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_F, 'Subtotal');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount_F, $pfa_F);
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount_F, $pembelian_F);
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount_F, $pemakaian_F);
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount_F, $pft_F);
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount_F, number_format($nsf_F, 0, ",", "."));
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount_F.':I'.$rowCount_F.'')->getFont()->setBold(true);

        //set Total
        $q_laporan_tahunan = $this->M_laporan->getLaporan();
        $i=0;
		foreach ($q_laporan_tahunan as $param) {
			$data['laporan_tahunan'][$i] = $this->returnDataTahunan($param);
			$i++;
		}
        $total_pfa = 0;
        $total_pembelian = 0;
        $total_pemakaian = 0;
        $total_pft = 0;
        $total_nsf = 0;
        foreach ($data['laporan_tahunan'] as $lt) {
            $total_pfa+=$lt->persediaan_fisik_awal;
            $total_pembelian+=$lt->pembelian;
            $total_pemakaian+=$lt->pemakaian;
            $total_pft+=$lt->persediaan_fisik_terbaru;
            $total_nsf+=$lt->nilai_stok_fisik;
        }
        $rowCount_Total = $rowCount_F+2;
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$rowCount_Total.':C'.$rowCount_Total.'');
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount_Total, 'Jumlah');
        $styleJumlah = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount_Total.':C'.$rowCount_Total.'')->applyFromArray($styleJumlah);
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount_Total, $total_pfa);
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount_Total, $total_pembelian);
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount_Total, $total_pemakaian);
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount_Total, $total_pft);
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount_Total, number_format($total_nsf, 0, ",", "."));
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount_Total.':I'.$rowCount_Total.'')->getFont()->setBold(true);

        // Set Font Color, Font Style and Font Alignment
        $styleColomn = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A10:B'.$rowCount_Total.'')->applyFromArray($styleColomn);
        $style=array(
            'borders' => array(
              'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '000000')
              )
            ),
        );
        $objPHPExcel->getActiveSheet()->getStyle('A6:I'.$rowCount_Total.'')->applyFromArray($style);

        $filename = "tutsmake". date("Y-m-d-H-i-s").".xls";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
        $objWriter->save('php://output'); 
    }

    private function returnDataTahunan($param){
		$where['kode_barang'] = $param->kode_barang;
		$transaksi = $this->M_laporan->getTransaksi($param->kode_barang);
        
		$model = [];
        if(!empty($param)){
            $model = [
                'id_stok' => $param->id_stok,
                'tahun' => $param->tahun,
                'kode_barang' => $param->kode_barang,
                'uraian' => $param->nama_barang,
                'satuan' => $param->satuan,
                'persediaan_fisik_awal' => $param->jumlah_stok,
                'pembelian' => (!empty($transaksi)) ? ($transaksi->status==1) ? $transaksi->jumlah : 0 : 0,
                'pemakaian' => (!empty($transaksi)) ? ($transaksi->status==2) ? $transaksi->jumlah : 0 : 0,
                'persediaan_fisik_terbaru' => $param->jumlah_stok_terbaru,
                'harga_satuan' => $param->harga_satuan,
                'nilai_stok_fisik' => $param->jumlah_stok_terbaru*$param->harga_satuan
            ];
        }
		$return = (object) $model;

		return $return;
	}

    // private function returnRowExcel($kategori,$rowCount_x){
    //     //set row kategori B
    //     $q_kategori = $this->M_laporan->getSubtotal($kategori);
    //     $i=0;
	// 	foreach ($q_kategori as $param) {
	// 		$data['kategori'][$i] = $this->returnDataTahunan($param);
	// 		$i++;
	// 	}

    //     switch ($kategori) {
    //         case $kategori=='A':
    //             $rowCount=9;
    //             break;
    //         case $kategori=='B':
    //             $rowCount=9;
    //             break;
    //     }
    //     $rowCount = $rowCount_x;
    //     $pfa_B = 0;
    //     $pembelian_B = 0;
    //     $pemakaian_B = 0;
    //     $nsf_B = 0;
    //     foreach ($data['kategori_B'] as $list_B) {
    //         if ($rowCount_B == $rowCount_A+2) {
    //             $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_B, 'B. ATK');
    //             $objPHPExcel->getActiveSheet()->getStyle('B'. $rowCount_B)->getFont()->setBold(true);
    //         } else {
    //             $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount_B, $list_B->kode_barang);
    //             $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_B, $list_B->uraian);
    //             $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount_B, $list_B->satuan);
    //             $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount_B, $list_B->persediaan_fisik_awal);
    //             $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount_B, $list_B->pembelian);
    //             $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount_B, $list_B->pemakaian);
    //             $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount_B, $list_B->persediaan_fisik_terbaru);
    //             $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount_B, $list_B->harga_satuan);
    //             $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount_B, $list_B->nilai_stok_fisik);
    //         }
    //         $rowCount_B++;
    //         $pfa_B+=$list_B->persediaan_fisik_awal;
    //         $pembelian_B+=$list_B->pembelian;
    //         $pemakaian_B+=$list_B->pemakaian;
    //         $nsf_B+=$list_B->nilai_stok_fisik;
    //     }
    //     $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount_B, 'Subtotal');
    //     $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount_B, $pfa_B);
    //     $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount_B, $pembelian_B);
    //     $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount_B, $pemakaian_B);
    //     $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount_B, $nsf_B);
    //     $objPHPExcel->getActiveSheet()->getStyle('A'.$rowCount_B.':I'.$rowCount_B.'')->getFont()->setBold(true);
    // }

    

    
}

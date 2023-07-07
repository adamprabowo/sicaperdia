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
        $data['subtotal_A'] = [
            'pfa' => 20,
            'pembelian' => 10,
            'pemakaian' => 5,
            'pft' => 25,
            'stok_fisik' => 20000
        ];
        $data['subtotal_B'] = [
            'pfa' => 30,
            'pembelian' => 20,
            'pemakaian' => 25,
            'pft' => 45,
            'stok_fisik' => 40000
        ];
        $data['subtotal_C'] = [
            'pfa' => 30,
            'pembelian' => 10,
            'pemakaian' => 35,
            'pft' => 55,
            'stok_fisik' => 60000
        ];
        $data['subtotal_D'] = [
            'pfa' => 20,
            'pembelian' => 10,
            'pemakaian' => 5,
            'pft' => 25,
            'stok_fisik' => 20000
        ];
        $data['subtotal_E'] = [
            'pfa' => 20,
            'pembelian' => 10,
            'pemakaian' => 5,
            'pft' => 25,
            'stok_fisik' => 20000
        ];
        $data['subtotal_F'] = [
            'pfa' => 20,
            'pembelian' => 10,
            'pemakaian' => 5,
            'pft' => 25,
            'stok_fisik' => 20000
        ];
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die();
        
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
        $q_laporan_tahunan = $this->M_laporan->getLaporan();
        $i=0;
		foreach ($q_laporan_tahunan as $param) {
			$data['laporan_tahunan'][$i] = $this->returnDataTahunan($param);
			$i++;
		}
        
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
        $rowCount = 10;
        foreach ($data['laporan_tahunan'] as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->kode_barang);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->uraian);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->satuan);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->persediaan_fisik_awal);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->pembelian);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->pemakaian);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->persediaan_fisik_terbaru);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->harga_satuan);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->nilai_stok_fisik);
            $rowCount++;
        }

        // Set Font Color, Font Style and Font Alignment
        $styleColomn = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A10:B'.$rowCount.'')->applyFromArray($styleColomn);
        $style=array(
            'borders' => array(
              'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '000000')
              )
            ),
        );
        $objPHPExcel->getActiveSheet()->getStyle('A6:I'.$rowCount.'')->applyFromArray($style);

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

    

    
}

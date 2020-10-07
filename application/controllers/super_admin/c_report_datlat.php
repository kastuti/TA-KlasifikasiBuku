<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_report_datlat extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('m_datlat');
        $this->load->library('pdf');
  	}
  	
	public function index()
	{
		$isi['content'] 	= 'datlat/v_datlat';
		$isi['judul'] 		= 'Data Latih';
		$isi['datlat']		= $this->db->get('tb_datlat')->result();
		$isi['data']        = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('super_admin/v_header',$isi);
        $this->load->view('super_admin/v_menu',$isi);
        $this->load->view('super_admin/v_topnav',$isi);
		$this->load->view('super_admin/v_report_datlat',$isi);
        $this->load->view('super_admin/v_footer',$isi);
		
	}

	public function export_excel()
	{
		$data['data_latih'] = $this->db->get('tb_datlat')->result();
		$data_latih = $this->m_datlat->tampilDatlat_Excel()->result();

		$spreadsheet = new Spreadsheet;
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1','No')
		->setCellValue('B1','ID')
		->setCellValue('C1','Judul/Sinopsis Buku')
		->setCellValue('D1','Kategori');

		$kolom = 2;
		$no = 1;
		foreach ($data_latih as $datlat) {
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A' . $kolom, $no)
			->setCellValue('B' . $kolom, $datlat->id_datlat)
			->setCellValue('C' . $kolom, $datlat->js_buku)
			->setCellValue('D' . $kolom, $datlat->kategori);
			
			$kolom++;
			$no++;    
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Data Latih.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function export_Pdf(){
		$pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(265,8,'DATA LATIH',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(15,6,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(10,6,'No',1,0);
        $pdf->Cell(10,6,'ID',1,0);
        $pdf->Cell(185,6,'Judul/Sinopsis Buku',1,0);
        $pdf->Cell(70,6,'Kategori',1,1);
        $pdf->SetFont('Arial','',8);
        $datlat = $this->db->get('tb_datlat')->result();
        $no=0;
        $no++;
        foreach ($datlat as $row){
        	$pdf->Cell(10,6,$no++,1,0);
            $pdf->Cell(10,6,$row->id_datlat,1,0);
            $pdf->Cell(185,6,$row->js_buku,1,0);
            $pdf->Cell(70,6,$row->kategori,1,1); 
        }
        $pdf->Output('Data Latih.pdf' ,  'D');
  	}
}

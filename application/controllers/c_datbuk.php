<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_datbuk extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('m_datbuk');
        $this->load->library('pdf');
    }

	public function index()
	{
		$isi['content'] 	= 'datbuk/v_datbuk';
		$isi['judul'] 		= 'Data Buku';
		$isi['datbuk']		= $this->db->get('tb_buku')->result();
		$isi['data']        = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
		$isi['data_uji'] 	= $this->m_datbuk->getKlasbuk();

		$this->load->view('v_header',$isi);
        $this->load->view('v_menu',$isi);
        $this->load->view('v_topnav',$isi);
		$this->load->view('datbuk/v_datbuk',$isi);
        $this->load->view('v_footer',$isi);
		
	}

	public function tambahBuku()
	{
		$judul_buku = $this->input->post('judul_buku');
		$isbn = $this->input->post('isbn');
		$penerbit = $this->input->post('penerbit');
		$tahun_terbit= $this->input->post('tahun_terbit');
		$tempat_terbit = $this->input->post('tempat_terbit');
		$klasifikasi = $this->input->post('klasifikasi');
		$sinopsis = $this->input->post('sinopsis');
		$pengarang = $this->input->post('pengarang');
		$id_buku = $this->input->post('id_buku');
		$config['upload_path'] = './upload/cover/';
        $config['allowed_types'] = 'gif|jpg|png';
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('cover')) {	
        	$data = array(
        		'judul_buku' => $judul_buku,
				'isbn' => $isbn,
				'penerbit' => $penerbit,
				'tahun_terbit' => $tahun_terbit,
				'tempat_terbit' => $tempat_terbit,
				'klasifikasi' => $klasifikasi,
				'sinopsis' => $sinopsis,
				'pengarang' => $pengarang,
				'cover' => 'cover.png'
        	);
        	$this->m_datbuk->input($data);
        	redirect('c_datbuk');
        } else {
            $result = $this->upload->data();
            $result1 =$result['file_name'];
            
            $data = array(
				'judul_buku' => $judul_buku,
				'isbn' => $isbn,
				'penerbit' => $penerbit,
				'tahun_terbit' => $tahun_terbit,
				'tempat_terbit' => $tempat_terbit,
				'klasifikasi' => $klasifikasi,
				'sinopsis' => $sinopsis,
				'pengarang' => $pengarang,
				'cover' => $result1
			);	
		$this->m_datbuk->input($data);
		redirect('c_datbuk');
        }
	}

	public function hapus($id){
		$where = array('id_buku' => $id);
		$this->m_datbuk->delete_data($where,'tb_buku');
		redirect('c_datbuk');
	}

	public function edit($id_buku)
	{
		$isi['datbuk'] = $this->db->get_where('tb_buku', ['id_buku' => $id_buku])->row_array();
		$isi['data'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('v_header',$isi);
	    $this->load->view('v_menu',$isi);
	    $this->load->view('v_topnav',$isi);
		$this->load->view('datbuk/v_ubah_buku',$isi);
	    $this->load->view('v_footer',$isi);
	}

	public function prosesEdit()
	{
		$judul_buku = $this->input->post('judul_buku');
		$isbn = $this->input->post('isbn');
		$penerbit = $this->input->post('penerbit');
		$tahun_terbit= $this->input->post('tahun_terbit');
		$tempat_terbit = $this->input->post('tempat_terbit');
		$klasifikasi = $this->input->post('klasifikasi');
		$sinopsis = $this->input->post('sinopsis');
		$pengarang = $this->input->post('pengarang');
		$id_buku = $this->input->post('id_buku');
		$config['upload_path'] = './upload/cover/';
        $config['allowed_types'] = 'gif|jpg|png';
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('cover')) {
        	
        } else {
            $result = $this->upload->data();
            $result1 =$result['file_name'];

		$data = array(

			'judul_buku' => $judul_buku,
			'isbn' => $isbn,
			'penerbit' => $penerbit,
			'tahun_terbit' => $tahun_terbit,
			'tempat_terbit' => $tempat_terbit,
			'klasifikasi' => $klasifikasi,
			'sinopsis' => $sinopsis,
			'pengarang' => $pengarang,
			'cover' => $result1
		);
		$this->db->where('id_buku', $id_buku);
        $this->db->update('tb_buku', $data);
		redirect('c_datbuk');
		}
	}

	public function export_excel()
	{
		$data['data_buku'] = $this->db->get('tb_buku')->result();
		$data_buku = $this->m_datbuk->tampilBuku_Excel()->result();

		$spreadsheet = new Spreadsheet;
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1','No')
		->setCellValue('B1','ID')
		->setCellValue('C1','Judul Buku')
		->setCellValue('D1','ISBN')
		->setCellValue('E1','Penerbit')
		->setCellValue('F1','Tahun Terbit')
		->setCellValue('G1','Tempat Terbit')
		->setCellValue('H1','Kategori')
		->setCellValue('I1','Sinopsis')
		->setCellValue('J1','Pengarang')
		->setCellValue('K1','Cover');

		$kolom = 2;
		$no = 1;
		foreach ($data_buku as $datbuk) {
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A' . $kolom, $no)
			->setCellValue('B' . $kolom, $datbuk->id_buku)
			->setCellValue('C' . $kolom, $datbuk->judul_buku)
			->setCellValue('D' . $kolom, $datbuk->isbn)
			->setCellValue('E' . $kolom, $datbuk->penerbit)
			->setCellValue('F' . $kolom, $datbuk->tahun_terbit)
			->setCellValue('G' . $kolom, $datbuk->tempat_terbit)
			->setCellValue('H' . $kolom, $datbuk->klasifikasi)
			->setCellValue('I' . $kolom, $datbuk->sinopsis)
			->setCellValue('J' . $kolom, $datbuk->pengarang)
			->setCellValue('K' . $kolom, $datbuk->cover);

			$kolom++;
			$no++;    
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Data Buku.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function export_Pdf(){
		$pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(277,6,'DATA BUKU',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,6,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(10,6,'ID',1,0);
        $pdf->Cell(120,6,'Judul Buku',1,0);
        $pdf->Cell(25,6,'ISBN',1,0);
        $pdf->Cell(25,6,'Penerbit',1,0);
        $pdf->Cell(23,6,'Tahun Terbit',1,0);
        $pdf->Cell(30,6,'Tempat Terbit',1,0);
        $pdf->Cell(17,6,'Kategori',1,0);
        $pdf->Cell(30,6,'Pengarang',1,1);
        $pdf->SetFont('Arial','',8);
        $datbuk = $this->db->get('tb_buku')->result();
        foreach ($datbuk as $row){
            $pdf->Cell(10,6,$row->id_buku,1,0);
            $pdf->Cell(120,6,$row->judul_buku,1,0);
            $pdf->Cell(25,6,$row->isbn,1,0);
            $pdf->Cell(25,6,$row->penerbit,1,0);
            $pdf->Cell(23,6,$row->tahun_terbit,1,0); 
            $pdf->Cell(30,6,$row->tempat_terbit,1,0); 
            $pdf->Cell(17,6,$row->klasifikasi,1,0);  
            $pdf->Cell(30,6,$row->pengarang,1,1); 
        }
        $pdf->Output('Data Buku.pdf' ,  'D');
  	}
}

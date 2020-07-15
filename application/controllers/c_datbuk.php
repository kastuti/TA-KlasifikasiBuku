<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_datbuk extends CI_Controller {

	function __construct(){
        parent::__construct();
        // konfigurasi helper & library
        // $this->load->helper('url');
        // $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('m_datbuk');
  //       if($this->session->userdata('status') != "login"){
		// 	redirect(base_url("c_datlat"));
		// }
    }

	public function index()
	{
		$isi['content'] 	= 'datbuk/v_datbuk';
		$isi['judul'] 		= 'Data Buku';
		$isi['data']		= $this->db->get('tb_buku');
		
		$this->load->view('datbuk/v_datbuk',$isi);
	}

	public function input()
	{
		$isi['content'] 	= 'datbuk/v_tambah_buku';
		$isi['judul'] 		= 'Tambah Data Buku';
		$this->load->view('datbuk/v_tambah_buku',$isi);

		if(isset($_POST['submit']))
		{
			//$this->load->library('upload',$isi);
			$isi['upload_path'] = './upload/';
			$isi['allowed_types'] = 'gif|jpg|png';
			$isi['max_size'] = '1000';
			$isi['max_width'] = '2000';
			$isi['max_height'] = '1024';

			$this->input->initialize($isi);
			if(!$this->input->do_input('cover'))
			{
				$cover="";
			}
			else
			{
				$cover = $this->input->cover;
			}
		}
	}

	public function simpan(){
		$judul_buku = $this->input->post('judul_buku');
		$edisi = $this->input->post('edisi');
		$isbn = $this->input->post('isbn');
		$penerbit = $this->input->post('penerbit');
		$tahun_terbit= $this->input->post('tahun_terbit');
		$deskripsi_fisik = $this->input->post('deskripsi_fisik');
		$bahasa = $this->input->post('bahasa');
		$tempat_terbit = $this->input->post('tempat_terbit');
		$klasifikasi = $this->input->post('klasifikasi');
		$sinopsis = $this->input->post('sinopsis');
		$pengarang = $this->input->post('pengarang');
		$cover = $this->input->post('cover');
		

		$data = array(
			'judul_buku' => $judul_buku,
			'edisi' => $edisi,
			'isbn' => $isbn,
			'penerbit' => $penerbit,
			'tahun_terbit' => $tahun_terbit,
			'deskripsi_fisik' => $deskripsi_fisik,
			'bahasa' => $bahasa,
			'tempat_terbit' => $tempat_terbit,
			'klasifikasi' => $klasifikasi,
			'sinopsis' => $sinopsis,
			'pengarang' => $pengarang,
			'cover' => $cover,
			);
		
		$this->m_datbuk->insert_data($data,'tb_buku');
		redirect('c_datbuk');
	}

	public function hapus($id){
		$where = array('id_buku' => $id);
		$this->m_datbuk->delete_data($where,'tb_buku');
		redirect('c_datbuk');
	}

	function ubah($id)
	{
		$isi['content'] = 'datbuk/v_ubah_buku';
		$isi['judul'] 	= 'Edit Data Buku';
		$isi['c_datbuk'] = $this->m_datbuk->getDatbukById($id);

		$this->form_validation->set_rules('judul_buku', 'JudulBuku', 'required');
		$this->form_validation->set_rules('edisi', 'Edisi', 'required');
		$this->form_validation->set_rules('isbn', 'ISBN', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('tahun_terbit', 'TahunTerbit', 'trim|required|numeric');
		$this->form_validation->set_rules('deskripsi_fisik', 'DeskripsiFisik', 'required');
		$this->form_validation->set_rules('bahasa', 'Bahasa', 'required');
		$this->form_validation->set_rules('tempat_terbit', 'TempatTerbit', 'required');
		$this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required');
		$this->form_validation->set_rules('sinopsis', 'Sinopsis', 'required');
		$this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
		$this->form_validation->set_rules('cover', 'Cover', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('datbuk/v_ubah_buku',$isi);
			
		}else{
			$this->m_datbuk->ubahDataBuku();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('c_datbuk');
		}	
	}
}

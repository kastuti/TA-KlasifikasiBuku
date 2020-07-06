<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_datbuk extends CI_Controller {

	function __construct(){
        parent::__construct();
        // konfigurasi helper & library
        // $this->load->helper('url');
        // $this->load->library('pagination');
        // $this->load->library('form_validation');
        // $this->load->database();
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
	}

	public function simpan(){
		$judul_buku = $this->input->post('judul_buku');
		$isbn = $this->input->post('isbn');
		$penerbit = $this->input->post('penerbit');
		$tahun_terbit= $this->input->post('tahun_terbit');
		$tempat_terbit = $this->input->post('tempat_terbit');
		$deskripsi = $this->input->post('deskripsi');

		$data = array(
			'judul_buku' => $judul_buku,
			'isbn' => $isbn,
			'penerbit' => $penerbit,
			'tahun_terbit' => $tahun_terbit,
			'tempat_terbit' => $tempat_terbit,
			'deskripsi' => $deskripsi,
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
		$this->form_validation->set_rules('isbn', 'ISBN', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('tahun_terbit', 'TahunTerbit', 'trim|required|numeric');
		$this->form_validation->set_rules('tempat_terbit', 'TempatTerbit', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('datbuk/v_ubah_buku',$isi);
			
		}else{
			$this->m_datbuk->ubahDataBuku();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('c_datbuk');
		}	
	}
}

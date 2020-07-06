<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_klasbuk extends CI_Controller {

	function __construct(){
        parent::__construct();
        // konfigurasi helper & library
        // $this->load->helper('url');
        // $this->load->library('pagination');
        // $this->load->library('form_validation');
        // $this->load->database();
        $this->load->model('m_klasbuk');
  //       if($this->session->userdata('status') != "login"){
		// 	redirect(base_url("c_datlat"));
		// }
    }

	public function index()
	{
		$isi['content'] 	= 'klasbuk/v_klasbuk';
		$isi['judul'] 		= 'Data Klasifikasi Buku';
		$isi['data']		= $this->db->get('tb_klasbuk');
		$this->load->view('klasbuk/v_klasbuk',$isi);
	}

	public function input()
	{
		$isi['content'] 	= 'klasbuk/v_tambah_klasbuk';
		$isi['judul'] 		= 'Tambah Data Klasifikasi Buku';
		$this->load->view('klasbuk/v_tambah_klasbuk',$isi);
	}

	public function simpan(){
		$judul_buku = $this->input->post('judul_buku');
		$kategori = $this->input->post('kategori');
		$hasil_klasifikasi = $this->input->post('hasil_klasifikasi');

		$data = array(
			'judul_buku' => $judul_buku,
			'kategori' => $kategori,
			'hasil_klasifikasi' => $hasil_klasifikasi,
			);
		
		$this->m_klasbuk->insert_data($data,'tb_klasbuk');
		redirect('c_klasbuk');
	}

	// public function hapus($id){
	// 	$where = array('id_buku' => $id);
	// 	$this->m_datbuk->delete_data($where,'tb_buku');
	// 	redirect('c_datbuk');
	// }

	// function ubah($id)
	// {
	// 	$isi['content'] = 'datbuk/v_ubah_buku';
	// 	$isi['judul'] 	= 'Edit Data Buku';
	// 	$isi['c_datbuk'] = $this->m_datbuk->getDatbukById($id);

	// 	$this->form_validation->set_rules('judul_buku', 'JudulBuku', 'required');
	// 	$this->form_validation->set_rules('isbn', 'ISBN', 'required');
	// 	$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
	// 	$this->form_validation->set_rules('tahun_terbit', 'TahunTerbit', 'trim|required|numeric');
	// 	$this->form_validation->set_rules('tempat_terbit', 'TempatTerbit', 'required');
	// 	$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->load->view('datbuk/v_ubah_buku',$isi);
			
	// 	}else{
	// 		$this->m_datbuk->ubahDataBuku();
	// 		$this->session->set_flashdata('flash', 'Diubah');
	// 		redirect('c_datbuk');
	// 	}	
	// }
}

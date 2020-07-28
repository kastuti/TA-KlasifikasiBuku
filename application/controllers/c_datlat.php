<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_datlat extends CI_Controller {

	function __construct(){
        parent::__construct();
        // konfigurasi helper & library
        // $this->load->helper('url');
        // $this->load->library('pagination');
        // $this->load->library('form_validation');
        // $this->load->database();
        $this->load->model('m_datlat');
  	}
  	
	public function index()
	{
		$isi['content'] 	= 'datlat/v_datlat';
		$isi['judul'] 		= 'Data Latih';
		$isi['datlat']		= $this->db->get('tb_datlat')->result();
		$isi['data']        = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();


		$this->load->view('v_header',$isi);
        $this->load->view('v_menu',$isi);
        $this->load->view('v_topnav',$isi);
		$this->load->view('datlat/v_datlat',$isi);
        $this->load->view('v_footer',$isi);
		
	}

	public function input()
	{
		$isi['content'] 	= 'datlat/v_tambah_datlat';
		$isi['judul'] 		= 'Tambah Data Latih';
		$this->load->view('datlat/v_tambah_datlat',$isi);
	}

	public function simpan(){
		$judul_buku = $this->input->post('judul_buku');
		$sinopsis = $this->input->post('sinopsis');
		$kategori = $this->input->post('kategori');
		// $hasil = $this->input->post('hasil');
		// $frekuensi = $this->input->post('frekuensi');
		// $tgl_dibuat = $this->input->post('tgl_dibuat');

		$data = array(
			'judul_buku' => $judul_buku,
			'sinopsis' => $sinopsis,
			'kategori' => $kategori,
			// 'hasil' => $hasil,
			// 'frekuensi' => $frekuensi,
			// 'tgl_dibuat' => $tgl_dibuat,
			);
		
		$this->m_datlat->insert_data($data,'tb_datlat');
		redirect('c_datlat');
	}

	// public function hapus($id){
	// 	$where = array('id' => $id);
	// 	$this->m_datlat->delete_data($where,'tb_datlat');
	// 	redirect('c_datlat');
	// }
}

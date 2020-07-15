<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kategori extends CI_Controller {

	function __construct(){
        parent::__construct();
        // konfigurasi helper & library
        // $this->load->helper('url');
        // $this->load->library('pagination');
        // $this->load->library('form_validation');
        // $this->load->database();
        $this->load->model('m_kategori');
  //       if($this->session->userdata('status') != "login"){
		// 	redirect(base_url("c_datlat"));
		// }
    }

	public function index()
	{
		$isi['content'] 	= 'datlat/v_kategori';
		$isi['judul'] 		= 'Data Kategori';
		$isi['data']		= $this->db->get('tb_kategori');
		$this->load->view('datlat/v_kategori',$isi);
	}

	// public function input()
	// {
	// 	$isi['content'] 	= 'datlat/v_tambah_datlat';
	// 	$isi['judul'] 		= 'Tambah Data Latih';
	// 	$this->load->view('datlat/v_tambah_datlat',$isi);
	// }

	public function simpan(){
		$judul_buku = $this->input->post('nama_kategori');

		$data = array(
			'judul_buku' => $nama_kategori,
			);
		
		$this->m_kategori->insert_data($data,'tb_kategori');
		redirect('c_kategori');
	}

	// public function hapus($id){
	// 	$where = array('id' => $id);
	// 	$this->m_datlat->delete_data($where,'tb_datlat');
	// 	redirect('c_datlat');
	// }
}

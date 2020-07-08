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
  //       if($this->session->userdata('status') != "login"){
		// 	redirect(base_url("c_datlat"));
		// }
    }

	public function index()
	{
		$isi['content'] 	= 'datlat/v_datlat';
		$isi['judul'] 		= 'Data Latih';
		$isi['data']		= $this->db->get('tb_datlat');
		$this->load->view('datlat/v_datlat',$isi);
	}

	public function input()
	{
		$isi['content'] 	= 'datlat/v_tambah_datlat';
		$isi['judul'] 		= 'Tambah Data Latih';
		$this->load->view('datlat/v_tambah_datlat',$isi);
	}

	public function simpan(){
		$js_buku = $this->input->post('js_buku');
		$kategori = $this->input->post('kategori');
		// $tgl_dibuat = $this->input->post('tgl_dibuat');

		$data = array(
			'js_buku' => $js_buku,
			'kategori' => $kategori,
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

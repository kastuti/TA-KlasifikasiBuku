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
		$isi['kategori']	= $this->db->get('tb_kategori')->result();
		$isi['data']        = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('v_header',$isi);
        $this->load->view('v_menu',$isi);
        $this->load->view('v_topnav',$isi);
		$this->load->view('datlat/v_kategori',$isi);
        $this->load->view('v_footer',$isi);
		
	}

	public function input()
	{
		$isi['content'] 	= 'datlat/v_kategori';
		$isi['judul'] 		= 'Tambah Data Kategori';
		$this->load->view('datlat/v_kategori',$isi);
	}

	public function simpan(){
		$kd_kategori = $this->input->post('kd_kategori');
		$nama_kategori = $this->input->post('nama_kategori');

		$data = array(
			'kd_kategori' => $kd_kategori,
			'nama_kategori' => $nama_kategori,
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

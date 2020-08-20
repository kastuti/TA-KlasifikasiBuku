<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_klasbuk extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('m_klasbuk');
    }

	public function index()
	{
		$isi['content'] 	= 'klasbuk/v_klasbuk';
		$isi['judul'] 		= 'Data Klasifikasi Buku';
		$isi['klasbuk']		= $this->db->get('tb_klasbuk')->result();
		$isi['data']        = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('v_header',$isi);
        $this->load->view('v_menu',$isi);
        $this->load->view('v_topnav',$isi);
		$this->load->view('klasbuk/v_klasbuk',$isi);
        $this->load->view('v_footer',$isi);
		
	}

	public function input()
	{
		$isi['content'] 	= 'klasbuk/v_tambah_klasbuk';
		$isi['judul'] 		= 'Tambah Data Klasifikasi Buku';
		$this->load->view('klasbuk/v_tambah_klasbuk',$isi);
	}

	public function simpan(){
		$js_buku = $this->input->post('js_buku');
		$hasil = $this->input->post('hasil');

		$data = array(
			'js_buku' => $js_buku,
			'hasil' => $hasil,
			);
		
		$this->m_klasbuk->insert_data($data,'tb_klasbuk');
		redirect('c_klasbuk');
	}
}

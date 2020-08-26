<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_perhitungan extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('m_perhitungan');
    }

	public function index()
	{
		$isi['judul'] 		= 'Data Klasifikasi Buku';
		$isi['klasbuk']		= $this->db->get('tb_klasbuk')->result();
		$isi['data']        = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('v_header',$isi);
        $this->load->view('v_menu',$isi);
        $this->load->view('v_topnav',$isi);
		$this->load->view('klasbuk/v_perhitungan',$isi);
        $this->load->view('v_footer',$isi);
		
	}
}
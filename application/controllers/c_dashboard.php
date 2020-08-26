<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('m_dashboard');
    }

    public function index(){
		$isi['data']        = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $isi['total_datlat'] =  $this->m_dashboard->total_datlat();
        $isi['total_klasbuk'] =  $this->m_dashboard->total_klasbuk();
        $isi['total_buku'] =  $this->m_dashboard->total_buku();
        $isi['total_admin'] = $this->m_dashboard->total_admin();

        $this->load->view('v_header',$isi);
        $this->load->view('v_menu',$isi);
        $this->load->view('v_topnav',$isi);
		$this->load->view('v_dashboard',$isi);
        $this->load->view('v_footer',$isi);
	}

    public function blocked()
    {
        $this->load->view('v_error_user');
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_s_dashboard extends CI_Controller {

	function __construct(){
        parent::__construct();
        // login_in_s_admin();
        $this->load->model('m_s_dashboard');
    }

    public function index(){
		$isi['data']        = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $isi['total_datlat'] =  $this->m_s_dashboard->total_datlat();
        $isi['total_klasbuk'] =  $this->m_s_dashboard->total_klasbuk();
        $isi['total_buku'] =  $this->m_s_dashboard->total_buku();
        $isi['total_admin'] = $this->m_s_dashboard->total_admin();

        $this->load->view('super_admin/v_header',$isi);
        $this->load->view('super_admin/v_menu',$isi);
        $this->load->view('super_admin/v_topnav',$isi);
		$this->load->view('super_admin/v_s_dashboard',$isi);
        $this->load->view('super_admin/v_footer',$isi);
	}

    public function blocked()
    {
        $this->load->view('v_error_user');
    }

}

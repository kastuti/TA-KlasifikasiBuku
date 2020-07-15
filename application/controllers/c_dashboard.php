<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->database();
        // if($this->session->userdata('status') != "login"){
		// 	redirect(base_url("c_dashboard"));
		// }
    }

    public function index(){

    	$isi['content'] 	= 'v_dashboard';
		$isi['judul'] 		= 'Dashboard';
		// $isi['data']        = $this->db->get_where('tb_admin', ['email' =>
		// 	                  $this->session->userdata('email')])->row_array();
		$this->load->view('v_dashboard',$isi);
	}

}

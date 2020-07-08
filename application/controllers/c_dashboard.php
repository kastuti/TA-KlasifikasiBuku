<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

	// function __construct(){
 //        parent::__construct();
 //        // $this->load->helper('url');
 //        // $this->load->library('pagination');
 //        // $this->load->database();
 //        if($this->session->userdata('status') != "login"){
	// 		redirect(base_url("c_dashboard"));
	// 	}
 //    }

    public function index(){

    	$isi['content'] 	= 'v_dashboard';
		$isi['judul'] 		= 'Dashboard';
		$this->load->view('v_dashboard',$isi);
	}

}

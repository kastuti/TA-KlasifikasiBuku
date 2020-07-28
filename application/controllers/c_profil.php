<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_profil extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('url');
        // $this->load->library('pagination');
        $this->load->database();
        $this->load->library('form_validation');
        // $this->load->database();
        $this->load->model('m_profil');
        // if($this->session->userdata('status') != "login"){
		// 	redirect(base_url("c_dashboard"));
		// }
    }

    public function index(){

    	$isi['content'] 	= 'profil/v_profil';
		$isi['judul'] 		= 'Profil';
        $isi['data']        = $this->db->get_where('tb_admin', ['email' =>
                              $this->session->userdata('email')])->row_array();

        $this->load->view('v_header',$isi);
        $this->load->view('v_menu',$isi);
        $this->load->view('v_topnav',$isi);
        $this->load->view('profil/v_profil',$isi);
        $this->load->view('v_footer',$isi);
    
	}
    
    public function ubah($id)
    {
        $isi['content'] = 'profil/v_ubah_profil';
        $isi['judul']   = 'Edit Data Profil';
         $isi['data']        = $this->db->get_where('tb_admin', ['email' =>
                              $this->session->userdata('email')])->row_array();
        $isi['c_profil'] = $this->m_profil->getProfilById($id);

        // $this->form_validation->set_rules('email', 'Email', 'required');
        // $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required');
        // $this->form_validation->set_rules('foto', 'Foto', 'required');
        
        // if ($this->form_validation->run() == FALSE) {

            $this->load->view('v_header',$isi);
            $this->load->view('v_menu',$isi);
            $this->load->view('v_topnav',$isi);
            $this->load->view('profil/v_ubah_profil',$isi);
            $this->load->view('v_footer',$isi);
            
        // }else{
            
        // }   
    }

    public function prosesEdit($id)
    {
        $this->m_profil->ubahProfil($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('c_profil');
    }

}

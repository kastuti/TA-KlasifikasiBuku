<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_profil extends CI_Controller {

	function __construct(){
        parent::__construct();
        // konfigurasi helper & library
        // $this->load->helper('url');
        // $this->load->library('pagination');
        // $this->load->library('form_validation');
        // $this->load->database();
        $this->load->model('m_profil');
  //       if($this->session->userdata('status') != "login"){
		// 	redirect(base_url("c_datlat"));
		// }
    }

	public function index()
	{
		$isi['content'] 	= 'profil/v_profil';
		$isi['judul'] 		= 'Data Profil Admin';
		$isi['data']		= $this->db->get('tb_admin');
		$this->load->view('profil/v_profil',$isi);
	}

	function ubah($id)
	{
		$isi['content'] = 'profil/v_ubah_profil';
		$isi['judul'] 	= 'Edit Data Profil Admin';
		$isi['c_profil'] = $this->m_profil->getDatprofById($id);

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('profil/v_ubah_profil',$isi);
			
		}else{
			$this->m_profil->ubahDataProfil();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('c_profil');
		}	
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_profil extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('m_profil');
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

    public function editadmin()
    {
        $isi['data'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('v_header',$isi);
            $this->load->view('v_menu',$isi);
            $this->load->view('v_topnav',$isi);
            $this->load->view('profil/v_ubah_profil',$isi);
            $this->load->view('v_footer',$isi);  
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');

            //  jika ada gambar yang diupload
            $upload_image = $_FILES['foto']['nama'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './upload';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto'))
                {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $this->db->update('tb_admin');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data profil telah di edit! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('c_profil');

        }
    }

    // public function ubah($id)
    // {
    //     $isi['content'] = 'profil/v_ubah_profil';
    //     $isi['judul']   = 'Edit Data Profil';
    //     $isi['data']        = $this->db->get_where('tb_admin', ['email' =>
    //                           $this->session->userdata('email')])->row_array();
    //     $isi['c_profil'] = $this->m_profil->getProfilById($id);

    //         $this->load->view('v_header',$isi);
    //         $this->load->view('v_menu',$isi);
    //         $this->load->view('v_topnav',$isi);
    //         $this->load->view('profil/v_ubah_profil',$isi);
    //         $this->load->view('v_footer',$isi);  
    // }

    // public function prosesEdit($id)
    // {
    //     $this->m_profil->ubahProfil($id);
    //         $this->session->set_flashdata('flash', 'Diubah');
    //         redirect('c_profil');
    // }

}

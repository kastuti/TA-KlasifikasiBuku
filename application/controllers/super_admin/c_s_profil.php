<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_s_profil extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('m_s_profil');
    }

    public function index(){
        $isi['data']        = $this->db->get_where('tb_admin', ['email' =>
                              $this->session->userdata('email')])->row_array();

        $this->load->view('super_admin/v_header',$isi);
        $this->load->view('super_admin/v_menu',$isi);
        $this->load->view('super_admin/v_topnav',$isi);
        $this->load->view('super_admin/v_s_profil',$isi);
        $this->load->view('super_admin/v_footer',$isi);
    
    }

    public function editadmin($id_admin)
    {
        $isi['data'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('super_admin/v_header',$isi);
            $this->load->view('super_admin/v_menu',$isi);
            $this->load->view('super_admin/v_topnav',$isi);
            $this->load->view('super_admin/v_s_ubah_profil',$isi);
            $this->load->view('super_admin/v_footer',$isi);  
        }else{

            $config['upload_path'] = './upload/profil/';
            $config['allowed_types'] = 'pdf|img|doc|docx|jpg|jpeg|png';
            $config['overwrite']            = true;
            $config['max_size']             = 3072; // 3MB

            $this->load->library('upload', $config,'kkupload'); 
            $this->kkupload->initialize($config,'kkupload');
            $this->kkupload->do_upload('foto');
            $result1 = $this->kkupload->data();

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');
            $id_admin = $this->input->post('id_admin');
            

            $data = [
                'email' => $email,
                'nama' => $nama,
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'id_admin' => $id_admin,
                'foto' => $result1['file_name'],
            ];

            $this->db->where('id_admin', $data['id_admin']);
            $this->db->update('tb_admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data profil telah di edit! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('super_admin/c_s_profil');
        }
    }
}

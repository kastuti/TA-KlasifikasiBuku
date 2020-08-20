<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_datbuk extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('m_datbuk');
    }

	public function index()
	{
		$isi['content'] 	= 'datbuk/v_datbuk';
		$isi['judul'] 		= 'Data Buku';
		$isi['datbuk']		= $this->db->get('tb_buku')->result();
		$isi['data']        = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('v_header',$isi);
        $this->load->view('v_menu',$isi);
        $this->load->view('v_topnav',$isi);
		$this->load->view('datbuk/v_datbuk',$isi);
        $this->load->view('v_footer',$isi);
		
	}

	public function tambahBuku()
	{
		$judul_buku = $this->input->post('judul_buku');
		$isbn = $this->input->post('isbn');
		$penerbit = $this->input->post('penerbit');
		$tahun_terbit= $this->input->post('tahun_terbit');
		$tempat_terbit = $this->input->post('tempat_terbit');
		$klasifikasi = $this->input->post('klasifikasi');
		$sinopsis = $this->input->post('sinopsis');
		$pengarang = $this->input->post('pengarang');
		$id_buku = $this->input->post('id_buku');
		$config['upload_path'] = './upload/cover/';
        $config['allowed_types'] = 'gif|jpg|png';
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('cover')) {	
        	$data = array(
        		'judul_buku' => $judul_buku,
				'isbn' => $isbn,
				'penerbit' => $penerbit,
				'tahun_terbit' => $tahun_terbit,
				'tempat_terbit' => $tempat_terbit,
				'klasifikasi' => $klasifikasi,
				'sinopsis' => $sinopsis,
				'pengarang' => $pengarang,
				'cover' => 'default_cover.png'
        	);
        	$this->m_datbuk->input($data);
        	redirect('c_datbuk');
        } else {
            $result = $this->upload->data();
            $result1 =$result['file_name'];
            
            $data = array(
				'judul_buku' => $judul_buku,
				'isbn' => $isbn,
				'penerbit' => $penerbit,
				'tahun_terbit' => $tahun_terbit,
				'tempat_terbit' => $tempat_terbit,
				'klasifikasi' => $klasifikasi,
				'sinopsis' => $sinopsis,
				'pengarang' => $pengarang,
				'cover' => $result1
			);	
		$this->M_berita->input($data);
		redirect('c_datbuk');
        }
	}

	public function hapus($id){
		$where = array('id_buku' => $id);
		$this->m_datbuk->delete_data($where,'tb_buku');
		redirect('c_datbuk');
	}

	public function edit($id_buku)
	{
		$isi['datbuk'] = $this->db->get_where('tb_buku', ['id_buku' => $id_buku])->row_array();
		$isi['data'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('v_header',$isi);
	    $this->load->view('v_menu',$isi);
	    $this->load->view('v_topnav',$isi);
		$this->load->view('datbuk/v_ubah_buku',$isi);
	    $this->load->view('v_footer',$isi);
	}

	public function prosesEdit()
	{
		$judul_buku = $this->input->post('judul_buku');
		$isbn = $this->input->post('isbn');
		$penerbit = $this->input->post('penerbit');
		$tahun_terbit= $this->input->post('tahun_terbit');
		$tempat_terbit = $this->input->post('tempat_terbit');
		$klasifikasi = $this->input->post('klasifikasi');
		$sinopsis = $this->input->post('sinopsis');
		$pengarang = $this->input->post('pengarang');
		$id_buku = $this->input->post('id_buku');
		$config['upload_path'] = './upload/cover/';
        $config['allowed_types'] = 'gif|jpg|png';
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('cover')) {
        	
        } else {
            $result = $this->upload->data();
            $result1 =$result['file_name'];

		$data = array(

			'judul_buku' => $judul_buku,
			'isbn' => $isbn,
			'penerbit' => $penerbit,
			'tahun_terbit' => $tahun_terbit,
			'tempat_terbit' => $tempat_terbit,
			'klasifikasi' => $klasifikasi,
			'sinopsis' => $sinopsis,
			'pengarang' => $pengarang,
			'cover' => $result1
		);
		$this->db->where('id_buku', $id_buku);
        $this->db->update('tb_buku', $data);
		redirect('c_datbuk');
		}
	}
}

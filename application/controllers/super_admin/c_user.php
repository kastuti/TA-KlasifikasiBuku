<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_user extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('m_s_user');
    }

	public function index()
	{
		$isi['data']        = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
		$isi['user']		= $this->db->get('tb_admin')->result();

		$this->load->view('super_admin/v_header',$isi);
        $this->load->view('super_admin/v_menu',$isi);
        $this->load->view('super_admin/v_topnav',$isi);
		$this->load->view('super_admin/v_user',$isi);
        $this->load->view('super_admin/v_footer',$isi);
		
	}

	public function hapus($id){
		$where = array('id_admin' => $id);
		$this->m_s_user->delete_data($where,'tb_admin');
		redirect('super_admin/c_user');
	}

	public function active($id_admin)
	{
		$isi['data'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
		$isi['user'] = $this->db->get_where('tb_admin', ['id_admin' => $id_admin])->row_array();
		$this->load->view('super_admin/v_header',$isi);
	    $this->load->view('super_admin/v_menu',$isi);
	    $this->load->view('super_admin/v_topnav',$isi);
		$this->load->view('super_admin/v_active_user',$isi);
	    $this->load->view('super_admin/v_footer',$isi);
	}

	public function prosesActive()
	{
		$id_admin = $this->input->post('id_admin');
		$active_id = $this->input->post('active_id');

		$data = array(
			'active_id' => $active_id
		);
		$this->db->where('id_admin', $id_admin);
        $this->db->update('tb_admin', $data);
		redirect('super_admin/c_user');
	}
}

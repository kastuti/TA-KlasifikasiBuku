<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_datlat extends CI_Controller {

	function __construct(){
        parent::__construct();
        // konfigurasi helper & library
        // $this->load->helper('url');
        // $this->load->library('pagination');
        // $this->load->library('form_validation');
        // $this->load->database();
        $this->load->model('m_datlat');
  	}
  	
	public function index()
	{
		$isi['content'] 	= 'datlat/v_datlat';
		$isi['judul'] 		= 'Data Latih';
		$isi['datlat']		= $this->db->get('tb_datlat')->result();
		$isi['data']        = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();


		$this->load->view('v_header',$isi);
        $this->load->view('v_menu',$isi);
        $this->load->view('v_topnav',$isi);
		$this->load->view('datlat/v_datlat',$isi);
        $this->load->view('v_footer',$isi);
		
	}

	public function input()
	{
		$isi['content'] 	= 'datlat/v_tambah_datlat';
		$isi['judul'] 		= 'Tambah Data Latih';
		$this->load->view('datlat/v_tambah_datlat',$isi);
	}

	public function simpan(){
		$js_buku = $this->input->post('js_buku');
		$kategori = $this->input->post('kategori');

		$data = array(
			'js_buku' => $js_buku,
			'kategori' => $kategori,
			);
		
		$this->m_datlat->insert_data($data,'tb_datlat');
		redirect('c_datlat');
	}

	public function processing($id)
	{
		$datlat	 = $this->m_datlat->get_dataId($id);
		$js_buku = $datlat['js_buku'];
		$hasil   = strtolower(trim($js_buku));

		$resultToken=$this->tokenizing($hasil);
		$resultFiltering=$this->filtering($resultToken);

		
		$fixHasil=implode(' ', $resultFiltering);
		$resultSteming=$this->steming($fixHasil);

		
		$id_datlat = array(
		 	'id_datlat' => $id,
		 	);
		$data = array(
			'hasil' 	=> $resultSteming
		);
		$this->m_datlat->ubah($id_datlat,$data);
		redirect('c_datlat');
	}

	public function tokenizing($value)
	{
		return explode(' ', $value);
	}

	public function filtering($data)
	{
		
		$getDbStopword=$this->db->query("SELECT * FROM tb_stopword")->row_array();

		$stopword=explode(' ', $getDbStopword['kata']);

		$hasil=[];
   foreach ($data as $key => $value) {
            
        foreach($stopword as $a => $item){

            
            if($item==$value){
                $hasil[]=$value;
            }else{
               
            }
        }
        
      
   }


   return str_replace($hasil, " ", $data);
   


	}


	public function steming($filter)
	{
		$data=$this->db->query("SELECT * FROM tb_baseword")->result();
		// $parabot = array("Meja Komputer", "Tempat Tidur", "Korsi", "Kompor", "Ember", "Sapu");
		// print_r($parabot);exit();

		foreach ($data as $key => $value) {
			// $kata=json_decode($value->kata);
			$data=explode(',', $value->kata);

			foreach ($data as $key => $item) {
				$filter = str_replace($data[$key], $value->kata_dasar, $filter);
			}

		}
		return $filter;
	}

	public function hapus($id){
		$where = array('id_datlat' => $id);
		$this->m_datlat->delete_data($where,'tb_datlat');
		redirect('c_datlat');
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_klasbuk extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('m_klasbuk');
        $this->load->model('m_datlat');
    }

	public function index()
	{
		$isi['content'] 	= 'klasbuk/v_klasbuk';
		$isi['judul'] 		= 'Data Klasifikasi Buku';
		$isi['klasbuk']		= $this->db->get('tb_klasbuk')->result();
		$isi['data']        = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('v_header',$isi);
        $this->load->view('v_menu',$isi);
        $this->load->view('v_topnav',$isi);
		$this->load->view('klasbuk/v_klasbuk',$isi);
        $this->load->view('v_footer',$isi);
		
	}

	public function input()
	{
		$isi['content'] 	= 'klasbuk/v_klasbuk';
		$isi['judul'] 		= 'Tambah Data Klasifikasi Buku';
		$this->load->view('klasbuk/v_klasbuk',$isi);
	}

	public function simpan(){
		$js_buku = $this->input->post('js_buku');
		$hasil1 = $this->input->post('hasil1');
		$hasil2 = $this->input->post('hasil2');

		$data = array(
			'js_buku' => $js_buku,
			'hasil1' => $hasil1,
			'hasil2' => $hasil2,
			);
		
		$this->m_klasbuk->insert_data($data,'tb_klasbuk');
		redirect('c_klasbuk');
	}
	public function hapus($id){
		$where = array('id_klasbuk' => $id);
		$this->m_klasbuk->delete_data($where,'tb_klasbuk');
		redirect('c_klasbuk');
	}

	public function edit($id_klasbuk)
	{
		$isi['klasbuk'] = $this->db->get_where('tb_klasbuk', ['id_klasbuk' => $id_klasbuk])->row_array();
		$isi['data'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('v_header',$isi);
	    $this->load->view('v_menu',$isi);
	    $this->load->view('v_topnav',$isi);
		$this->load->view('klasbuk/v_ubah_klasbuk',$isi);
	    $this->load->view('v_footer',$isi);
	}
	
	public function prosesEdit()
	{
		$id_datlat = $this->input->post('id_klasbuk');
		$js_buku = $this->input->post('js_buku');

		$data = array(
			'js_buku' => $js_buku,
		);
		$this->db->where('id_klasbuk', $id_datlat);
        $this->db->update('tb_klasbuk', $data);
		redirect('c_klasbuk');
	}

	public function processing($id)
	{
		$klasbuk = $this->m_klasbuk->get_dataId($id);
		$js_buku = $klasbuk['js_buku'];
		$hasil   = strtolower(trim($js_buku));

		$hasil = str_replace("'", " ", $hasil);
	    $hasil = str_replace("-", " ", $hasil);
	    $hasil = str_replace(")", " ", $hasil);
	    $hasil = str_replace("(", " ", $hasil);
	    $hasil = str_replace("\"", " ", $hasil);
	    $hasil = str_replace("/", " ", $hasil);
	    $hasil = str_replace("=", " ", $hasil);
	    $hasil = str_replace(".", " ", $hasil);
	    $hasil = str_replace(",", " ", $hasil);
	    $hasil = str_replace(":", " ", $hasil);
	    $hasil = str_replace(";", " ", $hasil);
	    $hasil = str_replace("!", " ", $hasil);
	    $hasil = str_replace("?", " ", $hasil);
	    $hasil = str_replace("0", " ", $hasil);
	    $hasil = str_replace("1", " ", $hasil);
	    $hasil = str_replace("2", " ", $hasil);
	    $hasil = str_replace("3", " ", $hasil);
	    $hasil = str_replace("4", " ", $hasil);
	    $hasil = str_replace("5", " ", $hasil);
	    $hasil = str_replace("6", " ", $hasil);
	    $hasil = str_replace("7", " ", $hasil);
	    $hasil = str_replace("8", " ", $hasil);
	    $hasil = str_replace("9", " ", $hasil);

		$resultToken=$this->tokenizing($hasil);
		$resultFiltering=$this->filtering($resultToken);
		
		$fixHasil=implode(' ', $resultFiltering);
		$resultSteming=$this->steming($fixHasil);
		

		// mencari priors
		$all_data = $this->m_datlat->get_data()->result();
		$jml_data = count($all_data);
		$kategori = $this->m_klasbuk->get_dataKategori();
		$jml_kategori = count($kategori);

		$priors = array();
		$kata_latih = '';
		$kata_latih_per_kategori = array();;
		foreach ($kategori as $value) {
			$per_kategori = "";
			foreach ($all_data as $data) {
				if ($data->kategori == $value->kategori){
					$per_kategori = $per_kategori ." ". $data->hasil;
				}
				$kata_latih = $kata_latih." ".$data->hasil;
			}
			$hitung_kata = count(explode(" ", $per_kategori)) - 1;
			$data_arr = array('kata' => $per_kategori, 'kategori' => $value->kategori, 'jumlah' => $hitung_kata );
			array_push($kata_latih_per_kategori, $data_arr);

			$prob = $value->jumlah / $jml_data;
			$data_arr = array('prio' => $prob, 'kategori' => $value->kategori);
			array_push($priors, $data_arr);
		}

		//memproses data latih
		$kata_latih_valid = array_unique(explode(" ",$kata_latih));
		$jml_kata_latih_valid = count($kata_latih_valid) - 1;
		
		//memproses data uji
		$kata_uji = explode(" ", $resultSteming);
		$hitung_jml_kata_sama = array_count_values($kata_uji); // langsung mengitung jml kata sama dlm array 
		$jml_kata_uji = count($kata_uji);
		$kata_valid = array_unique($kata_uji); //untuk menghilangkan kata yang sama pada kalimat
		$kata_valid_copy = array(); // karena index array di atas berantakan
		foreach ($kata_valid as $value) {
			array_push($kata_valid_copy, $value);
		}
		$jml_kata_valid = count($kata_valid);


		$priors_istilah = array();
		foreach ($kata_latih_per_kategori as $kategori) {
			foreach ($kata_valid as $kata) {
				 $hitung_kata = substr_count($kategori['kata'], $kata);
				 $probability = ($hitung_kata + 1)/($kategori['jumlah'] + $jml_kata_latih_valid); // rumus utama
				 $data_arr = array('prio' => $probability, 'kategori' => $kategori['kategori']);
				 array_push($priors_istilah, $data_arr);
			}
		}

		// var_dump($kata_valid_copy);
		// var_dump($hitung_jml_kata_sama);

		// mencari hasil
		$hasil = array();
		foreach ($priors as $priors) {
			$hitung = 0;
			$cnt = 0;
			$hitung = $priors['prio'];
			foreach ($priors_istilah as $istilah) {
				if ($priors['kategori'] == $istilah['kategori']){
					$hitung = $hitung * pow($istilah['prio'],$hitung_jml_kata_sama[$kata_valid_copy[$cnt]]); // pow untuk pangkat
					$cnt += 1;
				}
			}
			$data_arr = array('hasil' => $hitung, 'kategori' => $priors['kategori'] ); 
			array_push($hasil, $data_arr);
		}

		// var_dump($hasil);

		$nampung_hasil = array();
		foreach ($hasil as $data) {
			array_push($nampung_hasil, $data['hasil']);
		}

		$hasil_terbesar = max($nampung_hasil);

		foreach ($hasil as $data) {
			if ($data['hasil'] == $hasil_terbesar){
				$hasil_akhir = $data['kategori'];
			}
		}

		$id_klasbuk = array(
		 	'id_klasbuk' => $id,
		 	);
		$data = array(
			'hasil1' 	=> $resultSteming,
			'hasil2'    => $hasil_akhir
		);

		$this->m_klasbuk->ubah($id_klasbuk,$data);
		redirect('c_klasbuk');
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

		foreach ($data as $key => $value) {
			$data=explode(',', $value->kata);
			foreach ($data as $key => $item) {
				$filter = str_replace($data[$key], $value->kata_dasar, $filter);
			}
		}
		return $filter;
	}
}

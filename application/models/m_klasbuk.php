<?php 
 
class M_klasbuk extends CI_Model{	

	function get_data(){
		return $this->db->get('tb_klasbuk');
	}

	function getKlasbukById($id)
	{
		return $this->db->get_where('tb_klasbuk', ['id_klasbuk' => $id_klasbuk])->row_array();
	}
 
	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	function get_dataId($id){ 
		return $this->db->get_where('tb_klasbuk', ['id_klasbuk' => $id])->row_array();
	}

	public function ubah($id_klasbuk,$data)
	{
		$this->db->where($id_klasbuk);
		$this->db->update('tb_klasbuk',$data);

	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	

	function get_dataKategori(){ // untuk mengambil kategori dan jumlah kategori
		$count_kategori = $this->db->query('SELECT count(id_datlat) as jumlah, kategori FROM `tb_datlat` GROUP by kategori')->result();
		return $count_kategori;
	} 

}
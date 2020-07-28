<?php 
 
class M_kategori extends CI_Model{	

	function get_data(){
		return $this->db->get('tb_kategori');
	}

	function getKategoriById($kd)
	{
		return $this->db->get_where('tb_kategori', ['kd_kategori' => $kd_kategori])->row_array();
	}
 
	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}	

	// function delete_data($where,$table){
	// 	$this->db->where($where);
	// 	$this->db->delete($table);
	// }
}
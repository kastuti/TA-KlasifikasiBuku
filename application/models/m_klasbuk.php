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

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}
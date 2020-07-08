<?php 
 
class M_datlat extends CI_Model{	

	function get_data(){
		return $this->db->get('tb_datlat');
	}

	function getDatlatById($id)
	{
		return $this->db->get_where('tb_datlat', ['id_datlat' => $id_datlat])->row_array();
	}
 
	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}	

	// function delete_data($where,$table){
	// 	$this->db->where($where);
	// 	$this->db->delete($table);
	// }
}
<?php 
 
class M_datlat extends CI_Model{	

	function get_data(){
		return $this->db->get('tb_datlat');
	}

	function getDatlatById($id)
	{
		return $this->db->get_where('tb_datlat', ['id_datlat' => $id])->row_array();
	}
 
	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}	

	function get_dataId($id){ 
		return $this->db->get_where('tb_datlat', ['id_datlat' => $id])->row_array();
	}

	public function ubah($id_datlat,$data)
	{
		$this->db->where($id_datlat);
		$this->db->update('tb_datlat',$data);
	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function tampilDatlat_Excel()
	{
		$this->db->select('*');
		$this->db->from('tb_datlat');
		return $this->db->get();
	}
}
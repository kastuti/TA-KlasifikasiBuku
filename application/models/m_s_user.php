<?php 
 
class M_s_user extends CI_Model{	

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function input($data)
	{
		$this->db->insert('tb_admin', $data);
	}

	public function tampil()
	{
		$this->db->select('*');
		$this->db->from('tb_admin');
		$result = $this->db->get();
		return $result->result();
	}

	public function adminId($where)
	{
		$this->db->from('tb_admin');
		$this->db->where('id_admin', $where);
		$result = $this->db->get();
		return $result->result();
	}	

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function update_data($data)
	{
		$this->db->where('id_admin', $id_admin);
		$this->db->update('tb_admin', $data);
	}
}
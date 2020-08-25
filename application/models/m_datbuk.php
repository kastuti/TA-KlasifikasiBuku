<?php 
 
class M_datbuk extends CI_Model{	

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function input($data)
	{
		$this->db->insert('tb_buku', $data);
	}

	public function tampil()
	{
		$this->db->select('*');
		$this->db->from('tb_buku');
		$result = $this->db->get();
		return $result->result();
	}

	public function bukuId($where)
	{
		$this->db->from('tb_buku');
		$this->db->where('id_buku', $where);
		$result = $this->db->get();
		return $result->result();
	}	

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function update_data($data)
	{
		$this->db->where('id_buku', $id_buku);
		$this->db->update('tb_buku', $data);
	}

	public function tampilBuku_Excel()
	{
		$this->db->select('*');
		$this->db->from('tb_buku');
		return $this->db->get();
	}

}
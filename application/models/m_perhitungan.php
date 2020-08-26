<?php 
 
class M_perhitungan extends CI_Model{	

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function input($data)
	{
		$this->db->insert('tb_klasbuk', $data);
	}

	public function tampil()
	{
		$this->db->select('*');
		$this->db->from('tb_klasbuk');
		$result = $this->db->get();
		return $result->result();
	}

}
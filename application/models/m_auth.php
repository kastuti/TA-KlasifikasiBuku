<?php 
 
class M_auth extends CI_Model{	

	function get_data(){
		return $this->db->get('tb_admin');
	}

	function getDatbukById($id)
	{
		return $this->db->get_where('tb_admin', ['id_admin' => $id_admin])->row_array();
	}
 
	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}	

	function result_email() {
		$search=$this->input->GET('cari',TRUE);
		$this->db->like('email',$search);
		return $this->db->get('tb_admin')->result();
	}

	function lihat_email($id_admin) {
		$this->db->where('id_admin',$id_admin);
		return $this->db->get('tb_admin')->result();
	}

	function ubah_sandi($data,$id_admin) {
		$this->db->where('id_admin',$id_admin);
		$this->db->update('tb_admin',$data);
	}
}
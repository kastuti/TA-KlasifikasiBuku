<?php 
 
class M_profil extends CI_Model{	

	function get_data(){
		return $this->db->get('tb_admin');
	}

	function getDatprofById($id){
		return $this->db->get_where('tb_admin', ['id' => $id])->row_array();
	}


	function ubahDataBuku()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"email" => $this->input->post('email', true),
			"password" => $this->input->post('password', true),
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_admin', $data);
	}

}
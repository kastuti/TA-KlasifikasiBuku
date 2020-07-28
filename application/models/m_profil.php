<?php 
 
class M_profil extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	function get_data(){
		return $this->db->get('tb_admin');
	}

	function getProfilById($id)
	{
		return $this->db->get_where('tb_admin', ['id_admin' => $id])->row_array();
	}
 
	function ubahProfil($id)
	{
		$data = [
			"email" => $this->input->post('email', true),
			"nama" => $this->input->post('nama', true),
			"password" => $this->input->post('password', true),
			"foto" => $this->input->post('foto', true),
		];

		$this->db->where('id_admin', $id);
		$this->db->update('tb_admin', $data);
	}

}
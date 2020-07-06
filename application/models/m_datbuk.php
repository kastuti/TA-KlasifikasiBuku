<?php 
 
class M_datbuk extends CI_Model{	

	function get_data(){
		return $this->db->get('tb_buku');
	}

	function getDatbukById($id)
	{
		return $this->db->get_where('tb_buku', ['id_buku' => $id])->row_array();
	}
 
	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}	

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function ubahDataBuku()
	{
		$data = [
			"judul_buku" => $this->input->post('judul_buku', true),
			"isbn" => $this->input->post('isbn', true),
			"penerbit" => $this->input->post('penerbit', true),
			"tahun_terbit" => $this->input->post('tahun_terbit', true),
			"tempat_terbit" => $this->input->post('tempat_terbit', true),
			"deskripsi" => $this->input->post('deskripsi', true)
		];

		$this->db->where('id_buku', $this->input->post('id'));
		$this->db->update('tb_buku', $data);
	}

}
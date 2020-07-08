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
			"js_buku" => $this->input->post('js_buku', true),
			"edisi" => $this->input->post('edisi', true),
			"isbn" => $this->input->post('isbn', true),
			"penerbit" => $this->input->post('penerbit', true),
			"tahun_terbit" => $this->input->post('tahun_terbit', true),
			"deskripsi_fisik" => $this->input->post('deskripsi_fisik', true),
			"bahasa" => $this->input->post('bahasa', true),
			"tempat_terbit" => $this->input->post('tempat_terbit', true),
			"klasifikasi" => $this->input->post('klasifikasi', true),
			"sinopsis" => $this->input->post('sinopsis', true),
			"pengarang" => $this->input->post('pengarang', true),
			"cover" => $this->input->post('cover', true)
		];

		$this->db->where('id_buku', $this->input->post('id_buku'));
		$this->db->update('tb_buku', $data);
	}

}
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_profil extends CI_Model{	

	function get_data(){
		return $this->db->get('tb_admin');
	}

	function getProfilById($id)
	{
		return $this->db->get_where('tb_admin', ['id_admin' => $id])->row_array();
	}

	public function getAllDataAdmin()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');

		$this->db->set('nama', $nama);
		$this->db->where('email', $email);
		$this->db->where('password', $password);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data profil telah di ubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('c_profil');

	}
}
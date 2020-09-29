<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_s_dashboard extends CI_Model

{
	public function total_datlat()
	{
		return $this->db->get('tb_datlat')->num_rows();
	}
	public function total_klasbuk()
	{
		return $this->db->get('tb_klasbuk')->num_rows();
	}
	public function total_buku()
	{
		return $this->db->get('tb_buku')->num_rows();
	}
	public function total_admin()
	{
		return $this->db->get('tb_admin')->num_rows();
	}
}
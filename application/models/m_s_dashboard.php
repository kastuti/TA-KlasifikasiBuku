<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_s_dashboard extends CI_Model

{
	public function total_admin()
	{
		return $this->db->get('tb_admin')->num_rows();
	}
}
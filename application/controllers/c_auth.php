<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		// if ($this->session->userdata('email')){
		// 	redirect('c_dashboard');
		// }
	}

	public function index()
	{

		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		if ($this->form_validation->run() == false)
		{
			$this->load->view('auth/v_auth_header');
			$this->load->view('auth/v_login');
			$this->load->view('auth/v_auth_footer');
		}
		else
		{
			//validasi success
			$this->_login();
		}
		
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$admin = $this->db->get_where('tb_admin', ['email' => $email])->row_array();

		if($admin)
		{
			//data admin ada
			//kemudian cek password
			if(password_verify($password, $admin['password']))
			{
				$data = [
					'email' => $admin['email']
				];
				$this->session->set_userdata[$data];
				redirect('c_dashboard');
			}
			else
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
				redirect('c_auth');
			}
		}
		else
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
			redirect('c_auth');
		}
	}

	public function registrasi()
	{

		$this->form_validation->set_rules('nama', 'fullname', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[tb_admin.email]', [
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[6]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false)
		{ 
			$this->load->view('auth/v_auth_header');
			$this->load->view('auth/v_registrasi');
			$this->load->view('auth/v_auth_footer');
		}
		else
		{
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'foto' => 'default.jpg',
			];

			$this->db->insert('tb_admin', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat email Anda sudah terdaftar. Silahkan masuk!</div>');
			redirect('c_auth');
		}
	}

	public function logout()
	{
		
		$this->session->unset_userdata('email');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah keluar!</div>');
			redirect('c_auth');
	}
}
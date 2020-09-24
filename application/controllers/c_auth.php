<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_auth');
	}

	public function index()
	{
		if ($this->session->userdata('email')){
			redirect('super_admin/c_s_dashboard');
		}

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
			if ($admin['active_id'] == 1) {
			//kemudian cek password
				if(password_verify($password, $admin['password']))
				{
					$data = [
						'email' => $admin['email'],
						'role_id' => $admin['role_id']
					];
					$this->session->set_userdata($data);
					if ($admin['role_id'] == 1) {
						redirect('super_admin/c_s_dashboard');
					} else {
						redirect('c_dashboard');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
					redirect('c_auth');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum teraktifasi!</div>');
				redirect('c_auth');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
			redirect('c_auth');
		}
	}

	public function registrasi()
	{
		if ($this->session->userdata('email')){
			redirect('super_admin/c_s_dashboard');
		}

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
				'role_id' => 2,
				'role' => 'pustakawan',
				'active_id' => 1,
			];

			$this->db->insert('tb_admin', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat email Anda sudah terdaftar. Silahkan masuk!</div>');
			redirect('c_auth');
		}
	}

	public function lupa_password() {
		$this->load->view('auth/v_auth_header');
  		$this->load->view('auth/v_lupa_password');
  		$this->load->view('auth/v_auth_footer');
	}

	function cari_email() {
	  $isi['result']=$this->m_auth->result_email();
	  $this->load->view('auth/v_auth_header');
  	  $this->load->view('auth/v_cari_email',$isi);
  	  $this->load->view('auth/v_auth_footer');
	  
	}

	function view_email($id_admin) {
	  $isi['emailku']=$this->m_auth->lihat_email($id_admin);
	  $this->load->view('auth/v_auth_header');
  	  $this->load->view('auth/v_lihat_email',$isi);
  	  $this->load->view('auth/v_auth_footer');
	}

	function sandi_baru($id_admin) {
	  $data = [
	  	'password'=>password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
	  ];
	  $this->m_auth->ubah_sandi($data,$id_admin);
	  $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Kata Sandi berhasil diubah.
	  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	  <span aria-hidden='true'>&times;</span>
	  </button></div>");
	  redirect(base_url());
	}

	public function logout()
	{
		
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah keluar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>');  
		redirect('c_auth');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('users_model');
	}

	public function index()
	{
		check_not_login();
		check_already_login();
	}

	public function signin()
	{
		check_already_login();
		$data = [
			'title' => 'Micin Stream | Login'
		];

		$this->load->view('header',$data);
		$this->load->view('signin');
		$this->load->view('footer');

	}
	public function do_signin()
	{
		check_already_login();
		$post = $this->input->post(NULL, TRUE);
		$query = $this->users_model->set_signin($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = [
					'user_id' => $row->id,
					'role_id' => $row->role_id,
					'username' => $row->username
				];
				$this->session->set_userdata($params);
				redirect(base_url().'home');
			}else{
				echo "login gagal";
			} // LOGIN 
	}
	

// ===================SIGN UP======================== //
	public function signup()
	{
		check_already_login();
		$data = [
			'title' => 'Micin Stream | Register'
		];

		$this->form_validation->set_rules('name', 'Name', 'trim|required|regex_match[/^([a-z ])+$/i]|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_dash|min_length[4]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[4]|is_unique[users.email]');
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|min_length[8]|matches[password1]');

		$this->form_validation->set_error_delimiters('<p class="help is-danger">', '</p>');

			if ($this->form_validation->run() == FALSE) {

					$this->load->view('header',$data);
					$this->load->view('signup');
					$this->load->view('footer');
			}else{
				$post = $this->input->post(NULL, TRUE);
				$this->users_model->set_signup($post);
					if ($this->db->affected_rows() > 0) {
						redirect('/home',);
					}else{
						echo 'gagal';
					}


			} // $this->form_validation->run()
	}

	public function logout()
	{
		check_not_login();
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('logout', 'Logout Success');
		redirect(base_url().'auth/signin');

	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
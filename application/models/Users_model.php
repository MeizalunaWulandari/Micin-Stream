<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function set_signup($post)
	{
		$data = [
			'username' => htmlspecialchars(trim($post['username'])),
			'email' => htmlspecialchars(trim($post['email'])),
			'name' => htmlspecialchars(trim(ucwords($post['name']))),
			'password' => password_hash($post['password1'], PASSWORD_DEFAULT),
			'unhashed_pass' => htmlspecialchars(trim($post['password2'])),
			'is_actived' => 1,
			'is_deleted' => 0,
			'role_id' => 2,
			'badged' => 2,
		];
		return $this->db->insert('users',$data);

	}

	public function set_signin($post)
	{
		$this->db->select();
		$this->db->from('users');
		$this->db->where('username', $post['username']);
		$this->db->where('password', password_verify($post['password'], 'password'));
		$query = $this->db->get();
		return $query;
		// $this->db->or_where('email', $post['username']);

	}

	public function profile()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('users.is_deleted', 0);
		$this->db->where('users.id', $this->session->userdata('user_id'));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function user()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('users.username', $this->uri->segment(2));
		$this->db->where('users.is_deleted', 0);
		$query = $this->db->get();
		return $query->result_array();
	}


}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */
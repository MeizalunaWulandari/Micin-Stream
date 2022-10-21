<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Folders_model extends CI_Model {

	public function create()
	{
		$data = [
			'folder_name' => $this->input->post('folder_name'),
			'slug' => url_title($this->input->post('folder_name'), 'dash', TRUE),
			'code' => random_string('alnum', 8),
			'user_id' => $this->session->userdata('user_id'),
			'is_deleted' => 0
		];

		$this->db->insert('folders', $data);
	}

	public function link_view()
	{
		$this->db->select();
		$this->db->from('folders');
		$this->db->where('code', $this->uri->segment(2));
		return $this->db->get()->result_array()[0];
	}
	public function profile_view($user_id)
	{
		$this->db->select();
		$this->db->from('folders');
		$this->db->where('slug', $this->uri->segment(4));
		$this->db->where('user_id', $user_id);
		return $this->db->get()->result_array()[0];
	}
	

}

/* End of file Folders_model.php */
/* Location: ./application/models/Folders_model.php */
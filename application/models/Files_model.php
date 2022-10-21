<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function set_upload($data)
	{
		return $this->db->insert('files',$data);
	}

	public function get_files()
	{
		$this->db->select('*');
		$this->db->from('files');
		$this->db->join('users', 'users.id = files.user_id');
		$this->db->where('files.is_deleted', 0);
		$this->db->order_by('files.views','desc');
		$this->db->order_by('files.id','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function videos($id)
	{
		$this->db->select('*');
		$this->db->from('files');
		$this->db->join('users', 'users.id = files.user_id');
		$this->db->where('users.id', $id);
		$this->db->where('files.is_deleted', 0);
		$this->db->order_by('files.views','desc');
		$this->db->order_by('files.id','desc');
		return $query = $this->db->get();
	}

	public function folders($id)
	{
		$this->db->select('*');
		$this->db->from('folders');
		$this->db->join('users', 'users.id = folders.user_id');
		$this->db->where('folders.is_deleted', 0);
		$this->db->where('folders.user_id', $id);
		$this->db->order_by('folders.id','desc');
		return $query = $this->db->get();
	}

	public function select_folder($id)
	{
		$this->db->select('folders.id,folders.folder_name');
		$this->db->from('folders');
		$this->db->join('users', 'users.id = folders.user_id');
		$this->db->where('folders.is_deleted', 0);
		$this->db->where('folders.user_id', $id);
		$this->db->order_by('folders.id','desc');
		return $query = $this->db->get();
	}
	
	public function files_folder($user_id)
	{
		$this->db->select('folders.*, files.*');
		$this->db->from('files');
		$this->db->join('folders', 'folders.id = files.folder_id');
		$this->db->where('folders.slug', $this->uri->segment(4));
		$this->db->where('files.user_id', $user_id);
		$this->db->where('folders.is_deleted', 0);
		$this->db->order_by('folders.id','desc');
		return $query = $this->db->get();
	}

	public function view_file()
	{
			$this->db->select();
			$this->db->from('files');
			$this->db->where('code', $this->uri->segment(2));
			return $this->db->get();
	}

	public function view_folder()
	{
			$this->db->select('folders.*, files.*');
			$this->db->from('files');
			$this->db->join('folders', 'folders.id = files.folder_id');
			$this->db->where('folders.code', $this->uri->segment(2));
			return $this->db->get();
	}

	public function update_views($data)
	{
		return $this->db->update('files', $data, ['code' => $this->uri->segment(2)]);
	}
}

/* End of file Upload_model.php */
/* Location: ./application/models/Upload_model.php */
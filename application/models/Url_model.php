<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Url_model extends CI_Model {

	public function save($data)
	{
		 return $this->db->insert('url_uploads', $data);
	}

	public function view()
	{
		$code = $this->uri->segment(3);

		$this->db->select();
		$this->db->from('url_uploads');
		$this->db->where('code', $code);
		return $this->db->get()->result_array();

	}
	

}

/* End of file Url_model.php */
/* Location: ./application/models/Url_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('files_model');
		$this->load->model('folders_model');
	}

	public function index()
	{
		redirect(base_url());
	}

	public function file()
	{
		$query = $this->files_model->view_file()->result_array()[0];
		
		$data = [
			'title' => $query['title'],
			'link' => $query['link'],
			'thumbnail' => $query['thumbnail'],
			'length' => $query['length'],
			'views' => $query['views']+1,
			'uploaded' => $query['uploaded'],
			'code' => $query['code'],
			'is_deleted' => $query['is_deleted'],
			'folder_id' => $query['folder_id'],
			'user_id' => $query['user_id'],
		];

		if (!$this->session->userdata($query['code']) || $this->session->userdata($query['code']) != $query['code']) {
			$update = $this->files_model->update_views($data);
			$this->session->set_userdata($query['code'], $query['code']);
			redirect($query['link']);
		}else{
			redirect($query['link']);
		}
				
	}

	public function collection()
	{
		$data = [
			'title' => $this->folders_model->link_view()['folder_name'],
			'files' => $this->files_model->view_folder()->result_array(),
			'total' => $this->files_model->view_folder()->num_rows(),
		];

		
		$this->load->view('header', $data);
		$this->load->view('folder', $data);
		$this->load->view('pagination');
		$this->load->view('footer');
	}

}

/* End of file Link.php */
/* Location: ./application/controllers/Link.php */
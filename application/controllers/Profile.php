<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('files_model');
        $this->load->model('folders_model');
        $this->load->helper('css');
    }

    public function index()
    {
        check_not_login();

        if ($this->uri->segment(2) == null) {
            redirect(base_url('user/'.$this->users_model->profile()[0]['username']));
        }
    }

    public function user()
    {

        if ($this->users_model->user()) {
            $data = [
                'title' => 'micinsteam',
                'user' => $this->users_model->user(),
                'videos_count' => $this->files_model->videos($this->users_model->user()[0]['id'])->num_rows(),
                'folders_count' => $this->files_model->folders($this->users_model->user()[0]['id'])->num_rows(),
                'videos' => $this->files_model->videos($this->users_model->user()[0]['id'])->result_array(),
                'folders' => $this->files_model->folders($this->users_model->user()[0]['id'])->result_array(),
            ];

            $this->load->view('header', $data);
            $this->load->view('profile', $data);
            $this->load->view('pagination');
            $this->load->view('footer');    
        }else{
            return show_404();
        }        
    }

    public function collection()
    {

        $data = [
            'title' => $this->users_model->user()[0]['name'],
            'user' => $this->users_model->user(),
            'videos_count' => $this->files_model->videos($this->users_model->user()[0]['id'])->num_rows(),
            'folders_count' => $this->files_model->folders($this->users_model->user()[0]['id'])->num_rows(),
            'videos' => $this->files_model->videos($this->users_model->user()[0]['id'])->result_array(),
            'folders' => $this->files_model->folders($this->users_model->user()[0]['id'])->result_array(),
        ];

            $this->load->view('header', $data);
            $this->load->view('profile', $data);
            $this->load->view('pagination');
            $this->load->view('footer');
    }

    public function show_collection($slug)
    {

        $data = [
            'title' => $this->folders_model->profile_view($this->users_model->user()[0]['id'])['folder_name'].'( '.$this->files_model->files_folder($this->users_model->user()[0]['id'])->num_rows().' )',
            'user' => $this->users_model->user(),
            'files' => $this->files_model->files_folder($this->users_model->user()[0]['id'])->result_array(),
        ];

            $this->load->view('header', $data);
            $this->load->view('folder', $data);
            $this->load->view('pagination');
            $this->load->view('footer');
    }


}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */
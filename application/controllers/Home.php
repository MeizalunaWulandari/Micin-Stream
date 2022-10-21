<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;

class Home extends CI_Controller
{

    private $_client;

    public function __construct()
    {
        parent::__construct();
        $this->_client = new Client([
            'base_uri' => 'https://api.streamsb.com/api/',
        ]);
        $this->load->helper('file');
        $this->load->model('files_model');
        $this->load->model('users_model');
        $this->load->model('folders_model');
        $this->load->model('url_model');
    }

    public function index()
    {
        // echo "<pre>";
        // var_dump();
        // die();
        $data['files'] = $this->files_model->get_files();
        $data['title']= 'Micin Stream';

        $this->load->view('header', $data);
        // $this->load->view('breadcrumb', $data);
        $this->load->view('content', $data);
        $this->load->view('pagination', $data);
        $this->load->view('footer');
    } //End index

    public function upload()
    {
        $data = [
            'title' => 'Micin Stream',
            'user' => $this->users_model->user(),
            'folders' => $this->files_model->select_folder($this->session->userdata('user_id'))->result_array(),
        ];
        $this->load->view('header', $data);
        $this->load->view('upload', $data);
        $this->load->view('footer', $data);
    }

    public function urlupload()
    {
        $data = [
            'title' => 'Micin Stream',
            'user' => $this->users_model->user(),
            'folders' => $this->files_model->select_folder($this->session->userdata('user_id'))->result_array(),
        ];
        $this->load->view('header', $data);
        $this->load->view('urlupload', $data);
        $this->load->view('footer', $data);
    }

    public function do_upload()
    {
        $getServer = $this->_client->request('POST', 'upload/server', [
            'form_params' => [
                'key' => '53091cd0x1mhjc2l3uqvx',
            ],
        ]);

        $results   = json_decode($getServer->getBody()->getContents());
        $server    = $results->result;
        $temp_file = $_FILES['file']['tmp_name'];
        $fopen     = \GuzzleHttp\Psr7\Utils::tryFopen($temp_file, 'r');
        $get_ext = explode('.',$_FILES['file']['name']);
        $ext = end($get_ext);
        $file_name = $this->input->post('title').'.'.$ext;

        $response  = $this->_client->request('POST', $server, [
            'multipart' => [
                [
                    'name'     => 'api_key',
                    'contents' => '53091cd0x1mhjc2l3uqvx',
                ],
                [
                    'name'     => 'json',
                    'contents' => '1',
                ],
                [
                    'name'     => 'file',
                    'contents' => $fopen,
                    'filename' => $file_name,
                ],
            ],
        ]);
        
        $file_results = json_decode($response->getBody()->getContents(), true);
        $status = $file_results['result'][0]['status'];
        $code   = $file_results['result'][0]['code'];

        if ($status == 'OK') {
            $response = $this->_client->request('GET', 'file/info', [
                'query' => [
                    'key'      => '53091cd0x1mhjc2l3uqvx',
                    'file_code' => $code,
                ],
            ]);
            $info_results = json_decode($response->getBody()->getContents(), TRUE);
            $file_created = $info_results['result'][0]['file_created'];
            $date_created = explode(':', $file_created);
            $date = $date_created[0];
            $minute = $date_created[1];
            $second = $date_created[2]-1;

            $new_date = $date.':'.$minute.':'.$second;

        // FINDING UPLOADED DATE 
            $response = $this->_client->request('GET', 'file/list', [
                'query' => [
                    'key'      => '53091cd0x1mhjc2l3uqvx',
                    'created' => $new_date,
                    'per_page' => 1
                ],
            ]);
            $date_results = json_decode($response->getBody()->getContents(), TRUE);

                $get_code = $date_results['result']['files'][0]['file_code'];
                $get_thumbnail = $date_results['result']['files'][0]['thumbnail'];
                $get_link = $date_results['result']['files'][0]['link'];

                $new_thumbnail = explode($get_code.'_t', $get_thumbnail);
                $thumbnail = $new_thumbnail[0].$code.'_xt'.$new_thumbnail['1'];

                $new_link = explode($get_code.'_t', $get_link);
                $link = $new_link[0];

                    if ($this->session->userdata('user_id')) {
                        $user_id = $this->session->userdata('user_id');
                    }else{
                        $user_id = 1;
                    }

                // Insert to database
                    if ($this->input->post('folder')) {
                        $folder = $this->input->post('folder');
                    }else{
                        $folder = 1;
                    }
                $data = [
                    'title' => $info_results['result'][0]['file_title'],
                    'link' => $link,
                    'thumbnail' => $thumbnail,
                    'length' => $info_results['result'][0]['file_length'],
                    'views' => $info_results['result'][0]['file_views'],
                    'uploaded' => $info_results['result'][0]['file_created'],
                    'code' => random_string('alnum', 8),
                    'is_deleted' => 0,
                    'folder_id' => $folder,
                    'user_id' => $user_id,
                ];

                $this->files_model->set_upload($data);
                $this->session->set_flashdata('uploaded', $link);
                redirect('home/upload');

        } else {
            var_dump($file_results);
            echo 'gagal';
        }

    }

    public function do_url_upload()
    {
        $response = $this->_client->request('GET', 'upload/url', [
                'query' => [
                    'key' => '53091cd0x1mhjc2l3uqvx',
                    'url' => $this->input->post('url'),
                ],
            ]);

        $file_results = json_decode($response->getBody()->getContents());
        $code   = $file_results->result->filecode;
        $data = [
            'url' => $this->input->post('url'),
            'code' => $code
        ];

        $save = $this->url_model->save($data);

        if ($save) {
            redirect(base_url('home/url_status/'.$code));
        }


    }

    public function url_status($code)
    {
        
        $response = $this->_client->request('GET', 'file/list', [
                'query' => [
                    'key' => '53091cd0x1mhjc2l3uqvx',
                ],
            ]);

        $query = $this->url_model->view();
        $status_results = json_decode($response->getBody()->getContents(), TRUE);

        // echo "<pre>";
        // var_dump($status_results['result']['files']);
        // die();

        $results = array_filter($status_results['result']['files'], function($url) {
            // $query = $this->url_model->view()[0];
            return $url['file_code'] === $this->uri->segment(3);
        });
        echo "<pre>";
        // echo $this->uri->segment(3);
        var_dump($results);
        die();
        if (!$results) {
            echo "Not found";
        }else{
            // $data = [
            //         'title' => $info_results['result'][0]['file_title'],
            //         'link' => $link,
            //         'thumbnail' => $thumbnail,
            //         'length' => $info_results['result'][0]['file_length'],
            //         'views' => $info_results['result'][0]['file_views'],
            //         'uploaded' => $info_results['result'][0]['file_created'],
            //         'code' => random_string('alnum', 8),
            //         'is_deleted' => 0,
            //         'folder_id' => $folder,
            //         'user_id' => $user_id,
            //     ];

            foreach ($results as $result) {
                echo $result['status'];
            }

            echo "<pre>";
            var_dump($results);
            die();
        }

        
    }

    public function folder()
    {
        check_not_login();
        $this->folders_model->create();
    }

}


// $response = $this->_client->request('GET', 'url/list', [
//                 'query' => [
//                     'key' => '53091cd0x1mhjc2l3uqvx',
//                 ],
//             ]);
//         print $code;
//         $status_results = json_decode($response->getBody()->getContents(), TRUE);


//         $results = array_filter($status_results['result'], function($people) {
//             return $people['url'] === 'https://eu-amsterdam.rapidleech.gq/files/NV2SKMHD_%282019%29_www.SkymoviesHD.Baby_1080p_UnCut_HDRip_ORG_Dual_x264_ESub.mkv';
//         });


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */

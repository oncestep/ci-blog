<?php

/**
 * Created by PhpStorm.
 * User: 15185
 * Date: 2017/7/24
 * Time: 17:19
 */
class Posts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');

        $this->load->model('post_model');
        $this->load->model('comment_model');
        $this->load->database();
    }

    public function each_page($id, $class)
    {
        //Pagination Config
        $config['base_url'] = base_url() . 'index.php/posts/index';
        $config['total_rows'] = $this->post_model->get_each($id);
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => $class);


        //Init Pagination
        $this->pagination->initialize($config);

    }

    public function index($offset = 0)
    {
        $this->each_page($_SESSION['user_id'], 'private_link');

//        $this->each_page(FALSE, 'public_link');

        $data['title'] = 'Latest Posts';

        //Private Posts
        $form = $this->post_model->get_posts(FALSE, 3, $offset, $_SESSION['user_id']);

        foreach ($form as $k => $v) {

            $choose = $this->getCharpos($form[$k]['content'], 'img');

            if (is_array($choose) && !empty($choose)) {
                foreach ($choose as $key => $value) {
//                    $form[$k]['content'] = $this->insertToStr($form[$k]['content'], ($choose[$key] + 3), ' class="size_s" ');
                }
            }
        }

        $data['posts'] = $form;

        //All Posts
        $form_all = $this->post_model->get_posts(-1);

        foreach ($form_all as $k_all => $v_all) {

            $choose_all = $this->getCharpos($form_all[$k_all]['content'], 'img');

            if (is_array($choose_all) && !empty($choose_all)) {
                foreach ($choose_all as $key_all => $value_all) {
//                    $form_all[$k_all]['content'] = $this->insertToStr($form_all[$k_all]['content'], ($choose_all[$key_all] + 3), ' class="size_s" ');
                }
            }
        }

        $data['posts_all'] = $form_all;

        //Show on view
        $this->load->view('pages/posts', $data);
    }

    public function view($post_id)
    {
        $row = $this->post_model->get_posts($post_id);

        $choose = $this->getCharpos($row['content'], 'img');

        if (is_array($choose) && !empty($choose)) {
            foreach ($choose as $key => $value) {
//                $row['content'] = $this->insertToStr($row['content'], ($choose[$key] + 3), ' class="size_m"');
            }
        }

        $data['post'] = $row;

        $data['comments'] = $this->comment_model->get_comments($post_id);

        if (empty($data['post'])) {
            show_404();
        }

        $post_data = array(
            'post_id' => $post_id
        );

        $this->session->set_userdata($post_data);

        $this->load->view('pages/view', $data);
    }

    public function create()
    {
        //Check Login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['title'] = 'Create Post';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pages/create');
        } else {
            if ($this->post_model->create_posts()) {
                redirect('posts');
            } else {
                echo '<script>alert("FAIL TO CREATE POST");</script>';
            }
        }

    }

    public function alter($id)
    {
        //Check Login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        //Check whether the info suitable or not
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('posts/view/' . $id);
            echo '1111111111111111';
        } else {
            $signal = $this->post_model->alter_posts();

            if ($signal === TRUE) {
                $this->session->set_flashdata('post altered', 'the change of post was saved.');
                redirect('posts/view/' . $id);
                echo '<script>alert("Post Change Saved");</script>';
            } else {
                echo '<script>alert("Post Change Failed");</script>';
            }
        }
    }

    public function delete($id)
    {
        //Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users');
        }

        $signal = $this->post_model->delete_posts($id);
        if ($signal) {
            $this->session->set_flashdata('post_deleted', 'The post was deleted');
            redirect('posts');
        } else {
            $item = $this->uri->segment(3);
            redirect('posts/view/' . $item);
            echo '<script>alert("Post Delete Failed");</script>';
        }
    }


    function getCharpos($str, $char)
    {
        $g = 0;
        $arr = array();
        $count = substr_count($str, $char);
        for ($i = 0; $i < $count; $i++) {
            $j = strpos($str, $char);
            if ($i == 0) {
                $arr[] = $j;
            } else {
                $arr[] = $j + $g + 1;
            }
            $str = substr($str, $j + 1);
            $g = end($arr);
        }
        return $arr;
    }

    function insertToStr($str, $i, $substr)
    {
        //指定插入位置前的字符串
        $startstr = "";
        for ($j = 0; $j < $i; $j++) {
            $startstr .= $str[$j];
        }

        //指定插入位置后的字符串
        $laststr = "";
        for ($j = $i; $j < strlen($str); $j++) {
            $laststr .= $str[$j];
        }

        //将插入位置前，要插入的，插入位置后三个字符串拼接起来
        $str = $startstr . $substr . $laststr;

        //返回结果
        return $str;
    }

}
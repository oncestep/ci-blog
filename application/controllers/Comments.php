<?php

/**
 * Created by PhpStorm.
 * User: 15185
 * Date: 2017/7/27
 * Time: 11:52
 */
class Comments extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('post_model');
        $this->load->model('comment_model');
        $this->load->database();
    }

    public function create()
    {
        $this->form_validation->set_rules('body', "Body", 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['post'] = $this->post_model->get_posts($_SESSION['post_id']);
            $data['comments'] = $this->comment_model->get_comments($_SESSION['post_id']);
//            $this->load->view("entrance/login",$data);
            redirect('posts/view/' . $_SESSION['post_id']);
        } else {
            $this->comment_model->create_comments();
            $data['post'] = $this->post_model->get_posts($_SESSION['post_id']);
            $data['comments'] = $this->comment_model->get_comments($_SESSION['post_id']);
            redirect('posts/view/' . $_SESSION['post_id']);
        }
    }
}
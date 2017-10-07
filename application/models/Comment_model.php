<?php

/**
 * Created by PhpStorm.
 * User: 15185
 * Date: 2017/7/25
 * Time: 16:17
 */
class Comment_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->database();
    }

    public function get_comments($post_id)
    {
        $this->db->join('users', 'users.user_id = comments.user_id');
        $this->db->order_by('comment_id', 'ASC');
        $query = $this->db->get_where('comments', array('post_id' => $post_id));
        return $query->result_array();
    }

    public function create_comments()
    {
        date_default_timezone_set('PRC');

        $data = array(
            'post_id' => $_SESSION['post_id'],
            'user_id' => $_SESSION['user_id'],
            'body' => $this->input->post('body'),
            'date_com' => date('Y-m-d H:i:s')
        );
        return $this->db->insert('comments', $data);
    }
}
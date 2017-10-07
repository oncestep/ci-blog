<?php

/**
 * Created by PhpStorm.
 * User: 15185
 * Date: 2017/7/25
 * Time: 11:41
 */
class Post_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->model('post_model');
    }

    public function get_posts($post_id = FALSE, $limit = FALSE, $offset = FALSE, $user_id = FALSE)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        if ($post_id === FALSE) {
            $this->db->order_by('posts.post_id', 'DESC');
            $this->db->join('users', 'users.user_id = posts.user_id');
            $this->db->where('posts.user_id', $user_id);
            $query = $this->db->get('posts');
            return $query->result_array();
        }

        if ($post_id > 0) {
            $this->db->join('users', 'users.user_id = posts.user_id');
            $query = $this->db->get_where('posts', array('post_id' => $post_id));
            return $query->row_array();
        } else {
            $this->db->join('users', 'users.user_id = posts.user_id');
            $this->db->order_by('date_cre', 'DESC');
            $query = $this->db->get('posts');
            return $query->result_array();
        }
    }

    public function get_each($id)
    {
        if ($id) {
            $this->db->where('posts.user_id', $id);
            $this->db->from('posts');
            return $num = $this->db->count_all_results();
        } else {
            $this->db->from('posts');
            return $num = $this->db->count_all_results();
        }
    }

    public function create_posts()
    {
        $id = $_SESSION['user_id'];
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        date_default_timezone_set('PRC');
        $date = date('Y-m-d H:i:s');
        $data = array(
            'user_id' => $id,
            'title' => $title,
            'content' => $content,
            'date_cre' => $date
        );
        return $this->db->insert('posts', $data);
    }

    public function alter_posts()
    {
        date_default_timezone_set('PRC');
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'date_cre' => date('H-m-d H:i:s')
        );
        $this->db->where('post_id', $_SESSION['post_id']);
        return $this->db->update('posts', $data);
    }

    public function delete_posts($id)
    {
        $this->db->where('post_id', $id);
        return $this->db->delete('posts');
    }

}
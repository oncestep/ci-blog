<?php

/**
 * Created by PhpStorm.
 * User: 15185
 * Date: 2017/7/24
 * Time: 16:30
 */
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('encryption');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->database();

        $this->encryption->initialize(
            array(
                'cipher' => 'aes-256',
                'mode' => 'ctr',
                'key' => '<a 32-character random string>'
            )
        );
    }

    //Register users
    public function register($enc_password)
    {
        //Set PRC time
        date_default_timezone_set('PRC');

        //User data array
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'nickname' => $this->input->post('nickname'),
            'telephone' => $this->input->post('telephone'),
            'email' => $this->input->post('email'),
            'statement' => 'Please Enter Some Personal Statements~',
            'date_reg' => date('Y-m-d H:i:s')
        );

        //Insert Information of Users
        return $this->db->insert('users', $data);
    }

    //Log in
    public function login($username, $password)
    {
        //validate
        $result = $this->db->get_where('users', array('username' => $username));
        $row = $result->row_array(0);

        if ($row) {
            //translate the password
            $password_t = $this->encryption->decrypt($row['password']);

        } else {
            return false;
        }

        if ($password === $password_t) {
            return $row;
        } else {
            return false;
        }
    }

    //Show user data
    public function show($user_name)
    {
        $info = $this->db->get_where('users', array('username' => $user_name));
        if ($info) {
            return $info->row_array();
        } else {
            return false;
        }
    }

    //Alter user data
    public function alter($enc_password)
    {
        //User data array
        $data = array(
            'nickname' => $this->input->post('nickname_a'),
            'telephone' => $this->input->post('telephone_a'),
            'email' => $this->input->post('email_a'),
            'password' => $enc_password,
            'statement' => $this->input->post('statement_a')
        );

        //Update data
        $this->db->where('user_id', $_SESSION['user_id']);
        return $this->db->update('users', $data);
    }


    //Check username exists
    public function check_username_exists($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    //Check email exists
    public function check_email_exists($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        if (empty($query->row_array()) || ($email === $_SESSION['user_email'])) {
            return true;
        } else {
            return false;
        }
    }

    //Check telephone exists
    public function check_telephone_exists($tel)
    {
        $query = $this->db->get_where('users', array('telephone' => $tel));
        if (empty($query->row_array()) || ($tel === $_SESSION['user_telephone'])) {
            return true;
        } else {
            return false;
        }
    }
}
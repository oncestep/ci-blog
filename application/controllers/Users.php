<?php

/**
 * Created by PhpStorm.
 * User: 15185
 * Date: 2017/7/24
 * Time: 15:59
 */
class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('encryption');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('user_model');
        $this->load->model('post_model');

        $this->encryption->initialize(array(
            'cipher' => 'aes-256',
            'mode' => 'ctr',
            'key' => '<a 32-character random string>'
        ));
    }

    public function index()
    {
        $this->load->view('entrance/login');
    }

    //Register user
    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('nickname', 'Nickname', 'required');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required|exact_length[11]|callback_check_telephone_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm', 'Confirm_Password', 'matches[password]');

        if ($this->form_validation->run() === FALSE) {
            echo "<script>alert('Illegal Input.');</script>";
            $this->load->view('entrance/login');
        } else {
            // Encrypt password
            $enc_password = $this->encryption->encrypt($this->input->post('password'));

            $signal = $this->user_model->register($enc_password);

            if ($signal === TRUE) {
                // Set message
                $this->session->set_flashdata('user_registered', 'You are now registered and can log in');
                echo "<script>alert('Register Successfully.');</script>";
                redirect('users');
            }
        }
    }

    //Log in user
    public function login()
    {
        $this->form_validation->set_rules('username_s', 'Username_s', 'required');
        $this->form_validation->set_rules('password_s', 'Password_s', 'required');

        if ($this->form_validation->run() === FALSE) {
            echo "<script>alert('Please Enter Both Username And Password.');</script>";
            redirect('users');

        } else {
            //Get username
            $user_name = $this->input->post('username_s');

            //Get the password
            $password = $this->input->post('password_s');

            //Login user
            $user_info = $this->user_model->login($user_name, $password);
            $user_id = $user_info['user_id'];
            $user_nickname = $user_info['nickname'];
            $user_telephone = $user_info['telephone'];
            $user_email = $user_info['email'];

            if ($user_id) {
                $user_data = array(
                    'user_id' => $user_id,
                    'user_name' => $user_name,
                    'user_nickname' => $user_nickname,
                    'user_telephone' => $user_telephone,
                    'user_email' => $user_email,
                    'logged_in' => true
                );
                $this->session->set_userdata($user_data);

                //Set message
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');

                redirect('posts');
            } else {
                //Set message
                $this->session->set_flashdata('login_failed', 'login is invalid');
                echo "<script>alert('LOGIN FAILED');</script>";

                redirect('users');
            }
        }
    }

    //show details
    public function show()
    {
        //check user login
        if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }

        //get user data
        $user_name = $_SESSION['user_name'];
        $data['details'] = $this->user_model->show($user_name);

        //transfer data to view
        $this->load->view('pages/account', $data);
    }

    //alter details
    public function alter()
    {

        //check alter info whether suitable or not
        $this->form_validation->set_rules('nickname_a', 'Nickname_a', 'required');
        $this->form_validation->set_rules('telephone_a', 'Telephone_a', 'required|exact_length[11]|callback_check_telephone_exists');
        $this->form_validation->set_rules('email_a', 'Email_a', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password_a', 'Password_a', 'required');
        $this->form_validation->set_rules('confirm_a', 'Confirm_Password_a', 'required|matches[password_a]');

        if ($this->form_validation->run() === FALSE) {
            redirect('users/show');
            echo "<script>alert('ILLEGAL ALTER');</script>";
        } else {
            $enc_password_a = $this->encryption->encrypt($this->input->post('password_a'));

            $signal = $this->user_model->alter($enc_password_a);

            if ($signal === TRUE) {
                $this->session->set_flashdata('info_altered', 'The changes of the user was saved');
                redirect('users/show');
                echo "<script>alert('Alter Successfully');</script>";

            }

        }

    }

    //logout
    public function logout()
    {
        $this->session->set_flashdata('Log Out Success', 'The Account was logged out');

        $info = array('user_id', 'user_name', 'user_telephone', 'user_email', 'logged_in', 'post_id');
        $this->session->unset_userdata($info);

        redirect('users');
    }


    // Check if username exists
    public function check_username_exists($username)
    {

        if ($this->user_model->check_username_exists($username)) {
            return true;
        } else {
            $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
            return false;
        }
    }

    // Check if email exists
    public function check_email_exists($email)
    {

        if ($this->user_model->check_email_exists($email)) {
            return true;
        } else {
            $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
            return false;
        }
    }

    //Check if telephone exists
    public function check_telephone_exists($tel)
    {

        if ($this->user_model->check_telephone_exists($tel)) {
            return true;
        } else {
            $this->form_validation->set_message('check_telephone_exists', 'That telephone number is taken.Please choose a different one.');
            return false;
        }
    }

}
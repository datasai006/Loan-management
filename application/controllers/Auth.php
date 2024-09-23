<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function register() {
        $this->load->view('register');
    }

    public function register_user() {
        // Load form validation library
        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,user]');

        if ($this->form_validation->run() === FALSE) {
            // If validation fails, reload the registration form with errors
            $this->load->view('register');
        } else {
            // Load the user model
            $this->load->model('User_model');

            // Prepare data for insertion
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),  // Hash the password
                'role' => $this->input->post('role')
            ];

            // Insert user into the database
            $this->User_model->register($data);

            // Redirect or load a success page
            redirect('auth/login');
        }
    }

    public function login() {
        $this->load->view('login');
    }

    public function login_user() {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->User_model->login($email, $password);
            
            if ($user) {
                $userdata = array(
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'logged_in' => TRUE
                );
                 $this->session->set_userdata($userdata);
                redirect('dashboard'); // Change this to your desired dashboard route
            } else {
                $this->session->set_flashdata('error', 'Invalid mobile or password');
                redirect('auth/login');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
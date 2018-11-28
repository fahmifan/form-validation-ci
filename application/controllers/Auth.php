<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->helper('URL');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->library('session');

        // load user model
        $this->load->model('local/UserModel');
    }

    public function login() {
        // set rules for name field in the form
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // set multiple rules by using a pipe `|`.
        // matches[password] means passconf should equals to password.
        // more on see `https://www.codeigniter.com/userguide3/libraries/form_validation.html?highlight=validation#setting-validation-rules`
        $this->form_validation->set_rules('passconf', 'Confirm Password', 'required|matches[password]');

        // if invalid we terminate the function using  "early return"
        if($this->form_validation->run() === FALSE) {
            // if validation failed get back to the form page
            $this->load->view('template/head');
            $this->load->view('form/input');
            return;
        }

        // get form values
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // check authentication
        $is_auth = $this->UserModel->auth($email, $password);

        if(!$is_auth) {
            $this->load->view('template/head');
            $this->load->view('form/input');
            return;
        }

        $this->session->set_userdata([
            "email" => $email,
            "auth" => true,
        ]);

        $this->load->view('template/head');
        $this->load->view('form/success');
    }

    public function logout() {
        $this->session->sess_destroy();

        $this->load->view('template/head');
        $this->load->view('form/input');

        return;
    }
}
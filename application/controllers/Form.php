<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        // check auth
        if($this->session->userdata('auth')) {
            // login page
            $this->load->view('template/head');
            $this->load->view('form/success');            
            return;
        }

        // login page
        $this->load->view('template/head');
        $this->load->view('form/input');
        return;
    }

    public function success() {
        // check if auth
        if(!$this->session->userdata('auth')) {
            $this->load->view('template/head');
            $this->load->view('form/input');            
            return;
        }

        $this->load->view('template/head');
        $this->load->view('form/success');
        return;
    }
}
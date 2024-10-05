<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    function _construct()
    {
        parent::__construct();
    }
    
    public function indexLogin()
    {
        $this->load->view('auth/header');
        $this->load->view('auth/login');
        $this->load->view('auth/footer');
    }
    
    public function indexForgot()
    {
        $this->load->view('auth/header');
        $this->load->view('auth/login');
        $this->load->view('auth/footer');
    }

    public function indexSignup()
    {
        $this->load->view('auth/header');
        $this->load->view('auth/signup');
        $this->load->view('auth/footer');
    }
}
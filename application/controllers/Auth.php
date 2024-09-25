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

    // public function Forgot()
    // {
    //     var_dump('masuk untuk proses forgot');
    //     die();
    // }

    public function indexSignup()
    {
        $this->load->view('auth/header');
        $this->load->view('auth/signup');
        $this->load->view('auth/footer');
    }

    // public function Signup()
    // {
    //     $form = $this->input->post(NULL, TRUE);

    //     $input = [
    //         'name' => $form['name'],
    //         'phone' => $form['phone'],
    //         'username' => $form['username'],
    //         'email' => $form['email'],
    //         'password' => $this->encryption->encrypt($form['password']),
    //         'createdAt' => date('Y-m-d H:i:s')
    //     ];
        
    //     //$this->encryption->decrypt($ciphertext); = decrypt
    //     $cek_exist = $this->user_m->check_exist($form['username'], $form['email']);
    //     if($cek_exist == false)
    //     {
    //         redirect('Auth/indexSignup');
    //     }
        
    //     $this->user_m->insert($input);
    //     redirect('Auth/indexLogin');
    // }
}
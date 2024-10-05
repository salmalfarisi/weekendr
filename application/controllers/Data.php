<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('data/index');
        $this->load->view('template/footer');
    }

    public function form($type, $id) 
    {
        $result['type'] = $type;
        $result['id'] = $id;
        $this->load->view('template/header');
        $this->load->view('data/form', $result);
        $this->load->view('template/footer');
    }
}
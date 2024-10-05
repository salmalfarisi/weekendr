<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
    function _construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->template->verify();
        $array = [];
        $array = $this->data_m->index($data->id);
        $this->template->sendSuccess(205, 'List data', $array);
    }

    public function create()
    {
        $response = $this->template->verify();
        $input = [
            'userid' => $response->id,
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'createdAt' => date('Y-m-d H:i:s')
        ];
        $this->data_m->create($input);
        $this->template->sendSuccess(205, 'Berhasil tambah data', $input);
    }

    public function detail($id)
    {
        $obj = $this->data_m->getOne($id);
        $this->template->sendSuccess(205, 'Detail data', $obj);
    }
    
    public function update($id)
    {
        $this->template->verify();
        $input = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'updatedAt' => date('Y-m-d H:i:s')
        ];
        $this->data_m->update($id, $input);
        $this->template->sendSuccess(205, 'Berhasil update data', $input);
    }
    
    public function delete($id)
    {
        $response = $this->template->verify();
        $this->data_m->delete($id);
        $this->template->sendSuccess(205, 'Berhasil hapus data', null);
    }
}
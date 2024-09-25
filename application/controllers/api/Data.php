<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
    function _construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->template->verify();
        $array = $this->data_m->index();
        $this->template->sendSuccess(205, 'List data', $array);
    }

    public function create()
    {
        $response = $this->template->verify();
        $form = json_decode(trim(file_get_contents('php://input')), true);

        $input = [
            'userid' => $response->id,
            'title' => $form['title'],
            'description' => $form['description'],
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
        $form = json_decode(trim(file_get_contents('php://input')), true);

        $input = [
            'title' => $form['title'],
            'description' => $form['description'],
            'updatedAt' => date('Y-m-d H:i:s')
        ];
        $this->data_m->update($id, $input);
        $this->template->sendSuccess(205, 'Berhasil update data', $input);
    }
    
    public function delete($id)
    {
        $response = $this->template->verify();
        $form = json_decode(trim(file_get_contents('php://input')), true);

        $input = [
            'title' => $form['title'],
            'description' => $form['description'],
            'updatedAt' => date('Y-m-d H:i:s')
        ];
        $this->data_m->delete($id);
        $this->template->sendSuccess(205, 'Berhasil hapus data', null);
    }
}
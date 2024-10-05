<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    function _construct()
    {
        parent::__construct();
    }

    public function Register()
    {
        $cek_exist = $this->user_m->check_exist($this->input->post('username'), $this->input->post('email'));
        if($cek_exist == false)
        {
            $this->template->sendError(400, 'Akun sudah dibuat dalam database');
        }
        else
        {
            $input = [
                'username' => strtolower($this->input->post('username')),
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'email' => strtolower($this->input->post('email')),
                'password' => $this->encryption->encrypt($this->input->post('password')),
            ];
            $this->user_m->insert($input);
            $this->template->sendSuccess(205, 'Berhasil daftar akun', null);
        }
    }

    public function Login()
    {
        $cek_exist = $this->user_m->check_exist(strtolower($this->input->post('user')), strtolower($this->input->post('user')));
        if($cek_exist == true)
        {
            $this->template->sendError(400, 'Akun tidak ditemukan dalam database');
        }
        else
        {
            $getuser = $this->user_m->getOne($this->input->post('user'));
            if($this->encryption->decrypt($getuser->password) != $this->input->post('password'))
            {
                $this->template->sendError(400, 'Password anda salah');
            }
            else
            {
                $token = $this->encryption->encrypt(uniqid().rand(10000000, 99999990));
                $date = date('Y-m-d H:i:s');
                $getexpired = date('Y-m-d H:i:s', strtotime($date. ' + 1 days'));
                $input = [
                    'token' => $token,
                    'expiredAt' => $getexpired
                ];
                $this->user_m->update($getuser->id, $input);

                $obj = new stdClass();
                $obj->id = $getuser->id;
                $obj->name = $getuser->name;
                $obj->email = $getuser->email;
                $obj->username = $getuser->username;
                $obj->token = $token;
                $this->template->sendSuccess(205, 'Berhasil', [$obj]);
            }
        }
    }

    public function logout()
    {
        $response = $this->template->verify();
        $input = [
            'token' => null,
            'expiredAt' => null
        ];
        $this->user_m->update($response->id, $input);
        $this->template->sendSuccess(200, 'Berhasil', []);
    }

    public function hello()
    {
        $this->template->sendSuccess(205, 'Berhasil', []);
    }
    
    public function hello2()
    {
        $data = [];
		$message = '';
        $status = 0;
		
		# guzzle client define
		$client = new GuzzleHttp\Client();
		$url = 'https://anapioficeandfire.com/api/houses';
		try
		{
			$response = $client->request('GET', $url, []);
            $result = json_decode($response->getBody(), true);
            $status = $response->getStatusCode();
			$data = $result;
            $this->template->sendSuccess($status, 'Berhasil', $data);
		} catch (GuzzleHttp\Exception\BadResponseException $e) 
		{
			#guzzle repose for future use
            $status = $response->getStatusCode();
			$message = $e->getResponse();
            $this->template->sendError($status, $message);
		}
    }

    public function hello3($id)
    {
        var_dump('<pre>');
        var_dump('Hello World '.$id);
        var_dump('</pre>');
        die();
    }

    public function verification()
    {
        $response = $this->template->verify();
        $this->template->sendSuccess(200, 'user data', $response);
    }
}
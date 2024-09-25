<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
    public function sendSuccess($code = 200, $message = 'Success', $data)
    {
        $object = new stdClass();
        $object->code = $code;
        $object->message = $message;
        if($data != null)
        {
            $object->data = $data;
        }
        echo json_encode($object);
        die();
    }

    public function sendError($code = 404, $message = 'Error')
    {
        $object = new stdClass();
        $object->code = $code;
        $object->message = $message;
        echo json_encode($object);
        die();
    }

    public function verify()
    {
        $headers = getallheaders();

        if($headers['Authorization'] == null or $headers['Authorization'] == '')
        {
            $this->sendError(400, "Token Invalid");
        }

        $token = str_replace("Bearer ", "", $headers['Authorization']);

        $this->ci =& get_instance();
        $this->ci->load->model('User');
        $result = $this->ci->User->getOneByToken($token);
        if($result == null)
        {
            return $this->sendError(400, "Token Invalid");
        }
        else
        {
            $date1 = strtotime($result->expiredAt);
            $date2 = strtotime(date('Y-m-d H:i:s'));
            if($date1 >= $date2)
            {
                $obj = new stdClass();
                $obj->id = $result->id;
                $obj->name = $result->name;
                $obj->email = $result->email;
                $obj->username = $result->username;
                return $obj;
            }
            else
            {
                return $this->sendError(400, "Token Invalid");
            }
        }
    }
}
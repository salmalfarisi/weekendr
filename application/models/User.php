<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Model
{
    public function insert($data)
    {
        try
        {
            $this->db->trans_start();
            $this->db->insert('users',$data);
            $this->db->trans_complete();
        }
        catch(Exception $e)
        {
            $this->db->trans_rollback();
            var_dump('<pre>');
            var_dump('error while insert data');
            // var_dump($e->getMessage());
            var_dump('</pre>');
            die();
        }
    }
    
    public function update($id, $data)
    {
        try
        {
            $this->db->trans_start();
            $this->db->where('id', $id);
            $this->db->update('users', $data);
            $this->db->trans_complete();
        }
        catch(Exception $e)
        {
            $this->db->trans_rollback();
            var_dump('<pre>');
            var_dump('error while update data');
            // var_dump($e->getMessage());
            var_dump('</pre>');
            die();
        }
    }

    public function getOne($user)
    {
        $this->db->select("*");
        $this->db->where('username', $user);
        $this->db->or_where('email', $user);
        $query = $this->db->get("users");
        return $query->row();
    }
    
    public function getOneByToken($token)
    {
        $this->load->library('encryption');
        $this->db->select("*");
        $this->db->where('token', $token);
        $query = $this->db->get("users");
        return $query->row();
    }

    public function check_exist($username, $email)
    {
        $this->db->where('username', $username);
        $this->db->or_where('email', $email);
        $total = $this->db->count_all_results('users');

        return ($total == 0 ? true : false);
    }
}
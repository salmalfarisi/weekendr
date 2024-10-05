<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class DataM extends CI_Model
{
    public function create($data)
    {
        try
        {
            $this->db->trans_start();
            $this->db->insert('data',$data);
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
            $this->db->update('data', $data);
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

    public function index($id)
    {
        $this->db->select("*");
        $this->db->where('userid', $id);
        $query = $this->db->get("data");
        return $query->result();
    }
    
    public function getOne($id)
    {
        $this->db->select("*");
        $this->db->where('id', $id);
        $query = $this->db->get("data");
        return $query->row();
    }
    
    public function delete($id)
    {
        try
        {
            $this->db->trans_start();
            $this->db->where('id', $id);
            $this->db->delete('data');
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
}
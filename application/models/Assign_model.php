<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assign_model extends CI_Model
{

    public function insert_batch($data)
    {
        // Perform batch insertion
        return $this->db->insert_batch('assign_clients', $data);
    }

    function insert($data)
    {
        return $this->db->insert('assign_clients', $data);
    }
}

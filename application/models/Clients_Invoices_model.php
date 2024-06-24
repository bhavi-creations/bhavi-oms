<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clients_Invoices_model extends CI_Model
{

    public function insert_clients_invoices_model($data)
    {
        // print_r($data); // You can remove this line after testing
        $this->db->insert("clients_invoices", $data);
        // echo $this->db->last_query(); // Print the last executed query (optional for debugging)
        return $this->db->insert_id();
    }

    public function get_client_invoices($client_id)
    {
        $this->db->where('client_id', $client_id);
        $query = $this->db->get("clients_invoices");
        return $query->result_array(); // or result() if you want objects
    }
}
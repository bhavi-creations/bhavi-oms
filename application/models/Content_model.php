<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content_model extends CI_Model
{

    public function insert_content($data)
    {
        // print_r($data); // You can remove this line after testing
        $this->db->insert("content", $data);
        // echo $this->db->last_query(); // Print the last executed query (optional for debugging)
        return $this->db->insert_id();
    }

    public function get_data()
    {
        $this->db->select('content.*, projects_tbl.project_name, staff_tbl.staff_name');
        $this->db->join('projects_tbl', 'projects_tbl.id = content.project_id');
        $this->db->join('staff_tbl', 'staff_tbl.id= content.assign_staff_id');
        $this->db->order_by('content.date', 'DESC');
        $query = $this->db->get('content');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_data_id($id)
    {
        $this->db->select('content.*');
        $this->db->where('id', $id);
        $query = $this->db->get('content');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function update_content($data)
    {

        $content_id = $data['content_id'];
        unset($data['content_id']);
        $this->db->where('id', $content_id);
        $this->db->update('content', $data);

        return $this->db->affected_rows();
    }

    public function delete_content($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('content');
        $this->db->affected_rows();
    }



    public function get_content_by_staff_id($userid)
    {
        $this->db->where('assign_staff_id', $userid);
        $this->db->select('content.*, projects_tbl.project_name, staff_tbl.staff_name');
        $this->db->join('projects_tbl', 'projects_tbl.id = content.project_id');
        $this->db->join('staff_tbl', 'staff_tbl.id= content.assign_staff_id');
        $this->db->order_by('content.date', 'DESC');
        $query = $this->db->get('content');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}

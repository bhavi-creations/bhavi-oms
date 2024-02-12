<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Worksheet_model extends CI_Model {

    function select_worksheets_all()
    {
        $this->db->select('worksheet_tbl.*, staff_tbl.staff_name');
        $this->db->from('worksheet_tbl');
        $this->db->join('staff_tbl', 'worksheet_tbl.staff_id = staff_tbl.id', 'left');
        $this->db->order_by('worksheet_tbl.assign_date', 'ASC');
    
        $query = $this->db->get();
    
        if ($query === FALSE) {
            // Debugging code
            echo $this->db->last_query(); // Output the last executed query
            die('Query failed: ' . $this->db->error());
        }
    
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    
        return array();
    }

    function select_designer_worksheets()
    {
        $this->db->select('wt.*,  staff_tbl.staff_name');
        $this->db->from('worksheet_tbl as wt');
        $this->db->where('wt.department', 13);
        $this->db->join('staff_tbl', 'wt.staff_id = staff_tbl.id', 'left');
        $this->db->order_by('wt.assign_date', 'ASC');
        $query = $this->db->get();
    
        if ($query === FALSE) {
            // Debugging code
            echo 'Query failed: ' . $this->db->error()['message']; // Use ['message'] to access the error message
            die();
        }
    
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    
        return array();
    }

    function select_socialmedia_worksheets()
    {
        $this->db->select('wt.*,  staff_tbl.staff_name');
        $this->db->from('worksheet_tbl as wt');
        $this->db->where('wt.department', 12);
        $this->db->join('staff_tbl','wt.staff_id = staff_tbl.id','left');
        $this->db->order_by('wt.assign_date' , 'ASC');
        $query = $this->db->get();
        if ($query === FALSE) {
            echo 'Query failed: ' . $this->db->error()['message']; // Use ['message'] to access the error message
            die();
        }
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    
        return array();
    }
    
    function select_website_worksheets()
    {
        $this->db->select('wt.*,  staff_tbl.staff_name');
        $this->db->from('worksheet_tbl as wt');
        $this->db->where('wt.department', 10);
        $this->db->join('staff_tbl','wt.staff_id = staff_tbl.id','left');
        $this->db->order_by('wt.assign_date' , 'ASC');
        $query = $this->db->get();
        if ($query === FALSE) {
            echo 'Query failed: ' . $this->db->error()['message']; // Use ['message'] to access the error message
            die();
        }
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    
        return array();

    }
    
    function select_seo_worksheets()
    {
        $this->db->select('wt.*,  staff_tbl.staff_name');
        $this->db->from('worksheet_tbl as wt');
        $this->db->where('wt.department', 11);
        $this->db->join('staff_tbl','wt.staff_id = staff_tbl.id','left');
        $this->db->order_by('wt.assign_date' , 'ASC');
        $query = $this->db->get();
        if ($query === FALSE) {
            echo 'Query failed: ' . $this->db->error()['message']; // Use ['message'] to access the error message
            die();
        }
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    
        return array();
    }
    
    function delete_worksheet($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("worksheet_tbl");
        $this->db->affected_rows();
    }
}



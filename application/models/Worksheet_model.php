<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Worksheet_model extends CI_Model {

    function select_worksheets_all()
    {
        $this->db->order_by('assign_date', 'ASC');
        $query = $this->db->get('worksheet_tbl');
    
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    
        return array();
    }
 
    
}



<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_Reports_model extends CI_Model {


    function insert_work_reports($data)
    {
        $this->db->insert("work_reports_tbl",$data);
        return $this->db->insert_id();
    }

    function select_work_reports()
    {
        $this->db->order_by('work_reports_tbl.on_date','DESC');
        $this->db->select("work_reports_tbl.*");
        $this->db->from("work_reports_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_work_reports_byID($id)
    {
        $this->db->where('work_reports_tbl.id',$id);
        $this->db->select("work_reports_tbl.*");
        $this->db->from("work_reports_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_work_reports_by_staffID($id)
    {
        $this->db->where('work_reports_tbl.staff_id',$id);
        $this->db->select("work_reports_tbl.*");
        $this->db->from("work_reports_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_work_reports_by_taskID($id)
    {
        $this->db->where_in('work_reports_tbl.id',$id);
        $this->db->select("work_reports_tbl.*");
        $this->db->from("work_reports_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_work_reports_by_projectID($id)
    {
        $this->db->where_in('work_reports_tbl.id',$id);
        $this->db->select("work_reports_tbl.*");
        $this->db->from("work_reports_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function delete_work_reports($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("work_reports_tbl");
        $this->db->affected_rows();
    }
    
    function update_work_reports($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('work_reports_tbl',$data);
        $this->db->affected_rows();
    }
}

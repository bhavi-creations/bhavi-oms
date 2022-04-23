<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_Tasks_model extends CI_Model {


    function insert_project_tasks($data)
    {
        $this->db->insert("project_tasks_tbl",$data);
        return $this->db->insert_id();
    }

    function select_project_tasks()
    {
        $this->db->order_by('pt.due_date','ASC');
        $this->db->select("pt.*,pt.id as p_id,p.*");
        $this->db->from("project_tasks_tbl pt");
        $this->db->join("projects_tbl p","pt.project_id = p.id", "left");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_project_tasks_byID($id)
    {
        $this->db->where('pt.id',$id);
        $this->db->select("pt.*,pt.id as p_id,p.*");
        $this->db->from("project_tasks_tbl pt");
        $this->db->join("projects_tbl p","pt.project_id = p.id", "left");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_project_tasks_by_staffID($id)
    {
        $this->db->where_in('pt.assigned_to',$id);
        $this->db->select("pt.*,pt.id as p_id,p.*");
        $this->db->from("project_tasks_tbl pt");
        $this->db->join("projects_tbl p","pt.project_id = p.id", "left");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_project_tasks_by_projectID($id)
    {
        $this->db->where_in('pt.project_id',$id);
        $this->db->select("pt.*,pt.id as p_id,p.*");
        $this->db->from("project_tasks_tbl pt");
        $this->db->join("projects_tbl p","pt.project_id = p.id", "left");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function delete_project_tasks($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("project_tasks_tbl");
        $this->db->affected_rows();
    }
    
    function update_project_tasks($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('project_tasks_tbl',$data);
        $this->db->affected_rows();
    }
}

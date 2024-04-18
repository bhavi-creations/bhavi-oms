<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Work_Reports_model extends CI_Model
{


    function insert_work_reports($data)
    {
        $this->db->insert("work_reports_tbl", $data);
        return $this->db->insert_id();
    }

    function select_work_reports()
    {
        $this->db->order_by('work_reports_tbl.on_date', 'DESC');
        $this->db->select("work_reports_tbl.*");
        $this->db->from("work_reports_tbl");
        $qry = $this->db->get();

        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();

            foreach ($result as $key => $result_data) {
                // Check if task_id exists and is not null
                if (isset($result_data['task_id']) && !is_null($result_data['task_id'])) {
                    $task_id = $result_data['task_id'];
                    $this->load->model('Project_Tasks_model', 'tasks_model');
                    $task_result = $this->tasks_model->select_project_tasks_byID($task_id);
                    if (!empty($task_result)) {
                        $result[$key]['task_data'] = $task_result[0];
                    } else {
                        $result[$key]['task_data'] = null; // or handle it as needed
                    }
                }

                // Check if staff_id exists and is not null
                if (isset($result_data['staff_id']) && !is_null($result_data['staff_id'])) {
                    $staff_id = $result_data['staff_id'];
                    $this->load->model('Staff_model', 'staff_model');
                    $staff_result = $this->staff_model->select_staff_byID($staff_id);

                    // Check if the query returned any results
                    if (!empty($staff_result)) {
                        $result[$key]['staff_data'] = $staff_result[0];
                    } else {
                        $result[$key]['staff_data'] = null; // or handle it as needed
                    }
                }
            }

            return $result;
        } else {
            return array(); // or handle it as needed
        }
    }



    function select_work_reports_byID($id)
    {
        $this->db->where('work_reports_tbl.id', $id);
        $this->db->select("work_reports_tbl.*");
        $this->db->from("work_reports_tbl");
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function select_work_reports_by_staffID($id)
    {
        $this->db->where('work_reports_tbl.staff_id', $id);
        $this->db->select("work_reports_tbl.*");
        $this->db->from("work_reports_tbl");
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            foreach ($result as $key => $result_data) {
                $task_id = $result_data['task_id'];
                $this->load->model('Project_Tasks_model', 'tasks_model');
                $task_result = $this->tasks_model->select_project_tasks_byID($task_id);
                $result[$key]['task_data'] = $task_result['0'];

                $staff_id = $result_data['staff_id'];
                $this->load->model('Staff_model', 'staff_model');
                $staff_result = $this->staff_model->select_staff_byID($staff_id);
                $result[$key]['staff_data'] = $staff_result['0'];
            }
            return $result;
        }
    }

    function select_work_reports_by_taskID($id)
    {
        $this->db->where_in('work_reports_tbl.id', $id);
        $this->db->select("work_reports_tbl.*");
        $this->db->from("work_reports_tbl");
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function select_work_reports_by_projectID($id)
    {
        $this->db->where_in('work_reports_tbl.id', $id);
        $this->db->select("work_reports_tbl.*");
        $this->db->from("work_reports_tbl");
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function delete_work_reports($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("work_reports_tbl");
        $this->db->affected_rows();
    }

    function update_work_reports($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('work_reports_tbl', $data);
        $this->db->affected_rows();
    }
}

<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Salary_model extends CI_Model

{

    function insert_salary($data)

    {

        $this->db->insert("salary_tbl", $data);

        $this->db->affected_rows();
    }



    function select_salary()

    {

        $this->db->order_by('staff_tbl.id', 'DESC');

        $this->db->select("salary_tbl.*,staff_tbl.staff_name,staff_tbl.pic,department_tbl.department_name");

        $this->db->from("salary_tbl");

        $this->db->join("staff_tbl", 'staff_tbl.id=salary_tbl.staff_id');

        $this->db->join("department_tbl", 'department_tbl.id=staff_tbl.department_id');

        $qry = $this->db->get();

        if ($qry->num_rows() > 0) {

            $result = $qry->result_array();

            return $result;
        }
    }



    function select_salary_byID($id)

    {

        $this->db->where('salary_tbl.id', $id);

        $this->db->select("salary_tbl.*,staff_tbl.staff_name,staff_tbl.city,staff_tbl.state,staff_tbl.country,staff_tbl.mobile,staff_tbl.email,department_tbl.department_name");

        $this->db->from("salary_tbl");

        $this->db->join("staff_tbl", 'staff_tbl.id=salary_tbl.staff_id');

        $this->db->join("department_tbl", 'department_tbl.id=staff_tbl.department_id');

        $qry = $this->db->get();

        if ($qry->num_rows() > 0) {

            $result = $qry->result_array();

            return $result;
        }
    }



    function select_salary_byStaffID($staffid)

    {

        $this->db->where('salary_tbl.staff_id', $staffid);

        $this->db->select("salary_tbl.*,staff_tbl.staff_name,staff_tbl.city,staff_tbl.state,staff_tbl.country,staff_tbl.mobile,staff_tbl.email,department_tbl.department_name");

        $this->db->from("salary_tbl");

        $this->db->join("staff_tbl", 'staff_tbl.id=salary_tbl.staff_id');

        $this->db->join("department_tbl", 'department_tbl.id=staff_tbl.department_id');

        $qry = $this->db->get();

        if ($qry->num_rows() > 0) {

            $result = $qry->result_array();

            return $result;
        }
    }



    function select_staff_byEmail($email)

    {



        $this->db->where('email', $email);

        $qry = $this->db->get('staff_tbl');

        if ($qry->num_rows() > 0) {

            $result = $qry->result_array();

            return $result;
        }
    }



    function sum_salary()

    {

        $this->db->select_sum('total');

        $qry = $this->db->get('salary_tbl');

        if ($qry->num_rows() > 0) {

            $result = $qry->result_array();

            return $result;
        }
    }



    function delete_salary($id)

    {

        $this->db->where('id', $id);

        $this->db->delete("salary_tbl");

        $this->db->affected_rows();
    }





    function update_staff($data, $id)

    {

        $this->db->where('id', $id);

        $this->db->update('staff_tbl', $data);

        $this->db->affected_rows();
    }



    public function insert_basic_salary($staff_id, $basic_salary)
    {
        $data = array(
            'staff_id' => $staff_id,
            'basic_salary' => $basic_salary,
            'added_by' => 1, // set your user ID or admin ID
            'updated_on' => date('Y-m-d'),
        );

        return $this->db->insert('salary_tbl', $data);
    }

    public function insert_staff_salaries()
    {
        // Get all staff with a salary > 0
        $this->db->where('salary >', 0);
        $staffs = $this->db->get('staff_tbl')->result();

        foreach ($staffs as $staff) {
            // Check if salary record already exists for this staff
            $this->db->where('staff_id', $staff->id);
            $exists = $this->db->get('salary_tbl')->row();

            if (!$exists) {
                // Insert salary record
                $data = array(
                    'staff_id'       => $staff->id,
                    'basic_salary'   => $staff->salary,
                    'allowance'      => 0, // default for now
                    'working_days'   => 0, // default
                    'worked_days'    => 0,
                    'no_of_leaves'   => 0,
                    'salary_per_day' => 0,
                    'total'          => 0,
                    'added_by'       => 1, // you can update this dynamically
                    'updated_on'     => date('Y-m-d'),
                );
                $this->db->insert('salary_tbl', $data);
            }
        }
    }




    public function sync_staff_salaries()
    {
        $this->db->where('salary >', 0);
        $staffs = $this->db->get('staff_tbl')->result();

        foreach ($staffs as $staff) {
            // Check if salary record exists
            $this->db->where('staff_id', $staff->id);
            $query = $this->db->get('salary_tbl');

            $data = array(
                'basic_salary'   => $staff->salary,
                'updated_on'     => date('Y-m-d'),
                'added_by'       => 1 // change this dynamically if needed
            );

            if ($query->num_rows() > 0) {
                // 🔄 Update existing
                $this->db->where('staff_id', $staff->id);
                $this->db->update('salary_tbl', $data);
            } else {
                // ➕ Insert new
                $data['staff_id'] = $staff->id;
                $data['allowance'] = 0;
                $data['working_days'] = 0;
                $data['worked_days'] = 0;
                $data['no_of_leaves'] = 0;
                $data['salary_per_day'] = 0;
                $data['total'] = 0;

                $this->db->insert('salary_tbl', $data);
            }
        }
    }



    public function sync_salary_for_staff($staff_id)
{
    $staff = $this->db->get_where('staff_tbl', ['id' => $staff_id])->row();

    if ($staff && $staff->salary > 0) {
        $data = [
            'basic_salary'   => $staff->salary,
            'updated_on'     => date('Y-m-d'),
            'added_by'       => 1 // update dynamically if needed
        ];

        $exists = $this->db->get_where('salary_tbl', ['staff_id' => $staff_id])->row();

        if ($exists) {
            // 🔄 Update existing salary record
            $this->db->where('staff_id', $staff_id);
            $this->db->update('salary_tbl', $data);
        } else {
            // ➕ Insert new salary record
            $data['staff_id'] = $staff_id;
            $data['allowance'] = 0;
            $data['working_days'] = 0;
            $data['worked_days'] = 0;
            $data['no_of_leaves'] = 0;
            $data['salary_per_day'] = 0;
            $data['total'] = 0;

            $this->db->insert('salary_tbl', $data);
        }
    }
}

}

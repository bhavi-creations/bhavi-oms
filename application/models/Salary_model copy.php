<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Salary_model extends CI_Model

{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


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


    public function get_staff_with_salary_details_by_department($department_id)
    {
        $this->db->select('s.id, s.staff_name, s.salary as basic_salary_from_staff_tbl, d.department_name, st.basic_salary, st.allowance, st.working_days, st.worked_days, st.no_of_leaves, st.salary_per_day, st.total');
        $this->db->from('staff_tbl s');
        $this->db->join('department_tbl d', 'd.id = s.department_id');
        $this->db->join('salary_tbl st', 'st.staff_id = s.id', 'left'); // Use LEFT JOIN to get all staff, even if no salary record yet
        $this->db->where('s.department_id', $department_id);
        $this->db->order_by('s.staff_name', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }




    public function get_employee_login_days($staff_id, $year, $month)
    {
        $this->db->select('COUNT(DISTINCT DATE(login_date_time)) as login_days'); // Extract date from datetime
        $this->db->from('login_records_tbl'); // <--- Updated to your table name
        $this->db->where('staff_id', $staff_id);
        $this->db->where('YEAR(login_date_time)', $year); // Filter by year
        $this->db->where('MONTH(login_date_time)', $month); // Filter by month
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['login_days'] ?? 0; // Return 0 if no logins found
    }

    public function get_staff_salary_details_for_payslip($staff_id, $month, $year)
    {
        $this->db->select('s.id, s.staff_name, s.designation, s.bank_account_no, s.pan_adhar_no, d.department_name,
                       st.basic_salary, st.allowance, st.working_days, st.worked_days, st.no_of_leaves,
                       st.salary_per_day, st.total'); // Add other salary components or deductions here
        $this->db->from('staff_tbl s');
        $this->db->join('department_tbl d', 'd.id = s.department_id', 'left');
        $this->db->join('salary_tbl st', 'st.staff_id = s.id', 'left');
        $this->db->where('s.id', $staff_id);
        // Assuming your salary_tbl has columns for month and year of the salary record
        $this->db->where('st.salary_month', $month);
        $this->db->where('st.salary_year', $year);
        $query = $this->db->get();
        return $query->row_array(); // Returns a single row for the employee's salary that month
    }
}

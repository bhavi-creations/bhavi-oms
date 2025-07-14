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
        return $this->db->affected_rows();
    }


    public function select_salary($staff_name_filter = null, $start_date_filter = null, $end_date_filter = null)
    {
        // Now correctly selecting 'worked_days' from salary_tbl
        $this->db->select("salary_tbl.*, salary_tbl.worked_days, staff_tbl.staff_name, staff_tbl.pic, department_tbl.department_name");
        $this->db->from("salary_tbl");
        $this->db->join("staff_tbl", 'staff_tbl.id = salary_tbl.staff_id');
        $this->db->join("department_tbl", 'department_tbl.id = staff_tbl.department_id');

        // Default sorting: Order by added_on for latest first, then by staff name
        $this->db->order_by('salary_tbl.added_on', 'DESC');
        $this->db->order_by('staff_tbl.staff_name', 'ASC');

        // Apply Staff Name filter if provided
        if (!empty($staff_name_filter)) {
            $this->db->like('staff_tbl.staff_name', $staff_name_filter); // Use 'like' for partial matches
        }

        // Apply Date Range filters
        if (!empty($start_date_filter) && !empty($end_date_filter)) {
            // Filter by the range of 'added_on' dates
            // DATE() function extracts just the date part, ignoring time
            $this->db->where('DATE(salary_tbl.added_on) >=', $start_date_filter);
            $this->db->where('DATE(salary_tbl.added_on) <=', $end_date_filter);
        }

        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            return $qry->result_array();
        }
        return []; // Return an empty array if no results
    }
    function select_salary_byID($id)
    {
        $this->db->where('salary_tbl.id', $id);
        $this->db->select("salary_tbl.*,staff_tbl.staff_name,staff_tbl.city,staff_tbl.state,staff_tbl.country,staff_tbl.mobile,staff_tbl.email,department_tbl.department_name");
        $this->db->from("salary_tbl");
        $this->db->join("staff_tbl", 'staff_tbl.id=salary_tbl.staff_id');
        $this->db->join("department_tbl", 'department_tbl.id=staff_tbl.department_id');
        $qry = $this->db->get();


        echo $this->db->last_query(); // Displays the last executed query
        // exit();

        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
        return [];
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
        return [];
    }

    function select_staff_byEmail($email)
    {
        $this->db->where('email', $email);
        $qry = $this->db->get('staff_tbl');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
        return [];
    }

    function sum_salary()
    {
        $this->db->select_sum('total');
        $qry = $this->db->get('salary_tbl');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result[0]['total'] ?? 0;
        }
        return 0;
    }

    function delete_salary($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("salary_tbl");
        return $this->db->affected_rows();
    }

    function update_staff($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('staff_tbl', $data);
        return $this->db->affected_rows();
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
        $this->db->where('salary >', 0);
        $staffs = $this->db->get('staff_tbl')->result();

        foreach ($staffs as $staff) {
            $this->db->where('staff_id', $staff->id);
            $exists = $this->db->get('salary_tbl')->row();

            if (!$exists) {
                $data = array(
                    'staff_id'       => $staff->id,
                    'basic_salary'   => $staff->salary,
                    'allowance'      => 0, // default for now
                    'working_days'   => 0, // default
                    'worked_days'    => 0,
                    'no_of_leaves'   => 0,
                    'salary_per_day' => 0,
                    'total'          => 0,
                    'gross_salary' => 0.00, // New field, default
                    'pf_deduction' => 0.00, // New field, default
                    'esi_deduction' => 0.00, // New field, default
                    'professional_tax_deduction' => 0.00, // New field, default
                    'tds_deduction' => 0.00, // New field, default
                    'other_deductions' => 0.00, // New field, default
                    'net_payable_salary' => 0.00, // New field, default
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
            $this->db->where('staff_id', $staff->id);
            $query = $this->db->get('salary_tbl');

            $data = array(
                'basic_salary'   => $staff->salary,
                'updated_on'     => date('Y-m-d'),
                'added_by'       => 1 // change this dynamically if needed
            );

            if ($query->num_rows() > 0) {
                $this->db->where('staff_id', $staff->id);
                $this->db->update('salary_tbl', $data);
            } else {
                $data['staff_id'] = $staff->id;
                $data['allowance'] = 0;
                $data['working_days'] = 0;
                $data['worked_days'] = 0;
                $data['no_of_leaves'] = 0;
                $data['salary_per_day'] = 0;
                $data['total'] = 0;
                $data['gross_salary'] = 0.00; // New field, default
                $data['pf_deduction'] = 0.00; // New field, default
                $data['esi_deduction'] = 0.00; // New field, default
                $data['professional_tax_deduction'] = 0.00; // New field, default
                $data['tds_deduction'] = 0.00; // New field, default
                $data['other_deductions'] = 0.00; // New field, default
                $data['net_payable_salary'] = 0.00; // New field, default

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
                $this->db->where('staff_id', $staff_id);
                $this->db->update('salary_tbl', $data);
            } else {
                $data['staff_id'] = $staff_id;
                $data['allowance'] = 0;
                $data['working_days'] = 0;
                $data['worked_days'] = 0;
                $data['no_of_leaves'] = 0;
                $data['salary_per_day'] = 0;
                $data['total'] = 0;
                $data['gross_salary'] = 0.00; // New field, default
                $data['pf_deduction'] = 0.00; // New field, default
                $data['esi_deduction'] = 0.00; // New field, default
                $data['professional_tax_deduction'] = 0.00; // New field, default
                $data['tds_deduction'] = 0.00; // New field, default
                $data['other_deductions'] = 0.00; // New field, default
                $data['net_payable_salary'] = 0.00; // New field, default

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
        $this->db->select('COUNT(DISTINCT DATE(login_date_time)) as login_days');
        $this->db->from('login_records_tbl');
        $this->db->where('staff_id', $staff_id);
        $this->db->where('YEAR(login_date_time)', $year);
        $this->db->where('MONTH(login_date_time)', $month);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['login_days'] ?? 0;
    }

    // --- CRITICALLY UPDATED METHOD FOR PAYSLIP GENERATION ---
    public function get_staff_salary_details_for_payslip($staff_id, $month, $year)
    {
        $this->db->select('
            s.id,
            s.staff_name,
            s.email,
            s.mobile as phone,
            s.address,
            d.department_name,
            st.basic_salary,
            st.allowance,
            st.working_days,
            st.worked_days,
            st.no_of_leaves,
            st.salary_per_day,
            st.total,
            st.gross_salary,
            st.pf_deduction,
            st.esi_deduction,
            st.professional_tax_deduction,
            st.tds_deduction,
            st.other_deductions,
            st.net_payable_salary
        ');
        $this->db->from('staff_tbl s');
        $this->db->join('department_tbl d', 'd.id = s.department_id', 'left');
        $this->db->join('salary_tbl st', 'st.staff_id = s.id', 'left');
        $this->db->where('s.id', $staff_id);
        // Filter by YEAR and MONTH of 'updated_on' from salary_tbl
        $this->db->where('YEAR(st.updated_on)', $year);
        $this->db->where('MONTH(st.updated_on)', $month);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_staff_without_current_month_salary($department_id = NULL)
    {
        // Get current month and year
        $current_month = date('m'); // '07' for July
        $current_year = date('Y');   // '2025'

        $this->db->select('st.*, d.department_name');
        $this->db->from('staff_tbl st');
        $this->db->join('department_tbl d', 'd.id = st.department_id', 'left');

        // LEFT JOIN with salary_tbl, but specifically look for entries for the current month and year
        $this->db->join(
            'salary_tbl s',
            's.staff_id = st.id AND s.month = ' . $current_month . ' AND s.year = ' . $current_year,
            'left'
        );

        // Filter by department if provided
        if ($department_id !== NULL) {
            $this->db->where('st.department_id', $department_id);
        }

        // Only select staff who do NOT have a salary entry for the current month and year
        $this->db->where('s.id IS NULL'); // This ensures only staff without a current month's salary are selected

        $query = $this->db->get();
        return $query->result_array();
    }
}

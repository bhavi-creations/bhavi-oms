<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Salary extends CI_Controller

{



    function __construct()

    {

        parent::__construct();

        if (!$this->session->userdata('logged_in')) {

            redirect(base_url() . 'login');
        }
        $this->load->model('Staff_model');
        $this->load->model('Salary_model');
    }



    public function index()

    {

        $data['departments'] = $this->Department_model->select_departments();

        $this->load->view('admin/header');

        $this->load->view('admin/add-salary', $data);

        $this->load->view('admin/footer');
    }


    public function fetch_and_add_basic_salary($staff_id)
    {
        $basic_salary = $this->Staff_model->get_salary($staff_id);

        if ($basic_salary === false) {
            echo "Salary not found for staff ID: " . $staff_id;
            return;
        }

        $inserted = $this->Salary_model->insert_basic_salary($staff_id, $basic_salary);

        if ($inserted) {
            echo "Basic salary inserted successfully!";
        } else {
            echo "Failed to insert basic salary.";
        }
    }


    public function sync_staff_salaries()
    {
        $this->load->model('Salary_model');
        $this->Salary_model->sync_staff_salaries();
        echo "Staff salaries synced successfully with salary_tbl.";
    }


    public function invoice($id)

    {

        $data['content'] = $this->Salary_model->select_salary_byID($id);

        $this->load->view('admin/header');

        $this->load->view('admin/salary-invoice', $data);

        $this->load->view('admin/footer');
    }



    public function invoice_print($id)

    {

        $data['content'] = $this->Salary_model->select_salary_byID($id);

        $this->load->view('admin/invoice-print', $data);
    }



    public function staff_invoice($id)

    {

        $data['content'] = $this->Salary_model->select_salary_byID($id);

        $this->load->view('staff/header');

        $this->load->view('staff/salary-invoice', $data);

        $this->load->view('staff/footer');
    }



    public function staff_invoice_print($id)

    {

        $data['content'] = $this->Salary_model->select_salary_byID($id);

        $this->load->view('staff/invoice-print', $data);
    }



    public function manage()

    {

        $data['staff'] = $this->Staff_model->select_staff();

        $data['content'] = $this->Salary_model->select_salary();

        $this->load->view('admin/header');

        $this->load->view('admin/manage-salary', $data);

        $this->load->view('admin/footer');
    }



    public function view()

    {

        $staff = $this->session->userdata('userid');

        $data['content'] = $this->Salary_model->select_salary_byStaffID($staff);

        $this->load->view('staff/header');

        $this->load->view('staff/view-salary', $data);

        $this->load->view('staff/footer');
    }



    public function insert()

    {

        $id = $this->input->post('txtid');

        $basic = $this->input->post('txtbasic');

        $allowance = $this->input->post('txtallowance');

        $working_days = $this->input->post('working_days');

        $worked_days = $this->input->post('worked_days');

        $no_of_leaves = $this->input->post('no_of_leaves');

        $salary_per_day = $this->input->post('salary_per_day');

        $total = $this->input->post('txttotal');

        $added = $this->session->userdata('userid');

        $config2['upload_path'] = 'uploads/staff-files/';

        $config2['allowed_types'] = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config2);

        $this->upload->initialize($config2);

        $file_names = [];



        $payslips = $_FILES['payslip'];



        for ($i = 0; $i < count($payslips['name']); $i++) {

            if ($payslips['error'][$i] == 0 && $payslips['name'][$i] != '') {

                $_FILES['file']['name'] = $payslips['name'][$i];

                $_FILES['file']['type'] = $payslips['type'][$i];

                $_FILES['file']['tmp_name'] = $payslips['tmp_name'][$i];

                $_FILES['file']['error'] = $payslips['error'][$i];

                $_FILES['file']['size'] = $payslips['size'][$i];



                if ($this->upload->do_upload('file')) {

                    $file_data = $this->upload->data();

                    $file_names[] = $file_data['file_name'];
                } else {

                    $file_names[] = $this->upload->display_errors();
                }
            } else {

                if ($payslips['error'][$i] != 4) { // Error code 4 means no file was uploaded

                    $file_names[] = 'Error uploading file: ' . $payslips['name'][$i];
                }
            }
        }



        $salary = array();

        for ($i = 0; $i < count($id); $i++) {

            if ($total[$i] > 0) {

                $data = $this->Salary_model->insert_salary(

                    array(

                        'staff_id' => $id[$i],

                        'basic_salary' => $basic[$i],

                        'allowance' => $allowance[$i],

                        'working_days' => $working_days[$i],

                        'worked_days' => $worked_days[$i],

                        'payslip' => $file_names[$i],

                        'no_of_leaves' => $no_of_leaves[$i],

                        'salary_per_day' => $salary_per_day[$i],

                        'total' => $total[$i],

                        'added_by' => $added

                    )

                );
            }
        }



        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', "Salary Added Succesfully");
        } else {

            $this->session->set_flashdata('error', "Sorry, Salary Adding Failed.");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }



    public function update()

    {

        $id = $this->input->post('txtid');

        $department = $this->input->post('txtdepartment');

        $data = $this->Department_model->update_department(array('department_name' => $department), $id);

        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', "Salary Updated Succesfully");
        } else {

            $this->session->set_flashdata('error', "Sorry, Salary Update Failed.");
        }

        redirect(base_url() . "department/manage_department");
    }





    function edit($id)

    {

        $data['content'] = $this->Department_model->select_department_byID($id);

        $this->load->view('admin/header');

        $this->load->view('admin/edit-department', $data);

        $this->load->view('admin/footer');
    }





    function delete($id)

    {

        $data = $this->Salary_model->delete_salary($id);

        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', "Salary Deleted Succesfully");
        } else {

            $this->session->set_flashdata('error', "Sorry, Salary Delete Failed.");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }





    public function get_salary_list()
    {
        $dept = $this->input->post('dept');  // safer to use CI input

        $staff_data = $this->Staff_model->select_staff_byDept($dept);

        if (!empty($staff_data)) {

            echo '<div class="box-body">
            <div class="col-md-12">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
            <thead>
              <tr>
                 <th>Staff</th>
                 <th>Basic Salary</th>
                 <th>Allowance</th>
                 <th>Working Days</th>
                 <th>No of Leaves</th>
                 <th>Worked Days</th>
                 <th>Salary/Day</th>
                 <th>Pay Slip</th>
                 <th>Total</th>
              </tr>
              </thead>
              <tbody>';

            foreach ($staff_data as $staff) {
                // Fetch salary record for this staff from salary_tbl
                $salary_record = $this->db->get_where('salary_tbl', ['staff_id' => $staff['id']])->row_array();

                // If record exists, use values, else empty/defaults
                $basic_salary = isset($salary_record['basic_salary']) ? $salary_record['basic_salary'] : '';
                $allowance = isset($salary_record['allowance']) ? $salary_record['allowance'] : '';
                $working_days = isset($salary_record['working_days']) ? $salary_record['working_days'] : '';
                $no_of_leaves = isset($salary_record['no_of_leaves']) ? $salary_record['no_of_leaves'] : '';
                $worked_days = isset($salary_record['worked_days']) ? $salary_record['worked_days'] : '';
                $salary_per_day = isset($salary_record['salary_per_day']) ? $salary_record['salary_per_day'] : '';
                $total = isset($salary_record['total']) ? $salary_record['total'] : '';

                echo '<tr>
                <td>' . htmlspecialchars($staff["staff_name"]) . '</td>
                <td>
                    <input type="hidden" name="txtid[]" value="' . $staff["id"] . '">
                    <input type="text" id="basic_salary" name="txtbasic[]" class="form-control expenses" value="' . $basic_salary . '">
                </td>
                <td><input type="text" name="txtallowance[]" class="form-control expenses allowance" value="' . $allowance . '"></td>
                <td><input type="text" name="working_days[]" class="form-control working_days" value="' . $working_days . '"></td>
                <td><input type="text" id="no_of_leaves" name="no_of_leaves[]" class="form-control no_of_leaves" value="' . $no_of_leaves . '"></td>
                <td><input type="text" id="worked_days" name="worked_days[]" class="form-control worked_days" readonly value="' . $worked_days . '"></td>
                <td><input type="text" id="salary_per_day" name="salary_per_day[]" class="form-control" readonly value="' . $salary_per_day . '"></td>
                <td><input type="file" id="payslip" name="payslip[]" class="form-control"></td>
                <td><input type="text" id="total" name="txttotal[]" class="form-control" value="' . $total . '"></td>
            </tr>';
            }

            echo '</tbody>
            </table>
            </div>
            </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
            </div>';
        }
    }
}

<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/dompdf/dompdf/autoload.inc.php';

use Dompdf\Dompdf; // Use the Dompdf namespace


class Salary extends CI_Controller

{



    public function __construct()
    {
        parent::__construct();

        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url() . 'login');
        }

        // Load necessary models
        $this->load->model('Staff_model');
        $this->load->model('Salary_model');
        $this->load->model('Company_assets_model'); // Assuming you have a model to get company asset paths
        $this->load->helper('url'); // For base_url() in template
        $this->load->helper('date'); // For date functions if needed
    }

    public function generate_payslip_pdf($staff_id, $pay_month, $pay_year)
    {
        // --- 1. Fetch Employee and Salary Data ---
        // You'll need to ensure your Salary_model has a method like this
        // to get specific salary record for a staff for a given month/year.
        $employee_salary_data = $this->Salary_model->get_staff_salary_details_for_payslip($staff_id, $pay_month, $pay_year);

        if (empty($employee_salary_data)) {
            // Handle case where no salary data is found for the given month/employee
            $this->session->set_flashdata('error', 'Salary data not found for the specified employee and month.');
            redirect(base_url('admin/salary_management')); // Redirect back to a relevant page
            return;
        }

        // Get login days for attendance summary
        $login_days = $this->Salary_model->get_employee_login_days($staff_id, $pay_year, $pay_month);
        $employee_salary_data['login_days'] = $login_days; // Add to data array

        // --- 2. Fetch Company Assets (Logo, Signature, Stamp Paths) ---
        // Assuming your Company_assets_model has methods like get_asset_by_type()
        // Ensure your database has entries for 'logo', 'signature', 'stamp' with their file paths.
        $company_logo = $this->Company_assets_model->get_asset_by_type('logo');
        $authorized_signature = $this->Company_assets_model->get_asset_by_type('signature');
        $company_stamp = $this->Company_assets_model->get_asset_by_type('stamp');

        $data['company_logo_path'] = $company_logo ? $company_logo['file_path'] : ''; // Adjust 'file_path' to your column name
        $data['authorized_signature_path'] = $authorized_signature ? $authorized_signature['file_path'] : '';
        $data['company_stamp_path'] = $company_stamp ? $company_stamp['file_path'] : '';

        // --- 3. Prepare Data for the Payslip Template ---
        $data['employee_data'] = $employee_salary_data;
        $data['pay_month'] = date('F', mktime(0, 0, 0, $pay_month, 10)); // Convert month number to name (e.g., 7 -> July)
        $data['pay_year'] = $pay_year;

        // Optional: Calculate Net Pay in Words (you'll need a helper function for this)
        // Example: $this->load->helper('number_to_words_helper');
        // $data['net_pay_in_words'] = number_to_words($employee_salary_data['total']);
        $data['net_pay_in_words'] = 'N/A'; // Placeholder if no helper yet

        // --- 4. Load the HTML Content from the View ---
        // This will render the HTML template with all the data
        $html = $this->load->view('admin/payslip_template', $data, true);

        // --- 5. Initialize Dompdf ---
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // --- 6. Output the Generated PDF ---
        $file_name = 'Payslip_' . $employee_salary_data['staff_name'] . '_' . $data['pay_month'] . '_' . $data['pay_year'] . '.pdf';

        // Stream the PDF to the browser for viewing/download
        $dompdf->stream($file_name, array("Attachment" => 0)); // 0 = View in browser, 1 = Force download
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

        // Load the Staff_model if not already loaded (good practice)
        $this->load->model('Staff_model');

        // Get filter parameters from the URL (GET method for filters)
        // Default to null if not present, which the model handles
        $staff_name_filter = $this->input->get('salary_staff');
        $start_date_filter = $this->input->get('salary_min');
        $end_date_filter = $this->input->get('salary_max');

        // Pass the filters to the model method
        $data['content'] = $this->Salary_model->select_salary(
            $staff_name_filter,
            $start_date_filter,
            $end_date_filter
        );

        // Also pass the filter values back to the view so the inputs can retain their selected values
        $data['selected_staff'] = $staff_name_filter;
        // Set default dates for the filter inputs if they are not provided in the URL
        $data['selected_min_date'] = $start_date_filter ?: date('Y-m-01'); // Defaults to first day of current month
        $data['selected_max_date'] = $end_date_filter ?: date('Y-m-d');     // Defaults to current day

        // Fetch all staff for the staff filter dropdown
        $data['staff'] = $this->Staff_model->select_staff();

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
        // Get the current month and year for this salary entry
        $current_month = date('m'); // e.g., '07' for July
        $current_year = date('Y');   // e.g., '2025'

        // Correctly map POST variables based on the 'name' attributes in your HTML
        $id = $this->input->post('staff_id'); // Assuming this is an array of staff IDs
        $basic = $this->input->post('basic_salary'); // Assuming this is an array of basic salaries
        $allowance = $this->input->post('add_allowance'); // Assuming this is an array of allowances
        $working_days = $this->input->post('working_days_month'); // Assuming this is an array of working days
        $worked_days = $this->input->post('employee_login_days'); // Assuming this is an array of worked days
        $no_of_leaves = $this->input->post('no_of_leaves'); // Assuming this is an array of leaves

        $salary_per_day = $this->input->post('salary_per_day');

        $total = $this->input->post('salary_to_be_paid'); // Assuming this is an array of totals
        $added = $this->session->userdata('userid'); // Correctly getting added_by from session

        $affected_rows_count = 0; // Initialize a counter for affected rows

        // Add a check to ensure $id is an array and not empty before trying to loop
        if (is_array($id) && count($id) > 0) {
            for ($i = 0; $i < count($id); $i++) {
                // Use null coalescing operator (??) to safely get values from arrays,
                // defaulting to null or empty string/zero if an index is missing.
                $staff_id_val = $id[$i] ?? null;
                 
                $basic_salary_val = str_replace(',', '', $basic[$i] ?? '0');
                $basic_salary_val = intval($basic_salary_val); // Ensure it's an integer
                $allowance_val = $allowance[$i] ?? null;
                $working_days_val = $working_days[$i] ?? null;
                $worked_days_val = $worked_days[$i] ?? null;
                $no_of_leaves_val = $no_of_leaves[$i] ?? null;
                $salary_per_day_val = $salary_per_day[$i] ?? 0; // Default to 0 if not provided
                $total_val = $total[$i] ?? null;

                // Ensure 'total' is numeric and greater than 0 before inserting for this staff member
                if (is_numeric($total_val) && $total_val > 0) {
                    // You'll also need to retrieve or calculate other fields like gross_salary,
                    // pf_deduction, esi_deduction, etc., if they are not coming from POST.
                    // For now, I'm just including the fields you explicitly fetch or have as empty.

                    $data = array(
                        'staff_id'               => $staff_id_val,
                        'basic_salary'           => $basic_salary_val,
                        'allowance'              => $allowance_val,
                        // If you have fields like gross_salary, pf_deduction etc. from your form,
                        // or calculate them here, add them:
                        // 'gross_salary'         => $this->input->post('gross_salary')[$i] ?? 0.00,
                        // 'pf_deduction'         => $this->input->post('pf_deduction')[$i] ?? 0.00,
                        // ... other deduction fields ...
                        // 'net_payable_salary'   => $this->input->post('net_payable_salary')[$i] ?? 0.00,

                        'working_days'           => $working_days_val,
                        'worked_days'            => $worked_days_val,
                        'payslip'                => '', // Set payslip field to empty, as it's now generated later
                        'no_of_leaves'           => $no_of_leaves_val,
                        'salary_per_day'         => $salary_per_day_val,
                        'total'                  => $total_val,
                        'added_by'               => $added,
                        'updated_on'             => date('Y-m-d'), // Use 'Y-m-d' for DATE column type

                        // >>>>>>>>>>>>>> ADD THESE TWO CRITICAL LINES! <<<<<<<<<<<<<<<<
                        'month'                  => (int)$current_month, // Store as integer
                        'year'                   => (int)$current_year    // Store as integer
                    );

                   
                    $this->Salary_model->insert_salary($data);
                    $affected_rows_count += $this->db->affected_rows(); // Increment count if insert was successful
                }
            }

            if ($affected_rows_count > 0) { // Check if any rows were actually inserted
                $this->session->set_flashdata('success', "Salary Added Successfully for " . $affected_rows_count . " staff members.");
            } else {
                $this->session->set_flashdata('error', "Sorry, Salary Adding Failed or No valid records were inserted. Please check calculations and ensure 'Total' is greater than 0.");
            }
        } else {
            // Handle case where no staff data was submitted (e.g., department had no staff selected)
            $this->session->set_flashdata('error', "No staff data submitted for salary calculation. Please select a department with staff.");
        }

        redirect('Salary/manage'); // Assuming this redirects to a page showing managed salaries
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
        $dept_id = $this->input->post('dept', TRUE); // Sanitize input
        $current_month = date('m');
        $current_year = date('Y');

        // Fetch staff who do NOT have a salary entry for the current month/year
        $staff_details = $this->Salary_model->get_staff_without_current_month_salary($dept_id, $current_year, $current_month);


        //       echo '<pre>';
        // var_dump($staff_details);   
        // echo '</pre>';
        // die();

        if (!empty($staff_details)) {
            echo '<div class="box-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="salaryDataTable">
                            <thead>
                                <tr>
                                    <th>Staff Name</th>
                                    <th>Basic Salary</th>
                                    <th>Working Days (Month)</th>
                                    <th>Employee Login Days</th>
                                    <th>No. of Leaves</th>
                                    <th>Add Working Days</th>
                                    <th>Add Allowance</th>
                                    <th>Salary to be Paid</th>
                                </tr>
                            </thead>
                            <tbody>';

            $fixed_working_days_in_month = 25; // Set fixed working days to 25
            foreach ($staff_details as $staff) {
                // CORRECTED: Access basic_salary directly from the $staff array returned by the model
                $basic_salary = $staff['salary']; // Assuming 'basic_salary' is the column name in staff_tbl

                // For new entries, allowance and additional working days should start at 0
                $allowance = 0; // Initialize allowance to 0 for new entries
                $add_working_days_input = 0;
                $add_allowance_input = 0;

                // Fetch employee login days for current month
                $employee_login_days = $this->Salary_model->get_employee_login_days($staff['id'], $current_year, $current_month);

                // CORRECTED: Use $fixed_working_days_in_month instead of undefined $total_days_in_month
                $no_of_leaves = $fixed_working_days_in_month - $employee_login_days;
                if ($no_of_leaves < 0) $no_of_leaves = 0; // Ensure leaves aren't negative

                // Initial calculation for 'Salary to be Paid' (client-side JS will refine this)
                $salary_per_day = ($basic_salary > 0 && $fixed_working_days_in_month > 0) ? ($basic_salary / $fixed_working_days_in_month) : 0;
                $initial_salary_to_be_paid = ($salary_per_day * ($employee_login_days + $add_working_days_input)) + $add_allowance_input;


                echo '<tr>
                    <td>' . htmlspecialchars($staff["staff_name"]) . '</td>
                    <td>
                        <input type="hidden" name="staff_id[]" value="' . $staff["id"] . '">
                        <input type="text" name="basic_salary[]" class="form-control basic-salary" value="' . number_format($basic_salary, 2) . '" readonly>
                    </td>
                    <td>
                        <input type="text" name="working_days_month[]" class="form-control working-days-month" value="' . $fixed_working_days_in_month . '" readonly>
                    </td>
                    <td>
                        <input type="text" name="employee_login_days[]" class="form-control employee-login-days" value="' . $employee_login_days . '" readonly>
                    </td>
                    <td>
                        <input type="text" name="no_of_leaves[]" class="form-control no-of-leaves" value="' . $no_of_leaves . '" readonly>
                    </td>
                    <td>
                        <input type="number" name="add_working_days[]" class="form-control add-working-days" value="' . $add_working_days_input . '" min="0">
                    </td>
                    <td>
                        <input type="number" name="add_allowance[]" class="form-control add-allowance" value="' . $add_allowance_input . '" min="0">
                    </td>
                    <td>
                        <input type="text" name="salary_to_be_paid[]" class="form-control salary-to-be-paid" value="' . number_format($initial_salary_to_be_paid, 2) . '" readonly>
                    </td>
                </tr>';
            }

            echo '</tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit Salary</button>
            </div>';
        } else {
            echo '<div class="box-body"><p>No staff found for the selected department or all staff have a salary entry for this month.</p></div>';
        }
    }
}

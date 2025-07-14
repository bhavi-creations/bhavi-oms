<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// CORRECTED PATH FOR DOMPDF AUTOLOAD:
require_once APPPATH . 'third_party/dompdf/dompdf/autoload.inc.php';
use Dompdf\Dompdf; // Use the Dompdf namespace

class Payslip extends CI_Controller {

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

    /**
     * This method will generate and stream the payslip PDF.
     * You will call this with staff_id, month, and year.
     * Example URL: http://localhost/bhavi-oms/admin/payslip/generate_payslip_pdf/STAFF_ID/MONTH_NUMBER/YEAR
     * e.g., http://localhost/bhavi-oms/admin/payslip/generate_payslip_pdf/1/7/2025 (for staff_id 1, July 2025)
     */
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

    // You might also have an index method to list payslips, etc.
    // public function index() { ... }

}
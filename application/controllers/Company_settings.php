<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary models, libraries, and helpers
        $this->load->model('Company_settings_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload'); // CodeIgniter's upload library
        // Add authentication check here if your admin panel requires it
        // if (!$this->session->userdata('is_logged_in')) {
        //     redirect('auth/login');
        // }
    }

    public function index() {
        // Ensure the single row for assets exists in the DB
        $data['assets'] = $this->Company_settings_model->ensure_assets_row_exists();
        $data['title'] = 'Company Assets & Payslip Settings';

        // Load the view for managing company settings
        // The sidebar is included within admin/header.php, so no separate load is needed for it.
        $this->load->view('admin/header', $data);
        $this->load->view('admin/company_settings', $data);
        $this->load->view('admin/footer');
    }

    public function upload_asset() {
        $asset_type = $this->input->post('asset_type'); // 'logo', 'stamp', 'signature'
        $asset_id = $this->input->post('asset_id'); // ID of the company_assets_tbl row (should be 1)

        if (!$asset_type || !$asset_id) {
            $this->session->set_flashdata('error', 'Invalid asset type or ID.');
            redirect('Company_settings');
        }

        $config['upload_path']   = './assets/uploads/company_assets/'; // Your target directory
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 2048; // 2MB max size
        $config['encrypt_name']  = TRUE; // Encrypt file name for security and uniqueness

        $this->upload->initialize($config); // Initialize upload library with config

        if ( ! $this->upload->do_upload($asset_type)) { // Use asset_type as the file input name
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
        } else {
            $upload_data = $this->upload->data();
            $file_path = 'assets/uploads/company_assets/' . $upload_data['file_name'];

            $data_to_update = array($asset_type . '_path' => $file_path);

            // Get current assets to delete old file if it exists
            $current_assets = $this->Company_settings_model->get_company_assets();
            $old_file_path_db = $current_assets[$asset_type . '_path'] ?? null;

            if ($this->Company_settings_model->update_company_assets($asset_id, $data_to_update)) {
                // Delete old file from server if it exists and is different from new one
                if ($old_file_path_db && $old_file_path_db != $file_path && file_exists($old_file_path_db)) {
                    unlink($old_file_path_db);
                }
                $this->session->set_flashdata('success', ucfirst($asset_type) . ' uploaded successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update ' . ucfirst($asset_type) . ' path in database.');
                // If DB update fails, delete the newly uploaded file to prevent orphans
                unlink($file_path);
            }
        }
        redirect('Company_settings');
    }

    public function delete_asset($asset_type, $asset_id) {
        if (!$asset_type || !$asset_id) {
            $this->session->set_flashdata('error', 'Invalid asset type or ID for deletion.');
            redirect('Company_settings');
        }

        $data_to_update = array($asset_type . '_path' => NULL);

        // Get current assets to delete old file from server
        $current_assets = $this->Company_settings_model->get_company_assets();
        $old_file_path_db = $current_assets[$asset_type . '_path'] ?? null;

        if ($this->Company_settings_model->update_company_assets($asset_id, $data_to_update)) {
            if ($old_file_path_db && file_exists($old_file_path_db)) {
                unlink($old_file_path_db);
            }
            $this->session->set_flashdata('success', ucfirst($asset_type) . ' deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete ' . ucfirst($asset_type) . '.');
        }
        redirect('Company_settings');
    }
}
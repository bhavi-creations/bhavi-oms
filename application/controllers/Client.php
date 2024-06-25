<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{

    // function __construct()
    // {
    //     parent::__construct();
    //     if (!$this->session->userdata('logged_in')) {
    //         redirect(base_url() . 'login');
    //     }
    // }

    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/add-client');
        $this->load->view('admin/footer');
    }

    public function manage_client()
    {
        $data['content'] = $this->Clients_model->select_clients();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-client', $data);
        $this->load->view('admin/footer');
    }

    public function client_updates()
    {
        $data['clients'] = $this->Clients_model->select_clients();
        $this->load->view('admin/header');
        $this->load->view('admin/client-updates', $data);
        $this->load->view('admin/footer');
    }

    public function client_invoices()
    {
        $data['clients'] = $this->Clients_model->select_clients();
        $this->load->view('admin/header');
        $this->load->view('admin/clients-invoices', $data);
        $this->load->view('admin/footer');
    }

    public function updates_client()
    {
        $data['client_updates'] = $this->Clients_Updates_model->get_client_updates(5);
        $this->load->view('client/header');
        $this->load->view('client/client-updates', $data);
        $this->load->view('client/footer');
    }

    public function invoices_client()
    {
        $data['client_invoices'] = $this->Clients_Invoices_model->get_client_invoices(5);
        $this->load->view('client/header');
        $this->load->view('client/client-invoices', $data);
        $this->load->view('client/footer');
    }

    public function client_invoices_insert()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('client_id', 'Client', 'required');

        // Validate form input
        if ($this->form_validation->run() == false) {
            $this->client_invoices();
            return false;
        } else {
            if (!isset($_FILES['invoice']) || !is_uploaded_file($_FILES['invoice']['tmp_name'])) {
                $this->session->set_flashdata('error', 'Please upload an invoice');
                $this->client_invoices();
                return false;
            }
            // Get POST data
            $date = $this->input->post('date');
            $client_id = $this->input->post('client_id');

            $config2['upload_path'] = 'uploads/project-files/';
            $config2['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config2);
            $this->upload->initialize($config2);
            if (!$this->upload->do_upload('invoice')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
                redirect($_SERVER['HTTP_REFERER']);
                return;
            } else {
                $file_data = $this->upload->data();
                $invoice_path = $file_data['file_name'];
            }

            // Prepare data for insertion
            $data = array(
                'date' => $date,
                'client_id' => $client_id,
                'invoice' => $invoice_path
            );

            $insert_id = $this->Clients_Invoices_model->insert_clients_invoices_model($data);

            if ($insert_id) {
                $this->session->set_flashdata('success', "Date, Descriptions, and Invoice Added Successfully");
            } else {
                $this->session->set_flashdata('error', "Failed to Add Date, Descriptions, and Invoice.");
            }

            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function client_updates_insert()
    {
        $this->load->helper('form');
        // Form validation rules
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('client_id', 'Client', 'required');
        $this->form_validation->set_rules('description[]', 'Description', 'required'); // Assuming you have multiple descriptions

        // Validate form input
        if ($this->form_validation->run() == false) {
            $this->client_updates();
            return false;
        } else {
            // Get POST data
            $date = $this->input->post('date');
            $client_id = $this->input->post('client_id');
            $descriptions = $this->input->post('description');

            // Prepare data for insertion
            $data = array(
                'date' => $date,
                'client_id' => $client_id,
                'descriptions' => json_encode($descriptions)
            );

            $insert_id = $this->Clients_Updates_model->insert_clients_updates_model($data);

            if ($insert_id) {
                $this->session->set_flashdata('success', "Date and Descriptions Added Successfully");
            } else {
                $this->session->set_flashdata('error', "Failed to Add Date and Descriptions.");
            }

            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function insert()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('name', 'Clients Name', 'required');
        $this->form_validation->set_rules('email', 'Clients Email', 'required|valid_email');
        $this->form_validation->set_rules('mobile', 'Clients Mobile', 'required');
        $this->form_validation->set_rules('password', 'Clients password', 'required');

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $mobile = $this->input->post('mobile');
        $address = $this->input->post('address');
        $details = $this->input->post('details');
        $refered = $this->input->post('refered');
        $status = 1;

        $project_duration = $this->input->post('project_duration');
        $digital_services = $this->input->post('digital_services');
        $images = $this->input->post('images');
        $description = $this->input->post('description');
        $SEO = $this->input->post('SEO');
        $links = $this->input->post(addslashes('links'));
        $filteredLink = filter_var($links, FILTER_SANITIZE_URL);
        $payment_installments = $this->input->post('payment_installments');

        if ($this->form_validation->run() !== false) {
            $data = $this->Clients_model->insert_clients(array('client_name' => $name, 'client_email' => $email, 'client_mobile' => $mobile, 'client_address' => $address, 'client_details' => $details, 'refered_by' => $refered, 'status' => $status));

            $data2 = $this->Clients_model->insert_quote(array('client_id' => $data, 'project_duration' => $project_duration, 'digital_services' => $digital_services, 'images' => $images, 'description' => $description, 'SEO' => $SEO, 'links' => $filteredLink, 'payment_installments' => $payment_installments));

            if ($data == true && $data2 == true) {
                $login = $this->Home_model->insert_login(array('username' => $email, 'password' => md5($password), 'usertype' => 3));
                if ($data == true && $data2 == true && $login) {
                    $this->session->set_flashdata('success', "New Client Added Succesfully");
                } else {
                    $this->session->set_flashdata('error', "Sorry, New Client Adding Failed.");
                }
            } else {
                $this->session->set_flashdata('error', "Sorry, New Client Adding Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->index();
            return false;
        }
    }

    public function update()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('name', 'Clients Name', 'required');
        $this->form_validation->set_rules('email', 'Clients Email', 'required|valid_email');
        $this->form_validation->set_rules('mobile', 'Clients Mobile', 'required');

        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $address = $this->input->post('address');
        $details = $this->input->post('details');
        $refered = $this->input->post('refered');
        $updated = date('Y-m-d H:i:s');
        $status = 1;


        $project_duration = $this->input->post('project_duration');
        $digital_services = $this->input->post('digital_services');
        $images = $this->input->post('images');
        $description = $this->input->post('description');
        $SEO = $this->input->post('SEO');
        $links = $this->input->post(addslashes('links'));
        $filteredLink = filter_var($links, FILTER_SANITIZE_URL);
        $payment_installments = $this->input->post('payment_installments');


        if ($this->form_validation->run() !== false) {
            $data = $this->Clients_model->update_clients(array('client_name' => $name, 'client_email' => $email, 'client_mobile' => $mobile, 'client_address' => $address, 'client_details' => $details, 'refered_by' => $refered, 'status' => $status, 'updated_on' => $updated), $id);
            $data2 = $this->Clients_model->update_quote(array('project_duration' => $project_duration, 'digital_services' => $digital_services, 'images' => $images, 'description' => $description, 'SEO' => $SEO, 'links' => $filteredLink, 'payment_installments' => $payment_installments), $id);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', "Client Updated Succesfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, Client Update Failed.");
            }
            redirect(base_url() . "client/manage_client");
        } else {
            $this->edit($id);
            return false;
        }
    }


    function edit($id)
    {
        $data['content'] = $this->Clients_model->select_clients_byID($id);
        $data['quote'] = $this->Clients_model->select_quote_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-client', $data);
        $this->load->view('admin/footer');
    }

    function view_quote($id)
    {
        $data['content'] = $this->Clients_model->select_quote_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/view-quote', $data);
        $this->load->view('admin/footer');

    }

    function delete($id)
    {
        $data = $this->Clients_model->delete_clients($id);
        $data2 = $this->Clients_model->delete_quote($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Client Deleted Succesfully");
        } else {
            $this->session->set_flashdata('error', "Sorry, Client Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }



}

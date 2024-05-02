<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $data['projects'] = $this->Projects_model->select_projects();
        $data['tasks'] = $this->Project_Tasks_model->select_project_tasks();
        $data['staff'] = $this->Staff_model->select_staff();
        $this->load->view('staff/header');
        $this->load->view('staff/content', $data);
        $this->load->view('staff/footer');
    }

    public function insert()
    {
        $this->load->model('Content_model');

        $this->form_validation->set_rules('content_pro_id', 'Project', 'required');
        $this->form_validation->set_rules('content_staff', 'Staff', 'required');
        $this->form_validation->set_rules('content_details', 'Content', 'required');
        $this->form_validation->set_rules('content_type', 'Work', 'required');

        $project = $this->input->post('content_pro_id');
        $staff = $this->input->post('content_staff');
        $content_type = $this->input->post('content_type');
        $date = $this->input->post('content_date');
        $content = $this->input->post('content_details');
        $desc = $this->input->post('desc_content');

        if ($this->form_validation->run() !== false) {
            $data = [
                'project_id' => $project,
                'assign_staff_id' => $staff,
                'work_type' => $content_type,
                'date' => $date,
                'emp_id' => $this->session->userdata('userid'),
                'content' => $content,
                'desc_content' => $desc
            ];
            $data2 = $this->Content_model->insert_content($data);
            if ($data2 == true) {
                $this->session->set_flashdata('success', "Content Sent seuccessfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, Content Adding Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->index();
            return false;
        }
    }

    public function view()
    {
        $this->load->model('Content_model');
        $data['content2'] = $this->Content_model->get_data();
        $this->load->view('staff/header');
        $this->load->view('staff/content_view', $data);
        $this->load->view('staff/footer');
    }

    public function edit($id)
    {
        $this->load->model('Content_model');
        $data['projects'] = $this->Projects_model->select_projects();
        $data['tasks'] = $this->Project_Tasks_model->select_project_tasks();
        $data['staff'] = $this->Staff_model->select_staff();
        $data['content'] = $this->Content_model->get_data_id($id);
        $this->load->view('staff/header');
        $this->load->view('staff/content-edit', $data);
        $this->load->view('staff/footer');
    }

    public function update()
    {
        $this->load->model('Content_model');

        $this->form_validation->set_rules('content_pro_id', 'Project', 'required');
        $this->form_validation->set_rules('content_staff', 'Staff', 'required');
        $this->form_validation->set_rules('content_details', 'Content', 'required');
        $this->form_validation->set_rules('content_type', 'Work', 'required');

        $project = $this->input->post('content_pro_id');
        $staff = $this->input->post('content_staff');
        $content_type = $this->input->post('content_type');
        $date = $this->input->post('content_date');
        $content = $this->input->post('content_details');
        $desc = $this->input->post('desc_content');
        $content_id = $this->input->post('content_id');

        if ($this->form_validation->run() !== false) {
            $data = [
                'project_id' => $project,
                'assign_staff_id' => $staff,
                'work_type' => $content_type,
                'date' => $date,
                'emp_id' => $this->session->userdata('userid'),
                'content' => $content,
                'desc_content' => $desc,
                'content_id' => $content_id
            ];
            $affected_rows = $this->Content_model->update_content($data);
            if ($affected_rows > 0) {
                $this->session->set_flashdata('success', "Content updated successfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, Content update failed.");
            }
            redirect(base_url() . '/content_details');
        } else {
            $this->index();
            return false;
        }
    }

    public function delete($id)
    {
        $this->load->model('Content_model');
        $this->Content_model->delete_content($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Content Deleted Succesfully");
        } else {
            $this->session->set_flashdata('error', "Sorry,Content Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function view_staff_content()
    {
        $this->load->model('Content_model');
        $userid = $this->session->userdata('userid');
        // echo $userid;
        $data['content'] = $this->Content_model->get_content_by_staff_id($userid);

        // print_r($data['content']); 

        $this->load->view('staff/header');
        $this->load->view('staff/view_staff_content', $data);
        $this->load->view('staff/footer');
    }
}

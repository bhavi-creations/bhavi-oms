<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_Tasks extends CI_Controller
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
        $data['clients'] = $this->Clients_model->select_clients();
        $data['projects'] = $this->Projects_model->select_projects();
        $data['staff'] = $this->Staff_model->select_staff();
        $data['departments'] = $this->Department_model->select_departments();
        $this->load->view('admin/header');
        $this->load->view('admin/add-project-tasks', $data);
        $this->load->view('admin/footer');
    }

    public function manage()
    {
        $data['staff'] = $this->Staff_model->select_staff();
        $data['content'] = $this->Project_Tasks_model->select_project_tasks();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-project-tasks', $data);
        $this->load->view('admin/footer');
    }

    public function view()
    {
        $staff = $this->session->userdata('userid');
        $data['content'] = $this->Project_Tasks_model->select_project_tasks_by_staffID($staff);
        $this->load->view('staff/header');
        $this->load->view('staff/view-project-tasks', $data);
        $this->load->view('staff/footer');
    }

    public function insert()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('project_id', 'Project ID', 'required');
        $this->form_validation->set_rules('assigned_to', 'Assigned To', '');
        $this->form_validation->set_rules('task_name', 'Task Name', 'required');
        $this->form_validation->set_rules('task_details', 'Task Details', 'required');
        $this->form_validation->set_rules('task_status', 'Task Status', 'required');
        $this->form_validation->set_rules('due_date', 'Task Due Date', 'required');
        $this->form_validation->set_rules('completed_date', 'Task Completed Date', 'required');
        $this->form_validation->set_rules('assign_date[]', 'Assign Date', '');
        $this->form_validation->set_rules('client_name[]', 'Client Name', '');

        //Designer table form validations
        $this->form_validation->set_rules('work_type_designer[]', 'Type of Work', '');
        $this->form_validation->set_rules('desc_designer[]', 'Desc Designer', '');
        $this->form_validation->set_rules('ref_link_designer[]', 'Ref link designer', '');
        $this->form_validation->set_rules('content_designer[]', 'Content Designer', '');
        $this->form_validation->set_rules('ref_file_designer[]', 'File Designer', '');

        // // Social Media form validation
        $this->form_validation->set_rules('work_type_socialmedia[]', 'Type of social media work', '');
        $this->form_validation->set_rules('desc_socialmedia[]', 'Desc of social media', '');
        $this->form_validation->set_rules('fb_ads_socialmedia[]', 'about Fb ads', '');
        $this->form_validation->set_rules('g_ads_socailmedia[]', 'about G ads social media', '');

        // // Website table form validation
        // $this->form_validation->set_rules('website_type[]', 'Type of website', '');
        // $this->form_validation->set_rules('desc_website[]', 'Desc about website', '');
        // $this->form_validation->set_rules('delivery_date[]', 'website delivery date','');

        // // SEO table form validation
        // $this->form_validation->set_rules('p_kw_SEO[]', 'Present Keyword SEO', '');
        // $this->form_validation->set_rules('target_kw_SEO[]', 'Target keyword SEO', '');
        // $this->form_validation->set_rules('gmb_SEO[]', 'Google My Business SEO', '');   



        if ($this->form_validation->run() !== false) {
            $project_id = $this->input->post('project_id');
            $assigned_to = $this->input->post('assigned_to');
            $assigned_to = implode(',', $this->input->post('assigned_to'));
            $department = $this->input->post('department');
            $task_name = $this->input->post('task_name');
            $task_details = $this->input->post('task_details');
            $task_status = $this->input->post('task_status');
            $task_priority = $this->input->post('task_priority');
            $task_daily = $this->input->post('task_daily');
            $due_date = $this->input->post('due_date');
            $completed_date = $this->input->post('completed_date');

            $arr = array(
                'project_id' => $project_id,
                'assigned_to' => $assigned_to,
                'task_name' => addslashes($task_name),
                'task_details' => addslashes($task_details),
                'task_status' => $task_status,
                'task_priority' => $task_priority,
                'task_daily' => $task_daily,
                'due_date' => $due_date,
                'completed_date' => $completed_date
            );
            // $this->db->insert('project_task_tbl', $arr);

            //  $task_id = $this->db->insert_id();
             

            // Get data from the form for the 'designer' table
            $assign_dates = $this->input->post('assign_date');
            $client_names = $this->input->post('client_name');
            $work_type_designer = $this->input->post('work_type_designer');
            $desc_designer = $this->input->post('desc_designer');
            $ref_link_designer = $this->input->post('ref_link_designer');
            $content_designer = $this->input->post('content_designer');
            $ref_file_designer = $this->input->post('ref_file_designer');
            $work_type_socialmedia = $this->input->post('work_type_socialmedia');
            $desc_socialmedia = $this->input->post('desc_socialmedia');
            $fb_ads_socialmedia = $this->input->post('fb_ads_socialmedia');
            $g_ads_socialmedia = $this->input->post('g_ads_socialmedia');
            $website_type = $this->input->post('website_type');
            $desc_website = $this->input->post('desc_website');
            $delivery_date = $this->input->post('delivery_date');
            $p_kw_SEO = $this->input->post('p_kw_SEO');
            $target_kw_SEO = $this->input->post('target_kw_SEO');
            $gmb_SEO = $this->input->post('gmb_SEO');
            $assign_date_socialmedia = $this->input->post('assign_date_socialmedia');
            $assign_date_web = $this->input->post('assign_date_web');
            $assign_date_seo = $this->input->post('assign_date_seo');
            $data2 = array();

            $loop_data = [];
            if ($department['0'] == 13) {
                $loop_data = $assign_dates;
                for ($i = 0; $i < count($loop_data); $i++) {
                    $data2[] = array(
                        'assign_date' => $assign_dates[$i],
                        'client_name' => $client_names[$i],
                        'work_type_designer' => $work_type_designer[$i],
                        'desc_designer' => $desc_designer[$i],
                        'ref_link_designer' => $ref_link_designer[$i],
                        'content_designer' => $content_designer[$i],
                    );
                }
            } else if ($department['0'] == 12) {
                $loop_data = $assign_date_socialmedia;
                for ($i = 0; $i < count($loop_data); $i++) {
                    $data2[] = array(
                        'assign_date' => $assign_date_socialmedia[$i],
                        'client_name' => $client_names[$i],
                        'work_type_socialmedia' => $work_type_socialmedia[$i],
                        'desc_socialmedia' => $desc_socialmedia[$i],
                        'g_ads_socialmedia' => $g_ads_socialmedia[$i],
                        'fb_ads_socialmedia' => $fb_ads_socialmedia[$i],
                    );
                }
            } else if ($department['0'] == 10) {
                $loop_data = $assign_date_web;
            } else if ($department['0'] == 11) {
                $loop_data = $assign_date_seo;
            }

            // Iterate through each set of data
            // for ($i = 0; $i < count($loop_data); $i++) {
            //     $data2[] = array(
            //         'assign_date' => $assign_dates[$i],
            //         'client_name' => $client_names[$i],
            //         'work_type_designer' => $work_type_designer[$i],
            //         'desc_designer' => $desc_designer[$i],
            //         'ref_link_designer' => $ref_link_designer[$i],
            //         'content_designer' => $content_designer[$i],
                    // 'project_task_id' => $task_id,
                    // 'client_name' => isset($client_names[$i]) ? $client_names[$i] : null,
                    // 'assign_date' => isset($assign_dates[$i]) ? $assign_dates[$i] : null,
                    // 'works_designer' => isset($work_types[$i]) ? $work_types[$i] : null,
                    // 'Desc_designer' => isset($descriptions[$i]) ? $descriptions[$i] : null,
                    // 'ref_link_designer' => isset($ref_links[$i]) ? $ref_links[$i] : null,
                    // 'content_designer' => isset($contents[$i]) ? $contents[$i] : null,
                    // 'ref_file_designer' => isset($ref_file_designer[$i]) ? $ref_file_designer[$i] : null,
                    // 'work_type_socialmedia' => isset($work_type_socialmedia[$i]) ? $work_type_socialmedia[$i] : null,
                    // 'desc_socialmedia' => isset($desc_socialmedia[$i]) ? $desc_socialmedia[$i] : null,
                    // 'fb_ads_socialmedia' => isset($fb_ads_socialmedia[$i]) ? $fb_ads_socialmedia[$i] : null,
                    // 'g_ads_socailmedia' => isset($g_ads_socailmedia[$i]) ? $g_ads_socailmedia[$i] : null,
                    // 'website_type' => isset($website_type[$i]) ? $website_type[$i] : null,
                    // 'desc_website' => isset($desc_website[$i]) ? $desc_website[$i] : null,
                    // 'delivery_date' => isset($delivery_date[$i]) ? $delivery_date[$i] : null,
                    // 'p_kw_SEO' => isset($p_kw_SEO[$i]) ? $p_kw_SEO[$i] : null,
                    // 'target_kw_SEO' => isset($target_kw_SEO[$i]) ? $target_kw_SEO[$i] : null,
                    // 'gmb_SEO' => isset($gmb_SEO[$i]) ? $gmb_SEO[$i] : null,

                // );
                // $data3[] = array();
                // for ($i = 0; $i < count($assign_date_socialmedia); $i++) {
                //     $data3[] = array(
                //         'assign_date_socialmedia' => $assign_date_socialmedia[$i],
                //         'client_name' => $client_names[$i],
                //         'work_type_socialmedia' => $work_type_socialmedia[$i],
                //         'desc_socialmedia' => $desc_socialmedia[$i],
                //         'g_ads_socialmedia' => $g_ads_socialmedia[$i],
                //         'fb_ads_socialmedia' => $fb_ads_socialmedia[$i],
                //     );
                // }
            // }

            // $data3 = $this->Project_Tasks_model->insert_worksheets($data3);
            $data = $this->Project_Tasks_model->insert_project_tasks($arr);
            $data2 = $this->Project_Tasks_model->insert_worksheets($data2);

            if ($data == true AND $data2 == true) {
                $this->session->set_flashdata('success', "New Project Task Added Succesfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, New Project Task Adding Failed.");
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
        $this->form_validation->set_rules('project_id', 'Project ID', 'required');
        $this->form_validation->set_rules('assigned_to[]', 'Assigned To', 'required');
        $this->form_validation->set_rules('task_name', 'Task Name', 'required');
        $this->form_validation->set_rules('task_details', 'Task Details', 'required');
        $this->form_validation->set_rules('task_status', 'Task Status', 'required');
        $this->form_validation->set_rules('due_date', 'Task Due Date', 'required');
        // $this->form_validation->set_rules('completed_date', 'Task Completed Date', 'required');

        $id = $this->input->post('id');

        if ($this->form_validation->run() !== false) {

            $project_id = $this->input->post('project_id');
            // $assigned_to=$this->input->post('assigned_to');
            $assigned_to = implode(',', $this->input->post('assigned_to'));
            $task_name = $this->input->post('task_name');
            $task_details = $this->input->post('task_details');
            $task_status = $this->input->post('task_status');
            $task_priority = $this->input->post('task_priority');
            $task_daily = $this->input->post('task_daily');
            $due_date = $this->input->post('due_date');
            $completed_date = $this->input->post('completed_date');

            $arr = array(
                'project_id' => $project_id,
                'assigned_to' => $assigned_to,
                'task_name' => addslashes($task_name),
                'task_details' => addslashes($task_details),
                'task_status' => $task_status,
                'task_priority' => $task_priority,
                'task_daily' => $task_daily,
                'due_date' => $due_date,
                'completed_date' => $completed_date
            );
            $data = $this->Project_Tasks_model->update_project_tasks($arr, $id);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', "Project Task Updated Succesfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, Project Task Update Failed.");
            }
            redirect(base_url() . "manage-project-tasks");
        } else {
            $this->edit($id);
            return false;
        }
    }


    function edit($id)
    {
        $data['projects'] = $this->Projects_model->select_projects();
        $data['staff'] = $this->Staff_model->select_staff();
        $data['content'] = $this->Project_Tasks_model->select_project_tasks_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-project-tasks', $data);
        $this->load->view('admin/footer');
    }


    function delete($id)
    {
        $data = $this->Project_Tasks_model->delete_project_tasks($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Project Deleted Succesfully");
        } else {
            $this->session->set_flashdata('error', "Sorry, Project Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}

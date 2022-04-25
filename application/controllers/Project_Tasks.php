<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_Tasks extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }
    }

    public function index()
    {
        $data['projects']=$this->Projects_model->select_projects();
        $data['staff']=$this->Staff_model->select_staff();
        $this->load->view('admin/header');
        $this->load->view('admin/add-project-tasks',$data);
        $this->load->view('admin/footer');
    }

    public function manage()
    {
        $data['content']=$this->Project_Tasks_model->select_project_tasks();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-project-tasks',$data);
        $this->load->view('admin/footer');
    }

    public function view()
    {
        $staff=$this->session->userdata('userid');
        $data['content']=$this->Project_Tasks_model->select_project_tasks_by_staffID($staff);
        $this->load->view('staff/header');
        $this->load->view('staff/view-project-tasks',$data);
        $this->load->view('staff/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('project_id', 'Project ID', 'required');
        $this->form_validation->set_rules('assigned_to[]', 'Assigned To', 'required');
        $this->form_validation->set_rules('task_name', 'Task Name', 'required');
        $this->form_validation->set_rules('task_details', 'Task Details', 'required');
        $this->form_validation->set_rules('task_status', 'Task Status', 'required');
        $this->form_validation->set_rules('due_date', 'Task Due Date', 'required');
        // $this->form_validation->set_rules('completed_date', 'Task Completed Date', 'required');

        if($this->form_validation->run() !== false)
        {
            $project_id=$this->input->post('project_id');
            // $assigned_to=$this->input->post('assigned_to');
            $assigned_to=implode(',',$this->input->post('assigned_to'));
            $task_name=$this->input->post('task_name');
            $task_details=$this->input->post('task_details');
            $task_status=$this->input->post('task_status');
            $due_date=$this->input->post('due_date');
            $completed_date=$this->input->post('completed_date');
            
            $arr = array(
                'project_id'=>$project_id,
                'assigned_to'=>$assigned_to,
                'task_name'=>addslashes($task_name),
                'task_details'=>addslashes($task_details),
                'task_status'=>$task_status,
                'due_date'=>$due_date,
                'completed_date'=>$completed_date
            );

            $data=$this->Project_Tasks_model->insert_project_tasks($arr);
            
            if($data==true)
            {
                $this->session->set_flashdata('success', "New Project Task Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Project Task Adding Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        else{
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

        $id=$this->input->post('id');
        
        if($this->form_validation->run() !== false)
        {

            $project_id=$this->input->post('project_id');
            // $assigned_to=$this->input->post('assigned_to');
            $assigned_to=implode(',',$this->input->post('assigned_to'));
            $task_name=$this->input->post('task_name');
            $task_details=$this->input->post('task_details');
            $task_status=$this->input->post('task_status');
            $due_date=$this->input->post('due_date');
            $completed_date=$this->input->post('completed_date');

            $arr = array(
                'project_id'=>$project_id,
                'assigned_to'=>$assigned_to,
                'task_name'=>addslashes($task_name),
                'task_details'=>addslashes($task_details),
                'task_status'=>$task_status,
                'due_date'=>$due_date,
                'completed_date'=>$completed_date
            );
            $data=$this->Project_Tasks_model->update_project_tasks($arr,$id);
            
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', "Project Task Updated Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, Project Task Update Failed.");
            }
            redirect(base_url()."manage-project-tasks");
        }
        else{
            $this->edit($id);
            return false;

        } 
    }


    function edit($id)
    {
        $data['projects']=$this->Projects_model->select_projects();
        $data['staff']=$this->Staff_model->select_staff();
        $data['content']=$this->Project_Tasks_model->select_project_tasks_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-project-tasks',$data);
        $this->load->view('admin/footer');
    }


    function delete($id)
    {
        $data=$this->Project_Tasks_model->delete_project_tasks($id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Project Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Project Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller {

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
        $this->load->view('admin/header');
        $this->load->view('admin/add-appointments');
        $this->load->view('admin/footer');
    }

    public function manage()
    {
        $data['content']=$this->Appointments_model->select_appointments();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-appointments',$data);
        $this->load->view('admin/footer');
    }

    public function view()
    {
        $data['content']=$this->Appointments_model->select_appointments();
        $this->load->view('staff/header');
        $this->load->view('staff/view-staff-appointments',$data);
        $this->load->view('staff/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('client', 'Client Name', 'required');
        $this->form_validation->set_rules('status', 'Client Status', 'required');
        // $this->form_validation->set_rules('remarks', 'Remarks', 'required');
        // $this->form_validation->set_rules('website', 'Website', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('close_status', 'Closing Status', 'required');

        $client=$this->input->post('client');
        $status=$this->input->post('status');
        $remarks=$this->input->post('remarks');
        $website=$this->input->post('website');
        $date=$this->input->post('date');
        $close_status=$this->input->post('close_status');

        if($this->form_validation->run() !== false)
        {
            $data=$this->Appointments_model->insert_appointments(array('client'=>$client,'status'=>$status,'remarks'=>$remarks,'website'=>$website,'date'=>$date,'close_status'=>$close_status));
            
            if($data==true)
            {
                
                $this->session->set_flashdata('success', "New Appointment Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Appointment Adding Failed.");
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
        $this->form_validation->set_rules('client', 'Client Name', 'required');
        $this->form_validation->set_rules('status', 'Client Status', 'required');
        // $this->form_validation->set_rules('remarks', 'Remarks', 'required');
        // $this->form_validation->set_rules('website', 'Website', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('close_status', 'Closing Status', 'required');
        
        $id=$this->input->post('appointment_id');
        $client=$this->input->post('client');
        $status=$this->input->post('status');
        $remarks=$this->input->post('remarks');
        $website=$this->input->post('website');
        $date=$this->input->post('date');
        $close_status=$this->input->post('close_status');

        if($this->form_validation->run() !== false)
        {
            $data=$this->Appointments_model->update_appointments(array('client'=>$client,'status'=>$status,'remarks'=>$remarks,'website'=>$website,'date'=>$date,'close_status'=>$close_status),$id);
            
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', "Appointment Updated Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, Appointment Update Failed.");
            }
            redirect(base_url()."manage-appointments");
        }
        else{
            $this->index();
            return false;

        } 
    }


    function edit($id)
    {
        $data['content']=$this->Appointments_model->select_appointments_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-appointments',$data);
        $this->load->view('admin/footer');
    }


    function delete($id)
    {
        
        $data=$this->Appointments_model->delete_appointments($id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Appointment Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Appointment Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function staff_add()
    {
        $this->load->view('staff/header');
        $this->load->view('staff/add-staff-appointments');
        $this->load->view('staff/footer');
    }

    public function staff_insert()
    {
        $this->form_validation->set_rules('client', 'Client Name', 'required');
        $this->form_validation->set_rules('status', 'Client Status', 'required');
        // $this->form_validation->set_rules('remarks', 'Remarks', 'required');
        // $this->form_validation->set_rules('website', 'Website', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('close_status', 'Closing Status', 'required');

        $client=$this->input->post('client');
        $status=$this->input->post('status');
        $remarks=$this->input->post('remarks');
        $website=$this->input->post('website');
        $date=$this->input->post('date');
        $close_status=$this->input->post('close_status');

        if($this->form_validation->run() !== false)
        {
            $data=$this->Appointments_model->insert_appointments(array('client'=>$client,'status'=>$status,'remarks'=>$remarks,'website'=>$website,'date'=>$date,'close_status'=>$close_status));
            
            if($data==true)
            {
                
                $this->session->set_flashdata('success', "New Appointment Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Appointment Adding Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        else{
            $this->staff_add();
            return false;

        } 
    }

    public function staff_update()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('client', 'Client Name', 'required');
        $this->form_validation->set_rules('status', 'Client Status', 'required');
        // $this->form_validation->set_rules('remarks', 'Remarks', 'required');
        // $this->form_validation->set_rules('website', 'Website', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('close_status', 'Closing Status', 'required');
        
        $id=$this->input->post('appointment_id');
        $client=$this->input->post('client');
        $status=$this->input->post('status');
        $remarks=$this->input->post('remarks');
        $website=$this->input->post('website');
        $date=$this->input->post('date');
        $close_status=$this->input->post('close_status');

        if($this->form_validation->run() !== false)
        {
            $data=$this->Appointments_model->update_appointments(array('client'=>$client,'status'=>$status,'remarks'=>$remarks,'website'=>$website,'date'=>$date,'close_status'=>$close_status),$id);
            
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', "Appointment Updated Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, Appointment Update Failed.");
            }
            redirect(base_url()."view-staff-appointments");
        }
        else{
            $this->staff_add();
            return false;

        } 
    }


    function staff_edit($id)
    {
        $data['content']=$this->Appointments_model->select_appointments_byID($id);
        $this->load->view('staff/header');
        $this->load->view('staff/edit-staff-appointments',$data);
        $this->load->view('staff/footer');
    }


    function staff_delete($id)
    {
        
        $data=$this->Appointments_model->delete_appointments($id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Appointment Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Appointment Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }



}

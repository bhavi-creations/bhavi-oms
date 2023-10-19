<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

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
        $this->load->view('admin/add-client');
        $this->load->view('admin/footer');
    }

    public function manage_client()
    {
        $data['content']=$this->Clients_model->select_clients();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-client',$data);
        $this->load->view('admin/footer');
    }

    public function insert()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('name', 'Clients Name', 'required');
        $this->form_validation->set_rules('email', 'Clients Email', 'required|valid_email');
        $this->form_validation->set_rules('mobile', 'Clients Mobile', 'required');

        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $mobile=$this->input->post('mobile');
        $address=$this->input->post('address');
        $details=$this->input->post('details');
        $refered=$this->input->post('refered');
        $status=1;

        if($this->form_validation->run() !== false)
        {
            $data=$this->Clients_model->insert_clients(array('client_name'=>$name,'client_email'=>$email, 'client_mobile'=>$mobile, 'client_address'=>$address, 'client_details'=>$details,'refered_by'=>$refered,'status'=>$status));
            if($data==true)
            {
                $this->session->set_flashdata('success', "New Client Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Client Adding Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']);
        }else{
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

        $id=$this->input->post('id');
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $mobile=$this->input->post('mobile');
        $address=$this->input->post('address');
        $details=$this->input->post('details');
        $refered=$this->input->post('refered');
        $updated=date('Y-m-d H:i:s');
        $status=1;

        if($this->form_validation->run() !== false)
        {
            $data=$this->Clients_model->update_clients(array('client_name'=>$name,'client_email'=>$email, 'client_mobile'=>$mobile, 'client_address'=>$address, 'client_details'=>$details,'refered_by'=>$refered,'status'=>$status,'updated_on'=>$updated),$id);
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', "Client Updated Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, Client Update Failed.");
            }
            redirect(base_url()."client/manage_client");
        }else{
            $this->edit($id);
            return false;
        }
    }


    function edit($id)
    {
        $data['content']=$this->Clients_model->select_clients_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-client',$data);
        $this->load->view('admin/footer');
    }


    function delete($id)
    {
        $data=$this->Clients_model->delete_clients($id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Client Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Client Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }



}

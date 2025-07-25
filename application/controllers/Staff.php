<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
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
        $data['department'] = $this->Department_model->select_departments();
        $data['country'] = $this->Home_model->select_countries();
        $this->load->view('admin/header');
        $this->load->view('admin/add-staff', $data);
        $this->load->view('admin/footer');
    }

    public function manage()
    {
        $data['content'] = $this->Staff_model->select_staff();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-staff', $data);
        $this->load->view('admin/footer');
    }

    public function admin_profile()
    {
        $data = $this->session->get_userdata();
        $data['department'] = $this->Department_model->select_departments();
        $data['country'] = $this->Home_model->select_countries();
        $data['content'] = $this->Staff_model->select_staff_byID($data['userid']);
        $this->load->view('admin/header');
        $this->load->view('admin/admin-profile', $data);
        $this->load->view('admin/footer');
    }

    public function profile()
    {
        $data = $this->session->get_userdata();
        $data['department'] = $this->Department_model->select_departments();
        $data['country'] = $this->Home_model->select_countries();
        $data['content'] = $this->Staff_model->select_staff_byID($data['userid']);
        $this->load->view('staff/header');
        $this->load->view('staff/profile', $data);
        $this->load->view('staff/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('txtname', 'Full Name', 'required');
        $this->form_validation->set_rules('slcgender', 'Gender', 'required');
        $this->form_validation->set_rules('slcdepartment', 'Department', 'required');
        $this->form_validation->set_rules('txtemail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('txtmobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('txtdob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('txtdoj', 'Date of Joining', 'required');
        $this->form_validation->set_rules('employee_id', 'Employee Id', 'required');
        $this->form_validation->set_rules('txtsalary', 'Basic Salary', 'required');

        // $this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
        $this->form_validation->set_rules('txtcity', 'City', 'required');
        $this->form_validation->set_rules('txtstate', 'State', 'required');
        $this->form_validation->set_rules('slccountry', 'Country', 'required');


        $name = $this->input->post('txtname');
        $gender = $this->input->post('slcgender');
        $department = $this->input->post('slcdepartment');
        $email = $this->input->post('txtemail');
        $mobile = $this->input->post('txtmobile');
        $dob = $this->input->post('txtdob');
        $doj = $this->input->post('txtdoj');
        $employee_id = $this->input->post('employee_id');
        $blood_group = $this->input->post('blood_group');
        $city = $this->input->post('txtcity');
        $state = $this->input->post('txtstate');
        $country = $this->input->post('slccountry');
        $address = $this->input->post('txtaddress');
        $salary = $this->input->post('txtsalary');
        $added = $this->session->userdata('userid');
        $files = isset($_FILES["files"]) ? $_FILES["files"] : null;

        $branch = $this->input->post('branch');
        $description = $this->input->post('description');
        $bond = isset($_FILES["bond"]) ? $_FILES["bond"] : null;
        $certificate = isset($_FILES["certificate"]) ? $_FILES["certificate"] : null;
        $hike = isset($_FILES["hike"]) ? $_FILES["hike"] : null;



        if ($this->form_validation->run() !== false) {
            $this->load->library('upload');
            $config['upload_path'] = 'uploads/staff-files/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|doc|docx|csv|html|mp3|mp4|svg|pdf|txt|xls|xlsx|xml';
            $file_names = [];
            foreach ($files['name'] as $key => $image) {
                $_FILES['files[]']['name'] = $files['name'][$key];
                $_FILES['files[]']['type'] = $files['type'][$key];
                $_FILES['files[]']['tmp_name'] = $files['tmp_name'][$key];
                $_FILES['files[]']['error'] = $files['error'][$key];
                $_FILES['files[]']['size'] = $files['size'][$key];

                $fileName = time() . "_" . $image;

                $files[] = $fileName;

                $config['file_name'] = $fileName;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('files[]')) {
                    $file_data = $this->upload->data();
                    $file_names[] = $file_data['file_name'];
                }
            }
            $file_names = implode(',', $file_names);

            $config = [];

            // $this->load->library('image_lib');
            $config2['upload_path'] = 'uploads/profile-pic/';
            $config2['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config2);
            $this->upload->initialize($config2);
            if (!$this->upload->do_upload('filephoto')) {
                $image = 'default-pic.jpg';
            } else {
                $image_data = $this->upload->data();
                $image = $image_data['file_name'];
            }
            $additional_files = [];
            $additional_uploads = ['bond' => $bond, 'certificate' => $certificate, 'hike' => $hike];
            foreach ($additional_uploads as $key => $file) {
                if ($file) {
                    $config['file_name'] = time() . "_" . $file['name'];
                    $this->upload->initialize($config2);
                    if ($this->upload->do_upload($key)) {
                        $file_data = $this->upload->data();
                        $additional_files[$key] = $file_data['file_name'];
                    } else {
                        $additional_files[$key] = null;
                    }
                }
            }
            $login = $this->Home_model->insert_login(array('username' => $email, 'password' => md5($mobile), 'usertype' => 2));
            if ($login > 0) {
                $data = $this->Staff_model->insert_staff(array('id' => $login, 'staff_name' => $name, 'gender' => $gender, 'salary' => $salary,  'email' => $email, 'mobile' => $mobile, 'dob' => $dob, 'doj' => $doj, 'employee_id' => $employee_id, 'blood_group' => $blood_group, 'address' => $address, 'city' => $city, 'state' => $state, 'country' => $country, 'department_id' => $department, 'pic' => $image, 'files' => $file_names, 'added_by' => $added, 'branch' => $branch, 'certificate' => $additional_files['certificate'], 'hike' => $additional_files['hike'], 'bond' => $additional_files['bond'], 'description' => $description));
            }
            echo $data;
            if ($data == true) {

                $this->session->set_flashdata('success', "New Staff Added Succesfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, New Staff Adding Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->index();
            return false;
        }
    }

    public function updatestatus()
    {
        $this->load->helper('form');
        $status = $this->input->post('staff-status');
        $id = $this->input->post('status_id');
        // print_r($id);
        $data = [
            'status' => $status,
        ];
        $this->Staff_model->update_status($id, $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Status Updated Succesfully");
        } else {
            $this->session->set_flashdata('error', "Sorry, Status Update Failed.");
        }
        redirect(base_url() . "edit-staff/{$id}");
    }

    public function update()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('txtname', 'Full Name', 'required');
        $this->form_validation->set_rules('txtsalary', 'Salary', 'required');
        $this->form_validation->set_rules('slcgender', 'Gender', 'required');
        $this->form_validation->set_rules('slcdepartment', 'Department', 'required');
        $this->form_validation->set_rules('txtemail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('txtmobile', 'Mobile Number', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('txtdob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('txtdoj', 'Date of Joining', 'required');
        $this->form_validation->set_rules('employee_id', 'Employee Id', 'required');
        $this->form_validation->set_rules('txtcity', 'City', 'required');
        $this->form_validation->set_rules('txtstate', 'State', 'required');
        $this->form_validation->set_rules('slccountry', 'Country', 'required');

        $id = $this->input->post('txtid');
        $name = $this->input->post('txtname');
        $salary = $this->input->post('txtsalary');
        $gender = $this->input->post('slcgender');
        $department = $this->input->post('slcdepartment');
        $email = $this->input->post('txtemail');
        $mobile = $this->input->post('txtmobile');
        $dob = $this->input->post('txtdob');
        $doj = $this->input->post('txtdoj');
        $employee_id = $this->input->post('employee_id');
        $blood_group = $this->input->post('blood_group');
        $city = $this->input->post('txtcity');
        $state = $this->input->post('txtstate');
        $country = $this->input->post('slccountry');
        $address = $this->input->post('txtaddress');
        $prev_files = $this->input->post('prev_files');
        $files = $_FILES["files"];

        if ($this->form_validation->run() !== false) {
            $this->load->library('upload');
            $file_names = []; // Initialize for new staff-files upload

            // Handle multiple files upload (new files only)
            if (!empty($files['name'][0])) { // Check if new files were selected
                $config['upload_path'] = 'uploads/staff-files/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|doc|docx|csv|html|mp3|mp4|svg|pdf|txt|xls|xlsx|xml';
                $config['overwrite'] = FALSE; // Ensure existing files are not overwritten if names collide

                foreach ($files['name'] as $key => $image_name) {
                    // Temporarily set $_FILES for single file upload
                    $_FILES['files_single']['name'] = $files['name'][$key];
                    $_FILES['files_single']['type'] = $files['type'][$key];
                    $_FILES['files_single']['tmp_name'] = $files['tmp_name'][$key];
                    $_FILES['files_single']['error'] = $files['error'][$key];
                    $_FILES['files_single']['size'] = $files['size'][$key];

                    $fileName = time() . "_" . $image_name; // Ensure unique name
                    $config['file_name'] = $fileName;
                    $this->upload->initialize($config); // Re-initialize for each file

                    if ($this->upload->do_upload('files_single')) {
                        $file_data = $this->upload->data();
                        $file_names[] = $file_data['file_name'];
                    } else {
                        // Log file upload errors but continue. You might want stricter handling.
                        log_message('error', 'Staff file upload error: ' . $this->upload->display_errors());
                    }
                }
            }

            // Combine newly uploaded files with previously existing ones
            $existing_files_array = array_filter(explode(',', $prev_files)); // Filter out empty strings
            $all_files_array = array_merge($existing_files_array, $file_names);
            $final_files_string = implode(',', array_filter($all_files_array)); // Filter again after merge

            $pic_filename = null; // Initialize profile picture filename
            // Handle profile photo upload
            if (!empty($_FILES['filephoto']['name'])) { // Check if a new profile photo was selected
                $config2['upload_path'] = 'uploads/profile-pic/';
                $config2['allowed_types'] = 'gif|jpg|png|jpeg';
                $config2['file_name'] = time() . "_" . $_FILES['filephoto']['name']; // Ensure unique name
                $config2['overwrite'] = TRUE; // Overwrite if same name, or you can manage old files

                $this->upload->initialize($config2); // Initialize for profile photo

                if ($this->upload->do_upload('filephoto')) {
                    $image_data = $this->upload->data();
                    $pic_filename = $image_data['file_name'];
                } else {
                    // Profile photo upload failed, critical error, redirect back
                    $this->session->set_flashdata('error', 'Profile photo upload failed: ' . $this->upload->display_errors());
                    redirect(base_url() . "edit-staff/" . $id);
                    return; // Stop execution to prevent partial update
                }
            }

            $update_data = array(
                'staff_name'    => $name,
                'salary'        => $salary, // This updates staff_tbl.salary
                'gender'        => $gender,
                'email'         => $email,
                'mobile'        => $mobile,
                'dob'           => $dob,
                'doj'           => $doj,
                'employee_id'   => $employee_id,
                'blood_group'   => $blood_group,
                'address'       => $address,
                'city'          => $city,
                'state'         => $state,
                'country'       => $country,
                'department_id' => $department,
                'files'         => $final_files_string
            );

            if ($pic_filename) {
                $update_data['pic'] = $pic_filename; // Add 'pic' to data only if a new one was uploaded
            }

            // Perform the main staff data update and get affected rows
            $staff_affected_rows = $this->Staff_model->update_staff($update_data, $id);
            $staff_update_success = ($staff_affected_rows > 0);

            // >>>>>>>>>>>>>> REMOVED THE SALARY_TBL INTERACTION HERE <<<<<<<<<<<<<<<<
            // The salary_tbl should only be affected when a monthly salary is processed
            // on the "Add Salary" page, not when editing staff profile.

            // Determine overall success for flashdata message
            if ($staff_update_success || ($pic_filename !== null && $staff_affected_rows === 0)) {
                $this->session->set_flashdata('success', "Staff information updated successfully.");
            } else {
                // This 'error' covers cases where no data changed, or a silent DB error occurred in update_staff
                $this->session->set_flashdata('error', "No changes were detected or the update failed. Please check the data you submitted.");
            }

            redirect(base_url() . "manage-staff");
        } else {
            // Form validation failed.
            // Capture all validation errors and pass them via flashdata.
            $this->session->set_flashdata('error', validation_errors());
            $this->edit($id); // This reloads the edit page with the errors
        }
    }


    public function updateAdminProfile()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('txtname', 'Full Name', 'required');
        $this->form_validation->set_rules('slcgender', 'Gender', 'required');
        // $this->form_validation->set_rules('slcdepartment', 'Department', 'required');
        $this->form_validation->set_rules('txtemail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('txtmobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('txtdob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('txtdoj', 'Date of Joining', 'required');
        $this->form_validation->set_rules('employee_id', 'Employee Id', 'required');
        // $this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
        $this->form_validation->set_rules('txtcity', 'City', 'required');
        $this->form_validation->set_rules('txtstate', 'State', 'required');
        $this->form_validation->set_rules('slccountry', 'Country', 'required');

        $id = $this->input->post('txtid');
        $name = $this->input->post('txtname');
        $gender = $this->input->post('slcgender');
        // $department=$this->input->post('slcdepartment');
        $email = $this->input->post('txtemail');
        $mobile = $this->input->post('txtmobile');
        $dob = $this->input->post('txtdob');
        $doj = $this->input->post('txtdoj');
        $employee_id = $this->input->post('employee_id');
        $blood_group = $this->input->post('blood_group');
        $city = $this->input->post('txtcity');
        $state = $this->input->post('txtstate');
        $country = $this->input->post('slccountry');
        $address = $this->input->post('txtaddress');

        if ($this->form_validation->run() !== false) {
            $this->load->library('image_lib');
            $config['upload_path'] = 'uploads/profile-pic/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('filephoto')) {
                $data = $this->Staff_model->update_staff(array('staff_name' => $name, 'gender' => $gender, 'email' => $email, 'mobile' => $mobile, 'dob' => $dob, 'doj' => $doj, 'employee_id' => $employee_id, 'blood_group' => $blood_group, 'address' => $address, 'city' => $city, 'state' => $state, 'country' => $country), $id);
            } else {
                $image_data = $this->upload->data();

                $configer = array(
                    'image_library' => 'gd2',
                    'source_image' => $image_data['full_path'],
                    'maintain_ratio' => TRUE,
                    'width' => 150,
                    'height' => 150,
                    'quality' => 50
                );
                $this->image_lib->clear();
                $this->image_lib->initialize($configer);
                $this->image_lib->resize();

                $data = $this->Staff_model->update_staff(array('staff_name' => $name, 'gender' => $gender, 'email' => $email, 'mobile' => $mobile, 'dob' => $dob, 'doj' => $doj, 'employee_id' => $employee_id, 'blood_group' => $blood_group, 'address' => $address, 'city' => $city, 'state' => $state, 'country' => $country, 'department_id' => $department, 'pic' => $image_data['file_name'], 'added_by' => $added), $id);
            }

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', "Profile Updated Succesfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, Profile Update Failed.");
            }
            redirect(base_url() . "admin-profile");
        } else {
            $this->admin_profile();
            return false;
        }
    }

    public function updateAdminPassword()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        $id = $this->input->post('staffid');
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        if ($this->form_validation->run() !== false) {
            $check = $this->Staff_model->check_current_password(md5($current_password), $id);
            if ($check) {
                $data = $this->Staff_model->update_password(array('password' => md5($confirm_password)), $id);

                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', "Password Updated Succesfully");
                } else {
                    $this->session->set_flashdata('error', "Sorry, Password Update Failed.");
                }
            } else {
                $this->session->set_flashdata('error', "Invalid Current Password.");
            }
            redirect(base_url() . "admin-profile");
        } else {
            $this->admin_profile();
            return false;
        }
    }

    public function updateProfile()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('txtname', 'Full Name', 'required');
        $this->form_validation->set_rules('slcgender', 'Gender', 'required');
        $this->form_validation->set_rules('slcdepartment', 'Department', 'required');
        $this->form_validation->set_rules('txtemail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('txtmobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('txtdob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('txtdoj', 'Date of Joining', 'required');
        $this->form_validation->set_rules('employee_id', 'Employee Id', 'required');
        // $this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
        $this->form_validation->set_rules('txtcity', 'City', 'required');
        $this->form_validation->set_rules('txtstate', 'State', 'required');
        $this->form_validation->set_rules('slccountry', 'Country', 'required');

        $id = $this->input->post('txtid');
        $name = $this->input->post('txtname');
        $gender = $this->input->post('slcgender');
        $department = $this->input->post('slcdepartment');
        $email = $this->input->post('txtemail');
        $mobile = $this->input->post('txtmobile');
        $dob = $this->input->post('txtdob');
        $doj = $this->input->post('txtdoj');
        $employee_id = $this->input->post('employee_id');
        $blood_group = $this->input->post('blood_group');
        $city = $this->input->post('txtcity');
        $state = $this->input->post('txtstate');
        $country = $this->input->post('slccountry');
        $address = $this->input->post('txtaddress');
        $files = $_FILES["files"];

        if ($this->form_validation->run() !== false) {
            $this->load->library('upload');
            $config['upload_path'] = 'uploads/staff-files/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|doc|docx|csv|html|mp3|mp4|svg|pdf|txt|xls|xlsx|xml';
            $file_names = [];
            foreach ($files['name'] as $key => $image) {
                $_FILES['files[]']['name'] = $files['name'][$key];
                $_FILES['files[]']['type'] = $files['type'][$key];
                $_FILES['files[]']['tmp_name'] = $files['tmp_name'][$key];
                $_FILES['files[]']['error'] = $files['error'][$key];
                $_FILES['files[]']['size'] = $files['size'][$key];

                $fileName = time() . "_" . $image;

                $files[] = $fileName;

                $config['file_name'] = $fileName;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('files[]')) {
                    $file_data = $this->upload->data();
                    $file_names[] = $file_data['file_name'];
                }
            }
            $file_names = implode(',', $file_names);

            $this->load->library('image_lib');
            $config['upload_path'] = 'uploads/profile-pic/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('filephoto')) {
                $data = $this->Staff_model->update_staff(array('staff_name' => $name, 'gender' => $gender, 'email' => $email, 'mobile' => $mobile, 'dob' => $dob, 'doj' => $doj, 'employee_id' => $employee_id, 'blood_group' => $blood_group, 'address' => $address, 'city' => $city, 'state' => $state, 'country' => $country, 'department_id' => $department), $id);
            } else {
                $image_data = $this->upload->data();

                $configer = array(
                    'image_library' => 'gd2',
                    'source_image' => $image_data['full_path'],
                    'maintain_ratio' => TRUE,
                    'width' => 150,
                    'height' => 150,
                    'quality' => 50
                );
                $this->image_lib->clear();
                $this->image_lib->initialize($configer);
                $this->image_lib->resize();

                $data = $this->Staff_model->update_staff(array('staff_name' => $name, 'gender' => $gender, 'email' => $email, 'mobile' => $mobile, 'dob' => $dob, 'doj' => $doj, 'employee_id' => $employee_id, 'blood_group' => $blood_group, 'address' => $address, 'city' => $city, 'state' => $state, 'country' => $country, 'department_id' => $department, 'pic' => $image_data['file_name'], 'added_by' => $added), $id);
            }

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', "Profile Updated Succesfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, Profile Update Failed.");
            }
            redirect(base_url() . "profile");
        } else {
            $this->profile();
            return false;
        }
    }

    public function updatePassword()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        $id = $this->input->post('staffid');
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        if ($this->form_validation->run() !== false) {
            $check = $this->Staff_model->check_current_password(md5($current_password), $id);
            if ($check) {
                $data = $this->Staff_model->update_password(array('password' => md5($confirm_password)), $id);

                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', "Password Updated Succesfully");
                } else {
                    $this->session->set_flashdata('error', "Sorry, Password Update Failed.");
                }
            } else {
                $this->session->set_flashdata('error', "Invalid Current Password.");
            }
            redirect(base_url() . "profile");
        } else {
            $this->profile();
            return false;
        }
    }

    function edit($id)
    {
        $data['department'] = $this->Department_model->select_departments();
        $data['country'] = $this->Home_model->select_countries();
        $data['content'] = $this->Staff_model->select_staff_byID($id);
        $data['status'] = $this->Staff_model->select_login_data($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-staff', $data);
        $this->load->view('admin/footer');
    }




    function delete($id)
    {
        $this->Home_model->delete_login_byID($id);
        $data = $this->Staff_model->delete_staff($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Staff Deleted Succesfully");
        } else {
            $this->session->set_flashdata('error', "Sorry, Staff Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    function deleteFile($id, $filename)
    {
        $result = $this->Staff_model->select_staff_byID($id);
        $prev_files = $result['0']['files'];

        $files = explode(',', $prev_files);
        print_r($files);
        foreach ($files as $key => $value) {
            if ($value == $filename) {
                unlink(FCPATH . 'uploads/staff-files/' . $filename);
                unset($files[$key]);
            }
        }
        $file_names = implode(',', $files);

        $data = $this->Staff_model->delete_staff_file(array('files' => $file_names), $id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Staff File Deleted Succesfully");
        } else {
            $this->session->set_flashdata('error', "Sorry, Staff File Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update_staff_permissions()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('staff_id', 'Staff', 'required');
        $this->form_validation->set_rules('module', 'Module', 'required');
        $this->form_validation->set_rules('permission', 'permission', 'required');

        $staff_id = $this->input->post('staff_id');
        $module = $this->input->post('module');
        $permission = $this->input->post('permission');

        if ($this->form_validation->run() !== false) {
            $data = $this->Staff_model->update_permission(array('staff_id' => $staff_id, 'module' => $module, 'permission' => $permission));

            if ($data) {
                $this->session->set_flashdata('success', "Staff Permissions Updated Succesfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, Staff Permissions Update Failed.");
            }
            redirect(base_url() . "manage-staff");
        } else {
            $this->edit($staff_id);
            return false;
        }
    }
}

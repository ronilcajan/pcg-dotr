<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('user_id') ) { 
            redirect('login'); 
        }
        if($this->session->userdata('role') == 'staff'){
            show_error('Access denied.');
        }
    }

    public function index()
	{ 
        $data['page_title'] = "User Management";  
        $data['user'] = $this->user_model->get_all(); 
        $data['user_role'] = $this->user_role_model->get_all(); 
        $data['station'] = $this->station_model->get_all();
        $data['sub_station'] = $this->substation_model->get_all();
        $this->base->load('admin', 'user/manage', $data);
	}
 
    public function save(){  

        $config['upload_path'] = 'assets/uploads/avatar';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->form_validation->set_rules('username', 'Username','required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('firstname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]'); 
        $this->form_validation->set_rules('user_role_id', 'User Role', 'required|trim');  

        if ($this->form_validation->run() == FALSE){

            $this->session->set_flashdata('errors', validation_errors());

        }else{
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'email' => $this->input->post('email'),
                'first_name' => $this->input->post('firstname'),
                'last_name' => $this->input->post('lastname'), 
                'role' => $this->input->post('user_role_id'), 
                'station' => $this->input->post('station'), 
                'sub_station' => $this->input->post('substation'), 
            );
            if ($this->upload->do_upload('profilepic')){
                $pic = $this->upload->data();
                $data['profile_picture'] = $pic['file_name'];
            }
           
            $insert = $this->user_model->save_user($data);
            
            if($insert){
                $this->session->set_flashdata('message', 'User has been created successfully!');
            }else{
                $this->session->set_flashdata('errors', 'User not successfully created!');
            }
        }
        redirect("user",'refresh');
	}

    public function update()
	{ 
  
        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('firstname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim'); 
        $this->form_validation->set_rules('user_role_id', 'User Role', 'required|trim');  
        if ($this->form_validation->run() == FALSE){

            $this->session->set_flashdata('errors', validation_errors());

        }else{
 
            $id = $this->input->post('user_id');

            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'first_name' => $this->input->post('firstname'),
                'last_name' => $this->input->post('lastname'), 
                'role' => $this->input->post('user_role_id'), 
                'station' => $this->input->post('station'), 
                'sub_station' => $this->input->post('substation'), 
            ); 
            $update = $this->user_model->update_user($data, $id);
            
            if($update){
                $this->session->set_flashdata('message', 'User has been updated successfully!');
            }else{
                $this->session->set_flashdata('errors', 'No changes has been made!');
            }
        }
        redirect("user",'refresh');
	}

    
    public function change_password()
	{ 
  
        $this->form_validation->set_rules('password', 'Password', 'required|trim'); 
        if ($this->form_validation->run() == FALSE){

            $this->session->set_flashdata('errors', validation_errors());

        }else{
 
            $id = $this->input->post('user_id'); 
            $data = array( 
                'password' =>  md5($this->input->post('password')), 
            ); 
            $update = $this->user_model->update_user($data, $id);
            
            if($update){
                $this->session->set_flashdata('message', 'Password updated successfully!');
            }else{
                $this->session->set_flashdata('errors', 'No changes has been made!');
            }
        }
        redirect("user",'refresh');
	}


    public function delete($id){

		$delete = $this->user_model->delete_user($id);

        if($delete){
            $this->session->set_flashdata('errors', 'User has been deleted!');
        }else{
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
		redirect('user', 'refresh');
	}
        

    

    
}
         
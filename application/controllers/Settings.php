<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Settings extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('user_id') ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Settings"; 
        $data['station'] = $this->settings_model->getStation();
        $data['sub_station'] = $this->settings_model->getSubstation();
        $data['total_sub_station'] = $this->substation_model->get_all();
        $data['total_station'] = $this->settings_model->get_all_station();
        if($this->session->userdata('role') == 'super-admin' || $this->session->userdata('role') == 'admin'){
            $data['district'] = $this->settings_model->getDistrict();
            $data['system'] = $this->settings_model->getSystem();
        }
        $this->base->load('admin', 'settings', $data);
	}
    public function updateDistrict(){
        
        $config['upload_path'] = 'assets/uploads';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $data = array(  
            'district_name' => $this->input->post('district_name'),
            'district_contact' => $this->input->post('district_contact'),  
            'district_email' => $this->input->post('district_email'),
            'district_address' => $this->input->post('district_address'),
        );
        
        if ($this->upload->do_upload('district_logo')){
            $logo = $this->upload->data();
            $data['district_logo'] = $logo['file_name'];
        } 

        $update = $this->settings_model->update_district($data);
        if($update){
            $this->session->set_flashdata('message', 'District info has been updated successfully!');
        }else{
            $this->session->set_flashdata('errors', 'No changes has been made!');
        } 
        redirect($_SERVER['HTTP_REFERER'],'refresh');
    }

    public function updateStation(){
        
        $config['upload_path'] = 'assets/uploads/station';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $data = array(  
            'station' => $this->input->post('station_name'),
            'station_contact' => $this->input->post('station_contact'),  
            'station_email' => $this->input->post('station_email'),
            'station_address' => $this->input->post('station_address'),
        );
        $id = $this->session->userdata('station_id');
        
        if ($this->upload->do_upload('station_logo')){
            $logo = $this->upload->data();
            $data['station_logo'] = $logo['file_name'];
        } 

        $update = $this->settings_model->update_station($data, $id);
        if($update){
            $this->session->set_flashdata('message', 'Station info has been updated successfully!');
        }else{
            $this->session->set_flashdata('errors', 'No changes has been made!');
        } 
        redirect($_SERVER['HTTP_REFERER'],'refresh');
    }

    public function updateSubstation(){
        
        $config['upload_path'] = 'assets/uploads/substation';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        
        $data = array(  
            'sub_station' => $this->input->post('substation_name'),
            'substation_contact' => $this->input->post('substation_contact'),  
            'substation_email' => $this->input->post('substation_email'),
            'substation_address' => $this->input->post('substation_address'),
        );
        $id = $this->session->userdata('sub_station_id');
        if ($this->upload->do_upload('substation_logo')){
            $logo = $this->upload->data();
            $data['substation_logo'] = $logo['file_name'];
        } 

        $update = $this->settings_model->update_substation($data, $id);
        if($update){
            $this->session->set_flashdata('message', 'Sub-station info has been updated successfully!');
        }else{
            $this->session->set_flashdata('errors', 'No changes has been made!');
        } 
        redirect($_SERVER['HTTP_REFERER'],'refresh');
    }
    public function updateSystem(){
        
        $config['upload_path'] = 'assets/uploads';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $data = array(  
            'system_name' => $this->input->post('system_name'),
            'system_name2' => $this->input->post('system_name2'),  
        );
        
        if ($this->upload->do_upload('system_logo')){
            $logo = $this->upload->data();
            $data['system_logo'] = $logo['file_name'];
        } 

        $update = $this->settings_model->update_system($data);
        if($update){
            $this->session->set_flashdata('message', 'System info has been updated successfully!');
        }else{
            $this->session->set_flashdata('errors', 'No changes has been made!');
        } 
        redirect($_SERVER['HTTP_REFERER'],'refresh');
    }
  
        
}
         
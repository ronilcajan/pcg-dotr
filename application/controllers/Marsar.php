<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Marsar extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('user_id') ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "MARITIME SEARCH AND RESCUE REPORT LISTS"; 
        $data['marsar_list'] = $this->marsar_model->getMarsar(); 
        $data['station'] = $this->station_model->get_all(); 
        $this->base->load('admin', 'marsar/manage_marsar', $data);
	}
 
    public function add()
	{  
          
        $data['page_title'] = "Add MARSAR"; 
        $data['marsar_list'] = $this->marsar_model->getMarsar(); 
        $data['station'] = $this->station_model->get_all();   
        $data['maritime_incident_type'] = $this->maritime_incident_type_model->get_all();   
        $data['incident_cause'] = $this->marsar_incident_cause_model->get_all(); 
        $data['material_report'] = $this->material_report_model->get_all();
        $data['asset_deployment'] = $this->asset_deployment_model->get_all();
        $data['information_acquired_thru'] = $this->information_acquired_thru_model->get_all(); 
        $data['time_assets_deployment'] = $this->time_assets_deployment_model->get_all(); 
        $data['vessel_size'] = $this->vessel_size_model->get_all();
        $data['vessel_age'] = $this->vessel_age_model->get_all();
        $data['vessel_type_involved'] = $this->vessel_type_involved_model->get_all();
        $data['fire_cause'] = $this->fire_cause_model->get_all();  
        $data['man_overboard_incident_cause'] = $this->man_overboard_incident_cause_model->get_all();   
        $this->base->load('admin', 'admin/add_marsar', $data); 
 
	} 

    public function insert()
	{  
        $config['upload_path'] = 'assets/uploads';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx|text|txt';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        
        $data = array(
            'station' => $this->input->post('station'),
            'sub_station' => $this->input->post('sub_station'),
            'maritime_incident_type' => $this->input->post('maritime_incident_type'),
            'date_created' => $this->input->post('date') . " " . $this->input->post('hour') . ":" .$this->input->post('minute') . ":00" . " " . $this->input->post('meridiem'),  //2022-12-30 11:55:46 
            'incident_cause' => implode(',',(array) $this->input->post('incident_cause')),  
            'fire_cause' => implode(',',(array) $this->input->post('fire_cause')), 
            'man_overboard_incident_cause' => implode(',',(array) $this->input->post('man_overboard_incident_cause')),  
            'location_incident_location' => $this->input->post('location_incident_location'),  
            'survivor_number' => $this->input->post('survivor_number'),  
            'casualty_number' => $this->input->post('casualty_number'),  
            'missing_number' => $this->input->post('missing_number'), 
            'material_report' => implode(',',(array) $this->input->post('material_report')), 
            'description_extend_vessel_damage' => $this->input->post('description_extend_vessel_damage'), 
            'asset_deployment' => implode(',',(array) $this->input->post('asset_deployment')), 
            'information_acquired_thru' => implode(',',(array) $this->input->post('information_acquired_thru')),  
            'time_assets_deployment' => $this->input->post('time_assets_deployment'),   
            'vessel_type_involved' => implode(',',(array) $this->input->post('vessel_type_involved')), 
            'vessel_age_1' => $this->input->post('vessel_age_1'), 
            'vessel_size_1' => $this->input->post('vessel_size_1'), 
            'registry_port_1' => $this->input->post('registry_port_1'), 
            'departure_port_1' => $this->input->post('departure_port_1'), 
            'call_next_port_1' => $this->input->post('call_next_port_1'), 
            'vessel_age_2' => $this->input->post('vessel_age_2'),  
            'vessel_size_2' => implode(',',(array) $this->input->post('vessel_size_2')), 
            'registry_port_2' => $this->input->post('registry_port_2'), 
            'departure_port_2' => $this->input->post('departure_port_2'),
            'call_next_port_2' => $this->input->post('call_next_port_2'),
        ); 

        if ($this->upload->do_upload('google_map_location')){
            $map = $this->upload->data();
            $data['google_map_location'] = $map['file_name'];
        }
        if ($this->upload->do_upload('radio_message_spot_report')){
            $report = $this->upload->data();
            $data['radio_message_spot_report'] = $report['file_name'];
        }
        if ($this->upload->do_upload('photograph')){
            $pic = $this->upload->data();
            $data['photograph'] = $pic['file_name'];
        }

        $insert = $this->marsar_model->insert($data);
        if($insert){
            $this->session->set_flashdata('message', 'Marsar has been created successfully!');
        }else{
            $this->session->set_flashdata('errors', 'Marsar not created!');
        } 
        redirect("add_marsar",'refresh'); 
	} 

    public function edit_marsar($id)
	{  
          
        $data['page_title'] = "Edit MARSAR"; 
        $data['marsar'] = $this->marsar_model->findMarsar($id); 
        $data['marsar_list'] = $this->marsar_model->getMarsar(); 
        $data['station'] = $this->station_model->get_all();   
        $data['maritime_incident_type'] = $this->maritime_incident_type_model->get_all();   
        $data['incident_cause'] = $this->marsar_incident_cause_model->get_all(); 
        $data['material_report'] = $this->material_report_model->get_all();
        $data['asset_deployment'] = $this->asset_deployment_model->get_all();
        $data['information_acquired_thru'] = $this->information_acquired_thru_model->get_all(); 
        $data['time_assets_deployment'] = $this->time_assets_deployment_model->get_all(); 
        $data['vessel_size'] = $this->vessel_size_model->get_all();
        $data['vessel_age'] = $this->vessel_age_model->get_all();
        $data['vessel_type_involved'] = $this->vessel_type_involved_model->get_all();
        $data['fire_cause'] = $this->fire_cause_model->get_all();  
        $data['man_overboard_incident_cause'] = $this->man_overboard_incident_cause_model->get_all();   
        $this->base->load('admin', 'marsar/edit_marsar', $data); 
	} 

    public function view_marsar($id)
	{  
        $data['page_title'] = "View MARSAR"; 
        $data['marsar'] = $this->marsar_model->findMarsar($id); 
        $data['station'] = $this->station_model->get_all();   
        $data['maritime_incident_type'] = $this->maritime_incident_type_model->get_all();   
        $data['incident_cause'] = $this->marsar_incident_cause_model->get_all(); 
        $data['material_report'] = $this->material_report_model->get_all();
        $data['asset_deployment'] = $this->asset_deployment_model->get_all();
        $data['information_acquired_thru'] = $this->information_acquired_thru_model->get_all(); 
        $data['time_assets_deployment'] = $this->time_assets_deployment_model->get_all(); 
        $data['vessel_size'] = $this->vessel_size_model->get_all();
        $data['vessel_age'] = $this->vessel_age_model->get_all();
        $data['vessel_type_involved'] = $this->vessel_type_involved_model->get_all();
        $data['fire_cause'] = $this->fire_cause_model->get_all();  
        $data['man_overboard_incident_cause'] = $this->man_overboard_incident_cause_model->get_all();   
        $this->base->load('admin', 'marsar/view_marsar', $data); 
	} 
    public function update($id)
	{  
        $config['upload_path'] = 'assets/uploads';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx|text|txt';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        
        $data = array(
            'station' => $this->input->post('station'),
            'sub_station' => $this->input->post('sub_station'),
            'maritime_incident_type' => $this->input->post('maritime_incident_type'),
            'date_created' => $this->input->post('date') . " " . $this->input->post('hour') . ":" .$this->input->post('minute') . ":00" . " " . $this->input->post('meridiem'),  //2022-12-30 11:55:46 
            'incident_cause' => implode(',',(array) $this->input->post('incident_cause')),  
            'fire_cause' => implode(',',(array) $this->input->post('fire_cause')), 
            'man_overboard_incident_cause' => implode(',',(array) $this->input->post('man_overboard_incident_cause')),  
            'location_incident_location' => $this->input->post('location_incident_location'),  
            'survivor_number' => $this->input->post('survivor_number'),  
            'casualty_number' => $this->input->post('casualty_number'),  
            'missing_number' => $this->input->post('missing_number'), 
            'material_report' => implode(',',(array) $this->input->post('material_report')), 
            'description_extend_vessel_damage' => $this->input->post('description_extend_vessel_damage'), 
            'asset_deployment' => implode(',',(array) $this->input->post('asset_deployment')), 
            'information_acquired_thru' => implode(',',(array) $this->input->post('information_acquired_thru')),  
            'time_assets_deployment' => $this->input->post('time_assets_deployment'),   
            'vessel_type_involved' => implode(',',(array) $this->input->post('vessel_type_involved')), 
            'vessel_age_1' => $this->input->post('vessel_age_1'), 
            'vessel_size_1' => $this->input->post('vessel_size_1'), 
            'registry_port_1' => $this->input->post('registry_port_1'), 
            'departure_port_1' => $this->input->post('departure_port_1'), 
            'call_next_port_1' => $this->input->post('call_next_port_1'), 
            'vessel_age_2' => $this->input->post('vessel_age_2'),  
            'vessel_size_2' => implode(',',(array) $this->input->post('vessel_size_2')), 
            'registry_port_2' => $this->input->post('registry_port_2'), 
            'departure_port_2' => $this->input->post('departure_port_2'),
            'call_next_port_2' => $this->input->post('call_next_port_2'),
        ); 

        if ($this->upload->do_upload('google_map_location')){
            $map = $this->upload->data();
            $data['google_map_location'] = $map['file_name'];
        }
        if ($this->upload->do_upload('radio_message_spot_report')){
            $report = $this->upload->data();
            $data['radio_message_spot_report'] = $report['file_name'];
        }
        if ($this->upload->do_upload('photograph')){
            $pic = $this->upload->data();
            $data['photograph'] = $pic['file_name'];
        }

        $insert = $this->marsar_model->update($data, $id);
        if($insert){
            $this->session->set_flashdata('message', 'Marsar has been updated successfully!');
        }else{
            $this->session->set_flashdata('errors', 'No changes has been made!');
        } 
        redirect($_SERVER['HTTP_REFERER'],'refresh'); 
	} 
    
    public function filter_marsar()
    {  
        
        // $report_type = $this->report_selection_model->get_all(); 
        $maritime_incident_type = $this->maritime_incident_type_model->get_all();

        
        $additional_query = ''; 
        if(!empty($_POST['station'])){  
                $additional_query .= ' and station = ' . $_POST['station']; 
        }
 
        if(!empty($_POST['sub_station'])){  
                $additional_query .= ' and sub_station = ' . $_POST['sub_station']; 
        } 
        if(!empty($_POST['year'])){  
                $additional_query .= ' and year(date_created)  = ' . $_POST['year']; 
        }  
        if(empty($_POST['month'])){

            $categories = [ "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December" ];
            $data = []; 
     
            foreach($categories as $category){
                $data['categories'][] = $category; 
    
            }
     
    
            foreach($maritime_incident_type as $incident){ 
                $i = 1;
                foreach($categories as $category){ 
                    $incident_id = $incident->id;
                    $q = $this->db->query('
                        select count(*) as entry FROM `marsar` 
                        where maritime_incident_type  = '.$incident_id.' and month(date_created) = '. $i . ' '. 
                         $additional_query 
                    );
                    if($q->num_rows() > 0){   
                        $entry_tot = $q->result()[0]->entry;
                        if($entry_tot > 0){ 
                            $entry[] = (int) $q->result()[0]->entry; 
                        }else{
                            $entry[] = 0;
                        }
                    }  else {
                        $entry[] = 0;
                    }  
                    $i++;
                } 
                $data['series'][] = array(
                    'name' =>  $incident->maritime_incident_type,
                    'data' =>  $entry,
                );
                
                $entry = [];
            }

        }

        if(!empty($_POST['month'])){
            $month = $_POST['month'];
            $year = date('Y'); 


            // Get the number of days in the month
            $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);

            // Divide the number of days by 7 to get the number of weeks
            $weeks_in_month = ceil($days_in_month / 7);
            // $data['categories'][] = $weeks_in_month; 

            foreach(range(1,$weeks_in_month) as $week){ 
                $ordinals = array("first", "second", "third"); 
                if (isset($ordinals[$week - 1])) {
                    $category =  $ordinals[$week - 1] . " week";
                } else {
                    $category = $week."th week";
                }
                $data['categories'][] = $category; 
                // $data['categories'][] = $week; 
                $data['category'][] = $week; 

            }

            
            foreach($maritime_incident_type as $incident){ 
                $i = 1;
                foreach($data['category'] as $category){ 
                    $incident_id = $incident->id; 
                    $q = $this->db->query('  
                        SELECT
                        CONCAT(FLOOR(((DAY(date_created) - 1) / 7) + 1)) `week`, 
                        count(*) AS `entry`
                        FROM marsar  
                        where CONCAT(FLOOR(((DAY(date_created) - 1) / 7) + 1)) = '. $category .' 
                        and maritime_incident_type = '.$incident_id.'
                        and month(date_created) = '. $_POST['month'] .' '. $additional_query .'
                        GROUP BY `week`  
                        ORDER BY `week` ASC'

                    );
                    if($q->num_rows() > 0){   
                        $week = $q->result()[0]->week;
                        if($category ==  $week){ 
                            $entry[] = $q->result()[0]->entry;
                        }else{
                            $entry[] = 0;
                        }
                    }  else {
                        $entry[] = 0;
                    }  
                    $i++;
                } 
                $data['series'][] = array(
                    'name' =>  $incident->maritime_incident_type,
                    'data' =>  $entry,
                );
                
                $entry = [];
            } 

        }

        echo json_encode($data);
    }  

    public function delete($id){

        $delete = $this->marsar_model->delete($id);

        if ($delete) {
            $this->session->set_flashdata('errors', 'Data has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect($_SERVER['HTTP_REFERER'],'refresh');
    }
    
}
          
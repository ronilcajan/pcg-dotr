<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Marep extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('user_id') ) { 
            redirect('login'); 
        }
    }

    public function index(){ 
        $data['marep'] = $this->marep_model->getMarep();  
        $data['station'] = $this->station_model->get_all(); 
        $data['page_title'] = "MAREP CHART"; 
        $this->base->load('admin', 'marep/manage_marep', $data);
	} 

    public function marep_list(){
        $data['marep_list'] = $this->marep_model->getMarep();  
        // $data['marep'] = $this->marep_model->get_all();  
        $data['station'] = $this->station_model->get_all(); 
        $data['page_title'] = "MAREP LISTS"; 
        $this->base->load('admin', 'marep/marep_list', $data);
    }
 
    public function add(){    
        $data['page_title'] = "ADD MAREP"; 
        $data['station'] = $this->station_model->get_all(); 
        $data['report'] = $this->report_selection_model->get_all();  
        $data['activity_conduct'] = $this->activity_conduct_model->get_all(); 
        $data['participating_agency'] =  $this->participating_agency_model->get_all();
        $data['garbage_type_collected'] = $this->garbage_type_collected_model->get_all();
        $data['vessel_type'] = $this->vessel_type_model->get_all();
        $data['inspection_type'] = $this->inspection_type_model->get_all();
        $data['facility_type'] = $this->facility_type_model->get_all();
        $data['training_type'] = $this->training_type_model->get_all();
        $data['incident_cause'] = $this->incident_cause_model->get_all();
        $data['spiller'] = $this->spiller_model->get_all();
        $data['tier_level'] = $this->tier_level_model->get_all();
        $data['oil_type'] = $this->oil_type_model->get_all();
        $data['responding_unit'] = $this->responding_unit_model->get_all();
        $data['affected_area'] = $this->affected_area_model->get_all();
        $data['affected_biodiversity'] = $this->affected_biodiversity_model->get_all(); 
        $data['marep'] = $this->marep_model->getMarep();  
        $this->base->load('admin', 'admin/add_marep', $data); 
 
	} 

    public function insert()
	{  
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx|text|txt';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $data = array(
            'station' => $this->input->post('station'),
            'sub_station' => $this->input->post('sub_station'),
            'report_type' => $this->input->post('report_selection'),
            'date_created' => $this->input->post('date') . " " .$this->input->post('hour') . ":" .$this->input->post('minute') . ":00",  //2022-12-30 11:55:46
            'location' => $this->input->post('location'),
            'activity_conduct' => $this->input->post('activity_conduct'),
            'participating_agency' => implode(',',(array) $this->input->post('participating_agency')),
            'participant_number' => $this->input->post('participant_number'),
            'area_coverage' => $this->input->post('area_coverage'),
            'garbage_type_collected' => implode(',',(array) $this->input->post('garbage_type_collected')),
            'garbage_collected_volume' => $this->input->post('garbage_collected_volume'),
            'seedlings_planted_number' => $this->input->post('seedlings_planted_number'),
            'planted_trees_kind' => $this->input->post('planted_trees_kind'),
            'incident_cause' => $this->input->post('incident_cause'),
            'vessel_type' => $this->input->post('vessel_type'),
            'vessel_name' => $this->input->post('vessel_name'),
            'inspection_type' => $this->input->post('inspection_type'),
            'marpol_violation' => $this->input->post('marpol_violation'),
            'facility_type' => $this->input->post('facility_type'),
            'facility_name' => $this->input->post('facility_name'),
            'oil_spill_date_incident' =>$this->input->post('oil_spill_date_incident') . " " .$this->input->post('oil_spill_hour_incident') . ":" .$this->input->post('oil_spill_minute_incident') . ":00",  //2022-12-30 11:55:46
            'oil_spill_location' => $this->input->post('oil_spill_location'),
            'spiller' => $this->input->post('spiller'),
            'oil_spill_vessel_name' => $this->input->post('oil_spill_vessel_name'),
            'oil_spill_companyl_name' => $this->input->post('oil_spill_companyl_name'),
            'tier_level' => $this->input->post('tier_level'),
            'oil_type' => implode(',',(array) $this->input->post('oil_type')), 
            'responding_unit' => implode(',',(array) $this->input->post('responding_unit')),
            'oil_retrieved_volume' => $this->input->post('oil_retrieved_volume'), 
            'affected_area' => implode(',',(array) $this->input->post('affected_area')),
            'affected_biodiversity' => implode(',',(array) $this->input->post('affected_biodiversity')),
            'training_type' => implode(',',(array) $this->input->post('training_type')),
            'training_center_name' => $this->input->post('training_center_name'),
        ); 

        if ($this->upload->do_upload('oil_spill_map_location')){
            $map = $this->upload->data();
            $data['oil_spill_map_location'] = $map['file_name'];
        }
        
        $insert = $this->marep_model->insert($data);
        if($insert){
            $this->session->set_flashdata('message', 'Marep has been created successfully!');
        }else{
            $this->session->set_flashdata('errors', 'Marep not successfully created!');
        } 
        redirect("add_marep",'refresh');

	}

    public function edit_marep($id = "")
    { 
        $data['page_title'] = "EDIT MAREP"; 
        $data['marep_list'] = $this->marep_model->getMarep();  
        $data['marep'] = $this->marep_model->get($id);  
        $data['stationg'] = $this->station_model->get_all(); 
        $data['report'] = $this->report_selection_model->get_all();  
        $data['activity_conduct'] = $this->activity_conduct_model->get_all(); 
        $data['participating_agency'] =  $this->participating_agency_model->get_all();
        $data['garbage_type_collected'] = $this->garbage_type_collected_model->get_all();
        $data['vessel_type'] = $this->vessel_type_model->get_all();
        $data['inspection_type'] = $this->inspection_type_model->get_all();
        $data['facility_type'] = $this->facility_type_model->get_all();
        $data['training_type'] = $this->training_type_model->get_all();
        $data['incident_cause'] = $this->incident_cause_model->get_all();
        $data['spiller'] = $this->spiller_model->get_all();
        $data['tier_level'] = $this->tier_level_model->get_all();
        $data['oil_type'] = $this->oil_type_model->get_all();
        $data['responding_unit'] = $this->responding_unit_model->get_all();
        $data['affected_area'] = $this->affected_area_model->get_all();
        $data['affected_biodiversity'] = $this->affected_biodiversity_model->get_all(); 
        $data['allMarep'] = $this->marep_model->getMarep();  
        $this->base->load('admin', 'marep/edit_marep', $data); 
    }

    public function update()
	{  
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx|text|txt';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $id =  $this->input->post('marep_id');
        $data = array(
            'station' => $this->input->post('station'),
            'sub_station' => $this->input->post('sub_station'),
            'report_type' => $this->input->post('report_selection'),
            'date_created' => $this->input->post('date') . " " .$this->input->post('hour') . ":" .$this->input->post('minute') . ":00",  //2022-12-30 11:55:46
            'location' => $this->input->post('location'),
            'activity_conduct' => $this->input->post('activity_conduct'),
            'participating_agency' => implode(',',(array) $this->input->post('participating_agency')),
            'participant_number' => $this->input->post('participant_number'),
            'area_coverage' => $this->input->post('area_coverage'),
            'garbage_type_collected' => implode(',',(array) $this->input->post('garbage_type_collected')),
            'garbage_collected_volume' => $this->input->post('garbage_collected_volume'),
            'seedlings_planted_number' => $this->input->post('seedlings_planted_number'),
            'planted_trees_kind' => $this->input->post('planted_trees_kind'),
            'incident_cause' => $this->input->post('incident_cause'),
            'vessel_type' => $this->input->post('vessel_type'),
            'vessel_name' => $this->input->post('vessel_name'),
            'inspection_type' => $this->input->post('inspection_type'),
            'marpol_violation' => $this->input->post('marpol_violation'),
            'facility_type' => $this->input->post('facility_type'),
            'facility_name' => $this->input->post('facility_name'),
            'oil_spill_date_incident' =>$this->input->post('oil_spill_date_incident') . " " .$this->input->post('oil_spill_hour_incident') . ":" .$this->input->post('oil_spill_minute_incident') . ":00",  //2022-12-30 11:55:46
            'oil_spill_location' => $this->input->post('oil_spill_location'),
            'spiller' => $this->input->post('spiller'),
            'oil_spill_vessel_name' => $this->input->post('oil_spill_vessel_name'),
            'oil_spill_companyl_name' => $this->input->post('oil_spill_companyl_name'),
            'tier_level' => $this->input->post('tier_level'),
            'oil_type' => $this->input->post('oil_type'), 
            'responding_unit' => implode(',',(array) $this->input->post('responding_unit')),
            'oil_retrieved_volume' => $this->input->post('oil_retrieved_volume'), 
            'affected_area' => implode(',',(array) $this->input->post('affected_area')),
            'affected_biodiversity' => implode(',',(array) $this->input->post('affected_biodiversity')),
            'training_type' => implode(',',(array) $this->input->post('training_type')),
            'training_center_name' => $this->input->post('training_center_name'),
        ); 

        if ($this->upload->do_upload('oil_spill_map_location')){
            $map = $this->upload->data();
            $data['oil_spill_map_location'] = $map['file_name'];
        }
        
        $update = $this->marep_model->update($data, $id);
        
        if($update){
            $this->session->set_flashdata('message', 'Marep has been updated successfully!');
        }else{
            $this->session->set_flashdata('errors', 'Marep not successfully updated!');

        } 
        redirect($_SERVER['HTTP_REFERER'],'refresh');

	}
  

    public function view_marep($id = "")
    { 
        $data['marep'] = $this->marep_model->get($id);  
        $data['page_title'] = "MARINE ENVIRONMENTAL PROTECTION REPORT LISTS";  
        $this->base->load('admin', 'marep/view_marep', $data);
    }
        
    public function filter(){  
        $report_type = $this->report_selection_model->get_all(); 
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
     
    
            foreach($report_type as $report){ 
                $i = 1;
                foreach($categories as $category){ 
                    $report_id = $report['report_selection_id'];
                    $q = $this->db->query('
                        select count(*) as entry FROM `marep` 
                        where report_type = '.$report_id.' and month(date_created) = '. $i . ' '. 
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
                    'name' =>  $report['report_selection'],
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

            
            foreach($report_type as $report){ 
                $i = 1;
                foreach($data['category'] as $category){ 
                    $report_id = $report['report_selection_id'];
                    $q = $this->db->query('  
                        SELECT
                        CONCAT(FLOOR(((DAY(date_created) - 1) / 7) + 1)) `week`, 
                        count(*) AS `entry`
                        FROM marep  
                        where CONCAT(FLOOR(((DAY(date_created) - 1) / 7) + 1)) = '. $category .' 
                        and report_type = '.$report_id.'
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
                    'name' =>  $report['report_selection'],
                    'data' =>  $entry,
                );
                
                $entry = [];
            } 

        }

        echo json_encode($data);
    }   

    public function delete($id){

        $delete = $this->marep_model->delete($id);

        if ($delete) {
            $this->session->set_flashdata('errors', 'Data has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect($_SERVER['HTTP_REFERER'],'refresh');
    }
}
         
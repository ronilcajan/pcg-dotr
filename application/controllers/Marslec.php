<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Marslec extends CI_Controller {
    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('user_id') ) { 
            redirect('login'); 
        }
    }
    public function index()
	{    
        $data['station'] = $this->station_model->get_all();   
        $data['marslec_list'] = $this->marslec_model->getMarslec(); 
        $data['page_title'] = "MARSLEC"; 
        $this->base->load('admin', 'marslec/manage_marslec', $data);
	}
    public function add()
	{          
        $data['page_title'] = "ADD MARSLEC"; 
        $data['station'] = $this->station_model->get_all();   
        $data['ra_10654'] = $this->ra_10654_model->get_all(); 
        $data['ra_9165'] = $this->ra_9165_model->get_all(); 
        $data['ra_10591'] = $this->ra_10591_model->get_all(); 
        $data['ra_9208'] = $this->ra_9208_model->get_all(); 
        $data['ra_9147'] = $this->ra_9147_model->get_all(); 
        $data['pd_no_705'] = $this->pd_no_705_model->get_all(); 
        $data['ra_1937'] = $this->ra_1937_model->get_all(); 
        $data['pd_no_532'] = $this->pd_no_532_model->get_all(); 
        $data['ra_10066'] = $this->ra_10066_model->get_all(); 
        $data['ra_6539'] = $this->ra_6539_model->get_all(); 
        $data['ra_10845'] = $this->ra_10845_model->get_all(); 
        $data['marpol_violation'] = $this->marpol_violation_model->get_all(); 
        $data['seaborne_patrol_activity_conduct'] = $this->seaborne_patrol_activity_conduct_model->get_all();   
        $data['panelling_conducted_facilities'] = $this->panelling_conducted_facilities_model->get_all();  
        $data['k9_deployed_type'] = $this->k9_deployed_type_model->get_all(); 
        $data['eod_deployment'] = $this->eod_deployment_model->get_all(); 
        $data['marslec'] = $this->marslec_model->getMarslec();   
        $this->base->load('admin', 'add_marslec', $data); 
	} 
    public function insert()
	{  
        
        $data = array(
            'station' => $this->input->post('station'),
            'sub_station' => $this->input->post('sub_station'),
            'date_created' => date('Y-m-d H:i:s'),
            'ra_10654' => implode(',',(array) $this->input->post('ra_10654')), 
            'ra_9165' => implode(',',(array) $this->input->post('ra_9165')),  
            'ra_10591' => implode(',',(array) $this->input->post('ra_10591')),  
            'ra_9208' => implode(',',(array) $this->input->post('ra_9208')),   
            'ra_9147' => implode(',',(array) $this->input->post('ra_9147')),    
            'pd_no_705' => implode(',',(array) $this->input->post('pd_no_705')),    
            'ra_1937' => implode(',',(array) $this->input->post('ra_1937')),     
            'pd_no_532' => implode(',',(array) $this->input->post('pd_no_532')),  
            'ra_10066' => implode(',',(array) $this->input->post('ra_10066')),  
            'ra_6539' => implode(',',(array) $this->input->post('ra_6539')),   
            'ra_10845' => implode(',',(array) $this->input->post('ra_10845')),  
            'marpol_violation' => implode(',',(array) $this->input->post('marpol_violation')), 
            'seaborne_patrol_date' => $this->input->post('seaborne_patrol_date') . " " .$this->input->post('seaborne_patrol_hour') . ":" .$this->input->post('seaborne_patrol_minute') . ":00",  //2022-12-30 11:55:46 
            'seaborne_patrol_location' => $this->input->post('seaborne_patrol_location'),
            'seaborne_patrol_activity_conduct' => implode(',',(array) $this->input->post('seaborne_patrol_activity_conduct')),   
            'seaborne_patrol_number_conduncted' => $this->input->post('seaborne_patrol_number_conduncted'),
            'seaborne_patrol_area_covered' => $this->input->post('seaborne_patrol_area_covered'),
            'seaborne_patrol_number_hour_conducted' => $this->input->post('seaborne_patrol_number_hour_conducted'),
            'shore_patrol_date_started' => $this->input->post('shore_patrol_date') . " " .$this->input->post('shore_patrol_hour_started') . ":" .$this->input->post('shore_patrol_minute_started') . ":00",  //2022-12-30 11:55:46  
            'shore_patrol_date_ended' => $this->input->post('shore_patrol_date') . " " .$this->input->post('shore_patrol_hour_ended') . ":" .$this->input->post('shore_patrol_minute_ended') . ":00",  //2022-12-30 11:55:46 
            'shore_patrol_number_conducted' => $this->input->post('shore_patrol_number_conducted'),
            'shore_patrol_coastline_covered_length' => $this->input->post('shore_patrol_coastline_covered_length'),
            'sea_marshall_date_started' => $this->input->post('sea_marshall_date') . " " .$this->input->post('sea_marshall_hour_started') . ":" .$this->input->post('sea_marshall_minute_started') . ":00",  //2022-12-30 11:55:46 
            'sea_marshall_date_ended' => $this->input->post('sea_marshall_date') . " " .$this->input->post('sea_marshall_hour_ended') . ":" .$this->input->post('sea_marshall_minute_ended') . ":00",  //2022-12-30 11:55:46 
            'panelling_conducted_date' => $this->input->post('panelling_conducted_date') . " " .$this->input->post('panelling_conducted_hour_started') . ":" .$this->input->post('panelling_conducted_minute_started') . ":00",  //2022-12-30 11:55:46 
            'panelling_conducted_facilities' => implode(',',(array) $this->input->post('panelling_conducted_facilities')),   
            'k9_deployed_type' => implode(',',(array) $this->input->post('k9_deployed_type')),  
            'eod_deployment' => implode(',',(array) $this->input->post('eod_deployment')),   
        ); 
        $insert = $this->marslec_model->insert($data);
        if($insert){
            $this->session->set_flashdata('message', 'Marslec has been created successfully!');
        }else{
            $this->session->set_flashdata('errors', 'Marslec not successfully created!');
        }  
        redirect("add_marslec",'refresh');
	} 
      
    public function edit_marslec($id){   
               
        $data['page_title'] = "EDIT MARSLEC"; 
        $data['station'] = $this->station_model->get_all();   
        $data['ra_10654'] = $this->ra_10654_model->get_all(); 
        $data['ra_9165'] = $this->ra_9165_model->get_all(); 
        $data['ra_10591'] = $this->ra_10591_model->get_all(); 
        $data['ra_9208'] = $this->ra_9208_model->get_all(); 
        $data['ra_9147'] = $this->ra_9147_model->get_all(); 
        $data['pd_no_705'] = $this->pd_no_705_model->get_all(); 
        $data['ra_1937'] = $this->ra_1937_model->get_all(); 
        $data['pd_no_532'] = $this->pd_no_532_model->get_all(); 
        $data['ra_10066'] = $this->ra_10066_model->get_all(); 
        $data['ra_6539'] = $this->ra_6539_model->get_all(); 
        $data['ra_10845'] = $this->ra_10845_model->get_all(); 
        $data['marpol_violation'] = $this->marpol_violation_model->get_all(); 
        $data['seaborne_patrol_activity_conduct'] = $this->seaborne_patrol_activity_conduct_model->get_all();   
        $data['panelling_conducted_facilities'] = $this->panelling_conducted_facilities_model->get_all();  
        $data['k9_deployed_type'] = $this->k9_deployed_type_model->get_all(); 
        $data['eod_deployment'] = $this->eod_deployment_model->get_all(); 
        $data['marsleclist'] = $this->marslec_model->get_all();   
        $data['marslec'] = $this->marslec_model->findMarslec($id);   
        $this->base->load('admin', 'marslec/edit_marslec', $data); 
	} 

    public function update_marslec($id)
	{  
        $data = array(
            'station' => $this->input->post('station'),
            'sub_station' => $this->input->post('sub_station'),
            'date_created' => date('Y-m-d H:i:s'),
            'ra_10654' => implode(',',(array) $this->input->post('ra_10654')), 
            'ra_9165' => implode(',',(array) $this->input->post('ra_9165')),  
            'ra_10591' => implode(',',(array) $this->input->post('ra_10591')),  
            'ra_9208' => implode(',',(array) $this->input->post('ra_9208')),   
            'ra_9147' => implode(',',(array) $this->input->post('ra_9147')),    
            'pd_no_705' => implode(',',(array) $this->input->post('pd_no_705')),    
            'ra_1937' => implode(',',(array) $this->input->post('ra_1937')),     
            'pd_no_532' => implode(',',(array) $this->input->post('pd_no_532')),  
            'ra_10066' => implode(',',(array) $this->input->post('ra_10066')),  
            'ra_6539' => implode(',',(array) $this->input->post('ra_6539')),   
            'ra_10845' => implode(',',(array) $this->input->post('ra_10845')),  
            'marpol_violation' => implode(',',(array) $this->input->post('marpol_violation')), 
            'seaborne_patrol_date' => $this->input->post('seaborne_patrol_date') . " " .$this->input->post('seaborne_patrol_hour') . ":" .$this->input->post('seaborne_patrol_minute') . ":00",  //2022-12-30 11:55:46 
            'seaborne_patrol_location' => $this->input->post('seaborne_patrol_location'),
            'seaborne_patrol_activity_conduct' => implode(',',(array) $this->input->post('seaborne_patrol_activity_conduct')),   
            'seaborne_patrol_number_conduncted' => $this->input->post('seaborne_patrol_number_conduncted'),
            'seaborne_patrol_area_covered' => $this->input->post('seaborne_patrol_area_covered'),
            'seaborne_patrol_number_hour_conducted' => $this->input->post('seaborne_patrol_number_hour_conducted'),
            'shore_patrol_date_started' => $this->input->post('shore_patrol_date') . " " .$this->input->post('shore_patrol_hour_started') . ":" .$this->input->post('shore_patrol_minute_started') . ":00",  //2022-12-30 11:55:46  
            'shore_patrol_date_ended' => $this->input->post('shore_patrol_date') . " " .$this->input->post('shore_patrol_hour_ended') . ":" .$this->input->post('shore_patrol_minute_ended') . ":00",  //2022-12-30 11:55:46 
            'shore_patrol_number_conducted' => $this->input->post('shore_patrol_number_conducted'),
            'shore_patrol_coastline_covered_length' => $this->input->post('shore_patrol_coastline_covered_length'),
            'sea_marshall_date_started' => $this->input->post('sea_marshall_date') . " " .$this->input->post('sea_marshall_hour_started') . ":" .$this->input->post('sea_marshall_minute_started') . ":00",  //2022-12-30 11:55:46 
            'sea_marshall_date_ended' => $this->input->post('sea_marshall_date') . " " .$this->input->post('sea_marshall_hour_ended') . ":" .$this->input->post('sea_marshall_minute_ended') . ":00",  //2022-12-30 11:55:46 
            'panelling_conducted_date' => $this->input->post('panelling_conducted_date') . " " .$this->input->post('panelling_conducted_hour_started') . ":" .$this->input->post('panelling_conducted_minute_started') . ":00",  //2022-12-30 11:55:46 
            'panelling_conducted_facilities' => implode(',',(array) $this->input->post('panelling_conducted_facilities')),   
            'k9_deployed_type' => implode(',',(array) $this->input->post('k9_deployed_type')),  
            'eod_deployment' => implode(',',(array) $this->input->post('eod_deployment')),   
        ); 
        $update = $this->marslec_model->update($data, $id);
        if($update){
            $this->session->set_flashdata('message', 'Marslec has been updated successfully!');
        }else{
            $this->session->set_flashdata('errors', 'Marslec not successfully updated!');
        }  
        redirect($_SERVER['HTTP_REFERER'],'refresh');
	} 

    public function view_marslec($id){   
               
        $data['page_title'] = "MARINE ENVIRONMENTAL PROTECTION REPORT"; 
        $data['ra_10654'] = $this->ra_10654_model->get_all(); 
        $data['ra_9165'] = $this->ra_9165_model->get_all(); 
        $data['ra_10591'] = $this->ra_10591_model->get_all(); 
        $data['ra_9208'] = $this->ra_9208_model->get_all();
        $data['ra_9147'] = $this->ra_9147_model->get_all(); 
        $data['pd_no_705'] = $this->pd_no_705_model->get_all(); 
        $data['ra_1937'] = $this->ra_1937_model->get_all(); 
        $data['pd_no_532'] = $this->pd_no_532_model->get_all(); 
        $data['ra_10066'] = $this->ra_10066_model->get_all(); 
        $data['ra_6539'] = $this->ra_6539_model->get_all(); 
        $data['ra_10845'] = $this->ra_10845_model->get_all(); 
        $data['marpol_violation'] = $this->marpol_violation_model->get_all();
        $data['seaborne_patrol_activity_conduct'] = $this->seaborne_patrol_activity_conduct_model->get_all();   
        $data['panelling_conducted_facilities'] = $this->panelling_conducted_facilities_model->get_all();
        $data['k9_deployed_type'] = $this->k9_deployed_type_model->get_all();  
        $data['eod_deployment'] = $this->eod_deployment_model->get_all(); 
        $data['marslec'] = $this->marslec_model->findMarslec($id);   
        
        $this->base->load('admin', 'marslec/view_marslec', $data); 
	} 

    public function filter_marslec(){  
        
        // $report_type = $this->report_selection_model->get_all(); 
        $marpol_violation = $this->marpol_violation_model->get_all();

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
     
    
            foreach($marpol_violation as $marpol){ 
                $i = 1;
                foreach($categories as $category){ 
                    $marpol_id = $marpol->id;
                    $q = $this->db->query('
                        select count(*) as entry FROM `marslec` 
                        where marpol_violation  LIKE "%'.$marpol_id.'%" and month(date_created) = '. $i . ' '. 
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
                    'name' =>  $marpol->marpol_violation,
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

            
            foreach($marpol_violation as $marpol){ 
                $i = 1;
                foreach($data['category'] as $category){ 
                    $marpol_id = $marpol->id; 
                    $q = $this->db->query('  
                        SELECT
                        CONCAT(FLOOR(((DAY(date_created) - 1) / 7) + 1)) `week`, 
                        count(*) AS `entry`
                        FROM marslec  
                        where CONCAT(FLOOR(((DAY(date_created) - 1) / 7) + 1)) = '. $category .' 
                        and marpol_violation = '.$marpol_id.'
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
                    'name' =>  $marpol->marpol_violation,
                    'data' =>  $entry,
                );
                
                $entry = [];
            } 

        }

        echo json_encode($data);
    } 

    public function delete($id){

        $delete = $this->marslec_model->delete($id);

        if ($delete) {
            $this->session->set_flashdata('errors', 'Data has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect($_SERVER['HTTP_REFERER'],'refresh');
    }
}
         
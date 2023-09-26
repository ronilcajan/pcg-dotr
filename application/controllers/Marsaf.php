<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Marsaf extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('user_id') ) { 
            redirect('login'); 
        }
    }

    public function index(){ 
        $data['page_title'] = "MARSAF";  
        $data['marsaf'] = $this->marsaf_model->getMarsaf(); 
        $this->base->load('admin', 'marsaf/manage_marsaf', $data);
	}
    
    public function marsaf_list(){
        $data['marsaf_list'] = $this->marsaf_model->getmarsaf();  
        // $data['marsaf'] = $this->marsaf_model->get_all();  
        $data['station'] = $this->station_model->get_all(); 
        $data['page_title'] = "MARSAF LISTS"; 
        $this->base->load('admin', 'marsaf/marsaf_list', $data);
    }
 

    
    public function filter(){  
        $report_type =  $this->report_type_model->get_all(); 
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
                    $report_id = $report['id'];
                    $q = $this->db->query('
                        select count(*) as entry FROM `marsaf` 
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
                    'name' =>  $report['report_type'],
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
                    $report_id = $report['id'];
                    $q = $this->db->query('  
                        SELECT
                        CONCAT(FLOOR(((DAY(date_created) - 1) / 7) + 1)) `week`, 
                        count(*) AS `entry`
                        FROM marsaf  
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
                    'name' =>  $report['report_type'],
                    'data' =>  $entry,
                );
                
                $entry = [];
            } 

        }

        echo json_encode($data);
    }   

    public function add(){  
        $data['page_title'] = "Add MARSAF"; 
        $data['marsaf'] = $this->marsaf_model->getMarsaf();
        $data['station'] = $this->station_model->get_all(); 
        $data['report_type'] = $this->report_type_model->get_all();  
        $data['psc_center'] = $this->psc_center_model->get_all();   
        $data['vessel_type'] = $this->marsaf_vessel_type_model->get_all();
        $data['pdi_result'] = $this->pdi_result_model->get_all(); 
        $data['noted_deficiency'] = $this->noted_deficiency_model->get_all();
        $data['action_code'] = $this->action_code_model->get_all();  
        $data['inspection_type'] = $this->marsaf_inspection_type_model->get_all(); 
        $data['vsei_result'] = $this->vsei_result_model->get_all();  
        $data['vsei_deficiency_code'] = $this->vsei_deficiency_code_model->get_all();  
        $data['drill_conducted'] = $this->drill_conducted_model->get_all();  
        $data['related_international_conventions_noted_deficiency'] = $this->related_international_conventions_noted_deficiency_model->get_all();  
        $data['psc_action_code'] = $this->psc_action_code_model->get_all();  
        $data['coastal_and_beach_violation'] = $this->coastal_and_beach_violation_model->get_all();  
        $data['beach_coast_line_length'] = $this->beach_coast_line_length_model->get_all();  
        $data['recration_watercraft'] = $this->recration_watercraft_model->get_all();   
        $data['recreational_violation'] = $this->recreational_violation_model->get_all();  
        $data['maritime_incident_severity'] = $this->maritime_incident_severity_model->get_all();  
        $data['lighthouse_type'] = $this->lighthouse_type_model->get_all();   
        $data['lighthouse_inspection_purpose'] = $this->lighthouse_inspection_purpose_model->get_all(); 
        $data['lighthouse_status'] = $this->lighthouse_status_model->get_all();  
        $data['lighthouse_cause_if_not_operating'] = $this->lighthouse_cause_if_not_operating_model->get_all();  
        $data['bouy_type'] = $this->bouy_type_model->get_all();  
        $data['light_bouy_inspection_purpose'] = $this->light_bouy_inspection_purpose_model->get_all();   
        $data['light_buoy_status'] = $this->light_buoy_status_model->get_all(); 
        $data['light_buoy__cause_if_not_operating'] = $this->light_buoy__cause_if_not_operating_model->get_all();  
        $data['maritime_casualty_nature'] = $this->maritime_casualty_nature_model->get_all();  
        $data['incident_cause'] = $this->marsaf_incident_cause_model->get_all();  
        $data['incident_consequences'] = $this->incident_consequences_model->get_all();  
        $data['very_serious_mc_category'] = $this->very_serious_mc_category_model->get_all();  
        $data['application_type'] = $this->application_type_model->get_all();   
        $data['salvage_operation_purpose'] = $this->salvage_operation_purpose_model->get_all(); 
        $data['maritime_acitivity'] = $this->maritime_acitivity_model->get_all();   
        $data['maritime_related_violation'] = $this->maritime_related_violation_model->get_all();   

        $this->base->load('admin', 'admin/add_marsaf', $data); 
 
	} 

    public function insert()
	{ 

        $this->form_validation->set_rules('station', 'Station', 'required');
        $this->form_validation->set_rules('sub_station', 'Sub-station', 'required');
        $this->form_validation->set_rules('report_type', 'Report Type', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata('errors', validation_errors());
            redirect("add_marsaf",'refresh');
        }
        
        // // insert to marsaf table
        $marsaf_data = array( 
            'station' => $this->input->post('station'),
            'sub_station' => $this->input->post('sub_station'),
            'report_type' => $this->input->post('report_type'),
            'date_created' => $this->input->post('date_created') . " " .$this->input->post('time'),  //2022-12-30 11:55:46
        ); 
        
        $marsaf_id = $this->marsaf_model->insert($marsaf_data); 

        if( (int) $this->input->post('report_type') === 1){  

            // insert to marsaf pdi table 
            $marsaf_pdi = array( 
                'marsaf_id' => $marsaf_id, 
                'vessel_name' => $this->input->post('pdi_vessel_name'),
                'port_place' => $this->input->post('pdi_port_place'), 
                'vessel_type' => implode(',',(array) $this->input->post('pdi_vessel_type')),
                'company' => $this->input->post('company'),
                'captain_name' => $this->input->post('captain_name'),
                'gross_tonnage' => $this->input->post('gross_tonnage'),
                'kilowat' => $this->input->post('kilowats'),
                'pdi_result' => $this->input->post('pdi_result'),
                'action_code' => implode(',',(array) $this->input->post('pdi_action_code')),
                'noted_deficiency' => implode(',',(array) $this->input->post('pdi_noted_deficiency')), 
                'specify_noted_deficiency' => $this->input->post('pdi_specify_noted_deficiency'),
            );
    
            $this->marsaf_pdi_data_model->insert($marsaf_pdi);
            
        } else if ( (int) $this->input->post('report_type') === 2) {


            // insert to marsaf vsei table 
            $marsaf_vsei = array( 
                'marsaf_id'   => $marsaf_id, 
                'vessel_name'         => $this->input->post('vsei_vessel_name'),
                'port_place'                => $this->input->post('vsei_port_place'),
                'vessel_type'      => implode(',',(array) $this->input->post('vsei_vessel_type')), 
                'company'            => $this->input->post('vsei_company'),
                'captain_name'       => $this->input->post('vsei_captain_name'),
                'vessel_age'            => $this->input->post('vsei_vessel_age'),
                'gross_tonnage'     => $this->input->post('vsei_gross_tonnage'), 
                'kilowat'               => $this->input->post('vsei_kilowats'),
                'inspection_type'              => implode(',',(array) $this->input->post('vsei_inspection_type')), 
                'vsei_result' => implode(',',(array) $this->input->post('vsei_result')),
                'action_code'             => implode(',',(array) $this->input->post('vsei_action_code')),
                'deficiency_code'         => implode(',',(array) $this->input->post('vsei_deficiency_code_2')), 
                'specify_noted_deficiency'         => $this->input->post('vsei_specify_noted_deficiency'), 
                'next_schedule'         => $this->input->post('vsei_next_schedule'), 
    
            );

            $this->marsaf_vsei_data_model->insert($marsaf_vsei);
     
        } else if ( (int) $this->input->post('report_type') === 3) {
            
             
            // insert to marsaf ere table 
            $marsaf_ere = array( 
                'marsaf_report_type' => $marsaf_insert_id, 
                'bulk_carrier'       => implode(',',(array) $this->input->post('ere_BULK_CARRIER')),
                'cargo'              => implode(',',(array) $this->input->post('ere_CARGO')),
                'chemical_tanker'    => implode(',',(array) $this->input->post('ere_CHEMICAL_TANKER')), 
                'container'          => implode(',',(array) $this->input->post('ere_CONTAINER')),
                'fishing_vessel'     => implode(',',(array) $this->input->post('ere_FISHING_VESSEL')),
                'passenger'          => implode(',',(array) $this->input->post('ere_PASSENGER')),
                'roll_on_roll_off'   => implode(',',(array) $this->input->post('ere_ROLL-ON/ROLL-OFF')), 
                'tanker'             => implode(',',(array) $this->input->post('ere_TANKER')),
                'tugboat'            => implode(',',(array) $this->input->post('ere_TUGBOAT')), 
                'passed'             => implode(',',(array) $this->input->post('ere_PASSED')), 
                'failed'             => implode(',',(array) $this->input->post('ere_FAILED')),   
            );
            
            $marsaf_ere_isnert_id = $this->marsaf_ere_model->insert($marsaf_ere);

            
            $marsaf_ere_data = [];

            // insert to marsaf ere data table  
            if(isset($_POST['ere_vessel_name'])){
                foreach($_POST['ere_vessel_name'] as $key => $row){
                    $marsaf_ere_data['marsaf_ere'] = $marsaf_insert_id;
                    $marsaf_ere_data['vessel_name'] = $_POST['ere_vessel_name'][$key];
                    $marsaf_ere_data['port_place'] = $_POST['ere_port_place'][$key];
     
                    
                    if(isset($_POST['ere_vessel_type'][$key])){
                        $marsaf_ere_data['vessel_type'] =implode(',',(array) $_POST['ere_vessel_type'][$key]); 
                    }else{
                        $marsaf_ere_data['vessel_type'] = "";
                    }
    
    
                    $marsaf_ere_data['company'] = $_POST['ere_company'][$key];
                    $marsaf_ere_data['captain_name'] = $_POST['ere_captain_name'][$key];
                    $marsaf_ere_data['vessel_age'] = $_POST['ere_vessel_age'][$key];
                    $marsaf_ere_data['gross_tonnage'] = $_POST['ere_gross_tonnage'][$key]; 
    
                    if(isset($_POST['ere_kilowats'][$key])){
                        $marsaf_ere_data['kilowat'] =implode(',',(array) $_POST['ere_kilowats'][$key]); 
                    }else{
                        $marsaf_ere_data['kilowat'] = "";
                    }
                    
                    $marsaf_ere_data['previous_date'] = $_POST['ere_previous_date'][$key];  
                    if(isset($_POST['ere_inspection_type'][$key])){
                        $marsaf_ere_data['inspection_type'] =implode(',',(array) $_POST['ere_inspection_type'][$key]); 
                    }else{
                        $marsaf_ere_data['inspection_type'] = "";
                    }  
                    
                    if(isset($_POST['ere_drill_conducted'][$key])){
                        $marsaf_ere_data['drill_conducted'] =implode(',',(array) $_POST['ere_drill_conducted'][$key]); 
                    }else{
                        $marsaf_ere_data['drill_conducted'] = "";
                    }  

                    if(isset($_POST['ere_vsei_result'][$key])){
                        $marsaf_ere_data['ere_result'] =implode(',',(array) $_POST['ere_vsei_result'][$key]); 
                    }else{
                        $marsaf_ere_data['ere_result'] = "";
                    } 
                    $marsaf_ere_data['next_schedule'] = $_POST['ere_next_schedule'][$key];
                    $marsaf_ere_data['comment'] = $_POST['ere_comment'][$key];
     
                    // insert
                    $this->marsaf_ere_data_model->insert($marsaf_ere_data);
                    
                }

                
            } 


        } else if ( (int) $this->input->post('report_type') === 4) {
            
            
            // insert to marsaf psc table 
            $marsaf_psc = array( 
                'marsaf_report_type' => $marsaf_insert_id, 
                'bulk_carrier'       => implode(',',(array) $this->input->post('psc_BULK_CARRIER')),
                'cargo'              => implode(',',(array) $this->input->post('psc_CARGO')),
                'chemical_tanker'    => implode(',',(array) $this->input->post('psc_CHEMICAL_TANKER')), 
                'container'          => implode(',',(array) $this->input->post('psc_CONTAINER')),
                'fishing_vessel'     => implode(',',(array) $this->input->post('psc_FISHING_VESSEL')),
                'passenger'          => implode(',',(array) $this->input->post('psc_PASSENGER')),
                'roll_on_roll_off'   => implode(',',(array) $this->input->post('psc_ROLL-ON/ROLL-OFF')), 
                'tanker'             => implode(',',(array) $this->input->post('psc_TANKER')),
                'tugboat'            => implode(',',(array) $this->input->post('psc_TUGBOAT')), 
                'detained'           => implode(',',(array) $this->input->post('psc_DETAINED')), 
                'not_detained'       => implode(',',(array) $this->input->post('psc_NOT_DETAINED')),   
            );
            
            $marsaf_psc_isnert_id = $this->marsaf_psc_model->insert($marsaf_psc);


            $marsaf_psc_data = [];

            // insert to marsaf psc data table  
            if(isset($_POST['psc_vessel_name'])){
                foreach($_POST['psc_vessel_name'] as $key => $row){
                    $marsaf_psc_data['marsaf_psc']  = $marsaf_insert_id;
                    $marsaf_psc_data['vessel_name'] = $_POST['psc_vessel_name'][$key];
                    $marsaf_psc_data['port_place']  = $_POST['psc_port_place'][$key];
      
                    if(isset($_POST['psc_vessel_type'][$key])){
                        $marsaf_psc_data['vessel_type'] =implode(',',(array) $_POST['psc_vessel_type'][$key]); 
                    }else{
                        $marsaf_psc_data['vessel_type'] = "";
                    }
    
    
                    $marsaf_psc_data['registry_flag']    = $_POST['psc_registry_flag'][$key];
                    $marsaf_psc_data['imo_nr']    = $_POST['psc_imo_nr'][$key];
                    $marsaf_psc_data['gt_nt']    = $_POST['psc_gt_nt'][$key];
                    $marsaf_psc_data['vessel_age']    = $_POST['psc_vessel_age'][$key];


                    $marsaf_psc_data['company']       = $_POST['psc_company'][$key];
                    $marsaf_psc_data['captain_name']  = $_POST['psc_captain_name'][$key];   


                    if(isset($_POST['psc_inspection_type'][$key])){
                        $marsaf_psc_data['inspection_type'] =implode(',',(array) $_POST['psc_inspection_type'][$key]); 
                    }else{
                        $marsaf_psc_data['inspection_type'] = "";
                    }  
                    
                    if(isset($_POST['psc_action_code'][$key])){
                        $marsaf_psc_data['action_code'] =implode(',',(array) $_POST['psc_action_code'][$key]); 
                    }else{
                        $marsaf_psc_data['action_code'] = "";
                    }  


                    if(isset($_POST['psc_related_international_conventions_noted_deficiency'][$key])){
                        $marsaf_psc_data['related_international_conventions_noted_deficiency'] =implode(',',(array) $_POST['psc_related_international_conventions_noted_deficiency'][$key]); 
                    }else{
                        $marsaf_psc_data['related_international_conventions_noted_deficiency'] = "";
                    } 


                    $marsaf_psc_data['noted_deficiency'] = $_POST['psc_noted_deficiency'][$key]; 
     
                    // insert
                    $this->marsaf_psc_data_model->insert($marsaf_psc_data);
                    
                }

                
            } 

        } else if ( (int) $this->input->post('report_type') === 5) { 

            
            // insert to marsaf cabrsasi table 
            $marsaf_cabrsasi = array( 
                'marsaf_report_type' => $marsaf_insert_id,    
            );
            
            $marsaf_cabrsasi_isnert_id = $this->marsaf_cabrsasi_model->insert($marsaf_cabrsasi);
 
            $marsaf_cabrsasi_data = [];
            // insert to marsaf cabrsasi data table  
            if(isset($_POST['cabrsasi_coastal_name'])){
                foreach($_POST['cabrsasi_coastal_name'] as $key => $row){
                    $marsaf_cabrsasi_data['marsaf_cabrsasi'] = $marsaf_insert_id;
                    $marsaf_cabrsasi_data['coastal_name']    = $_POST['cabrsasi_coastal_name'][$key];
                    $marsaf_cabrsasi_data['coastal_place']   = $_POST['cabrsasi_coastal_place'][$key];
                    $marsaf_cabrsasi_data['owner_name']      = $_POST['cabrsasi_owner_name'][$key];
      
                    if(isset($_POST['cabrsasi_beach_coast_line_length'][$key])){
                        $marsaf_cabrsasi_data['beach_coast_line_length'] =implode(',',(array) $_POST['cabrsasi_beach_coast_line_length'][$key]); 
                    }else{
                        $marsaf_cabrsasi_data['beach_coast_line_length'] = "";
                    }
    
                    if(isset($_POST['cabrsasi_coastal_and_beach_violation'][$key])){
                        $marsaf_cabrsasi_data['violation'] =implode(',',(array) $_POST['cabrsasi_coastal_and_beach_violation'][$key]); 
                    }else{
                        $marsaf_cabrsasi_data['violation'] = "";
                    } 
     
                    // insert
                    $this->marsaf_cabrsasi_data_model->insert($marsaf_cabrsasi_data);
                    
                }

                
            }    

        } else if ( (int) $this->input->post('report_type') === 6) {  
            
            // insert to marsaf rsei table 
            $marsaf_rsei = array( 
                'marsaf_report_type' => $marsaf_insert_id,    
            );
            
            $marsaf_rsei_isnert_id = $this->marsaf_rsei_model->insert($marsaf_rsei);

            $marsaf_rsei_data = [];
            
            // insert to marsaf rsei data table  
            if(isset($_POST['rsei_resort_name'])){
                foreach($_POST['rsei_resort_name'] as $key => $row){
                    $marsaf_rsei_data['marsaf_rsei']      = $marsaf_insert_id;
                    $marsaf_rsei_data['resort_name']      = $_POST['rsei_resort_name'][$key]; 
                    $marsaf_rsei_data['inspection_place'] = $_POST['rsei_inspection_place'][$key]; 
                    $marsaf_rsei_data['owner_name']       = $_POST['rsei_owner_name'][$key];
      
                    if(isset($_POST['rsei_recration_watercraft'][$key])){
                        $marsaf_rsei_data['recration_watercraft'] =implode(',',(array) $_POST['rsei_recration_watercraft'][$key]); 
                    }else{
                        $marsaf_rsei_data['recration_watercraft'] = "";
                    }
    
                    if(isset($_POST['rsei_recreational_violation'][$key])){
                        $marsaf_rsei_data['recreational_violation'] =implode(',',(array) $_POST['rsei_recreational_violation'][$key]); 
                    }else{
                        $marsaf_rsei_data['recreational_violation'] = "";
                    } 
     
                    // insert
                    $this->marsaf_rsei_data_model->insert($marsaf_rsei_data);
                    
                }

                
            }  
            
        
        } else if ( (int) $this->input->post('report_type') === 7) {  
 

            // insert to marsaf aton table 
            $marsaf_aton = array(
                'marsaf_report_type'        => $marsaf_insert_id,
                'lh_name'                   => $_POST['lh_name'],
                'lh_type'                   => implode(',',(array) $this->input->post('lh_type')),
                'lh_inspection_purpose'     => implode(',',(array) $this->input->post('lh_inspection_purpose')),
                'lh_vessel_name'            => $_POST['lh_vessel_name'],
                'lh_last_operation'         => $_POST['lh_last_operation'],
                'lh_status'                 => implode(',',(array) $this->input->post('lh_status')),
                'lh_cause_if_not_operating' => implode(',',(array) $this->input->post('lh_cause_if_not_operating')),
                'lh_operating'              => $_POST['lh_OPERATING'],
                'lh_not_operating'          => $_POST['lh_NOT_OPERATING'],
                'lb_name'                   => $_POST['lb_name'],
                'lb_type'                   => implode(',',(array) $this->input->post('lb_type')),
                'lb_location'               => $_POST['lb_location'],
                'lb_inspection_purpose'     => implode(',',(array) $this->input->post('lb_inspection_purpose')),
                'lb_repair'                 => $_POST['lb_repair'],
                'lb_last_operating'         => $_POST['lb_last_operating'],
                'lb_status'                 => implode(',',(array) $this->input->post('lb_status')),
                'lb_cause_if_not_operating' => implode(',',(array) $this->input->post('lb_cause_if_not_operating')),
                'lb_operating'              => $_POST['lb_OPERATING'],
                'lb_not_operating'          => $_POST['lb_NOT_OPERATING'],  
            ); 

            
            if(isset($_POST['lh_OPERATING'])){
                $marsaf_rsei_data['lh_operating'] =implode(',',(array) $_POST['lh_OPERATING']); 
            }else{
                $marsaf_rsei_data['lh_operating'] = "";
            }
            
            if(isset($_POST['lh_NOT_OPERATING'])){
                $marsaf_rsei_data['lh_not_operating'] =implode(',',(array) $_POST['lh_NOT_OPERATING']); 
            }else{
                $marsaf_rsei_data['lh_not_operating'] = "";
            }

            
            if(isset($_POST['lb_OPERATING'])){
                $marsaf_rsei_data['lb_operating'] =implode(',',(array) $_POST['lb_OPERATING']); 
            }else{
                $marsaf_rsei_data['lb_operating'] = "";
            } 
            if(isset($_POST['lb_NOT_OPERATING'])){
                $marsaf_rsei_data['lb_not_operating'] =implode(',',(array) $_POST['lb_NOT_OPERATING']); 
            }else{
                $marsaf_rsei_data['lb_not_operating'] = "";
            } 

            // insert
            $this->marsaf_aton_model->insert($marsaf_aton);

        } else if ( (int) $this->input->post('report_type') === 8) {  
  
            $marsaf_mci = array(
                'marsaf_report_type'                  => $marsaf_insert_id,  
                'exact_location'                      => $_POST['mci_exact_location'],
                'vessel_name'                         => $_POST['mci_vessel_name'],
                'registry_flag'                       => $_POST['mci_registry_flag'],
                'foreign_imo_number'                  => $_POST['mci_foreign_imo_number'],
                'domestic_official_number'            => $_POST['mci_domestic_official_number'],
                'gt_nt'                               => $_POST['mci_gt_nt'],
                'company_name'                        => $_POST['mci_company_name'],
                'company_address'                     => $_POST['mci_company_address'],
                'captain_name'                        => $_POST['mci_captain_name'],
                'crew_nationality_number'             => $_POST['mci_crew_nationality_number'],
                'passenger_number'                    => $_POST['mci_passenger_number'],
                'cargoe_onboard'                      => $_POST['mci_cargoe_onboard'],
                'port_origin'                         => $_POST['mci_port_origin'],
                'departure_date_from_port_origin'     => $_POST['mci_departure_date_from_port_origin'],
                'departure_time_from_port_origin'     => $_POST['mci_departure_time_from_port_origin'],
                'incident_time'                       => $_POST['mci_incident_time'],
                'maritime_casualty_nature'            => implode(',',(array) $this->input->post('mci_maritime_casualty_nature')), 
                'incident_cause'                      => implode(',',(array) $this->input->post('mci_incident_cause')), 
                'incident_consequences'               => implode(',',(array) $this->input->post('mci_incident_consequences')), 
                'maritime_incident_severity'          => implode(',',(array) $this->input->post('mci_maritime_incident_severity')), 
                'very_serious_mc_category'            => implode(',',(array) $this->input->post('mci_very_serious_mc_category')),
                'ship_name_involved'                  => $_POST['mci_ship_name_involved'],
                'registry_flag_2'                     => $_POST['mci_registry_flag_2'],
                'foreign_imo_number_2'                => $_POST['mci_foreign_imo_number_2'],
                'domestic_official_number_2'          => $_POST['mci_domestic_official_number_2'],
                'vessel_type'                         => $_POST['mci_vessel_type'],
                'gt_nt_2'                             => $_POST['mci_gt_nt_2'],
                'company_name_2'                      => $_POST['mci_company_name_2'],
                'company_address_2'                   => $_POST['mci_company_address_2'],
                'captain_name_2'                      => $_POST['mci_captain_name_2'],
                'crew_nationality_number_2'           => $_POST['mci_crew_nationality_number_2'],
                'passenger_number_2'                  => $_POST['mci_passenger_number_2'],
                'cargoe_onboard_2'                    => $_POST['mci_cargoe_onboard_2'],
                'port_origin_2'                       => $_POST['mci_port_origin_2'],
                'departure_date_from_port_origin_2'   => $_POST['mci_departure_date_from_port_origin_2'],
                'departure_hour_from_port_origin_2'   => $_POST['mci_departure_hour_from_port_origin_2'],
                'departure_minute_from_port_origin_2' => $_POST['mci_departure_minute_from_port_origin_2'],
                'total_injured_person'                => $_POST['mci_total_injured_person'],
                'total_death'                         => $_POST['mci_total_death'],
                'total_missing_person'                => $_POST['mci_total_missing_person'],
                'total_survivor'                      => $_POST['mci_total_survivor'],
                'safety_recommendation'               => $_POST['mci_safety_recommendation'],
            );  

            // // insert
            $this->marsaf_mci_model->insert($marsaf_mci);


        } else if ( (int) $this->input->post('report_type') === 9) {   

            $marsaf_so = array(
                'marsaf_report_type' => $marsaf_insert_id, 
                'salvor_name'        => $_POST['so_salvor_name'],
                'application_type'   => implode(',',(array) $this->input->post('so_application_type')),
                'exact_location'     => $_POST['so_exact_location'],
                'purpose'            => implode(',',(array) $this->input->post('so_purpose')), 
            );  

            if(isset($_POST['so_violation'])){
                $marsaf_rsei_data['violation'] = implode(',',(array) $_POST['so_violation']); 
            }else{
                $marsaf_rsei_data['violation'] = "";
            }

            
            // // insert
            $this->marsaf_so_model->insert($marsaf_so);
            
        } else if ( (int) $this->input->post('report_type') === 10) {   
            
            // var_dump($_POST);
            $marsaf_mpramra = array(
                'marsaf_report_type'                 => $marsaf_insert_id,   
                'location'                           => $_POST['mpramra_location'],
                'application_date'                   => $_POST['mpramra_application_date'],
                'event_organizer'                    => $_POST['mpramra_event_organizer'],
                'maritime_acitivity'                 => implode(',',(array) $this->input->post('mpramra_maritime_acitivity')),
                'departure_date_from_origin_port'    => $_POST['mpramra_departure_date_from_origin_port'],
                'departure_hour_from_origin_port'    => $_POST['mpramra_departure_hour_from_origin_port'],
                'departure_minutefrom_origin_port'   => $_POST['mpramra_departure_minutefrom_origin_port'],
                'origin_point'                       => $_POST['mpramra_origin_point'],
                'destination_point'                  => $_POST['mpramra_destination_point'],
                'involved_vessel'                    => $_POST['mpramra_involved_vessel'],
                'mpramra_involved_vessel_total'      => $_POST['mpramra_involved_vessel_total'],
                'mpramra_maritime_related_violation' => implode(',',(array) $this->input->post('mpramra_maritime_related_violation')),
            );    


            // // // insert
            $this->marsaf_mpramra_model->insert($marsaf_mpramra);

        }
  
        $this->session->set_flashdata('message', 'Marsaf has been created successfully!'); 
        redirect("add_marsaf",'refresh');



	}

    public function edit_marsaf($id){ 
        
        $data['page_title'] = "EDIT MARSAF"; 

        $data['marsaf_list'] = $this->marsaf_model->getMarsaf();
        $data['station'] = $this->station_model->get_all(); 
        $data['report_type'] = $this->report_type_model->get_all();  
        $data['psc_center'] = $this->psc_center_model->get_all();   
        $data['vessel_type'] = $this->marsaf_vessel_type_model->get_all();
        $data['pdi_result'] = $this->pdi_result_model->get_all(); 
        $data['noted_deficiency'] = $this->noted_deficiency_model->get_all();
        $data['action_code'] = $this->action_code_model->get_all();  
        $data['inspection_type'] = $this->marsaf_inspection_type_model->get_all(); 
        $data['vsei_result'] = $this->vsei_result_model->get_all();  
        $data['vsei_deficiency_code'] = $this->vsei_deficiency_code_model->get_all();  
        $data['drill_conducted'] = $this->drill_conducted_model->get_all();  
        $data['related_international_conventions_noted_deficiency'] = $this->related_international_conventions_noted_deficiency_model->get_all();  
        $data['psc_action_code'] = $this->psc_action_code_model->get_all();  
        $data['coastal_and_beach_violation'] = $this->coastal_and_beach_violation_model->get_all();  
        $data['beach_coast_line_length'] = $this->beach_coast_line_length_model->get_all();  
        $data['recration_watercraft'] = $this->recration_watercraft_model->get_all();   
        $data['recreational_violation'] = $this->recreational_violation_model->get_all();  
        $data['maritime_incident_severity'] = $this->maritime_incident_severity_model->get_all();  
        $data['lighthouse_type'] = $this->lighthouse_type_model->get_all();   
        $data['lighthouse_inspection_purpose'] = $this->lighthouse_inspection_purpose_model->get_all(); 
        $data['lighthouse_status'] = $this->lighthouse_status_model->get_all();  
        $data['lighthouse_cause_if_not_operating'] = $this->lighthouse_cause_if_not_operating_model->get_all();  
        $data['bouy_type'] = $this->bouy_type_model->get_all();  
        $data['light_bouy_inspection_purpose'] = $this->light_bouy_inspection_purpose_model->get_all();   
        $data['light_buoy_status'] = $this->light_buoy_status_model->get_all(); 
        $data['light_buoy__cause_if_not_operating'] = $this->light_buoy__cause_if_not_operating_model->get_all();  
        $data['maritime_casualty_nature'] = $this->maritime_casualty_nature_model->get_all();  
        $data['incident_cause'] = $this->marsaf_incident_cause_model->get_all();  
        $data['incident_consequences'] = $this->incident_consequences_model->get_all();  
        $data['very_serious_mc_category'] = $this->very_serious_mc_category_model->get_all();  
        $data['application_type'] = $this->application_type_model->get_all();   
        $data['salvage_operation_purpose'] = $this->salvage_operation_purpose_model->get_all(); 
        $data['maritime_acitivity'] = $this->maritime_acitivity_model->get_all();   
        $data['maritime_related_violation'] = $this->maritime_related_violation_model->get_all();   
        
        $data['marsaf'] = $this->marsaf_model->findMarsaf($id); 
        $data['marsaf_id'] = $id; 
        $report_type = $data['marsaf']->report_type_id;
        
        switch($report_type){
            case 1: 

                $data['marsaf_pdi'] = $this->marsaf_pdi_model->find($id);
                $data['marsaf_pdi_data'] = $this->marsaf_pdi_data_model->find($id);
                break;
            case 2: 
                $data['marsaf_vsei'] = $this->marsaf_vsei_model->find($id);
                $data['marsaf_vsei_data'] = $this->marsaf_vsei_data_model->find($id);
                break; 
            case 3: 
                $data['marsaf_ere'] = $this->marsaf_ere_model->find($id);
                $data['marsaf_ere_data'] = $this->marsaf_ere_data_model->find($id);
                break;
            case 4: 
                $data['marsaf_psc'] = $this->marsaf_psc_model->find($id);
                $data['marsaf_psc_data'] = $this->marsaf_psc_data_model->find($id);
                break;
            case 5: 
                $data['marsaf_cabrsasi'] = $this->marsaf_cabrsasi_model->find($id);
                $data['marsaf_cabrsasi_data'] = $this->marsaf_cabrsasi_data_model->find($id);
                break;
            case 6: 
                $data['marsaf_rsei'] = $this->marsaf_rsei_model->find($id);
                $data['marsaf_rsei_data'] = $this->marsaf_rsei_data_model->find($id);
                break;
            case 7: 
                $data['marsaf_aton'] = $this->marsaf_aton_model->find($id);
                break;
            case 8: 
                $data['marsaf_mci'] = $this->marsaf_mci_model->find($id);
                break;
            case 9: 
                $data['marsaf_so'] = $this->marsaf_so_model->find($id);
                break;
            case 10: 
                $data['marsaf_mpramra'] = $this->marsaf_mpramra_model->find($id);
                break;
        }

        $this->base->load('admin', 'marsaf/edit_marsaf', $data);
        
	}

    public function update($id)
	{ 

        // // insert to marsaf table
        $marsaf_data = array( 
            'station' => $this->input->post('station'),
            'sub_station' => $this->input->post('sub_station'),
            'report_type' => $this->input->post('report_type'),
            'date_created' => $this->input->post('date_created') . " " .$this->input->post('hour_created') . ":" .$this->input->post('minute_created') . ":00",  //2022-12-30 11:55:46
            'psc_center' => $this->input->post('psc_center'),  
        ); 
        
        $this->marsaf_model->update($marsaf_data, $id); 

        if( (int) $this->input->post('report_type') === 1){  

            // insert to marsaf pdi table 
            $marsaf_pdi = array( 
                'bulk_carrier' => $this->input->post('bulk_carrier'),
                'bulk_carrier_2' => $this->input->post('BULK_CARRIER'), 
                'cargo' => $this->input->post('CARGO'),
                'chemical_tanker' => $this->input->post('CHEMICAL_TANKER'),
                'container' => $this->input->post('CONTAINER'),
                'fishing_vessel' => $this->input->post('FISHING_VESSEL'),
                'passenger' => $this->input->post('PASSENGER'),
                'roll_on_roll_off' => $this->input->post('ROLL-ON/ROLL-OFF'),
                'tanker' => $this->input->post('TANKER'),
                'tugboat' => $this->input->post('TUGBOAT'), 
                'noted_deficiency' => implode(',',(array) $this->input->post('noted_deficiency')),
                'cleared_to_depart' => implode(',',(array) $this->input->post('CLEARED_TO_DEPART')),
                'not_cleared_to_depart' => implode(',',(array) $this->input->post('NOT_CLEARED_TO_DEPART')), 
    
            );
    
            
            $this->marsaf_pdi_model->update($marsaf_pdi, $id);
 

            $marsaf_pdi_data = [];

            // insert to marsaf pdi data table  
            if(isset($_POST['pdi_vessel_name'])){
                
                $this->marsaf_pdi_data_model->delete($id); //delete the previous data

                foreach($_POST['pdi_vessel_name'] as $key => $row){
                    $marsaf_pdi_data['marsaf_pdi'] = $id;
                    $marsaf_pdi_data['vessel_name'] = $_POST['pdi_vessel_name'][$key];
                    $marsaf_pdi_data['port_place'] = $_POST['pdi_port_place'][$key];
     
                    
                    if(isset($_POST['pdi_vessel_type'][$key])){
                        $marsaf_pdi_data['vessel_type'] =implode(',',(array) $_POST['pdi_vessel_type'][$key]); 
                    }else{
                        $marsaf_pdi_data['vessel_type'] = "";
                    }
    
    
                    $marsaf_pdi_data['company'] = $_POST['company'][$key];
                    $marsaf_pdi_data['captain_name'] = $_POST['captain_name'][$key];
                    $marsaf_pdi_data['gross_tonnage'] = $_POST['gross_tonnage'][$key]; 
    
                    if(isset($_POST['kilowat'][$key])){
                        $marsaf_pdi_data['kilowat'] =implode(',',(array) $_POST['kilowats'][$key]); 
                    }else{
                        $marsaf_pdi_data['kilowat'] = "";
                    }
                    
                    if(isset($_POST['pdi_result'][$key])){
                        $marsaf_pdi_data['pdi_result'] =implode(',',(array) $_POST['pdi_result'][$key]); 
                    }else{
                        $marsaf_pdi_data['pdi_result'] = "";
                    }
    
                    if(isset($_POST['pdi_action_code'][$key])){
                        $marsaf_pdi_data['action_code'] =implode(',',(array) $_POST['pdi_action_code'][$key]); 
                    }else{
                        $marsaf_pdi_data['action_code'] = "";
                    }
                    if(isset($_POST['pdi_noted_deficiency'][$key])){
                        $marsaf_pdi_data['noted_deficiency'] =implode(',',(array) $_POST['pdi_noted_deficiency'][$key]); 
                    }else{
                        $marsaf_pdi_data['noted_deficiency'] = "";
                    } 
    
                    $marsaf_pdi_data['specify_noted_deficiency'] = $_POST['pdi_specify_noted_deficiency'][$key];
     
                    // insert
                    $this->marsaf_pdi_data_model->update($marsaf_pdi_data, $id);
                    
                }
            } 
            
        } else if ( (int) $this->input->post('report_type') === 2) {


            // insert to marsaf vsei table 
            $marsaf_vsei = array( 
                'bulk_carrier'         => implode(',',(array) $this->input->post('vsei_BULK_CARRIER')),
                'cargo'                => implode(',',(array) $this->input->post('vsei_CARGO')),
                'chemical_tanker'      => implode(',',(array) $this->input->post('vsei_CHEMICAL_TANKER')), 
                'container'            => implode(',',(array) $this->input->post('vsei_CONTAINER')),
                'fishing_vessel'       => implode(',',(array) $this->input->post('vsei_FISHING_VESSEL')),
                'passenger'            => implode(',',(array) $this->input->post('vsei_PASSENGER')),
                'roll_on_roll_off'     => implode(',',(array) $this->input->post('vsei_ROLL-ON/ROLL-OFF')), 
                'tanker'               => implode(',',(array) $this->input->post('vsei_TANKER')),
                'tugboat'              => implode(',',(array) $this->input->post('vsei_TUGBOAT')), 
                'vsei_deficiency_code' => implode(',',(array) $this->input->post('vsei_deficiency_code')),
                'detained'             => implode(',',(array) $this->input->post('vsei_DETAINED')),
                'not_detained'         => implode(',',(array) $this->input->post('vsei_NOT_DETAINEDs')), 
    
            );
            
            $this->marsaf_vsei_model->update($marsaf_vsei, $id);



            $marsaf_vsei_data = [];

            // insert to marsaf vsei data table  
            if(isset($_POST['vsei_vessel_name'])){
                $this->marsaf_vsei_data_model->delete($id); //delete the previous data

                foreach($_POST['vsei_vessel_name'] as $key => $row){
                    $marsaf_vsei_data['marsaf_vsei'] = $id;
                    $marsaf_vsei_data['vessel_name'] = $_POST['vsei_vessel_name'][$key];
                    $marsaf_vsei_data['port_place'] = $_POST['vsei_port_place'][$key];
     
                    
                    if(isset($_POST['vsei_vessel_type'][$key])){
                        $marsaf_vsei_data['vessel_type'] =implode(',',(array) $_POST['vsei_vessel_type'][$key]); 
                    }else{
                        $marsaf_vsei_data['vessel_type'] = "";
                    }
    
    
                    $marsaf_vsei_data['company'] = $_POST['vsei_company'][$key];
                    $marsaf_vsei_data['captain_name'] = $_POST['vsei_captain_name'][$key];
                    $marsaf_vsei_data['vessel_age'] = $_POST['vsei_vessel_age'][$key];
                    $marsaf_vsei_data['gross_tonnage'] = $_POST['vsei_gross_tonnage'][$key]; 
    
                    if(isset($_POST['vsei_kilowats'][$key])){
                        $marsaf_vsei_data['kilowat'] =implode(',',(array) $_POST['vsei_kilowats'][$key]); 
                    }else{
                        $marsaf_vsei_data['kilowat'] = "";
                    }
                    

                    if(isset($_POST['vsei_inspection_type'][$key])){
                        $marsaf_vsei_data['inspection_type'] =implode(',',(array) $_POST['vsei_inspection_type'][$key]); 
                    }else{
                        $marsaf_vsei_data['inspection_type'] = "";
                    } 
                    if(isset($_POST['vsei_result'][$key])){
                        $marsaf_vsei_data['vsei_result'] =implode(',',(array) $_POST['vsei_result'][$key]); 
                    }else{
                        $marsaf_vsei_data['vsei_result'] = "";
                    }
 
    
                    if(isset($_POST['vsei_action_code'][$key])){
                        $marsaf_vsei_data['action_code'] =implode(',',(array) $_POST['vsei_action_code'][$key]); 
                    }else{
                        $marsaf_vsei_data['action_code'] = "";
                    }
                    
                    if(isset($_POST['vsei_deficiency_code_2'][$key])){
                        $marsaf_vsei_data['deficiency_code'] =implode(',',(array) $_POST['vsei_deficiency_code_2'][$key]); 
                    }else{
                        $marsaf_vsei_data['deficiency_code'] = "";
                    } 

    
                    $marsaf_vsei_data['specify_noted_deficiency'] = $_POST['vsei_specify_noted_deficiency'][$key];
     
                    $marsaf_vsei_data['next_schedule'] = $_POST['vsei_next_schedule'][$key];
     
                    // insert
                    $this->marsaf_vsei_data_model->update($marsaf_vsei_data);
                    
                }

            } 
     
        } else if ( (int) $this->input->post('report_type') === 3) {
            
             
            // insert to marsaf ere table 
            $marsaf_ere = array( 
                'bulk_carrier'       => implode(',',(array) $this->input->post('ere_BULK_CARRIER')),
                'cargo'              => implode(',',(array) $this->input->post('ere_CARGO')),
                'chemical_tanker'    => implode(',',(array) $this->input->post('ere_CHEMICAL_TANKER')), 
                'container'          => implode(',',(array) $this->input->post('ere_CONTAINER')),
                'fishing_vessel'     => implode(',',(array) $this->input->post('ere_FISHING_VESSEL')),
                'passenger'          => implode(',',(array) $this->input->post('ere_PASSENGER')),
                'roll_on_roll_off'   => implode(',',(array) $this->input->post('ere_ROLL-ON/ROLL-OFF')), 
                'tanker'             => implode(',',(array) $this->input->post('ere_TANKER')),
                'tugboat'            => implode(',',(array) $this->input->post('ere_TUGBOAT')), 
                'passed'             => implode(',',(array) $this->input->post('ere_PASSED')), 
                'failed'             => implode(',',(array) $this->input->post('ere_FAILED')),   
            );
            
            $this->marsaf_ere_model->update($marsaf_ere, $id);

            
            $marsaf_ere_data = [];

            // insert to marsaf ere data table  
            if(isset($_POST['ere_vessel_name'])){
                
                $this->marsaf_ere_data_model->delete($id); //delete the previous data
                
                foreach($_POST['ere_vessel_name'] as $key => $row){
                    $marsaf_ere_data['marsaf_ere'] = $id;
                    $marsaf_ere_data['vessel_name'] = $_POST['ere_vessel_name'][$key];
                    $marsaf_ere_data['port_place'] = $_POST['ere_port_place'][$key];
     
                    
                    if(isset($_POST['ere_vessel_type'][$key])){
                        $marsaf_ere_data['vessel_type'] =implode(',',(array) $_POST['ere_vessel_type'][$key]); 
                    }else{
                        $marsaf_ere_data['vessel_type'] = "";
                    }
    
    
                    $marsaf_ere_data['company'] = $_POST['ere_company'][$key];
                    $marsaf_ere_data['captain_name'] = $_POST['ere_captain_name'][$key];
                    $marsaf_ere_data['vessel_age'] = $_POST['ere_vessel_age'][$key];
                    $marsaf_ere_data['gross_tonnage'] = $_POST['ere_gross_tonnage'][$key]; 
    
                    if(isset($_POST['ere_kilowats'][$key])){
                        $marsaf_ere_data['kilowat'] =implode(',',(array) $_POST['ere_kilowats'][$key]); 
                    }else{
                        $marsaf_ere_data['kilowat'] = "";
                    }
                    
                    $marsaf_ere_data['previous_date'] = $_POST['ere_previous_date'][$key];  
                    
                    if(isset($_POST['ere_inspection_type'][$key])){
                        $marsaf_ere_data['inspection_type'] =implode(',',(array) $_POST['ere_inspection_type'][$key]); 
                    }else{
                        $marsaf_ere_data['inspection_type'] = "";
                    }  
                    
                    if(isset($_POST['ere_drill_conducted'][$key])){
                        $marsaf_ere_data['drill_conducted'] =implode(',',(array) $_POST['ere_drill_conducted'][$key]); 
                    }else{
                        $marsaf_ere_data['drill_conducted'] = "";
                    }  

                    if(isset($_POST['ere_vsei_result'][$key])){
                        $marsaf_ere_data['ere_result'] =implode(',',(array) $_POST['ere_vsei_result'][$key]); 
                    }else{
                        $marsaf_ere_data['ere_result'] = "";
                    } 
                    $marsaf_ere_data['next_schedule'] = $_POST['ere_next_schedule'][$key];
                    $marsaf_ere_data['comment'] = $_POST['ere_comment'][$key];
     
                    // insert
                    $this->marsaf_ere_data_model->update($marsaf_ere_data, $id);
                    
                }

                
            } 


        } else if ( (int) $this->input->post('report_type') === 4) {
            
            
            // insert to marsaf psc table 
            $marsaf_psc = array( 
                'bulk_carrier'       => implode(',',(array) $this->input->post('psc_BULK_CARRIER')),
                'cargo'              => implode(',',(array) $this->input->post('psc_CARGO')),
                'chemical_tanker'    => implode(',',(array) $this->input->post('psc_CHEMICAL_TANKER')), 
                'container'          => implode(',',(array) $this->input->post('psc_CONTAINER')),
                'fishing_vessel'     => implode(',',(array) $this->input->post('psc_FISHING_VESSEL')),
                'passenger'          => implode(',',(array) $this->input->post('psc_PASSENGER')),
                'roll_on_roll_off'   => implode(',',(array) $this->input->post('psc_ROLL-ON/ROLL-OFF')), 
                'tanker'             => implode(',',(array) $this->input->post('psc_TANKER')),
                'tugboat'            => implode(',',(array) $this->input->post('psc_TUGBOAT')), 
                'detained'           => implode(',',(array) $this->input->post('psc_DETAINED')), 
                'not_detained'       => implode(',',(array) $this->input->post('psc_NOT_DETAINED')),   
            );
            
            $marsaf_psc_isnert_id = $this->marsaf_psc_model->update($marsaf_psc, $id);


            $marsaf_psc_data = [];

            // insert to marsaf psc data table  
            if(isset($_POST['psc_vessel_name'])){
                
                $this->marsaf_psc_data_model->delete($id); //delete the previous data
                
                foreach($_POST['psc_vessel_name'] as $key => $row){
                    $marsaf_psc_data['marsaf_psc']  = $id;
                    $marsaf_psc_data['vessel_name'] = $_POST['psc_vessel_name'][$key];
                    $marsaf_psc_data['port_place']  = $_POST['psc_port_place'][$key];
      
                    if(isset($_POST['psc_vessel_type'][$key])){
                        $marsaf_psc_data['vessel_type'] =implode(',',(array) $_POST['psc_vessel_type'][$key]); 
                    }else{
                        $marsaf_psc_data['vessel_type'] = "";
                    }
    
    
                    $marsaf_psc_data['registry_flag']    = $_POST['psc_registry_flag'][$key];
                    $marsaf_psc_data['imo_nr']    = $_POST['psc_imo_nr'][$key];
                    $marsaf_psc_data['gt_nt']    = $_POST['psc_gt_nt'][$key];
                    $marsaf_psc_data['vessel_age']    = $_POST['psc_vessel_age'][$key];


                    $marsaf_psc_data['company']       = $_POST['psc_company'][$key];
                    $marsaf_psc_data['captain_name']  = $_POST['psc_captain_name'][$key];   


                    if(isset($_POST['psc_inspection_type'][$key])){
                        $marsaf_psc_data['inspection_type'] =implode(',',(array) $_POST['psc_inspection_type'][$key]); 
                    }else{
                        $marsaf_psc_data['inspection_type'] = "";
                    }  
                    
                    if(isset($_POST['psc_action_code'][$key])){
                        $marsaf_psc_data['action_code'] =implode(',',(array) $_POST['psc_action_code'][$key]); 
                    }else{
                        $marsaf_psc_data['action_code'] = "";
                    }  


                    if(isset($_POST['psc_related_international_conventions_noted_deficiency'][$key])){
                        $marsaf_psc_data['related_international_conventions_noted_deficiency'] =implode(',',(array) $_POST['psc_related_international_conventions_noted_deficiency'][$key]); 
                    }else{
                        $marsaf_psc_data['related_international_conventions_noted_deficiency'] = "";
                    } 


                    $marsaf_psc_data['noted_deficiency'] = $_POST['psc_noted_deficiency'][$key]; 
     
                    // insert
                    $this->marsaf_psc_data_model->update($marsaf_psc_data, $id);
                    
                }

                
            } 

        } else if ( (int) $this->input->post('report_type') === 5) { 
 
            $marsaf_cabrsasi_data = [];
            // insert to marsaf cabrsasi data table  
            if(isset($_POST['cabrsasi_coastal_name'])){
                
                $this->marsaf_cabrsasi_data_model->delete($id); //delete the previous data

                foreach($_POST['cabrsasi_coastal_name'] as $key => $row){
                    $marsaf_cabrsasi_data['marsaf_cabrsasi'] = $id;
                    $marsaf_cabrsasi_data['coastal_name']    = $_POST['cabrsasi_coastal_name'][$key];
                    $marsaf_cabrsasi_data['coastal_place']   = $_POST['cabrsasi_coastal_place'][$key];
                    $marsaf_cabrsasi_data['owner_name']      = $_POST['cabrsasi_owner_name'][$key];
      
                    if(isset($_POST['cabrsasi_beach_coast_line_length'][$key])){
                        $marsaf_cabrsasi_data['beach_coast_line_length'] =implode(',',(array) $_POST['cabrsasi_beach_coast_line_length'][$key]); 
                    }else{
                        $marsaf_cabrsasi_data['beach_coast_line_length'] = "";
                    }
    
                    if(isset($_POST['cabrsasi_coastal_and_beach_violation'][$key])){
                        $marsaf_cabrsasi_data['violation'] =implode(',',(array) $_POST['cabrsasi_coastal_and_beach_violation'][$key]); 
                    }else{
                        $marsaf_cabrsasi_data['violation'] = "";
                    } 
     
                    // insert
                    $this->marsaf_cabrsasi_data_model->update($marsaf_cabrsasi_data, $id);
                    
                }

                
            }    

        } else if ( (int) $this->input->post('report_type') === 6) {  

            $marsaf_rsei_data = [];
            
            // insert to marsaf rsei data table  
            if(isset($_POST['rsei_resort_name'])){
                
                $this->marsaf_rsei_data_model->delete($id); //delete the previous data

                foreach($_POST['rsei_resort_name'] as $key => $row){
                    $marsaf_rsei_data['marsaf_rsei']      = $id;
                    $marsaf_rsei_data['resort_name']      = $_POST['rsei_resort_name'][$key]; 
                    $marsaf_rsei_data['inspection_place'] = $_POST['rsei_inspection_place'][$key]; 
                    $marsaf_rsei_data['owner_name']       = $_POST['rsei_owner_name'][$key];
      
                    if(isset($_POST['rsei_recration_watercraft'][$key])){
                        $marsaf_rsei_data['recration_watercraft'] =implode(',',(array) $_POST['rsei_recration_watercraft'][$key]); 
                    }else{
                        $marsaf_rsei_data['recration_watercraft'] = "";
                    }
    
                    if(isset($_POST['rsei_recreational_violation'][$key])){
                        $marsaf_rsei_data['recreational_violation'] =implode(',',(array) $_POST['rsei_recreational_violation'][$key]); 
                    }else{
                        $marsaf_rsei_data['recreational_violation'] = "";
                    } 
     
                    // insert
                    $this->marsaf_rsei_data_model->update($marsaf_rsei_data, $id);
                    
                }

                
            }  
            
        
        } else if ( (int) $this->input->post('report_type') === 7) {  
 

            // insert to marsaf aton table 
            $marsaf_aton = array(
                'lh_name'                   => $_POST['lh_name'],
                'lh_type'                   => implode(',',(array) $this->input->post('lh_type')),
                'lh_inspection_purpose'     => implode(',',(array) $this->input->post('lh_inspection_purpose')),
                'lh_vessel_name'            => $_POST['lh_vessel_name'],
                'lh_last_operation'         => $_POST['lh_last_operation'],
                'lh_status'                 => implode(',',(array) $this->input->post('lh_status')),
                'lh_cause_if_not_operating' => implode(',',(array) $this->input->post('lh_cause_if_not_operating')),
                'lh_operating'              => $_POST['lh_OPERATING'],
                'lh_not_operating'          => $_POST['lh_NOT_OPERATING'],
                'lb_name'                   => $_POST['lb_name'],
                'lb_type'                   => implode(',',(array) $this->input->post('lb_type')),
                'lb_location'               => $_POST['lb_location'],
                'lb_inspection_purpose'     => implode(',',(array) $this->input->post('lb_inspection_purpose')),
                'lb_repair'                 => $_POST['lb_repair'],
                'lb_last_operating'         => $_POST['lb_last_operating'],
                'lb_status'                 => implode(',',(array) $this->input->post('lb_status')),
                'lb_cause_if_not_operating' => implode(',',(array) $this->input->post('lb_cause_if_not_operating')),
                'lb_operating'              => $_POST['lb_OPERATING'],
                'lb_not_operating'          => $_POST['lb_NOT_OPERATING'],  
            ); 

            
            if(isset($_POST['lh_OPERATING'])){
                $marsaf_rsei_data['lh_operating'] =implode(',',(array) $_POST['lh_OPERATING']); 
            }else{
                $marsaf_rsei_data['lh_operating'] = "";
            }
            
            if(isset($_POST['lh_NOT_OPERATING'])){
                $marsaf_rsei_data['lh_not_operating'] =implode(',',(array) $_POST['lh_NOT_OPERATING']); 
            }else{
                $marsaf_rsei_data['lh_not_operating'] = "";
            }

            
            if(isset($_POST['lb_OPERATING'])){
                $marsaf_rsei_data['lb_operating'] =implode(',',(array) $_POST['lb_OPERATING']); 
            }else{
                $marsaf_rsei_data['lb_operating'] = "";
            } 
            if(isset($_POST['lb_NOT_OPERATING'])){
                $marsaf_rsei_data['lb_not_operating'] =implode(',',(array) $_POST['lb_NOT_OPERATING']); 
            }else{
                $marsaf_rsei_data['lb_not_operating'] = "";
            } 

            // insert
            $this->marsaf_aton_model->update($marsaf_aton, $id);

        } else if ( (int) $this->input->post('report_type') === 8) {  
  
            $marsaf_mci = array(
                'exact_location'                      => $_POST['mci_exact_location'],
                'vessel_name'                         => $_POST['mci_vessel_name'],
                'registry_flag'                       => $_POST['mci_registry_flag'],
                'foreign_imo_number'                  => $_POST['mci_foreign_imo_number'],
                'domestic_official_number'            => $_POST['mci_domestic_official_number'],
                'gt_nt'                               => $_POST['mci_gt_nt'],
                'company_name'                        => $_POST['mci_company_name'],
                'company_address'                     => $_POST['mci_company_address'],
                'captain_name'                        => $_POST['mci_captain_name'],
                'crew_nationality_number'             => $_POST['mci_crew_nationality_number'],
                'passenger_number'                    => $_POST['mci_passenger_number'],
                'cargoe_onboard'                      => $_POST['mci_cargoe_onboard'],
                'port_origin'                         => $_POST['mci_port_origin'],
                'departure_date_from_port_origin'     => $_POST['mci_departure_date_from_port_origin'],
                'departure_time_from_port_origin'     => $_POST['mci_departure_time_from_port_origin'].':'.$_POST['mci_departure_time_from_port_origin_2'],
                'incident_time'                       => $_POST['mci_incident_time'],
                'maritime_casualty_nature'            => implode(',',(array) $this->input->post('mci_maritime_casualty_nature')), 
                'incident_cause'                      => implode(',',(array) $this->input->post('mci_incident_cause')), 
                'incident_consequences'               => implode(',',(array) $this->input->post('mci_incident_consequences')), 
                'maritime_incident_severity'          => implode(',',(array) $this->input->post('mci_maritime_incident_severity')), 
                'very_serious_mc_category'            => implode(',',(array) $this->input->post('mci_very_serious_mc_category')),
                'ship_name_involved'                  => $_POST['mci_ship_name_involved'],
                'registry_flag_2'                     => $_POST['mci_registry_flag_2'],
                'foreign_imo_number_2'                => $_POST['mci_foreign_imo_number_2'],
                'domestic_official_number_2'          => $_POST['mci_domestic_official_number_2'],
                'vessel_type'                         => $_POST['mci_vessel_type'],
                'gt_nt_2'                             => $_POST['mci_gt_nt_2'],
                'company_name_2'                      => $_POST['mci_company_name_2'],
                'company_address_2'                   => $_POST['mci_company_address_2'],
                'captain_name_2'                      => $_POST['mci_captain_name_2'],
                'crew_nationality_number_2'           => $_POST['mci_crew_nationality_number_2'],
                'passenger_number_2'                  => $_POST['mci_passenger_number_2'],
                'cargoe_onboard_2'                    => $_POST['mci_cargoe_onboard_2'],
                'port_origin_2'                       => $_POST['mci_port_origin_2'],
                'departure_date_from_port_origin_2'   => $_POST['mci_departure_date_from_port_origin_2'],
                'departure_hour_from_port_origin_2'   => $_POST['mci_departure_hour_from_port_origin_2'],
                'departure_minute_from_port_origin_2' => $_POST['mci_departure_minute_from_port_origin_2'],
                'total_injured_person'                => $_POST['mci_total_injured_person'],
                'total_death'                         => $_POST['mci_total_death'],
                'total_missing_person'                => $_POST['mci_total_missing_person'],
                'total_survivor'                      => $_POST['mci_total_survivor'],
                'safety_recommendation'               => $_POST['mci_safety_recommendation'],
            );  

            // // insert
            $this->marsaf_mci_model->update($marsaf_mci, $id);


        } else if ( (int) $this->input->post('report_type') === 9) {   

            $marsaf_so = array(
                'salvor_name'        => $_POST['so_salvor_name'],
                'application_type'   => implode(',',(array) $this->input->post('so_application_type')),
                'exact_location'     => $_POST['so_exact_location'],
                'purpose'            => implode(',',(array) $this->input->post('so_purpose')), 
            );  

            if(isset($_POST['so_violation'])){
                $marsaf_rsei_data['violation'] =implode(',',(array) $_POST['so_violation']); 
            }else{
                $marsaf_rsei_data['violation'] = "";
            }

            
            // // insert
            $this->marsaf_so_model->update($marsaf_so, $id);
            
        } else if ( (int) $this->input->post('report_type') === 10) {   
            
            // var_dump($_POST);
            $marsaf_mpramra = array(
                'location'                           => $_POST['mpramra_location'],
                'application_date'                   => $_POST['mpramra_application_date'],
                'event_organizer'                    => $_POST['mpramra_event_organizer'],
                'maritime_acitivity'                 => implode(',',(array) $this->input->post('mpramra_maritime_acitivity')),
                'departure_date_from_origin_port'    => $_POST['mpramra_departure_date_from_origin_port'],
                'departure_hour_from_origin_port'    => $_POST['mpramra_departure_hour_from_origin_port'],
                'departure_minutefrom_origin_port'   => $_POST['mpramra_departure_minutefrom_origin_port'],
                'origin_point'                       => $_POST['mpramra_origin_point'],
                'destination_point'                  => $_POST['mpramra_destination_point'],
                'involved_vessel'                    => $_POST['mpramra_involved_vessel'],
                'mpramra_involved_vessel_total'      => $_POST['mpramra_involved_vessel_total'],
                'mpramra_maritime_related_violation' => implode(',',(array) $this->input->post('mpramra_maritime_related_violation')),
            );    


            // // // insert
            $this->marsaf_mpramra_model->update($marsaf_mpramra, $id);

        }
  
        $this->session->set_flashdata('message', 'Marsaf has been updated successfully!'); 
        redirect($_SERVER['HTTP_REFERER'],'refresh');

	}

    public function view($id = "")
    {  
        $data['page_title'] = "MARSAF";  
        $data['marsaf_list'] = $this->marsaf_model->getMarsaf();
        $data['station'] = $this->station_model->get_all(); 
        $data['report_type'] = $this->report_type_model->get_all();  
        $data['psc_center'] = $this->psc_center_model->get_all();   
        $data['vessel_type'] = $this->marsaf_vessel_type_model->get_all();
        $data['pdi_result'] = $this->pdi_result_model->get_all(); 
        $data['noted_deficiency'] = $this->noted_deficiency_model->get_all();
        $data['action_code'] = $this->action_code_model->get_all();  
        $data['inspection_type'] = $this->marsaf_inspection_type_model->get_all(); 
        $data['vsei_result'] = $this->vsei_result_model->get_all();  
        $data['vsei_deficiency_code'] = $this->vsei_deficiency_code_model->get_all();  
        $data['drill_conducted'] = $this->drill_conducted_model->get_all();  
        $data['related_international_conventions_noted_deficiency'] = $this->related_international_conventions_noted_deficiency_model->get_all();  
        $data['psc_action_code'] = $this->psc_action_code_model->get_all();  
        $data['coastal_and_beach_violation'] = $this->coastal_and_beach_violation_model->get_all();  
        $data['beach_coast_line_length'] = $this->beach_coast_line_length_model->get_all();  
        $data['recration_watercraft'] = $this->recration_watercraft_model->get_all();   
        $data['recreational_violation'] = $this->recreational_violation_model->get_all();  
        $data['maritime_incident_severity'] = $this->maritime_incident_severity_model->get_all();  
        $data['lighthouse_type'] = $this->lighthouse_type_model->get_all();   
        $data['lighthouse_inspection_purpose'] = $this->lighthouse_inspection_purpose_model->get_all(); 
        $data['lighthouse_status'] = $this->lighthouse_status_model->get_all();  
        $data['lighthouse_cause_if_not_operating'] = $this->lighthouse_cause_if_not_operating_model->get_all();  
        $data['bouy_type'] = $this->bouy_type_model->get_all();  
        $data['light_bouy_inspection_purpose'] = $this->light_bouy_inspection_purpose_model->get_all();   
        $data['light_buoy_status'] = $this->light_buoy_status_model->get_all(); 
        $data['light_buoy__cause_if_not_operating'] = $this->light_buoy__cause_if_not_operating_model->get_all();  
        $data['maritime_casualty_nature'] = $this->maritime_casualty_nature_model->get_all();  
        $data['incident_cause'] = $this->marsaf_incident_cause_model->get_all();  
        $data['incident_consequences'] = $this->incident_consequences_model->get_all();  
        $data['very_serious_mc_category'] = $this->very_serious_mc_category_model->get_all();  
        $data['application_type'] = $this->application_type_model->get_all();   
        $data['salvage_operation_purpose'] = $this->salvage_operation_purpose_model->get_all(); 
        $data['maritime_acitivity'] = $this->maritime_acitivity_model->get_all();   
        $data['maritime_related_violation'] = $this->maritime_related_violation_model->get_all();   
        
        $data['marsaf'] = $this->marsaf_model->findMarsaf($id); 
        $data['marsaf_id'] = $id; 
        $report_type = $data['marsaf']->report_type_id;
        
        switch($report_type){
            case 1: 

                $data['marsaf_pdi'] = $this->marsaf_pdi_model->find($id);
                $data['marsaf_pdi_data'] = $this->marsaf_pdi_data_model->find($id);
                break;
            case 2: 
                $data['marsaf_vsei'] = $this->marsaf_vsei_model->find($id);
                $data['marsaf_vsei_data'] = $this->marsaf_vsei_data_model->find($id);
                break; 
            case 3: 
                $data['marsaf_ere'] = $this->marsaf_ere_model->find($id);
                $data['marsaf_ere_data'] = $this->marsaf_ere_data_model->find($id);
                break;
            case 4: 
                $data['marsaf_psc'] = $this->marsaf_psc_model->find($id);
                $data['marsaf_psc_data'] = $this->marsaf_psc_data_model->find($id);
                break;
            case 5: 
                $data['marsaf_cabrsasi'] = $this->marsaf_cabrsasi_model->find($id);
                $data['marsaf_cabrsasi_data'] = $this->marsaf_cabrsasi_data_model->find($id);
                break;
            case 6: 
                $data['marsaf_rsei'] = $this->marsaf_rsei_model->find($id);
                $data['marsaf_rsei_data'] = $this->marsaf_rsei_data_model->find($id);
                break;
            case 7: 
                $data['marsaf_aton'] = $this->marsaf_aton_model->find($id);
                break;
            case 8: 
                $data['marsaf_mci'] = $this->marsaf_mci_model->find($id);
                break;
            case 9: 
                $data['marsaf_so'] = $this->marsaf_so_model->find($id);
                break;
            case 10: 
                $data['marsaf_mpramra'] = $this->marsaf_mpramra_model->find($id);
                break;
        }
        $this->base->load('admin', 'marsaf/view_marsaf', $data);
    }

    public function delete($id){

        $delete = $this->marsaf_model->delete($id);

        if ($delete) {
            $this->session->set_flashdata('errors', 'Data has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect($_SERVER['HTTP_REFERER'],'refresh');
    }
    
}
         
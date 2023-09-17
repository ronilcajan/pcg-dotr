<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( !$this->session->userdata('user_id') ) { 
            redirect('login'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Dashboard"; 
        $data['station'] = $this->station_model->get_all();
        $data['sub_station'] = $this->substation_model->get_all();
        $data['marep_tot_entry'] = $this->marep_model->tot_entry();
        $data['marsaf_tot_entry'] = $this->marsaf_model->tot_entry();
        $data['marsar_tot_entry'] = $this->marsar_model->tot_entry();
        $data['marslec_tot_entry'] = $this->marslec_model->tot_entry();
        $data['urban_marsar_tot_entry'] = $this->urban_marsar_model->tot_entry();  
        $data['user_no'] = $this->user_model->user_no();  
        $this->base->load('admin', 'admin/dashboard', $data); 
	}
 
    public function forecast()
	{ 
        $data['page_title'] = "Forecast"; 
        $this->base->load('admin', 'forecast', $data);
	}

    public function report_status(){
        $validator = array('marep' => array(), 'marsaf' => array(), 'marsar' => array(), 'marslec' => array(), 'urban_marsar' => array());

		$validator['marep'] = $this->marep_model->tot_entry();
        $validator['marsaf'] = $this->marsaf_model->tot_entry();
        $validator['marsar'] = $this->marsar_model->tot_entry();
        $validator['marslec'] = $this->marslec_model->tot_entry();
        $validator['urban_marsar'] = $this->urban_marsar_model->tot_entry();  

		echo json_encode($validator);
    }
	
    public function signout()
    { 
        
        $all_sessions = $this->session->all_userdata();
        // unset all sessions
        foreach ($all_sessions as $key => $val) {
            $this->session->unset_userdata($key);
        } 
		redirect('login');
    } 
  
        
}
         
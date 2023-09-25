<?php 

class Marep_model extends CI_Model {

    protected $table_name = "marep"; 
    
    public function insert($data)
    {
        $this->db->insert($this->table_name,$data);
        return $this->db->affected_rows();
    } 
 
    public function update($data,$id)
    {
        $update = $this->db->update($this->table_name, $data, "id=".$id);
        if( !$update ){
            $errNo   = $this->db->_error_number();
            $errMess = $this->db->_error_message();
            return  $errNo .' '.  $errMess;
        }else{
            return $this->db->affected_rows();
        }
    }  

    public function getMarep(){

        $query =  $this->db->select('*, marep.id as id')
                ->join('station','station.station_id=marep.station','left')
                ->join('sub_station','sub_station.sub_station_id=marep.sub_station','left')
                ->join('report_selection','report_selection.report_selection_id=marep.report_type','left');
        
        if($this->session->userdata('role') == 'admin'){
            $query->where('station.station_id', $this->session->userdata('station_id'));
        }
        if($this->session->userdata('role') == 'manager'){
            $query->where('station.station_id', $this->session->userdata('station_id'))
                ->where('sub_station.sub_station_id', $this->session->userdata('sub_station_id'));
        }
        if($this->session->userdata('role') == 'staff'){
            $query->where('station.station_id', $this->session->userdata('station_id'))
                ->where('sub_station.sub_station_id', $this->session->userdata('sub_station_id'));
        }
        
        return $query->get($this->table_name)->result();

            
    }

    public function viewMarep($id){
        $query = $this->db
            ->select('*, marep.id as id')
            ->join('station','station.station_id=marep.station','left')
            ->join('sub_station','sub_station.sub_station_id=marep.sub_station','left')
            ->join('report_selection','report_selection.report_selection_id=marep.report_type','left')
            ->order_by('date_created','DESC')
            ->get($this->table_name);

            return $query->result();
    }

     
    public function get($id)
    { 
        $query = $this->db
            ->select('*, marep.id as id, marep.station as station, marep.sub_station as sub_station, station.station as s_station, sub_station.sub_station as ss_station')
            ->where('id', $id)
            ->where('marep.report_type = report_selection.report_selection_id')
            ->where('marep.station = station.station_id')
            ->where('marep.sub_station = sub_station.sub_station_id')
            ->get('marep, report_selection, station, sub_station');
 
        if($query->num_rows() > 0){
            return $query->result()[0];
        }
        return [];
    }

    public function tot_entry()
    {
        $query =  $this->db->join('station','station.station_id=marep.station')
                ->join('sub_station','sub_station.sub_station_id=marep.sub_station');

        if($this->session->userdata('role') != 'super-admin'){ 
            $query->where('station.station_id', $this->session->userdata('station_id'));
        }
        if($this->session->userdata('role') == 'manager'){
            $query->where('station.station_id', $this->session->userdata('station_id'))
            ->where('sub_station.sub_station_id', $this->session->userdata('sub_station_id'));
        }
        if($this->session->userdata('role') == 'staff'){
            $query->where('station.station_id', $this->session->userdata('station_id'))
            ->where('sub_station.sub_station_id', $this->session->userdata('sub_station_id'));
        }
        
        return $query->get($this->table_name)->num_rows();
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
        return $this->db->affected_rows();
    }
 
}
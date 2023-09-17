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

        $this->db->select('*, marep.id as id');
        $this->db->join('station','station.station_id=marep.station','left');
        $this->db->join('sub_station','sub_station.sub_station_id=marep.sub_station','left');
        $this->db->join('report_selection','report_selection.report_selection_id=marep.report_type','left');
        if($this->session->userdata('role') == 'admin'){
            $this->db->where('station.station_id', $this->session->userdata('station_id'));
        }
        if($this->session->userdata('role') == 'manager'){
            $this->db->where('station.station_id', $this->session->userdata('station_id'));
            $this->db->where('sub_station.sub_station_id', $this->session->userdata('sub_station_id'));
        }
        if($this->session->userdata('role') == 'staff'){
            $this->db->where('station.station_id', $this->session->userdata('station_id'));
            $this->db->where('sub_station.sub_station_id', $this->session->userdata('sub_station_id'));
        }
        $query = $this->db 
            ->get($this->table_name);

            return $query->result();
    }

    public function viewMarep($id){
        $query = $this->db
            ->select('*, marep.id as id')
            ->join('station','station.station_id=marep.station','left')
            ->join('sub_station','sub_station.sub_station_id=marep.sub_station','left')
            ->join('report_selection','report_selection.report_selection_id=marep.report_type','left')
            ->order_by('date_created','DESC')
            ->get('marep');

            return $query->result();
    }

     
    public function get($id)
    { 
        $query = $this->db
            ->where('id', $id)
            ->where('marep.report_type = report_selection.report_selection_id')
            ->get('marep, report_selection');
 
        if($query->num_rows() > 0){
            return $query->result()[0];
        }
        return [];
    }

    public function tot_entry()
    {
        $this->db->join('station','station.station_id=marep.station');
        $this->db->join('sub_station','sub_station.sub_station_id=marep.sub_station');
        if($this->session->userdata('role') != 'super-admin'){ 
            $this->db->where('station.station_id', $this->session->userdata('station_id'));
        }
        if($this->session->userdata('role') == 'manager'){
            $this->db->where('station.station_id', $this->session->userdata('station_id'));
            $this->db->where('sub_station.sub_station_id', $this->session->userdata('sub_station_id'));
        }
        if($this->session->userdata('role') == 'staff'){
            $this->db->where('station.station_id', $this->session->userdata('station_id'));
            $this->db->where('sub_station.sub_station_id', $this->session->userdata('sub_station_id'));
        }
        $query = $this->db 
            ->get($this->table_name);

        return $query->num_rows();
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
        return $this->db->affected_rows();
    }
 
}
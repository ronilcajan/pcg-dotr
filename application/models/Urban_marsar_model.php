<?php 

class Urban_marsar_model extends CI_Model {

    protected $table_name = "urban_marsar"; 
    public function insert($data)
    {
        $this->db->insert($this->table_name,$data);
        return $this->db->affected_rows();
    }  
    
    public function get_all()
    { 
        $query = $this->db 
            ->get('urban_marsar'); 
        if($query->num_rows() > 0){
            return $query->result();
        } 
        return [];
    }

    
    public function tot_entry()
    {
        $this->db->join('station','station.station_id=urban_marsar.station');
        $this->db->join('sub_station','sub_station.sub_station_id=urban_marsar.sub_station');
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

    
    public function getUrbanMarsar(){
        $this->db->select('*, urban_marsar.id as id');
        $this->db->join('station','station.station_id=urban_marsar.station','left');
        $this->db->join('sub_station','sub_station.sub_station_id=urban_marsar.sub_station','left');
        $this->db->join('urban_rescue_type','urban_rescue_type.id=urban_marsar.urban_rescue_type','left');
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

    public function findUrbanMarsar($id){
        $query = $this->db
            ->select('*, urban_marsar.id as id, urban_marsar.sub_station as sub_station, urban_marsar.urban_rescue_type as urban_rescue_type')
            ->join('station','station.station_id=urban_marsar.station','left')
            ->join('sub_station','sub_station.sub_station_id=urban_marsar.sub_station','left')
            ->join('urban_rescue_type','urban_rescue_type.id=urban_marsar.urban_rescue_type','left')
            ->where('urban_marsar.id', $id)
            ->get($this->table_name);  
            return $query->row();
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

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
        return $this->db->affected_rows();
    }
}
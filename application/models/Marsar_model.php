<?php 

class Marsar_model extends CI_Model {

    protected $table_name = "marsar"; 
    public function insert($data)
    {
        $this->db->insert($this->table_name,$data);
        return $this->db->affected_rows();
    }  
    public function tot_entry()
    {
        $this->db->join('station','station.station_id=marsar.station');
        if($this->session->userdata('role') != 'super-admin'){
            $this->db->where('station.station_id', $this->session->userdata('station_id'));
        }
        $query = $this->db 
            ->get($this->table_name);

        return $query->num_rows();
    } 

    public function getMarsar(){
        $query = $this->db
            ->select('*, marsar.id as id')
            ->join('station','station.station_id=marsar.station')
            ->join('sub_station','sub_station.sub_station_id=marsar.sub_station')
            ->join('maritime_incident_type','maritime_incident_type.id=marsar.maritime_incident_type')
            ->get('marsar'); 
            
            return $query->result();
    }
    public function findMarsar($id){
        $query = $this->db 
            ->select('*, marsar.id as id, marsar.station as station_id,marsar.sub_station as sub_station_id,marsar.maritime_incident_type as maritime_incident_type_id')
            ->join('station','station.station_id=marsar.station')
            ->join('sub_station','sub_station.sub_station_id=marsar.sub_station')
            ->join('maritime_incident_type','maritime_incident_type.id=marsar.maritime_incident_type')
            ->where('marsar.id', $id)
            ->get('marsar'); 
            
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
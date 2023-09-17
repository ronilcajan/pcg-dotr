<?php 

class Settings_model extends CI_Model {

    public function getStation()
    {
        if($this->session->userdata('role') != 'super-admin'){
            $this->db->where('station.station_id', $this->session->userdata('station_id'));
        }
        $query = $this->db
            ->get('station');
        return $query->row();
    }
    public function getSubstation()
    {
        $this->db->join('station', 'sub_station.station_id=station.station_id');
        $this->db->where('sub_station.sub_station_id', $this->session->userdata('sub_station_id'));
        $query = $this->db
            ->get('sub_station'); 
        return $query->row();
    }
    public function get_all_station()
    {
        $query = $this->db
            ->get('station');
        return $query->result();
    }
    public function getDistrict()
    {
        $this->db->where('id',1);
        $query = $this->db
            ->get('district');
        return $query->row();
    }
    public function getSystem()
    {
        $this->db->where('id',1);
        $query = $this->db
            ->get('system');
        return $query->row();
    }
    public function update_system($data){
        $this->db->update('system', $data, "id=1");
        return $this->db->affected_rows();
    }
    public function update_district($data){
        $this->db->update('district', $data, "id=1");
        return $this->db->affected_rows();
    }
    public function update_substation($data,$id){
        $this->db->update('sub_station', $data, "sub_station_id='$id'");
        return $this->db->affected_rows();
    }
    public function update_station($data,$id){
        $this->db->update('station', $data, "station_id='$id'");
        return $this->db->affected_rows();
    }
}
<?php 

class Marsaf_model extends CI_Model {

    protected $table_name = "marsaf"; 

    public function insert($data)
    {
        $this->db->insert($this->table_name,$data); 
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }
 
    public function tot_entry() 
    {
        $this->db->select('*, marsaf.id as id');
        $this->db->join('station','station.station_id=marsaf.station','left');
        $this->db->join('sub_station','sub_station.sub_station_id=marsaf.sub_station','left');
        $this->db->join('report_type','report_type.id=marsaf.report_type','left');
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

        return $query->num_rows();
    }

    
    public function getMarsaf(){

        $this->db->select('*, marsaf.id as id');
        $this->db->join('station','station.station_id=marsaf.station','left');
        $this->db->join('sub_station','sub_station.sub_station_id=marsaf.sub_station','left');
        $this->db->join('report_type','report_type.id=marsaf.report_type','left');
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
            ->order_by('marsaf.id', 'desc')
            ->get($this->table_name);

            return $query->result();
    }

    public function findMarsaf($id){

        $this->db->select('*, marsaf.id as id, report_type.id as report_type_id');
        $this->db->join('station','station.station_id=marsaf.station','left');
        $this->db->join('sub_station','sub_station.sub_station_id=marsaf.sub_station','left');
        $this->db->join('report_type','report_type.id=marsaf.report_type','left');
        $this->db->where('marsaf.id', $id);

        $query = $this->db 
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
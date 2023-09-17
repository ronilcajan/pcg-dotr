<?php 

class Marslec_model extends CI_Model {

    protected $table_name = "marslec"; 
    public function insert($data)
    {
        $this->db->insert($this->table_name,$data);
        return $this->db->affected_rows();
    }  
    
    public function get_all()
    { 
        $query = $this->db 
            ->get('marslec'); 
        if($query->num_rows() > 0){ 
            return $query->result();
        }
        return [];
    } 

    public function findMarslec($id){
        $query = $this->db
            ->select('*, marslec.id as id, marslec.station as station_id,marslec.marpol_violation as marpol_violation,marslec.sub_station as sub_station_id')
            ->join('station','station.station_id=marslec.station','left')
            ->join('sub_station','sub_station.sub_station_id=marslec.sub_station','left')
            ->join('marpol_violation','marpol_violation.id=marslec.marpol_violation','left')
            ->where('marslec.id', $id)
            ->get($this->table_name);
 
            return $query->row();
    }
    
    public function tot_entry()
    {
        $this->db->join('station','station.station_id=marslec.station');
        if($this->session->userdata('role') != 'super-admin'){
            $this->db->where('station.station_id', $this->session->userdata('station_id'));
        }
        $query = $this->db 
            ->get($this->table_name);

        return $query->num_rows();
    }

    
    public function getMarslec(){
        $this->db->select('*, marslec.id as id');
        $this->db->join('station','station.station_id=marslec.station','left');
        $this->db->join('sub_station','sub_station.sub_station_id=marslec.sub_station','left');
        $this->db->join('marpol_violation','marpol_violation.id=marslec.marpol_violation','left');

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
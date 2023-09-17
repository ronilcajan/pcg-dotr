<?php 

class Participating_agency_model extends CI_Model {

    protected $table_name = "participating_agency";

    public function get_all()
    {
        $this->db->order_by('id','ASC');
        $query = $this->db
            ->get($this->table_name);
        if($query->num_rows() > 0){
            return $query->result();
        }
        return [];
    }

    
    public function get($id)
    { 
        $query = $this->db
            ->where('id', $id) 
            ->get('participating_agency');
 
        if($query->num_rows() > 0){
            return $query->result()[0];
        }
        return [];
    }
}
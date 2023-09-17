<?php 

class Activity_conduct_model extends CI_Model {

    protected $table_name = "activity_conduct";

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
            ->get('activity_conduct');
 
        if($query->num_rows() > 0){
            return $query->result()[0];
        }
        return [];
    }
}
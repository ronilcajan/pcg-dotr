<?php 

class Mep_violation_marpol_equipment_model extends CI_Model {

    protected $table_name = "mep_violation_marpol_equipment";

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
}
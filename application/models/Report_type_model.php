<?php 

class Report_type_model extends CI_Model {

    protected $table_name = "report_type";

    public function get_all()
    {
        $this->db->order_by('id','ASC');
        $query = $this->db
            ->get($this->table_name);
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }
}
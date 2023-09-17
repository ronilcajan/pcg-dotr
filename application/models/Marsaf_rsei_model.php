<?php 

class Marsaf_rsei_model extends CI_Model {

    protected $table_name = "marsaf_rsei";  
    
    public function insert($data)
    {
        $this->db->insert($this->table_name,$data);
        return $this->db->affected_rows();
    } 

    public function find($id)
    {
        $this->db->where('marsaf_report_type', $id);
        $query = $this->db 
            ->get($this->table_name);

            return $query->row();
    } 

}
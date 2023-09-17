<?php 

class Marsaf_cabrsasi_model extends CI_Model {

    protected $table_name = "marsaf_cabrsasi"; 

    public function insert($data)
    {
        $this->db->insert($this->table_name,$data); 
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }

    public function find($id)
    {
        $this->db->where('marsaf_report_type', $id);
        $query = $this->db 
            ->get($this->table_name);

            return $query->row();
    } 

} 
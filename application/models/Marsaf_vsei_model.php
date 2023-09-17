<?php 

class Marsaf_vsei_model extends CI_Model {

    protected $table_name = "marsaf_vsei"; 

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

    public function update($data,$id)
    {
        $update = $this->db->update($this->table_name, $data, "marsaf_report_type=".$id);
        if( !$update ){
            $errNo   = $this->db->_error_number();
            $errMess = $this->db->_error_message();
            return  $errNo .' '.  $errMess;
        }else{
            return $this->db->affected_rows(); 
        }
    } 

} 
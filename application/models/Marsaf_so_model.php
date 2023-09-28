<?php 

class Marsaf_so_model extends CI_Model {

    protected $table_name = "marsaf_so";  
    
    public function insert($data)
    {
        $this->db->insert($this->table_name,$data);
        return $this->db->affected_rows();
    } 

    public function find($id)
    {
        $this->db->where('marsaf_id', $id);
        $query = $this->db 
            ->get($this->table_name);

            return $query->row();
    } 

    public function update($data,$id)
    {
        $update = $this->db->update($this->table_name, $data, "marsaf_id=".$id);
        if( !$update ){
            $errNo   = $this->db->_error_number();
            $errMess = $this->db->_error_message();
            return  $errNo .' '.  $errMess;
        }else{
            return $this->db->affected_rows(); 
        }
 
    }
}
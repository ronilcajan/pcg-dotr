<?php 

class Marsaf_rsei_data_model extends CI_Model {

    protected $table_name = "marsaf_rsei_data";  
    
    public function insert($data)
    {
        $this->db->insert($this->table_name,$data);
        return $this->db->affected_rows();
    } 

    public function find($id)
    {
        $this->db->where('marsaf_rsei', $id);
        $query = $this->db 
            ->get($this->table_name); 

            return $query->result();
    } 

    
    public function update($data)
    {
        $update = $this->db->insert($this->table_name, $data);
        if( !$update ){
            $errNo   = $this->db->_error_number();
            $errMess = $this->db->_error_message();
            return  $errNo .' '.  $errMess; 
        }else{
            return $this->db->affected_rows();
        } 
    } 

    public function delete($id){
        $this->db->where('marsaf_rsei', $id);
        $this->db->delete($this->table_name);
        return $this->db->affected_rows();
    }

}
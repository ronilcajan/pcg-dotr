<?php 

class Marsaf_psc_data_model extends CI_Model {

    protected $table_name = "marsaf_psc_data";  
    
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

    public function delete($id){
        $this->db->where('marsaf_id', $id);
        $this->db->delete($this->table_name);
        return $this->db->affected_rows();
    }
}  
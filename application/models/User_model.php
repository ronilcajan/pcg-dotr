<?php 

class User_model extends CI_Model {

    protected $table_name = "user";

    /**
     * Check User Login in Database
     * @param: {array} userData
     */
    public function check_login($userData) {

        /**
         * First Check username and Password is Exists in Database
         */
        $this->db->select('*, station.station_id as station_id, sub_station.sub_station_id as sub_station_id');
        $this->db->join('station', 'station.station_id=user.station', 'LEFT');
        $this->db->join('sub_station', 'sub_station.sub_station_id=user.sub_station', 'LEFT');
        $this->db->join('user_role', 'user_role.user_role_id=user.role');
        $query = $this->db->get_where($this->table_name, array('username' => $userData['username'], 'password' => md5($userData['password'])));
        
        if ($this->db->affected_rows() > 0) {  

			/**
			 * Password and Username Valid
			 */
			return [
				'status' => TRUE,
				'data' => $query->row(),
			]; 

        } else {
            return ['status' => FALSE,'data' => FALSE];
        } 
    }

    public function save_user($data)
    {
        $this->db->insert($this->table_name,$data);
        return $this->db->affected_rows();
    } 

    public function get_all()
    {
        $this->db->select('*,user.user_id as id, station.station_id as station_id,sub_station.sub_station_id as sub_station_id,');
        $this->db->join('station','station.station_id=user.station','LEFT');
        $this->db->join('sub_station','sub_station.sub_station_id=user.sub_station','LEFT');
        $this->db->order_by('user_id','ASC');
        if($this->session->userdata('role') == 'admin'){
            $this->db->where('station.station_id', $this->session->userdata('station_id'));
        }
        if($this->session->userdata('role') == 'manager'){
            $this->db->where('station.station_id', $this->session->userdata('station_id'));
            $this->db->where('sub_station.sub_station_id', $this->session->userdata('sub_station_id'));
        }
        if($this->session->userdata('role') == 'staff'){
            $this->db->where('station.station_id', $this->session->userdata('station_id'));
            $this->db->where('sub_station.sub_station_id', $this->session->userdata('sub_station_id'));
        }
        $query = $this->db->get($this->table_name);
        if($query->num_rows() > 0){
            return $query->result();
        }
        return [];
    }
    

    public function update_user($data,$id){
        $this->db->update($this->table_name,$data, "user_id='$id'");
        return $this->db->affected_rows();
    }
    
    public function delete_user($id){
        $this->db->where('user_id', $id);
        $this->db->delete($this->table_name);
        return $this->db->affected_rows();
    }

    public function user_no()
    {
        $this->db->select('*,user.user_id as id, station.station_id as station_id,sub_station.sub_station_id as sub_station_id,');
        $this->db->join('station','station.station_id=user.station','LEFT');
        $this->db->join('sub_station','sub_station.sub_station_id=user.sub_station','LEFT');
        $this->db->order_by('user_id','ASC');
        if($this->session->userdata('role') == 'admin'){
            $this->db->where('station.station_id', $this->session->userdata('station_id'));
        }
        if($this->session->userdata('role') == 'manager'){
            $this->db->where('station.station_id', $this->session->userdata('station_id'));
            $this->db->where('sub_station.sub_station_id', $this->session->userdata('sub_station_id'));
        }
        if($this->session->userdata('role') == 'staff'){
            $this->db->where('station.station_id', $this->session->userdata('station_id'));
            $this->db->where('sub_station.sub_station_id', $this->session->userdata('sub_station_id'));
        }
        $query = $this->db 
            ->get($this->table_name);

        return $query->num_rows();
    }


}
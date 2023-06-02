<?php
 // write your name and student id here
class User_model extends CI_model
{
    public function ubah_data($id, $data){
        $this->db->where('id',$id);        
		$this->db->update('user', $data);	
    }

    public function getTrackData($id){
        $this->db->where('id_user',$id);
        $this->db->where('status !=', 'Pesanan anda telah selesai'); 
        $data = $this->db->get('pesanan');
        return $data->result_array();
    }

    public function getHistoryData($id){
        $this->db->where('id_user',$id);
        $this->db->where('status', 'Pesanan anda telah selesai'); 
        $data = $this->db->get('pesanan');
        return $data->result_array();
    }

    public function getAllUser(){
        $data = $this->db->get('user');
        return $data->result_array();
    }

    public function getUserData($username){
        $this->db->where('username',$username);

        $data = $this->db->get('user');
        return $data->result_array();
    }
    
    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('user');

        if ($query->num_rows() > 0) {
            $user = $query->row();

            if (password_verify($password, $user->password)) {
                return $user;
            }
        }

        return null;
    }

    function register($data)
    {
        $this->db->insert('user', $data);
    }

    public function is_username_exist($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('user');
    
        return $query->num_rows() > 0;
    }    

    public function update_profile($id, $datauser){
        $this->db->where('id',$id);        
		$this->db->update('user', $datauser);	
    }

}

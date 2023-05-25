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
}

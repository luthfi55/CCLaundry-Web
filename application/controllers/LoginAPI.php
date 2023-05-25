<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class LoginAPI extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();        
    }

    private function index_post(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['username' => $username])->row_array();

            if($user){
                
                    if(password_verify($password, $user['password'])) {
                        $data = [
                            'username' => $user['username'],
                        ];
                        $this->session->set_userdata($data);
                    } else {
                        $this->response(
                            array(
                                'status' => false,
                                'pesan' => 'Silahkan isi parameter ID Product'
                                ),
                                404
                            );                        
                    }
                
            } else {
                $this->response(
                    array(
                        'status' => false,
                        'pesan' => 'Silahkan isi parameter ID Product'
                        ),
                        404
                    );
            }
        }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class ApiCC extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('User_model');
    }

    function get_by_id_get()
    {
        $id = $this->get('id');
        if ($id){
            $list_product = $this->User_model->getTrackData($id);
            if ($list_product){
                $this->response(
                    array(
                        'status' => true,                        
                        'list_product' => $list_product,
                    ),
                    200
                );
            }
            else {
                $this->response(
                    array(
                    'status' => false,
                    'pesan' => 'Data product tidak ditemukan'
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

    function get_history_by_id_get()
    {
        $id = $this->get('id');
        if ($id){
            $list_product = $this->User_model->getHistoryData($id);
            if ($list_product){
                $this->response(
                    array(
                        'status' => true,                        
                        'list_product' => $list_product,
                    ),
                    200
                );
            }
            else {
                $this->response(
                    array(
                    'status' => false,
                    'pesan' => 'Data product tidak ditemukan'
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

    function get_user_by_id_get()
    {
        $username = $this->get('username');
        if ($username){
            $list_user = $this->User_model->getUserData($username);
            if ($list_user){
                $this->response(
                    array(
                        'status' => true,                        
                        'list_user' => $list_user,
                    ),
                    200
                );
            }
            else {
                $this->response(
                    array(
                    'status' => false,
                    'pesan' => 'User tidak ditemukan'
                    ),
                    404
                );
            }
        } else {
            $this->response(
                array(
                    'status' => false,
                    'pesan' => 'Silahkan isi username user'
                    ),
                    404
                );
        }
    }

    function index_post(){
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();        
        $id_user = $this->post('id_user', true);
        $alamat_pesanan = $this->post('alamat_pesanan', true);
        $paket_pakaian = $this->post('paket_laundry', true);
        $paket_sepatu = $this->post('paket_sepatu', true);
        $waktu_pakaian = 0;
        $waktu_sepatu = 0;

        if ($paket_pakaian == "Super Express") {
            $waktu_pakaian = 3;
        } elseif ($paket_pakaian == "Express") {
            $waktu_pakaian = 12;
        } elseif ($paket_pakaian == "Reguler"){
            $waktu_pakaian = 48;
        } elseif ($paket_pakaian == "none") {
            $waktu_pakaian = 1;
        }

        if ($paket_sepatu == "Super Express") {
            $waktu_sepatu = 12;
        } elseif ($paket_sepatu == "Express") {
            $waktu_sepatu = 24;
        } elseif ($paket_sepatu == "Reguler") {
            $waktu_sepatu = 72;
        } elseif ($paket_sepatu == "none") {
            $waktu_sepatu = 1;
        }

        if ($waktu_pakaian > $waktu_sepatu) {
            $estimasi = $waktu_pakaian;
        } else {
            $estimasi = $waktu_sepatu;
        }

        $today = date('d-m-Y h:i:s');        
        $hasil_estimasi = date('d-m-Y h:i:s', strtotime('+'.$estimasi. 'hours', strtotime($today)));

        $data = array (            
            "id_user" => $id_user,
			"paket_laundry" => $this->post('paket_laundry', true),
			"berat_laundry" => 0,
			"paket_sepatu" => $this->post('paket_sepatu', true),
			"banyak_sepatu" => 0,
            "alamat_pesanan" => $alamat_pesanan,
			"status" => "Pesanan diterima",            
            "estimasi" => $hasil_estimasi,
            "total_harga" => 0
		); 

		$this->db->insert('pesanan',$data); 
        $this->response(
            array(
                'status' => true,                        
                'pesan' => 'Data berhasil terkirim',
            ),
            200
        );
    }
    
    function login_post()
    {
        $username = $this->post('username');
        $password = $this->post('password');

        // Cek apakah username dan password telah diisi
        if ($username && $password) {
            // Panggil model User_model untuk melakukan validasi login
            $user = $this->User_model->login($username, $password);

            // Cek apakah login berhasil
            if ($user) {
                $this->response(
                    array(
                        'status' => true,
                        'pesan' => 'Login berhasil',
                        'user' => $user
                    ),
                    200
                );
            } else {
                $this->response(
                    array(
                        'status' => false,
                        'pesan' => 'Username atau password salah'
                    ),
                    401
                );
            }
        } else {
            $this->response(
                array(
                    'status' => false,
                    'pesan' => 'Silakan isi username dan password'
                ),
                400
            );
        }
    }

    function register_post()
    {
        $nama = $this->post('nama');
        $username = $this->post('username');
        $jenis_kelamin = $this->post('jenis_kelamin');
        $alamat = $this->post('alamat');
        $email = $this->post('email');
        $no_telp = $this->post('no_telp');
        $password = password_hash($this->post('password'),PASSWORD_DEFAULT);

        // cek apakah username sudah ada
        if ($this->User_model->is_username_exist($username)) {
            $this->response(
                array(
                    'status' => false,                        
                    'pesan' => 'Username sudah digunakan. Silahkan gunakan username lain.',
                ),
                409
            );
            return;
        }

        $datauser = array(
            'nama' => $nama,
            'username' => $username,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat' => $alamat,
            'email' => $email,
            'no_telp' => $no_telp,
            'password' => $password,
            'is_active' => 1,
            'date_created' => time()
        );

        $this->User_model->register($datauser);

        $this->response(
            array(
                'status' => true,                        
                'pesan' => 'Akun berhasil dibuat',
            ),
            200
        );        
    }

    function update_put()
    {   
        $id = $this->put('id');
        $nama = $this->put('nama');
        $username = $this->put('username');
        $jenis_kelamin = $this->put('jenis_kelamin');
        $alamat = $this->put('alamat');
        $email = $this->put('email');
        $no_telp = $this->put('no_telp');
        $password = password_hash($this->put('password'),PASSWORD_DEFAULT);

        $datauser = array(      
            'id' => $id,
            'nama' => $nama,
            'username' => $username,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat' => $alamat,
            'email' => $email,
            'no_telp' => $no_telp,
            'password' => $password,
            'is_active' => 1,
            'date_created' => time()
        );

        $this->User_model->ubah_data($id, $datauser);

        $this->response(
            array(
                'isi data' => $datauser,
                'status' => true,                        
                'pesan' => 'Akun berhasil diperbarui',
            ),
            200
        );        
    }


    
}

    // function index_post()
    // {
    //     $id_user = $this->post('id_user');
    //     $paket_laundry = $this->post('paket_laundry');
    //     $berat_laundry = $this->post('berat_laundry');
    //     $paket_sepatu = $this->post('paket_sepatu');
    //     $banyak_sepatu = $this->post('banyak_sepatu');
    //     $alamat_pesanan = $this->post('alamat_pesanan');
    //     $status = $this->post('status');
    //     $estimasi = $this->post('banyak_sepatu');
    //     $total_harga = $this->post('total_harga');

    //     $data = array(
    //         'id_user' => $id_user,
    //         'paket_laundry' => $paket_laundry,
    //         'berat_laundry' => 0,
    //         'paket_sepatu' => $paket_sepatu,
    //         'banyak_sepatu' => 0,
    //         'alamat_pesanan' => $alamat_pesanan,
    //         'status' => $status,
    //         'estimasi' => $estimasi,
    //         'total_harga' => $total_harga,
            
    //     );
    //     $this->db->insert('pesanan',$data);
        // $this->response(
        //     array(
        //         'status' => true,                        
        //         'pesan' => 'Data berhasil terkirim',
        //     ),
        //     200
    //     );        
    // }

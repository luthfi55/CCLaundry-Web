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

    function index_get()
    {
        $list_user = $this->User_model->getAllUser();
        if ($list_user) {
            $jumlah_user = count ($list_user);
            $this->response(
                array(
                    'status' => true,
                    'jumlah' => $jumlah_user,
                    'list_user' => $list_user,
                ),
                200
            );
        } else {
            $this->response(
                array(
                'status' => false,
                'pesan' => 'Data user tidak ditemukan'
                ),
                404
            );
        }
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }
    public function index(){
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Kolom Username harus di isi!'
        ]);
        $this->form_validation->set_rules('password', 'Password');
        
        if ($this->form_validation->run() == false) {        
            $this->load->view('auth/admin-login');
        } else {
            $this->_login();    
        }
    }

    private function _login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['username' => $username])->row_array();

        if($admin){            
                if(password_verify($password, $admin['password'])) {
                    $data = [
                        'username' => $admin['username'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin/admin_page');
                } else {
                    $this->session->set_flashdata('message', 
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 18px;">
                        Password salah.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                    </div>');
                    redirect('admin');
                }
        } else {
                $this->session->set_flashdata('message', 
                '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 18px;">
                    Akun yang anda masukkan belum terdaftar.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>');
                redirect('admin');
            }        
    }

    public function admin_page(){
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        
        $this->load->view('admin/admin', $data);
    }

    public function edit_order(){
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->Admin_model->getOrderData($data);
        $data['query'] = $this->db->select('*')
                  ->from('pesanan')
                  ->join('user', 'user.id = pesanan.id_user')
                  ->where('status <>', 'Pesanan anda telah selesai')
                  ->get();   
        $data['status_terima'] = $this->db->select('*')
                  ->from('pesanan')
                  ->join('user', 'user.id = pesanan.id_user')
                  ->where('status', 'Pesanan diterima')
                  ->get();        
        $data['status_kurir_mengambil'] = $this->db->select('*')
                  ->from('pesanan')
                  ->join('user', 'user.id = pesanan.id_user')
                  ->where('status', 'Kurir telah mengambil pesanan anda')
                  ->get();                          
        $data['status_proses_cuci'] = $this->db->select('*')
                  ->from('pesanan')
                  ->join('user', 'user.id = pesanan.id_user')
                  ->where('status', 'Pesanan anda sedang dalam proses pencucian')
                  ->get();
        $data['status_selesai_cuci'] = $this->db->select('*')
                  ->from('pesanan')
                  ->join('user', 'user.id = pesanan.id_user')
                  ->where('status', 'Pesanan anda telah selesai dicuci')
                  ->get();
        $data['status_mengirim'] = $this->db->select('*')
                  ->from('pesanan')
                  ->join('user', 'user.id = pesanan.id_user')
                  ->where('status', 'Pesanan anda sedang dalam pengiriman')
                  ->get();

        $this->load->view('admin/admin-status', $data);
    }

    public function edit_status($id){
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();        
        $data['pesanan'] = $this->db->get_where('pesanan', ['id_pesanan' => $id])->row_array();

        $paket_pakaian = $data['pesanan']['paket_laundry'];
        $paket_sepatu = $data['pesanan']['paket_sepatu'];
        $berat = $this->input->post('berat_laundry', true);
        $banyak = $this->input->post('banyak_sepatu', true);

        if ($paket_pakaian == "Super Express") {
            $harga_pakaian = 15000;
        } elseif ($paket_pakaian == "Express") {
            $harga_pakaian = 10000;
        } elseif ($paket_pakaian == "Reguler"){
            $harga_pakaian = 5000;
        } elseif ($paket_pakaian == "none") {
            $harga_pakaian = 1;
        }

        if ($paket_sepatu == "Super Express") {
            $harga_sepatu = 15000;
        } elseif ($paket_sepatu == "Express") {
            $harga_sepatu = 10000;
        } elseif ($paket_sepatu == "Reguler") {
            $harga_sepatu = 5000;
        } elseif ($paket_sepatu == "none") {
            $harga_sepatu = 1;
        }

        $total_harga = ($berat * $harga_pakaian) + ($banyak * $harga_sepatu);   

        $data = array (            
			"id_user" => $data['pesanan']['id_user'],
			"paket_laundry" => $data['pesanan']['paket_laundry'],
			"berat_laundry" => $this->input->post('berat_laundry', true),
			"paket_sepatu" => $data['pesanan']['paket_sepatu'],
			"banyak_sepatu" => $this->input->post('banyak_sepatu', true),
            "alamat_pesanan" => $data['pesanan']['alamat_pesanan'],
			"status" => $this->input->post('status', true),   
            "estimasi" => $data['pesanan']['estimasi'],
            "total_harga" => $total_harga
		);

        
		$this->Admin_model->ubah_data($id,$data);
        redirect('admin/edit_order');
    }


    public function pesanan_selesai(){
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->Admin_model->getOrderData($data);
        $data['query'] = $this->db->select('*')
                  ->from('pesanan')
                  ->join('user', 'user.id = pesanan.id_user')
                  ->where('status', 'Pesanan anda telah selesai')
                  ->get();        

        $this->load->view('admin/admin-order', $data);
    }
    

    public function logout(){
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 18px;">
               Anda berhasil <strong> Logout</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
            redirect('admin');
    }

}

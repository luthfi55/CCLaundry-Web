<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/jakarta');
class User extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->helper('date');
    }
    public function index(){
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/user/header', $data);
        $this->load->view('user/index', $data);
    }

    public function order(){
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // $this->load->view('template/user/header', $data);
        $this->load->view('user/order', $data);
    }

    public function tambah_order(){
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $paket_pakaian = $this->input->post('paket_laundry', true);
        $paket_sepatu = $this->input->post('paket_sepatu', true);
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
            "id_user" => $data['user']['id'],
			"paket_laundry" => $this->input->post('paket_laundry', true),
			"berat_laundry" => 0,
			"paket_sepatu" => $this->input->post('paket_sepatu', true),
			"banyak_sepatu" => 0,
            "alamat_pesanan" => $data['user']['alamat'],
			"status" => "Pesanan diterima",            
            "estimasi" => $hasil_estimasi,
            "total_harga" => 0
		); 

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success alert-dismissible fade show text-center" role="alert" style="font-size: 18px;">
            Pesanan berhasil dibuat, cek pesanan pada bagian <strong>Lacak Pesanan</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

		$this->db->insert('pesanan',$data);
        redirect('user/order');
    }

    public function ubah_alamat($id){
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data = array (            
			"nama" => $data['user']['nama'],
			"username" => $data['user']['username'],
			"jenis_kelamin" => $data['user']['jenis_kelamin'],
			"alamat" => $this->input->post('alamat_pesanan', true),
			"email" => $data['user']['email'],
            "no_telp" => $data['user']['no_telp'],
            "password" => $data['user']['password'],
            "is_active" => $data['user']['is_active'],
            "date_created" => $data['user']['date_created']
		);
        
		$this->User_model->ubah_data($id,$data);	
        	
		redirect('user/order');
    }

    public function track($id){
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();        
        $data['pesanan'] = $this->User_model->getTrackData($id, $data);

        
        $this->load->view('user/track-order', $data);
    }

    public function history($id){
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->User_model->getHistoryData($id, $data);

        
        $this->load->view('user/history-order', $data);
    }

    public function edit(){
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
   
        $this->load->view('user/edit-profile', $data);
    }

    public function ubah_profile($id){
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();        

        $data = array (            
			"nama" => $this->input->post('nama', true),
			"username" => $data['user']['username'],
			"jenis_kelamin" => $data['user']['jenis_kelamin'],
			"alamat" => $this->input->post('alamat_pesanan', true),
			"email" => $data['user']['email'],
            "no_telp" => $data['user']['no_telp'],
            "password" => $data['user']['password'],
            "is_active" => $data['user']['is_active'],
            "date_created" => $data['user']['date_created']
		);
        
		$this->User_model->ubah_data($id,$data);
        $this->session->set_flashdata('message', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 18px;">
                Akun anda berhasil di perbarui.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>');

        redirect('user/edit');
    }

    public function ubah_password($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Kolom Kata Sandi harus di isi!'
        ]);

        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]', [
            'required' => 'Kolom Ulang Kata Sandi harus di isi!',
            'matches' => 'Password tidak sama!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 18px;">
                Password gagal di ubah karena ulang kata sandi tidak sesuai dengan kata sandi baru.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
            );
            $this->load->view('user/edit-profile', $data);
        } else {
            $data = array(
                "nama" => $data['user']['nama'],
                "username" => $data['user']['username'],
                "jenis_kelamin" => $data['user']['jenis_kelamin'],
                "alamat" => $data['user']['alamat'],
                "email" => $data['user']['email'],
                "no_telp" => $data['user']['no_telp'],
                "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                "is_active" => $data['user']['is_active'],
                "date_created" => $data['user']['date_created']
            );

            $this->User_model->ubah_data($id, $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 18px;">
                Password anda berhasil di ubah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
            );

            redirect('user/edit');
        }
    }
}
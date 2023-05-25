<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index(){
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Kolom Username harus di isi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Kolom Password harus di isi!'
        ]);
        
        if ($this->form_validation->run() == false) {        
            $this->load->view('auth/login-v1');
        } else {
            $this->_login();    
        }
    }

    private function _login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if($user){
            
                if(password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', 
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 18px;">
                        Kata Sandi salah.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                    </div>');
                    redirect('auth');
                }
            
        } else {
            $this->session->set_flashdata('message', 
                '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 18px;">
                    Akun dengan username yang anda masukkan tidak terdaftar.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>');
                redirect('auth');
        }

    }

    public function register(){
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Kolom Nama harus di isi!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'required' => 'Kolom Username harus di isi!',
            'is_unique' => 'Username sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [        
            'required' => 'Kolom Email harus di isi!',
            'valid_email' => 'Masukkan Email dengan format yang benar!',
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('no_telp', 'No_telp', 'required', [
            'required' => 'Kolom Nomor Seluler harus di isi!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'Pilih Jenis Kelamin!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Kolom Alamat harus di isi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Kolom Kata Sandi harus di isi!'
        ]);
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]', [
            'required' => 'Kolom Ulang Kata Sandi harus di isi!',
            'matches' => 'Kata Sandi tidak sama!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'username' => $this->input->post('username', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'alamat' => $this->input->post('alamat', true),
                'email' => $this->input->post('email', true),
                'no_telp' => $this->input->post('no_telp'),
                'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 18px;">
                Akun anda berhasil di daftarkan, silahkan <strong> Login</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
            redirect('auth');
        }
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
            redirect('auth');
    }
}

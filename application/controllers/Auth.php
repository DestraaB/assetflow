<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load User_model yang baru saja kita buat
        $this->load->model('User_model');
    }

    public function index() {
        // Jika user sudah login, langsung arahkan ke dashboard sesuai role
        if ($this->session->userdata('logged_in')) {
            $this->redirect_based_on_role();
        }
        
        // Tampilkan halaman login
        $this->load->view('auth/login');
    }

    public function process() {
        // Aturan validasi form
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke halaman login
            $this->load->view('auth/login');
        } else {
            // Bersihkan inputan dari XSS
            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);

            // Cek email ke database
            $user = $this->User_model->get_user_by_email($email);

            if ($user) {
                // Verifikasi password (karena kita pakai bcrypt password_hash)
                if (password_verify($password, $user['password_hash'])) {
                    
                    // Jika cocok, buat Session
                    $session_data = [
                        'user_id'   => $user['id'],
                        'email'     => $user['email'],
                        'name'      => $user['name'],
                        'role'      => $user['role'],
                        'logged_in' => TRUE
                    ];
                    $this->session->set_userdata($session_data);
                    
                    // Arahkan ke dashboard
                    $this->redirect_based_on_role();
                } else {
                    // Password salah
                    $this->session->set_flashdata('error_msg', 'Password yang Anda masukkan salah!');
                    redirect('auth');
                }
            } else {
                // Email tidak ditemukan atau akun nonaktif
                $this->session->set_flashdata('error_msg', 'Email tidak terdaftar atau akun nonaktif!');
                redirect('auth');
            }
        }
    }

    private function redirect_based_on_role() {
        if ($this->session->userdata('role') == 'admin') {
            redirect('admin/dashboard');
        } else {
            redirect('employee/dashboard');
        }
    }

    public function logout() {
        // Hancurkan session dan kembali ke login
        $this->session->sess_destroy();
        redirect('auth');
    }
}
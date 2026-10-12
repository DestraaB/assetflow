<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // PROTEKSI: Cek apakah user sudah login dan rolenya adalah admin
        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error_msg', 'Anda tidak memiliki akses ke halaman Admin!');
            redirect('auth');
        }
    }

    // Jika user mengakses /admin, langsung arahkan ke dashboard
    public function index() {
        redirect('admin/dashboard');
    }

    public function dashboard() {
        $data['title'] = 'Dashboard Admin - AssetFlow';
        $data['user_name'] = $this->session->userdata('name');

        // Nanti kita akan memanggil model di sini untuk mengambil data jumlah aset asli dari database
        // Untuk sekarang, kita load view-nya dulu

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer');
    }
}
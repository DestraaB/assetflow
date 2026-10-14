<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_panel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Proteksi: Hanya boleh diakses oleh role 'employee'
        if ($this->session->userdata('role') !== 'employee') {
            $this->session->set_flashdata('error_msg', 'Anda tidak memiliki akses ke halaman Karyawan.');
            redirect('auth');
        }
        $this->load->model('Asset_model');
    }

    // Halaman Utama Karyawan (Katalog Aset)
    public function index() {
        $data['title'] = 'Katalog Aset - AssetFlow';
        $data['user_name'] = $this->session->userdata('name');
        
        // Ambil data barang yang tersedia dari database
        $data['assets'] = $this->Asset_model->get_available_assets();

        $this->load->view('employee/layout/header', $data);
        $this->load->view('employee/layout/navbar', $data); // Karyawan pakai Navbar atas, bukan Sidebar
        $this->load->view('employee/catalog', $data);
        $this->load->view('employee/layout/footer');
    }
}
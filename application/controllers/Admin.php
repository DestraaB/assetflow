<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // PROTEKSI
        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error_msg', 'Anda tidak memiliki akses ke halaman Admin!');
            redirect('auth');
        }
    }

    public function index() {
        redirect('admin/dashboard');
    }

    public function dashboard() {
        $data['title'] = 'Dashboard Admin - AssetFlow';
        $data['user_name'] = $this->session->userdata('name');

        // MENGHITUNG STATISTIK DARI DATABASE (Hanya yang tidak diarsipkan)
        
        // 1. Total Semua Aset
        $this->db->where('is_archived', 0);
        $data['total_asset'] = $this->db->count_all_results('assets');

        // 2. Aset Tersedia (available)
        $this->db->where('is_archived', 0);
        $this->db->where('operational_status', 'available');
        $data['asset_available'] = $this->db->count_all_results('assets');

        // 3. Aset Sedang Dipinjam (in_use)
        $this->db->where('is_archived', 0);
        $this->db->where('operational_status', 'in_use');
        $data['asset_borrowed'] = $this->db->count_all_results('assets');

        // 4. Aset Dalam Perbaikan (maintenance)
        $this->db->where('is_archived', 0);
        $this->db->where('operational_status', 'maintenance');
        $data['asset_maintenance'] = $this->db->count_all_results('assets');

        // Load View
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer');
    }
}
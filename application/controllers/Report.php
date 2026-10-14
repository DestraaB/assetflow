<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Proteksi
        if ($this->session->userdata('role') !== 'admin') {
            redirect('auth');
        }
        // Kita butuh Asset_model untuk mengambil data aset
        $this->load->model('Asset_model');
    }

    // Halaman Menu Laporan
    public function index() {
        $data['title'] = 'Laporan & Analitik - AssetFlow';
        $data['user_name'] = $this->session->userdata('name');

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/report/index', $data);
        $this->load->view('admin/layout/footer');
    }

    // Fungsi khusus untuk mencetak halaman
    public function print_assets() {
        $data['title']  = 'Laporan Daftar Aset';
        $data['assets'] = $this->Asset_model->get_all(); // Ambil semua data aset

        // Perhatikan: Kita TIDAK me-load header, sidebar, atau footer di sini
        // Kita hanya me-load satu file khusus untuk dicetak
        $this->load->view('admin/report/print_assets', $data);
    }
}
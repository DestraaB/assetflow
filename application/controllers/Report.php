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

// Halaman Menu Laporan & Analitik
    public function index() {
        $data['title'] = 'Laporan & Analitik - AssetFlow';
        $data['user_name'] = $this->session->userdata('name');

        // ANALITIK 1: Hitung jumlah aset berdasarkan KONDISI (Good, Fair, Damaged, Lost)
        $this->db->select('condition_status, COUNT(*) as total');
        $this->db->from('assets');
        $this->db->where('is_archived', 0);
        $this->db->group_by('condition_status');
        $data['condition_stats'] = $this->db->get()->result_array();

        // ANALITIK 2: Hitung Total Nilai Investasi (Total Harga Beli seluruh aset)
        $this->db->select_sum('purchase_price');
        $this->db->where('is_archived', 0);
        $result = $this->db->get('assets')->row_array();
        $data['total_investment'] = $result['purchase_price'] ? $result['purchase_price'] : 0;

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
    // Fungsi khusus untuk mencetak Laporan Peminjaman
    public function print_borrowings() {
        // Load model transaksi peminjaman
        $this->load->model('Borrowing_model');
        
        $data['title']  = 'Laporan Transaksi Peminjaman';
        $data['transactions'] = $this->Borrowing_model->get_all_transactions();

        // Load halaman cetak (tanpa header/sidebar)
        $this->load->view('admin/report/print_borrowings', $data);
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrowing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Hanya yang sudah login yang bisa meminjam
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        $this->load->model('Borrowing_model');
        $this->load->model('Asset_model');
    }

    // Menampilkan Form Pengajuan (diarahkan dari tombol di Katalog)
    public function request($asset_id) {
        // Hanya karyawan yang boleh mengajukan dari panel ini
        if ($this->session->userdata('role') !== 'employee') {
            redirect('admin/dashboard');
        }

        $data['title'] = 'Ajukan Peminjaman - AssetFlow';
        $data['user_name'] = $this->session->userdata('name');
        
        // Ambil data aset yang mau dipinjam
        $data['asset'] = $this->Asset_model->get_by_id($asset_id);

        // Keamanan: Cegah meminjam barang yang tidak available atau rusak
        if (!$data['asset'] || $data['asset']['operational_status'] != 'available') {
            $this->session->set_flashdata('error_msg', 'Maaf, aset ini sedang tidak tersedia untuk dipinjam.');
            redirect('user_panel');
        }

        $this->load->view('employee/layout/header', $data);
        $this->load->view('employee/layout/navbar', $data);
        $this->load->view('employee/borrowing_form', $data);
        $this->load->view('employee/layout/footer');
    }

    // Memproses data form pengajuan ke database
    public function submit_request() {
        $user_id  = $this->session->userdata('user_id');
        $asset_id = $this->input->post('asset_id', TRUE);

        // Keamanan 1: Cegah Spam Request berulang untuk barang yang sama
        $cek_pending = $this->Borrowing_model->check_pending_request($user_id, $asset_id);
        if ($cek_pending > 0) {
            $this->session->set_flashdata('error_msg', 'Anda sudah mengajukan peminjaman untuk barang ini dan sedang diproses.');
            redirect('user_panel');
        }

        // Keamanan 2: Validasi Tanggal (End Date tidak boleh lebih kecil dari Start Date)
        $start_date = $this->input->post('requested_start_at', TRUE);
        $end_date   = $this->input->post('requested_end_at', TRUE);

        if (strtotime($end_date) <= strtotime($start_date)) {
            $this->session->set_flashdata('error_msg', 'Waktu pengembalian harus lebih akhir dari waktu peminjaman!');
            redirect('borrowing/request/'.$asset_id);
        }

        // Generate Kode Peminjaman (Contoh: BRW-20231014-XXXX)
        $borrowing_code = 'BRW-' . date('Ymd') . '-' . strtoupper(substr(md5(uniqid()), 0, 4));

        $data = [
            'borrowing_code'     => $borrowing_code,
            'asset_id'           => $asset_id,
            'user_id'            => $user_id,
            'requested_start_at' => $start_date,
            'requested_end_at'   => $end_date,
            'purpose'            => $this->input->post('purpose', TRUE),
            'status'             => 'pending'
        ];

        $this->Borrowing_model->insert($data);
        $this->session->set_flashdata('success_msg', 'Pengajuan berhasil dikirim! Silakan tunggu persetujuan Admin.');
        redirect('user_panel');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrowing_model extends CI_Model {

    // Fungsi untuk Karyawan: Mengajukan peminjaman baru
    public function insert($data) {
        return $this->db->insert('borrowings', $data);
    }

    // Fungsi untuk Karyawan: Melihat riwayat peminjamannya sendiri
    public function get_by_user($user_id) {
        $this->db->select('borrowings.*, assets.name as asset_name, assets.asset_code, assets.photo');
        $this->db->from('borrowings');
        $this->db->join('assets', 'borrowings.asset_id = assets.id');
        $this->db->where('borrowings.user_id', $user_id);
        $this->db->order_by('borrowings.id', 'DESC');
        return $this->db->get()->result_array();
    }
    
    // Cek apakah aset sedang diajukan oleh user ini dan statusnya masih pending
    public function check_pending_request($user_id, $asset_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('asset_id', $asset_id);
        $this->db->where_in('status', ['pending', 'approved', 'ready_for_handover']);
        return $this->db->get('borrowings')->num_rows();
    }
}
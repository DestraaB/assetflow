<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'admin') {
            redirect('auth');
        }
        $this->load->model('Asset_model');
        // Load model referensi untuk dropdown form
        $this->load->model('Category_model');
        $this->load->model('Location_model');
        $this->load->model('Department_model');
    }

    public function index() {
        $data['title'] = 'Data Master Aset - AssetFlow';
        $data['user_name'] = $this->session->userdata('name');
        
        $data['assets']      = $this->Asset_model->get_all();
        $data['categories']  = $this->Category_model->get_all();
        $data['locations']   = $this->Location_model->get_all();
        $data['departments'] = $this->Department_model->get_all();

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/asset/index', $data);
        $this->load->view('admin/layout/footer');
    }

    // FUNGSI UNTUK MENGURUS UPLOAD FOTO
    private function upload_photo() {
        $config['upload_path']   = './assets/img/assets/'; // Folder tempat simpan
        $config['allowed_types'] = 'jpg|jpeg|png';         // Format yang diizinkan
        $config['max_size']      = 2048;                   // Maksimal 2 MB
        $config['file_name']     = 'ASET-' . time();       // Nama unik (waktu saat ini)

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data('file_name');
        }
        
        return 'default_asset.png'; // Jika gagal upload / tidak ada foto
    }

    public function add() {
        // Cek apakah kode aset sudah ada
        $asset_code = $this->input->post('asset_code', TRUE);
        $cek = $this->db->get_where('assets', ['asset_code' => $asset_code])->num_rows();

        if ($cek > 0) {
            $this->session->set_flashdata('error_msg', 'Gagal! Kode Aset ('.$asset_code.') sudah digunakan.');
            redirect('asset');
        }

        // Proses foto jika ada
        $photo_name = 'default_asset.png';
        if (!empty($_FILES['photo']['name'])) {
            $photo_name = $this->upload_photo();
        }

        $data = [
            'asset_code'        => $asset_code,
            'name'              => $this->input->post('name', TRUE),
            'category_id'       => $this->input->post('category_id', TRUE),
            'location_id'       => empty($this->input->post('location_id')) ? NULL : $this->input->post('location_id', TRUE),
            'department_id'     => empty($this->input->post('department_id')) ? NULL : $this->input->post('department_id', TRUE),
            'brand'             => $this->input->post('brand', TRUE),
            'model'             => $this->input->post('model', TRUE),
            'serial_number'     => $this->input->post('serial_number', TRUE),
            'photo'             => $photo_name,
            'purchase_date'     => empty($this->input->post('purchase_date')) ? NULL : $this->input->post('purchase_date', TRUE),
            'purchase_price'    => empty($this->input->post('purchase_price')) ? 0 : $this->input->post('purchase_price', TRUE),
            'management_type'   => $this->input->post('management_type', TRUE),
            'condition_status'  => $this->input->post('condition_status', TRUE),
            'operational_status'=> 'available' // Aset baru selalu 'available' (Tersedia)
        ];

        $this->Asset_model->insert($data);
        $this->session->set_flashdata('success_msg', 'Data Aset berhasil ditambahkan!');
        redirect('asset');
    }

    public function edit() {
        $id = $this->input->post('id', TRUE);
        $asset_lama = $this->Asset_model->get_by_id($id);
        
        $photo_name = $asset_lama['photo'];
        
        // Jika user upload foto baru
        if (!empty($_FILES['photo']['name'])) {
            $photo_name = $this->upload_photo();
            
            // Hapus foto lama jika bukan default
            if ($asset_lama['photo'] != 'default_asset.png' && file_exists('./assets/img/assets/'.$asset_lama['photo'])) {
                unlink('./assets/img/assets/'.$asset_lama['photo']);
            }
        }

        $data = [
            'name'              => $this->input->post('name', TRUE),
            'category_id'       => $this->input->post('category_id', TRUE),
            'location_id'       => empty($this->input->post('location_id')) ? NULL : $this->input->post('location_id', TRUE),
            'department_id'     => empty($this->input->post('department_id')) ? NULL : $this->input->post('department_id', TRUE),
            'brand'             => $this->input->post('brand', TRUE),
            'model'             => $this->input->post('model', TRUE),
            'serial_number'     => $this->input->post('serial_number', TRUE),
            'photo'             => $photo_name,
            'purchase_date'     => empty($this->input->post('purchase_date')) ? NULL : $this->input->post('purchase_date', TRUE),
            'purchase_price'    => empty($this->input->post('purchase_price')) ? 0 : str_replace('.', '', $this->input->post('purchase_price', TRUE)),
            'management_type'   => $this->input->post('management_type', TRUE),
            'condition_status'  => $this->input->post('condition_status', TRUE)
        ];

        $this->Asset_model->update($id, $data);
        $this->session->set_flashdata('success_msg', 'Data Aset berhasil diperbarui!');
        redirect('asset');
    }

    // Mengarsipkan aset (Soft Delete), BUKAN hapus permanen dari database
    public function archive($id) {
        $data = ['is_archived' => 1, 'operational_status' => 'archived'];
        $this->Asset_model->update($id, $data);
        $this->session->set_flashdata('success_msg', 'Aset berhasil diarsipkan. (Tidak dihapus agar riwayat aman)');
        redirect('asset');
    }
}
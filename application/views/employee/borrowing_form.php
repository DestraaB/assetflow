<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <div class="d-flex align-items-center mb-4">
                <a href="<?= site_url('user_panel') ?>" class="btn btn-light text-secondary me-3 rounded-circle" style="width:40px; height:40px; display:flex; align-items:center; justify-content:center;">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h4 class="fw-bold mb-0">Form Pengajuan Peminjaman</h4>
            </div>

            <!-- Pesan Error Tanggal -->
            <?php if($this->session->flashdata('error_msg')): ?>
                <div class="alert alert-danger border-0 shadow-sm"><i class="fas fa-exclamation-triangle me-2"></i> <?= $this->session->flashdata('error_msg'); ?></div>
            <?php endif; ?>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="row g-0">
                    <!-- Sisi Kiri: Info Barang -->
                    <div class="col-md-5 bg-light p-4 d-flex flex-column align-items-center justify-content-center border-end">
                        <img src="<?= base_url('assets/img/assets/'.$asset['photo']) ?>" class="img-fluid rounded-3 shadow-sm mb-4" style="max-height: 200px; object-fit: contain;">
                        <h5 class="fw-bold text-center text-dark mb-1"><?= $asset['name']; ?></h5>
                        <p class="text-muted font-monospace small mb-3"><?= $asset['asset_code']; ?></p>
                        
                        <div class="w-100 text-start mt-2">
                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                <span class="text-secondary small">S/N:</span>
                                <span class="fw-medium text-dark"><?= $asset['serial_number'] ?: '-'; ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                <span class="text-secondary small">Merek/Model:</span>
                                <span class="fw-medium text-dark"><?= $asset['brand']; ?> <?= $asset['model']; ?></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-secondary small">Kondisi:</span>
                                <span class="badge bg-success bg-opacity-10 text-success px-2 py-1">Siap Pakai</span>
                            </div>
                        </div>
                    </div>

                    <!-- Sisi Kanan: Form Input -->
                    <div class="col-md-7 p-5">
                        <form action="<?= site_url('borrowing/submit_request') ?>" method="POST">
                            <input type="hidden" name="asset_id" value="<?= $asset['id']; ?>">
                            
                            <h6 class="fw-bold text-primary mb-4 border-bottom pb-2">Rencana Peminjaman</h6>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label text-secondary small fw-bold">Waktu Mulai Pinjam <span class="text-danger">*</span></label>
                                    <!-- min date diatur pakai PHP agar tidak bisa mundur ke hari kemarin -->
                                    <input type="datetime-local" class="form-control" name="requested_start_at" min="<?= date('Y-m-d\TH:i') ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-secondary small fw-bold">Rencana Pengembalian <span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control" name="requested_end_at" min="<?= date('Y-m-d\TH:i') ?>" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label text-secondary small fw-bold">Tujuan / Keperluan Pinjam <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="purpose" rows="3" placeholder="Misal: Untuk testing aplikasi iOS klien PT. ABC selama 3 hari..." required></textarea>
                            </div>

                            <div class="d-grid mt-5">
                                <button type="submit" class="btn btn-primary py-2 fw-medium">
                                    Kirim Pengajuan <i class="fas fa-paper-plane ms-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="container-fluid px-4">
    <div class="mb-4">
        <h4 class="fw-bold text-dark">Laporan & Analitik</h4>
        <p class="text-muted small">Ringkasan kondisi inventaris dan opsi cetak dokumen.</p>
    </div>

    <!-- BAGIAN 1: ANALITIK DATA (TAMPIL DI LAYAR) -->
    <div class="row g-4 mb-5">
        <!-- Analitik Total Investasi -->
        <div class="col-md-5">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-primary text-white overflow-hidden position-relative">
                <div class="card-body p-4 position-relative z-1">
                    <h6 class="text-white-50 fw-bold text-uppercase mb-2">Total Nilai Investasi Aset</h6>
                    <h2 class="fw-bold mb-3">Rp <?= number_format($total_investment, 0, ',', '.'); ?></h2>
                    <p class="small text-white-50 mb-0">Total harga beli seluruh aset yang tercatat dan aktif di sistem saat ini.</p>
                </div>
                <!-- Hiasan Icon Latar Belakang -->
                <i class="fas fa-coins position-absolute opacity-25" style="font-size: 8rem; right: -20px; bottom: -20px; z-index: 0;"></i>
            </div>
        </div>

        <!-- Analitik Kondisi Fisik -->
        <div class="col-md-7">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-dark mb-4 border-bottom pb-2">Status Kondisi Fisik Aset</h6>
                    <div class="row g-3">
                        <?php 
                            // Siapkan nilai default agar tidak error jika kosong
                            $kondisi = ['good' => 0, 'fair' => 0, 'damaged' => 0, 'lost' => 0];
                            foreach($condition_stats as $stat) {
                                $kondisi[$stat['condition_status']] = $stat['total'];
                            }
                        ?>
                        
                        <div class="col-6 col-md-3 text-center">
                            <div class="p-3 bg-success bg-opacity-10 rounded-3">
                                <h3 class="fw-bold text-success mb-0"><?= $kondisi['good']; ?></h3>
                                <span class="small text-muted fw-medium">Bagus</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 text-center">
                            <div class="p-3 bg-warning bg-opacity-10 rounded-3">
                                <h3 class="fw-bold text-warning mb-0"><?= $kondisi['fair']; ?></h3>
                                <span class="small text-muted fw-medium">Layak</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 text-center">
                            <div class="p-3 bg-danger bg-opacity-10 rounded-3">
                                <h3 class="fw-bold text-danger mb-0"><?= $kondisi['damaged']; ?></h3>
                                <span class="small text-muted fw-medium">Rusak</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 text-center">
                            <div class="p-3 bg-dark bg-opacity-10 rounded-3">
                                <h3 class="fw-bold text-dark mb-0"><?= $kondisi['lost']; ?></h3>
                                <span class="small text-muted fw-medium">Hilang</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BAGIAN 2: OPSI CETAK LAPORAN -->
    <h6 class="fw-bold text-dark mb-3 border-bottom pb-2">Cetak Dokumen Laporan</h6>
    <div class="row g-4">
        <!-- Kartu Laporan Seluruh Aset -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-3 h-100 border-start border-4 border-primary">
                <div class="card-body p-4 text-center">
                    <div class="mb-3">
                        <i class="fas fa-file-invoice text-primary bg-primary bg-opacity-10 p-3 rounded-circle fs-3"></i>
                    </div>
                    <h5 class="fw-bold">Laporan Daftar Aset</h5>
                    <p class="text-muted small mb-4">Cetak seluruh daftar aset perusahaan yang sedang aktif beserta kondisinya.</p>
                    
                    <a href="<?= site_url('report/print_assets') ?>" target="_blank" class="btn btn-primary w-100">
                        <i class="fas fa-print me-2"></i> Cetak Aset
                    </a>
                </div>
            </div>
        </div>

        <!-- Kartu Laporan Peminjaman -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-3 h-100 border-start border-4 border-warning">
                <div class="card-body p-4 text-center">
                    <div class="mb-3">
                        <i class="fas fa-file-signature text-warning bg-warning bg-opacity-10 p-3 rounded-circle fs-3"></i>
                    </div>
                    <h5 class="fw-bold">Laporan Transaksi</h5>
                    <p class="text-muted small mb-4">Cetak seluruh riwayat peminjaman aset oleh karyawan (Disetujui/Ditolak).</p>
                    
                    <a href="<?= site_url('report/print_borrowings') ?>" target="_blank" class="btn btn-warning w-100 fw-bold text-dark">
                        <i class="fas fa-print me-2"></i> Cetak Transaksi
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
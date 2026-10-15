<div class="container-fluid px-4">
    <div class="mb-4">
        <h4 class="fw-bold text-dark">Laporan & Analitik</h4>
        <p class="text-muted small">Pilih jenis laporan yang ingin Anda cetak atau ekspor.</p>
    </div>

    <div class="row g-4">
        <!-- Kartu Laporan Seluruh Aset -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-body p-4 text-center">
                    <div class="mb-3">
                        <i class="fas fa-file-invoice text-primary bg-primary bg-opacity-10 p-3 rounded-circle fs-3"></i>
                    </div>
                    <h5 class="fw-bold">Laporan Daftar Aset</h5>
                    <p class="text-muted small mb-4">Cetak seluruh daftar aset perusahaan yang sedang aktif dan tidak diarsipkan.</p>
                    
                    <a href="<?= site_url('report/print_assets') ?>" target="_blank" class="btn btn-primary w-100">
                        <i class="fas fa-print me-2"></i> Cetak Dokumen
                    </a>
                </div>
            </div>
        </div>

        <!-- Kartu (Disiapkan untuk Developer 2 nantinya) -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-body p-4 text-center">
                    <div class="mb-3">
                        <i class="fas fa-file-signature text-warning bg-warning bg-opacity-10 p-3 rounded-circle fs-3"></i>
                    </div>
                    <h5 class="fw-bold">Laporan Peminjaman</h5>
                    <p class="text-muted small mb-4">Melihat riwayat peminjaman aset oleh karyawan (Masih dalam pengembangan).</p>
                    
                    <a href="<?= site_url('report/print_borrowings') ?>" target="_blank" class="btn btn-warning w-100 fw-bold text-dark">
                        <i class="fas fa-print me-2"></i> Cetak Dokumen
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
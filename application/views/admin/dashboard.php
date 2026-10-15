<div class="container-fluid px-4">
    
    <!-- Header Dashboard -->
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">Dashboard Ikhtisar</h3>
            <p class="text-muted mb-0">Selamat datang kembali, <strong class="text-primary"><?= $user_name; ?></strong>! Berikut adalah ringkasan sistem hari ini.</p>
        </div>
        <div class="d-none d-md-block">
            <div class="bg-white border shadow-sm rounded-pill px-4 py-2 text-muted small fw-medium">
                <i class="fas fa-calendar-day text-primary me-2"></i> <?= date('d F Y'); ?>
            </div>
        </div>
    </div>

    <!-- 4 Kartu Statistik -->
    <div class="row g-4 mb-5">
        
        <!-- Total Aset -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden position-relative">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-muted small fw-bold text-uppercase">Total Inventaris</div>
                        <div class="bg-primary bg-opacity-10 text-primary p-2 rounded-3"><i class="fas fa-boxes"></i></div>
                    </div>
                    <h2 class="mb-0 fw-bold text-dark"><?= $total_asset; ?> <span class="fs-6 text-muted fw-normal">Barang</span></h2>
                </div>
                <div class="bg-primary bg-opacity-10 px-4 py-2 border-top border-primary border-opacity-10">
                    <a href="<?= site_url('asset') ?>" class="text-primary fw-bold text-decoration-none small d-flex justify-content-between align-items-center">
                        Kelola Aset <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Aset Tersedia -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden position-relative">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-muted small fw-bold text-uppercase">Tersedia / Bebas</div>
                        <div class="bg-success bg-opacity-10 text-success p-2 rounded-3"><i class="fas fa-check-circle"></i></div>
                    </div>
                    <h2 class="mb-0 fw-bold text-dark"><?= $asset_available; ?> <span class="fs-6 text-muted fw-normal">Barang</span></h2>
                </div>
                <div class="bg-success bg-opacity-10 px-4 py-2 border-top border-success border-opacity-10">
                    <a href="<?= site_url('asset') ?>" class="text-success fw-bold text-decoration-none small d-flex justify-content-between align-items-center">
                        Lihat Katalog <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Aset Dipinjam -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden position-relative">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-muted small fw-bold text-uppercase">Sedang Dipinjam</div>
                        <div class="bg-warning bg-opacity-10 text-warning p-2 rounded-3"><i class="fas fa-handshake"></i></div>
                    </div>
                    <h2 class="mb-0 fw-bold text-dark"><?= $asset_borrowed; ?> <span class="fs-6 text-muted fw-normal">Barang</span></h2>
                </div>
                <div class="bg-warning bg-opacity-10 px-4 py-2 border-top border-warning border-opacity-10">
                    <a href="<?= site_url('transaction') ?>" class="text-warning fw-bold text-decoration-none small d-flex justify-content-between align-items-center">
                        Cek Transaksi <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Aset Perbaikan -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden position-relative">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-muted small fw-bold text-uppercase">Dalam Perbaikan</div>
                        <div class="bg-danger bg-opacity-10 text-danger p-2 rounded-3"><i class="fas fa-tools"></i></div>
                    </div>
                    <h2 class="mb-0 fw-bold text-dark"><?= $asset_maintenance; ?> <span class="fs-6 text-muted fw-normal">Barang</span></h2>
                </div>
                <div class="bg-danger bg-opacity-10 px-4 py-2 border-top border-danger border-opacity-10">
                    <a href="<?= site_url('maintenance') ?>" class="text-danger fw-bold text-decoration-none small d-flex justify-content-between align-items-center">
                        Cek Servis <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Jalan Pintas (Quick Actions) -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-dark mb-4 border-bottom pb-2">Jalan Pintas (Quick Actions)</h6>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="<?= site_url('asset') ?>" class="btn btn-outline-primary px-4 py-2 rounded-pill shadow-sm">
                            <i class="fas fa-plus-circle me-2"></i> Tambah Aset Baru
                        </a>
                        <a href="<?= site_url('transaction') ?>" class="btn btn-outline-success px-4 py-2 rounded-pill shadow-sm">
                            <i class="fas fa-clipboard-check me-2"></i> Persetujuan Pinjam
                        </a>
                        <a href="<?= site_url('assignment') ?>" class="btn btn-outline-info px-4 py-2 rounded-pill shadow-sm">
                            <i class="fas fa-user-tag me-2"></i> Beri Penugasan
                        </a>
                        <a href="<?= site_url('report') ?>" class="btn btn-outline-secondary px-4 py-2 rounded-pill shadow-sm">
                            <i class="fas fa-print me-2"></i> Cetak Laporan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
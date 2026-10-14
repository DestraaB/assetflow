<div class="container my-5">
    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h3 class="fw-bold text-dark mb-1">Katalog Peminjaman</h3>
            <p class="text-muted">Pilih perangkat yang Anda butuhkan untuk mendukung pekerjaan Anda hari ini.</p>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Cari nama barang atau merek...">
        </div>
    </div>

    <!-- Alert jika sukses mengajukan (Nanti digunakan di modul peminjaman) -->
    <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success border-0 shadow-sm"><i class="fas fa-check-circle me-2"></i> <?= $this->session->flashdata('success_msg'); ?></div>
    <?php endif; ?>

    <div class="row g-4">
        <?php if(empty($assets)): ?>
            <div class="col-12 text-center py-5">
                <i class="fas fa-box-open fs-1 text-muted mb-3 opacity-50"></i>
                <h5 class="text-muted">Saat ini tidak ada barang yang tersedia untuk dipinjam.</h5>
            </div>
        <?php else: ?>
            <?php foreach($assets as $row): ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card asset-card shadow-sm h-100">
                        <!-- Foto Barang -->
                        <img src="<?= base_url('assets/img/assets/'.$row['photo']) ?>" class="asset-img" alt="<?= $row['name']; ?>">
                        
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 mb-2 px-2 py-1 align-self-start" style="font-size: 0.7rem;">
                                <?= $row['category_name']; ?>
                            </span>
                            <h6 class="card-title fw-bold text-dark mb-1"><?= $row['name']; ?></h6>
                            <p class="card-text text-muted small mb-3">S/N: <?= $row['serial_number'] ?: '-'; ?></p>
                            
                            <!-- Tombol ini nanti akan diarahkan ke form pengajuan -->
                                <a href="<?= site_url('borrowing/request/'.$row['id']) ?>" class="btn btn-outline-primary w-100 mt-auto fw-medium">
                                Ajukan Pinjaman
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
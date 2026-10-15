<div class="container my-5">
    <div class="mb-4">
        <h3 class="fw-bold text-dark mb-1">Riwayat Peminjamanku</h3>
        <p class="text-muted">Pantau status pengajuan dan barang yang sedang Anda pinjam.</p>
    </div>

    <!-- Alert Messages -->
    <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success border-0 shadow-sm"><i class="fas fa-check-circle me-2"></i> <?= $this->session->flashdata('success_msg'); ?></div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3" width="10%">Kode</th>
                            <th class="py-3" width="30%">Barang</th>
                            <th class="py-3">Waktu Pinjam</th>
                            <th class="py-3">Rencana Kembali</th>
                            <th class="py-3 text-center">Status</th>
                            <th class="py-3 text-center" width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($borrowings)): ?>
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="fas fa-history fs-1 text-muted mb-3 opacity-50"></i>
                                    <h5 class="text-muted">Belum ada riwayat peminjaman.</h5>
                                    <a href="<?= site_url('user_panel') ?>" class="btn btn-primary mt-2">Mulai Pinjam Barang</a>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($borrowings as $row): ?>
                                <tr>
                                    <td class="px-4 font-monospace text-secondary small fw-bold">
                                        <?= $row['borrowing_code']; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= base_url('assets/img/assets/'.$row['photo']) ?>" class="rounded shadow-sm me-3" width="45" height="45" style="object-fit: cover;">
                                            <div>
                                                <div class="fw-bold text-dark"><?= $row['asset_name']; ?></div>
                                                <div class="text-muted small">S/N: <?= $row['asset_code']; ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-dark fw-medium"><?= date('d M Y', strtotime($row['requested_start_at'])); ?></div>
                                        <div class="text-secondary small"><?= date('H:i', strtotime($row['requested_start_at'])); ?> WIB</div>
                                    </td>
                                    <td>
                                        <div class="text-dark fw-medium"><?= date('d M Y', strtotime($row['requested_end_at'])); ?></div>
                                        <div class="text-secondary small"><?= date('H:i', strtotime($row['requested_end_at'])); ?> WIB</div>
                                    </td>
                                    <td class="text-center">
                                        <?php 
                                            // Pengaturan warna dan teks badge berdasarkan status
                                            $badges = [
                                                'pending'            => ['Menunggu Persetujuan', 'warning'],
                                                'approved'           => ['Disetujui', 'info'],
                                                'ready_for_handover' => ['Siap Diambil', 'primary'],
                                                'in_use'             => ['Sedang Dipinjam', 'success'],
                                                'returned'           => ['Selesai/Dikembalikan', 'secondary'],
                                                'rejected'           => ['Ditolak', 'danger'],
                                                'canceled'           => ['Dibatalkan', 'dark']
                                            ];
                                            $st = $badges[$row['status']];
                                        ?>
                                        <span class="badge bg-<?= $st[1]; ?> bg-opacity-10 text-<?= $st[1]; ?> border border-<?= $st[1]; ?> border-opacity-25 px-2 py-1 rounded-pill">
                                            <?= $st[0]; ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <!-- Karyawan hanya bisa membatalkan jika statusnya masih pending -->
                                        <?php if($row['status'] == 'pending'): ?>
                                            <button class="btn btn-sm btn-outline-danger" title="Batalkan Pengajuan">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        <?php else: ?>
                                            <button class="btn btn-sm btn-light text-muted" title="Detail (Soon)" disabled>
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
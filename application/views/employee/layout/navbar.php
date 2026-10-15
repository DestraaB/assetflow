<!-- Top Navbar Karyawan -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm" style="background-color: #0f172a;">
        <div class="container">
            <!-- Logo / Brand -->
            <a class="navbar-brand fw-bold d-flex align-items-center" href="<?= site_url('user_panel') ?>">
                <i class="fas fa-cubes text-primary me-2"></i>
                Asset<span class="text-primary">Flow</span>
            </a>
            
            <!-- Tombol Hamburger (Khusus Layar HP) -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Menu Kiri -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(2) == '') ? 'active fw-bold text-white' : 'text-light opacity-75'; ?>" href="<?= site_url('user_panel') ?>">
                            <i class="fas fa-th-large me-1"></i> Katalog Aset
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(2) == 'history') ? 'active fw-bold text-white' : 'text-light opacity-75'; ?>" href="<?= site_url('user_panel/history') ?>">
                            <i class="fas fa-history me-1"></i> Riwayat Peminjaman
                        </a>
                    </li>
                </ul>
                
                <!-- Menu Kanan (Dropdown Profil) -->
                <div class="d-flex align-items-center mt-2 mt-lg-0">
                    <div class="dropdown">
                        <a class="text-decoration-none text-light fw-medium dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($user_name); ?>&background=2563eb&color=fff" class="rounded-circle me-2 border border-2 border-primary" width="35" height="35">
                            <?= $user_name; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3 rounded-3">
                            <li>
                                <div class="dropdown-header text-center pb-2 border-bottom">
                                    <h6 class="mb-0 fw-bold text-dark"><?= $user_name; ?></h6>
                                    <small class="text-muted">Karyawan</small>
                                </div>
                            </li>
                            <!-- Menu Profil (Bisa Anda abaikan dulu kalau belum ada halamannya) -->
                            <li><a class="dropdown-item py-2 mt-2" href="#"><i class="fas fa-user-cog me-2 text-secondary"></i> Profil Saya</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <!-- Tombol Logout yang berfungsi -->
                            <li><a class="dropdown-item text-danger py-2 fw-bold" href="<?= site_url('auth/logout') ?>"><i class="fas fa-sign-out-alt me-2"></i> Keluar (Logout)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
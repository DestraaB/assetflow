<!-- Page Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand-lg topbar mb-4">
                <div class="container-fluid">
                    <h5 class="mb-0 fw-bold text-dark">Welcome, <?= $user_name; ?></h5>
                    <div class="ms-auto d-flex align-items-center">
                        <!-- Profile Dropdown -->
                        <div class="dropdown">
                            <a class="text-decoration-none text-dark fw-medium dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <img src="https://ui-avatars.com/api/?name=<?= urlencode($user_name); ?>&background=2563eb&color=fff" alt="Profile" class="rounded-circle me-2" width="35">
                                Admin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm mt-2">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profil Saya</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="<?= site_url('auth/logout') ?>"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AssetFlow</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9; /* Abu-abu muda khas aplikasi SaaS */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            background-color: #ffffff;
        }
        .brand-logo {
            font-size: 1.75rem;
            font-weight: 700;
            color: #0f172a; /* Navy tua */
            text-align: center;
            margin-bottom: 0.5rem;
        }
        .brand-logo span {
            color: #2563eb; /* Biru interaktif */
        }
        .form-control {
            padding: 0.75rem 1rem;
            border-radius: 8px;
        }
        .btn-primary {
            background-color: #2563eb;
            border: none;
            padding: 0.75rem;
            border-radius: 8px;
            font-weight: 500;
        }
        .btn-primary:hover {
            background-color: #1d4ed8;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="brand-logo">Asset<span>Flow</span></div>
        <p class="text-center text-muted mb-4">Sistem Inventaris & Aset Kantor</p>

        <!-- Menampilkan pesan error jika login gagal -->
        <?php if($this->session->flashdata('error_msg')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('error_msg'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Menampilkan pesan error validasi form CI3 -->
        <?php if(validation_errors()): ?>
            <div class="alert alert-danger">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('auth/process') ?>" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label text-secondary small fw-bold">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@company.com" required value="<?= set_value('email'); ?>">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label text-secondary small fw-bold">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Masuk ke Sistem</button>
        </form>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
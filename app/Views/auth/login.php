<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Aplikasi - Ujian Online</title>
    
    <!-- Memanggil Bootstrap 5 CSS Lokal -->
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="width: 400px;">
        <h3 class="text-center mb-4 fw-bold text-primary">Login Aplikasi</h3>
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger py-2"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success py-2"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form action="/auth/loginProcess" method="post">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email terdaftar" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
            
            <div class="text-center">
                <p class="small mb-1">Belum punya akun? <a href="/register" class="text-decoration-none">Daftar di sini</a></p>
                <p class="small mb-0"><a href="/lupa-sandi" class="text-muted text-decoration-none">Lupa Sandi?</a></p>
            </div>
        </form>
    </div>

    <!-- Memanggil Bootstrap 5 JS Bundle Lokal -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
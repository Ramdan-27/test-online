<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Sandi - Ujian Online</title>
    <!-- Ganti link CDN lama dengan ini -->
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 400px;">
        <h3 class="text-center mb-3">Reset Sandi</h3>
        <p class="text-muted text-center small mb-4">Masukkan email akun kamu dan password baru.</p>
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger py-2"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="/lupa-sandi/proses" method="post">
            <div class="mb-3">
                <label class="form-label">Email Terdaftar</label>
                <input type="email" name="email" class="form-control" placeholder="Ketik email akun kamu" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password Baru</label>
                <input type="password" name="password_baru" class="form-control" placeholder="Ketik password baru" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2">Ubah Password</button>
            <div class="text-center mt-2">
                <a href="/login" class="text-decoration-none small">Kembali ke Login</a>
            </div>
        </form>
    </div>
    <!-- Tambahkan ini di bagian bawah sebelum tag </body> -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
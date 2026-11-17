<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Ujian Peserta</title>
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>
<body class="container mt-4">
    <!-- Navbar / Header Peserta -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded mb-4 px-3 shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="/ujian">Portal Ujian Online</a>
            <div class="d-flex align-items-center">
                <span class="text-light me-3">Halo, <strong><?= session()->get('nama'); ?></strong></span>
                <a href="/logout" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <h2 class="mb-4">Daftar Ujian Tersedia</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="row">
        <?php if(empty($jadwal)): ?>
            <div class="col-12">
                <div class="alert alert-warning">Belum ada jadwal ujian yang tersedia saat ini.</div>
            </div>
        <?php else: ?>
            <?php foreach ($jadwal as $j): ?>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= esc($j['nama_ujian']); ?></h5>
                        <p class="card-text text-muted mb-1">Materi: <?= esc($j['nama_materi']); ?></p>
                        <p class="card-text mb-3">Durasi: <strong><?= esc($j['durasi_menit']); ?> Menit</strong></p>
                        <a href="/ujian/kerjakan/<?= $j['id']; ?>" class="btn btn-primary mt-auto">Mulai Ujian</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
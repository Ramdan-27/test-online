<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Peserta - Ujian Online</title>
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>
<body class="container mt-4 mb-5">
    <!-- Navbar / Header Peserta -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded mb-4 px-3 shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="/dashboard-peserta">Portal Ujian Peserta</a>
            <div class="d-flex align-items-center">
                <span class="text-light me-3">Halo, <strong><?= session()->get('nama'); ?></strong></span>
                <a href="/logout" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="card shadow-sm mb-4">
        <div class="card-body bg-light">
            <h4>Selamat Datang, <?= session()->get('nama'); ?>!</h4>
            <p class="text-muted mb-0">Silakan pilih materi dan kerjakan ujian yang tersedia di bawah ini.</p>
        </div>
    </div>

    <!-- Filter Pilihan Materi -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="/dashboard-peserta" method="get" class="row g-3 align-items-center">
                <div class="col-auto">
                    <label class="col-form-label fw-bold">Filter Berdasarkan Materi:</label>
                </div>
                <div class="col-md-5">
                    <select name="materi_id" class="form-select">
                        <option value="">-- Semua Materi --</option>
                        <?php foreach($materi as $m): ?>
                            <option value="<?= $m['id']; ?>" <?= ($selected_materi == $m['id']) ? 'selected' : ''; ?>>
                                <?= esc($m['nama_materi']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                    <a href="/dashboard-peserta" class="btn btn-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <h3 class="mb-3">Daftar Ujian Tersedia</h3>

    <div class="row">
        <?php if(empty($jadwal)): ?>
            <div class="col-12">
                <div class="alert alert-warning">Tidak ada jadwal ujian untuk materi yang dipilih.</div>
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
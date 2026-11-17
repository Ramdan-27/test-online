<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pilih Tipe Soal - <?= esc($jadwal['nama_ujian']); ?></title>
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-5 text-center" style="max-width: 500px; width: 100%;">
        <h3 class="fw-bold mb-2"><?= esc($jadwal['nama_ujian']); ?></h3>
        <p class="text-muted mb-4">Silakan pilih jenis soal yang ingin kamu kerjakan terlebih dahulu:</p>
        
        <div class="d-grid gap-3">
            <a href="/ujian/kerjakan/<?= $jadwal['id']; ?>?tipe=pg" class="btn btn-primary py-3 fs-5 fw-semibold">
                📝 Kerjakan Pilihan Ganda
            </a>
            <a href="/ujian/kerjakan/<?= $jadwal['id']; ?>?tipe=esai" class="btn btn-success py-3 fs-5 fw-semibold">
                ✍️ Kerjakan Esai
            </a>
            <a href="/ujian/kerjakan/<?= $jadwal['id']; ?>?tipe=semua" class="btn btn-dark py-3 fs-5 fw-semibold">
                📚 Kerjakan Semua (Campuran)
            </a>
        </div>

        <div class="mt-4">
            <a href="/dashboard-peserta" class="text-decoration-none text-muted">&larr; Kembali ke Dashboard</a>
        </div>
    </div>

    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
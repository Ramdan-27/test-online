<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Bank Soal</title>
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>
<body class="container mt-4">
    <!-- Navbar Admin yang Konsisten -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded mb-4 px-3 shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="/materi">Admin Panel</a>
            <div class="navbar-nav ms-auto d-flex flex-row align-items-center">
                <a class="nav-link text-light px-2" href="/materi">Materi</a>
                <a class="nav-link text-white fw-bold px-2" href="/soal">Bank Soal</a>
                <a class="nav-link text-light px-2 me-3" href="/jadwal">Jadwal Ujian</a>
                <a href="/logout" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Bank Soal (Pilihan Ganda & Esai)</h2>
        <a href="/soal/create" class="btn btn-primary">+ Tambah Soal</a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Materi</th>
                        <th>Tipe</th>
                        <th>Pertanyaan</th>
                        <th>Kunci Jawaban</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($soal as $s): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= esc($s['nama_materi']); ?></td>
                        <td><span class="badge bg-secondary"><?= strtoupper($s['tipe_soal']); ?></span></td>
                        <td><?= esc(substr($s['pertanyaan'], 0, 50)); ?>...</td>
                        <td><strong><?= esc($s['kunci_jawaban']); ?></strong></td>
                        <td>
                            <a href="/soal/delete/<?= $s['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus soal ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
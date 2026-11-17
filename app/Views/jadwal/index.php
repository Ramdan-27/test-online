<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Jadwal Ujian</title>
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>
<body class="container mt-4">
    <!-- Navbar Admin yang Konsisten -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded mb-4 px-3 shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="/materi">Admin Panel</a>
            <div class="navbar-nav ms-auto d-flex flex-row align-items-center">
                <a class="nav-link text-light px-2" href="/materi">Materi</a>
                <a class="nav-link text-light px-2" href="/soal">Bank Soal</a>
                <a class="nav-link text-white fw-bold px-2 me-3" href="/jadwal">Jadwal Ujian</a>
                <a href="/logout" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Kelola Jadwal Ujian</h2>
        <a href="/jadwal/create" class="btn btn-primary">+ Tambah Jadwal Ujian</a>
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
                        <th>Nama Ujian</th>
                        <th>Materi</th>
                        <th>Durasi</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($jadwal as $j): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><strong><?= esc($j['nama_ujian']); ?></strong></td>
                        <td><?= esc($j['nama_materi']); ?></td>
                        <td><?= esc($j['durasi_menit']); ?> Menit</td>
                        <td><?= esc($j['tanggal_mulai']); ?></td>
                        <td><?= esc($j['tanggal_selesai']); ?></td>
                        <td>
                            <a href="/jadwal/delete/<?= $j['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">Hapus</a>
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
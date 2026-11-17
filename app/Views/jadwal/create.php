<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jadwal Ujian</title>
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>
<body class="container mt-5" style="max-width: 600px;">
    <div class="card shadow p-4">
        <h2 class="mb-4">Tambah Jadwal Ujian</h2>
        <form action="/jadwal/store" method="post">
            <div class="mb-3">
                <label class="form-label">Nama Ujian</label>
                <input type="text" name="nama_ujian" class="form-control" placeholder="Contoh: Ujian Akhir Modul 1" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Pilih Materi</label>
                <select name="materi_id" class="form-select" required>
                    <option value="">-- Pilih Materi --</option>
                    <?php foreach (($materi ?? []) as $m): ?>
                        <option value="<?= $m['id']; ?>"><?= esc($m['nama_materi']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Durasi (dalam Menit)</label>
                <input type="number" name="durasi_menit" class="form-control" placeholder="Contoh: 60" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal & Waktu Mulai</label>
                <input type="datetime-local" name="tanggal_mulai" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal & Waktu Selesai</label>
                <input type="datetime-local" name="tanggal_selesai" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Simpan Jadwal</button>
            <a href="/jadwal" class="btn btn-secondary w-100 mt-2">Kembali</a>
        </form>
    </div>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Materi</title>
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Tambah Materi Ujian</h2>
    <form action="/materi/store" method="post" class="mt-3">
        <div class="mb-3">
            <label class="form-label">Nama Materi</label>
            <input type="text" name="nama_materi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/materi" class="btn btn-secondary">Kembali</a>
    </form>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
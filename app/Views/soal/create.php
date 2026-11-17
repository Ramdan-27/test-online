<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Soal Ujian</title>
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>
<body class="container mt-5 mb-5" style="max-width: 700px;">
    <div class="card shadow p-4">
        <h2 class="mb-4">Tambah Soal Baru</h2>
        
        <form action="/soal/store" method="post">
            <div class="mb-3">
                <label class="form-label">Pilih Materi</label>
                <select name="materi_id" class="form-select" required>
                    <option value="">-- Pilih Materi --</option>
                    <?php foreach($materi as $m): ?>
                        <option value="<?= $m['id']; ?>"><?= esc($m['nama_materi']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tipe Soal</label>
                <select name="tipe_soal" id="tipe_soal" class="form-select" onchange="togglePilihan()" required>
                    <option value="pg">Pilihan Ganda</option>
                    <option value="esai">Esai</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Pertanyaan</label>
                <textarea name="pertanyaan" class="form-control" rows="3" placeholder="Tulis teks pertanyaan di sini..." required></textarea>
            </div>

            <!-- Bagian Pilihan Ganda (Hanya muncul jika tipe 'pg') -->
            <div id="box_pg">
                <div class="mb-3">
                    <label class="form-label">Pilihan A</label>
                    <input type="text" name="pilihan_a" class="form-control" placeholder="Opsi A">
                </div>
                <div class="mb-3">
                    <label class="form-label">Pilihan B</label>
                    <input type="text" name="pilihan_b" class="form-control" placeholder="Opsi B">
                </div>
                <div class="mb-3">
                    <label class="form-label">Pilihan C</label>
                    <input type="text" name="pilihan_c" class="form-control" placeholder="Opsi C">
                </div>
                <div class="mb-3">
                    <label class="form-label">Pilihan D</label>
                    <input type="text" name="pilihan_d" class="form-control" placeholder="Opsi D">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Kunci Jawaban</label>
                <input type="text" name="kunci_jawaban" class="form-control" placeholder="Contoh: A (untuk PG) atau uraian singkat (untuk Esai)" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Simpan Soal</button>
            <a href="/soal" class="btn btn-secondary w-100 mt-2">Kembali</a>
        </form>
    </div>

    <!-- JavaScript Sederhana untuk Mengatur Tampilan Pilihan Ganda / Esai -->
    <script>
        function togglePilihan() {
            let tipe = document.getElementById('tipe_soal').value;
            let boxPg = document.getElementById('box_pg');
            if (tipe === 'esai') {
                boxPg.style.display = 'none';
            } else {
                boxPg.style.display = 'block';
            }
        }
    </script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
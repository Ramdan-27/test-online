<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengerjaan Ujian - <?= esc($jadwal['nama_ujian']); ?></title>
    
    <!-- Memanggil Bootstrap 5 CSS Lokal -->
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>
<body class="container mt-4 mb-5" style="max-width: 800px;">
    
    <!-- Header Tunggal: Informasi Ujian, Kategori, Tombol Ganti, & Timer -->
    <div class="card shadow p-4 mb-4 bg-primary text-white d-flex flex-row justify-content-between align-items-center">
        <div>
            <h2 class="mb-1"><?= esc($jadwal['nama_ujian']); ?></h2>
            <p class="mb-2">Kategori Soal: <strong class="text-uppercase"><?= esc($tipe_pilihan); ?></strong></p>
            <a href="/ujian/kerjakan/<?= $jadwal['id']; ?>" class="btn btn-light btn-sm fw-semibold">Ganti Kategori</a>
        </div>
        <div class="text-end bg-dark bg-opacity-25 p-3 rounded">
            <span class="d-block small text-light opacity-75">Sisa Waktu Ujian</span>
            <h3 id="countdown" class="fw-bold mb-0 text-warning">--:--</h3>
        </div>
    </div>

    <!-- Form Pengerjaan Soal -->
    <form action="/ujian/submit" method="post">
        <input type="hidden" name="jadwal_id" value="<?= $jadwal['id']; ?>">

        <?php if(empty($soal)): ?>
            <div class="alert alert-warning text-center py-4">
                <h5>Tidak ada soal untuk kategori ini.</h5>
                <a href="/ujian/kerjakan/<?= $jadwal['id']; ?>" class="btn btn-secondary btn-sm mt-2">Pilih Kategori Lain</a>
            </div>
        <?php else: ?>
            
            <?php $no = 1; foreach ($soal as $s): ?>
            <div class="card shadow-sm mb-4 p-4 border-0">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge bg-secondary px-3 py-2">Soal No. <?= $no++; ?></span>
                    <span class="badge <?= ($s['tipe_soal'] == 'pg') ? 'bg-primary' : 'bg-success'; ?> px-3 py-2 text-uppercase">
                        <?= esc($s['tipe_soal']); ?>
                    </span>
                </div>
                
                <p class="fs-6 fw-medium text-dark mb-3"><?= nl2br(esc($s['pertanyaan'])); ?></p>

                <input type="hidden" name="soal_id[]" value="<?= $s['id']; ?>">
                <input type="hidden" name="tipe_soal[<?= $s['id']; ?>]" value="<?= $s['tipe_soal']; ?>">

                <?php if ($s['tipe_soal'] == 'pg'): ?>
                    <div class="form-check mb-2 ps-4">
                        <input class="form-check-input" type="radio" name="jawaban[<?= $s['id']; ?>]" value="A" id="pg_a_<?= $s['id']; ?>">
                        <label class="form-check-label" for="pg_a_<?= $s['id']; ?>">A. <?= esc($s['pilihan_a']); ?></label>
                    </div>
                    <div class="form-check mb-2 ps-4">
                        <input class="form-check-input" type="radio" name="jawaban[<?= $s['id']; ?>]" value="B" id="pg_b_<?= $s['id']; ?>">
                        <label class="form-check-label" for="pg_b_<?= $s['id']; ?>">B. <?= esc($s['pilihan_b']); ?></label>
                    </div>
                    <div class="form-check mb-2 ps-4">
                        <input class="form-check-input" type="radio" name="jawaban[<?= $s['id']; ?>]" value="C" id="pg_c_<?= $s['id']; ?>">
                        <label class="form-check-label" for="pg_c_<?= $s['id']; ?>">C. <?= esc($s['pilihan_c']); ?></label>
                    </div>
                    <div class="form-check mb-2 ps-4">
                        <input class="form-check-input" type="radio" name="jawaban[<?= $s['id']; ?>]" value="D" id="pg_d_<?= $s['id']; ?>">
                        <label class="form-check-label" for="pg_d_<?= $s['id']; ?>">D. <?= esc($s['pilihan_d']); ?></label>
                    </div>
                <?php else: ?>
                    <div class="mt-2">
                        <textarea class="form-control" name="jawaban[<?= $s['id']; ?>]" rows="4" placeholder="Tulis jawaban esai kamu di sini..."></textarea>
                    </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>

            <button type="submit" class="btn btn-success w-100 py-3 fs-5 fw-bold shadow-sm" onclick="return confirm('Apakah kamu yakin ingin mengirim jawaban ujian ini sekarang?')">
                Selesai & Kirim Jawaban
            </button>

        <?php endif; ?>
    </form>

    <!-- Script Countdown Timer -->
    <script>
        let durasiMenit = <?= isset($jadwal['durasi']) ? $jadwal['durasi'] : 60; ?>;
        let waktuTotal = durasiMenit * 60; // ubah ke detik

        const timerElement = document.getElementById('countdown');

        let countdownInterval = setInterval(function () {
            let menit = Math.floor(waktuTotal / 60);
            let detik = waktuTotal % 60;

            menit = menit < 10 ? '0' + menit : menit;
            detik = detik < 10 ? '0' + detik : detik;

            timerElement.textContent = menit + ":" + detik;

            if (waktuTotal <= 0) {
                clearInterval(countdownInterval);
                alert("Waktu ujian telah habis! Sistem akan mengirimkan jawaban Anda secara otomatis.");
                document.querySelector('form').submit();
            } else {
                waktuTotal--;
            }
        }, 1000);
    </script>

    <!-- Memanggil Bootstrap 5 JS Bundle Lokal -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
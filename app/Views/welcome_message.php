<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Tes Online - Persiapan Ujian</title>
    
    <!-- Memanggil Bootstrap 5 CSS Lokal -->
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }
        .navbar-custom {
            background-color: #ffffff;
            padding: 15px 0;
            border-bottom: 1px solid #eaeaea;
        }
        .hero-left {
            background-color: #f3f5f9;
            min-height: calc(100vh - 76px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 4rem 5rem;
        }
        .hero-right {
            background-color: #0b2447; /* Warna biru navy gelap seperti contoh */
            color: #ffffff;
            min-height: calc(100vh - 76px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 4rem;
        }
        .badge-promo {
            background-color: #e4eaf5;
            color: #4f75ff;
            font-weight: 700;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            padding: 8px 14px;
            border-radius: 50px;
            display: inline-block;
            width: fit-content;
        }
        .btn-primary-custom {
            background-color: #5b86e5;
            border-color: #5b86e5;
            font-weight: 600;
            padding: 12px 28px;
            border-radius: 8px;
        }
        .btn-primary-custom:hover {
            background-color: #4671d1;
        }
        .btn-outline-custom {
            background-color: #ffffff;
            color: #333333;
            border: 1px solid #dce1e9;
            font-weight: 600;
            padding: 12px 28px;
            border-radius: 8px;
        }
        .btn-outline-custom:hover {
            background-color: #f8f9fa;
        }
        .stat-card {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 20px 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
            max-width: 460px;
        }
        @media (max-width: 768px) {
            .hero-left {
                padding: 3rem 1.5rem;
                min-height: auto;
            }
            .hero-right {
                min-height: 300px;
                padding: 3rem 1.5rem;
            }
        }
    </style>
</head>
<body>

    <!-- 1. Navbar Atas -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3 text-primary" href="/">
                TES<span class="text-dark">ONLINE</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium" href="#materi">Materi Ujian</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="/login" class="btn btn-outline-custom py-2 px-4">LOG IN</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="btn btn-primary btn-primary-custom py-2 px-4">DAFTAR GRATIS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 2. Split Screen Hero Section -->
    <div class="container-fluid p-0">
        <div class="row g-0">
            
            <!-- Kolom Kiri: Konten Teks & Tombol -->
            <div class="col-lg-6 hero-left">
                <div class="badge-promo mb-3">
                    ● SISTEM EVALUASI & KOREKSI OTOMATIS
                </div>
                
                <h1 class="display-4 fw-bold text-dark mb-3" style="line-height: 1.2;">
                    Persiapan Ujian Online Lebih Terukur
                </h1>
                
                <p class="text-muted fs-5 mb-4" style="max-width: 500px;">
                    Daftar gratis sekarang dan mulai kerjakan latihan soal Pilihan Ganda maupun Esai lengkap dengan analisis evaluasi hasil belajar.
                </p>

                <!-- Dua Tombol Aksi Berdampingan -->
                <div class="d-flex flex-wrap gap-3 mb-5">
                    <a href="/register" class="btn btn-outline-custom shadow-sm">MULAI TES GRATIS</a>
                    <a href="/login" class="btn btn-primary btn-primary-custom shadow-sm">MASUK AKUN</a>
                </div>

                <!-- Kotak Statistik di Bawah -->
                <div class="stat-card d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1 small">Telah digunakan oleh</p>
                        <h6 class="fw-bold text-dark mb-0">Ratusan Peserta Ujian & Terus Bertambah!</h6>
                    </div>
                    <div class="text-success fs-2 fw-bold ms-3">
                        📈
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Banner Biru Gelap -->
            <div class="col-lg-6 hero-right">
                <h2 class="display-5 fw-bold mb-3">Siap Menguji Kemampuanmu?</h2>
                <p class="text-light opacity-75 fs-5" style="max-width: 420px;">
                    Pilih materi sesuai kebutuhanmu, kerjakan sesuai durasi, dan dapatkan rangkuman koreksi secara instan.
                </p>
            </div>

        </div>
    </div>

    <!-- Memanggil Bootstrap 5 JS Bundle Lokal -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIA Portal - Sistem Informasi Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        .hero-bg {
            background: radial-gradient(circle at 80% 20%, rgba(56, 189, 248, 0.25), transparent 40%),
                        linear-gradient(135deg, #0f172a 0%, #1e3a8a 60%, #2563eb 100%);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .feature-card { transition: transform 0.25s ease, box-shadow 0.25s ease; }
        .feature-card:hover { transform: translateY(-6px); box-shadow: 0 15px 30px rgba(15, 23, 42, 0.08) !important; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar Transparan -->
    <nav class="navbar navbar-expand-lg navbar-dark hero-bg border-bottom border-white border-opacity-10 py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4 d-flex align-items-center gap-2" href="{{ route('home') }}">
                <span class="bg-primary bg-gradient p-2 rounded-3 d-inline-flex"><i class="bi bi-cpu-fill text-white fs-5"></i></span>
                <span>SIA<span class="text-info">.Portal</span></span>
            </a>
            <div class="ms-auto d-flex gap-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-info text-dark fw-bold px-4 rounded-pill">
                        <i class="bi bi-speedometer2 me-1"></i> Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light px-4 rounded-pill fw-semibold">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-light text-primary px-4 rounded-pill fw-bold shadow-sm">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-bg text-white py-5 flex-grow-1 d-flex align-items-center">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="badge bg-info bg-opacity-25 text-info border border-info border-opacity-50 px-3 py-2 rounded-pill mb-3 fw-semibold">
                        <i class="bi bi-stars me-1"></i> Politeknik ATMI Surakarta
                    </span>
                    <h1 class="display-4 fw-extrabold mb-3 lh-sm">
                        Sistem Informasi & <span class="text-info">Dashboard Akademik</span> Terpadu
                    </h1>
                    <p class="lead text-white-50 mb-4">
                        Kelola profil mahasiswa, identitas NIM, dan informasi akademik secara aman, cepat, dan terintegrasi dalam satu portal modern.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('login') }}" class="btn btn-info text-dark btn-lg px-4 py-3 rounded-3 fw-bold shadow">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Masuk Sekarang
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-4 py-3 rounded-3 fw-semibold">
                            <i class="bi bi-person-plus me-2"></i>Daftar Akun Baru
                        </a>
                    </div>
                </div>

                <!-- Preview Card Kanan -->
                <div class="col-lg-5">
                    <div class="glass-card rounded-4 p-4 shadow-lg">
                        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom border-white border-opacity-10">
                            <div class="bg-info text-dark rounded-circle d-flex align-items-center justify-content-center fw-bold fs-4" style="width: 54px; height: 54px;">
                                <i class="bi bi-person-badge"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">Kartu Identitas Digital</h5>
                                <small class="text-white-50">Terverifikasi Database Mahasiswa</small>
                            </div>
                        </div>
                        <div class="row g-3 text-start">
                            <div class="col-6">
                                <div class="bg-dark bg-opacity-25 p-3 rounded-3">
                                    <small class="text-info d-block">Autentikasi</small>
                                    <span class="fw-semibold">NIM & Password</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-dark bg-opacity-25 p-3 rounded-3">
                                    <small class="text-info d-block">Profil</small>
                                    <span class="fw-semibold">Upload Foto</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="bg-dark bg-opacity-25 p-3 rounded-3 d-flex justify-content-between align-items-center">
                                    <div>
                                        <small class="text-white-50 d-block">Status Sistem</small>
                                        <span class="fw-semibold text-success"><i class="bi bi-circle-fill small me-1"></i> Online & Terhubung MySQL</span>
                                    </div>
                                    <i class="bi bi-shield-check fs-3 text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Strip -->
    <section class="py-5 bg-white border-top">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 feature-card bg-light">
                        <div class="text-primary fs-2 mb-2"><i class="bi bi-shield-lock-fill"></i></div>
                        <h5 class="fw-bold">Keamanan Laravel Breeze</h5>
                        <p class="text-muted small mb-0">Proteksi sesi login, enkripsi kata sandi otomatis, dan validasi data terstruktur.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 feature-card bg-light">
                        <div class="text-primary fs-2 mb-2"><i class="bi bi-person-vcard-fill"></i></div>
                        <h5 class="fw-bold">Identitas NIM Lengkap</h5>
                        <p class="text-muted small mb-0">Menyimpan NIM, nama lengkap, tempat & tanggal lahir, serta foto profil mahasiswa.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 feature-card bg-light">
                        <div class="text-primary fs-2 mb-2"><i class="bi bi-layout-wtf"></i></div>
                        <h5 class="fw-bold">Antarmuka Bootstrap</h5>
                        <p class="text-muted small mb-0">Desain responsif yang nyaman diakses melalui laptop maupun perangkat mobile.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white-50 py-3 text-center small">
        &copy; {{ date('Y') }} SIA Portal — Teknologi Rekayasa Mekatronika, Politeknik ATMI Surakarta
    </footer>
</body>
</html>
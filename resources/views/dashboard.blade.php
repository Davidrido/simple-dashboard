<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SIaA Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f1f5f9; }
        .sidebar { background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%); min-height: 100vh; }
        .nav-pill-custom { color: #cbd5e1; border-radius: 10px; padding: 10px 16px; transition: all 0.2s; }
        .nav-pill-custom:hover, .nav-pill-custom.active { background-color: #2563eb; color: #ffffff; }
        .banner-grad { background: linear-gradient(135deg, #1d4ed8 0%, #0284c7 100%); }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Kiri -->
            <aside class="col-md-3 col-lg-2 sidebar text-white p-3 d-flex flex-column">
                <a href="{{ route('home') }}" class="text-white text-decoration-none fw-bold fs-5 d-flex align-items-center gap-2 px-2 py-3 border-bottom border-white border-opacity-10">
                    <i class="bi bi-cpu-fill text-info"></i>
                    <span>SIA<span class="text-info">.Portal</span></span>
                </a>

                <ul class="nav flex-column gap-2 mt-4 flex-grow-1">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link nav-pill-custom active fw-semibold">
                            <i class="bi bi-grid-1x2-fill me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link nav-pill-custom">
                            <i class="bi bi-house-door me-2"></i> Halaman Home
                        </a>
                    </li>
                </ul>

                <div class="pt-3 border-top border-white border-opacity-10">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 rounded-3 fw-semibold">
                            <i class="bi bi-box-arrow-left me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Konten Utama Kanan -->
            <main class="col-md-9 col-lg-10 p-4 p-lg-5">
                <!-- Header Atas -->
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                    <div>
                        <h3 class="fw-bold text-dark mb-0">Dashboard Mahasiswa</h3>
                        <p class="text-muted small mb-0">Selamat datang kembali di panel informasi akun Anda</p>
                    </div>
                    <div class="d-flex align-items-center gap-2 bg-white px-3 py-2 rounded-pill shadow-sm">
                        <span class="badge bg-success rounded-circle p-1"><span class="visually-hidden">Online</span></span>
                        <span class="small fw-semibold text-dark">{{ Auth::user()->username }}</span>
                    </div>
                </div>

                <!-- Kartu Biodata Lengkap & Foto Profil -->
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="banner-grad text-white p-4">
                        <h5 class="fw-bold mb-0"><i class="bi bi-person-lines-fill me-2"></i>Profil Lengkap Mahasiswa</h5>
                    </div>
                    <div class="card-body p-4 p-lg-5 bg-white">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-4 text-center border-end-lg">
                                @if(Auth::user()->foto)
                                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto Profil" class="rounded-circle img-thumbnail shadow" style="width: 170px; height: 170px; object-fit: cover;">
                                @else
                                    <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center fw-bold display-4 shadow" style="width: 170px; height: 170px;">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                @endif
                                <h5 class="fw-bold mt-3 mb-1">{{ Auth::user()->name }}</h5>
                                <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-semibold">
                                    NIM: {{ Auth::user()->username }}
                                </span>
                            </div>

                            <div class="col-lg-8">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="text-muted py-3" style="width: 35%;"><i class="bi bi-hash me-2 text-primary"></i>Username / NIM</th>
                                                <td class="fw-bold text-primary py-3">{{ Auth::user()->username }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted py-3"><i class="bi bi-person me-2 text-primary"></i>Nama Lengkap</th>
                                                <td class="fw-semibold text-dark py-3">{{ Auth::user()->name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted py-3"><i class="bi bi-calendar-event me-2 text-primary"></i>Tempat, Tanggal Lahir</th>
                                                <td class="text-dark py-3">{{ Auth::user()->tempat_lahir }}, {{ \Carbon\Carbon::parse(Auth::user()->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted py-3"><i class="bi bi-envelope me-2 text-primary"></i>Email Terdaftar</th>
                                                <td class="text-dark py-3">{{ Auth::user()->email }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted py-3 border-0"><i class="bi bi-clock-history me-2 text-primary"></i>Bergabung Sejak</th>
                                                <td class="text-muted py-3 border-0">{{ Auth::user()->created_at->translatedFormat('d F Y, H:i') }} WIB</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
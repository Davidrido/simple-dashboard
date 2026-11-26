<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIA Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #eef2f6; }
        .login-banner { background: linear-gradient(145deg, #0f172a 0%, #1d4ed8 100%); }
    </style>
</head>
<body class="d-flex align-items-center min-vh-100 py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-8">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="row g-0">
                        <!-- Panel Kiri Dekoratif -->
                        <div class="col-md-5 login-banner text-white p-4 p-lg-5 d-flex flex-column justify-content-between">
                            <div>
                                <a href="{{ route('home') }}" class="text-white text-decoration-none fw-bold fs-5 d-inline-flex align-items-center gap-2">
                                    <i class="bi bi-cpu-fill text-info"></i> SIA.Portal
                                </a>
                            </div>
                            <div class="my-4">
                                <h3 class="fw-bold mb-3">Selamat Datang Kembali!</h3>
                                <p class="text-white-50 small mb-0">
                                    Gunakan Nomor Induk Mahasiswa (NIM) dan password Anda untuk mengakses dashboard profil akademik.
                                </p>
                            </div>
                            <div class="small text-white-50">
                                <i class="bi bi-shield-check text-info me-1"></i> Politeknik ATMI Surakarta
                            </div>
                        </div>

                        <!-- Panel Kanan Form Login -->
                        <div class="col-md-7 bg-white p-4 p-lg-5">
                            <div class="mb-4">
                                <h4 class="fw-bold text-dark mb-1">Login Akun</h4>
                                <p class="text-muted small">Silakan masukkan kredensial Anda di bawah ini</p>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label fw-semibold small">Username (NIM)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-person-badge"></i></span>
                                        <input type="text" name="username" value="{{ old('username') }}" class="form-control bg-light border-start-0 @error('username') is-invalid @enderror" placeholder="Contoh: 20246019" required autofocus>
                                        @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold small">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-lock"></i></span>
                                        <input type="password" name="password" class="form-control bg-light border-start-0 @error('password') is-invalid @enderror" placeholder="••••••••" required>
                                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label small text-muted" for="remember">Ingat saya</label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-2.5 rounded-3 fw-bold shadow-sm">
                                    Masuk ke Dashboard <i class="bi bi-arrow-right ms-1"></i>
                                </button>
                            </form>

                            <hr class="my-4">
                            <div class="d-flex justify-content-between align-items-center small">
                                <a href="{{ route('home') }}" class="text-muted text-decoration-none"><i class="bi bi-arrow-left me-1"></i>Home</a>
                                <span>Belum punya akun? <a href="{{ route('register') }}" class="fw-bold text-primary text-decoration-none">Daftar</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
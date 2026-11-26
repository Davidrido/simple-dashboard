<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SIA Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%); }
    </style>
</head>
<body class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-bottom p-4 text-center">
                        <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-2 fw-semibold">Pendaftaran Mahasiswa</span>
                        <h3 class="fw-bold text-dark mb-1">Buat Akun Baru</h3>
                        <p class="text-muted small mb-0">Lengkapi data identitas dan foto profil Anda</p>
                    </div>

                    <div class="card-body p-4 p-md-5 bg-white">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Preview & Upload Foto -->
                            <div class="text-center mb-4">
                                <img id="fotoPreview" src="https://ui-avatars.com/api/?name=Mahasiswa&background=dbeafe&color=1d4ed8&size=120" class="rounded-circle img-thumbnail shadow-sm mb-2" style="width: 105px; height: 105px; object-fit: cover;" alt="Preview Foto">
                                <div>
                                    <label for="fotoInput" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                        <i class="bi bi-camera me-1"></i> Pilih Foto Profil
                                    </label>
                                    <input type="file" id="fotoInput" name="foto" accept="image/*" class="d-none @error('foto') is-invalid @enderror" onchange="previewImage(event)">
                                    @error('foto') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">NIM (Username Login)</label>
                                    <input type="text" name="username" value="{{ old('username') }}" class="form-control bg-light @error('username') is-invalid @enderror" placeholder="Contoh: 20246019" required>
                                    @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control bg-light @error('name') is-invalid @enderror" placeholder="Nama lengkap Anda" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="form-control bg-light @error('tempat_lahir') is-invalid @enderror" placeholder="Kota kelahiran" required>
                                    @error('tempat_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control bg-light @error('tanggal_lahir') is-invalid @enderror" required>
                                    @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-semibold small">Alamat Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control bg-light @error('email') is-invalid @enderror" placeholder="nama@student.atmi.ac.id" required>
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Password</label>
                                    <input type="password" name="password" class="form-control bg-light @error('password') is-invalid @enderror" placeholder="Minimal 8 karakter" required>
                                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="form-control bg-light" placeholder="Ulangi password" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2.5 rounded-3 fw-bold mt-4 shadow-sm">
                                <i class="bi bi-check-circle me-1"></i> Daftarkan Akun
                            </button>
                        </form>

                        <div class="text-center mt-4 small">
                            <a href="{{ route('home') }}" class="text-muted text-decoration-none me-3">&larr; Home</a>
                            <span>Sudah terdaftar? <a href="{{ route('login') }}" class="fw-bold text-primary text-decoration-none">Login di sini</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                document.getElementById('fotoPreview').src = reader.result;
            };
            if(event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    </script>
</body>
</html>
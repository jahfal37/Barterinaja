<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun Toko</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/index.css"> <!-- Link file CSS eksternal -->
</head>
<body>
    <!-- Menyertakan Navbar -->
    @include('partials.navbar')

    <!-- Konten Utama -->
    <div class="container mt-4 gray-background">
        <form action="/update-akun" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Profile Picture Section -->
            <div class="row form-section">
                <div class="col-md-8">
                    <label for="profilePicture" class="form-label">Tambah Profile Picture</label>
                    <input type="file" class="form-control" id="profilePicture" name="profile_picture" accept="image/*">
                    <small class="form-text text-muted">Spesifikasi ukuran gambar maksimal: 2MB.</small>
                </div>
            </div>

            <!-- Nama Akun Section -->
            <div class="form-section">
                <div class="col-md-8">
                    <label for="storeName" class="form-label">Nama Akun Toko</label>
                    <input type="text" class="form-control" id="storeName" name="store_name" placeholder="Masukkan nama akun toko" value="{{ $user->store_name }}" required>
                </div>
            </div>

            <div class="form-section">
                <div class="col-md-8">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" value="{{ $user->username }}" required>
                </div>
            </div>


            <!-- Contact Number Section -->
            <div class="form-section">
                <div class="col-md-8">
                    <label for="contactNumber" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contactNumber" name="contact_number" placeholder="Masukkan nomor kontak" value="{{ $user->contact_number }}" required>
                </div>
            </div>

            <!-- Bio/About Section -->
            <div class="form-section">
                <div class="col-md-8">
                   <label for="bio" class="form-label">Bio / About</label>
                   <textarea class="form-control" id="bio" name="bio" rows="4" placeholder="Masukkan bio toko" required>{{ $user->bio }}</textarea>
                </div>
            </div>


            <!-- Kota Section -->
            <div class="form-section">
                <div class="col-md-8">
                    <label for="city" class="form-label">Kota</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Masukkan nama kota" value="{{ $user->city }}" required>
                </div>
            </div>

            <!-- Password Section -->
            <div class="form-section">
                <div class="col-md-8">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-section">
                <button type="submit" class="btn btn-custom">Update Akun</button>
            </div>
        </form>
    </div>

    <!-- Menyertakan Footer -->
    @include('partials.footer')
</body>
</html>

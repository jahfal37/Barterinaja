<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah/Edit Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/index.css"> <!-- Link file CSS eksternal -->
</head>
<body>
    <!-- Menyertakan Navbar -->
    @include('partials.navbar')

    <!-- Konten Utama -->
    <div class="container mt-4 gray-background">
        <form action="/save-item" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Nama Produk Section -->
            <div class="row form-section">
                <div class="col-md-8">
                    <label for="productName" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="productName" name="product_name" placeholder="Masukkan nama produk" required>
                </div>
                <div class="col-md-4">
                    <h5>Aturan Upload Barang:</h5>
                    <div class="upload-instructions">
                        <ul>
                            <li>Deskripsi jelas</li>
                            <li>Foto barang valid</li>
                            <li>Barang yang akan dibarter legal dan sesuai ketentuan hukum</li>
                            <li>Tidak diperbolehkan upload barang yang berpotensi berbahaya</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Kategori Section -->
            <div class="form-section">
             <div class="col-md-8">
                 <label for="category" class="form-label">Kategori</label>
                  <select class="form-select" id="category" name="category" required>
                    <option value="">Pilih Kategori</option>
                    <option value="elektronik">Elektronik</option>
                    <option value="fashion">Fashion</option>
                    <option value="perabot">Perabot</option>
                    <option value="lainnya">Lainnya</option>
                  </select>
              </div>
            </div>

            <!-- Tags Section -->
            <div class="form-section">
              <div class="col-md-8">
                 <label for="tags" class="form-label">Tags</label>
                 <input type="text" class="form-control" id="tags" name="tags" placeholder="Masukkan tags (misal: baru, murah, dll)">
              </div>
            </div>

            <!-- Deskripsi Section -->
            <div class="form-section">
             <div class="col-md-8">
                 <label for="description" class="form-label">Deskripsi</label>
                 <textarea class="form-control wide-textarea" id="description" name="description" rows="5" placeholder="Masukkan deskripsi produk" required></textarea>
             </div>
            </div>

            <!-- Upload Screenshot Section -->
            <div class="form-section">
              <div class="col-md-8">
                 <label for="screenshots" class="form-label">Tambah Screenshot (Max 12, Spesifikasi Ukurannya)</label>
                 <input type="file" class="form-control" id="screenshots" name="screenshots[]" accept="image/*" multiple>
                 <small class="form-text text-muted">Maksimum 12 gambar, ukuran gambar disarankan tidak lebih dari 5MB.</small>
              </div>
            </div>

            <!-- Kota Section -->
            <div class="form-section">
              <div class="col-md-8">
                  <label for="city" class="form-label">Kota</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="Masukkan nama kota" required>
              </div>
            </div>

            <!-- Kondisi Section -->
            <div class="form-section">
              <div class="col-md-8">
                  <label for="condition" class="form-label">Kondisi</label>
                  <select class="form-select" id="condition" name="condition" required>
                     <option value="">Pilih Kondisi</option>
                     <option value="baru">Baru</option>
                     <option value="bekas">Bekas</option>
                  </select>
              </div>
            </div>
            

            <!-- Submit Button -->
            <div class="form-section">
                <button type="submit" class="btn btn-custom">Upload</button>
            </div>
        </form>
    </div>

    <!-- Menyertakan Footer -->
    @include('partials.footer')
</body>
</html>

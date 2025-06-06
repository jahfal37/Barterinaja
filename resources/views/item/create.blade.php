<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah/Edit Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/index.css"> <!-- File CSS eksternal -->
    @vite(['public/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between gap-8">
            <!-- Form Section -->
            <div class="w-3/4 bg-gray-100 rounded-md shadow-md p-6">
            <form action="{{ route('save.item') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <!-- Nama Produk -->
                    <div class="mb-4">
                        <label for="productName" class="block text-gray-700 font-medium">Nama Produk</label>
                        <input type="text" id="productName" name="product_name" class="form-control w-full p-2 border rounded-md" placeholder="Masukkan nama produk" required>
                    </div>

                    <!-- Kategori -->
                    <div class="mb-4">
                        <label for="category" class="block text-gray-700 font-medium">Kategori</label>
                        <select id="category" name="category" class="form-select w-full p-2 border rounded-md" required>
                            <option value="">Pilih Kategori</option>
                            <option value="elektronik">Elektronik</option>
                            <option value="fashion">Fashion</option>
                            <option value="perabot">Perabot</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <!-- Tags -->
                    <div class="mb-4">
                        <label for="tags" class="block text-gray-700 font-medium">Tags</label>
                        <input type="text" id="tags" name="tags" class="form-control w-full p-2 border rounded-md" placeholder="Misal: baru, murah">
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-medium">Deskripsi</label>
                        <textarea id="description" name="description" class="form-control w-full p-2 border rounded-md" rows="5" placeholder="Masukkan deskripsi produk" required></textarea>
                    </div>

                    <!-- Upload Screenshot -->
                    <div class="mb-4">
                        <label for="screenshots" class="block text-gray-700 font-medium">Tambah Screenshot</label>
                        <input type="file" id="screenshots" name="screenshots[]" class="form-control w-full p-2 border rounded-md" accept="image/*" multiple>
                        <small class="text-gray-500">Maksimum 12 gambar, ukuran maksimal 5MB.</small>
                    </div>

                    <!-- Kota -->
                    <div class="mb-4">
                        <label for="city" class="block text-gray-700 font-medium">Kota</label>
                        <input type="text" id="city" name="city" class="form-control w-full p-2 border rounded-md" placeholder="Masukkan nama kota" required>
                    </div>

                    <!-- Kondisi -->
                    <div class="mb-4">
                        <label for="condition" class="block text-gray-700 font-medium">Kondisi</label>
                        <select id="condition" name="condition" class="form-select w-full p-2 border rounded-md" required>
                            <option value="">Pilih Kondisi</option>
                            <option value="baru">Baru</option>
                            <option value="bekas">Bekas</option>
                        </select>
                    </div>

                    <!-- Latitude dan Longitude -->
                    <input type="hidden" name="latitude" id="latitude" value="">
                    <input type="hidden" name="longitude" id="longitude" value="">

                    <!-- Submit -->
                    <div class="mt-6">
                        <button type="submit" class="px-4 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-600">Upload</button>
                    </div>
                </form>
            </div>

            <!-- Info Section -->
            <div class="w-1/4 bg-gray-200 rounded-md shadow-md p-6">
                <h5 class="text-lg font-semibold mb-4">Aturan Upload Barang:</h5>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Deskripsi jelas</li>
                    <li>Foto barang valid</li>
                    <li>Barang sesuai hukum</li>
                    <li>Tidak berbahaya</li>
                </ul>
            </div>
        </div>
    </div>


    <!-- Footer -->
    @include('partials.footer')
    <script>
        // const map = L.map('map').setView([-0.9148, 100.4582], 13);
        // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     attribution: '&copy; OpenStreetMap contributors',
        // }).addTo(map);

        document.addEventListener('DOMContentLoaded', () => {
            let geoSuccess = false;

            // Dapatkan lokasi pengguna
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    document.getElementById('latitude').value = position.coords.latitude;
                    document.getElementById('longitude').value = position.coords.longitude;
                    geoSuccess = true; // Lokasi berhasil didapat
                },
                (error) => {
                    console.error('Gagal mengambil lokasi:', error.message);
                    alert('Tidak dapat mengambil lokasi. Pastikan GPS Anda aktif.');
                }
            );

            // Validasi sebelum submit
            document.querySelector('#uploadForm').addEventListener('submit', (event) => {
                const latitude = document.getElementById('latitude').value;
                const longitude = document.getElementById('longitude').value;

                if (!geoSuccess || !latitude || !longitude) {
                    event.preventDefault(); // Cegah pengiriman form
                    alert('Lokasi belum tersedia. Mohon aktifkan GPS dan izinkan akses lokasi.');
                }
            });
        });
    </script>

</body>

</html>
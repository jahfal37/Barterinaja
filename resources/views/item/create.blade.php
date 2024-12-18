<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah/Edit Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/index.css"> <!-- Link file CSS eksternal -->
    @vite(['public/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Menyertakan Navbar -->
    @include('partials.navbar')

    <!-- Konten Utama -->

    <div class="flex container ">
        <!-- Kolom Form -->
        <div class="form-section w-full p-5 bg-gray-100 rounded-md shadow-md p-5">
            <form action="/save-item" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container mx-auto px-4 py-8">
                    <!-- Flex Container -->
                    <div class="flex justify-between items-start gap-8">
                        <!-- Kolom Formulir -->
                        <div class="w-3/4 p-6 bg-white rounded-md shadow-md">
                            <form action="/save-item" method="POST" enctype="multipart/form-data">
                                <!-- Nama Produk Section -->
                                <div class="mb-4">
                                    <label for="productName" class="block text-gray-700 font-medium">Nama Produk</label>
                                    <input type="text" class="form-control w-full p-2 border rounded-md" id="productName" name="product_name" placeholder="Masukkan nama produk" required>
                                </div>
                                <!-- Input Hidden untuk Latitude dan Longitude -->
                                <input type="hidden" name="latitude" id="latitude">
                                <input type="hidden" name="longitude" id="longitude">

                                <!-- Kategori Section -->
                                <div class="mb-4">
                                    <label for="category" class="block text-gray-700 font-medium">Kategori</label>
                                    <select class="form-select w-full p-2 border rounded-md" id="category" name="category" required>
                                        <option value="">Pilih Kategori</option>
                                        <option value="elektronik">Elektronik</option>
                                        <option value="fashion">Fashion</option>
                                        <option value="perabot">Perabot</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>

                                <!-- Tags Section -->
                                <div class="mb-4">
                                    <label for="tags" class="block text-gray-700 font-medium">Tags</label>
                                    <input type="text" class="form-control w-full p-2 border rounded-md" id="tags" name="tags" placeholder="Masukkan tags (misal: baru, murah, dll)">
                                </div>

                                <!-- Deskripsi Section -->
                                <div class="mb-4">
                                    <label for="description" class="block text-gray-700 font-medium">Deskripsi</label>
                                    <textarea class="form-control w-full p-2 border rounded-md" id="description" name="description" rows="5" placeholder="Masukkan deskripsi produk" required></textarea>
                                </div>

                                <!-- Upload Screenshot Section -->
                                <div class="mb-4">
                                    <label for="screenshots" class="block text-gray-700 font-medium">Tambah Screenshot (Max 12, Spesifikasi Ukurannya)</label>
                                    <input type="file" class="form-control w-full p-2 border rounded-md" id="screenshots" name="screenshots[]" accept="image/*" multiple>
                                    <small class="text-gray-500">Maksimum 12 gambar, ukuran gambar disarankan tidak lebih dari 5MB.</small>
                                </div>

                                <!-- Kota Section -->
                                <div class="mb-4">
                                    <label for="city" class="block text-gray-700 font-medium">Kota</label>
                                    <input type="text" class="form-control w-full p-2 border rounded-md" id="city" name="city" placeholder="Masukkan nama kota" required>
                                </div>

                                <!-- Kondisi Section -->
                                <div class="mb-4">
                                    <label for="condition" class="block text-gray-700 font-medium">Kondisi</label>
                                    <select class="form-select w-full p-2 border rounded-md" id="condition" name="condition" required>
                                        <option value="">Pilih Kondisi</option>
                                        <option value="baru">Baru</option>
                                        <option value="bekas">Bekas</option>
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-6">
                                    <button type="submit" class="px-4 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-600">
                                        Upload
                                    </button>
                                </div>
                            </form>
                            <script>
                                const map = L.map('map').setView([-0.9148, 100.4582], 13);
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                }).addTo(map);

                                navigator.geolocation.getCurrentPosition(
                                    (position) => {
                                        const userLat = position.coords.latitude;
                                        const userLng = position.coords.longitude;

                                        // Set lokasi pada peta
                                        map.setView([userLat, userLng], 13);
                                        L.marker([userLat, userLng]).addTo(map)
                                            .bindPopup('Kamu Saat Ini')
                                            .openPopup();

                                        // Isi input tersembunyi dengan koordinat lokasi
                                        document.getElementById('latitude').value = userLat;
                                        document.getElementById('longitude').value = userLng;
                                    },
                                    () => console.error('Lokasi gagal diambil.')
                                );
                            </script>

                        </div>

                        <!-- Kolom Informasi -->
                        <div class="w-1/5 p-6 bg-gray-200 rounded-md shadow-md">
                            <h5 class="text-lg font-semibold mb-4">Aturan Upload Barang:</h5>
                            <ul class="list-disc list-inside text-gray-700 space-y-2">
                                <li>Deskripsi jelas</li>
                                <li>Foto barang valid</li>
                                <li>Barang yang akan dibarter legal dan sesuai ketentuan hukum</li>
                                <li>Tidak diperbolehkan upload barang yang berpotensi berbahaya</li>
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            

                <!-- Menyertakan Footer -->
                @include('partials.footer')
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Page Akun</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    @vite(['public/css/app.css', 'resources/js/app.js'])

    <style>
        .gray-background {
            background-color: #f0f0f0;
        }

        .store-account {
            background-color: #f8f9fa;
            border: 1px solid #ccc;
            padding: 15px;
            width: 250px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            height: 100%; /* Membuat tinggi kolom sama dengan kolom deskripsi */
        }

        .store-logo {
            width: 85px;
            height: 85px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        #map {
            width: 100%;
            height: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Flexbox untuk menjadikan kolom deskripsi dan akun toko setinggi mungkin */
        .store-info-container {
            display: flex;
            justify-content: space-between;
        }

        .store-description {
            flex: 1;
            padding: 15px;
            margin-right: 20px;
            border-radius: 10px;
        }

        /* Grid untuk barang yang dijual dengan jarak antar elemen */
        .grid {
          display: grid;
          grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); /* Menyesuaikan kolom */
          gap: 20px; /* Memberikan jarak antar grid items */
           margin-top: 20px;
         }

        .grid-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            text-align: center;
            padding: 15px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .item-image-wrapper { 
          height: 150px; /* Set height untuk elemen gambar */
          background-color: #f5f5f5; /* Warna latar belakang sementara jika gambar tidak ada */
          display: flex;
          justify-content: center;
          align-items: center;
          border-radius: 5px;
        }  

        .item-image {
         width: 100%;
         height: 100%;
         object-fit: cover;
         border-radius: 5px;
        }

        .card-link:hover {
            background-color: #f8f9fa; /* Warna latar saat hover */
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

    </style>
</head>
<body>
    <!-- Include Navbar -->
    @include('partials.navbar')

    <!-- Banner Section -->
    
    <a href="{{ route('editAkun', $user->id) }}" class="card-link" style="text-decoration: none; color: inherit;">
    <div class="container position-relative bg-gray-200 my-4"><div class="mt-3 font-bold text-2xl ">
    <h3>Deskripsi Akun</h3></div>
        <div class="store-info-container">
            <div class="store-description p-3 border mb-3 gray-background">
                <p>{{ $user->bio ?? 'Belum ada deskripsi' }}</p>
            </div>

            <div class="store-account">
                <p><strong>{{ $user->name }}</strong></p>
                @if ($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="store-logo">
                @else
                    <img src="/images/akun.png" alt="Default Profile Picture" class="store-logo">
                @endif
                <p>{{ $user->store_name ?? 'Belum ada nama toko' }}</p>
            </div>
        </div>
    </div>
    </a>
    

    <!-- Lokasi/Maps -->
    <div class="container mt-4">
        <div class="container position-relative w-full">
            <h3>Lokasi / Maps</h3>
            <div id="map"></div>
        </div>
    </div>

    <div class="container mb-3"> <div class="text-center mt-3 font-bold text-2xl ">
    <h4>Barang yang Ditawarkan</h4>        </div>
    <div id="itemContainer" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
    @if (!empty($items) && count($items) > 0)
            @foreach ($items as $index => $item)
                <div class="grid-item"style="display: {{ $index < 8 ? 'block' : 'none' }}">
                    <div class="item-image-wrapper">
                        @if (!empty($item->screenshots->first()))
                            <img src="{{ asset('storage/' . $item->screenshots->first()->path) }}" 
                                 alt="{{ $item->product_name }}" 
                                 class="item-image">
                        @else
                            <img src="/images/no-image.png" 
                                 alt="No Image" 
                                 class="item-image">
                        @endif
                    </div>
                    <div class="item-info">
                        <p class="item-name">{{ $item->product_name }}</p>
                        <p class="item-rating">Lokasi : {{ $item->city }}</p>
                    </div>
                </div>
            @endforeach

    @else
        <p class="text-center">Tidak ada data barang yang tersedia.</p>
    @endif
        </div>
            <!-- Tombol Muat Lebih Banyak -->
           <div class="text-center mt-3">
              <button id="loadMoreBtn" class="btn btn-custom">Muat Lebih Banyak</button>
           </div>
    </div>


    <!-- Include Footer -->
    @include('partials.footer')

    <!-- Script Maps -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([-0.9148, 100.4582], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const userLat = position.coords.latitude;
                const userLng = position.coords.longitude;
                map.setView([userLat, userLng], 13);
                L.marker([userLat, userLng]).addTo(map)
                    .bindPopup('Kamu Saat Ini')
                    .openPopup();
            },
            () => console.error('Lokasi gagal diambil.')
        );
    </script>

    <!-- Script Load More -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const items = document.querySelectorAll('.grid-item');
            const loadMoreBtn = document.getElementById('loadMoreBtn');
            let itemsToShow = 8;

            loadMoreBtn.addEventListener('click', function () {
                const totalItems = items.length;

                // Tampilkan 8 item berikutnya
                for (let i = itemsToShow; i < itemsToShow + 8 && i < totalItems; i++) {
                    items[i].style.display = 'block';
                }

                itemsToShow += 8;

                // Sembunyikan tombol jika semua item sudah tampil
                if (itemsToShow >= totalItems) {
                    loadMoreBtn.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
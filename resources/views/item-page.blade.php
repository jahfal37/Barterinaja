<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $item->product_name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        .gray-background {
            background-color: #f0f0f0;
        }

        .store-account {
            position: absolute;
            top: 10%;
            left: 75%;
            background-color: #f8f9fa;
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
            z-index: 10;
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

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .grid-item {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            border-radius: 10px;
            background-color: #f8f9fa;
        }

        .item-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Include Navbar -->
    @include('partials.navbar')

    <!-- Banner Section -->
    <div class="container position-relative">
        <div class="banner">
            <img src="{{ $item->image_url ? asset('storage/' . $item->image_url) : '/images/default_item.png' }}" alt="{{ $item->product_name }}" class="img-fluid w-100">
        </div>
        
        <!-- Nama Akun Toko -->
        <div class="store-account">
            <a href="{{ route('store.show', $item->user_id) }}" style="text-decoration: none; color: inherit;">
                @if ($item->user->profile_picture)
                    <img src="{{ asset('storage/' . $item->user->profile_picture) }}" alt="Logo Toko" class="store-logo">
                @else
                    <img src="/images/akun.png" alt="Default Profile Picture" class="store-logo">
                @endif
                <p><strong>{{ $item->user->store_name ?? 'Toko Tidak Bernama' }}</strong></p>
                <p>@{{ $item->user->username }}</p>
                <p>Total Rating:</p>
                <p>0/10</p>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-2 mt-4">
        <div class="row">
            <!-- Left Column -->
            <div class="col-md-12">
                <div class="p-3 border mb-3 gray-background">
                    <h3>Deskripsi</h3>
                    <p>{{ $item->description ?? 'Tidak ada deskripsi untuk barang ini.' }}</p>
                </div>
                <div class="p-3 border gray-background">
                    <h3>Lokasi / Maps</h3>
                    <div id="map"></div>
                </div>
            </div>
        </div>

        <!-- Other Items Section -->
        <div class="mt-5">
            <h4>Item Lain</h4>
            <div class="grid">
                @foreach ($related_items as $related_item)
                    <div class="grid-item">
                        <a href="{{ route('item.show', $related_item->id) }}" style="text-decoration: none; color: inherit;">
                            <img src="{{ $related_item->image_url ? asset('storage/' . $related_item->image_url) : '/images/default_item.png' }}" alt="{{ $related_item->product_name }}" class="item-image">
                            <p class="item-name">{{ $related_item->product_name }}</p>
                            <p class="item-rating">⭐⭐⭐⭐⭐</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Script untuk API Maps -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Inisialisasi peta dengan lokasi default
        const map = L.map('map').setView([{{ $item->latitude ?? '-0.9148' }}, {{ $item->longitude ?? '100.4582' }}], 13);

        // Tambahkan tile dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Tambahkan marker di lokasi barang
        L.marker([{{ $item->latitude ?? '-0.9148' }}, {{ $item->longitude ?? '100.4582' }}]).addTo(map)
            .bindPopup('Lokasi Barang')
            .openPopup();
    </script>
    
    <!-- Include Footer -->
    @include('partials.footer')
</body>
</html>

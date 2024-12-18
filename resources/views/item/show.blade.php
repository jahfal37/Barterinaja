<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $items->product_name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    @vite(['public/css/app.css', 'resources/js/app.js'])
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

        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            flex: 1;
        }

        footer {
            background-color: #f8f9fa;
            padding: 15px;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Include Navbar -->
    @include('partials.navbar')

    <!-- Product and Store Information Section -->
    <div class="container position-relative">
        <div class="row">
            <!-- Product Image Section (3/4) -->
            <div class="col-md-9">
                <div class="product">
                    @if (optional($items->screenshots->isNotEmpty()))
                    <!-- Tampilkan gambar pertama dari screenshot -->
                    <img src="{{ asset('storage/' . $items->screenshots->first()->path) }}" alt="{{ $items->product_name }}" class="img-fluid product-image">
                    @else
                    <!-- Gambar default jika tidak ada screenshot -->
                    <img src="/images/default_item.png" alt="{{ $items->product_name }}" class="img-fluid product-image">
                    @endif

                    <!-- Overlay untuk nama barang -->
                    <div class="product-overlay">
                        <div class="text-overlay">
                            <h2>{{ $items->product_name }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Store Account Section (1/4) -->
            <div class="col-md-3">
                <div class="store-account">
                    <p><strong>{{ $items->user->name }}</strong></p>
                    <a href="{{ route('account', $items->user_id) }}" style="text-decoration: none; color: inherit; ">
                        @if ($items->user->profile_picture)
                        <img src="{{ asset('storage/' . $items->user->profile_picture) }}" alt="Logo Toko" class="store-logo">
                        @else
                        <img src="/images/akun.png" alt="Default Profile Picture" class="store-logo">
                        @endif
                        <p>{{ $items->user->store_name ?? 'Toko Tidak Bernama' }}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row">
            <!-- Left Column -->
            <div class="col-md-12">
                <div class="p-3 border mb-3 gray-background">
                    <h3>Deskripsi</h3>
                    <p>{{ $items->description ?? 'Tidak ada deskripsi untuk barang ini.' }}</p>
                </div>
                <div class="p-3 border gray-background">
                    <h3>Lokasi / Maps</h3>
                    <div id="map"></div>
                </div>
            </div>
        </div>

        <!-- Other Items Section -->
        <div class="mt-5 bg-gray-200">
            <h4>Item Lain</h4>
            <div class="grid">
                @foreach ($related_items as $related_item)
                <div class="grid-item bg-gray-200">
                    <a href="{{ route('item.show', $related_item->id) }}" style="text-decoration: none; color: inherit;">
                        @if ($related_item->screenshots->isNotEmpty())
                        <!-- Tampilkan gambar pertama dari screenshot -->
                        <img src="{{ asset('storage/' . $related_item->screenshots->first()->path) }}" alt="{{ $related_item->product_name }}" class="img-fluid related-item-image">
                        @else
                        <!-- Gambar default jika tidak ada screenshot -->
                        <img src="/images/default_item.png" alt="{{ $related_item->product_name }}" class="img-fluid related-item-image">
                        @endif
                        <div class="bg-blend-overlay  p-2 my-3">
                            <p class="item-name">{{ $related_item->product_name }}</p>
                            <p class="item-rating">Lokasi : {{ $related_item->city }}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>


        <script>
    // Ambil data latitude dan longitude dari PHP
    const latitude = {{ $items->latitude ?? '-0.9148' }};
    const longitude = {{ $items->longitude ?? '100.4582' }};

    // Inisialisasi peta dengan lokasi default
    const map = L.map('map').setView([latitude, longitude], 13);

    // Tambahkan tile dari OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Tambahkan marker di lokasi barang
    L.marker([latitude, longitude]).addTo(map)
        .bindPopup('Lokasi Barang')
        .openPopup();
</script>

        <footer>
            <!-- Include Footer -->
            @include('partials.footer')
        </footer>
</body>

</html>
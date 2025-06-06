<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>{{ $items->product_name }}</title>
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
            <div class="col-md-9">
                <div class="product">
                    <!-- Slideshow -->
                    @if (optional($items->screenshots->isNotEmpty()))
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($items->screenshots as $index => $screenshot)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $screenshot->path) }}" alt="{{ $items->product_name }}" class="d-block w-100">
                            </div>
                            @endforeach
                        </div>

                        <!-- Tombol Navigasi -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    @else
                    <!-- Gambar Default -->
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
                <div class="store-account text-center p-2 border rounded">
                    <p><strong>{{ $items->name }}</strong></p>
                    @if ($items->profile_picture)
                    <img src="{{ asset('storage/' . $items->profile_picture) }}" alt="Profile Picture" class="store-logo">
                    @else
                    <img src="/images/akun.png" alt="Default Profile Picture" class="store-logo">
                    @endif
                    <p>{{ $items->store_name ?? 'Belum ada nama toko' }}</p>
                    <!-- <p class="mt-3">{{ $items->user->store_name ?? 'Toko Tidak Bernama' }}</p> -->
                    </a>
                </div>
            </div>
        </div>


    </div>
    </div>
    </div>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="container mx-auto px-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-3 border mb-3 bg-gray-200">
                        <h3>Deskripsi</h3>
                        <p>{{ $items->description ?? 'Yahh belum ada barang.' }}</p>
                    </div>
                    <div class="p-3 border bg-gray-200">
                        <h3>Lokasi / Maps</h3>
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Other Items Section -->
        <div class="content">
            <h2 class="section-title">Most Recent</h2>
            <div class="grid">
                @forelse ($related_items as $item)
                <div class="grid-item shadow-lg">
                    <a href="{{ route('item.show', $item->id) }}" style="text-decoration: none; color: inherit;">
                        <div class="item-image-wrapper">
                            @if ($item->screenshots->isNotEmpty())
                            <!-- Tampilkan gambar pertama dari screenshot -->

                            <img src="{{ asset('storage/'.$item->screenshots->first()->path) }}" alt="{{ $item->product_name }}" class="item-image">
                            @else
                            <!-- Gambar default jika tidak ada screenshot -->
                            <img src="/images/default-item.png" alt="No Image" class="item-image">
                            @endif
                        </div>
            <div class="p-4">
                <h2 class="font-semibold text-lg truncate">{{ $item->product_name }}</h2>
                <p class="text-sm text-gray-600">Lokasi: {{ $item->city }}</p>
                <p class="text-sm text-gray-500">Added on: {{ $item->created_at->format('d M Y') }}</p>
                @if(isset($item->views))
                <p class="text-sm text-gray-500">{{ $item->views }} views</p>
                @endif
            </div>
                    </a>
                </div>
                @empty
                <p>No recent items available.</p>
                @endforelse
            </div>
        </div>
    </div>
    </div>


    <script>
        // Ambil data item dari server menggunakan endpoint API
        fetch('/maps')
            .then(response => response.json())
            .then(items => {
                if (items.length > 0) {
                    // Ambil data item pertama untuk menentukan lokasi awal peta
                    const firstItem = items[0];
                    const map = L.map('map').setView([firstItem.latitude, firstItem.longitude], 13);

                    // Tambahkan tile dari OpenStreetMap
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);

                    // Tambahkan marker untuk setiap barang di database
                    items.forEach(item => {
                        L.marker([item.latitude, item.longitude]).addTo(map)
                            .bindPopup(`<strong>${item.product_name}</strong><br>${item.description}`);
                    });
                } else {
                    console.error('Tidak ada data barang yang ditemukan.');
                }
            })
            .catch(error => {
                console.error('Error mengambil data barang:', error);
            });
    </script>
    <footer>
        <!-- Include Footer -->
        @include('partials.footer')
    </footer>
</body>

</html>
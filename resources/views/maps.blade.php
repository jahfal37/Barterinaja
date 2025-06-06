<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barterin Maps</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @vite(['public/css/app.css', 'resources/js/app.js'])

    <style>
        #map {
            height: 500px;
            width: 100%;
        }

        .leaflet-popup-content {
            font-size: 14px;
        }
    </style>
</head>

<body>
    @include('partials.navbar')

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Inisialisasi peta dengan lokasi default
        const map = L.map('map').setView([-0.9148, 100.4582], 13); // Lokasi default: Padang

        // Tambahkan tile dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Geolocation API untuk lokasi pengguna
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;

                    // Pindahkan peta ke lokasi pengguna
                    map.setView([userLat, userLng], 13);

                    // Tambahkan marker untuk lokasi pengguna
                    L.marker([userLat, userLng], { icon: L.icon({
                        iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                        iconSize: [25, 41], // Ukuran ikon
                        iconAnchor: [12, 41] // Anchor posisi marker
                    })}).addTo(map)
                        .bindPopup('<strong>Lokasi Anda</strong>')
                        .openPopup();
                },
                (error) => {
                    console.error('Error mendapatkan lokasi:', error);
                }
            );
        } else {
            alert('Geolocation tidak didukung oleh browser ini.');
        }

        // Ambil data item dari server
        fetch('/maps')
            .then(response => response.json())
            .then(items => {
                items.forEach(item => {
                    // Tambahkan marker untuk setiap item
                    L.marker([item.latitude, item.longitude]).addTo(map)
                        .bindPopup(`
                            <div>
                                <strong>${item.product_name}</strong><br>
                                ${item.description}<br>
                            </div>
                        `);
                });
            })
            .catch(error => {
                console.error('Error mengambil data item:', error);
            });
    </script>

    @include('partials.footer')
</body>

</html>

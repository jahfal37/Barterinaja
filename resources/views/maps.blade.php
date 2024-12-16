<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barterin Maps</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    @include('partials.navbar') 
    @include('partials.sidebar')

    <div id="map"></div>

     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
     <script>
        // Inisialisasi peta dengan lokasi default jika geolocation gagal
        const map = L.map('map').setView([-0.9148, 100.4582], 13); // Padang sebagai fallback

        // Tambahkan tile dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Geolocation API untuk mendapatkan lokasi pengguna
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    // Ambil koordinat pengguna
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;

                    // Pindahkan peta ke lokasi pengguna
                    map.setView([userLat, userLng], 13);

                    // Tambahkan marker ke lokasi pengguna
                    L.marker([userLat, userLng]).addTo(map)
                        .bindPopup('Kamu Saat Ini')
                        .openPopup();
                },
                (error) => {
                    console.error('Error mendapatkan lokasi:', error);
                }
            );
        } else {
            alert('Geolocation tidak didukung oleh browser ini.');
        }
     </script>
    </div>


    @include('partials.footer')
</body>
</html>

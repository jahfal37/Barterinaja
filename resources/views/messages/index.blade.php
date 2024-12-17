<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Username dan Kirim Pesan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/index.css">
    @vite(['public/css/app.css', 'resources/js/app.js'])

    <style>
        /* Styling untuk Heading */
        h2 {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #fff; /* Sesuaikan dengan warna navbar dan footer */
            margin-top: 30px;
        }

        /* Styling untuk card user */
        .user-card {
            background-color: #212529; /* Warna latar belakang kartu sesuai dengan navbar/footer */
            border: 1px solid #444;  /* Warna border lebih gelap untuk efek */
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.2s;
        }

        /* Styling untuk Button */
        .user-card button {
            background-color: #CEBC88; /* Warna tombol biru sesuai navbar */
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .user-card button:hover {
            background-color: #f7c12c; /* Efek hover tombol */
        }

        /* Responsif untuk mobile */
        @media (max-width: 576px) {
            h2 {
                font-size: 1.5rem;
            }

            .user-card {
                padding: 15px;
            }
        }
        /* Styling untuk kontainer utama */
        .container {
            background-color:rgb(255, 255, 255); /* Warna background utama sesuai dengan navbar/footer */
            padding: 20px;
            border-radius: 10px;
        }

        /* Styling untuk kolom user */
        .col-md-4 {
            margin-bottom: 15px;
        }

        /* Styling untuk teks yang lebih terang */
        h5 {
            color: #fff; /* Warna teks nama user lebih terang */
            font-size: 1.2rem;
        }

    </style>
</head>
<body>
    @include('partials.navbar')

    <!-- Title Section -->
    <h2>Pilih Username untuk Mengirim Pesan</h2>

    <!-- User List Section -->
    <div class="container mt-4">
    <div class="row">
        @foreach ($users as $user)
            @if ($user->role === 'user')
                <div class="col-md-4 mb-4">
                    <div class="user-card">
                        <h5>{{ $user->name }}</h5>
                        <a href="{{ route('messages.chat', $user->id) }}">
                            <button class="btn btn-custom">Kirim Pesan</button>
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>


    @include('partials.footer')
</body>
</html>

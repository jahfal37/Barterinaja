
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>@yield('title', 'Dashboard')</title>
    @vite(['public/css/app.css', 'resources/js/app.js'])

</head>
@include('partials.navbar')
<body class="bg-gray-100 font-sans">

    <div class="flex">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <main class="flex-grow p-6 bg-gray-200">
            @yield('content')
 
    

<div class="container mx-auto p-max bg-white">
    <h1 class="text-3xl font-bold text-[#23292B] mb-8">Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <!-- Total Postingan -->
         <a href="{{ route('admin.postingan') }}">
        <div class="bg-white p-6 rounded-lg shadow-md hover:bg-gray-50">
            <h2 class="text-gray-500 text-sm font-medium">TOTAL POSTINGAN</h2>
            <p class="text-2xl font-bold text-[#23292B]">{{$totalPostingan}}</p>
        </div>
        </a>

        <!-- Total Pengguna -->
         <a href="{{ route('admin.pengguna') }}">
        <div class="bg-white p-6 rounded-lg shadow-md hover:bg-gray-50">
            <h2 class="text-gray-500 text-sm font-medium">TOTAL PENGGUNA</h2>
            <p class="text-2xl font-bold text-[#23292B]">{{$totalPengguna}}</p>
        </div>
        </a>

        <!-- Total Transaksi -->
        <a href="{{ route('admin.postingan') }}">
        <div class="bg-white p-6 rounded-lg shadow-md hover:bg-gray-50">
            <h2 class="text-gray-500 text-sm font-medium">TOTAL TRANSAKSI</h2>
            <p class="text-2xl font-bold text-[#23292B]">{{$totalTransaksi}}</p>
        </div>
        </a>
    </div>
</div>

        </main>
    </div>
    @include('partials.footer')
</body>
</html>

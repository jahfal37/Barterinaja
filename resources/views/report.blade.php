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
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    @vite(['public/css/app.css', 'resources/js/app.js'])
    <title>Daftar Laporan</title>
</head>

<body class="bg-gray-100 font-sans">
    @include('partials.navbar')

    <div class="flex">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <main class="flex-grow p-6 bg-gray-200">
            <div class="container mx-auto p-max bg-white">
                <div>
                    <h1 class="text-3xl font-bold text-[#23292B] mb-8">Daftar Laporan</h1>
                </div>

                <!-- Tabel -->
                <div class="overflow-x-auto">
                    <table class="table-auto border-collapse w-full text-left border border-gray-300 bg-white shadow-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border border-gray-300">ID</th>
                                <th class="px-4 py-2 border border-gray-300">Judul</th>
                                <th class="px-4 py-2 border border-gray-300">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reports as $report)  <!-- Menggunakan $reports -->
                                <tr class="border-t">
                                    <td class="px-4 py-2 border border-gray-300">{{ $report->id }}</td>
                                    <td class="px-4 py-2 border border-gray-300">{{ $report->title }}</td>
                                    <td class="px-4 py-2 border border-gray-300">{{ $report->description }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-2 text-center text-gray-500">Tidak ada laporan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Tombol Kembali -->
                <div class="flex justify-end mt-6">
                    <a href="{{ route('admin.dashboard') }}" class="items-center text-white bg-gradient-to-r from-red-500 via-brown-600 to-black hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </main>
    </div>

    @include('partials.footer')
</body>

</html>

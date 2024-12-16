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

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <tbody>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-medium text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3 text-medium">ID</th>
            <th scope="col" class="px-6 py-3 text-medium">Judul Postingan</th>
            <th scope="col" class="px-6 py-3 text-medium">Pengguna</th>
            <th scope="col" class="px-6 py-3 text-medium">Status</th>
            <th scope="col" class="px-6 py-3 text-medium">Aksi</th>
        </tr>
    </thead>
    <tbody class="font-medium text-gray-700 uppercase bg-white dark:bg-gray-700 dark:text-black">
    <tr>
        <td class="px-6 py-4 text-black">1</td>
        <td class="px-6 py-4 text-black">Sepatu Nike</td>
        <td class="px-6 py-4 text-black">John Doe</td>
        <td class="px-6 py-4 text-black">Published</td>
        <td class="px-6 py-4 text-black">
            <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline px-2 ">Edit</button>
            <button class="font-medium text-red-600 dark:text-red-500 hover:underline px-2">Hapus</button>
        </td>
    </tr>
    <tr>
        <td class="px-6 py-4 text-black">2</td>
        <td class="px-6 py-4 text-black">Buku Belajar Rekayasa Perangkat Lunak</td>
        <td class="px-6 py-4 text-black">Jane Smith</td>
        <td class="px-6 py-4 text-black">Draft</td>
        <td class="px-6 py-4 text-black">
        <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline px-2 ">Edit</button>
        <button class="font-medium text-red-600 dark:text-red-500 hover:underline px-2">Hapus</button>
        </td>
    </tr>
    <tr>
        <td class="px-6 py-4 text-black">3</td>
        <td class="px-6 py-4 text-black">Sepatu Adidas</td>
        <td class="px-6 py-4 text-black">Michael Scott</td>
        <td class="px-6 py-4 text-black">Published</td>
        <td class="px-6 py-4 text-black">
        <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline px-2 ">Edit</button>
        <button class="font-medium text-red-600 dark:text-red-500 hover:underline px-2">Hapus</button>
        </td>
    </tr>

    </tbody>
</table>

        </tbody>
    </table>
</div>




        </main>
    </div>
    @include('partials.footer')
</body>
</html>

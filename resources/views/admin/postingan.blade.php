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
                    <thead class="text-medium text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Judul Postingan</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Kategori</th>
                            <th scope="col" class="px-6 py-3">Deskripsi</th>
                            <th scope="col" class="px-6 py-3 text-center" colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="font-medium text-gray-700 bg-white dark:bg-gray-700 dark:text-black ">
                        @foreach ($posts as $post)
                        <tr>
                            <td class="px-6 py-4">{{$post->id }}</td>
                            <td class="px-6 py-4">{{ ucfirst(strtolower($post->product_name)) }}</td>
                            <td class="px-6 py-4">{{ ucfirst(strtolower($post->user->name ?? 'No User')) }}</td>
                            <td class="px-6 py-4">{{ ucfirst(strtolower($post->category)) }}</td>
                            <td class="px-6 py-4">{{ ucfirst(strtolower($post->description)) }}</td>
                            <td class="px-6 py-4 text-center ">
                                <a href="{{ route('admin.item_detail', $post->product_name) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline px-2">
                                    Detail
                                </a>
                                <form action="{{ route('admin.item_delete', ['product_name' => $post->product_name]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline px-2">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Footer -->
    @include('partials.footer')

</body>

</html>
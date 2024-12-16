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
                                    <th scope="col" class="px-6 py-3 text-left">Nama Toko</th>
                                    <th scope="col" class="px-6 py-3 text-left">Nama Akun</th>
                                    <th scope="col" class="px-6 py-3 text-left">Username</th>
                                    <th scope="col" class="px-6 py-3 text-left">Email</th>
                                    <th scope="col" class="px-6 py-3 text-left">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-black font-medium ">
                                    <td class="px-6 py-4 text-left">{{ $user->store_name }}</td>
                                    <td class="px-6 py-4 text-left">{{ $user->name }}</td>
                                    <td class="px-6 py-4 text-left">{{ $user->username }}</td>
                                    <td class="px-6 py-4 text-left">{{ $user->email }}</td>
                                    <td class="px-6 py-4 text-left">{{ ucfirst($user->status) }}</td>
                                    <td class="px-6 py-4 text-left">
                                        <a href="{{ route('admin.user_edit', $user->username) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline px-2">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data pengguna.</td>
                                </tr>
                                @endforelse
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
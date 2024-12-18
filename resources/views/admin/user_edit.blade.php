
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
    <title>Edit User</title>
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
                    <h1 class="text-3xl font-bold text-[#23292B] mb-8">Edit Users</h1>
                    </div>

                    <form action="{{ route('admin.user_update',$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Input Fields -->
                    <div class="mx-2 my-4">
                        <div class="flex justify-between my-4">
                            <p class="p-2"><b>Nama</b></p>
                            <input type="text" name="name" class="border-2 p-2 w-2/3"
                                value="{{ old('name', $user->name) }}">
                        </div>
                        <hr>

                        <div class="flex justify-between my-4">
                            <p class="p-2"><b>Username</b></p>
                            <input type="text" name="username" class="border-2 p-2 w-2/3"
                                value="{{ old('username', $user->username) }}">
                        </div>
                        <hr>

                        <!-- <div class="flex justify-between my-4">
                            <p class="p-2"><b>Password</b></p>
                            <input type="password" name="password" class="border-2 p-2 w-2/3"
                                placeholder="Kosongkan jika tidak ingin mengubah">
                        </div> -->
                        <hr>

                        <div class="flex justify-between my-4">
                            <p class="p-2"><b>Store Name</b></p>
                            <input type="text" name="store_name" class="border-2 p-2 w-2/3"
                                value="{{ old('store_name', $user->store_name) }}">
                        </div>
                        <hr>

                        <div class="flex justify-between my-4">
                            <p class="p-2"><b>Contact</b></p>
                            <input type="text" name="contact_number" class="border-2 p-2 w-2/3"
                                value="{{ old('contact_number', $user->contact_number) }}">
                        </div>
                        <hr>

                        <div class="flex justify-between my-4">
                            <p class="p-2"><b>Bio</b></p>
                            <textarea name="bio" class="border-2 p-2 w-2/3">{{ old('bio', $user->bio) }}</textarea>
                        </div>
                        <hr>

                        <div class="flex justify-between my-4">
                            <p class="p-2"><b>Email</b></p>
                            <input type="email" name="email" class="border-2 p-2 w-2/3"
                                value="{{ old('email', $user->email) }}">
                        </div>
                        <hr>

                        <div class="flex justify-between my-4">
                            <p class="p-2"><b>Status</b></p>
                            <select name="status" class="border-2 p-2 w-2/3">
                                <option value="aktif" {{ $user->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="non-aktif" {{ $user->status == 'non-aktif' ? 'selected' : '' }}>Non-aktif</option>
                            </select>
                        </div>
                        <hr>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="items-center mt-3 text-white bg-gradient-to-r from-red-500 via-brown-600 to-black hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
    </div>

    @include('partials.footer')
</body>

</html>

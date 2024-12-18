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
    <title>Detail Barang</title>
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
                    <h1 class="text-3xl font-bold text-[#23292B] mb-8">Detail Barang</h1>
                </div>

                <form action="{{ route('admin.item_update', ['product_name' => $post->product_name]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mx-2 my-4">
                    <!-- Nama Produk -->
                    <div class="flex justify-between my-4">
                        <label for="product_name" class="p-2"><b>Nama Produk</b></label>
                        <input type="text" name="product_name" id="product_name"
                            class="border-2 p-2 w-2/3"
                            value="{{ old('product_name', $post->product_name) }}"
                            required>
                    </div>
                    <hr>

                    <!-- Kategori -->
                    <div class="flex justify-between my-4">
                        <label for="category" class="p-2"><b>Kategori</b></label>
                        <input type="text" name="category" id="category"
                            class="border-2 p-2 w-2/3"
                            value="{{ old('category', $post->category) }}"
                            required>
                    </div>
                    <hr>

                    <!-- Deskripsi -->
                    <div class="flex justify-between my-4">
                        <label for="description" class="p-2"><b>Deskripsi</b></label>
                        <textarea name="description" id="description"
                            class="border-2 p-2 w-2/3"
                            required>{{ old('description', $post->description) }}</textarea>
                    </div>
                    <hr>

                    <!-- Kota -->
                    <div class="flex justify-between my-4">
                        <label for="city" class="p-2"><b>Kota</b></label>
                        <input type="text" name="city" id="city"
                            class="border-2 p-2 w-2/3"
                            value="{{ old('city', $post->city) }}"
                            required>
                    </div>
                    <hr>

                    <!-- Kondisi -->
                    <div class="flex justify-between my-4">
                        <label for="condition" class="p-2"><b>Kondisi</b></label>
                        <input type="text" name="condition" id="condition"
                            class="border-2 p-2 w-2/3"
                            value="{{ old('condition', $post->condition) }}"
                            required>
                    </div>
                    <hr>

                    <!-- Tags -->
                    <div class="flex justify-between my-4">
                        <label for="tags" class="p-2"><b>Tags</b></label>
                        <input type="text" name="tags" id="tags"
                            class="border-2 p-2 w-2/3"
                            value="{{ old('tags', $post->tags) }}">
                    </div>
                    <hr>

                    <!-- Tombol Submit -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="items-center mt-3 text-white bg-gradient-to-r from-red-500 via-brown-600 to-black hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.postingan', $post->product_name) }}"
                            class="items-center mt-3 text-white bg-gradient-to-r from-red-500 via-brown-600 to-black hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            Kembali
                        </a>
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
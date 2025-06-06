<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/index.css"> <!-- Link file CSS eksternal -->
    @vite(['public/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('partials.navbar')

    <div class="container py-5">
        <h1 class="text-2xl font-semibold mb-4">Hasil Pencarian untuk Kategori: "{{ ucfirst($category) }}"</h1>

        @if($items->isEmpty())
            <p class="text-gray-500">Tidak ada hasil yang ditemukan.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($items as $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <a href="{{ route('item.show', $item->id) }}" class="block text-decoration-none text-gray-800">
                            <div class="relative">
                                @if ($item->screenshots->isNotEmpty())
                                    <img src="{{ asset('storage/' . $item->screenshots->first()->path) }}" alt="{{ $item->product_name }}" class="w-full aspect-[16/9] object-cover">
                                @else
                                    <img src="/images/default-item.png" alt="No Image" class="w-full aspect-[16/9] object-cover">
                                @endif
                            </div>
                            <div class="p-4">
                                <h2 class="font-semibold text-lg truncate">{{ $item->product_name }}</h2>
                                <p class="text-sm text-gray-600">Lokasi: {{ $item->city }}</p>
                                <p class="text-sm text-gray-500">Added on: {{ $item->created_at->format('d M Y') }}</p>
                                @if(isset($item->views))
                                    <p class="text-sm text-gray-500">{{ $item->views }} views</p>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-6">
            <a href="{{ url('/') }}" class="text-blue-500 hover:underline">Kembali ke Beranda</a>
        </div>
    </div>

    @include('partials.footer')
</body>

</html>

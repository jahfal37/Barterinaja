<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500&display=swap');
</style>

  <title>@yield('title', 'Dashboard')</title>
  @vite(['public/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <!-- Include Navbar -->
  @include('partials.navbar')

<!-- Banner Slider -->
<div class="container mx-auto" x-data="{ 
        currentSlide: 1, 
        totalSlides: 3, 
        autoSlide() { 
            setInterval(() => { 
                this.currentSlide = this.currentSlide < this.totalSlides ? this.currentSlide + 1 : 1; 
            }, 5000); 
        } 
    }" x-init="autoSlide()">
  
  <!-- Slide Wrapper -->
  <div class="relative w-full h-[350px] overflow-hidden rounded-[15px] ">
    <!-- Slides -->
    <div class="absolute inset-0 flex transition-transform duration-700"
         :style="'transform: translateX(-' + (currentSlide - 1) * 100 + '%);'">
      <!-- Slide 1 -->
      <div class="min-w-full bg-cover bg-center " style="background-image: url('/images/banner2.png');"></div>
      <!-- Slide 2 -->
      <div class="min-w-full bg-cover bg-center" style="background-image: url('/images/banner1.png');"></div>
      <!-- Slide 3 -->
      <div class="min-w-full bg-cover bg-center" style="background-image: url('/images/item1.png');"></div>
    </div>

    <!-- Navigation Controls -->
    <div class="absolute top-1/2 w-full flex justify-between px-4 -translate-y-1/2">
      <!-- Previous Button -->
      <button 
        @click="currentSlide = currentSlide > 1 ? currentSlide - 1 : totalSlides" 
        class="bg-gray-800 text-white p-2 rounded-full opacity-70 hover:opacity-100">
        &#8592;
      </button>
      <!-- Next Button -->
      <button 
        @click="currentSlide = currentSlide < totalSlides ? currentSlide + 1 : 1" 
        class="bg-gray-800 text-white p-2 rounded-full opacity-70 hover:opacity-100">
        &#8594;
      </button>
    </div>

    <!-- Slide Indicators -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
      <template x-for="slide in totalSlides">
        <div 
          @click="currentSlide = slide" 
          :class="currentSlide === slide ? 'bg-yellow-500' : 'bg-gray-300'" 
          class="w-3 h-3 rounded-full cursor-pointer">
        </div>
      </template>
    </div>
  </div>
</div>
  <!-- Most Recent Section -->
  <div class="content">
    <h2 class="section-title">Most Recent</h2>
    <div class="grid">
      @forelse ($items as $item)
      <div class="grid-item shadow-lg">
        <a href="{{ route('item.show', $item->id) }}" style="text-decoration: none; color: inherit;">
          <div class="item-image-wrapper">
            @if ($item->screenshots->isNotEmpty())
            <!-- Tampilkan gambar pertama dari screenshot -->

            <img src="{{ asset('storage/'.$item->screenshots->first()->path) }}" alt="{{ $item->product_name }}" class="item-image">
            @else
            <!-- Gambar default jika tidak ada screenshot -->
            <img src="/images/default-item.png" alt="No Image" class="item-image">
            @endif
          </div>
          <div class=" container p-0 bg-white rounded-md font-poppins font-bold ">
            <p class="">{{ $item->product_name }}</p>
            <p class="">Lokasi : {{ $item->city }}</p> <!-- Tambahkan rating jika ada -->
            <p class="">Added on: {{ $item->created_at->format('d M Y') }}</p>
          </div>
        </a>
      </div>
      @empty
      <p>No recent items available.</p>
      @endforelse
    </div>
  </div>


  <!-- Section untuk Item Terpopuler -->
  <div class="content mt-5">
    <h2 class="section-title">Popular Items This Week</h2>
    <div class="grid">
      @foreach ($popular_items as $item)
      <div class="grid-item shadow-lg">
        <a href="{{ route('item.show', $item->id) }}" style="text-decoration: none; color: inherit;">
          <div class="item-image-wrapper">
            @if ($item->screenshots->isNotEmpty())
            <img src="{{ asset('storage/' . $item->screenshots->first()->path) }}" alt="{{ $item->product_name }}" class="item-image">
            @else
            <img src="/images/default_item.png" alt="Default Image" class="item-image">
            @endif
          </div>
          <div class="container p-0 bg-white rounded-md font-poppins font-bold ">
            <p class=" ">{{ $item->product_name }}</p>
            <small>{{ $item->views }} views</small>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>

  <!-- Include Footer -->
  @include('partials.footer')
</body>

</html>
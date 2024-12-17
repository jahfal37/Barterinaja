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
    <title>@yield('title', 'Dashboard')</title>
    @vite(['public/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <!-- Include Navbar -->
  @include('partials.navbar')
 
 <!-- Banner Section -->
 <div class="container">
   <div class="banner">
     <div class="banner-overlay">
       <div class="text-overlay">Recommended</div>
       <div class="text-overlay">Based on Your Search</div>
     </div>
   </div>
 </div>

<!-- Most Recent Section -->
<div class="content">
  <h2 class="section-title">Most Recent</h2>
  <div class="grid">
    @forelse ($items as $item)
      <div class="grid-item">
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
          <div class="item-info">
            <p class="item-name">{{ $item->product_name }}</p>
            <p class="item-rating">⭐⭐⭐⭐⭐</p> <!-- Tambahkan rating jika ada -->
            <p class="item-date">Added on: {{ $item->created_at->format('d M Y') }}</p>
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
      <div class="grid-item">
        <a href="{{ route('item.show', $item->id) }}" style="text-decoration: none; color: inherit;">
        <div class="item-image-wrapper">
          @if ($item->screenshots->isNotEmpty())
            <img src="{{ asset('storage/' . $item->screenshots->first()->path) }}" alt="{{ $item->product_name }}" class="item-image">
          @else
            <img src="/images/default_item.png" alt="Default Image" class="item-image">
          @endif
          </div>
          <div class="item-info">
            <p class="item-name">{{ $item->product_name }}</p>
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

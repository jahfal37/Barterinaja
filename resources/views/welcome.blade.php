<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Page Utama</title>
  <link rel="stylesheet" href="css/index.css">
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
              <img src="{{ asset('storage/' . $item->screenshots->first()->path) }}" alt="{{ $item->product_name }}" class="item-image">
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

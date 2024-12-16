<!-- resources/views/item/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $item->product_name }} - Item Detail</title>
  <link rel="stylesheet" href="css/index.css">
</head>
<body>
  <!-- Include Navbar -->
  @include('partials.navbar')

  <div class="container">
    <div class="item-detail">
      <h1 class="item-title">{{ $item->product_name }}</h1>
      <p class="item-category">Category: {{ $item->category }}</p>
      <p class="item-city">City: {{ $item->city }}</p>
      <p class="item-condition">Condition: {{ $item->condition }}</p>
      
      <div class="item-description">
        <h3>Description:</h3>
        <p>{{ $item->description }}</p>
      </div>

      <!-- Menampilkan pemilik item -->
      <div class="item-user">
        <h3>Owner: {{ $item->user->username }}</h3>
        <p>Email: {{ $item->user->email }}</p>
      </div>

      <!-- Menampilkan screenshot -->
      @if ($item->screenshots->isNotEmpty())
        <div class="item-images">
          <h3>Screenshots:</h3>
          @foreach ($item->screenshots as $screenshot)
            <img src="{{ asset('storage/' . $screenshot->path) }}" alt="Screenshot" class="item-image">
          @endforeach
        </div>
      @else
        <p>No screenshots available.</p>
      @endif

      <div class="item-actions">
        <a href="#" class="btn btn-buy">Buy Now</a>
        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-edit">Edit Item</a>
      </div>
    </div>
  </div>

  <!-- Include Footer -->
  @include('partials.footer')
</body>
</html>

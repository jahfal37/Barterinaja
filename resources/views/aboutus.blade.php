<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Page Utama</title>
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
  <!-- Include Navbar -->
  @include('partials.navbar')

  <!-- Main Content Section -->
  <div class="main-content">
    <div class="content-container">
      <h1>About Us</h1>
      <!-- Tempat logo di bawah judul -->
      <div class="aboutus-logo">
        <img src="{{ asset('images/logo-bar.png') }}" alt="Logo" />
      </div>
      <h2>BARTERIN AJA</h2>
      <p>Barterin Aja adalah platform yang menghubungkan individu dari berbagai latar belakang untuk saling bertukar barang dan jasa secara langsung. Kami hadir untuk menciptakan solusi ramah lingkungan dan hemat biaya dalam memenuhi kebutuhan Anda. Dengan visi untuk membuat terobosan melalui budaya saling berbagi dan mengurangi limbah, serta misi menyediakan platform yang aman, mudah digunakan, dan transparan, Barterin Aja menawarkan kesempatan barter yang adil dan beragam pilihan barang. Bergabunglah dengan kami dan jadikan dunia lebih baik melalui Barterin Aja!
      </p>
    </div>
  </div>

  <!-- Include Footer -->
  @include('partials.footer')
</body>
</html>

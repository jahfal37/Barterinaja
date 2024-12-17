<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Page Utama</title>
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  @vite(['public/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <!-- Include Navbar -->
  @include('partials.navbar')

  <!-- Main Content Section -->
  <div class="main-content">
    <div class="content-container">
      <h1>FAQ</h1>
      <p>1. Apa itu website barter? </p>
      <p>Website barter adalah platform digital yang memungkinkan pengguna untuk saling menukar barang atau jasa tanpa menggunakan uang.<p>
      <p>2.Fitur apa saja yang harus ada di website barter?</p>
      <ul>
        <li>Registrasi dan profil pengguna: Pengguna dapat membuat akun dan menampilkan informasi tentang barang atau jasa yang mereka tawarkan.</li>
        <li>Kategori produk/jasa: Memudahkan pencarian berdasarkan jenis barang atau jasa.</li>
        <li>Sistem pencocokan: Algoritma yang mencocokkan kebutuhan pengguna dengan penawaran yang relevan.</li>
        <li>Fitur chat: Untuk mempermudah negosiasi dan komunikasi.</li>
        <li>Notifikasi: Mengingatkan pengguna tentang aktivitas seperti penawaran atau permintaan.</li>
      </ul>
    </div>
  </div>

  <!-- Include Footer -->
  @include('partials.footer')
</body>
</html>

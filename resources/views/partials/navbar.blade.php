<nav class="navbar">
  <div class="navbar-left">
      <a href="{{ Auth::check() ? (Auth::user()->role == 'admin' ? url('/admin/dashboard') : (Auth::user()->role == 'user' ? url('/user/dashboard') : url('/index'))) : url('/') }}">
        <img src="{{ asset('images/logo-bar.png') }}" alt="Logo" class="logo" />
      </a>
  </div>
  </div>
    
<!-- Kotak Pencarian Kota -->
<div class="search-rectangle">
  <form action="{{ route('item.search') }}" method="GET" style="display: flex; align-items: center;">
    <input 
      type="text" 
      id="search" 
      name="city" 
      placeholder="Kota" 
      required >
    <button type="submit" class="search-button" style="background-color: transparent; border: none; cursor: pointer;">
      <img 
        src="{{ asset('images/search.png') }}" 
        alt="Search" 
        class="search-icon" 
        style="width: 24px; height: 24px;">
    </button>
  </form>
</div>
  
<!-- Kotak Pencarian Rectangle dengan Logo Pencarian -->
<div class="search-rectangle">
  <form action="{{ route('item.search') }}" method="GET" style="display: flex; align-items: center;">
    <input 
      type="text" 
      id="search" 
      name="query" 
      placeholder="Search..." 
      required >
    <button type="submit" class="search-button" style="background-color: transparent; border: none; cursor: pointer;">
      <img 
        src="{{ asset('images/search.png') }}" 
        alt="Search" 
        class="search-icon" 
        style="width: 24px; height: 24px;">
    </button>
  </form>
</div>

  <div class="navbar-right ">
  <button class="btn-barang {{ request()->is('item/create') ? 'active' : '' }}" onclick="window.location.href='/item/create'">
    <img src="{{ asset('images/jual.png') }}" alt="barang Icon" class="search-icon">
    BARANG
  </button>


  <a href="{{ route('maps.view') }}">
    <img src="{{ asset('images/map.png') }}" alt="Map" class="map-icon">
</a> 
    <!-- Icon Pesan -->
     <div class="">
  <a href="{{ route('messages.index') }}">
    <img src="{{ asset('images/pesan.png') }}" alt="Message Icon" class="message-icon">
  </a></div>
    
    <div class="dropdown">
    <button class="dropdown-button">
        <img src="{{ asset('images/login.png') }}" alt="Login Icon" class="login-icon">
        {{ Auth::check() ? Auth::user()->name : 'Guest' }}
    </button>
    <div class="dropdown-content ">
    @if (Auth::check())
        <a href="{{ route('account') }}" class="dropdown-link hover:bg-gray-200 hover:text-gray-800">Profile</a>
        <a href="{{ route('editAkun') }}" class="dropdown-link hover:bg-gray-200 hover:text-gray-800">Edit Akun</a>
        <a href="{{ route('login') }}" class="dropdown-link hover:bg-gray-200 hover:text-gray-800" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Log Out
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
        <a href="{{ route('login') }}" class="dropdown-link hover:bg-gray-200 hover:text-gray-800">Masuk</a>
    @endif
</div>

</div>

  </div>
</nav>


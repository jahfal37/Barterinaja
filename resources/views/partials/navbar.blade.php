<nav class="navbar">
  <div class="navbar-left">
      <a href="{{ url('/welcome') }}">
        <img src="{{ asset('images/logo-bar.png') }}" alt="Logo" class="logo" />
      </a>

    
    <!-- Kotak Pencarian Kota -->
    <div class="search-rectangle">
      <input type="text" id="Kota" placeholder="Pilih kota">
      <button class="search-button">
        <img src="{{ asset('images/search.png') }}" alt="Search" class="search-icon">
      </button>
    </div>
  
    <!-- Kotak Pencarian Rectangle dengan Logo Pencarian -->
    <div class="search-rectangle">
      <input type="text" id="search" placeholder="Search...">
      <button class="search-button">
        <img src="{{ asset('images/search.png') }}" alt="Search" class="search-icon">
      </button>
    </div>
  </div>

  <div class="navbar-right">
  <button class="btn-jual {{ request()->is('item/create') ? 'active' : '' }}" onclick="window.location.href='/item/create'">
    <img src="{{ asset('images/jual.png') }}" alt="Jual Icon" class="search-icon">
    JUAL
  </button>



    <img src="{{ asset('images/map.png') }}" alt="Map" class="map-icon">
    
    <!-- Icon Pesan -->
    <img src="{{ asset('images/pesan.png') }}" alt="Message Icon" class="message-icon">
    
    <div class="dropdown">
    <button class="dropdown-button">
        <img src="{{ asset('images/login.png') }}" alt="Login Icon" class="login-icon">
        {{ Auth::check() ? Auth::user()->username : 'Guest' }}
    </button>
    <div class="dropdown-content">
        @if (Auth::check())
            <a href="{{ route('account') }}" class="dropdown-link">Akun</a>
            <a href="#" class="dropdown-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}" class="dropdown-link">Masuk</a>
        @endif
    </div>
</div>

  </div>
</nav>


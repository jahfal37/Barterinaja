<nav class="navbar">
  <div class="navbar-left">
      <a href="{{ Auth::check() ? (Auth::user()->role == 'admin' ? url('/admin/dashboard') : (Auth::user()->role == 'user' ? url('/user/dashboard') : url('/index'))) : url('/index') }}">
        <img src="{{ asset('images/logo-bar.png') }}" alt="Logo" class="logo" />
      </a>
  </div>
  </div>
    
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

  <div class="navbar-right ">
  <button class="btn-barang {{ request()->is('item/create') ? 'active' : '' }}" onclick="window.location.href='/item/create'">
    <img src="{{ asset('images/jual.png') }}" alt="barang Icon" class="search-icon">
    BARANG
  </button>


  <a href="{{ route('maps') }}">
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
        <a href="{{ route('account') }}" class="dropdown-link hover:bg-gray-200 hover:text-gray-800">Akun</a>
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


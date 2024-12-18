<footer class="bg-gradient-to-r from-[#1a1a1a] to-[#4e2a1f] text-white py-[0] px-6 w-full">
  <div class="container mx-auto flex flex-col lg:flex-row justify-between space-y-4 lg:space-y-0">
    <!-- Kategori Populer -->
    <div class="footer-column">
      <h4 class="footer-title text-lg font-semibold mb-3">KATEGORI POPULER</h4>
      <ul class="space-y-2">
        <li><a href="#" class="text-gray-400 hover:text-white">Kategori</a></li>
        <li><a href="#" class="text-gray-400 hover:text-white">Kategori</a></li>
        <li><a href="#" class="text-gray-400 hover:text-white">Kategori</a></li>
        <li><a href="#" class="text-gray-400 hover:text-white">Kategori</a></li>
      </ul>
    </div>
    <!-- Pencarian Populer -->
    <div class="footer-column">
      <h4 class="footer-title text-lg font-semibold mb-3">PENCARIAN POPULER</h4>
      <ul class="space-y-2">
        <li><a href="#" class="text-gray-400 hover:text-white">Item</a></li>
        <li><a href="#" class="text-gray-400 hover:text-white">Item</a></li>
        <li><a href="#" class="text-gray-400 hover:text-white">Item</a></li>
        <li><a href="#" class="text-gray-400 hover:text-white">Item</a></li>
      </ul>
    </div>
    <!-- Barterin -->
    <div class="footer-column">
      <h4 class="footer-title text-lg font-semibold mb-3">BARTERIN</h4>
      <ul class="space-y-2">
        <li><a href="{{ route('faq') }}" class="text-gray-400 hover:text-white">FAQ</a></li>
        <li><a href="{{ route('aboutus') }}" class="text-gray-400 hover:text-white">About Us</a></li>
        <li><a href="#" class="text-gray-400 hover:text-white">Contact Support</a></li>
      </ul>
    </div>
  </div>
  
  <!-- Copyright Section (Optional) -->
  <div class="text-center text-gray-400 text-sm">
    <p>&copy; {{ date('Y') }} Barterin. All Rights Reserved.</p>
  </div>
</footer>

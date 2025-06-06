<!-- resources/views/partials/sidebar.blade.php -->
<div class="min-h-screen flex flex-row bg-gray-100">
    <!-- Sidebar -->
    <div class="flex flex-col w-72 bg-gray-100 text-white overflow-hidden px-4">
        <h1 class="text-center font-bold italic text-xl my-4 text-black">MENU</h1>
        <ul class="flex flex-col p-0 m-0">
            <!-- Dashboard -->

            <li>
                <a href="{{ route('admin.dashboard') }}" id="dashboard" class=" container flex items-center h-12 bg-gray-800 px-4 m-1 hover:bg-red-900 ">
                    Dashboard
                </a>
            </li>
            <!-- Manajemen Postingan -->
            <li> 
                <a href="{{route('admin.postingan')}}" id="manajemen-postingan" class=" container flex items-center h-12 bg-gray-800 px-4 m-1 hover:bg-red-900 ">
                    Manajemen Postingan
                </a>
            </li>
            <!-- Pengguna -->
            <li>
                <a href="{{ route('admin.pengguna') }}" class=" container flex items-center h-12 bg-gray-800 px-4 m-1 hover:bg-red-900">
                    Pengguna
                </a>
            </li>
            <!-- Laporan -->
            <li>
                <a href="{{ route('report')}}"  id="laporan" class=" container flex items-center h-12 bg-gray-800 px-4 m-1 hover:bg-red-900">
                    Laporan
                </a>
            </li>
            <!-- Logout -->
            <li>
                <a href="{{ route('login') }}" id="login" class=" container flex items-center h-12 bg-gray-800 px-4 m-1 hover:bg-red-900">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</div>

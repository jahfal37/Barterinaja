<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Update Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Form Laporan Update Website</h1>

        @if(session('success'))
        <div class="mb-4 p-4 text-green-800 bg-green-100 rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        <form 
            id="reportForm" 
            action="{{ route('report_store') }}" 
            method="POST" 
            class="bg-white p-6 rounded-lg shadow-lg space-y-4"
        >
            @csrf

            <div>
                <label for="title" class="block text-gray-700 font-medium">Judul Laporan:</label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    required 
                    class="mt-2 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Masukkan judul laporan"
                >
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-medium">Deskripsi Laporan:</label>
                <textarea 
                    id="description" 
                    name="description" 
                    required 
                    class="mt-2 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    rows="5"
                    placeholder="Masukkan deskripsi laporan"
                ></textarea>
            </div>

            <div class="text-right">
                <button 
                    type="button" 
                    id="submitButton" 
                    class="px-4 py-2 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500"
                >
                    Kirim Laporan
                </button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('submitButton').addEventListener('click', function () {
            alert('Silahkan login terlebih dahulu.');
            window.location.href = "/login "; 
        });
    </script>
</body>
</html>

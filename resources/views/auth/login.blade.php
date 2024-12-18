<!-- resources/views/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['public/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
    <style>
        /* Reset Default */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Body Background */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('/images/bg.png') no-repeat center center fixed;
            background-size: cover;
        }

        /* Main Container */
        .container {
            display: flex;
            width: 800px;
            height:500px;
            border-radius: 25px;
            background: #fff;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Gambar Sebelah Kiri */
        .left-side {
            flex: 1.2;
            background: url('/images/bglogin.png') no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .left-side img {
            width: 65%;
            height: auto;
        }

        /* Form Sebelah Kanan */
        .right-side {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            background-color: #fff;
        }

        .form-container {
            width: 100%;
            max-width: 350px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 45px;
            font-size: 1.8rem;
            color: grey;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 15px;
            font-size: 1rem;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: grey;
            color: #fff;
            border: none;
            border-radius: 20px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #333;
        }

        .links {
            text-align: center;
            margin-top: 15px;
        }

        .links a {
            color: grey;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }

        /* Alert Styling */
        .alert {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            color: #fff;
            font-size: 0.9rem;
            background-color: #f44336;
            text-align: center;
        }
    </style>
</head>
<body>
  <div class="container">
    <div class="left-side">
      <!-- Gambar di sisi kiri -->
    </div>
    <div class="right-side">
      <div class="form-container">
        <h2>LOGIN</h2>
        <form action="{{ route('login.submit') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" required>
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            @if(session('message'))
        <div id="alert" class="alert alert-{{ session('alert-type') }}">
            {{ session('message') }}
            <a href="#" class="alert-close" onclick="closeAlert()">×</a>
        </div>
    @endif
        </div>
          <button type="submit">Login</button>
        </form>
        @if(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
        <div class="links">
          <p>Don't have an account? <a href="{{ route('signup') }}">Sign up here</a></p>
          <p><a href="#">Contact support</a></p>
            <!-- JavaScript -->
    <script>
        // Fungsi untuk menutup notifikasi secara manual
        function closeAlert() {
            const alertBox = document.getElementById('alert');
            if (alertBox) {
                alertBox.style.opacity = '0'; // Efek transisi
                alertBox.style.transform = 'translateY(-20px)'; // Efek geser ke atas
                setTimeout(() => alertBox.remove(), 500); // Hapus elemen setelah animasi
            }
        }

        // Otomatis hilangkan notifikasi setelah 5 detik
        setTimeout(() => {
            closeAlert();
        }, 5000); // 5000 ms = 5 detik
    </script>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<!-- resources/views/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['public/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('/images/bg.png') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            display: flex;
            width: 80%;
            height: 70%;
            border-radius: 10px;
            overflow: hidden;
        }

        .left-side {
            flex: 2;
            background: url('/images/bglogin.png') no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .right-side {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            padding: 20px;
        }

        .form-container {
            width: 100%;
            max-width: 350px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: grey;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 20px;
            font-size: 1rem;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: grey;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .form-container .links {
            text-align: center;
            margin-top: 10px;
        }

        .form-container .links a {
            color: grey;
            text-decoration: none;
        }

        .form-container .links a:hover {
            text-decoration: underline;
        }

        .alert {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            font-size: 1rem;
            z-index: 1000;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            opacity: 1; /* Awalnya terlihat */
            transition: opacity 0.5s ease, transform 0.5s ease; /* Efek hilang */
        }
        .alert-success {
            background-color: #4caf50; /* Hijau */
        }
        .alert-error {
            background-color: #f44336; /* Merah */
        }
        .alert-close {
            margin-left: 20px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }
        .alert-close:hover {
            text-decoration: underline;
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

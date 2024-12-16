<!-- resources/views/signup.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
    </style>
</head>

<body>
    <div class="container">
        <div class="left-side">
            <!-- Gambar di sisi kiri -->
        </div>
        <div class="right-side">
            <div class="form-container">
                <h2>CREATE YOUR ACCOUNT</h2>
                <form action="{{ route('signup.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="name" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="Username" name="username" id="username" class="form-control" value="{{ old('username') }}" required>
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
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Signup</button>
                </form>
                <div class="links">
                    <p><a href="#">Contact support</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
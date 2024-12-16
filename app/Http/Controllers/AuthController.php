<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController
{
    public function showLoginForm()
    {
        return view('auth.login');  // Pastikan ada view 'auth.login' di resources/views/auth
    }
    // Menampilkan form login
    public function handleLogin(Request $request)
    {
        // Validasi input login
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Cari pengguna berdasarkan username
        $user = User::where('username', $request->username)->first();
    
        // Periksa apakah pengguna ditemukan dan apakah kata sandi cocok
        if ($user && $request->password === $user->password) {  // Perbandingan langsung kata sandi
            Auth::login($user); // Login pengguna
    
            // Tambahkan pesan sukses
            session()->flash('message', 'Berhasil login! Selamat datang, ' . $user->name);
            session()->flash('alert-type', 'success');
    
            // Redirect berdasarkan peran pengguna
            return redirect()->route('welcome');  // Redirect ke halaman selamat datang atau dashboard
        }
    
        // Jika login gagal, tambahkan pesan kesalahan
        return back()
            ->with('message', 'Username atau password salah!')
            ->with('alert-type', 'error');
    }
    
    public function handleSignup(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'name'  => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',  // Konfirmasi password

        ]);
    
        // Simpan kata sandi dalam bentuk teks biasa
        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => $request->password,

        ]);
    
        // Login pengguna setelah akun dibuat
        Auth::login($user);
    
        // Redirect ke halaman setelah signup sukses
        return redirect()->route('login');
    }

    // Menampilkan form signup
    public function showSignupForm()
    {
        return view('auth.signup');
    }

    
    // Logout
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Optional: Invalidate the user's session to avoid reuse
        $request->session()->invalidate();

        // Optional: Regenerate session token for security
        $request->session()->regenerateToken();

        // Redirect ke halaman login setelah logout
        return redirect('/login')->with('success', 'Berhasil Keluar.');
    }

    // Menampilkan dashboard user
    public function user()
    {
        return view('user.dashboard');
    }

    // Menampilkan dashboard admin
    public function admin()
    {
        return view('admin.dashboard');
    }

    // Menampilkan halaman welcome
    public function welcome()
    {
        return view('welcome');  // Pastikan Anda memiliki file 'welcome.blade.php' di resources/views
    }
}

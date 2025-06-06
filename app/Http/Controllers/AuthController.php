<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Item;
use App\Models\Report;
class AuthController extends Controller
{
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
    if ($user && $request->password === $user->password) {  // Perbandingan langsung kata sandi (tidak disarankan untuk produksi)
        Auth::login($user); // Login pengguna

        // Tambahkan pesan sukses
        session()->flash('message', 'Berhasil login! Selamat datang, ' . $user->name);
        session()->flash('alert-type', 'success');

        // Redirect berdasarkan peran pengguna
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard'); // Redirect ke admin dashboard
        }

        // Redirect ke halaman default untuk pengguna lain
        return redirect()->route('user.dashboard');
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
    public function showLoginForm()
    {
        // Pastikan view 'auth.login' ada di resources/views/auth
        return view('auth.login');
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

    // Menampilkan halaman index
    public function index()
    {
        return view('index');  // Pastikan Anda memiliki file 'index.blade.php' di resources/views
    }

    public function showForm()
    {
        $reports = Report::all();
        return view('report',compact('reports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        Report::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->check() ? auth()->id() : null, // Add the authenticated user's ID or null if not authenticated
        ]);
    
        return redirect()->route('report')->with('success', 'Laporan berhasil dikirim!');
    }
    
//     public function Formindex()
//     {
//         $reports = Report::all();
//         return view('form', compact('reports'));
//     }
//     Route::get('/reports', function () {
//     return view('reports'); // ganti 'reports' dengan nama view Anda
// })->middleware('auth')->name('reports_form');

// Route::post('/reports/store', [ReportController::class, 'store'])->middleware('auth')->name('report_store');

}

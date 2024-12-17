<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\User; // Pastikan model User sudah digunakan

use function Laravel\Prompts\password;

class UserDataController extends Controller
{
    // Method untuk membaca semua data dari tabel 'users'
    public function index()
    {
        // Ambil data dari tabel 'users' hanya kolom tertentu
        $users = User::all();

        // Kirim data ke view untuk ditampilkan
        return view('admin.pengguna', compact('users'));
    }

    // Method untuk membaca satu data berdasarkan username
    // public function show($username)
    public function show($username)
    {
        // Ambil user berdasarkan username
        $user = User::where('username', $username)->firstOrFail();
        
        // Kirim data user ke view 'admin.show'
        return view('admin.show', compact('users'));
    }
    

    public function edit($username)
    {
        // Ambil data user berdasarkan username
        $user = User::where('username', $username)->firstOrFail();
        // Kirim data ke view 'admin.edit'
        return view('admin.user_edit', compact('user'));
    }

    /**
     * Memperbarui data user.
     */
    public function update(Request $request, $username)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $username,
            'password' => 'nullable|string|min:8',
            'store_name' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,' . $username,
            'status' => 'required|in:aktif,non-aktif',
        ]);

        // Cari user berdasarkan username
        $user = User::where('username', $username)->firstOrFail();

        // Update data user
        $user->name = $request->name;
        $user->username = $request->username;

        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $user->password = $request->password;
        }

        $user->store_name = $request->store_name;
        $user->contact_number = $request->contact_number;
        $user->bio = $request->bio;
        $user->city = $request->city;
        $user->email = $request->email;
        $user->status = $request->status;

        // Simpan perubahan
        $user->save();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('admin.pengguna')->with('success', 'User berhasil diperbarui.');

    }
    public function admin()
    {
      // Total postingan dari tabel items
    $totalPostingan = Item::count();

    // Total pengguna dengan role 'user'
    $totalPengguna = User::where('role', 'user')->count();

    // Total transaksi sama dengan total postingan
    
    // Kirim data ke view
    return view('admin.dashboard', compact('totalPostingan', 'totalPengguna'));
    }
}

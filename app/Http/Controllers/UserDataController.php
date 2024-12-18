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
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $user->id,
        'password' => 'nullable|string|min:8',
        'store_name' => 'nullable|string|max:255',
        'contact_number' => 'nullable|string|max:255',
        'bio' => 'nullable|string',
        'city' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255|unique:users,email,' . $user->id,
        'status' => 'required|in:aktif,non-aktif',
    ]);

    $user->name = $request->name;
    $user->username = $request->username;

    if ($request->filled('password')) {
        $user->password = $request->password;
    }

    $user->store_name = $request->store_name;
    $user->contact_number = $request->contact_number;
    $user->bio = $request->bio;
    $user->city = $request->city;
    $user->email = $request->email;
    $user->status = $request->status;

    $user->save();

    return redirect()->route('admin.pengguna')->with('success', 'User berhasil diperbarui.');
}

}

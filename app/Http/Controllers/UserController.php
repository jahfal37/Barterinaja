<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();
        return view('editakun', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'store_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id, // Pastikan username unik
            'contact_number' => 'required|string|max:15',
            'bio' => 'nullable|string|max:1000',
            'city' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed', // Optional, but if provided, must be confirmed
        ]);

        // Menangani upload profile picture jika ada
        if ($request->hasFile('profile_picture')) {
            // Menyimpan gambar dan mendapatkan path-nya
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        // Update data pengguna lainnya
        $user->store_name = $request->store_name;
        $user->username = $request->username;
        
         // Pastikan tidak ada perubahan pada email
        $user->contact_number = $request->contact_number;
        $user->bio = $request->bio;
        $user->city = $request->city;

        // Update password jika ada perubahan
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan
        $user->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('account')->with('success', 'Profil berhasil diperbarui!');
    }
}

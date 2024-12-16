<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataPengguna extends Model
{
    use HasFactory;

    // Nama tabel yang akan digunakan (jika tidak sesuai dengan plural Laravel)
    protected $table = 'users';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'store_name', // Nama toko pengguna
        'name',      // Nama pengguna
        'email',     // Email pengguna
        'status',    // Status pengguna (aktif/tidak)
        'password',  // Password pengguna
        'username',  // Username pengguna
        'contact_number', // Nomor kontak pengguna
        'bio',       // Bio pengguna
        'city',      // Kota pengguna
    ];

    // Kolom yang disembunyikan
    protected $hidden = [
        'password', 'remember_token',
    ];
}

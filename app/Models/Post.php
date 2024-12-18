<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'items';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['id', 'product_name', 'category', 'user_id','description','city','condition'];

    // Relasi ke tabel users
        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
protected $table = 'posts';
    protected $fillable = ['title', 'content', 'username', 'status'];

    // Jika Anda ingin mendefinisikan hubungan antara model Post dan User
    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
}

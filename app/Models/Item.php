<?php

// app/Models/Item.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'category',
        'tags',
        'description',
        'city',
        'condition',
        'user_id', // Menambahkan user_id ke dalam fillable
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function screenshots()
    {
        return $this->hasMany(Screenshot::class, 'item_id');
    }
 
    public function index() {
        // Ambil semua data dari tabel 'items'
        $items = Item::all();
    
        // Periksa apakah data kosong
        if ($items->isEmpty()) {
            // Jika kosong, kirim pesan ke view
            $items = [];
        }
    
        // Kirim data ke view
        return view('items.index', ['items' => $items]);
    }
}



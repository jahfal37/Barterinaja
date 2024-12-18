<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'path'];

    // Relasi dengan model Item
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}

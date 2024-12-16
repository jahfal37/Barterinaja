<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function account()
    {
        $user = Auth::user(); // Mengambil data pengguna yang login
        $items = $user->items; // Mengambil semua item yang dimiliki oleh pengguna yang login
    
        return view('akun', compact('user', 'items'));
    }
}



    
 




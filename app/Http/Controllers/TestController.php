<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;

class TestController extends Controller
{
    public function admin()
    {
      // Total postingan dari tabel items
  
    $kiw = Item::all();
    
    // Total pengguna dengan role 'user'
    $totalPengguna = User::where('role', 'user')->count();


    return view('admin.dashboard', compact('kiw', 'totalPengguna'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
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

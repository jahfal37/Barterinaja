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
      $totalPostingan = Item::count(); // Menghitung total postingan
      
      // Total pengguna dengan role 'user'
      $totalPengguna = User::where('role', 'user')->count();
      
      // Total transaksi, disamakan dengan totalPostingan
      $totalTransaksi = $totalPostingan;

      return view('admin.dashboard', compact('totalPostingan', 'totalPengguna', 'totalTransaksi'));
  }
}
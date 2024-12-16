<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ABOUTUSController extends Controller
{
    public function index()
    {
        return view('aboutus'); // Pastikan Anda memiliki file Blade `aboutus.blade.php`
    }
}



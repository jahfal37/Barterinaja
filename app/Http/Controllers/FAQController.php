<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        return view('faq'); // Pastikan Anda memiliki file Blade `faq.blade.php`
    }
}



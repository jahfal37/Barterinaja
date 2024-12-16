<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Menampilkan daftar semua postingan.
     *
     * @return \Illuminate\View\View
     */
    public function admin()
    {
        $posts = Post::select('title', 'content', 'username', 'status')
        ->orderBy('id', 'asc') // Urutkan berdasarkan ID secara ascending
        ->get();

    // Mengirim data ke view
    return view('admin.postingan', compact('posts'));
    }
    

    
    // Fungsi lainnya dapat ditambahkan di sini, seperti create, store, show, update, delete, dll.
}

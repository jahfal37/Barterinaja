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
    public function index()
    {
        $posts = Post::with('user')
        ->select('id','product_name', 'user_id', 'category','description','city','condition','tags')
        ->orderBy('id', 'asc') // Urutkan berdasarkan ID secara ascending
        ->get();

    // Mengirim data ke view
    return view('admin.postingan', compact('posts'));
    }
    
    public function show($product_name)
{
    // Cari data berdasarkan product_name
    $post = Post::where('product_name', $product_name)->first();

    // Jika tidak ditemukan, redirect atau tampilkan error
    if (!$post) {
        abort(404, 'Barang tidak ditemukan');
    }

    // Kembalikan view detail dengan data post
    return view('admin.item_detail', compact('post'));
}
    public function edit($product_name)
{
    // Cari data berdasarkan product_name
    $post = Post::where('product_name', $product_name)->first();

    if (!$post) {
        return redirect()->route('admin.item_detail')->with('error', 'Item tidak ditemukan.');
    }

    // Kirim data ke view edit
    return view('admin.edit_post', compact('post'));
}

public function update(Request $request, $product_name)
{
    // Validasi input
    $request->validate([
        'product_name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'description' => 'required|string',
        'city' => 'required|string|max:255',
        'condition' => 'required|string|max:255',
        'tags' => 'nullable|string',
    ]);

    // Cari data berdasarkan product_name
    $post = Post::where('product_name', $product_name)->first();

    if (!$post) {
        return redirect()->route('admin.item_detail')->with('error', 'Item tidak ditemukan.');
    }

    // Update data
    $post->update([
        'product_name' => $request->product_name,
        'category' => $request->category,
        'description' => $request->description,
        'city' => $request->city,
        'condition' => $request->condition,
        'tags' => $request->tags,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('admin.postingan', ['product_name' => $post->product_name])
                     ->with('success', 'Item berhasil diperbarui.');

}
public function destroy($product_name)
{
    // Cari data berdasarkan product_name
    $post = Post::where('product_name', $product_name)->first();

    // Jika data tidak ditemukan
    if (!$post) {
        return redirect()->route('admin.postingan')->with('error', 'Item tidak ditemukan.');
    }

    // Hapus data dari database
    $post->delete();

    // Redirect kembali ke halaman admin.postingan dengan pesan sukses
    return redirect()->route('admin.postingan')->with('success', 'Item berhasil dihapus.');
}
// Fungsi lainnya dapat ditambahkan di sini, seperti create, store, show, update, delete, dll.
}
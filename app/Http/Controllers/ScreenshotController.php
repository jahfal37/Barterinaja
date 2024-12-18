<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Screenshot;
use Illuminate\Http\Request;

class ScreenshotController extends Controller
{
    // Fungsi untuk menyimpan beberapa screenshot
    public function store(Request $request, $itemId)
    {
        // Validasi input file gambar
        $request->validate([
            'screenshots' => 'required|array|max:12', // Maksimal 12 file
            'screenshots.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi per file
        ]);

        // Menemukan item berdasarkan ID yang dikirim
        $item = Item::find($itemId);

        if (!$item) {
            return redirect()->back()->with('error', 'Item tidak ditemukan.');
        }



        // Redirect atau memberikan response sukses
        return redirect()->back()->with('success', 'Semua screenshot berhasil diupload!');
    }
    
}

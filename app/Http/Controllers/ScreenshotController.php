<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Screenshot;
use Illuminate\Http\Request;

class ScreenshotController extends Controller
{
    // Fungsi untuk menyimpan screenshot
    public function store(Request $request, $itemId)
    {
        // Validasi file gambar
        $request->validate([
            'screenshot' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan file gambar ke public folder
        $imagePath = $request->file('screenshot')->store('screenshots', 'public');

        // Menemukan item berdasarkan ID yang dikirim
        $item = Item::find($itemId);

        if ($item) {
            // Menyimpan screenshot terkait dengan item
            Screenshot::create([
                'path' => $imagePath, // Path gambar yang disimpan
                'item_id' => $item->id, // ID item yang terkait
            ]);

            // Redirect atau memberikan response sukses
            return redirect()->back()->with('success', 'Screenshot berhasil diupload!');
        } else {
            return redirect()->back()->with('error', 'Item tidak ditemukan.');
        }
    }
}

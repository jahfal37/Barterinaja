<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Screenshot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('screenshots')->orderBy('created_at', 'desc')->take(10)->get(); // Mengambil 10 item terbaru
        $popular_items = Item::with('screenshots')->orderBy('views', 'desc')->take(10)->get();

        return view('welcome', compact('items','popular_items'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'tags' => 'nullable|string|max:255',
            'description' => 'required|string',
            'city' => 'required|string|max:255',
            'condition' => 'required|string|max:50',
            'screenshots.*' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:5120', // Max 5MB per gambar
        ]);

        // Simpan item terlebih dahulu dan kaitkan dengan user yang sedang login
        $item = Item::create([
            'product_name' => $request->product_name,
            'category' => $request->category,
            'tags' => $request->tags,
            'description' => $request->description,
            'city' => $request->city,
            'condition' => $request->condition,
            'user_id' => Auth::id(), // Menyimpan ID user yang sedang login
        ]);

        // Simpan screenshot jika ada
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $file) {
                $path = $file->store('screenshots', 'public');
                Screenshot::create([
                    'path' => $path,
                    'item_id' => $item->id, // Relasi dengan item yang baru dibuat
                ]);
            }
        }

        return redirect()->back()->with('success', 'Item berhasil disimpan!');
    }

    public function show($id)
    {
        $item = Item::findOrFail($id); // Cari item berdasarkan ID
        $item->increment('views');
        $related_items = Item::where('id', '!=', $id)->take(8)->get(); // Ambil item terkait

        return view('item.show', compact('item', 'related_items'));
    }


}


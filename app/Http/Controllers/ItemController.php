<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Screenshot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('screenshots')->orderBy('created_at', 'desc')->take(5)->get(); // Mengambil 5 item terbaru
        $popular_items = Item::with('screenshots')->orderBy('views', 'desc')->take(5)->get();

        return view('index', compact('items', 'popular_items'));
    }

    public function user()
    {
        $items = Item::with('screenshots')->orderBy('created_at', 'desc')->take(5)->get(); // Mengambil 5 item terbaru
        $popular_items = Item::with('screenshots')->orderBy('views', 'desc')->take(5)->get();

        return view('user.dashboard', compact('items', 'popular_items'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'tags' => 'nullable|string|max:255',
            'description' => 'required|string',
            'city' => 'required|string|max:255',
            'condition' => 'required|string|max:50',
            'screenshots.*' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:5120', // Max 5MB per gambar
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',

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
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
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

        return redirect('/user/dashboard')->with('success', 'Item berhasil disimpan!');
    }

    public function show($id)
    {
        $items = Item::findOrFail($id); // Cari item berdasarkan ID
        $items->increment('views');
        $related_items = Item::where('id', '!=', $id)->take(5)->get(); // Ambil item terkait

        return view('item.show', compact('items', 'related_items'));
    }
    public function maps()
    {
        return view('maps');  // Pastikan Anda memiliki file 'maps.blade.php' di resources/views
    }
    public function getItems()
    {
        // Ambil semua item dengan latitude dan longitude
        $items = Item::whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get(['id', 'product_name', 'latitude', 'longitude', 'description']); // Pilih kolom yang dibutuhkan

        return response()->json($items);
    }
    public function search(Request $request)
{
    $query = $request->input('query'); // Ambil input dari form pencarian berdasarkan product_name
    $city = $request->input('city');   // Ambil input dari form pencarian berdasarkan city

    // Cari berdasarkan product_name di tabel items
    $items = Item::where('product_name', 'LIKE', "%{$query}%")
                 ->where('city', 'LIKE', "%{$city}%") // Menambahkan kondisi pencarian berdasarkan city
                 ->get();

    // Kirim hasil pencarian ke view
    return view('item.search_results', compact('items', 'query', 'city'));
}
public function showByCategory($category)
{
    // Ambil semua item dengan kategori yang dipilih, urutkan berdasarkan views terbanyak
    $items = Item::where('category', $category)
                 ->orderByDesc('views')  // Urutkan berdasarkan views terbanyak
                 ->get();

    return view('item.category', compact('items', 'category'));
}

public function destroy($id)
{
    $item = Item::findOrFail($id);

    // Pastikan hanya pemilik item yang bisa menghapusnya
    if ($item->user_id !== auth()->id()) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    // Hapus item
    $item->delete();

    return response()->json(['success' => 'Item berhasil dihapus']);
}
}

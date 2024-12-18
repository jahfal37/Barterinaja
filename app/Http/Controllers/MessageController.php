<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // Menampilkan form untuk memilih username penerima dan menampilkan pesan
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();  // Menampilkan semua pengguna yang bukan diri kita sendiri
        return view('messages.index', compact('users'));
    }

    // Menampilkan pesan antar dua pengguna
    public function chat($receiver_id)
    {
        $user = Auth::user();
    
        $receiver = User::findOrFail($receiver_id); // Ambil data penerima
    
        $messages = Message::with(['sender', 'receiver'])
            ->where(function($query) use ($user, $receiver_id) {
                $query->where('sender_id', $user->id)
                      ->where('receiver_id', $receiver_id);
            })
            ->orWhere(function($query) use ($user, $receiver_id) {
                $query->where('sender_id', $receiver_id)
                      ->where('receiver_id', $user->id);
            })
            ->orderBy('created_at', 'asc')
            ->get();
    
        return view('messages.chat', [
            'messages' => $messages,
            'receiver' => $receiver, // Kirim data penerima
            'receiver_id' => $receiver_id
        ]);
    }
    

    // Menyimpan pesan baru
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:255',
        ]);

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
        ]);

        return redirect()->route('messages.chat', ['receiver_id' => $request->receiver_id]);
    }
}


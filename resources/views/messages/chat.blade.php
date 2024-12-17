<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/index.css">
    @vite(['public/css/app.css', 'resources/js/app.js'])

    <style>
        /* Styling untuk judul */
        h2 {
            text-align: center;
            margin-top: 20px;
            color: #343a40;
            font-size: 1.8rem;
        }

        /* Container untuk chat messages */
        .messages {
            max-width: 600px;
            margin: 20px auto;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            overflow-y: auto;
            height: 400px;
        }

        /* Styling untuk pesan */
        .message {
            display: flex;
            flex-direction: column;
            margin: 10px 0;
        }

        .message-sent {
            align-items: flex-end;
        }

        .message-received {
            align-items: flex-start;
        }

        .message-content {
            max-width: 70%;
            padding: 10px 15px;
            border-radius: 15px;
            font-size: 1rem;
        }

        .message-sent .message-content {
            background-color: #d1e7dd; /* Hijau pucat */
            color: #0f5132;
        }

        .message-received .message-content {
            background-color: #f8d7da; /* Merah pucat */
            color: #842029;
        }

        .message-time {
            font-size: 0.8rem;
            color: #6c757d;
        }

        /* Form input untuk mengirim pesan */
        .chat-form {
            max-width: 600px;
            margin: 20px auto;
            display: flex;
            gap: 10px;
        }

        .chat-form input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .chat-form button {
            padding: 10px 20px;
            border: none;
            background-color: #CEBC88;
            color: white;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .chat-form button:hover {
            background-color: #f7c12c;
        }
    </style>
</head>
<body>
    @include('partials.navbar')

    <!-- Chat Header -->
    <h2>Chat dengan {{ $receiver_id }}</h2>

    <!-- Chat Messages Section -->
    <div class="messages">
        @foreach ($messages as $message)
            <div class="message {{ $message->sender_id == Auth::id() ? 'message-sent' : 'message-received' }}">
                <div class="message-content">
                    <p>{{ $message->content }}</p>
                </div>
                <small class="message-time">{{ $message->created_at->format('H:i') }}</small>
            </div>
        @endforeach
    </div>

    <!-- Chat Input Form -->
    <form action="{{ route('messages.store') }}" method="POST" class="chat-form">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $receiver_id }}">
        <input type="text" name="content" placeholder="Tulis pesan..." required>
        <button type="submit"class="btn btn-costum">Kirim</button>
    </form>

    @include('partials.footer')
</body>
</html>

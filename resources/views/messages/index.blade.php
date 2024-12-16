<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan & Chat</title>
    <link rel="stylesheet" href="/css/index.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f9f9f9;
        }
        .container {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 25%;
            background: #ddd;
            display: flex;
            flex-direction: column;
        }
        .tabs {
            display: flex;
            border-bottom: 1px solid #ccc;
        }
        .tab {
            flex: 1;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            background: #f1f1f1;
        }
        .tab.active {
            background: white;
            border-bottom: 2px solid red;
        }
        .content {
            display: none;
            padding: 10px;
            flex: 1;
            overflow-y: auto;
        }
        .content.active {
            display: block;
        }
        .chat-area {
            width: 75%;
            background: white;
            display: flex;
            flex-direction: column;
            border-left: 1px solid #ccc;
        }
        .chat-header, .chat-footer {
            background: #f1f1f1;
            padding: 10px;
        }
        .chat-body {
            flex-grow: 1;
            padding: 10px;
            overflow-y: auto;
        }
        .list-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .list-item:hover {
            background: #eaeaea;
        }
        .profile-icon {
            width: 40px;
            height: 40px;
            background: #666;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Tabs -->
            <div class="tabs">
                <div class="tab active" onclick="openTab(event, 'produk')">Produk</div>
                <div class="tab" onclick="openTab(event, 'chat')">Chat</div>
            </div>

            <!-- Produk Content -->
            <div id="produk" class="content active">
                @foreach ($products as $product)
                    <div class="list-item">
                        <div class="profile-icon">P</div>
                        <div>
                            <strong>{{ $product['name'] }}</strong><br>
                            <small>{{ $product['seller'] }}</small>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Chat Content -->
            <div id="chat" class="content">
                @foreach ($chats as $chat)
                    <div class="list-item">
                        <div class="profile-icon">C</div>
                        <div>
                            <strong>{{ $chat->username }}</strong><br>
                            <small>{{ Str::limit($chat->content, 30) }}</small>
                        </div>
                    </div>
                @endforeach
                <button class="btn btn-custom" style="margin: 10px;">Muat Lainnya</button>
            </div>
        </div>

        <!-- Chat Area -->
        <div class="chat-area">
            <div class="chat-header">
                <strong>@namaakuntoko</strong>
            </div>
            <div class="chat-body" style="overflow-y: auto; height: 300px;">
                @foreach ($messages as $message)
                    <div style="margin: 10px; text-align: {{ $message->sender_id == Auth::id() ? 'right' : 'left' }};">
                        <div style="display: inline-block; background: {{ $message->sender_id == Auth::id() ? '#d1e7dd' : '#f8d7da' }}; padding: 10px; border-radius: 5px;">
                          <small>{{ $message->content }}</small><br>
                           <small style="font-size: 10px; color: gray;">{{ $message->created_at->format('H:i') }}</small>
                        </div>
                   </div>
                @endforeach
            </div>

            <form action="{{ route('messages.store') }}" method="POST">
                @csrf
                <input type="hidden" name="receiver_id" value="{{ $receiver_id }}">
                <input type="text" name="content" placeholder="Tulis pesan..." required>
                <button type="submit">Kirim</button>
            </form>
       </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')

    <script>
        function openTab(evt, tabName) {
            let contents = document.querySelectorAll('.content');
            let tabs = document.querySelectorAll('.tab');

            contents.forEach(content => content.classList.remove('active'));
            tabs.forEach(tab => tab.classList.remove('active'));

            document.getElementById(tabName).classList.add('active');
            evt.currentTarget.classList.add('active');
        }
    </script>
</body>
</html>

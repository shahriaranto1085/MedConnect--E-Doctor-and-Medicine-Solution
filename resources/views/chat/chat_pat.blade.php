<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Dr. {{ $doctor->name }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #e5ddd5;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .chat-header {
            background:rgb(22, 37, 110);
            color: white;
            padding: 15px;
            font-size: 20px;
        }
        .chat-body {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }
        .message {
            max-width: 60%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
            position: relative;
            font-size: 16px;
        }
        .doctor {
            background: #dcf8c6;
            align-self: flex-end;
        }
        .patient {
            background: white;
            align-self: flex-start;
        }
        .timestamp {
            font-size: 10px;
            color: gray;
            position: absolute;
            bottom: 2px;
            right: 10px;
        }
        .chat-footer {
            padding: 10px;
            background:rgba(36, 23, 223, 0.47);
            display: flex;
            align-items: center;
        }
        .chat-footer input[type="text"] {
            flex: 1;
            padding: 10px;
            border-radius: 20px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }
        .chat-footer button {
            background:rgb(24, 6, 91);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 50%;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="chat-header">
        Chat with Dr. {{ $doctor->name }}
    </div>

    <div class="chat-body" id="chat-body">
        @foreach($messages as $msg)
            <div class="message {{ $msg->sender_role == 'doctor' ? 'doctor' : 'patient' }}">
                {{ $msg->message }}
                <div class="timestamp">
                    {{ \Carbon\Carbon::parse($msg->created_at)->format('h:i A') }}
                </div>
            </div>
        @endforeach
    </div>

    <form class="chat-footer" action="{{ route('patient.send_message_post') }}" method="POST">
        @csrf
        <input type="hidden" name="doctor_email" value="{{ $doctor->email }}">
        <input type="text" name="message" placeholder="Type a message..." required>
        <button type="submit">➤</button>
    </form>

    <script>
        // Auto scroll to bottom
        var chatBody = document.getElementById('chat-body');
        chatBody.scrollTop = chatBody.scrollHeight;
    </script>

</body>
</html>

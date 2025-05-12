<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed Patients</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .messenger-container {
            width: 100%;
            max-width: 600px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-image: linear-gradient(45deg, rgb(6, 36, 80), rgb(46, 110, 205));
            padding: 20px;
            color: white;
            text-align: center;
            font-size: 24px;
        }

                .header2 {
            
            padding: 20px;
            color: white;
            text-align: center;
            font-size: 24px;
        }

        .chat-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .chat-item {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            transition: background-color 0.3s ease;
        }

        .chat-item:hover {
            background-color: #f0f0f0;
        }

        .avatar {
            width: 50px;
            height: 50px;
            background-color: #ccc;
            border-radius: 50%;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .chat-info {
            flex-grow: 1;
        }

        .chat-info .name {
            font-weight: bold;
            font-size: 16px;
        }

        .chat-info .email {
            font-size: 14px;
            color: #777;
        }

        .chat-info .time {
            font-size: 13px;
            color: #444;
            margin-top: 5px;
        }

        .chat-action {
            margin-left: auto;
        }

        .send-message-button {
            background-color: rgb(46, 110, 205);
            color: white;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 14px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .send-message-button:hover {
            background-color: rgb(22, 80, 180);
        }

        .no-patients {
            padding: 30px;
            text-align: center;
            color: #888;
        }
    </style>
</head>

<body>
        <div class="header2">
        <div class="logo">
            <a href="{{ route('doc.profile') }}"><img src="{{ asset('images/logo.png') }}" height="48px" width="296px" alt="Logo"></a>
        </div>

  

        
    </div>

    <div class="messenger-container">
        <div class="header">Confirmed Patients</div>

        @if(count($confirm) > 0)
            <ul class="chat-list">
                @foreach($confirm as $confirmed)
                    <li class="chat-item">
                        <div class="avatar">
                            <img src="{{ asset('images/pic.png') }}" alt="Patient Avatar" style="width: 100%; border-radius: 50%;">
                        </div>
                        <div class="chat-info">
                            <div class="name">{{ $confirmed->patient_name }}</div>
                            <div class="email">{{ $confirmed->user_email }}</div>
                            <div class="time">Consultation: {{ $confirmed->time }}</div>
                        </div>
                        <div class="chat-action">
                            <a href="{{ route('doctor.chat', $confirmed->user_email) }}" class="send-message-button">Message</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="no-patients">No confirmed patients yet.</div>
        @endif
    </div>

</body>
</html>

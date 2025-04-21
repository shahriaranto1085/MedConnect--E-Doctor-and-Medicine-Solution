<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo {
            width: 150px;
            margin-bottom: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .result {
            margin: 20px 0;
        }

        .result p {
            font-size: 18px;
            margin: 10px 0;
        }

        .bmi-result {
            font-size: 24px;
            font-weight: bold;
            color: #4caf50;
        }

        .comment {
            font-size: 98px;
            color: #721c24;
            margin-top: 10px;
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
        }

        .message {
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
            <h2>BMI Results</h2>
        </div>

        @if($message)
            <div class="error-message">{{ $message }}</div>
        @else
            <div class="result">
                <p><strong>Name:</strong> {{ $name }}</p>
                <p><strong>Age:</strong> {{ $age }} years</p>
                <p><strong>Height:</strong> {{ $height }} cm</p>
                <p><strong>Weight:</strong> {{ $weight }} kg</p>
                <p class="bmi-result"><strong>BMI:</strong> {{ $bmi }}</p>
                <p class="comment"><strong>{{ $comment }}</strong></p>
                <img src="{{ asset('images/bmi.png') }}" alt="Logo" class="">
            </div>
        @endif
    </div>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Weight Loss Goal</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #dceefb, #f0f9ff);
            padding: 40px;
            text-align: center;
            color: #333;
        }

        
        

        .box {
            background: white;
            padding: 30px;
            margin: auto;
            max-width: 500px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 {
            color: #0a3d62;
        }

        p {
            font-size: 18px;
            margin: 10px 0;
        }

        .highlight {
            color: #e74c3c;
            font-weight: bold;
        }
        
    </style>
</head>
<body>
    <div class="background">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" width="180" style="margin-bottom: 20px;">

    <div class="box">
        <h2>Your Weight Loss Goal</h2>

        <p><strong>Name:</strong> {{ $name }}</p>
        <p><strong>Age:</strong> {{ $age }}</p>
        <p><strong>Height:</strong> {{ $height }} cm</p>
        <p><strong>Weight:</strong> {{ $weight }} kg</p>
        <p><strong>Current BMI:</strong> {{ $currentBmi }}</p>
        <p><strong>Target Weight (BMI 29.9):</strong> {{ $targetWeight }} kg</p>

    @if($weightToLose > 0)
        <p><strong>You need to lose:</strong> {{ $weightToLose }} kg to reach a BMI under 30.</p>
    @else
        <p><strong>You are already within a healthy BMI range.</strong></p>
    @endif
</div>
    </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Tracker</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-image: linear-gradient(rgb(255, 255, 255), rgba(255, 255, 255, 0.69)), url('{{ asset('images/bg.png') }}');
            background-position: center;
            background-size: cover;
            min-height: 100vh;
            padding: 20px 10%;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
        }

        .logo {
            width: 300px;
    
        }

        .card-container {
            display: flex;
            gap: 40px;
            margin-top: 100px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            width: 300px;
            height: 200px;
            background: linear-gradient(45deg, rgb(6, 36, 80), rgb(46, 110, 205));
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
            padding: 20px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.25);
        }
    </style>
</head>
<body>
    <nav>
    <img src="{{asset('images/logo.png') }}" class="logo">
    </nav>
    <h1 style="text-align: center; color: #333;">Doctors Dashboard</h1>
    <div class="card-container">
        <a href="{{ route('doctor.pending') }}" class="card">Pending Patient</a>
        <a href="{{ route('confirmed.patient') }}" class="card">Confirmed Patient</a>
        <a href="{{ route('prescription.create') }}" class="card">Write Prescriptions</a>
        <a href="{{ route('doc.profile') }}" class="card">Edit Profile</a>
    </div>
</body>
</html>

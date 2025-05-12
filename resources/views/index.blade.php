<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedConnect</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .hero {
            width: 100%;
            min-height: 100vh;
            background-image: linear-gradient(rgb(255, 255, 255), rgba(255, 255, 255, 0.69)), url('{{ asset('images/bg.png') }}');
            background-position: center;
            background-size: cover;
            padding: 10px 10%;
            overflow: hidden;
        }

        nav {
            padding: 10px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .logo {
            width: 300px;
        }

        nav ul {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        nav ul li {
            list-style: none;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: 400;
            font-size: 20px;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 14px 40px;
            color: #fff;
            background-image: linear-gradient(45deg, rgb(6, 36, 80), rgb(46, 110, 205));
            font-size: 20px;
            border-radius: 30px;
            border-top-right-radius: 0;
        }

        .logout-btn {
            text-decoration: none;
            padding: 14px 25px;
            color: #fff;
            background-image: linear-gradient(45deg, rgb(194, 44, 44), rgb(155, 46, 46));
            font-size: 20px;
            border-radius: 30px;
            border-bottom-left-radius: 0;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .dropdown-content a {
            display: block;
            padding: 20px;
            color: #333;
            text-decoration: none;
            white-space: nowrap;
        }

        .dropdown-content a:hover {
            background-color: #f0f0f0;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .licls {
            padding: 10px 5px;
            border-radius: 30px;
        }

        .licls:hover {
            background-image: linear-gradient(45deg, rgb(255, 255, 255), rgba(224, 228, 235, 0.58));
            color: white;
            transition: all 0.9s ease;
        }

        .main-container {
            display: flex;
            flex-direction: row;
            align-items: flex-end;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 5%;
        }

        .content {
            max-width: 600px;
        }

        .content h1 {
            font-size: 70px;
            color: #222;
        }

        .content p {
            margin: 10px 0 30px;
            color: #333;
        }

        .content .btn {
            padding: 15px 80px;
            font-size: 16px;
        }

        .fimg {
            width: 830px;
            max-width: 100%;
            height: auto;
        }

        .anim {
            opacity: 0;
            transform: translateY(30px);
            animation: moveup 0.5s linear forwards;
        }

        @keyframes moveup {
            100% {
                opacity: 1;
                transform: translateY(0px);
            }
        }

        /* --- RESPONSIVE STYLES --- */
        @media (max-width: 1024px) {
            .content h1 {
                font-size: 50px;
            }

            nav {
                flex-direction: column;
                align-items: center;
            }

            nav ul {
                flex-direction: column;
                align-items: center;
                padding: 0;
            }

            nav ul li {
                margin: 8px 0;
            }

            .main-container {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .logout-btn {
                margin-top: 10px;
                position: static;
            }
        }

        @media (max-width: 768px) {
            .content h1 {
                font-size: 36px;
            }

            .content p {
                font-size: 16px;
            }

            .btn {
                font-size: 16px;
                padding: 12px 30px;
            }

            .dropdown-content a {
                font-size: 14px;
                padding: 15px;
            }

            .fimg {
                margin-top: 20px;
            }
        }

        @media (max-width: 480px) {
            .content h1 {
                font-size: 28px;
            }

            .btn {
                font-size: 14px;
                padding: 10px 25px;
            }

            .logout-btn {
                font-size: 14px;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>

@if (session('patient'))
    <h2>Welcome, {{ session('patient')->name }}!</h2>
@else
    <h2>Welcome to MedConnect</h2>
@endif

<div class="hero">
    <nav>
        <img src="images/logo.png" class="logo">
        <ul>
            <li class="licls"><a href="{{ route('my_profile') }}">My Profile</a></li>
            <li class="licls"><a href="{{ route('doctors.search') }}">Consultation</a></li>
            <li class="licls"><a href="{{ route('medicine.list') }}">Order Medicine</a></li>
            <li class="licls"><a href="{{ url('/fitness-tracker') }}">Fitness Tracker</a></li>
            <li class="licls"><a href="#">Notifications</a></li>
        </ul>

        <div class="dropdown">
            <a href="#" class="btn">Login</a>
            <div class="dropdown-content">
                <a href="{{ route('patient.login') }}">Login as a Patient</a>
                <a href="{{ route('doctor.login') }}">Login as a Doctor</a>
            </div>
        </div>

        <a href="{{ route('logout') }}" class="logout-btn" title="Logout">Logout</a>
    </nav>

    <div class="main-container">
        <div class="content">
            <h1 class="anim">MedConnect <br>Bridging Patients with Trusted Healthcare Professionals</h1>
            <p class="anim">Book your appointment with top doctors in just a few clicks. Your health, our priority</p>
            <a href="#" class="btn anim">Book Now</a>
        </div>
        <img src="{{ asset('images/pic.png') }}" class="fimg anim" alt="Doctor Illustration">
    </div>
</div>

</body>
</html>

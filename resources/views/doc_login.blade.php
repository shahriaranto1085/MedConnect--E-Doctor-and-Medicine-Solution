@if (session('success'))
    <div class="alert alert-success" style="color: green; font-weight: bold;">
        {{ session('success') }}
    </div>
@endif

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body, html {
            height: 100%;
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset('images/bg.jpg') }}');
            background-size: cover;
            background-position: center;
            z-index: -1;
            opacity: 0.3;
        }

        .login-container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .logo {
            width: 250px;
            margin-bottom: 30px;
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 25px;
            color: #222;
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .login-box .btn {
            margin-top: 20px;
            width: 100%;
            padding: 14px;
            border: none;
            color: #fff;
            font-size: 18px;
            border-radius: 30px;
            background-image: linear-gradient(45deg, rgb(6, 36, 80), rgb(46, 110, 205));
            cursor: pointer;
        }

        .login-box .register-link {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }

        .login-box .register-link a {
            color: rgb(46, 110, 205);
            text-decoration: none;
            font-weight: bold;
        }

        .login-box .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="background"></div>

    <div class="login-container">
        <img src="{{ asset('images/logo.png') }}" class="logo">
        <div class="login-box">
            <h2>Login as Doctor</h2>

            <form action="{{ route('doctor.login.submit') }}" method="POST">
                @csrf
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                @if (session('error'))
    <div class="alert alert-error">{{ session('error') }}</div>
@endif

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- 🔺 Validation errors --}}
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
                <button type="submit" class="btn">Login</button>
            </form>


            <div class="register-link">
                Don't have an account? <a href="{{ route('doctor.register') }}">Please Register</a>
            </div>
        </div>
    </div>

</body>
</html>



<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
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

        .register-container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px;
            
        }

        .logo {
            width: 250px;
            margin-bottom: 30px;
        }

        .register-box {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .register-box h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #222;
            
        }

        .register-box input,
        .register-box select {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .register-box .btn {
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

        .register-box .login-link {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #333;
        }

        .register-box .login-link a {
            color: rgb(46, 110, 205);
            text-decoration: none;
            font-weight: bold;
        }

        .register-box .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="background"></div>

    <div class="register-container">
        <img src="{{ asset('images/logo.png') }}" class="logo">
        <div class="register-box">
{{-- 🔔 Session messages --}}
@if (session('error'))
    <div class="alert alert-error">{{ session('error') }}</div>
@endif

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

            <h2>Register as Patient</h2>

            <form action="{{ route('patient.register.submit') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="number" name="age" placeholder="Age" required>
                <select name="sex" required>
                    <option value="" disabled selected>Select Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                <input type="text" name="phone" placeholder="Phone Number" required>
                <input type="email" name="email" placeholder="Email" required>
                
                <input type="text" name="address" placeholder="Address" required>
                <select name="marital_status" required>
                    <option value="" disabled selected>Marital Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                </select>
                <input type="text" name="nid" placeholder="NID Number" required>
                <input type="text" name="height" placeholder="Height (Optional)">
                <input type="text" name="weight" placeholder="Weight (Optional)">
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit" class="btn">Register</button>
            </form>

            <div class="login-link">
                Already have an account? <a href="{{ route('patient.login') }}">Login</a>
            </div>
        </div>
    </div>

</body>
</html>

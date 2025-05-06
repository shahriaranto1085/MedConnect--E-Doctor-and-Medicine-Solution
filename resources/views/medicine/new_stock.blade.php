

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


            <h2>Add Medicine to Stock</h2>
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

            <form action="{{ route('new.stock.submit') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Medicine Name" required>

                <select name="type" required>
                    <option value="" disabled selected>Medicine Type</option>
                    <option value="tablet">Tablet</option>
                    <option value="capsule">Capsule</option>
                    <option value="sirup">Sirup</option>
                </select>
                <input type="text" name="manufacturer" placeholder="Manufacturer" required>
                <input type="text" name="description" placeholder="Description" required>
                
                <input type="text" name="weight" placeholder="Weight" required>
                <input type="text" name="price" placeholder="Price" required>
                <input type="text" name="image_path" placeholder="Original Image Path" required>
                <input type="text" name="stock" placeholder="Stock" required>


                <button type="submit" class="btn">Add Medicine</button>
            </form>

        </div>
    </div>

</body>
</html>

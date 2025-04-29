@if (session('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
@endif


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doses and Diseases</title>
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
            background-image: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)), url('{{ asset('images/bg.jpg') }}');
            background-size: cover;
            background-position: center;
            z-index: -1;
            opacity: 0.7;
        }

        .container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .logo {
            width: 250px;
            margin: 30px 0 20px;
        }

        .content-box {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px 50px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 700px;
            text-align: center;
            margin-top: 20px;
        }

        .content-box h1 {
            margin-bottom: 30px;
            font-size: 32px;
            color: #222;
        }

        .btn-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .btn {
            text-decoration: none;
            padding: 14px 40px;
            color: #fff;
            background-image: linear-gradient(45deg, rgb(6, 36, 80), rgb(46, 110, 205));
            font-size: 18px;
            border-radius: 30px;
            border-top-right-radius: 0;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background-image: linear-gradient(45deg, rgb(46, 110, 205), rgb(6, 36, 80));
        }

        .message {
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
        }

    input[type="email"], textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        background-color: #fff;
        color: #333;
        margin-bottom: 15px;
    }

    textarea {
        resize: vertical;
    }



</style>


    </style>
</head>
<body>

    <div class="background"></div>

    <div class="container">
        <img src="{{ asset('images/logo.png') }}" class="logo">

        <form method="POST" action="{{ route('prescription.store') }}">
            @csrf

            <label for="user_email">Patient Email</label>
            <input type="email" id="user_email" name="user_email" required>

            <label for="disease">Disease</label>
            <textarea id="disease" name="diseases" rows="4" required></textarea>

            <label for="doses">Doses</label>
            <textarea id="doses" name="doses" rows="4" required></textarea>

            <button class="btn" type="submit">Save Prescription</button>
        </form>



        </div>
    </div>

</body>
</html>

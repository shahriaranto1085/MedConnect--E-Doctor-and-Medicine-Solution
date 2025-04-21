<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Verified</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
</head>
<body>
    <div class="container">
        <h1>You are not verified as a doctor. Please check again.</h1>
        <p>For more info, email <a href="mailto:shahriaranto1085@gmail.com">shahriaranto1085@gmail.com</a></p>
        <form action="{{ route('doctor.login') }}" method="GET">
            <button type="submit" class="btn btn-primary">Try Login</button>
        </form>
    </div>
</body>
</html>
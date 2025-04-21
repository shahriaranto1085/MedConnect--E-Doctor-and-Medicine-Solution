
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    
</head>
<body>
    <div class="admin-header">
        Administration
    </div>
    <div class="admin-topbar">
        <div>
            <a href="/">View Site</a>
            <a href="#">Change Password</a>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>

    @yield('content')

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Doctor Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-image: url('{{ asset('images/bg.jpg') }}');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container .form-group {
            display: flex;
            margin-bottom: 15px;
            align-items: center;
        }

        .form-container label {
            width: 120px;
            text-align: right;
            margin-right: 15px;
            color: #555;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .form-container .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .form-container .text-center {
            text-align: center;
        }

        .form-container .text-center a {
            color: #007bff;
            text-decoration: none;
        }

        .form-container .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Update Doctor Profile</h2>

        <!-- Success message -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Error message -->
        @if (session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <!-- Validation errors -->
        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('doctor.profile.update') }}">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $doctor->name) }}">
            </div>

            <!-- Age -->
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" id="age" name="age" value="{{ old('age', $doctor->age) }}">
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone', $doctor->phone) }}">
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $doctor->email) }}">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Leave blank to keep current">
            </div>

            <!-- Schedule -->
            <div class="form-group">
                <label for="schedule">Schedule:</label>
                <input type="text" id="schedule" name="schedule" value="{{ old('schedule', $doctor->schedule) }}">
            </div>

            <!-- Time -->
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="text" id="time" name="time" value="{{ old('time', $doctor->time) }}">
            </div>

            <!-- Submit Button -->
            <button type="submit">Save</button>
        </form>

        <div class="text-center">
            <a href="{{ route('doctor.dashboard') }}">Back to Dashboard</a>
        </div>
    </div>

</body>
</html>

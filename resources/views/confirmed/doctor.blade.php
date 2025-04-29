<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed Doctors</title>
    <style>
        /* Reset some default margins and paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #d4f1f4, #ffffff);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            font-size: 20px;
        }

        .logo {
            width: 150px;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: rgb(22, 13, 78);
            text-align: center;
        }

        .doctor-container {
            width: 100%;
            max-width: 2500px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .doctor-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .doctor-table th, .doctor-table td {
            padding: 25px 30px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .doctor-table th {
            background-image: linear-gradient(45deg, rgb(6, 36, 80), rgb(46, 110, 205));
            color: white;
            border-radius: 0px;
        }

        .doctor-table tr:hover {
            background-color: #f1f1f1;
        }

        .send-message-button {
            background-image: linear-gradient(45deg, rgb(6, 36, 80), rgb(46, 110, 205));
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 30px;
            font-size: 24px;
            transition: background-color 0.3s ease;
        }

        .send-message-button:hover {
            background-color: rgb(0, 23, 139);
        }

        .no-doctors {
            text-align: center;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- Logo -->
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">

    <div class="doctor-container">
        <h2>Confirmed Doctors</h2>

        @if(count($confirm) > 0)
            <table class="doctor-table">
                <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Doctor Email</th>
                        <th>Consultation Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($confirm as $confirmed)
                        <tr>
                            <td>{{ $confirmed->doctor_name }}</td>
                            <td>{{ $confirmed->doc_email }}</td>
                            <td>{{ $confirmed->time}}</td>
                            <td>
                                <a href="{{ route('patient.chat', $confirmed->doc_email) }}" class="send-message-button">Send Message</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="no-doctors">No confirmed doctors found.</p>
        @endif
    </div>

</body>
</html>

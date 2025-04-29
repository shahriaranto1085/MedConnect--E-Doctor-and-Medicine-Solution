<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Prescriptions</title>
    <style>
        /* Reset some default margins and paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #d4f1f4, #ffffff); /* Light blue-white gradient */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            font-size: 25px;
        }

        .logo {
            width: 150px;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #008CBA; /* Slightly bold blue */
            text-align: center;
            
        }

        .prescription-container {
            width: 100%;
            max-width: 1500px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        .prescription-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .prescription-table th, .prescription-table td {
            padding: 25px 30px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .prescription-table th {
            background-color: #008CBA;
            color: white;
        }

        .prescription-table tr:hover {
            background-color: #f1f1f1;
        }

        .view-button {
            background-color:#008CBA;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 10px;
            transition: background-color 0.3s ease;
        }

        .view-button:hover {
            background-color:rgb(0, 23, 139);
        }

        .no-prescriptions {
            text-align: center;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- Logo -->
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">

    <div class="prescription-container">
        <h2>Your Prescriptions</h2>

        @if(count($prescriptions) > 0)
            <table class="prescription-table">
                <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Doctor Email</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prescriptions as $prescription)
                        <tr>
                            <td>{{ $prescription->doctor_name }}</td>
                            <td>{{ $prescription->doc_email }}</td>
                            <td>{{ \Carbon\Carbon::parse($prescription->updated_at)->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('patient.prescription.view', $prescription->id) }}" class="view-button">View Prescription</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="no-prescriptions">No prescriptions found.</p>
        @endif
    </div>

</body>
</html>

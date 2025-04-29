<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background: #f5f5f5;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        .prescription {
            background: white;
            padding: 40px;
            width: 800px;
            border: 2px solid #000;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .header {
            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .header h1 {
            margin-bottom: 5px;
            font-size: 28px;
        }

        .header p {
            font-size: 16px;
            color: #555;
        }

        .doctor-info, .patient-info {
            margin-bottom: 20px;
            font-size: 16px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 18px;
            text-decoration: underline;
        }

        .content {
            margin-top: 30px;
            font-size: 18px;
        }

        .disease {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .dose {
            margin-bottom: 15px;
            padding-left: 20px;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
            font-style: italic;
            font-size: 16px;
            color: #555;
        }

    </style>
</head>

<body>

<div class="prescription">

    <div class="header">
        <h1>Dr. {{ $doctor->name }}</h1>
        <p>{{ $doctor->degree }}</p>
        <p> {{ $doctor->specialization }}</p>
        <p> {{ $doctor->worplc }}</p>

        <p>Email: {{ $doctor->email }}</p>
    </div>

    <div class="patient-info">
        <div class="section-title">Patient Information</div>
        <p><strong>Name:</strong> {{ $patient->name }}</p>
        <p><strong>Age:</strong> {{ $patient->age }}</p>
        <p><strong>Gender:</strong> {{ $patient->sex }}</p>
        <p><strong>Email:</strong> {{ $patient->email }}</p>
    </div>

    <div class="content">
        <div class="section-title">Prescription Details</div>

        <div class="disease">Disease:</div>
        <div class="dose">{{ $prescription->diseases }}</div>

        <div class="disease">Doses / Instructions:</div>
        <div class="dose">{{ $prescription->doses }}</div>
    </div>

    <div class="footer">
        Date: {{ \Carbon\Carbon::parse($prescription->updated_at)->format('d M Y') }}
    </div>

</div>

</body>
</html>

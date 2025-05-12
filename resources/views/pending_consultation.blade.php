
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Cards</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            

            background-color: #f0f0f0;
        }
                .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .logo {
             width: 400px;
             padding-left: 80px;
        }

        .search-box {
            flex-grow: 1;
            margin: 0 20px;
            position: relative;
        }
        .search-box input {
            width: 100%;
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .search-box button {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            width: 80px;
            background-image: linear-gradient(45deg,rgb(6, 36, 80),rgb(46, 110, 205));
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            color: white;
        }
        .user-actions {
            display: flex;
            align-items: center;
        }
        .user-profile, {
            margin-left: 15px;
            position: relative;
        }

        .user-info {
            font-size: 1px;
            text-align: right;
        }
        .user-info .name {
            font-weight: bold;
        }
        .user-info .cash {
            color: #777;
        }

.doctor-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    max-width: 1200px;
    margin: 40px auto; /* Add this to center the container itself */
    padding: 20px;
}


        .doctor-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .doctor-card:hover {
            transform: scale(1.05);
        }

        .doctor-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .doctor-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .doctor-specialty {
            color: #666;
            margin-bottom: 10px;
        }
                .doctor-specialt {
            color: green;
            margin-bottom: 10px;
            padding: 5px 5px;
            border-radius: 50px;
        }


        .book-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .book-button:hover {
            background-color: #45a049;
        }


            .int {
            width: 56%;
 
   
            justify-content: center;
            padding: 10px;
        }

        @media (max-width: 768px) {
            .doctor-container {
                flex-direction: column;
                align-items: center;
            }

            .doctor-card {
                width: 100%;
                max-width: 350px;
            }
            
            .header {
                flex-wrap: wrap;
            }
            .search-box {
                order: 3;
                width: 100%;
                margin: 10px 0 0;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" height="48px" width="296px" alt="Logo"></a>
        </div>

        <form action="{{ route('doctors.search') }}" method="GET" class="search-box">
            <input type="text" id="search-input" name="query" placeholder="Search for doctor..." value="{{ request('query') }}">
            <button type="submit">Search</button>
        </form>

        <div class="user-actions">
            <div class="user-profile">
                <div class="user-info">
                    <div class="name">Hello, {{ session('patient')->name }}</div>
                </div>
            </div>
        </div>
    </div>
            @if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin: 20px auto; max-width: 600px; text-align: center; border: 1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
         @endif

<div class="doctor-container">
@foreach($pendingAppointments as $appt)
    @php
        $doc = $doctors[$appt->doc_email] ?? null;
    @endphp
    @if($doc)
    <div class="doctor-card">
        <img src="{{ asset('images/pic.png') }}" alt="{{ $doc->name }}" class="doctor-image">
        <div class="doctor-name">{{ $doc->name }}</div>
        <div class="doctor-specialt"><b>{{ $doc->specialization }}</b></div>
        <div class="doctor-specialty">Education: {{ $doc->institution }}</div>
        <div class="doctor-specialty"><b>Qualification:</b> {{ $doc->degree }}</div>
        <div class="doctor-specialty">Works at: {{ $doc->worplc }}</div>

        <form action="{{ route('consultation.update', $appt->id) }}" method="POST">
            @csrf
            <input class="int" type="datetime-local" name="time" value="{{ $appt->time }}" required>

            <div style="display: flex; justify-content: center; gap: 10px; margin-top: 10px;">
                <button type="submit" class="book-button">Update</button>
            </form>

            <form action="{{ route('consultation.cancel', $appt->id) }}" method="POST">
                @csrf
                <button type="submit" class="book-button" style="background-color: #dc3545;">Cancel</button>
            </form>
            </div>
    </div>
    @endif
@endforeach
</div>




</body>

</html>
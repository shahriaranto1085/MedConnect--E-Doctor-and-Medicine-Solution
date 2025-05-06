

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }



        .hero {
              position: relative;
              width: 100%;
              min-height: 100vh;
              background-image: linear-gradient(rgb(255, 255, 255), rgba(255, 255, 255, 0.69)), url('{{ asset('images/bg.png') }}');
              background-position: center;
              background-size: cover;
              padding: 10px 10%;
              overflow: hidden;
  
          
}

nav {
    padding: 10px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.logo {
    width: 300px;
}

nav ul li {
    display: inline-block;
    list-style: none;
    margin: 10px 15px;
}


nav ul li a {
    text-decoration: none;
    color: #333;
    font-weight: 400;
    font-size: 20px;
}


.btn {
    display: inline-block;
    text-decoration: none;
    padding: 14px 40px;
    color: #fff;
    background-image: linear-gradient(45deg,rgb(6, 36, 80),rgb(46, 110, 205));
    font-size: 20px;
    border-radius: 30px;
    border-top-right-radius: 0; 
}

.content {
    margin-top: 5%;
    max-width: 1200px;
}

.content h1 {
    font-size: 70px;
    color: #222;
}

.content p {
    margin: 10px 0 30px;
    color: #333;
}

.content .btn {
    padding: 15px 80px;
    font-size: 16px;
}

.fimg {
    width: 830px;
    position: absolute;
    bottom: 0;
    right: 2%;
}

.dropdown {
    position: relative;
    display: inline-block;
    
}
.ddown {
    position: relative;

}


.dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
    min-width: 160px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    z-index: 1000;
}

.dropdown-content a {
    display: block;
    padding: 40px;
    color: #333;
    text-decoration: none;
    white-space: nowrap;
    border radius:30px
}

.dropdown-content a:hover {
    background-color: #f0f0f0;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.logout-btn {
    display: inline-block;
    text-decoration: none;
    padding: 14px 25px;
    color: #fff;
    background-image: linear-gradient(45deg,rgb(194, 44, 44),rgb(155, 46, 46));
    font-size: 20px;
    border-radius: 30px;
    
    border-bottom-left-radius: 0;
    position: absolute;
    top: 2.5%;
    left: 91%;
 
}
.licls{
    padding: 10px 5px;
    border-radius: 30px;
}

.licls:hover {
    background-image: linear-gradient(45deg, rgb(255, 255, 255), rgba(224, 228, 235, 0.58));
    padding: 10px 5px;
    color: white; /* 👈 this changes the font color on hover */
    transition: all 0.9s ease; /* optional smooth transition */
}





.anim{
    opacity: 0;
    transform: translateY(30px);
    animation: moveup 0.5s linear forwards;


}

@keyframes moveup {
    100% {
        opacity: 1;
        transform: translateY(0px);
    }
}



    </style>
</head>
<body>
@if (session('patient'))
    <h2>Welcome, {{ session('patient')->name }}!</h2>
@else
    <h2>Welcome to MedConnect</h2>
@endif


    <div class="background"></div>

    <div class="hero">
        <nav>
            <img src="images/logo.png" class="logo">
            <ul>
                <li class="licls"><a href="{{ route('my_profile') }}">My Profile</a></li>
                <li class="licls"><a href="#">Consultation</a></li>
                <li class="licls"><a href="{{ route('medicine.list') }}">Order Medicine</a></li>
                <li class="licls"><a href="{{ url('/fitness-tracker') }}">Fitness Tracker</a></li>
                <li class="licls"><a href="#">Notifications</a></li>
            </ul>
            <div class="dropdown">
                <a href="#" class="btn">Login</a>
             

                <div class="dropdown-content">
                    <a href="{{ route('patient.login') }}">Login as a Patient</a>
                    <a href="{{ route('doctor.login') }}">Login as a Doctor</a>
                </div>

            </div>
            <a href="{{ route('logout') }}" class="logout-btn" title="Logout">Logout</a>
            

        </nav> 
        
        <div class="content">
              <h1 class="anim">MedConnect <br>Bridging Patients with Trusted Healthcare Professionals</h1>
             <p class="anim">Book your appointment with top doctors in just a few clicks. Your health, our priority</p>
             <a href="#" class="btn anim">Book Now</a>
        </div>
        <img src="{{ asset('images/pic.png') }}"  class="fimg anim">
        </div>



</body>
</html>

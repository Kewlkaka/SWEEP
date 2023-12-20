<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/bd1de80752.js" crossorigin="anonymous"></script>
    <title>SWEEP</title>
</head>

<body>
    <header class="header2">
        <div class="navLogoSec">
            <i id="menuIcn" class="fa-solid fa-bars"></i>
            <h1 class="header__heading"><a href="/employee-dashboard">SWEEP</a></h1>
        </div>
        <nav class="nav">
            <ul class="nav__list">
                <li class="nav__list-item"><a href="/faq">FAQ</a></li>
                <li class="nav__list-item"><a href="/logout">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="main_container">
        <div class="navcontainer navclose">
            <nav class="navs">
                <div class="nav-upper-options">
                    <div class="nav-option option1" id="option1">
                        <i id="nav-img" class="fa-solid fa-house-user iconOpen"></i>
                        <h3>Profile</h3>
                    </div>

                    <div class="nav-option option2" id="option2">
                        <i id="nav-img" class="fa-solid fa-bars-progress iconOpen"></i>
                        <div class="navOptionContainer">
                            <h3>Sweep</h3>
                            <h3>Assignment</h3>
                        </div>
                    </div>

                    <div class="nav-option option3" id="option3">
                        <i id="nav-img" class="fa-solid fa-list-check iconOpen"></i>
                        <div style="margin-left:17px" class="navOptionContainer">
                            <h3>Sweep</h3>
                            <h3>History</h3>
                        </div>
                    </div>

                    <div class="nav-option option-4" id="option4">
                        <i id="nav-img" class="fa-solid fa-magnifying-glass iconOpen"></i>
                        <h3>Find People</h3>
                    </div>

                    <div class="nav-option option5" id="option5">
                        <i id="nav-img" class="fa-solid fa-people-group iconOpen"></i>
                        <h3>Friends</h3>
                    </div>
                    <!--Reyans-->
                    <div class="nav-option option6" id="option6">
                        <i id="nav-img" class="fa-solid fa-message iconOpen"></i>
                        <h3>Chat</h3>
                    </div>

                    <div class="nav-option option7" id="option7">
                        <i id="nav-img" class="fa-solid fa-right-from-bracket iconOpen"></i>
                        <a href="/logout" style="font-weight: bold; font-size: 19px">Logout</a>
                    </div>
                </div>
            </nav>
        </div>
        <x-flash-message />
        {{ $slot }}
    </div>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>

</html>

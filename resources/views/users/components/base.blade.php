<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <script src="https://kit.fontawesome.com/bd1de80752.js" crossorigin="anonymous"></script>
    <title>SWEEP</title>
</head>

<body>
    <header class="header">
        <h1 class="header__heading"><a href="/">SWEEP</a></h1>
        <nav class="nav">
            <ul class="nav__list">
                @auth
                    <li class="nav__list-item"><a href="/faq">FAQ</a></li>
                    <li class="nav__list-item"><a href="/logout">Logout</a></li>
                @else
                    <li class="nav__list-item"><a href="/faq">FAQ</a></li>
                    <li class="nav__list-item"><a href="/signUp">Sign up</a></li>
                    <li class="nav__list-item"><a href="/signIn">Sign in</a></li>
                @endauth
            </ul>
        </nav>
    </header>
    {{ $slot }}
    <script src="{{ asset('assets/js/signup.js') }}"></script>
</body>

</html>

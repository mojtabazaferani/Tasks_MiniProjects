<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/styles/login.css">
</head>
<body>
    <div class="header">
        <h1 class="logo-name">Amazon</h1>
        <div class="navbar">
                <nav>
                    <ul>
                        <li><a href="about.php">About</a></li>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="support.php">Support</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <br>
        <div class="register-text">
            <h1>Login</h1>
        </div>
        <br>
        <br>
    <form action={{ route('check') }} method="Post" class="form">
        @csrf
        <input type="text" name="email" class="input" placeholder="Your Email:" value="{{$cookieEmail}}">
        <br>
        <input type="text" name="password" class="input" placeholder="Password:" value="{{$cookiePassword}}">
        <br>
        <button type="submit" class="sub">Login</button>
        <br>
        <a href="{{route('otp.login')}}" class="otp-link">Login With OTP </a>
    </form>
</body>
</html>
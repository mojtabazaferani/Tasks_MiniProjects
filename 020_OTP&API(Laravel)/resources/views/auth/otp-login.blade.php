<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTP-Login</title>
    <link rel="stylesheet" href="/styles/otp-login.css">
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
    <div class="text-otp">
        <h1>OTP-Login</h1>
    </div>
    <br>
    <form action="{{route('otp.generate')}}" method="POST" class="form">
        @csrf

        <input type="text" name="mobile_no" class="input" placeholder="Insert Mobile Number" value="{{$cookieMobileNo}}">
        <br>
        <button type="submit" class="sub">generate-otp</button>
        <h3>{{$error}}</h3>
        <br>
        <a href="{{route('Login')}}" class="username-link">Login With Email </a>
    </form>
</body>
</html>
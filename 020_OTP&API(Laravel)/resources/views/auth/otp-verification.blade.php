<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTP-Verification</title>
    <link rel="stylesheet" href="/styles/otp-verification.css">
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
        <h1>OTP-Verification</h1>
    </div>
    <form action="{{route('otp.getlogin')}}" method="post" class="form">
        @csrf
        <input type="hidden" name="user_id" value="{{$user_id}}" class="input">
        <br>
        <label for="mobile_no">{{ __('OTP') }}</label>
        <input id="otp" type="text"  name="otp" value="{{ old('otp') }}" placeholder="Enter OTP" class="input">
        <br>
        <h3>{{$message}}</h3>
        <br>
        <button type="submit" class="sub">Login</button>
    </form>
</body>
</html>
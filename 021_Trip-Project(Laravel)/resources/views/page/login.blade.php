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
        <h1 class="logo-name">برنامه چیه</h1>
        <div class="navbar">
                <nav>
                    <ul>
                        <li><a href="#">درباره ما</a></li>
                        <li><a href="{{route('home')}}">صفحه اصلی</a></li>
                        <li><a href="#">پشتیبانی</a></li>
                    </ul>
                </nav>
        </div>
    </div>
    <br>
    <div class="welcome">
        <h1>ورود</h1>
    </div>
    <br>
    <form action={{route('check')}} method="Post" class="form">
        @csrf
        <input type="text" class="input" name="username" placeholder="نام کاربری" value="{{$cookieUsername}}">
        <br>
        <input type="text" class="input" name="email" placeholder="ایمیل" value="{{$cookieEmail}}">
        <br>
        <input type="text" class="input" name="password" placeholder="رمز">
        <br>
        <button type="submit" name="submit" class="sub">ورود</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="/styles/register.css">
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
        <h1>ثبت نام</h1>
    </div>
    <br>
    <form action={{route('store')}} method="Post" class="form" enctype="multipart/form-data">
        @csrf
        <input type="text" class="input" name="first_name" placeholder="نام">
        <br>
        <input type="text" class="input" name="last_name" placeholder="نام خانوادگی">
        <br>
        <input type="text" class="input" name="mobile_no" placeholder="شماره">
        <br>
        <input type="text" class="input" name="username" placeholder="نام کاربری">
        <br>
        <input type="text" class="input" name="email" placeholder="ایمیل">
        <br>
        <input type="text" class="input" name="password" placeholder="رمز">
        <br>
        <input type="file" class="input" name="image" placeholder="عکس پروفایل">
        <br>
        <button type="submit" name="submit" class="sub">ثبت نام</button>
    </form>
</body>
</html>
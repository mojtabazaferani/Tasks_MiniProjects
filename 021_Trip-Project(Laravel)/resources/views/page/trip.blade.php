<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/styles/trip.css">
    <title>برنامه بچین</title>
</head>
<body>
    <div class="header">
        <h1 class="logo-name">برنامه چیه</h1>
        <div class="navbar">
                <nav>
                    <ul>
                        <li>
                            <a href="{{route('trip')}}">
                                <span class="icon-add">
                                    <i class="fa-solid fa-calendar-plus"></i>
                                    برنامه بچین
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('home')}}">
                                <span class="icon-add">
                                    <i class="fa-solid fa-house"></i>
                                    صفحه اصلی
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="icon-add">
                                    <i class="fa-sharp fa-solid fa-scale-balanced"></i>
                                    قوانین
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>
        </div>
    </div>
    <br>
    <div class="welcome">
        <h1>برنامه بچین</h1>
    </div>
    <br>
    <form action={{route('create-trip')}} method="Post" class="form" enctype="multipart/form-data">
        @csrf
        <input type="text" class="input" name="mobile_no" placeholder="شماره تماس">
        <br>
        <input type="text" class="input" name="location" placeholder="مکان">
        <br>
        <input type="text" class="input" name="start_date" placeholder="تاریخ شروع">
        <br>
        <input type="text" class="input" name="end_date" placeholder="تاریخ اتمام">
        <br>
        <input type="text" class="input" name="capacity" placeholder="ظرفیت">
        <br>
        <input type="text" class="input" name="price" placeholder="مبلغ">
        <br>
        <input type="file" class="input" name="image">
        <br>
        <button type="submit" name="submit" class="sub">بزن بریم</button>
    </form>
</body>
</html>
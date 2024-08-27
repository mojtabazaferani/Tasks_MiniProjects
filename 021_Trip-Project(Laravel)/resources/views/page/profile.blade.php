<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/styles/profile.css">
</head>
<body>
    <div class="header">
        <h1 class="logo-name">برنامه چیه</h1>
        <div class="navbar">
                <nav>
                    <ul>
                        <li>
                            <a href="{{route('notification')}}" class="counter">{{$countNotifications}}</a>
                        </li>
                        
                        <li>
                                <a href="{{route('notification')}}">
                                    <span class="icon-add1">
                                        <i class="fa-solid fa-bell"></i>
                                    </span>
                                </a>
                        </li>
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
        <div class="profile-text">
            <h1>پروفایل</h1>
        </div>
        <br>
        <div class="image-box">
            <img src="/images-users/{{$image}}" alt="icon" class="image">
        </div>
        <br>
        <div class="pro-content">
                <h2>ID : {{$cookieId}}</h2>
                <br>
                <h2> First-Name : {{$cookieFirstName}}</h2>
                <br>
                <h2>Last-Name : {{$cookieLastName}}</h2>
                <br>
                <h2>Email : {{$cookieEmail}}</h2>
                <br>
                <h2>Mobile-Number : {{$cookieMobileNo}}</h2>
                <br>
                <h2>Username : {{$cookieUsername}}</h2>
                <br>
                <a href="{{route('edit')}}" class="edit"><i class="fa-sharp fa-regular fa-pen-to-square"></i>ویرایش</a>
                <br>
                <a href="{{route('logout')}}" class="logout"><i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i>خروج از حساب کاربری</a>
        </div>
</body>
</html>
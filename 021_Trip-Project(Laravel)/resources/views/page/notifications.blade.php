<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifications</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/styles/notification.css">
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/styles/home.css">
</head>
<body>
    <div class="header">
        <h1 class="logo-name">برنامه چیه</h1>
        <div class="navbar">
                <nav>
                    <ul>
                        <li><a href="#">درباره ما</a></li>
                        <li><a href="#">پشتیبانی</a></li>
                    </ul>
                </nav>
        </div>
    </div>
        <div class="content">
            @for ($i = 0; $i < $countNotifications; $i++)
            @php

                $notification = $notifications[$i]['data'];

                $id = $notification['id'];

                $username = $notification['username'];

                $post = $notification['post'];

            @endphp
            <div class="notifications">
                <h3 class="title-trip">ID - {{$id}}</h3>
                <h3 class="title-trip">New Post From {{$username}}</h3>
                <h3 class="title-trip">Location - {{$post}}</h3>
                <a href="{{route('delete-notification', ['id' => $id])}}">
                    <span class="icon-add">
                        <i class="fa-solid fa-trash"></i>
                    </span>
                </a>
                <br>
                <a href="{{route('read-notification', ['id' => $id, 'username' => $username, 'post' => $post])}}">
                    <span class="icon-add">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                </a>
            </div> 
            @endfor
            
            <br>
        </div>
</body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="/styles/profile.css">
</head>
<body>
    <div class="header">
        <h1 class="logo-name">Amazon</h1>
        <div class="navbar">
                <nav>
                    <ul>
                        <li><a href="{{route('delete.account')}}">Delete-Account</a></li>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="support.php">Support</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <br>
        <div class="profile-text">
            <h1>Profile</h1>
        </div>
        <br>
        <div class="image-box">
            <img src="/images/photo_2023-08-21_02-54-20.jpg" alt="icon" class="image">
        </div>
        <br>
        <div class="pro-content">
                <h2> ID : {{$cookieId}}</h2>
                <br>
                <h2> Name : {{$cookieName}}</h2>
                <br>
                <h2>Email : {{$cookieEmail}}</h2>
                <br>
                <h2>Mobile-Number : {{$cookieMobileNo}}</h2>
                <br>
                <a href="{{route('edit')}}" class="edit">Edit</a>
                <br>
                <a href="{{route('logout')}}" class="logout">Logout</a>
        </div>
</body>
</html>
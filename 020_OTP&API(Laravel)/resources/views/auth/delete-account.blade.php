<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete</title>
    <link rel="stylesheet" href="/styles/delete.css">
</head>
<body>
    <div class="header">
        <h1 class="logo-name">Amazon</h1>
        <div class="navbar">
                <nav>
                    <ul>
                        <li><a href="{{route('Profile')}}">Profile</a></li>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="support.php">Support</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <br>
        <div class="delete-text">
            <h1>Delete</h1>
        </div>
        <br>
        <div class="choose">
            <div class="pro-content">
                <h2> ID : {{$cookieId}}</h2>
                <br>
                <h2> Name : {{$cookieName}}</h2>
                <br>
                <h2>Email : {{$cookieEmail}}</h2>
                <br>
                <h2>Mobile-Number : {{$cookieMobileNo}}</h2>
            </div>
            <br>
            <form action="{{route('deleted')}}" method="POST" class="form">
                @csrf
                @method('delete')
                <input type="submit" name="yes" class="yes" value="Yes">
                <input type="submit" name="no" class="no" value="No">                
            </form>
        </div>
</html>
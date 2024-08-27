<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="/styles/home.css">
</head>
<body>
    <div class="header">
        <h1 class="logo-name">Amazon</h1>
        <h2 class="location">Deliver to {{$locationName}}</h2>
        <div class="navbar">
                <nav>
                    <ul>
                        <li><a href="about.php">About</a></li>
                        <li><a href="{{ route($seeLogin) }}">{{$seeLogin}}</a></li>
                        <li><a href="support.php">Support</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <br>
    <div class="welcome">
        <h1>Welcome {{$name}}</h1>
    </div>
</body>
</html>
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
        <div class="register-text">
            <h1>Register</h1>
        </div>
        <br>
        <br>
    <form action={{route('store')}} method="Post" class="form">
        @csrf
        <input type="text" class="input" name="name" placeholder="What's Your Name:">
        <br>
        <input type="text" class="input" name="email" placeholder="Your Email:">
        <br>
        <input type="text" class="input" name="password" placeholder="Password:">
        <br>
        <input type="text" class="input" name="mobile_no" placeholder="Insert Mobile Number">
        <br>
        <button type="submit" name="submit" class="sub">Register</button>
    </form>
</body>
</html>
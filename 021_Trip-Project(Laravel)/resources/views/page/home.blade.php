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
            @if ($route == 'profile')
                <a href="{{route('profile')}}"><img src="/images-users/{{$image}}" alt="image-user" class="image-profile"></a>  
            @else
                <a href={{ $route }}>{{ $seeLogin }}</a>
            @endif
        </div>
    </div>
    <br>

    <div class="image-box">
        <img src="/images/miit.png" alt="cover" class="image">
    </div>

    <br>
    <div class="welcome">
        <h1>برنامه چیه؟</h1>
    </div>
    <br>
    <div class="content">
        <div class="trips">
            <img src="/images/tabriz.jpg" alt="trip" class="image-trip">
            <h3 class="title-trip">Tabriz</h3>
            <p class="tozih">20 ظرفیت</p>
        </div>
        <br>
        <div class="trips">
            <img src="/images/esfahan.jpg" alt="trip" class="image-trip">
            <h3 class="title-trip">Esfahan</h3>
            <p class="tozih">15 ظرفیت</p>
        </div>
        <br>
        <div class="trips">
            <img src="/images/shiraz.jpg" alt="trip" class="image-trip">
            <h3 class="title-trip">Shiraz</h3>
            <p class="tozih">10 ظرفیت</p>
        </div>
        <br>
        <div class="trips">
            <img src="/images/tehran.jpg" alt="trip" class="image-trip">
            <h3 class="title-trip">Tehran</h3>
            <p class="tozih">20 ظرفیت</p>
        </div>
    </div>
    <br>
    <br>
    <div class="content">
        @php
            $count = count($trips);
        @endphp

        @if ($count != 0)
        @for ($i = 0; $i < 4; $i++)

        @php
            $image = $trips[$i]['image'];

            $location = $trips[$i]['location'];

            $capacity = $trips[$i]['capacity'];
        @endphp

        <div class="trips">
        <img src="/images-trip/{{$image}}" alt="trip" class="image-trip">
        <h3 class="title-trip">{{$location}}</h3>
        <p class="tozih">ظرفیت {{$capacity}}</p>
        </div>
    @endfor 
        @endif
{{-- 
        @for ($i = 0; $i < 4; $i++)

            @php
                $image = $trips[$i]['image'];

                $location = $trips[$i]['location'];

                $capacity = $trips[$i]['capacity'];
            @endphp

            <div class="trips">
            <img src="/images-trip/{{$image}}" alt="trip" class="image-trip">
            <h3 class="title-trip">{{$location}}</h3>
            <p class="tozih">ظرفیت {{$capacity}}</p>
            </div>
        @endfor  --}}
    </div>
    <br>
    <br>
    <div class="content">
        @for ($i = 4; $i < $count; $i++)

            @php

                $image = $trips[$i]['image'];

                $location = $trips[$i]['location'];

                $capacity = $trips[$i]['capacity'];

            @endphp

            <div class="trips">
            <img src="/images-trip/{{$image}}" alt="trip" class="image-trip">
            <h3 class="title-trip">{{$location}}</h3>
            <p class="tozih">ظرفیت {{$capacity}}</p>
            </div>

        @endfor
    </div>
</body>
</html>
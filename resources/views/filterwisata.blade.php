<?php
use Illuminate\Support\Facades\Auth;

$user = Auth::check();

if (!$user) {
    header("Location: /login");
    exit;
}else if ($user > 0){
    header("Location: /login");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link
    href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/font-awesome.min.css">
    <link rel="icon" href="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/travel-agency-logo%2C-travel-company-logo-%281%29-design-template-bc9dcb1ca0e92d6394dea26418a87c8e_screen.jpg?ts=1667975913">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Wisata</title>
</head>
<body>
    @auth
    @include('components.navbar')
    @include('components.filter')
    <div class="popularWisataContainer">
                <div class="fp">
                <div class="title-popular-content">Tempat Wisata Popular</div>
                <div class="fixedPopularContainer">
            @if (count($results) > 0)
            @foreach ($results as $result)
            <div class="fpItem">
                <img
                src="{{ $result->img_wisata }}"
                alt=""
                class="fpImg"
                />
                <span class="fpName">{{ $result->name }}</span>
                <span class="fpCity">{{$result->description}}</span>
                <span class="fpPrice">Starting from {{$result->price}}</span>
                <div class="fpRating">
                <button>8.9</button>
                <span>Excellent</span>
                </div>
            </div>
            @endforeach
  @else
      <p>No results found.</p>
  @endif
            </div>            
            </div>
    </div>
    <div class="popularWisataContainer">
                <div class="fp">
                <div class="title-popular-content">Artikel Popular</div>
                <div class="fixedPopularContainer">
            <div class="fpItem">
                <img
                src="https://cf.bstatic.com/xdata/images/hotel/square600/13125860.webp?k=e148feeb802ac3d28d1391dad9e4cf1e12d9231f897d0b53ca067bde8a9d3355&o=&s=1"
                alt=""
                class="fpImg"
                />
                <span class="fpName">Aparthotel Stare Miasto</span>
                <span class="fpCity">Madrid</span>
                <span class="fpPrice">Starting from $120</span>
                <div class="fpRating">
                <button>8.9</button>
                <span>Excellent</span>
                </div>
            </div>
            <div class="fpItem">
                <img
                src="https://cf.bstatic.com/xdata/images/hotel/max1280x900/215955381.jpg?k=ff739d1d9e0c8e233f78ee3ced82743ef0355e925df8db7135d83b55a00ca07a&o=&hp=1"
                alt=""
                class="fpImg"
                />
                <span class="fpName">Comfort Suites Airport</span>
                <span class="fpCity">Austin</span>
                <span class="fpPrice">Starting from $140</span>
                <div class="fpRating">
                <button>9.3</button>
                <span>Exceptional</span>
                </div>
            </div>
            <div class="fpItem">
                <img
                src="https://cf.bstatic.com/xdata/images/hotel/max1280x900/232902339.jpg?k=3947def526b8af0429568b44f9716e79667d640842c48de5e66fd2a8b776accd&o=&hp=1"
                alt=""
                class="fpImg"
                />
                <span class="fpName">Four Seasons Hotel</span>
                <span class="fpCity">Lisbon</span>
                <span class="fpPrice">Starting from $99</span>
                <div class="fpRating">
                <button>8.8</button>
                <span>Excellent</span>
                </div>
            </div>
            <div class="fpItem">
                <img
                src="https://cf.bstatic.com/xdata/images/hotel/max1280x900/322658536.jpg?k=3fffe63a365fd0ccdc59210188e55188cdb7448b9ec1ddb71b0843172138ec07&o=&hp=1"
                alt=""
                class="fpImg"
                />
                <span class="fpName">Hilton Garden Inn</span>
                <span class="fpCity">Berlin</span>
                <span class="fpPrice">Starting from $105</span>
                <div class="fpRating">
                <button>8.9</button>
                <span>Excellent</span>
                </div>
            </div>
            </div>            
            </div>
    </div>
@endauth
</body>
</html>
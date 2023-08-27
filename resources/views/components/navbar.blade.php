<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
</head>
<body>
@if(auth()->user() && auth()->user()->isAdmin)
    <div class="container-nav">
        <div class="wrapper-nav">
            <div class="left-nav"><div class="hamburger" onclick="toggleMenu()"><div class="line"></div><div class="line"></div><div class="line"></div></div><ul class="hamburger-container" id="hamburgerContainer"><a href="{{ route('home') }}" style="text-decoration: none; color: white;"><li class="hamburger">Beranda</li></a><a href="{{ route('destinasi') }}" style="text-decoration: none; color: white;"><li class="hamburger">Destinasi</li></a><a href="{{ route('buat-trip') }}" style="text-decoration: none; color: white;"><li class="hamburger">Buat Trip</li></a></ul><div class="slogan-desc2">youridealescape.com</div>  <div class="hamburgers" onclick="toggleMenuTablet()"><div class="lines"></div><div class="lines"></div><div class="lines"></div></div><ul class="hamburger-container-tablet" id="hamburgerContainerTablet"><li class="hamburger-tablet">Beranda</li><li class="hamburger-tablet">Destinasi</li><li class="hamburger-tablet">Buat Trip</li></ul></div>
            <div class="right-nav"><div class="menuItem-nav"><a href="{{ route('home') }}" style="text-decoration: none; color: white;">Beranda</a></div><a href="{{ route('destinasi') }}" style="text-decoration: none; color: white;"><div class="menuItem-nav">Tempat Wisata</div></a> 
            <a href="{{ route('buat-trip') }}" style="text-decoration: none; color: white;">
            <div class="menuItem-nav">
                Buat Trip
            </div>
            </a>
            <a href="{{ route('profile') }}" style="text-decoration: none; color: white;"><div class="menuItem-nav-i"><i class="fa fa-user" aria-hidden="true" style="color: white;"></i></div></a><div class="menuItem-nav-i">
                <a href="{{ route('logouts') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out fa-lg" aria-hidden="true" style="color: white;"></i>
                </a>
                <form id="logout-form" action="{{ route('logouts') }}" method="POST" style="display: none;">
                    @csrf <!-- CSRF token -->
                </form>
            </div>
        </div>
    </div>
</div>    
@endif
@if(!auth()->user() || !auth()->user()->isAdmin)
<div class="container-nav">
    <div class="wrapper-nav">
        <div class="left-nav"><div class="hamburger" onclick="toggleMenu()"><div class="line"></div><div class="line"></div><div class="line"></div></div><ul class="hamburger-container" id="hamburgerContainer"><li class="hamburger">Beranda</li><li class="hamburger">Destinasi</li><li class="hamburger">Buat Trip</li></ul><div class="slogan-desc2">youridealescape.com</div>  <div class="hamburgers" onclick="toggleMenuTablet()"><div class="lines"></div><div class="lines"></div><div class="lines"></div></div><ul class="hamburger-container-tablet" id="hamburgerContainerTablet"><li class="hamburger-tablet">Beranda</li><li class="hamburger-tablet">Destinasi</li><li class="hamburger-tablet">Buat Trip</li></ul></div>
        <div class="right-nav"><div class="menuItem-nav"><a href="{{ route('home') }}" style="text-decoration: none; color: white;">Beranda</a></div><a href="{{ route('destinasi') }}" style="text-decoration: none; color: white;"><div class="menuItem-nav">Tempat Wisata</div></a> 
        <a href="{{ route('buat-trip') }}" style="text-decoration: none; color: white;"> <div class="menuItem-nav">Paket Wisata</div></a><a href="{{ route('profile') }}" style="text-decoration: none; color: white;"><div class="menuItem-nav-i"><i class="fa fa-user" aria-hidden="true" style="color: white;"></i></div></a><div class="menuItem-nav-i">
            <a href="{{ route('logouts') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out fa-lg" aria-hidden="true" style="color: white;"></i>
            </a>
            <form id="logout-form" action="{{ route('logouts') }}" method="POST" style="display: none;">
                @csrf <!-- CSRF token -->
            </form>
        </div>
    </div>
</div>
</div>    
@endif
</body>
</html>

<script>
    function toggleMenu() {
    var menuContainer = document.getElementById('hamburgerContainer');
    
    if (menuContainer.style.left === '-250px') {
        menuContainer.style.left = '0px';
    } else {
        menuContainer.style.left = '-250px';
    }
}

    function toggleMenuTablet() {
    var menuContainer = document.getElementById('hamburgerContainerTablet');
    
    if (menuContainer.style.left === '-400px') {
        menuContainer.style.left = '0px';
    } else {
        menuContainer.style.left = '-400px';
    }
}
</script>


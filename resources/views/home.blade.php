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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link
    href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
    <link rel="icon" href="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/travel-agency-logo%2C-travel-company-logo-%281%29-design-template-bc9dcb1ca0e92d6394dea26418a87c8e_screen.jpg?ts=1667975913">
    <title>Home</title>
</head>
<body>
    @auth
    @include('components.navbar')
    @include('components.slider')
    @include('components.userfriendly')
    @include('components.roadmap')
    @include('components.pink')
    @include('components.footer')
@endauth
</body>
</html>
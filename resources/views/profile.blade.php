<?php
use Illuminate\Support\Facades\Auth;

$user = Auth::check();
$userEmail = Auth::user()->email;


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
    <title>Profile Page</title>
</head>
<body>
    @include('components.navbar')
<div class="forgot-password-container">
        <div class="forgot-p-wrapper">
            <div class="form-f-password">
                <form action="{{ route('update.profile') }}" class="forgot-password" method="POST">
                    @csrf
                    @method('PUT')
                    <h1 style="font-weight: 300;">Update User Profile</h1>
                    <div class="input-container-fp">
                        <label for="email" class="fp">Email</label>
                        <input type="text" id="email" type="email" name="email" class="fpass" placeholder="{{ $userEmail }}">
                    </div>
                    <div class="input-container-fp">
                        <label for="password" class="fp">Password</label>
                        <input id="password" type="password" name="password" class="fpass" required>
                    </div>
                    <div class="fp-button">
                        <button type="submit" class="fp-sbu">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('components.footer')
</body>
</html>
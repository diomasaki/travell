<?php

use Illuminate\Support\Facades\Auth;

$user = Auth::check();

if ($user) {
    header("Location: /");
    exit;
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
    <title>Register Page</title>
</head>
<body>
    <div class="container-login">
        <div class="login-left">
            <div class="login-slogan">
                <div class="slogan-title">"Gaperlu bingung rencanain liburan</br>kamu. "</div>
                <div class="slogan-desc">youridealescape.com</div>
            </div>
        </div>
        <div class="login-right">
            <div class="login-form-container">
                <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQlWJo9qjdNdIz3q-HgX6hnlRgzkisSDbsfPImky3cH6JDE3W_z" class="login-icon">
                <div class="form">
                    <div class="login-title">Daftar</div>
                    <form action="/register/proses" method="POST" class="lf">
                        @csrf
                        <div class="form-input">
                            <input for="name" name="name" type="text" class="login-input" placeholder="Username">
                        </div>
                        <div class="form-input">
                            <input for="password" name="password" type="password" class="login-input" placeholder="Password">
                        </div>
                        <div class="form-input">
                            <input for="email" name="email" type="email" class="login-input" placeholder="E-mail">
                        </div>
                        <div class="form-input">
                            <input for="phone" name="phone" type="number" class="login-input" placeholder="No Handphone">
                        </div>
                        <div class="form-input">
                                <button name="submit" type="submit" class="login-submit">Daftar</button>
                        </div>
                    </form>
                </div>
                <div class="login-google-container">
                    <a href="{{ route('login') }}" style="text-decoration: none; color: white;"><p style="color: gray; cursor: pointer;">Sudah punya akun?</p></a>
                    <a href="{{ route('auth.google') }}"  style="text-decoration: none; color: black; width: 100%; display: flex; align-items: center;  margin-top: 10px;
                        justify-content: center;
                        text-decoration: none;
                        border-radius: 50px;
                        background-color: white;">  
                    <div class="google-container-signin">
                        <img class="google" src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-webinar-optimizing-for-success-google-business-webinar-13.png" alt=""> <p class="google">Daftar dengan google</p>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <div class="container-user-friendly">
        <div class="wrap-user">
            <img src="https://skillphase.com/wp-content/uploads/2021/05/skillphase-reach.png" alt="" class="user-cartoon">
            <div class="info-user-friendly">
                    <div class="item-uf">
                        <h1 class="mulai-sekarang">Mulai Sekarang !</br>GRATIS.</h1>
                    </div>
                    <div class="item-uf">
                        <button class="buat-trip"><a href="{{ route('filterwisata') }}" style="text-decoration: none; color: white;">Buat Trip</a></button>
                    </div>
            </div>
        </div>
        <h2 class="mudah">Mudah digunakan .</h2>
    </div>
</body>
</html>
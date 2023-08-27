<?php
use Illuminate\Support\Facades\Auth;

$user = Auth::check();
$users = Auth::user();

if (!$user || ($user && !$users->isAdmin)) {
    header("Location: /login");
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
    <title>Buat Wisata</title>
</head>
<body>
    @include('components.navbar')
    @auth
<div style="background-color: rgb(167, 167, 167); height: 130vh;">
        <div class="container-xvh">
            <div class="create-ff-zz">
                <div class="wrapper-ff-zz">
                    <div class="detail-wisata-infos">
                       <div class="gambar-detail-macam-paket-ssh"> 
                            <form action="{{ route('wisata.create') }}" method="POST" enctype="multipart/form-data" class="xd-xt">
                            @csrf
                            <div class="gambar-detail-wrapper-ssh">
                                <div class="ssh-alo">
                                    <img
                                    src="https://www.costacruises.eu/content/dam/costa/inventory-assets/ports/JTR/jtr-santorini-port-1.jpg.image.2048.1536.medium.jpg"
                                    alt=""
                                    class="paket-wisata-detailImgs"
                                    />
                                </div>
                            </div>
                            <div class="container-xprice-ssh">
                                <div class="input-container-fp">
                                    <label for="name" class="fp">Nama Wisata</label>
                                    <input type="text" id="name" name="name" class="fpass">
                                </div>
                                <div class="input-container-fp">
                                    <label for="description" class="fp">Deskripsi Wisata</label>
                                    <input type="text" id="description" name="description" class="fpass" >
                                </div>
                                <div class="input-container-fp">
                                    <label for="img_wisata" class="fp">Gambar</label>
                                    <input type="file" id="img_wisata" name="img_wisata" class="fpass" style="border: none;">
                                </div>
                                <div class="input-container-fp">
                                    <label for="price" class="fp">Harga</label>
                                    <input type="number" id="price" name="price" class="fpass" >
                                </div>
                                <div class="input-container-fp">
                                    <label for="kota" class="fp">Kota</label>
                                    <input type="text" id="kota" name="kota" class="fpass">
                                </div>      
                                <div class="input-container-fp">
                                    <label for="ratings" class="fp">Ratings</label>
                                    <input type="text" id="ratings" name="ratings" class="fpass">
                                </div>
                                <div class="input-container-fp">
                                    <button type="submit" class="xx-sha">Submit</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END OF CREATE--FF--ZZ -->
            </div>
        <!-- END OF CONTAINER-XVH -->
        </div>
</div>
@endauth
</body>
</html>

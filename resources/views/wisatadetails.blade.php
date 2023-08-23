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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
  <link rel="icon" href="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/travel-agency-logo%2C-travel-company-logo-%281%29-design-template-bc9dcb1ca0e92d6394dea26418a87c8e_screen.jpg?ts=1667975913">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail</title>
</head>
<body>
<div style="margin-top: 100px;">
        @auth
        @include('components.navbar')
      <div class="detailwisata-container">
          <div id="sliders" class="slider-detail-wisata" style="display: none;">
              <i class="fa fa-close" style="top: 20px; right: 20px; position: absolute; font-size: 30px; color: lightgray; cursor: pointer;" onclick="toogleMenu()"></i>
              <div class="sliderWrapperDetailWisata">
                  <img src="{{ asset('uploads/img/' . $itenaryDetails->img_wisata) }}" id="sliderImg" alt="" class="sliderImgWisata"/>
              </div>
          </div>
        <div class="detail-wisata-info">
        <a href="{{ url()->previous() }}" style="text-decoration: none; color: white;"> <button class="bookNow">Kembali</button></a>
          <!-- <h1 class="detail-nama-paket">{{$itenaryDetails->name}}</h1> -->
          <div class="detail-alamat-paket">
            <span>{{ $itenaryDetails->name }}</span>
          </div>
          <span class="jarak-paket-wisata">
            {{ $itenaryDetails->kota }}
          </span>
          <span class="harga-paket-wisata-detail">
          <!-- <small>Kategori: {{ $itenaryDetails->kategori }}</small> -->
          </span>
          <div class="gambar-detail-macam-paket">
              <div class="gambar-detail-wrapper" key="{{ $itenaryDetails->id }}">
                <img
                  src="{{ asset('uploads/img/' . $itenaryDetails->img_wisata) }}"
                  alt=""
                  class="paket-wisata-detailImg"
                  onclick="toogleMenu()"
                />
              </div>
          </div>
          <div class="deskripsi-paket-container">
            <div class="deskripsi-paket-wrapper">
              <!-- <h1 class="detail-nama-paket">List Wisata {{ $itenaryDetails->paket_wisata }}</h1> -->
                <div class="fpRating">
                  <h1 class="rator-z-t">Rating</h1>
                  <button>8.9</button>
                </div>
              <p class="desc-pkt-wisata">
                {{ $itenaryDetails->description }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('components.footer')
    @endauth
</body>
</html>



<script>


function toogleMenu() {
    var menuContainer = document.getElementById('sliders');
    
    if (menuContainer.style.display === 'none') {
        menuContainer.style.display = 'block';
        menuContainer.style.display = 'flex';
    } else {
        menuContainer.style.display = 'none';
    }
}

</script>




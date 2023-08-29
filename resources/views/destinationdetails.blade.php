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

<?php
function formatCurrency($value) {
  // Format the value as a currency with thousands separators
  return number_format($value, 0, ',', '.');
}?>

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
                  <img src="{{ asset('uploads/img/' . $results->img_wisata) }}" id="sliderImg" alt="" class="sliderImgWisata"/>
              </div>
          </div>
        <div class="detail-wisata-info">
        <a href="{{ route('destinasi') }}" style="text-decoration: none; color: white;"> <button class="bookNow">Kembali</button></a>
          <h1 class="detail-nama-paket">{{$results->name}}</h1>
          <span class="jarak-paket-wisata">
            {{ $results->kota }}
          </span>
          <span class="harga-paket-wisata-detail">
          </span>
          <div class="gambar-detail-macam-paket">
              <div class="gambar-detail-wrapper" key="{{ $results->id }}">
                <img
                  src="{{ asset('uploads/img/' . $results->img_wisata) }}"
                  alt=""
                  class="paket-wisata-detailImg"
                  onclick="toogleMenu()"
                />
              </div>
          </div>
          <div class="deskripsi-paket-container">
            <div class="deskripsi-paket-wrapper">
                <div class="fpRating">
                  <h1 class="rator-z-t">Rating</h1>
                  <button>{{ $results->ratings }}</button>
                </div>
              <p class="desc-pkt-wisata">
                {{ $results->description }}
              </p>
            </div>
            <div class="harga-detail-pkt-wisata">
            <small>Mulai dari</br><b> Rp. {{ formatCurrency($results->price) }} / pax</b></small>
            <h1>Jumlah Orang </n> @if ($jumlahorang > 0)
                  <b>{{ ($jumlahorang) }}</b>
              @else
                  <b>1</b>
              @endif</h1>
              <span>
                Total Harga Untuk </br><span style="font-weight: 700;">{{ $results->name }}</span>
              </span>
              <h2>
              @if ($jumlahorang > 0)
              <b>Rp. {{ formatCurrency($results->price * $jumlahorang) }}</b>
              @else
              <b>Rp. {{ formatCurrency($results->price) }}</b>
              @endif
              </h2>
              <form id="hiddenForm" action="{{ route('xendit') }}" method="POST" style="display: none;">
              @csrf
              @if(Auth::check())
              <?php $userEmail = Auth::user()->email; ?>
              <input type="hidden" name="payer_email" value="{{ $userEmail }}">
              <input type="hidden" name="description" value="Pembayaran Tiket {{ $results->name }}">
              @if ($jumlahorang > 0)
              <input type="hidden" name="amount" value="{{ $results->price * $jumlahorang }}">
              @else
                <input type="hidden" name="amount" value="{{ $results->price }}">
              @endif
              @endif
              </form>
              <button id="submitButton" type="submit" name="submit">Pesan Tiket Sekarang!</button>
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
    document.getElementById('submitButton').addEventListener('click', function() {
        document.getElementById('hiddenForm').submit();
    });
</script>

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




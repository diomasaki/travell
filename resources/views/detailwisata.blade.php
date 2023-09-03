<?php
use Illuminate\Support\Facades\Auth;

$user = Auth::check();
$users = Auth::user();
$userEmail = $users->email;

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
              <i class="fa fa-close" style="top: 20px; right: 20px; position: absolute; font-size: 30px; color: lightgray; cursor: pointer;" onclick="closeSlider()"></i>
              <i class="fa fa-arrow-left" style="top: 50%; left: 20px; position: absolute; font-size: 50px; color: lightgray; cursor: pointer; transform: translateY(-50%);" onclick="handleMove('l')"></i>
              <div class="sliderWrapperDetailWisata">
                  <img src="" id="sliderImg" alt="" class="sliderImgWisata"/>
              </div>
              <i class="fa fa-arrow-right" style="top: 50%; right: 20px; position: absolute; font-size: 50px; color: lightgray; cursor: pointer; transform: translateY(-50%);" onclick="handleMove('r')"></i>
          </div>
        <div class="detail-wisata-info">
        <a href="{{ route('itenary', ['id' => $detailData->id])}}" style="text-decoration: none; color: white;"> <button class="bookNow">Lihat Kumpulan Wisata</button></a> 
        <a href="/paketwisata" style="text-decoration: none; color: white;"> <button class="bookNow-kembali">Kembali</button></a>
          <h1 class="detail-nama-paket">{{$detailData->paket_wisata}}</h1>
          <div class="detail-alamat-paket">
          @foreach ($relatedWisata as $index => $detailWisataInformation)
            <span>{{ $detailWisataInformation->name }}</span>
            @if ($index < count($relatedWisata) - 1)
                <span>-</span>
            @endif
          @endforeach
          </div>
          <span class="jarak-paket-wisata">
            {{ $detailData->kota }}
          </span>
          <span class="harga-paket-wisata-detail">
          <small>Kategori: {{ $detailData->kategori }}</small>
          </span>
          <div class="gambar-detail-macam-paket">
          @foreach ($relatedWisata as $index => $foto)
              <div class="gambar-detail-wrapper" key="{{ $foto->id }}">
                <img
                  src="{{ asset('uploads/img/' . $foto->img_wisata) }}"
                  alt=""
                  class="paket-wisata-detailImg"
                  onclick="openSlider('{{ asset('uploads/img/' . $foto->img_wisata) }}', {{ $index }})"
                />
              </div>
          @endforeach
          </div>
          <div class="deskripsi-paket-container">
            <div class="deskripsi-paket-wrapper">
              <button style="background-color: #003580; color: white; border: none; padding: 4px;">{{ $detailData-> ratings }}</button>
              <h1 class="detail-nama-paket">List Wisata {{ $detailData->paket_wisata }}</h1>
              <p class="desc-pkt-wisata">
              <?php $count = 1?>
              @foreach ($relatedWisata as $index => $detailWisataInformation)
              <span><?=$count++?></span>
              <span>{{ $detailWisataInformation->name }}</span>
              @if ($index < count($relatedWisata) - 1)
              </br>
              @endif
              @endforeach
              </p>
              <p class="desc-pkt-wisata">
                {{ $detailData->keterangan }}
              </p>
            </div>
            <div class="deskripsi-paket-wrapper">
              <h1 class="detail-nama-paket">Rencana Perjalanan</h1>
              <?php $count = 1; ?>
              <p class="desc-pkt-wisata">
                  <?php
                  $itineraryLines = explode('.', $detailData->itinerary);
                  foreach ($itineraryLines as $line) {
                      if (!empty(trim($line))) {
                          echo "<span>{$count}.</span> {$line}<br>";
                          $count++;
                      }
                  }
                  ?>
              </p>
            </div>
            <div class="harga-detail-pkt-wisata">
              @if ($detailData->durasi > 0)
              <small></small>
              @else
              <small>Mulai dari 1 hari </br><b> Rp. {{ formatCurrency($detailData->budget) }} / pax</b></small>
              @endif
              <span>
                Total Harga Untuk </br><span style="font-weight: 700;">{{ $detailData->paket_wisata }}</span>
              </span>
              <h2>
                  <b>Rp.{{ formatCurrency($detailData->budget) }}</b>
              </h2>
                <button id="submitButton-Form">Pesan Tiket Sekarang!</button>
            </div>
          </div>
        </div>
      </div>
      @include('components/reserve')
    </div>
    @include('components.footer')
    @endauth
</body>
</html>


<script>
  const modal = document.querySelector(".reserve")
  const submitForm = document.getElementById('submitButton-Form');
  submitForm.addEventListener("click", () => {
    modal.style.display = 'block';
    modal.style.display = 'flex';
  })
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

const photos = {!! json_encode($relatedWisata->pluck('img_wisata')) !!};
    let slideNumber = 0;
    let open = false;

    function openSlider(imageSource, index) {
        slideNumber = index;
        document.getElementById('sliderImg').src = imageSource;
        open = true;
        updateSlider();
    }

    function closeSlider() {
        open = false;
        updateSlider();
    }

    function updateSlider() {
        const sliders = document.getElementById('sliders');
        if (open) {
            sliders.style.display = 'block';
        } else {
            sliders.style.display = 'none';
        }
    }

    function handleMove(direction) {
    if (direction === 'l') {
        slideNumber = slideNumber === 0 ? photos.length - 1 : slideNumber - 1;
    } else {
        slideNumber = (slideNumber + 1) % photos.length;
    }

    var baseUrl = "{{ asset('uploads/img') }}";
    
    var imageSource = baseUrl + '/' + photos[slideNumber];


    document.getElementById('sliderImg').src = imageSource;
    updateSlider();
}

</script>




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
    <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/font-awesome.min.css">
    <title>Destinasi</title>
</head>
<body>
  @auth
  @include('components.navbar')
    <div class="listbr">
      <div class="listContainer">
        <div class="listWrapper">
          <div class="listSearch">
            <h1 class="lsTitle">Form Pencarian</h1>
          <form action="{{ route('destinasi-filter') }}" method="POST" class="pencarian-paketwisata-filter">
            @csrf
            <!-- <div class="lsItem">
              <label>Durasi Liburan</label>
              <input placeholder="Durasi" type="text" name="durasi" />
            </div> -->
            <div class="lsItem">
              <label>Kabupaten/Kota</label>
              <select name="kota" id="kota" class="kabupaten">
                    <option disabled selected>Pilih</option>
                @foreach ($kotaOptions as $kotaOption)
                    <option value="{{ $kotaOption }}">{{ $kotaOption }}</option>
                @endforeach
              </select>
            </div>
            <div class="lsItem">
            <label>Estimasi Budget /<small> per orang</small></label>
              <input placeholder="Budget" type="number" name="price"/>
            </div>
            <button>Search</button>
          </form>
          </div>
          <div class="listResult">
            @include('components/listwisata')
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('components.footer')
@endauth
</body>
</html>
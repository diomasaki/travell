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
    <title>Paket Wisata</title>
</head>
<body>
    <div class="listbr">
@auth
    @include('components.navbar')
      <div class="listContainer">
        <div class="listWrapper">
          <div class="listSearch">
            <h1 class="lsTitle">Pencarian</h1>
            <div class="lsItem">
              <label>Durasi Liburan</label>
              <input placeholder="Durasi" type="text" />
            </div>
            <div class="lsItem">
              <label>Kabupaten/Kota</label>
              <input placeholder="Kota" type="text" />
            </div>
            <div class="lsItem">
              <label>Jumlah Orang</label>
              <input placeholder="Jumlah Orang" type="text" />
            </div>
            <div class="lsItem">
              <label>Estimasi Budget</label>
              <input placeholder="Budget" type="text" />
            </div>
            <div class="lsItem">
              <label>Tanggal Check-in</label>
              <input placeholder="Destinasi" type="text">
            </div>
            <div class="lsItem">
              <label>Kategori</label>
              <div class="lsOptions">
                <div class="lsOptionItem">
                  <span id="budaya" class="lsOptionText">
                     Budaya
                  </span>
                  <input for="budaya" type="radio" class="lsOptionInput" />
                </div>
                <div class="lsOptionItem">
                  <span id="pantai" class="lsOptionText">
                    Pantai
                  </span>
                  <input for="pantai" type="radio" class="lsOptionInput" />
                </div>
                <div class="lsOptionItem">
                  <span id="religi" class="lsOptionText">Religi</span>
                  <input
                    for="religi"
                    type="radio"
                    min={1}
                    class="lsOptionInput"
                    placeholder="Dewasa"
                  />
                </div>
                <div class="lsOptionItem">
                  <span id="alam" class="lsOptionText">Alam</span>
                  <input
                    for="alam"
                    type="radio"
                    min={0}
                    class="lsOptionInput"
                    placeholder="Anak Kecil"
                  />
                </div>
                <div class="lsOptionItem">
                  <span id="minat" class="lsOptionText">Minat Khusus</span>
                  <input
                    for="minat"
                    type="radio"
                    min={1}
                    class="lsOptionInput"
                    placeholder="Kamar"
                  />
                </div>
              </div>
            </div>
            <button>Search</button>
          </div>
          <div class="listResult">
            @include('components/listpaketwisata')
          </div>
        </div>
      </div>
    </div>
@endauth
    </div>
</body>
</html>
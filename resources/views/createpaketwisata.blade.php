<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link
    href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
    <link rel="icon" href="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/travel-agency-logo%2C-travel-company-logo-%281%29-design-template-bc9dcb1ca0e92d6394dea26418a87c8e_screen.jpg?ts=1667975913">
    <title>Buat Paket Wisata</title>
</head>
<body>
<div>
    @auth
    <div class="header-container-create">
        <div class="header-container-wrapper">
            <div class="top-header-create">
                <div class="img-header-cont">
                    <img class="header-cr" src="https://static.vecteezy.com/system/resources/previews/009/135/093/original/yie-logo-yie-letter-yie-letter-logo-design-initials-yie-logo-linked-with-circle-and-uppercase-monogram-logo-yie-typography-for-technology-business-and-real-estate-brand-vector.jpg" alt="">
                </div>
                <div class="info-create-pkt">
                    <div class="logo-pkt-header">Youridealescape.</div>
                    <h1 style="margin-left: 30px; color: white;"><small>youridealescape.com <i style="margin-left: 10px;" class="fa fa-share-square-o" aria-hidden="true"></i></small></h1>
                </div>
            </div>
        </div>
        <span class="span-he">Membuat Paket Wisata</span>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{route('paketwisata.create')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="container-form-create">
        <div class="wrapper-form-wisata">
            <div class="left-form-wist">
                <div class="divvv"><small class="ft-small">Nama Paket Wisata</small><small style="font-size: 15px; margin-top: 20px;">Berikan nama untuk paket wisata</small></div>
            </div>
            <div class="right-form-wist">
                <input type="text" class="form-create-pkt" name="paket_wisata" placeholder="Nama paket">
            </div>
        </div>
    </div>
    <div class="container-form-create">
        <div class="wrapper-form-wisata">
            <div class="left-form-wist">
                <div class="divvv"><small class="ft-small">Harga</small><small style="font-size: 15px; margin-top: 20px;">Berikan harga untuk paket wisata</small></div>
            </div>
            <div class="right-form-wist">
            <small style="font-size: 15px; margin-top: 20px;"></small>Rp.  <input type="number" class="form-create-pkt" name="budget" placeholder="1000000">
            </div>
        </div>
    </div>
    <div class="container-form-create">
        <div class="wrapper-form-wisata">
            <div class="left-form-wist">
                <div class="divvv"><small class="ft-small">Kota</small><small style="font-size: 15px; margin-top: 20px;">Berikan kota untuk paket wisata</small></div>
            </div>
            <div class="right-form-wist">
                <input type="text" class="form-create-pkt" placeholder="Nama kota" name="kota">
            </div>
        </div>
    </div>
    <div class="container-form-create">
        <div class="wrapper-form-wisata">
            <div class="left-form-wist">
                <div class="divvv"><small class="ft-small">Kategori</small><small style="font-size: 15px; margin-top: 20px;">Berikan kategori untuk paket wisata</small></div>
            </div>
            <div class="right-form-wist">
                <input type="text" class="form-create-pkt" placeholder="Nama kategori" name="kategori">
            </div>
        </div>
    </div>
    <div class="container-form-create">
        <div class="wrapper-form-wisata">
            <div class="left-form-wist">
                <div class="divvv"><small class="ft-small">Gambar Paket Wisata</small><small style="font-size: 15px; margin-top: 20px;">Berikan gambar untuk paket wisata</small></div>
            </div>
            <div class="gambar-detail-macam-paket">
              <div class="gambar-detail-wrapper">
                <img
                  src="https://media.timeout.com/images/106025742/image.jpg"
                  alt=""
                  class="ex-img-cr"
                />
                <input
                    type="file"
                    name="img_paketwisata"
                    style="margin-top:15px;"
                />
              </div>
          </div>
        </div>
    </div>
    <div class="container-form-create">
        <div class="wrapper-form-wisata">
            <div class="left-form-wist">
                <div class="divvv"><small class="ft-small">Keterangan</small><small style="font-size: 15px; margin-top: 20px;">Berikan keterangan untuk paket wisata</small></div>
            </div>
            <div class="right-form-wist">
                <input type="text" class="form-create-pkt" placeholder="Berikan keterangan paket wisata" name="keterangan">
            </div>
        </div>
    </div>
    <div class="container-form-create">
        <div class="wrapper-form-wisata">
            <div class="left-form-wist">
                <div class="divvv"><small class="ft-small">Ratings</small><small style="font-size: 15px; margin-top: 20px;">Berikan ratings untuk paket wisata</small></div>
            </div>
            <div class="right-form-wist">
                <input type="text" class="form-create-pkt" placeholder="Rating paket wisata" name="ratings">
            </div>
        </div>
    </div>
    <div class="container-form-create">
        <div class="wrapper-form-wisata">
            <div class="left-form-wist">
                <div class="divvv"><small class="ft-small">Initerary</small><small style="font-size: 15px; margin-top: 20px;">Berikan rencana perjalanan untuk paket wisata</small></div>
            </div>
            <div class="right-form-wist">
                <input type="text" class="form-create-pkt" placeholder="Berikan list aktivitas paket wisata" name="itinerary">
            </div>
            <button class="create-wisata-btn" type="submit">Submit</button>
        </div>
    </div>
    </form>
    @endauth
</body>
</html>

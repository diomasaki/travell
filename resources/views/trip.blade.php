

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link
    href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/font-awesome.min.css">
    <link rel="icon" href="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/travel-agency-logo%2C-travel-company-logo-%281%29-design-template-bc9dcb1ca0e92d6394dea26418a87c8e_screen.jpg?ts=1667975913">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Wisata</title>
</head>
<body>
    @include('components.navbar')
    @include('components.filter')
    <div class="popularWisataContainer">
                <div class="fp">
                <div class="title-popular-content">Tempat Wisata Popular</div>
                <div class="fixedPopularContainer">
            @if (count($results) > 0)
            @foreach ($results as $index => $result)
            @if ($index < 4)
            <div class="fpItem">
            <a href="{{ route('wisata-detail', ['id' => $result->id]) }}" style="text-decoration: none; color: white;">
                <img
                src="{{ asset('uploads/img/' . $result->img_wisata) }}"
                alt=""
                class="fpImg"
                />
            </a>
                <span class="fpName">{{ $result->name }}</span>
                <span class="fpCity">{{$result->description}}</span>
                <span class="fpPrice">Harga tiket masuk Rp.{{$result->price}}</span>
                <div class="fpRating">
                <button>8.9</button>
                <span>Terbaik</span>
                </div>
            </div>
            @endif
            @endforeach
  @else
      <p>No results found.</p>
  @endif
            </div>            
            </div>
    </div>
    <div class="popularWisataContainer">
                <div class="fp">
                <div class="title-popular-content">Artikel Popular</div>
                <div class="fixedPopularContainer">
            <div class="fpItem">
                <a href="https://www.nativeindonesia.com/pantai-pailus-jepara/">
                    <img
                    src="https://www.nativeindonesia.com/foto/2023/08/pasir-putih-Pantai-Pailus.jpg"
                    alt=""
                    class="fpImg"
                    />
                </a>
                <span class="fpName">Pantai Pailus</span>
                <span class="fpCity">Desa Karanggondang, Kecamatan Mlonggo, Kabupaten Jepara, Jawa Tengah.</span>
            </div>
            <div class="fpItem">
                <a href="https://www.nativeindonesia.com/wisata-bukit-watu-songgong-nganjuk-kawasan-berbukit-dengan-yansunset-yang-menawan/">
                    <img
                    src="https://www.nativeindonesia.com/foto/2023/08/wisata-bukit-watu-songgong.jpg"
                    alt=""
                    class="fpImg"
                    />
                </a>
                <span class="fpName">Bukit Waktu Songong</span>
                <span class="fpCity">Sembung, Desa Margopatut, Kecamatan Sawahan, Kabupaten Nganjuk, Provinsi Jawa Timur, 64475.</span>
            </div>
            <div class="fpItem">
                <a href="https://www.nativeindonesia.com/kali-biru-raja-ampat/">
                    <img
                    src="https://www.nativeindonesia.com/foto/2023/08/nyobain-foto-underwater.jpg"
                    alt=""
                    class="fpImg"
                    />
                </a>
                <span class="fpName">Kali Biru Raja Ampat</span>
                <span class="fpCity">Kampung Warsambin, Distrik Teluk Mayalibit, Kabupaten Raja Ampat, Papua Barat.</span>
            </div>
            <div class="fpItem">
                <a href="https://www.nativeindonesia.com/wisata-goa-margo-tresno-nganjuk-goa-magis-dengan-pemandangan-dan-panorama-alami/">
                    <img
                    src="https://www.nativeindonesia.com/foto/2023/08/alam-sejuk-di-goa-margo-tresno.jpg"
                    alt=""
                    class="fpImg"
                    />
                </a>
                <span class="fpName">Goa Margo Tresno</span>
                <span class="fpCity">Dusun Cabean, Desa Sugih Waras, Kecamatan Ngluyu</br>Kabupaten Nganjuk, Jawa Timur.</span>
            </div>
            </div>            
            </div>
    </div>
    @include('components.footer')
</body>
</html>
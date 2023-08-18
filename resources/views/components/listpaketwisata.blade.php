<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link
    href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    @if (count($results) > 0)
        @foreach ($results as $result)
<div class="searchItem">
      <img
        src="https://cf.bstatic.com/xdata/images/hotel/square600/261707778.webp?k=fa6b6128468ec15e81f7d076b6f2473fa3a80c255582f155cae35f9edbffdd78&o=&s=1"
        alt=""
        class="siImg"
      />
      <div class="siDesc">
        <h1 class="siTitle">{{$result->paket_wisata}}</h1>
        <span class="siDistance">{{$result->kota}}</span>
        <span class="siTaxiOp">{{$result->kategori}}</span>
        <!-- <span class="siSubtitle">
          Studio Apartment with Air conditioning
        </span> -->
        <!-- <span class="siFeatures">
          Entire studio • 1 bathroom • 21m² 1 full bed
        </span> -->
        <!-- <span class="siCancelOp">Free cancellation </span> -->
        <!-- <span class="siCancelOpSubtitle">
          You can cancel later, so lock in this great price today!
        </span> -->
      </div>
      <div class="siDetails">
        <div class="siRating">
          <span>Excellent</span>
          <button>8.9</button>
        </div>
        <div class="siDetailTexts">
          <span class="siPrice">{{$result->budget}}</span>
          <!-- <span class="siTaxOp">Includes taxes and fees</span> -->
          <button class="siCheckButton">Detail</button>
        </div>
      </div>
    </div>
    @endforeach
  @else
      <p>No results found.</p>
  @endif
</body>
</html>
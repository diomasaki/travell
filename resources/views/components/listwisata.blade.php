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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    @if (count($results) > 0)
        @foreach ($results as $result)
<div class="searchItem">
      <img
        src="{{ asset('uploads/img/' . $result->img_wisata) }}"
        alt=""
        class="siImg"
      />
      <div class="siDesc">
        <h1 class="siTitle">{{$result->name}}</h1>
        <span class="siDistance">{{$result->kota}}</span>
        <span class="siTaxiOp">{{$result->description}}</span>
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
         @if(auth()->user() && auth()->user()->isAdmin)
        <div class="edit-wisata-item">
          <a href="{{ route('buat-wisatabaru') }}" style="text-decoration: none; color: black;">
          <div class="items-configuration">
            <small>Create</small>
          </div>
          </a>
          <a href="{{ route('edit.destinasi', ['id' => $result->id]) }}" style="text-decoration: none; color: black;">
          <div class="items-configuration">
            <small>Edit</small>
          </div>
          </a>
          <div class="items-configuration">
            <small>Delete</small>
          </div>
        </div>
        @endif
        <div class="siRating">
          <span style="margin-right: 15px;">Rating</span>
          <button>{{ $result->ratings }}</button>
        </div>
        <div class="siDetailTexts">
        <span class="siDistance">Mulai dari 1 hari</span>
          <span class="siPrice">Rp.{{ formatCurrency($result->price) }}/<small>pax</small></span>
          <!-- <span class="siTaxOp">Includes taxes and fees</span> -->
          <a href="{{ route('wisata-detail', ['id' => $result->id]) }}" style="text-decoration: none; color: white;">
          <button class="siCheckButton">Detail</button>
          </a>
        </div>
      </div>
    </div>
    @endforeach
  @else
      <p>No results found.</p>
  @endif
</body>
</html>
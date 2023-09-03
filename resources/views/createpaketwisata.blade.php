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
    <title>Buat Paket Wisata</title>
</head>
<body>
    @include('components.navbar')
    @auth
<div style="background-color: rgb(167, 167, 167); height: 180vh;">
        <div class="container-xvh">
            <div class="create-ff-zz">
                <div class="wrapper-ff-zz">
                    <a href="{{ url()->previous() }}" style="text-decoration: none; color: white;"> <button class="bookNow-kembali">Kembali</button></a>
                    <div class="detail-wisata-infos">
                       <div class="gambar-detail-macam-paket-ssh"> 
                            <form action="{{  route('paketwisata.create')  }}" method="POST" enctype="multipart/form-data" class="xd-xt" id="myForm">
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
                                    <label for="paket_wisata" class="fp">Nama Paket Wisata</label>
                                    <input type="text" id="paket_wisata" name="paket_wisata" class="fpass">
                                </div>
                                <div class="input-container-fp">
                                    <label for="budget" class="fp">Harga</label>
                                    <input type="number" id="budget" name="budget" class="fpass" >
                                </div>
                                <div class="input-container-fp">
                                    <label for="kota" class="fp">Kota</label>
                                    <input type="text" id="kota" name="kota" class="fpass" >
                                </div>
                                <div class="input-container-fp">
                                    <label for="kategori" class="fp">Kategori</label>
                                    <div class="input-kategori-wisata">
                                        <input type="checkbox" id="kategori-budaya"  value="Budaya" class="wisata-li">
                                        <label for="kategori-budaya">Budaya</label>
                                    </div>
                                    <div class="input-kategori-wisata">
                                        <input type="checkbox" id="kategori-pantai" value="Pantai" class="wisata-li">
                                        <label for="kategori-pantai">Pantai</label>
                                    </div>
                                    <div class="input-kategori-wisata">
                                        <input type="checkbox" id="kategori-religi" value="Religi" class="wisata-li">
                                        <label for="kategori-religi">Religi</label>
                                    </div>
                                    <div class="input-kategori-wisata">
                                        <input type="checkbox" id="kategori-alam" value="Alam" class="wisata-li">
                                        <label for="kategori-alam">Alam</label>
                                    </div>
                                    <div class="input-kategori-wisata">
                                        <input type="checkbox" id="kategori-minatkhusus" value="Minat Khusus" class="wisata-li">
                                        <label for="kategori-minatkhusus">Minat Khusus</label>
                                    </div>
                                        <!-- Hidden input field for combined categories -->
                                        <input type="hidden" name="kategori" id="combinedCategoriesInput">
                                </div>
                                <div class="input-container-fp">
                                    <label for="img_paketwisata" class="fp">Gambar</label>
                                    <input type="file" id="img_paketwisata" name="img_paketwisata" class="fpass" style="border: none;">
                                </div>
                                <div class="input-container-fp">
                                    <label for="keterangan" class="fp">Keterangan</label>
                                    <input type="text" id="keterangan" name="keterangan" class="fpass">
                                </div>
                                <div class="input-container-fp">
                                    <label for="ratings" class="fp">Ratings</label>
                                    <input type="text" id="ratings" name="ratings" class="fpass" >
                                </div>
                                <div class="input-container-fp">
                                    <label for="durasi" class="fp">Jumlah Hari</label>
                                    <input type="text" id="durasi" name="durasi" class="fpass" >
                                </div>
                                <div class="input-container-fp">
                                    <label for="itinerary" class="fp">Itinerary</label>
                                    <input type="text" id="itinerary" name="itinerary" class="fpass">
                                </div>
                                <div class="input-container-fp">
                                    <button type="submit" class="xx-sha">Submit</button>
                                </div>
                            </div>
                            <div class="check-box-conts">
                                    <div class="ssh-xd">
                                        <h1 class="fz-eer">Pilih Wisata</h1>
                                    </div>
                                    <div class="borge-xsl">
                                    @foreach ($wisata as $wisatas)
                                    <div class="check-box-destination">
                                        <div class="menu-item-check">
                                            <label for="pid{{ $loop->iteration }}">{{ $wisatas->name }}</label>
                                        </div>
                                        <div class="menu-item-checks">
                                            <input type="checkbox" id="pid{{ $loop->iteration }}" class="cb" name="slot{{ $loop->iteration }}" value="{{ $wisatas->name }}">
                                        </div>
                                    </div>
                                    @endforeach
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


<script>
    const checkboxes = document.querySelectorAll('.wisata-li');
    const form = document.getElementById('myForm');

    form.addEventListener('submit', event => {
        const selectedCheckboxes = [];
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                selectedCheckboxes.push(checkbox.value);
            }
        });

        const combinedValues = selectedCheckboxes.join(', ');

        // Set the value of the hidden input field to the combinedValues
        const combinedCategoriesInput = document.getElementById('combinedCategoriesInput');
        combinedCategoriesInput.value = combinedValues;

        // Submit the form
        form.submit();
    });
</script>

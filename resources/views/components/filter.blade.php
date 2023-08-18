<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link
    href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/font-awesome.min.css">
    <title></title>
</head>
<body>
<div class="container-halaman-filter">
<div class="filter-wisata-container">
<div class="top-container-filter">
    <div class="form-filter-wisata">
        <h2 class="form-filter-title">Tentukan Opsi Liburan Sesuai Keinginanmu</h2>
        <div class="filters">
            <div class="filter-items">
                <i class="fa fa-building-o" aria-hidden="true"></i>
                <p class="filter-text">Durasi Liburan</p>
                <div class="hari-filter">
                    <input class="hari" name="hari" type="text">Hari
                </div>
            </div>
            <div class="filter-items">
                <i class="fa fa-building-o" aria-hidden="true"></i>
                <p class="filter-text">Kabupaten/Kota</p>
                <select name="kota" id="kota" class="kabupaten">
                    <option disabled>Pilih</option>
                    <option id="kota" name="kota" value="Denpasar">Denpasar</option>
                    <option id="kota" name="kota" value="Jakarta">Jakarta</option>
                </select>
            </div>
            <div class="filter-items">
                <i class="fa fa-building-o" aria-hidden="true"></i>
                <p class="filter-text">Jumlah Orang</p>
                <div class="hari-filter">
                    <input class="hari" name="orang" default="1" type="text">Orang
                </div>
            </div>
            <div class="filter-items">
                <i class="fa fa-building-o" aria-hidden="true"></i>
                <p class="filter-text">Estimasi Budget</p>
                <div class="hari-filter">
                    <div class="rp">
                        Rp
                    </div>
                    <input class="haris" name="budget" default="100.000" type="text">
                </div>
            </div>
            <div class="filter-items-wisata-kategori">
                <form action="{{ route('kirim_paket_wisata') }}" method="POST">
                    @csrf
                <p class="filter-text">Pilih Kategori Wisata</p>
                    <div class="input-kategori-wisata">
                        <input type="radio" name="kategori" id="kategori-budaya"  value="Budaya" class="wisata-li">
                        <label for="kategori-budaya">Budaya</label>
                    </div>
                    <div class="input-kategori-wisata">
                        <input type="radio" name="kategori" id="kategori-pantai" value="Pantai" class="wisata-li">
                        <label for="kategori-pantai">Pantai</label>
                    </div>
                    <div class="input-kategori-wisata">
                        <input type="radio" name="kategori" id="kategori-religi" value="Religi" class="wisata-li">
                        <label for="kategori-religi">Religi</label>
                    </div>
                    <div class="input-kategori-wisata">
                        <input type="radio" name="kategori" id="kategori-alam" value="Alam" class="wisata-li">
                        <label for="kategori-alam">Alam</label>
                    </div>
                    <div class="tttt">
                        <button type="submit" name="submit" class="lihat-hasil">Lihat Hasil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
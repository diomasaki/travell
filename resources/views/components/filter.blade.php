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
        <form action="{{ route('pencarian-paketwisata') }}" method="POST" class="filters">
            @csrf
            <div class="filter-items">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <p class="filter-text">Durasi Liburan</p>
                <div class="hari-filter">
                    <input class="hari" name="durasi" type="text">Hari
                </div>
            </div>
            <div class="filter-items">
                <i class="fa fa-building-o" aria-hidden="true"></i>
                <p class="filter-text">Kabupaten/Kota</p>
                <select name="kota" id="kota" class="kabupaten">
                    <option disabled selected>Pilih</option>
                @foreach ($kotaOptions as $kotaOption)
                    <option value="{{ $kotaOption }}">{{ $kotaOption }}</option>
                @endforeach
                </select>
            </div>
            <div class="filter-items">
                <i class="fa fa-users" aria-hidden="true"></i>
                <p class="filter-text">Jumlah Orang</p>
                <div class="hari-filter">
                    <input class="hari" name="jumlah_orang" default="1" type="text">Orang
                </div>
            </div>
            <div class="filter-items">
                <i class="fa fa-money" aria-hidden="true"></i>
                <p class="filter-text">Estimasi Budget /<small> per orang</small></p>
                <div class="hari-filter">
                    <div class="rp">
                        Rp
                    </div>
                    <input class="haris" name="budget" type="number">
                </div>
            </div>
            <div class="filter-items-wisata-kategori">
                <p class="filter-text">Pilih Kategori Wisata</p>
                    <div class="input-kategori-wisata">
                        <input type="checkbox" name="kategoribudaya" id="kategori-budaya"  value="Budaya" class="wisata-li">
                        <label for="kategori-budaya">Budaya</label>
                    </div>
                    <div class="input-kategori-wisata">
                        <input type="checkbox" name="kategoripantai" id="kategori-pantai" value="Pantai" class="wisata-li">
                        <label for="kategori-pantai">Pantai</label>
                    </div>
                    <div class="input-kategori-wisata">
                        <input type="checkbox" name="kategorireligi" id="kategori-religi" value="Religi" class="wisata-li">
                        <label for="kategori-religi">Religi</label>
                    </div>
                    <div class="input-kategori-wisata">
                        <input type="checkbox" name="kategorialam" id="kategori-alam" value="Alam" class="wisata-li">
                        <label for="kategori-alam">Alam</label>
                    </div>
                    <div class="input-kategori-wisata">
                        <input type="checkbox" name="kategoriminat" id="kategori-minatkhusus" value="Minat Khusus" class="wisata-li">
                        <label for="kategori-minatkhusus">Minat Khusus</label>
                    </div>
                    <div class="tttt">
                        <button type="submit" name="submit" class="lihat-hasil">Lihat Hasil</button>
                    </div>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
</div>
</body>
</html>
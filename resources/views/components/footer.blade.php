<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
</head>
<body>
    <div class="footer">
        <div class="wrap-footer">
            <div class="box">
                <div class="firstBox">
                    <img src="https://media.licdn.com/dms/image/C560BAQFIevR1NgXOxQ/company-logo_200_200/0/1657819668925?e=2147483647&v=beta&t=KnCNf9R8AjU_c_iF8BNLnwtWtZRwvn_aqsYW4yIzOPI" alt="" class="logo-footer">
                    <div class="info-footer">
                        <div class="logo-name">youridealescape</div>
                        <p class="slogan-footer">GAPERLU BINGUNG RENCANAIN LIBURAN KAMU</p>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="footerItem">
                    <p class="info-footer-heading">LAYANAN</p>
                    <a href="{{ route('destinasi') }}" style="text-decoration: none; color: black;"><p class="info-footer-item">Destinasi</p></a>
                    <p class="info-footer-item">Hubungi Kami</p>
                </div>  
            </div>
            <div class="box">
                <div class="footerItem">
                <p class="info-footer-heading">Halaman</p>
                <a href="{{ route('home') }}" style="text-decoration: none; color: black;"><p class="info-footer-item">Beranda</p></a>
                <a href="{{ route('destinasi') }}" style="text-decoration: none; color: black;"><p class="info-footer-item">Tempat Wisata</p></a>
                <a href="{{ route('buat-trip') }}" style="text-decoration: none; color: black;"><p class="info-footer-item">Paket Wisata</p></a>
                </div>  
            </div>
            <div class="box">
            <p class="info-footer-heading">IKUT KAMI DI</p>
                    <p class="info-footer-item">Instagram</p>
                    <p class="info-footer-item">Facebook</p>
                </div>  
            </div>
        </div>
    </div>
</body>
</html>
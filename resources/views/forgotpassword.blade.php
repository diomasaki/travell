<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link
    href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>

<body>
    <div class="forgot-password-container">
        <div class="forgot-p-wrapper">
            <div class="svg">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50">
            <path d="M 25 3 C 12.861573 3 3 12.861581 3 25 C 3 32.355537 6.6250215 38.869524 12.179688 42.865234 C 12.466118 43.08347 12.76394 43.286167 13.072266 43.474609 C 16.51078 45.701226 20.603935 47 25 47 C 37.138427 47 47 37.138419 47 25 C 47 12.861581 37.138427 3 25 3 z M 25 5 C 36.057548 5 45 13.94246 45 25 C 45 33.41644 39.811865 40.593799 32.460938 43.548828 C 37.580921 40.333485 41 34.652522 41 28.169922 C 41 18.148963 32.854951 10.003906 22.833984 10.003906 C 13.997811 10.003906 6.6288268 16.339273 5.0078125 24.707031 C 5.1649505 13.785678 14.04081 5 25 5 z M 22.833984 12.003906 C 31.774071 12.003906 39 19.229841 39 28.169922 C 39 34.987477 34.791974 40.796189 28.832031 43.175781 C 32.581275 40.592714 35.046875 36.274668 35.046875 31.386719 C 35.046875 23.493161 28.625986 17.072266 20.732422 17.072266 C 13.784853 17.072266 7.9834222 22.048712 6.6914062 28.623047 C 6.6871981 28.471025 6.6679688 28.322977 6.6679688 28.169922 C 6.6679688 19.229841 13.893898 12.003906 22.833984 12.003906 z M 20.732422 19.072266 C 27.545106 19.072266 33.046875 24.574039 33.046875 31.386719 C 33.046875 36.850879 29.504109 41.463385 24.587891 43.078125 C 27.271278 41.172349 29.03125 38.046221 29.03125 34.513672 C 29.03125 28.723214 24.315853 24.007812 18.525391 24.007812 C 13.733465 24.007812 9.6859494 27.241221 8.4296875 31.636719 C 8.4280084 31.552773 8.4179688 31.471075 8.4179688 31.386719 C 8.4179687 24.574039 13.919738 19.072266 20.732422 19.072266 z M 18.525391 26.007812 C 23.234973 26.007812 27.03125 29.804092 27.03125 34.513672 C 27.03125 39.223251 23.234973 43.019531 18.525391 43.019531 C 17.113766 43.019531 15.787074 42.672847 14.617188 42.068359 C 14.023947 41.728751 13.457344 41.350182 12.931641 40.919922 C 11.148464 39.362585 10.019531 37.076008 10.019531 34.513672 C 10.019531 29.804092 13.815808 26.007813 18.525391 26.007812 z"></path>
            </svg>
            </div>
           
            <x-auth-session-status class="error" :status="session('status')" />
            <!-- Validation Errors -->
            <x-auth-validation-errors class="error" :errors="$errors" />

            <div class="form-f-password">
                <div class="text-forgot-password">Lupa kata sandi Anda? Tidak masalah. Cukup beri tahu kami</br>  alamat email Anda dan kami akan mengirimi Anda email berisi </br> tautan pengaturan ulang kata sandi memungkinkan Anda </br>  memilih yang baru.</div>
                <form action="{{ route('password.email') }}" class="forgot-password" method="POST">
                    @csrf
                    <div class="input-container-fp">
                        <label for="email" :value="__('Email')" class="fp">Email</label>
                        <input type="text" id="email" name="email" class="fpass" :value="old('email')" required autofocus >
                    </div>
                    <div class="fp-button">
                        <button type="submit" class="fp-sbu">
                            EMAIL PASSWORD RESET LINK
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
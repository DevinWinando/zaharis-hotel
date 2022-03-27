<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Data Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=1980, initial-scale=1">
    <meta name="viewport" content="width=768, initial-scale=1">
    <meta name="viewport" content="width=320, initial-scale=1">
</head>

<body>
    <main class="form-signin">
        <div class="pgr shadow-lg">
            <svg height="129%" width="115%" id="svg" viewBox="0 0 1440 700" xmlns="http://www.w3.org/2000/svg"
                class="transition duration-300 ease-in-out delay-150">
                <defs>
                    <linearGradient id="gradient">
                        <stop offset="5%" stop-color="#1b262c66"></stop>
                        <stop offset="95%" stop-color="#3282b866"></stop>
                    </linearGradient>
                </defs>
                <path
                    d="M 0,700 C 0,700 0,175 0,175 C 177.7333333333333,168.06666666666666 355.4666666666666,161.13333333333335 527,172 C 698.5333333333334,182.86666666666665 863.8666666666666,211.53333333333333 1015,215 C 1166.1333333333334,218.46666666666667 1303.0666666666666,196.73333333333335 1440,175 C 1440,175 1440,700 1440,700 Z"
                    stroke="none" stroke-width="0" fill="url(#gradient)"
                    class="transition-all duration-300 ease-in-out delay-150"></path>
                <defs>
                    <linearGradient id="gradient">
                        <stop offset="5%" stop-color="#1b262c88"></stop>
                        <stop offset="95%" stop-color="#3282b888"></stop>
                    </linearGradient>
                </defs>
                <path
                    d="M 0,700 C 0,700 0,350 0,350 C 134.39999999999998,349.3333333333333 268.79999999999995,348.66666666666663 416,360 C 563.2,371.33333333333337 723.2,394.6666666666667 896,395 C 1068.8,395.3333333333333 1254.4,372.66666666666663 1440,350 C 1440,350 1440,700 1440,700 Z"
                    stroke="none" stroke-width="0" fill="url(#gradient)"
                    class="transition-all duration-300 ease-in-out delay-150"></path>
                <defs>
                    <linearGradient id="gradient">
                        <stop offset="5%" stop-color="#1b262cff"></stop>
                        <stop offset="95%" stop-color="#3282b8ff"></stop>
                    </linearGradient>
                </defs>
                <path
                    d="M 0,700 C 0,700 0,525 0,525 C 164.8,515.9333333333334 329.6,506.8666666666667 475,497 C 620.4,487.1333333333333 746.4000000000001,476.46666666666664 904,481 C 1061.6,485.53333333333336 1250.8,505.26666666666665 1440,525 C 1440,525 1440,700 1440,700 Z"
                    stroke="none" stroke-width="0" fill="url(#gradient)"
                    class="transition-all duration-300 ease-in-out delay-150"></path>
            </svg>

        </div>
        <div class="tgh shadow-lg">
            <form action="" method="post">
                @csrf
                <h1 class="h3 mb-3 text-center text-light">Silahkan Masuk</h1>
                <div class="form-floating">
                    <input type="text" class="form-control frm" id="floatingInput username" name="username"
                        placeholder="name">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control frm" id="floatingPassword password" name="password"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <i class="far fa-eye ey" aria-hidden="true" id="toggle-password" onclick="toggle();"></i>
                <div class="checkbox mb-3 d-flex justify-content-end">
                    <label>
                        <input type="checkbox" name="remember" value="remember-me"> Ingat Saya
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Masuk</button>

                <button class="dft w-100 btn btn-lg btn-primary">
                    <a href="register.php" style="text-decoration: none!important; color: white;">Daftar</a>
                </button>
            </form>
        </div>
    </main>
    
    @if (session('error'))
    <div class="position-absolute">
        <div class="d-flex justify-content-center align-items-center" style="width: 100vw">
            <div class="alert alert-danger alert-dismissible show fade">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    <script>
        var state = false;

        function toggle() {
            if (state) {
                document.getElementById("password").setAttribute('type', 'password');
                document.getElementById("toggle-password").style.color = '#7a797e';
                state = false;
            } else {
                document.getElementById("password").setAttribute('type', 'text');
                document.getElementById("toggle-password").style.color = '#5887ef';
                state = true;
            }
        }
    </script>

    <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>

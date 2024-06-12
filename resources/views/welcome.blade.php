<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>MAMSoCB</title>
    <link rel="stylesheet" href="{{ asset ('welcome_assets/bootstrap/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiko&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="{{asset('welcome_assets/css/vanilla-zoom.min.css')}}">
    <link rel="stylesheet" href="{{asset('welcome_assets/css/welcome.css')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('welcome_assets/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('welcome_assets/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('welcome_assets/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('/site.webmanifest')}}">
</head>

<body>


    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><img class="img-logo" src="{{asset('welcome_assets/img/PicsArt_03-01-08.13.45.png')}} "><img
                class="img-logo" src="{{asset('welcome_assets/img/PicsArt_03-01-05.09.12.png')}}"><img class="img-logo"
                src="{{asset('welcome_assets/img/PicsArt_03-01-12.00.461.png')}}"><button data-bs-toggle="collapse" class="navbar-toggler"
                data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse d-lg-flex justify-content-lg-end" id="navcol-1">
                @if (Route::has('login'))
                    <ul class="navbar-nav" style="text-align: right;">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <li class="nav-item"><a class="nav-link" id="link" href="{{ route('login') }}">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item"><a class="nav-link" id="link"
                                        href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    </ul>
                @endif
            </div>
        </div>
    </nav>


    <main class="page landing-page">
        <section class="clean-block clean-hero">
            <div class="text">
                <h2 data-aos="fade" data-aos-duration="3000" data-aos-once="true">Municipal Agriculture</h2>
                <p data-aos="fade" data-aos-duration="3000">Management System of Carmen Bohol</p>
                <a href="{{ route('login') }}"><button
                    class="btn btn-outline-light btn-lg" data-aos="zoom-out" data-aos-duration="3000" type="button">Log
                    in</button></a>
            </div>
        </section>
    </main>
    <script src="{{asset ('welcome_assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('welcome_assets/js/bs-init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="{{asset('welcome_assets/js/vanilla-zoom.js')}}"></script>
    <script src="{{asset('welcome_assets/js/theme.js')}}"></script>
</body>

</html>

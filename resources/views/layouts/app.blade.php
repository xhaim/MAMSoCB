<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Log in</title>
        <link rel="stylesheet" href="{{asset('login-assets/bootstrap/css/bootstrap.min.css')}} ">
        <link rel="stylesheet" href="{{asset('login-assets/css/Login-Form-Clean.css')}}">
        <link rel="stylesheet" href="{{asset('login-assets/css/styles.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}} ">
        <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}}">
        <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}}">
        <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}}">
        <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}}">

        @vite(['resources/js/app.js'])
    </head>
    
    <body>
        <div class="row d-flex" id="top-nav">
            <div class="col d-flex d-sm-flex d-md-flex d-xl-flex d-xxl-flex align-items-center align-items-sm-center justify-content-md-start align-items-md-center justify-content-xl-start align-items-xl-center justify-content-xxl-start align-items-xxl-center" id="col-head-2">
                <div class="d-xxl-flex justify-content-xxl-start align-items-xxl-end" id="logo">
                    <img id="img_logo" src="{{asset('login-assets/img/PicsArt_03-01-08.13.45.png')}}">
                    <img id="img_logo" src="{{asset('login-assets/img/PicsArt_03-01-05.09.12.png')}}">
                    <img id="img_logo" src="{{asset('login-assets/img/PicsArt_03-01-12.00.461.png')}}"></div>
                <h1 class="d-xl-flex d-xxl-flex align-items-xl-center justify-content-xxl-center align-items-xxl-center" id="heading">Municipal Agriculture&nbsp;<span id="span">Management System of Carmen Bohol</span></h1>
            </div>
        </div>
        <main class="">
            @yield('content')
        </main>
    </body>
    <script src="{{asset('login-assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('login-assets/bootstrap/js/login.js')}}"></script>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}}">
    <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}}">
    <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}}">
    <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}}">
    <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

    <link rel="stylesheet" href="{{asset('dash-assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dash-assets/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('dash-assets/css/Article-List.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="{{asset('dash-assets/css/styles.css')}}">
   
    
</head>
<body>
    <div class="row d-flex" id="top-nav">
        <div class="col text-center d-md-flex d-xxl-flex flex-row align-self-center justify-content-md-center align-items-md-center justify-content-xxl-center align-items-xxl-center" id="col-header">
            <h1 class="text-center d-xxl-flex justify-content-center align-items-center align-self-center align-items-xxl-center" id="fims-heading"><img id="logo" src="{{asset('dash-assets/img/DA_Logo.png')}} ">MAM<span id="header">SoCB</span></h1><i class="fa fa-align-justify" id="burger"></i>
        </div>
        <div class="col d-flex d-sm-flex d-md-flex d-xl-flex d-xxl-flex align-items-center align-items-sm-center align-items-md-center justify-content-xl-end align-items-xl-center justify-content-xxl-end align-items-xxl-center" id="col-head-2">
            <div class="d-xxl-flex justify-content-xxl-start align-items-xxl-end" id="div"></div>
            <div id="div2" class="profile">
                @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('/dashboard') }}">
                            <button class="btn btn-primary border-white shadow buttons button-top"
                                data-bss-hover-animate="pulse" type="button">Log in</button>
                        </a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown" style="list-style: none">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: var(--bs-light);"
                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="background-color: white; max-height:100px;">

                        <a class="dropdown-item" href="{{route('profile.edit')}}">
                            {{ __('Profile') }}
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                    

                </li>
            @endguest
            </div>
        </div>
    </div>
    
    <script src="{{asset('dash-assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dash-assets/js/bs-init.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="{{asset('dash-assets/js/maincontnav.js')}}"></script>
    <script>
        // JavaScript to handle the collapse functionality
        document.addEventListener('DOMContentLoaded', function() {
            const collapseButtons = document.querySelectorAll('[data-toggle="collapse"]');
            
            collapseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const targetElement = document.querySelector(targetId);
                    const iconElement = this.querySelector('i.fa');
                    if (targetElement.style.display === 'none' || targetElement.style.display === '') {
                        targetElement.style.display = 'block';
                        iconElement.classList.remove('fa-chevron-down');
                        iconElement.classList.add('fa-chevron-up');
                    } else {
                        targetElement.style.display = 'none';
                        iconElement.classList.remove('fa-chevron-up');
                        iconElement.classList.add('fa-chevron-down');
                    }
                });
            });
        });
  
    </script>
</body>

</html>
   
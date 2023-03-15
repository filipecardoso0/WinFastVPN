<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- JS -->
    <script type="text/javascript" src={{ asset('js/app.js') }} defer></script>

    <!-- CDN SECTION -->

    <!-- FONTAWESOME CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Sweet Alert CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <!-- BOOTSTRAP CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS -->
    <style>
        .masthead {
            height: 100vh;
            min-height: 500px;
            background-image: url({{url('images/landingimageblurred.jpg')}});
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .table td {
            text-align: center;
        }
    </style>
</head>
<body class="bg-dark">
    <div>
      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-danger">
          <div class="container-fluid">
              <a href="{{route('home')}}" class="navbar-brand">
                  <img src="../images/logonavsmallwhite.png" height="50" alt="Win Fast VPN">
              </a>
              <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                  <div class="navbar-nav">
                      <a href="{{route('home')}}" class="nav-item nav-link active text-light">Home</a>
                      <a href="{{route('home')}}#faq" class="nav-item nav-link text-light">FAQ</a>
                      <a href="{{route('home')}}#maincontent" class="nav-item nav-link text-light">Price</a>
                  </div>
                  <div class="navbar-nav ms-auto">
                      @if(auth()->user())
                          <a href="{{route('userdashboard')}}" class="nav-item nav-link text-light"><i class="fa-solid fa-user"></i> Profile</a>
                          <a href="{{route('logout')}}" class="nav-item nav-link text-light">Sign Off</a>
                      @else
                          <a href="{{route('login')}}" class="nav-item nav-link text-light"><i class="fa-solid fa-user"></i> Login</a>
                      @endif
                  </div>
              </div>
          </div>
      </nav>
    </div>

    <section id="content">
    @yield('content')
    </section>

    <!-- FOOTER -->
    <section class="mb-0">
      <!-- Footer -->
      <footer class="text-center text-white bg-danger">
          <!-- Grid container -->
          <div class="container p-4 pb-0">
              <div class="d-flex justify-content-between align-items-center" style="font-weight: 500">
                  <div class="d-flex flex-row">
                      <p>24/7 Support on Discord <i class="fa-brands fa-discord"></i> : WinFastVPN#1768</p>
                  </div>
                  <div>
                      <p><a href="{{route('privacy')}}" style="text-decoration: none; color: white">Privacy policy</a></p>
                  </div>
                  <div>
                      <p><a href="{{route('tospage')}}" style="text-decoration: none; color: white">Terms of Service</a></p>
                  </div>
              </div>
              <!-- Section: CTA -->
          </div>
          <!-- Grid container -->

          <!-- Copyright -->
          <div class="text-center p-3" style="background-color:  rgba(0, 0, 0, 0.5)">
              &#169; 2023 Copyright:
              <a class="text-white" href="#">winfastvpn.com</a>
          </div>
          <!-- Copyright -->
      </footer>
      <!-- Footer -->
    </section>

  </body>
</html>

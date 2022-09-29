<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/" />

    <!-- title -->
    <title>Toko Kita </title>

    {{-- midtrans --}}
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-NKIXku1J70TmxTVI"></script>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png" />
    <!-- google font -->
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" /> 
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/all.min.css" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/bootstrap/css/bootstrap.min.css" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/owl.carousel.css" />
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/magnific-popup.css" />
    <!-- animate css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/animate.css" />
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/meanmenu.min.css" />
    <!-- main style -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/main.css" />
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css" />
  </head>
  <body>
    <!--PreLoader-->
    <div class="loader">
      <div class="loader-inner">
        <div class="circle"></div>
      </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-sm-12 text-center">
            <div class="main-menu-wrap">
              <!-- logo -->
              <div class="site-logo">
                <a href="index.html">
                  <!-- <img src="assets/img/logo.png" alt="" /> -->
                  <h3 class="text-white">Toko Kita</h3>
                </a>
              </div>
              <!-- logo -->

              <!-- menu start -->
              <nav class="main-menu">
                <ul>
                  <li>
                    <a href="#">Home</a>
                  </li>
                  <li>
                    <a href="news.html">News</a>
                  </li>
                  <li class="current-list-item">
                    <a href="{{ route('toko') }}">Shop</a>
                  </li>

                  @if (auth()->guest())
                      <li>
                        <a href="{{ route('viewLogin') }}">Login</a>
                      </li>
                  @else
                    <li>
                      {{-- link profile --}}
                      <a class="" href="#">{{ auth()->user()->nama }}</a> 
                      <ul class="sub-menu">
                        <li>
                          <a onclick="submitForm()">LOGOUT</a>
                          <form action="{{ route('logout') }}" role="button" name="logoutForm" method="post">
                            @csrf
                            <input type="submit" value="Logout" class="badge border-0">
                          </form>
                        </li>
                      </ul>
                      {{-- /.link profile --}}
                    </li>
                  @endif
                  <li>
                    <div class="header-icons">
                      @if (auth()->user())
                        <a class="shopping-cart" href="{{ route('keranjang.index') }}"><i class="fas fa-shopping-cart"></i></a>
                      @endif
                      <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    </div>
                  </li>
                </ul>
              </nav>
              <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
              <div class="mobile-menu"></div>
              <!-- menu end -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <span class="close-btn"><i class="fas fa-window-close"></i></span>
            <div class="search-bar">
              <div class="search-bar-tablecell">
                <h3>Search For:</h3>
                <input type="text" placeholder="Keywords" />
                <button type="submit">Search <i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end search arewa -->

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 text-center">
            <div class="breadcrumb-text">
              <p>Murah dan Lengkap</p>
              <h1>Toko Kita</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end breadcrumb section -->

    @yield('container') <!-- ----------------------------------------- -->

    <!-- footer -->
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="footer-box about-widget">
              <h2 class="widget-title">Tentang Kami</h2>
              <p>Kami menjual hampir semua peripheral komputer, dari mulai mouse, keyboard, headset, speaker dan masih banyak lagi.</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="footer-box get-in-touch">
              <h2 class="widget-title">Kontak Kami</h2>
              <ul>
                <li>Jl. Gatot Subroto No. 30, Dukuhsalam, Kec. Slawi Kab. Tegal</li>
                <li>support@tokokita.com</li>
                <li>+62 111 222 3333</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- end copyright -->

    <!-- jquery -->
    <script src="{{ url('/') }}/assets/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="{{ url('/') }}/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="{{ url('/') }}/assets/js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="{{ url('/') }}/assets/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="{{ url('/') }}/assets/js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="{{ url('/') }}/assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="{{ url('/') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="{{ url('/') }}/assets/js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="{{ url('/') }}/assets/js/sticker.js"></script>
    <!-- main js -->
    <script src="{{ url('/') }}/assets/js/main.js"></script>

    <script>
      function submitForm()
      {
        var x = document.getElementsByName('logoutForm');
        x[0].submit(); // Form submission
      }


    </script>
  </body>
</html>

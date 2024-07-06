<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dawat</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
    integrity='sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=='
    crossorigin='anonymous' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css'
    integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=='
    crossorigin='anonymous' />
  <link rel="stylesheet" href="{{ asset('frontend/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/app.css') }}">
  @stack('customCss')
  <style>
    body {
      background-color: #171717;
      font-family: 'arial', Times, serif;
    }

    ::placeholder {
      color: white !important;
      opacity: 1;
      /* Firefox */
    }

    .my-input {
      background: transparent;
      width: 100%;
      border: 1px solid #f7ad1d;
      color: white;
    }

    ::-ms-input-placeholder {
      /* Edge 12-18 */
      color: white !important;
    }

    .btn {
      background-color: #f7ad1d !important;
      border: none !important;
      display: inline-block;
    }

    .topNav li a.active {
      color: #f7ad1d !important;
    }

    a {
      text-decoration: none;
    }
  </style>
</head>

<body>


  <!--navbar starts-->
  <div class="navshadow"
    style="box-shadow: 5px 5px 5px 5px rgba(43, 43, 43, 0.3); position:fixed;width:100%;top:0;left:0;z-index:9999;">
    <!--first row-->
    <nav class="navbar navbar-expand-lg  "
      style="display:block; justify-content:space-between;  background-color:black; ">
      <div class="container-fluid  mx-auto " style="width: fit-content;">
        <div class="collapse navbar-collapse" id="navbarNav">

          <a class="nav-link active" aria-current="page" href="{{ url('/') }}"><img
              src="https://dawatfoodresort.com/reewheev/2021/06/cropped-dawat-logo.png " style="width: 100px"></a>

        </div>
      </div>
    </nav>
    <!--first row ends-->
    <nav class="navbar navbar-expand  topNav"
      style="display:block; justify-content:space-between; background-color:black; )">
      <div class="container-fluid" style="width: fit-content">
        <div class="collapse navbar-collapse mx-5" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('frontend.homepage') ? 'active' : null }}" aria-current="page"
                href="{{ url('/') }}" style="color: #999"><i class="fa-solid fa-house"></i> Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('menu.show') ? 'active' : null }}"
                href="{{ route('menu.show') }}" style="color: #999"> <i class="fa-solid fa-utensils"></i> Menu</a>
            </li>



            @guest('customer')

            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('user.login') ? 'active' : null }}"
                href="{{ route('user.login') }}" style="color: #999"><i class="fa-solid fa-user"></i> Sign In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('user.register') ? 'active' : null }} "
                href="{{ route('user.register') }}" style="color: #999"><i class="fa-solid fa-user-plus"></i> Sign
                Up</a>
            </li>
            @endguest
            @auth('customer')

            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('user.profile') ? 'active' : null }} " aria-current="page"
                href="{{ route('user.profile') }}" style="color: #999"><i class="fa-solid fa-heart"></i> Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('cart.*') ? 'active' : null }}" href="{{ route('cart.view') }}"
                style="color: #999;position: relative;">
                <i class="fa-solid fa-cart-shopping"></i> Cart
                <span
                  style="display:inline-block; background:#f7ad1d; min-width: 20px;min-height:20px;color:black;border-radius:50%;text-align:center;line-height:20px;font-weight:800">{{
                  $cartCount ?? 0 }}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('user.orders') ? 'active' : null }}"
                href="{{ route('user.orders') }}" style="color: #999"><i class="fa-solid fa-utensils"></i> My Orders</a>
            </li>
            @role('delivery', 'customer')
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('user.delivery') ? 'active' : null }}"
                href="{{ route('user.delivery') }}" style="color: #999"><i class="fa-solid fa-box"></i>
                My Deliveries</a>
            </li>
            @endrole

            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('user.settings') ? 'active' : null }}"
                href="{{ route('user.settings') }}" style="color: #999"><i class="fa-solid fa-gears"></i> Profile
                Setting</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('user.logout') ? 'active' : null }} "
                href="{{ route('user.logout') }}" style="color: #999"><i
                  class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
            </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <!--navbar ends-->


  <div style="padding: 158px 0 0 0;">@yield('content')</div>

  <!-- Footer -->
  <footer class="text-center text-lg-start bg-body-dark text-white">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              Dawat multi-cuisine Restaurant
            </h6>
            <p>
              A place where you step into a realm of culinary wonders, where every dish tells a story, every flavor
              ignites a sensation, and every meal becomes an unforgettable journey through the artistry of taste.
            </p>
          </div>
          <!-- Grid column -->



          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!" class="text-reset">Pricing</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Settings</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Orders</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Help</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i>Jamalkhan, Chattagram, Bangladesh</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              dawatrestaurant@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © {{ today()->format("Y") }} Copyright:
      <a class="text-reset fw-bold" href="#">Dawat Software Team</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->


  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="{{ asset('frontend/slick.min.js') }}">
  </script>
  @stack('customJs')
</body>

</html>
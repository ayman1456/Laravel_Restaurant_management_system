<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
  <title>Blank Page | PlainAdmin Demo</title>

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/css/lineicons.css') }}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/css/materialdesignicons.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/css/fullcalendar.css') }}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/css/main.css') }}" />
  @stack('customCss')
</head>

<body>


  <!-- ======== sidebar-nav start =========== -->
  <aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
      <a href="index.html">
        <img src="{{ asset('backend/assets/images/logo/logo.svg') }}" alt="logo" />
      </a>
    </div>
    <nav class="sidebar-nav">
      <ul>

        @role('admin')
        <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : null }}">
          <a href="{{ route('dashboard') }}">

            <span class="me-2"> <i class="lni lni-pie-chart"></i></span>

            <span class="text">Dashboard</span>
          </a>

        </li>
        @endrole


        <li class="nav-item {{ request()->routeIs('category.*') ? 'active' : null }}">
          <a href="{{ route('category.show') }}">

            <span class="me-2"> <i class="lni lni-pie-chart"></i></span>

            <span class="text">Categories</span>
          </a>

        </li>
        <li class="nav-item {{ request()->routeIs('food') ? 'active' : null }}">
          <a href="{{ route('food.show') }}">

            <span class="me-2"> <i class="lni lni-pie-chart"></i></span>

            <span class="text">Food</span>
          </a>

        </li>
        <li class="nav-item {{ request()->routeIs('register') ? 'active' : null }}">
          <a href="{{ route('register') }}">

            <span class="me-2"> <i class="lni lni-pie-chart"></i></span>

            <span class="text">Employee Management</span>
          </a>

        </li>
        
        <li class="nav-item {{ request()->routeIs('pos.show') ? 'active' : null }}">
          <a href="{{ route('pos.show') }}">

            <span class="me-2"> <i class="lni lni-pie-chart"></i></span>

            <span class="text">Pos System</span>
          </a>

        </li>
       

        <li class="nav-item {{ request()->routeIs('food') ? 'active' : null }}">
          <a href="{{ route('food.show') }}">

            <span class="me-2"> <i class="lni lni-pie-chart"></i></span>

            <span class="text">Kitchen Orders</span>
          </a>

        </li>
        {{-- <li class="nav-item nav-item-has-children">
          <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_1" aria-controls="ddmenu_1"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon">
              <i class="lni lni-pie-chart"></i>
            </span>
            <span class="text">Dashboard</span>
          </a>
          <ul id="ddmenu_1" class="collapse dropdown-nav">
            <li>
              <a href="index.html"> eCommerce </a>
            </li>
          </ul>
        </li> --}}

      </ul>
    </nav>

  </aside>
  <div class="overlay"></div>
  <!-- ======== sidebar-nav end =========== -->

  <!-- ======== main-wrapper start =========== -->
  <main class="main-wrapper">
    <!-- ========== header start ========== -->
    <header class="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-6">
            <div class="header-left d-flex align-items-center">
              <div class="menu-toggle-btn mr-15">
                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                  <i class="lni lni-chevron-left me-2"></i> Menu
                </button>
              </div>
              <div class="header-search d-none d-md-flex">
                <form action="#">
                  <input type="text" placeholder="Search..." />
                  <button><i class="lni lni-search-alt"></i></button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-md-7 col-6">
            <div class="header-right">

              <!-- profile start -->
              <div class="profile-box ml-15">
                <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="profile-info">
                    <div class="info">
                      <div class="image">
                        <img src="https://api.dicebear.com/8.x/initials/svg?seed={{ auth()->user()->name }}" alt="" />
                      </div>
                      <div>
                        <h6 class="fw-500">{{ str(auth()->user()->name)->headline() }}</h6>
                        <p>Admin</p>
                      </div>
                    </div>
                  </div>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                  <li>
                    <div class="author-info flex items-center !p-1">
                      <div class="image">

                      </div>
                      <div class="content">
                        <h4 class="text-sm">{{ auth()->user()->name }}</h4>
                        <a class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs"
                          href="#">{{ auth()->user()->email }}</a>
                      </div>
                    </div>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="#0">
                      <i class="lni lni-user"></i> View Profile
                    </a>
                  </li>
                  <li>
                    <a href="#0">
                      <i class="lni lni-alarm"></i> Notifications
                    </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-inbox"></i> Messages </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-cog"></i> Settings </a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> <i class="lni lni-exit"></i>
                      Sign Out </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </li>
                </ul>
              </div>
              <!-- profile end -->
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- ========== header end ========== -->

    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">

        {{-- main content here --}}
        @yield('content')
        {{-- main content here end --}}
      </div>
      <!-- end container -->
    </section>
    <!-- ========== section end ========== -->

    <!-- ========== footer start =========== -->
    <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 order-last order-md-first">
            <div class="copyright text-center text-md-start">
              <p class="text-sm">
                Designed and Developed by
                <a href="https://plainadmin.com" rel="nofollow" target="_blank">
                  PlainAdmin
                </a>
              </p>
            </div>
          </div>
          <!-- end col-->
          <div class="col-md-6">
            <div class="terms d-flex justify-content-center justify-content-md-end">
              <a href="#0" class="text-sm">Term & Conditions</a>
              <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
            </div>
          </div>
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </footer>
    <!-- ========== footer end =========== -->
  </main>
  <!-- ======== main-wrapper end =========== -->

  <!-- ========= All Javascript files linkup ======== -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }} "></script>
  <script src="{{ asset('backend/assets/js/Chart.min.js') }}  "></script>
  <script src="{{ asset('backend/assets/js/dynamic-pie-chart.js') }}  "></script>
  <script src="{{ asset('backend/assets/js/moment.min.js') }} "></script>
  <script src="{{ asset('backend/assets/js/fullcalendar.js') }} "></script>
  <script src="{{ asset('backend/assets/js/jvectormap.min.js') }} "></script>
  <script src="{{ asset('backend/assets/js/world-merc.js') }} "></script>
  <script src="{{ asset('backend/assets/js/polyfill.js') }} "></script>
  <script src="{{ asset('backend/assets/js/main.js') }} "></script>

  @stack('customJs')

</body>

</html>
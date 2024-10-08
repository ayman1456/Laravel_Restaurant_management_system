<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
  <title>Dawat Restaurant</title>

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/css/lineicons.css') }}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/css/materialdesignicons.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/css/fullcalendar.css') }}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/css/main.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <style>
    * {
      font-family: "Roboto", sans-serif;
    }
  </style>
  @stack('customCss')
</head>

<body>


  <!-- ======== sidebar-nav start =========== -->
  <aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
      <a href="index.html" class="block text-center">
        <img src="https://dawatfoodresort.com/reewheev/2021/06/cropped-dawat-logo.png"
          style="width: 50%;filter: invert(100%)" alt="logo" />
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


        <li class="nav-item {{ request()->routeIs('category.*') ? 'active' : null }}">
          <a href="{{ route('category.show') }}">

            <span class="me-2"> <i class="lni lni-grid-alt"></i></span>

            <span class="text">Categories</span>
          </a>

        </li>
        <li class="nav-item {{ request()->routeIs('food') ? 'active' : null }}">
          <a href="{{ route('food.show') }}">

            <span class="me-2"> <i class="lni lni-fresh-juice"></i></span>

            <span class="text">Food</span>
          </a>

        </li>

        <li class="nav-item nav-item-has-children {{ request()->routeIs('register') ? 'active' : null }}">
          <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_2" aria-controls="ddmenu_2"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="me-2"> <i class="lni lni-users"></i></span>

            <span class="text">Employee Management</span>
          </a>
          <ul id="ddmenu_2" class="dropdown-nav collapse" style="">
            <li>
              <a href="{{ route('register') }}"> Add Employee </a>
            </li>
            <li>
              <a href="{{ route('employee.approval.list') }}"> Pending Employee </a>
            </li>

          </ul>
        </li>

        <li class="nav-item {{ request()->routeIs('table') ? 'active' : null }}">
          <a href="{{ route('table.show') }}">

            <span class="me-2"> <i class="lni lni-service"></i></span>

            <span class="text">Manage Tables </span>
          </a>

        </li>
        @endrole

        @hasanyrole('admin|pos-manager')
        <li class="nav-item {{ request()->routeIs('pos.show') ? 'active' : null }}">
          <a href="{{ route('pos.show') }}">

            <span class="me-2"> <i class="lni lni-layout"></i></span>

            <span class="text">Pos System</span>
          </a>

        </li>
        <li class="nav-item {{ request()->routeIs('pos.order.view') ? 'active' : null }}">
          <a href="{{ route('pos.order.view') }}">

            <span class="me-2"> <i class="lni lni-pie-chart"></i></span>

            <span class="text">Orders</span>
          </a>

        </li>
        @endhasanyrole



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

    <!-- ========== footer end =========== -->
  </main>
  <!-- ======== main-wrapper end =========== -->

  <!-- ========= All Javascript files linkup ======== -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
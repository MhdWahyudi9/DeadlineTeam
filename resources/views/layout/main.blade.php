<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Rental Mobil | @yield('title')</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{ url('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ url('vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ url('css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ url('images/favicon.png') }}"/>
  <!-- Custom fonts for this template-->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
  
  <div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    <div class="row">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          @if(Auth::user())
            @if (Auth::user()->role_id == 1)
              <li class="nav-item sidebar-category">
                <p></p>
                <span></span>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{url('dashboard')}}">
                  <i class="mdi mdi-home menu-icon"></i>
                  <span class="menu-title ">Dashboard</span>
                </a>
              </li>
  
              <li class="nav-item">
                <a class="nav-link" href="{{url('mobil')}}">
                  <i class="mdi mdi-truck menu-icon"></i>
                  <span class="menu-title">Mobil</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">
                  <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
                  <span class="menu-title">List Mobil</span>
                </a>
              </li>
  
              <li class="nav-item">
                <a class="nav-link" href="{{url('categories')}}">
                  <i class="mdi mdi-checkbox-multiple-blank-outline menu-icon"></i>
                  <span class="menu-title">Categories</span>
                </a>
              </li>
  
              <li class="nav-item">
              <a class="nav-link" href="{{url('users')}}">
                <i class=" mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Users</span>
              </a>
              </li>
  
              <li class="nav-item">
              <a class="nav-link" href="{{url('rent_logs')}}">
                <i class="mdi mdi-arrange-bring-forward menu-icon"></i>
                <span class="menu-title">Rent Log</span>
              </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="{{url('mobil-rent')}}">
                  <i class="mdi mdi-shape-square-plus menu-icon"></i>
                  <span class="menu-title">Mobil Rent</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{url('mobil-return')}}">
                  <i class="mdi mdi-keyboard-return menu-icon"></i>
                  <span class="menu-title">Pengembalian Mobil</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{url('logout')}}">
                  <i class="mdi mdi-logout menu-icon"></i>
                  <span class="menu-title">logout</span>
                </a>
              </li>
  
            @else
              <li class="nav-item">
              <a class="nav-link" href="{{url('profile')}}">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Profile</span>
              </a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="{{url('/')}}">
                <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
                <span class="menu-title">List Mobil</span>
              </a>

              <li class="nav-item">
                <a class="nav-link" href="{{url('mobil-rent')}}">
                  <i class="mdi mdi-shape-square-plus menu-icon"></i>
                  <span class="menu-title">Mobil Rent</span>
                </a>
              </li>
              
              </li>
              <li class="nav-item">
              <a class="nav-link" href="{{url('logout')}}">
                <i class="mdi mdi-logout menu-icon"></i>
                <span class="menu-title">logout</span>
              </a>
              </li>
            @endif
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{url('login')}}">
                <i class="mdi mdi-login-variant menu-icon"></i>
                <span class="menu-title">Login</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('register')}}">
                <i class="mdi mdi-file-document menu-icon"></i>
                <span class="menu-title">Register</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" >
                <i class="mdi mdi-whatsapp menu-icon"></i>
                <span class="menu-title">Admin <br><br> 0813xxxxxx1</span>
              </a>
            </li>
          @endif
  
        </ul>
      </nav>
    </div>

    <!-- partial -->
  @if (Auth::user())
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-6 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <h3 class="font-weight-bold mb-0 d-none d-md-block ml-5 ">  Welcome  {{Auth::user()->username}}</h3>
          <ul class="navbar-nav navbar-nav-right">
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper navbar-search-wrapper bg-transparent d-none d-lg-flex align-items-center">
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                {{-- <img src="{{ url('images/faces/face5.jpg') }}" alt="profile"/> --}}
                <h4 class="nav-profile-name mdi  mdi-account btn btn-outline-dark btn-fw bg-light">{{Auth::user()->username}}</h4>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown " aria-labelledby="profileDropdown">
                <a class="dropdown-item">
                  <i class=" mdi mdi-account text-primary"></i>
                  {{Auth::user()->username}}
                </a>
                <a class="dropdown-item" href="logout">
                  <i class="mdi mdi-logout text-primary"></i>
                  Logout
                </a>
              </div>
            </li>
            
          </ul>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
  @else
    <div class="main-panel">
      <div class="content-wrapper ">
        @yield('content')
      </div>
  @endif

    
    <!-- page-body-wrapper ends -->
  </div>
  
  <!-- container-scroller -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ url("js/off-canvas.js") }}"></script>
  <script src="{{ url("js/hoverable-collapse.js") }}"></script>
  <script src="{{ url("js/template.js") }}"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
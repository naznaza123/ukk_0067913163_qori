<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('postifylogo/favicon1.png') }}">
  <title>
    POStify
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset ('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset ('assets/css/nucleo-svg.css" rel="stylesheet') }}" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset ('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset ('assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
</head>
<style>
  @media (max-width: 768px) {
    #iconSidenav {
      display: none;
    }
  }
</style>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
      <div class="sidenav-header mb-5">
          <i class="fas fa-times m-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
          <a class="navbar-brand" href="https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html" target="_blank">
              <img src="{{ asset('postifylogo/logo3.png') }}" width="" class="navbar-brand-img" alt="main_logo">
          </a>
      </div>
      <hr class="horizontal dark mt-0">
      <div class="collapse navbar-collapse w-auto max-height-vh-100 h-100" id="sidenav-collapse-main">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('petugas') ? 'active' : '' }}" href="/petugas">
                      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                          <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <title>Dashboard</title>
                              <path class="color-background" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z" id="Path" opacity="0.6"></path>
                              <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                          </svg>
                      </div>
                      <span class="nav-link-text ms-1">Dashboard</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('penjualan') ? 'active' : '' }} " href="/penjualan">
                      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                          <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <title>Wallet</title>
                              <path class="color-background" d="M4.28571,0.25 L0.392857,3.96428571 L0.392857,38.8928571 L4.28571,42.6071429 L37.7142857,42.6071429 L41.6071429,38.8928571 L41.6071429,3.96428571 L37.7142857,0.25 L4.28571,0.25 Z M26.5,27.6785714 L12.7142857,27.6785714 L12.7142857,24.7142857 L26.5,24.7142857 L26.5,27.6785714 Z M26.5,20.6071429 L12.7142857,20.6071429 L12.7142857,17.6428571 L26.5,17.6428571 L26.5,20.6071429 Z M26.5,13.5357143 L12.7142857,13.5357143 L12.7142857,10.5714286 L26.5,10.5714286 L26.5,13.5357143 Z M35.5714286,33.4285714 L5.42857143,33.4285714 L5.42857143,30.4642857 L35.5714286,30.4642857 L35.5714286,33.4285714 Z M35.5714286,25.3214286 L5.42857143,25.3214286 L5.42857143,22.3571429 L35.5714286,22.3571429 L35.5714286,25.3214286 Z M35.5714286,17.2142857 L5.42857143,17.2142857 L5.42857143,14.25 L35.5714286,14.25 L35.5714286,17.2142857 Z"></path>
                          </svg>
                      </div>
                      <span class="nav-link-text ms-1">Penjualan</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('pelanggan') ? 'active' : '' }}" href="/pelanggan">
                      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                          <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <title>Pin 3</title>
                              <g id="Icons-21" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <g id="Rounded" transform="translate(-2455.000000, -3204.000000)">
                                      <g id="Maps" transform="translate(100.000000, 3068.000000)">
                                          <g id="-Round-/-Maps-/-pin_3-21" transform="translate(2342.000000, 133.000000)">
                                              <g>
                                                  <polygon id="Path" points="0 0 48 0 48 48 0 48"></polygon>
                                                  <path d="M24,2 C16.2715603,2 10,8.27156025 10,16 C10,24.0746254 23.0729644,39.7811403 23.722227,40.3612228 C23.8910074,40.5184556 24.1091485,40.5184556 24.2779289,40.3612228 C24.9270356,39.7811403 38,24.0746254 38,16 C38,8.27156025 31.7284397,2 24,2 Z M24,22.75 C20.1325719,22.75 17.25,19.8674281 17.25,16 C17.25,12.1325719 20.1325719,9.25 24,9.25 C27.8674281,9.25 30.75,12.1325719 30.75,16 C30.75,19.8674281 27.8674281,22.75 24,22.75 Z" id="🔹-Icon-Color" fill="#333333"></path>
                                              </g>
                                          </g>
                                      </g>
                                  </g>
                              </g>
                          </svg>
                      </div>
                      <span class="nav-link-text ms-1">Pelanggan</span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('tabproduk') ? 'active' : '' }} " href="/tabproduk">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        {{-- <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>sale</title>
                            <path class="color-background" d="M4.28571,0.25 L0.392857,3.96428571 L0.392857,38.8928571 L4.28571,42.6071429 L37.7142857,42.6071429 L41.6071429,38.8928571 L41.6071429,3.96428571 L37.7142857,0.25 L4.28571,0.25 Z M26.5,27.6785714 L12.7142857,27.6785714 L12.7142857,24.7142857 L26.5,24.7142857 L26.5,27.6785714 Z M26.5,20.6071429 L12.7142857,20.6071429 L12.7142857,17.6428571 L26.5,17.6428571 L26.5,20.6071429 Z M26.5,13.5357143 L12.7142857,13.5357143 L12.7142857,10.5714286 L26.5,10.5714286 L26.5,13.5357143 Z M35.5714286,33.4285714 L5.42857143,33.4285714 L5.42857143,30.4642857 L35.5714286,30.4642857 L35.5714286,33.4285714 Z M35.5714286,25.3214286 L5.42857143,25.3214286 L5.42857143,22.3571429 L35.5714286,22.3571429 L35.5714286,25.3214286 Z M35.5714286,17.2142857 L5.42857143,17.2142857 L5.42857143,14.25 L35.5714286,14.25 L35.5714286,17.2142857 Z"></path>
                        </svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M345 39.1L472.8 168.4c52.4 53 52.4 138.2 0 191.2L360.8 472.9c-9.3 9.4-24.5 9.5-33.9 .2s-9.5-24.5-.2-33.9L438.6 325.9c33.9-34.3 33.9-89.4 0-123.7L310.9 72.9c-9.3-9.4-9.2-24.6 .2-33.9s24.6-9.2 33.9 .2zM0 229.5V80C0 53.5 21.5 32 48 32H197.5c17 0 33.3 6.7 45.3 18.7l168 168c25 25 25 65.5 0 90.5L277.3 442.7c-25 25-65.5 25-90.5 0l-168-168C6.7 262.7 0 246.5 0 229.5zM144 144a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
                          <title>sale</title>
                          <path class="color-background" d="M4.28571,0.25 L0.392857,3.96428571 L0.392857,38.8928571 L4.28571,42.6071429 L37.7142857,42.6071429 L41.6071429,38.8928571 L41.6071429,3.96428571 L37.7142857,0.25 L4.28571,0.25 Z M26.5,27.6785714 L12.7142857,27.6785714 L12.7142857,24.7142857 L26.5,24.7142857 L26.5,27.6785714 Z M26.5,20.6071429 L12.7142857,20.6071429 L12.7142857,17.6428571 L26.5,17.6428571 L26.5,20.6071429 Z M26.5,13.5357143 L12.7142857,13.5357143 L12.7142857,10.5714286 L26.5,10.5714286 L26.5,13.5357143 Z M35.5714286,33.4285714 L5.42857143,33.4285714 L5.42857143,30.4642857 L35.5714286,30.4642857 L35.5714286,33.4285714 Z M35.5714286,25.3214286 L5.42857143,25.3214286 L5.42857143,22.3571429 L35.5714286,22.3571429 L35.5714286,25.3214286 Z M35.5714286,17.2142857 L5.42857143,17.2142857 L5.42857143,14.25 L35.5714286,14.25 L35.5714286,17.2142857 Z"></path>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Diskon</span>
                </a>
            </li>
          </ul>
      </div>
  </aside>

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
<!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <!-- Group Dropdown and Search -->
        <div class="d-flex align-items-center">
          <!-- Dropdown for User Profile -->
          <div class="dropdown me-4">
            <button class="btn dropdown-toggle" type="button" id="dropdownNavButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user text-primary me-sm-1"></i>
              <b class="text-primary">{{ Auth::user()->name }}</b>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownNavButton">
              <li><a class="dropdown-item" href="javascript:;">Profile</a></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
          </div>
          <!-- Search Form -->
          <form class="ms-auto" action="/cari" method="get">
            @csrf
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" name="cari" class="form-control" placeholder="Type here...">
            </div>
          </form>
        </div>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav justify-content-end">
            <!-- Add your navigation links here -->
            <li class="nav-item">
              <a class="nav-link" href="/cart">Go to Cart</a>
            </li>
          </ul>
        </div>
        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </li>
      </div>
    </nav>
<!-- End Navbar -->

    
    <!-- End Navbar -->
    <div class="container-fluid py-4">

        @yield('content')

    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset ('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset ('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{asset ('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset ('assets/js/plugins/chartjs.min.js') }}"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset ('assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
</body>

</html>
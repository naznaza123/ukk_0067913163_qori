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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset ('assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
</head>
<style>
  @media (max-width: 768px) {
    #iconSidenav {
      display: none;
    }
  }

  .avatar {
    width: 50px; /* Ubah sesuai kebutuhan */
    height: 50px; /* Ubah sesuai kebutuhan */
    border-radius: 50%; /* Agar gambar menjadi lingkaran */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ubah nilai sesuai kebutuhan */
  }

  
</style>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
      <!-- Move profile information into a separate section -->
      <div class="sidenav-header mb-7 p-2"  style="margin-bottom: 30px;">
        <div class="card ">
          <div class="card-body">
            <div class="text-center mt-1 mb-1">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('postifylogo/avatar/2.png') }}" class="avatar" style="border-radius: 20px;" width="50px" alt="">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
                <h4 class="mt-0">{{ Auth::user()->name }}</h4>
                <span class="badge badge-pill bg-gradient-primary">{{ Auth::user()->level }}</span>
            </div>

          </div>
        </div>
      </div>

      <hr class="horizontal dark ">
      <div class="collapse navbar-collapse w-auto max-height-vh-100 h-100" id="sidenav-collapse-main">
          <ul class="navbar-nav">
              <li class="nav-item p-2">
                  <a class="nav-link {{ Request::is('petugas') ? 'active' : '' }}" href="/petugas">
                    <svg class="text-dark" width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                      <title>Dashboard</title>
                      <path fill="#ca0d9f" d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM288 96a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM256 416c35.3 0 64-28.7 64-64c0-17.4-6.9-33.1-18.1-44.6L366 161.7c5.3-12.1-.2-26.3-12.3-31.6s-26.3 .2-31.6 12.3L257.9 288c-.6 0-1.3 0-1.9 0c-35.3 0-64 28.7-64 64s28.7 64 64 64zM176 144a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM96 288a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm352-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
                      <span class="nav-link-text ms-1">Dashboard</span>
                    </svg>
                  </a>
              </li>
              <li class="nav-item p-2">
                  <a class="nav-link {{ Request::is('penjualan') ? 'active' : '' }} " href="/penjualan">
                    <svg class="text-dark" width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                      <path fill="#ca0b9e" d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                    </svg>
                      <span class="nav-link-text ms-1">Penjualan</span>
                  </a>
              </li>
              <li class="nav-item p-2">
                <a class="nav-link {{ Request::is('laporan/penjualan/petugas') ? 'active' : '' }} " href="/laporan/penjualan/petugas">
                  <svg class="text-dark" width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#cb0fa0" d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/>
                  </svg>
                  <span class="nav-link-text ms-1">Laporan Penjualan</span>
                </a>
            </li>
              
              {{-- <li class="nav-item">
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
              </li> --}}
              <li class="nav-item p-2">
                <a class="nav-link {{ Request::is('tabproduk') ? 'active' : '' }} " href="/tabproduk">
                  <svg class="text-dark" width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#ca0d9f" d="M345 39.1L472.8 168.4c52.4 53 52.4 138.2 0 191.2L360.8 472.9c-9.3 9.4-24.5 9.5-33.9 .2s-9.5-24.5-.2-33.9L438.6 325.9c33.9-34.3 33.9-89.4 0-123.7L310.9 72.9c-9.3-9.4-9.2-24.6 .2-33.9s24.6-9.2 33.9 .2zM0 229.5V80C0 53.5 21.5 32 48 32H197.5c17 0 33.3 6.7 45.3 18.7l168 168c25 25 25 65.5 0 90.5L277.3 442.7c-25 25-65.5 25-90.5 0l-168-168C6.7 262.7 0 246.5 0 229.5zM144 144a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
                  </svg>
                  <span class="nav-link-text ms-1">Diskon</span>
                </a>
            </li>
          </ul>
      </div>
  </aside>

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
<!-- Navbar -->
    <nav class="navbar  navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <!-- Group Dropdown and Search -->
        <div class="d-flex align-items-center">
          <!-- Dropdown for User Profile -->
          {{-- <div class="dropdown me-4">
            <button class="btn dropdown-toggle" type="button" id="dropdownNavButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user text-primary me-sm-1"></i>
              <b class="text-primary ">{{ Auth::user()->name }}</b>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownNavButton">
              <li><a class="dropdown-item" href="javascript:;">Profile</a></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
          </div> --}}
          <!-- Search Form -->
          <form class="ms-auto" action="/cari" method="get">
            @csrf
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" name="cari" class="form-control" placeholder="Type here...">
            </div>
          </form>
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <ul class="navbar-nav justify-content-end">
              <!-- Add your navigation links here -->
              <li class="nav-item">
                  <a class="nav-link text-white" href="/cart">
                    {{-- <i class="ni ni-cart"></i> --}}
                    <svg class="text-dark" width="25px" height="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                      <path fill="#ca0e9f" d="M253.3 35.1c6.1-11.8 1.5-26.3-10.2-32.4s-26.3-1.5-32.4 10.2L117.6 192H32c-17.7 0-32 14.3-32 32s14.3 32 32 32L83.9 463.5C91 492 116.6 512 146 512H430c29.4 0 55-20 62.1-48.5L544 256c17.7 0 32-14.3 32-32s-14.3-32-32-32H458.4L365.3 12.9C359.2 1.2 344.7-3.4 332.9 2.7s-16.3 20.6-10.2 32.4L404.3 192H171.7L253.3 35.1zM192 304v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16s16 7.2 16 16zm96-16c8.8 0 16 7.2 16 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16zm128 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                    </svg>
                    {{-- <img src="{{ asset('postifylogo/avatar/cart.png') }}" style="border-radius: 10px;" style="box-shadow: 10px" width="50px" alt="" srcset=""> --}}
                  </a>
    
                 
                
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

        <!-- Navigation Links -->
      </div>

    </nav>
<!-- End Navbar -->

    
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      @include('sweetalert::alert')
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
  <script>
      // JavaScript untuk mengirimkan permintaan AJAX dan mengunduh PDF
      function cetakInvoicePDF(transaksiId, pelangganId, totalharga) {
          $.ajax({
              url: '/penjualan/cetak_pdf',
              method: 'POST',
              data: {
                  transaksi_id: transaksiId,
                  id_pelanggan: pelangganId,
                  totalharga: totalharga,
                  _token: '{{ csrf_token() }}'
              },
              xhrFields: {
                  responseType: 'blob' // Menggunakan blob sebagai tipe respons
              },
              success: function(data) {
                  // Membuat objek blob dari respons
                  var blob = new Blob([data], { type: 'application/pdf' });

                  // Membuat URL objek blob
                  var url = window.URL.createObjectURL(blob);

                  // Membuat elemen anchor untuk unduhan otomatis
                  var a = document.createElement('a');
                  a.href = url;
                  a.download = 'invoice.pdf';
                  document.body.appendChild(a);
                  a.click();

                  // Melepaskan objek URL setelah unduhan selesai
                  window.URL.revokeObjectURL(url);

                  // Perbarui halaman kembali ke halaman penjualan
                  window.location.href = '/penjualan';
              },
              error: function(xhr, status, error) {
                  console.error(error);
                  alert('Terjadi kesalahan saat mengunduh PDF.');
              }
          });
      }
  </script>
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset ('assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
</body>

</html>


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <link href="{{ asset('dashboard/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">

    <title>
الدعوات و الباركود    </title>

    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />
</head>


  <body class="g-sidenav-show rtl bg-gray-100">
    <style>
        body {
            direction: rtl;  /* تحديد الاتجاه من اليمين لليسار */
            text-align: right;  /* محاذاة النص إلى اليمين */
        }
        </style>
    @include('layouts.partials.side')


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <div class="container-fluid py-2">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">إجمالي الباركودات</h5>
                                <p class="card-text">{{ $totalBarcodes }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">الباركودات الفعّالة</h5>
                                <p class="card-text">{{ $activeBarcodes }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">الباركودات غير الفعّالة</h5>
                                <p class="card-text">{{ $inactiveBarcodes }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="container-fluid py-2">
        @yield('content')


        <footer class="footer py-4  ">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-end">
                  © <script>
                    document.write(new Date().getFullYear())
                  </script>,
                  esraa eyad
                </div>
              </div>

            </div>
          </div>
        </footer>
      </div>
    </main>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/popper.min.js') }}"></script>


    <script>
      var ctx = document.getElementById("chart-bars").getContext("2d");

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["M", "T", "W", "T", "F", "S", "S"],
          datasets: [{
            label: "Views",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#43A047",
            data: [50, 45, 22, 28, 50, 60, 76],
            barThickness: 'flex'
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
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: '#e5e5e5'
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 10,
                font: {
                  size: 14,
                  lineHeight: 2
                },
                color: "#737373"
              },
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
                color: '#737373',
                padding: 10,
                font: {
                  size: 14,
                  lineHeight: 2
                },
              }
            },
          },
        },
      });


      var ctx2 = document.getElementById("chart-line").getContext("2d");

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
          datasets: [{
            label: "Sales",
            tension: 0,
            borderWidth: 2,
            pointRadius: 3,
            pointBackgroundColor: "#43A047",
            pointBorderColor: "transparent",
            borderColor: "#43A047",
            backgroundColor: "transparent",
            fill: true,
            data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
            maxBarThickness: 6

          }],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            },
            tooltip: {
              callbacks: {
                title: function(context) {
                  const fullMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                  return fullMonths[context[0].dataIndex];
                }
              }
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
                borderDash: [4, 4],
                color: '#e5e5e5'
              },
              ticks: {
                display: true,
                color: '#737373',
                padding: 10,
                font: {
                  size: 12,
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
                color: '#737373',
                padding: 10,
                font: {
                  size: 12,
                  lineHeight: 2
                },
              }
            },
          },
        },
      });

      var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

      new Chart(ctx3, {
        type: "line",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Tasks",
            tension: 0,
            borderWidth: 2,
            pointRadius: 3,
            pointBackgroundColor: "#43A047",
            pointBorderColor: "transparent",
            borderColor: "#43A047",
            backgroundColor: "transparent",
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          }],
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
                borderDash: [4, 4],
                color: '#e5e5e5'
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#737373',
                font: {
                  size: 14,
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
                borderDash: [4, 4]
              },
              ticks: {
                display: true,
                color: '#737373',
                padding: 10,
                font: {
                  size: 14,
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
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>
  </body>

  </html>

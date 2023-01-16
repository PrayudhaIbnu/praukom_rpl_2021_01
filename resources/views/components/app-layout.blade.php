<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="Fahmi Kurnia, Mulki Rahman, and Ibnu Prayudha" />
  <meta name="generator" content="Hugo 0.104.2" />
  <title>BLUD Mart | @yield('title')</title>
  @Vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
  <link rel="shortcut icon" href="{{ asset('img/logoblud.png') }}" type="image/x-icon">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/dashboard.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/style-dashboard.css') }}">
</head>

<body class="sidebar-mini">

  <!-- CHART JS UDH DI NPM TAPI GK KLUAR JDI LEWAT FOLDER AJA DLU -->
  <script src="{{ asset('others/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('others/chart.js/Chart.js') }}"></script>
  <div class="wrapper">
    {{ $slot }}
  </div>

  <!-- jQuery -->
  <script src="{{ asset('others/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('others/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- JS -->
  <script src="{{ asset('dist/js/dashboard.js') }}"></script>
  <!-- switalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  {{-- Daftar Chart --}}
  <script src={{ asset('dist/js/pages/linechart.js') }}></script>
  <script src={{ asset('dist/js/pages/searchfilter.js') }}></script>
  @stack('jquery')
</body>

</html>

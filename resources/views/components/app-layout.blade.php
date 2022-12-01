<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors"/>
    <meta name="generator" content="Hugo 0.104.2" />
    <title>Dashboard | Kasir BLUD Mart</title>
    @Vite(['resources/sass/app.scss', 'resources/css/app.css','resources/js/app.js'])
    <link rel="shortcut icon" href="{{ asset('img/logoblud.png') }}" type="image/x-icon">
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  {{-- Daftar Chart --}}
  <script src={{ asset("dist/js/pages/linechart.js") }}></script>
  @stack('jquery')
</body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors"/>
    <meta name="generator" content="Hugo 0.104.2" />
    <title>Dashboard | Kasir BLUD Mart</title>
    @Vite(['resources/sass/app.scss', 'resources/css/app.css','resources/js/app.js'])
    <link rel="shortcut icon" href="{{ asset('img/logoblud.png') }}" type="image/x-icon">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}
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
  <script src="{{ asset('dist/js/pages/barchart.js') }}"></script>
  <script src="{{ asset('dist/js/pages/linechart.js') }}"></script>

</body>
</html>
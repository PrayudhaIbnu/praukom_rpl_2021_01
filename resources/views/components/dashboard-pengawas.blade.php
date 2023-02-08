<nav class="main-header navbar navbar-expand navbar-dark ">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <h5 class="m-0 nav-header text-light">Selamat Datang di One Mart {{ Session::get('levelbaru')->nama }}</h5>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        <span class="dropdown-item dropdown-header">
          @if (Session::get('levelbaru')->foto == null)
            <img src="/img/user.jpg" style="object-fit: cover;width:100px;height:100px;" alt="" class="img img-circle">
          @else
            <img src="{{ asset('storage/post-images/' . Session::get('levelbaru')->foto) }}"
            style="object-fit: cover;width:100px;height:100px;" alt="" class="img img-circle">
          @endif
          <p class="mt-2 text-bold">{{ Session::get('levelbaru')->nama }}</p>
          <i class="font-level">Pengawas</i>
        </span>

        <div class="dropdown-divider"></div>
        <form action="{{ url('logout') }}" method="post">
          @csrf
          <button type="submit" class="dropdown-item logout">
            <i class="nav-icons fa-solid fa-arrow-right-from-bracket"></i>
            <span class="text-sm ">Logout</span>
          </button>
        </form>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
  </ul>
</nav>
<aside class="main-sidebar sidebar-light-primary sidebar-no-expand">
  <a href="" class="brand-link">
    <img src="/img/logoblud.png" alt="BLUD Logo" class="brand-image">
    <span class="brand-text font-weight-bold text-yellow">One</span><span
      class="brand-text font-weight-bold text-orange">Mart</span>
  </a>

  <!-- sidebar nih -->
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="/pengawas/dashboard" class="nav-link">
            <i class="nav-icon fa-solid fa-chart-pie"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('pengawas/laporan') }}" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Laporan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa-solid fa-clock"></i>
            <p>
              Riwayat
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview pl-4">
            <li class="nav-item">
              <a href="/pengawas/riwayat/barang-masuk" class="nav-link">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                <p>Barang Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/pengawas/riwayat/barang-keluar" class="nav-link">
                <i class="fa-regular fa-circle-xmark"></i>
                <p> Barang Keluar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/pengawas/riwayat/penjualan" class="nav-link">
                <i class="fa-solid fa-cart-shopping"></i>
                <p> Transaksi</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="/pengawas/logproduk" class="nav-link">
            <i class="nav-icon fas fa-history"></i>
            <p>
              Log Produk
            </p>
          </a>
        </li>
      </ul>
  </div>
</aside>

{{ $slot }}

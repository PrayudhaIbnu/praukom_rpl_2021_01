<nav class="main-header navbar navbar-expand navbar-dark ">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <h5 class="m-0 nav-header text-light">Selamat Datang, </h5>
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
          <img src="/img/logoblud.png" style="object-fit: cover;width:100px;height:100px;" alt="User Photos"
            class="img img-circle">
          <p class="mt-2 text-bold">Siti Hardiah<?php $user; ?></p>
          <i class="font-level">Pengawas<?php $level; ?></i>
        </span>

        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item logout">
          <p>
            <i class="nav-icons fa-solid fa-arrow-right-from-bracket"></i>
            <span class="text-sm ">Logout</span>
          </p>
        </a>
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
          <a href="/pengawas/laporan" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Laporan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-box-open"></i>
            <p>
              Log Aktivitas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview pl-4">
            <li class="nav-item">
              <a href="/pengawas/logproduk" class="nav-link">
                <i class="fas fa-balance-scale-right"></i>
                <p>Log Produk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/pengawas/logkelolaakun" class="nav-link">
                <i class="fas fa-user-cog"></i>
                <p>Log Kelola Akun</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/pengawas/historypenjualan" class="nav-link">
                <i class="fas fa-clock"></i>
                <p>History Penjualan</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
  </div>
</aside>

{{ $slot }}

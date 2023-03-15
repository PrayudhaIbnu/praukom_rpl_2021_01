<nav class="main-header navbar navbar-expand navbar-dark ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars"></i>
        </a>
      </li>
        <li class="nav-item d-none d-sm-inline-block">
          <h5 class="m-0 nav-header text-light">Selamat Datang di One Mart {{ Auth::user()->nama }}</h5>
        </li>
    </ul>
  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
  
          <span class="dropdown dropdown-header">
            @if ( Auth::user()->foto == null)
              <img src="/img/user.jpg" style="object-fit: cover;width:100px;height:100px;" alt="" class="img img-circle">
            @else
              <img src="{{ asset('storage/post-images/' . Session::get('levelbaru')->foto) }}"
              style="object-fit: cover;width:100px;height:100px;" alt="" class="img img-circle">
            @endif 
            <p class="mt-2 text-bold">{{ Auth::user()->nama }}</p>
            <i class="font-level">{{ Auth::user()->level_user->nama_level }}</i>
          </span>
  
          <form action="{{ url('/logout') }}" method="post" >
            @csrf
            <button  type="submit" class=" dropdown-item logout " style="border-bottom-right-radius: 0.55rem !important;
            border-bottom-left-radius: 0.55rem !important;">
              <div class="float-left">
              <i class="nav-icons fa-solid fa-arrow-right-from-bracket"></i>
              <span class="text-sm ">Logout</span>
            </div>
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
    <div href="#" class="brand-link">
      <img src="/img/logoblud.png" alt="BLUD Logo" class="brand-image">
      <span class="brand-text font-weight-bold text-yellow">One</span><span
        class="brand-text font-weight-bold text-orange">Mart</span>
    </div>
    <!-- sidebar nih -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        {{-- menu sidebar superadmin --}}
          @can('superadmin')
          <li class="nav-item ">
            <a href="/kelolaakun" class="nav-link {{ Request::path() === 'kelolaakun' ? 'bg-secondary' : '' }} " >
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Kelola Akun
              </p>
            </a>
          </li>
          @endcan
          @can('admin-pengawas-kasir')           
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ Request::path() === 'dashboard' ? 'bg-secondary' : '' }}">
              <i class="nav-icon fa-solid fa-chart-pie"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @endcan
          @can('admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                Produk
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview pl-4">
              <li class="nav-item">
                <a href="/daftar-produk" class="nav-link {{ Request::path() === 'daftar-produk' ? 'bg-secondary' : '' }}">
                  <i class="fa-regular fa-rectangle-list"></i>
                  <p>Daftar Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="inputstok" class="nav-link {{ Request::path() === 'inputstok' ? 'bg-secondary' : '' }}">
                  <i class="fa-solid fa-arrow-right-to-bracket"></i>
                  <p>Input Stok Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/produkreject" class="nav-link pl-3 {{ Request::path() === 'produkreject' ? 'bg-secondary' : '' }}">
                  <i class="fa-regular fa-circle-xmark"></i>
                  <p>Produk Reject</p>
                </a>
              </li>
            </ul>
          </li>  
          <li class="nav-item">
            <a href="{{ route('supplier') }}" class="nav-link {{ Request::path() === 'supplier' ? 'bg-secondary' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Daftar Supplier
              </p>
            </a>
          </li>
          @endcan
          @can('kasir')              
          <li class="nav-item">
            <a href="/transaksi" class="nav-link {{ Request::path() === 'transaksi' ? 'bg-secondary' : '' }}">
              <i class="nav-icon fas fa-shopping-cart "></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/riwayat-penjualan" class="nav-link {{ Request::path() === 'riwayat-penjualan' ? 'bg-secondary' : '' }}">
              <i class="nav-icon fa-solid fa-clock"></i>
              <p>
                Riwayat Penjualan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/daftar-produk" class="nav-link {{ Request::path() === 'daftar-produk' ? 'bg-secondary' : '' }}">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                Daftar Produk
              </p>
            </a>
          </li>
          @endcan
          @can('admin-pengawas')
          <li class="nav-item" >
            <a href="/laporan" class="nav-link {{ Request::path() === 'laporan' ? 'bg-secondary' : '' }}">
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
                <a href="/riwayat/barang-masuk" class="nav-link {{ Request::path() === 'riwayat/barang-masuk' ? 'bg-secondary' : '' }}">
                  <i class="fa-solid fa-arrow-right-to-bracket"></i>
                  <p>Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/riwayat/barang-keluar" class="nav-link {{ Request::path() === 'riwayat/barang-keluar' ? 'bg-secondary' : '' }}">
                  <i class="fa-regular fa-circle-xmark"></i>
                  <p> Barang Keluar</p>
                </a>
              </li>
              @can('pengawas')
              <li class="nav-item">
                <a href="/riwayat-penjualan" class="nav-link {{ Request::path() === 'riwayat-penjualan' ? 'bg-secondary' : '' }}">
                  <i class="fa-solid fa-cart-shopping"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan
          @can('pengawas')
          <li class="nav-item">
            <a href="/logproduk" class="nav-link {{ Request::path() === 'pengawas/logproduk' ? 'bg-secondary' : '' }}">
              <i class="nav-icon fas fa-history"></i>
              <p>
                Log Produk
              </p>
            </a>
          </li>
          @endcan
        </ul>
        
    </div>
  </aside>
  {{ $slot }}
  
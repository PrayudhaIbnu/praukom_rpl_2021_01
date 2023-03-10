<nav class="main-header navbar navbar-expand navbar-dark ">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>
    @auth
      <li class="nav-item d-none d-sm-inline-block">
        <h5 class="m-0 nav-header text-light">Selamat Datang di One Mart {{ Auth::user()->nama }}</h5>
      </li>
    @endauth
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        <span class="dropdown dropdown-header">
          @if (Session::get('levelbaru')->foto == null)
            <img src="/img/user.jpg" style="object-fit: cover;width:100px;height:100px;" alt="" class="img img-circle">
          @else
            <img src="{{ asset('storage/post-images/' . Session::get('levelbaru')->foto) }}"
            style="object-fit: cover;width:100px;height:100px;" alt="" class="img img-circle">
          @endif
          <p class="mt-2 text-bold">{{ Session::get('levelbaru')->nama }}</p>
          <i class="font-level">Super Admin</i>
        </span>

        <form action="{{ url('logout') }}" method="post" >
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
  <a href="/superadmin/kelolaakun" class="brand-link">
    <img src="/img/logoblud.png" alt="BLUD Logo" class="brand-image">
    <span class="brand-text font-weight-bold text-yellow">One</span><span
      class="brand-text font-weight-bold text-orange">Mart</span>
  </a>
  <!-- sidebar nih -->
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item ">
          <a href="/superadmin/kelolaakun" class="nav-link {{ Request::path() === 'superadmin/kelolaakun' ? 'bg-secondary' : '' }} " >
            <i class="nav-icon fas fa-user-cog"></i>
            <p>
              Kelola Akun
            </p>
          </a>
        </li>
      </ul>
  </div>
</aside>
{{ $slot }}

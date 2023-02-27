<x-app-layout>
    <x-dashboard-pengawas />
    {{-- tilte --}}
  @section('title')
    Riwayat Barang Keluar
  @endsection
  {{-- end title --}}
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0">Riwayat Barang Keluar</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <form action="" method="GET">
                <div class="input-group">
                  <input class="form-control" name="search" id="search-input" type="text" placeholder="Search"
                    autocomplete="off">
                  <div class="input-group-append">
                    <button class="btn btn-warning" type="submit">
                      <i class="fas fa-search fa-fw"></i>
                    </button>
                  </div>
                </div>   
              </form>
            </div>
          </div>
          <div class="container-fluid-6">
          @include('components.barangkeluar')
          </div>
        </div>
      </div>
    </div>
    
  </x-app-layout>
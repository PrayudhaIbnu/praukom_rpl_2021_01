<x-app-layout>
    <x-dashboard-pengawas />
    {{-- tilte --}}
  @section('title')
    Riwayat Barang Masuk
  @endsection
  {{-- end title --}}
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0">Riwayat Barang Masuk</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <div class="input-group">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                  <button class="btn btn-sidebar btn-warning">
                    <i class="fas fa-search fa-fw"></i>
                  </button>
               </div>
             </div>
            </div>
          </div>
          <div class="container-fluid-6">
          @include('components.barangmasuk')
          </div>
        </div>
      </div>
    </div>
    
  </x-app-layout>
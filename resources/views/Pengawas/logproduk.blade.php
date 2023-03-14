<x-app-layout>
    <x-dashboard-pengawas />
    @section('title')
    Log Produk
    @endsection
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0">Log Produk</h1>
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
            <div class="table-responsive-xl">
              <table class="table mt-4 table-borderless ">
                <thead class="table-warning">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Admin</th>
                    <th scope="col">Aktivitas</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($logproduk as $item)
                      
                  
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td id="s">{{ $item->tanggal }}</td>
                    <td>{{ $item->nama_user }}</td>
                    <td>{{ $item->aktivitas }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->jumlah }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </x-app-layout>
<x-app-layout>
  <x-dashboard-cashier />
  @section('title')
  Riwayat Penjualan
  @endsection
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Riwayat Penjualan</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <div class="input-group">
              <input class="form-control" name="search" id="search-input" type="text" placeholder="Search" autocomplete="off">
              <div class="input-group-append">
                <button class="btn btn-warning" type="submit">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid-6">
          <div class="table-responsive-xl">
            <table class="table mt-4 table-borderless ">
              <thead class="table-warning">
                <tr>
                  <th scope="col">Id Penjualan</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Jam</th>
                  <th scope="col">Kasir</th>
                  <th scope="col">Detail</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($riwayat as $item)
                <tr>
                  <td id="s">{{ $item->id_struk }}</td>
                  <td>{{ $item->tanggal }}</td>
                  <td>{{ $item->jam_jual }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>
                    <a href="/kasir/detail/transaksi/{{ $item->id_struk }}">
                      <button class="btn btn-detail btn-warning"><i class="fa-solid fa-info"></i></button>
                    </a> 
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
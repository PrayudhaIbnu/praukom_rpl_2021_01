{{-- x-app-layout buat struktur html --}}
<x-app-layout>
  {{-- x-dashboard buat struktur dashboard --}}
  <x-dashboard-cashier />
  @section('title')
      Laporan
  @endsection
  {{-- CONTENT --}}
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Transaksi</h1>
          </div>
          <div class="row col-sm-6">
            <div class="input-group">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- Main content -->
        <div class="table-responsive-xl">
          <table class="table mt-4 table-borderless ">
            <thead class="table-warning">
              <tr>
                <th scope="col" style="width: 140px">Tanggal</th>
                <th scope="col" style="width: 90px">Jam</th>
                <th scope="col" style="width: 400px">Nama Produk</th>
                <th scope="col">Qty</th>
                <th scope="col">Harga Total</th>
                <th scope="col">Faktur</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($laporan as $l)
                <tr>
                  <th>{{ $l->tanggal }}</th>
                  <td>{{ $l->jam_jual }}</td>
                  <td>{{ $l->nama_produk }}</td>
                  <td>{{ $l->qty }}</td>
                  <td>{{ $l->sub_total_hrg }}</td>
                  <td>{{ $l->id_faktur }}</td>
                </tr>
              @empty
                <td colspan="6">
                  <h6 class="text-center mt-3">Belum ada penjualan bulan ini</h6>
                </td>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center">
          {!! $laporan->links() !!}
        </div>
      </div>
    </div>

  </div>
</x-app-layout>

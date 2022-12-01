{{-- x-app-layout buat struktur html --}}
<x-app-layout>
  {{-- x-dashboard buat struktur dashboard --}}
  <x-dashboard-cashier />
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
              <tr>
                <th>20-02-2022</th>
                <td>12.20</td>
                <td>Yhahahahaha</td>
                <td>2</td>
                <td>400</td>
                <td>FK20022022001</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</x-app-layout>

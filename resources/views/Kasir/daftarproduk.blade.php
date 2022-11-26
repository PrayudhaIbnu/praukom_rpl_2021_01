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
            <h1 class="m-0">Produk</h1>
          </div>
        </div>
        <!-- Main content -->
        <div class="table-responsive-xl">
          <table class="table mt-4 table-borderless ">
            <thead class="table-warning">
              <tr>
                <th scope="col">Kode Produk</th>
                <th scope="col" style="width: 400px">Nama Produk</th>
                <th scope="col" style="width: 90px">Jam</th>
                <th scope="col">Qty</th>
                <th scope="col">Harga Total</th>
                <th scope="col">Faktur</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">0998129129112</th>
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

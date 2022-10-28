<x-app-layout>
  <x-dashboard />
  <div class="content-wrapper">
    {{--  --}}
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Produk</h1>
          </div>
          <!-- /.col -->
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
        <div class="container">
          <div class="float-end">
            <button class="btn btn-primary my-3">+ Tambah</button>
          </div>
          {{-- TABLE --}}
          <table class="table mt-4 ">
            <thead class="table-warning">
              <tr>
                <th scope="col">Barcode</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Qty</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1234567890123</th>
                <td>Minuman Ibnu</td>
                <td>Rp.200</td>
                <td>2</td>
                <td>
                  <button class="btn btn-warning">Edit</button>
                  <button class="btn btn-danger">Hapus</button>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
</x-app-layout>
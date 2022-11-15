<x-app-layout>
  <x-dashboard-admin />
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Produk</h1>
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
        <div class="container-fluid">
          <div class="float-start">
            <!-- Example single danger button -->
            <div class="btn-group">
              <button type="button" class="btn btn-warning btn-sm my-3 m-0 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                Semua
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Makanan</a></li>
                <li><a class="dropdown-item" href="#">Minuman</a></li>
              </ul>
            </div>
          </div>
          <div class="float-end">
            <button class="btn btn-success my-3 btn-sm">+ Tambah</button>
          </div>
          <table class="table mt-4 table-borderless">
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
                <th scope="row">1</th>
                <td>Minuman Saya</td>
                <td>Rp.200</td>
                <td>2</td>
                <td>
                  <button class="btn btn-detail btn-warning"><i class="fa-solid fa-info"></i></button>
                  <button class="btn btn-edit btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                  <button class="btn btn-hapus btn-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
</x-app-layout>
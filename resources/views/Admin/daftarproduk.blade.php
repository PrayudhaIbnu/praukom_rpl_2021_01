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
              <button type="button" class="btn btn-warning btn-sm my-3 m-0 dropdown-toggle" data-toggle="dropdown"
                aria-expanded="false">
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
          <div class="table-responsive-xl">
            <table class="table mt-4 table-borderless ">
              <thead class="table-warning">
                <tr>
                  <th scope="col">Kode Produk</th>
                  <th scope="col" style="width: 300px">Nama Produk</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Satuan</th>
                  <th scope="col">Harga Beli</th>
                  <th scope="col">Harga Jual</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">0998129129112</th>
                  <td>Minuman Saya</td>
                  <td>2</td>
                  <td>Pcs</td>
                  <td>1900</td>
                  <td>2000</td>
                  <td>
                    <button class="btn btn-detail btn-warning"><i class="fa-solid fa-info"></i></button>
                    <button class="btn btn-edit btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-hapus btn-danger"><i class="fa-solid fa-trash"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          {{-- Awal Table Expand --}}
          {{-- <div class="rounded">
            <div class="table-responsive table-borderless">
              <table class="table">
                <thead class="table-warning">
                  <tr>
                    <th class="text-center">S. No.</th>
                    <th>Order #</th>
                    <th>Company name</th>
                    <th>status</th>
                    <th>Total</th>
                    <th>Created</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody class="table-body">

                  <tr class="cell-1" data-toggle="collapse" data-target="#demo">
                    <td class="text-center">1</td>
                    <td>#SO-13487</td>
                    <td>Gasper Antunes</td>
                    <td><span class="badge badge-danger">Fullfilled</span></td>
                    <td>$2674.00</td>
                    <td>Today</td>
                    <td class="table-elipse" data-toggle="collapse" data-target="#demo"><i
                        class="fa fa-ellipsis-h text-black-50"></i></td>
                  </tr>
                  <tr id="demo" class="collapse cell-1 row-child">
                    <td class="text-center" colspan="1"><i class="fa fa-angle-up"></i></td>
                    <td colspan="1">Product&nbsp;</td>
                    <td colspan="3">iphone SX with ratina display</td>
                    <td colspan="1">QTY</td>
                    <td colspan="2">2</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div> --}}
          {{-- Akhir Table Expand --}}
        </div>
      </div>
    </div>
  </div>

</x-app-layout>

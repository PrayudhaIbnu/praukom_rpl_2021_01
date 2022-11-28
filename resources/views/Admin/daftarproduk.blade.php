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
            <button class="btn btn-success my-3 btn-sm" data-toggle="modal" data-target="#tambahproduk">+ Tambah</button>
          </div>
          <div class="table-responsive-xl">
            <table class="table mt-4 table-borderless ">
              <thead class="table-warning">
                <tr>
                  <th scope="col">Barcode</th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Satuan</th>
                  <th scope="col">Harga Jual</th>
                  <th scope="col">Harga Beli</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d)
                <tr>
                  <th scope="row">{{$d->id_produk}}</th>
                  <td>{{$d->nama_produk}}</td>
                  <td>{{$d->stok}}</td>
                  <td>{{$d->satuan_produk}}</td>
                  <td>{{$d->harga_jual}}</td>
                  <td>{{$d->harga_beli}}</td>
                  <td>
                  <a href="produk/detail/<!-- {{ $d->id_produk }} -->">
                    <button class="btn btn-detail btn-warning"><i class="fa-solid fa-info"></i></button>
                  </a>
                    <button class="btn btn-edit btn-primary" data-toggle="modal" data-target="#editproduk"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-hapus btn-danger"><i class="fa-solid fa-trash"></i></button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          {{-- Awal Table Expand --}}
          <!-- <div class="rounded">
            <div class="table-responsive table-borderless">
              <table class="table">
                <thead class="table-warning">
                  <tr>
                  <th scope="col">Barcode</th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Satuan</th>
                  <th scope="col">Harga Jual</th>
                  <th scope="col">Harga Beli</th>
                  <th scope="col">Aksi</th>
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
                      <td class="table-elipse" data-toggle="collapse" data-target="#demo"><i class="fa fa-ellipsis-h text-black-50"></i></td>
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
            </div> -->
          {{-- Akhir Table Expand --}}
        </div>
      </div>
    </div>
  </div>


  <!-- modal tambah -->
  <div class="modal fade" id="tambahproduk" tabindex="-1" aria-labelledby="tambahproduk" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="tambahproduk">Tambah Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row align-items-start">
              <div class="col mb-3">
                <label for="foto" class="form-label font-weight-normal">Foto produk</label>
                <input required name="foto" id="foto" class="form-control form-control-sm" type="file">

              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-3">
                <label for="namaproduk" class="form-label font-weight-normal">Kode Produk (Barcode ID)</label>
                <input required name="nama" id="nama" class="form-control form-control-sm" type="text"
                  aria-label=".form-control-sm example">
              </div>
              <div class="col mb-3">
                <label for="id_level" class="form-label font-weight-normal">Kategori</label>
                <select name="id_level" id="id_level" class="form-select" aria-label="Default select example">
                    <option value=""></option>
                </select>
              </div>
            </div>
            <div class="row align-items-end">
              <div class="col mb-2">
                <label for="namaproduk" class="form-label font-weight-normal">Nama Produk</label>
                <input required name="namaproduk" id="namaproduk" class="form-control form-control-sm" type="text"
                  aria-label=".form-control-sm example">
              </div>
              <div class="col mb-2">
                <label for="satuanproduk" class="form-label font-weight-normal">Satuan Produk</label>
                <input required name="satuanproduk" id="satuanproduk" class="form-control form-control-sm" type="password"
                  aria-label=".form-control-sm example">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-2">
                <label for="hargabeli" class="form-label font-weight-normal">Harga Beli</label>
                <input required name="hargabeli" id="hargabeli" class="form-control form-control-sm" type="text"
                  aria-label=".form-control-sm example">
              </div>
              <div class="col mb-2">
                <label for="hargajual" class="form-label font-weight-normal">Harga Jual</label>
                <input required name="hargajual" id="hargajual" class="form-control form-control-sm" type="password"
                  aria-label=".form-control-sm example">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- modal edit -->
  <div class="modal fade" id="editproduk" tabindex="-1" aria-labelledby="editproduk" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="editproduk">Edit Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row align-items-start">
              <div class="col mb-3">
                <label for="foto" class="form-label font-weight-normal">Foto produk</label>
                <input required name="foto" id="foto" class="form-control form-control-sm" type="file">

              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-3">
                <label for="namaproduk" class="form-label font-weight-normal">Kode Produk (Barcode ID)</label>
                <input required name="nama" id="nama" class="form-control form-control-sm" type="text"
                  aria-label=".form-control-sm example">
              </div>
              <div class="col mb-3">
                <label for="id_level" class="form-label font-weight-normal">Kategori</label>
                <select name="id_level" id="id_level" class="form-select" aria-label="Default select example">
                    <option value=""></option>
                </select>
              </div>
            </div>
            <div class="row align-items-end">
              <div class="col mb-2">
                <label for="namaproduk" class="form-label font-weight-normal">Nama Produk</label>
                <input required name="namaproduk" id="namaproduk" class="form-control form-control-sm" type="text"
                  aria-label=".form-control-sm example">
              </div>
              <div class="col mb-2">
                <label for="satuanproduk" class="form-label font-weight-normal">Satuan Produk</label>
                <input required name="satuanproduk" id="satuanproduk" class="form-control form-control-sm" type="password"
                  aria-label=".form-control-sm example">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-2">
                <label for="hargabeli" class="form-label font-weight-normal">Harga Beli</label>
                <input required name="hargabeli" id="hargabeli" class="form-control form-control-sm" type="text"
                  aria-label=".form-control-sm example">
              </div>
              <div class="col mb-2">
                <label for="hargajual" class="form-label font-weight-normal">Harga Jual</label>
                <input required name="hargajual" id="hargajual" class="form-control form-control-sm" type="password"
                  aria-label=".form-control-sm example">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</x-app-layout>

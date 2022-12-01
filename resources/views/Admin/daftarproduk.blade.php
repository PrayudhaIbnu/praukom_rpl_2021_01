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
            <div class="btn-group mb-2 mt-2">
              <div class="col">
                <select class="form-select bg-warning form-select-sm" aria-label="Default select example">
                  <option class="bg-light" selected>Pilih...</option>
                  <option class="bg-light" value="Makanan">Makanan</option>
                  <option class="bg-light" value="Minuman">Minuman</option>
                  <option class="bg-light" value="Lainnya">Lainnya</option>
                </select>
              </div>
            </div>
          </div>
          <div class="float-end">
            <div class="dropdown mb-2 mt-2">
              <button class="btn btn-success dropdown-toggle rounded-3 btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                + Tambah
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" >Tambah Kategori</a></li>
                <li><button class="dropdown-item" data-toggle="modal" data-target="#tambahproduk" >Tambah Produk</button></li>
              </ul>
            </div>            
          </div>
          <div class="table-responsive-xl">
            <table class="table mt-4 table-borderless ">
              <thead class="table-warning">
                <tr>
                  <th scope="col">Barcode</th>
                  <th scope="col">Nama Produk</th>
                  <!-- <th scope="col">Qty</th> -->
                  <th scope="col">Satuan</th>
                  <th scope="col">Harga Jual</th>
                  <th scope="col">Harga Beli</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($produk as $d)
                <tr>
                  <th scope="row">{{$d->id_produk}}</th>
                  <td>{{$d->nama_produk}}</td>
                  <!-- <td>{{$d->stok}}</td> -->
                  <td>{{$d->satuan_produk}}</td>
                  <td>{{$d->harga_jual}}</td>
                  <td>{{$d->harga_beli}}</td>
                  <td>
                  <a href="/detail/{{ $d->id_produk }}">
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
        <form method="POST" action="{{ url('tambah-produk') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row align-items-start">
              <div class="col mb-3">
                <label for="foto_produk" class="form-label font-weight-normal">Foto produk</label>
                <input required name="foto_produk" id="foto_produk" class="form-control form-control-sm" type="file">

              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-3">
                <label for="kode_produk" class="form-label font-weight-normal">Kode Produk (Barcode ID)</label>
                <input required name="kode_produk" id="kode_produk" class="form-control form-control-sm" type="text"
                  aria-label=".form-control-sm example">
              </div>
              <div class="col mb-3">
                <label for="id_kategori" class="form-label font-weight-normal">Kategori</label>
                <select name="id_kategori" id="id_kategori" class="form-select" aria-label="Default select example">
                @foreach ($kategori as $k)
                <option value="{{ $k->id_kategori }}">{{ $k->kategori_produk }}</option>
                @endforeach
                </select>
              </div>
            </div>
            <div class="row align-items-end">
              <div class="col mb-2">
                <label for="nama_produk" class="form-label font-weight-normal">Nama Produk</label>
                <input required name="nama_produk" id="nama_produk" class="form-control form-control-sm" type="text"
                  aria-label=".form-control-sm example">
              </div>
              <div class="col mb-2">
                <label for="satuan_produk" class="form-label font-weight-normal">Satuan Produk</label>
                <input required name="satuan_produk" id="satuan_produk" class="form-control form-control-sm" type="text"
                  aria-label=".form-control-sm example">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-2">
                <label for="harga_beli" class="form-label font-weight-normal">Harga Beli</label>
                <input required name="harga_beli" id="harga_beli" class="form-control form-control-sm" type="text"
                  aria-label=".form-control-sm example">
              </div>
              <div class="col mb-2">
                <label for="harga_jual" class="form-label font-weight-normal">Harga Jual</label>
                <input required name="harga_jual" id="harga_jual" class="form-control form-control-sm" type="text"
                  aria-label=".form-control-sm example">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary rounded-3 btn-sm pl-3 pr-3" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary rounded-3 btn-sm pl-3 pr-3">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</x-app-layout>

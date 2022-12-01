<x-app-layout>
  <x-dashboard-admin />
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Supplier</h1>
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
          <div class="float-end">
            <div class="dropdown mb-2 mt-4">
              <button class="btn btn-success rounded-3 btn-sm"  data-toggle="modal" data-target="#tambahsupplier">+ Tambah Supplier</button>
            </div>            
          </div>
          <div class="table-responsive-xl">
            <table class="table mt-4 table-borderless ">
              <thead class="table-warning">
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Nama Supplier</th>
                  <th scope="col">Alamat Supplier</th>
                  <th scope="col">No. Telp</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d)
                <tr>
                  <th scope="row">{{$d->id_supplier}}</th>
                  <td>{{$d->foto_supplier}}</td>
                  <td>{{$d->nama_supplier}}</td>
                  <td>{{$d->alamat_supplier}}</td>
                  <td>{{$d->telp_supplier}}</td>
                  <td>
                  <a href="/supplier/detail/{{ $d->id_supplier }}">
                    <button class="btn btn-detail btn-warning"><i class="fa-solid fa-info"></i></button>
                  </a>
                    <button class="btn btn-edit btn-primary" data-toggle="modal" data-target="#editsupplier"><i class="fa-solid fa-pen-to-square"></i></button>
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
  <div class="modal fade" id="tambahsupplier" tabindex="-1" aria-labelledby="tambahsupplier" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="tambahsupplier">Tambah Supplier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form method="POST" action="{{ url('tambah-supplier') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="row align-items-start">
                <div class="col mb-3">
                  <label for="foto_supplier" class="form-label font-weight-normal">Foto Supplier</label>
                  <input required name="foto_supplier" id="foto_supplier" class="form-control form-control-sm" type="file">

                </div>
              </div>
              <div class="row align-items-center">
                <div class="col mb-3">
                  <label for="nama_supplier" class="form-label font-weight-normal">Nama Supplier</label>
                  <input required name="nama_supplier" id="nama" class="form-control form-control-sm" type="text"
                    aria-label=".form-control-sm example">
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col mb-2">
                  <label for="telp_supplier" class="form-label font-weight-normal">No. Telp</label>
                  <input required name="telp_supplier" id="telp_supplier" class="form-control form-control-sm" type="text"
                    aria-label=".form-control-sm example">
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col mb-2">
                  <label for="alamat_supplier" name="alamat_supplier" class="form-label font-weight-normal">Alamat</label>
                <textarea class="form-control" name="alamat_supplier" id="alamat_supplier" rows="4"></textarea>
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

    <!-- modal edit -->

</x-app-layout>

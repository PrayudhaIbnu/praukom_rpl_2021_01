<x-app-layout>
  <x-dashboard-admin />
  {{-- tilte --}}
  @section('title')
    Daftar Produk
  @endsection
  {{-- end title --}}
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Produk</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <form action="" method="GET">
            <div class="input-group">
              <input class="form-control" name="search" id="search-input" type="text" placeholder="Search" autocomplete="off">
              <div class="input-group-append">
                <button class="btn btn-warning">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
            </form>
          </div>
        </div>
        <div class="float-start">
          <!-- Example single danger button -->
          <div class="btn-group my-2">
              <select class="form-select bg-warning form-select-sm" id="sort-kategori"
                aria-label="Default select example">
                <option class="bg-light" selected value="semua">Semua</option>
                @foreach ($kategori as $k)
                  <option class="bg-light" value="{{ $k->id_kategori }}">{{ $k->kategori_produk }}</option>
                @endforeach
              </select>
          </div>
        </div>
        <div class="float-end">
          <div class="dropdown my-2">
            <button class="btn btn-success dropdown-toggle  btn-sm" type="button" data-bs-toggle="dropdown"
              aria-expanded="false">
                Tambah
            </button>
            <ul class="dropdown-menu">
              <li><a href="/admin/listkategori" class="dropdown-item">Tambah Kategori</a></li>
              <li><button class="dropdown-item" data-toggle="modal" data-target="#tambahproduk">Tambah
                  Produk</button>
              </li>
            </ul>
          </div>
        </div>
        <div class="container-fluid-6">
          @if (count($errors) > 0)
          <div class=" alert alert-dismissible fade show alert-danger" role="alert" style="margin-top: 60px">
            {{-- <div class="alert alert-dismissible fade show alert-danger" role="alert"> --}}
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            {{-- </div> --}}
          </div>
         @endif
          <div class="table-responsive-xl">
            <table class="table mt-4 table-borderless ">
              <thead class="table-warning">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Barcode</th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col">Stok</th>
                  <th scope="col">Satuan</th>
                  <th scope="col">Harga Jual</th>
                  <th scope="col">Harga Beli</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody class="produk">
                @foreach ($produk as $d)
                  <tr class="produk-info" data-custom-type="{{ $d->kategori }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->id_produk }}</td>
                    <td id="s">{{ $d->nama_produk }}</td>
                    <td>{{ $d->stok }}</td>
                    <td>{{ $d->satuan_produk }}</td>
                    <td> Rp {{ number_format($d->harga_jual, 2, ',', '.') }}</td>
                    <td>Rp {{ number_format($d->harga_beli, 2, ',', '.') }}</td>
                    <td>
                      <a href="produk/detail/{{ $d->id_produk }}">
                        <button class="btn btn-detail btn-warning"><i class="fa-solid fa-info"></i></button>
                      </a>
                      <button type="button" value="{{ $d->id_produk }}" class="btn btn-edit btn-primary"><i
                          class="fa-solid fa-pen-to-square"></i></button>
                      <button class="btn btn-hapus btn-danger" value="{{ $d->id_produk }}"><i
                          class="fa-solid fa-trash"></i></button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-center">
            {!! $produk->links() !!}
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
        <form method="POST" action="{{ route('tambah-produk') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row align-items-start">
              <div class="col mb-3">
                <label for="foto" class="form-label font-weight-normal">Foto produk</label>
                <input name="foto"  class="form-control form-control-sm" type="file">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-3">
                <label for="kode_produk" class="form-label font-weight-normal">Kode Produk (Barcode ID)</label>
                <input  value="{{ old('kode_produk') }}" name="kode_produk"  class="form-control form-control-sm @error('kode_produk') is-invalid @enderror" type="number"
                  aria-label=".form-control-sm example">
                  @error('kode_produk')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror   
              </div>
              <div class="col mb-3">
                <label for="id_kategori" class="form-label font-weight-normal">Kategori</label>
                <select  name="id_kategori"  class="form-select"
                  aria-label="Default select example">
                  @foreach ($kategori as $k)
                    <option value="{{ $k->id_kategori }}">{{ $k->kategori_produk }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row align-items-end">
              <div class="col mb-2">
                <label for="nama_produk" class="form-label font-weight-normal">Nama Produk</label>
                <input value="{{ old('nama_produk') }}" name="nama_produk"  class="form-control form-control-sm @error('nama_produk') is-invalid @enderror"
                  type="text" aria-label=".form-control-sm example">
                  @error('nama_produk')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror   
              </div>
              <div class="col mb-2">
                <label for="satuan_produk" class="form-label font-weight-normal">Satuan Produk</label>
                <input readonly value="pcs" name="satuan_produk"  class="form-control form-control-sm "
                  type="text" aria-label=".form-control-sm example">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-2">
                <label for="harga_beli" class="form-label font-weight-normal">Harga Beli</label>
                <input value="{{ old('harga_beli') }}" name="harga_beli"  class="form-control form-control-sm @error('harga_beli') is-invalid @enderror"
                  type="text" aria-label=".form-control-sm example">
                  @error('harga_beli')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror   
              </div>
              <div class="col mb-2">
                <label for="harga_jual" class="form-label font-weight-normal">Harga Jual</label>
                <input value="{{ old('harga_jual') }}" name="harga_jual"  class="form-control form-control-sm @error('harga_jual') is-invalid @enderror"
                  type="text" aria-label=".form-control-sm example">
                  @error('harga_jual')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror   
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary rounded-3 btn-sm pl-3 pr-3"
              data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary rounded-3 btn-sm pl-3 pr-3">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit Produk -->
  <div class="modal fade" id="editproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Produk</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('admin/update-produk') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="produk_id" id="produk_id">
          {{-- <input type="hidden" name="path_foto" id="path_foto"> --}}
          <div class="modal-body">
            <div class="row align-items-start">
              <div class="col mb-2">
                <label for="foto_produk" class="form-label font-weight-normal">Foto produk</label>
                <input name="foto" id="foto_produk" class="form-control form-control-sm" type="file">
              </div>
              <div class="mb-2" id="foto"> </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-3">
                <label for="kode_produk" class="form-label font-weight-normal">Kode Produk (Barcode ID)</label>
                <input readonly name="kode_produk" id="kode_produk" class="form-control form-control-sm"
                  type="number" aria-label=".form-control-sm example">
              </div>
              <div class="col mb-3">
                <label for="id_kategori" class="form-label font-weight-normal">Kategori</label>
                <select required name="id_kategori" id="id_kategori" class="form-select"
                  aria-label="Default select example">
                  @foreach ($kategori as $k)
                    <option value="{{ $k->id_kategori }}">{{ $k->kategori_produk }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row align-items-end">
              <div class="col mb-2">
                <label for="nama_produk" class="form-label font-weight-normal">Nama Produk</label>
                <input required name="nama_produk" id="nama_produk" class="form-control form-control-sm"
                  type="text" aria-label=".form-control-sm example">
              </div>
              <div class="col mb-2">
                <label for="satuan_produk" class="form-label font-weight-normal">Satuan Produk</label>
                <input required name="satuan_produk" id="satuan_produk" class="form-control form-control-sm"
                  type="text" aria-label=".form-control-sm example">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-2">
                <label for="harga_beli" class="form-label font-weight-normal">Harga Beli</label>
                <input required name="harga_beli" id="harga_beli" class="form-control form-control-sm"
                  type="text" aria-label=".form-control-sm example">
              </div>
              <div class="col mb-2">
                <label for="harga_jual" class="form-label font-weight-normal">Harga Jual</label>
                <input required name="harga_jual" id="harga_jual" class="form-control form-control-sm"
                  type="text" aria-label=".form-control-sm example">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary btn-simpan">Perbarui</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Modal Edit User -->

  {{-- delete modal --}}
  <div class="modal fade" id="deleteproduk" tabindex="-1" aria-labelledby="tambahuserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content text-center">
        <div class="modal-header flex-column">
          <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
          <h4 class="modal-title w-100">Apakah Anda yakin?</h4>
        </div>
        <div class="modal-body">
          <p>Apakah Anda benar-benar ingin menghapus? Anda tidak akan dapat mengembalikan ini! </p>
        </div>
        <form method="POST" action="{{ url('admin/delete-produk') }}" enctype="multipart/form-data">
          @csrf
          @method('DELETE')
          <input type="hidden" id="delete_id" name="delete_produk_id">
          <div class="modal-footer ">
            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-danger ">Iya</button>
          </div>
      </div>
    </div>
  </div>
  {{-- end delete modal --}}


  @include('sweetalert::alert')
</x-app-layout>

{{-- FILTER KATEGORI --}}
<script>
  $('select#sort-kategori').change(function() {
    var filter = $(this).val();
    filterList(filter);
  });

  // Kategori filter function
  function filterList(value) {
    var list = $(".produk .produk-info");
    $(list).hide();
    if (value == "semua") {
      $(".produk").find("tr").each(function(i) {
        $(this).show();
      });
    } else {
      // *=" means that if a data-custom type contains multiple values, it will find them
      $(".produk").find("tr[data-custom-type=" + value + "]").each(function(i) {
        $(this).show();
      });
    }
  }

  $(document).ready(function() {
    // edit pop up 
    $(document).on('click', '.btn-edit', function() {
      var produk_id = $(this).val();
      // console.log(produk_id);
      $.ajax({
        type: "GET",
        url: "edit-produk/" + produk_id,
        dataType: "json",
        success: function(response) {
          console.log(response);
          $('#editproduk').modal('show');
          $('#produk_id').val(produk_id);
          // $('#foto_produk').val(response.produk.foto);
          $('#foto').html(
            `<img src="/storage/post-images/${response.produk.foto}" width="100" class="img-fluid img-thumbnail">`
          );
          $('#kode_produk').val(response.produk.id_produk);
          $('#id_kategori').val(response.produk.kategori);
          $('#nama_produk').val(response.produk.nama_produk);
          $('#satuan_produk').val(response.produk.satuan_produk);
          $('#harga_beli').val(response.produk.harga_beli);
          $('#harga_jual').val(response.produk.harga_jual);
        }
      })
    });

    // delete
    $(document).on('click', '.btn-hapus', function() {
      var produk_id = $(this).val();
      $('#deleteproduk').modal('show');
      $('#delete_id').val(produk_id);
    });
  });
</script>

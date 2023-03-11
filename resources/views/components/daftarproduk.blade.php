<x-app-layout>
    <x-menu-navigasi />
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
              @can('admin')
              <button class="btn btn-success dropdown-toggle  btn-sm" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                  Tambah
              </button>
              @endcan
              <ul class="dropdown-menu">
                <li><a href="/kategori" class="dropdown-item">Tambah Kategori</a></li>
                <li><button class="dropdown-item" data-toggle="modal" data-target="#tambahproduk">Tambah
                    Produk</button>
                </li>
              </ul> 
            </div>
          </div>
          <div class="container-fluid-6">
            @if (count($errors) > 0)
            <div class=" alert alert-dismissible fade show alert-danger" role="alert" style="margin-top: 60px">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
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
                    @can('admin')
                    <th scope="col">Aksi</th>
                    @endcan
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
                      @can('admin')                          
                      <td>
                        <a href="produk/detail/{{ $d->id_produk }}">
                          <button class="btn btn-detail btn-warning"><i class="fa-solid fa-info"></i></button>
                        </a>
                        <button type="button" value="{{ $d->id_produk }}" class="btn btn-edit btn-primary"><i
                            class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-hapus btn-danger" value="{{ $d->id_produk }}"><i
                            class="fa-solid fa-trash"></i></button>
                      </td>
                      @endcan
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
    @include('Admin.modal-daftarproduk')
    @include('sweetalert::alert')
  </x-app-layout>
  
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
  
    // modal pop up
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
  
{{-- x-app-layout buat struktur html --}}
<x-app-layout>
  {{-- x-dashboard buat struktur dashboard --}}
  <x-dashboard-cashier />
  @section('title')
    Daftar Produk
  @endsection
  {{-- CONTENT --}}
  @section('title')
      Daftar Produk
  @endsection
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Produk</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <form action="" method="get">
              @csrf
              <div class="input-group">
                <input class="form-control" name="search" id="search-input" type="text" placeholder="Search" autocomplete="off">
                <div class="input-group-append">
                  <button class="btn btn-warning" type="submit">
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
          <div class="table-responsive-xl">
            <table class="table mt-4 table-borderless ">
              <thead class="table-warning">
                <tr>
                  <th scope="col">Barcode</th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col">Stok</th>
                  <th scope="col">Satuan</th>
                  <th scope="col">Harga</th>
                </tr>
              </thead>
              <tbody class="produk">
                @foreach ($produk as $d)
                  <tr class="produk-info" data-custom-type="{{ $d->kategori }}">
                    <td scope="row">{{ $d->id_produk }}</td>
                    <td id="s" scope="row" >{{ $d->nama_produk }}</td>
                    <td scope="row" >{{ $d->stok }}</td>
                    <td scope="row" >{{ $d->satuan_produk }}</td>
                    <td scope="row" > Rp {{ number_format($d->harga_jual, 2, ',', '.') }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
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
</script>

<x-app-layout>
  <x-dashboard-admin />
  {{-- tilte --}}
  @section('title')
      Input Stok Produk
  @endsection
  {{-- end title --}}
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6 mb-4">
            <h1 class="m-0">Input Stok Produk</h1>
          </div>
        </div>
        <div class="card w-50 m-auto bg-transparent shadow-none ">
          <form method="POST" action="{{ route('tambah-stok') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="row align-items-center">
                <div class="col mb-3">
                  <label for="id_produk" class="form-label font-weight-normal">Nama Produk</label>
                  <select required name="id_produk" id="id_produk" class="form-select bg-white"
                    aria-label="Default select example">
                    {{-- <input type="search" name=" " id=""> --}}
                    <option disabled class="bg-light" selected>Pilih Produk...</option>
                    @foreach ($produk as $p)
                      <option value="{{ $p->id_produk }}">{{ $p->nama_produk }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col mb-3">
                  <label for="nama_supplier" class="form-label font-weight-normal">Nama Supplier</label>
                  <select required name="id_supplier" id="id_supplier" class="form-select bg-white"
                    aria-label="Default select example">
                    <option class="bg-light" disabled selected>Pilih Supplier...</option>
                    @foreach ($supplier as $s)
                      <option value="{{ $s->id_supplier }}">{{ $s->nama_supplier }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
                <div class="row align-items-center ">
                  <div class="col mb-3">
                    <label for="qty" class="form-label font-weight-normal">Jumlah
                      Masuk </label>
                    <input class="form-control " type="number" name="qty" id="qty">
                  </div>
                </div>
                <div class="row align-items-center w-full">
                  <div class="col mb-3">
                    <label for="tgl_msk" name="tgl_msk" class="form-label font-weight-normal">Tanggal
                      Masuk </label>
                    <div class="input-group date" id="datepicker">
                      <input type="date" class="form-control" id="date" name="tgl_msk" />
                    </div>
                  </div>
                </div>

                <div class="row align-items-center w-full">
                  <div class="col mb-2">
                    <label for="tgl_exp" name="tgl_exp" class="form-label font-weight-normal">Tanggal
                      Exp</label>
                    <div class="input-group date" id="datepicker">
                      <input type="date" class="form-control" id="date" name="tgl_exp" />
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm pl-3 pr-3"
                    data-dismiss="modal">Kembali</button>
                  <button type="submit" class="btn btn-primary btn-sm pl-3 pr-3">Simpan</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')

  <!-- <script type="text/javascript">
    var route = "{{ url('autocomplete-search') }}";
    $('#produk').typeahead({
      source: function(query, process) {
        return $.get(route, {
          query: query
        }, function(data) {
          return process(data);
        });
      }
    });
  </script> -->

</x-app-layout>

{{-- Autocomplete? --}}
<script>
  $("#produk").autocomplete({
    source: fn(request, response)

  });
</script>

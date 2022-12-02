<x-app-layout>
  <x-dashboard-admin />
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6 mb-5">
            <h1 class="m-0">Input Stok Produk</h1>
          </div>
        </div>
        <div class="card w-50 m-auto bg-transparent shadow-none ">
          <form method="POST" action="{{ url('tambah-supplier') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="row align-items-start">
                <div class="col mb-3">
                  <label for="foto_supplier" class="form-label font-weight-normal">Nama Produk</label>
                  <input type="text" id="search" name="nama_produk" class="form-control" />
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col mb-3">
                  <label for="nama_supplier" class="form-label font-weight-normal">Nama Supplier</label>
                  <input type="text" id="search" name="search" placeholder="Search" class="form-control" />
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col mb-2">
                  <label for="alamat_supplier" name="alamat_supplier" class="form-label font-weight-normal">Tanggal
                    Keluar </label>
                  <div class="input-group date" id="datepicker">
                    <input type="date" class="form-control" id="date" />
                    <span class="input-group-append">
                      <span class="input-group-text bg-light d-block">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col mb-2">
                  <label for="alamat_supplier" name="alamat_supplier" class="form-label font-weight-normal">Tanggal
                    Masuk </label>
                  <div class="input-group date" id="datepicker">
                    <input type="date" class="form-control" id="date" />
                    <span class="input-group-append">
                      <span class="input-group-text bg-light d-block">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col mb-2">
                  <label for="alamat_supplier" name="alamat_supplier" class="form-label font-weight-normal">Keterangan
                  </label>
                  <textarea class="form-control" name="alamat_supplier" id="alamat_supplier" rows="4"></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm pl-3 pr-3" data-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-primary btn-sm pl-3 pr-3">Simpan</button>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>

  <!-- <script type="text/javascript">
    var route = "{{ url('autocomplete-search') }}";
    $('#search').typeahead({
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

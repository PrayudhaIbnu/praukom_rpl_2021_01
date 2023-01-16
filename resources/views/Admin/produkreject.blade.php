<x-app-layout>
  <x-dashboard-admin />
  {{-- tilte --}}
  @section('title')
      Produk Reject
  @endsection
  {{-- end title --}}
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
      <div class="row">
          <div class="col-sm-6 mb-4">
            <h1 class="m-0">Produk Reject</h1>
          </div>
        </div>
        @if (session('success_message'))
        <div class="alert alert-success">
          {{ session('success_message') }}
        </div>
      @endif
        <div class="card w-50 m-auto bg-transparent shadow-none " >
          <form method="POST" action="/admin/input-produkreject" >
                @csrf
            <div class="modal-body">
              <div class="row align-items-start">
                  <div class="col mb-3">
                    <label for="jml_keluar" class="form-label font-weight-normal">Nama Produk</label>
                  <select name="produk" id="produk" class="form-select bg-white" aria-label="Default select example">
                    <option value="" selected disabled >- Pilih Produk -</option>
                    @foreach ($produk as $item)
                      <option value="{{ $item->id_produk }}">{{ $item->nama_produk }}</option>
                    @endforeach
                  </select>
                  </div>
              </div>
              <div class="row align-items-center">
                  <div class="col mb-2">
                    <label for="jml_keluar" class="form-label font-weight-normal">Jumlah Keluar</label>
                    <input required name="jml_keluar" id="jml_keluar" class="form-control form-control-sm" type="number" aria-label=".form-control-sm example">
                  </div>
                  <div class="col mb-2">
                    <label for="tgl_keluar" class="form-label font-weight-normal">Tanggal Keluar</label>
                    <input required name="tgl_keluar" id="tgl_keluar" class="form-control form-control-sm" type="date" aria-label=".form-control-sm example">
                  </div>
              </div>
              <div class="row align-items-center">
                  <div class="col mb-2">
                  <label for="keterangan"  class="form-label font-weight-normal">Keterangan </label>
                  <textarea class="form-control" name="keterangan" id="keterangan" rows="4"></textarea>
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
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
    </script> -->
    @include('sweetalert::alert')
</x-app-layout>

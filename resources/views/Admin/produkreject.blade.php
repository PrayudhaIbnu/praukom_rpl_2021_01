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
                  <label for="produk" class="form-label font-weight-normal">Nama Produk</label>
                  <select name="produk" id="produk" class="form-select bg-white js-example-basic-multiple @error('produk') is-invalid @enderror" aria-label="Default select example">
                    <option  selected disabled >Pilih Produk</option>
                    @foreach ($produk as $item)
                      <option  value="{{ $item->id_produk }}">{{ $item->nama_produk }}</option>
                    @endforeach
                  </select>
                  @error('produk')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror 
                  </div>
              </div>
              <div class="row align-items-center">
                  <div class="col mb-2">
                    <label for="jml_keluar" class="form-label font-weight-normal">Jumlah Keluar</label>
                    <input value="{{ old('jml_keluar') }}" name="jml_keluar" id="jml_keluar" class="form-control form-control-sm @error('jml_keluar') is-invalid @enderror" type="number" aria-label=".form-control-sm example">
                    @error('jml_keluar')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror 
                  </div>
                  <div class="col mb-2">
                    <label for="tgl_keluar" class="form-label font-weight-normal">Tanggal Keluar</label>
                    <input value="{{ old('tgl_keluar') }}" name="tgl_keluar" id="tgl_keluar" class="form-control form-control-sm  @error('tgl_keluar') is-invalid @enderror" type="date" aria-label=".form-control-sm example">
                    @error('tgl_keluar')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror 
                  </div>
              </div>
              <div class="row align-items-center">
                <div class="col mb-">
                  <label for="keterangan"  class="form-label font-weight-normal">Keterangan </label>
                  <textarea value="{{ old('keterangan') }}" class="form-control  @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" rows="4"></textarea>
                  @error('keterangan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror 
                </div>
              </div>
            </div>
            <div class="modal-footer" style="padding-top: 0;">
                  <button type="submit" class="btn btn-primary btn-sm ">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
    @include('sweetalert::alert')
</x-app-layout>
<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2([{
      width: 'resolve'
    }]);
  });
</script>

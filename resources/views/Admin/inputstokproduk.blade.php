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
                  <select  name="id_produk" id="id_produk" class="form-select bg-white js-example-basic-multiple  @error('id_produk') is-invalid @enderror"
                    aria-label="Default select example" data-live-search="true" >
                    {{-- <input type="search" name=" " id=""> --}}
                    <option disabled class="bg-light" selected>Pilih Produk...</option>
                    @foreach ($produk as $p)
                      <option value="{{ $p->id_produk }}">{{ $p->nama_produk }}</option>
                    @endforeach
                  </select>
                  @error('id_produk')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror   
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col mb-3">
                  <label for="nama_supplier" class="form-label font-weight-normal">Nama Supplier</label>
                  <select required name="id_supplier" id="id_supplier" class="form-select bg-white js-example-basic-multiple  @error('id_supplier') is-invalid @enderror"
                    aria-label="Default select example" >
                    <option class="bg-light" disabled selected>Pilih Supplier...</option>
                    @foreach ($supplier as $s)
                      <option value="{{ $s->id_supplier }}">{{ $s->nama_supplier }}</option>
                    @endforeach
                  </select>
                  @error('id_supplier')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror   
                </div>
              </div>
                <div class="row align-items-center ">
                  <div class="col mb-3">
                    <label for="qty" class="form-label font-weight-normal">Jumlah
                      Masuk </label>
                    <input value="{{ old('qty') }}" class="form-control @error('qty') is-invalid @enderror" type="number" name="qty" id="qty">
                    @error('qty')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror   
                  </div>
                </div>
                <div class="row align-items-center w-full">
                  <div class="col mb-3">
                    <label for="tgl_msk" name="tgl_msk" class="form-label font-weight-normal">Tanggal
                      Masuk </label>
                    <div class="input-group date" id="datepicker">
                      <input type="date" class="form-control @error('tgl_msk') is-invalid @enderror "id="date" name="tgl_msk" />
                      @error('tgl_msk')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror   
                    </div>
                  </div>
                </div>

                <div class="row align-items-center w-full">
                  <div class="col mb-2">
                    <label for="tgl_exp" name="tgl_exp" class="form-label font-weight-normal">Tanggal
                      Exp</label>
                    <div class="input-group date" id="datepicker">
                      <input type="date" class="form-control @error('tgl_exp') is-invalid @enderror" id="date" name="tgl_exp" />
                      @error('tgl_exp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror 
                    </div>
                  </div>
                </div>
              </div>          
            <div class="modal-footer" style="padding-top: 0;">
              <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')

</x-app-layout>
{{-- Autocomplete? --}}
<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2([{
      width: 'resolve'
    }]);
  });
</script>

<x-app-layout>
  <x-dashboard-admin />
  {{-- tilte --}}
  @section('title')
      Detail Supplier
  @endsection
  {{-- end title --}}
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Supplier</h1>
          </div>
        </div>
        <div class="container-fluid">
          <div class="card mt-5">
            <div class="row">

              <div class="col">
                <div class="row gx-5 m-4">
                  <div class="col">
                    <h6 class="text-secondary mb-2">Nama Supplier</h6>
                    <h5 class="fw-bold">{{ $detailSupplier->nama_supplier }}</h3>
                  </div>

                </div>
                <div class="row gx-5 m-4">
                  <div class="col">
                    <h6 class="text-secondary mb-2">No Telepon</h6>
                    <h5 class="fw-bold">{{ $detailSupplier->telp_supplier }}</h3>
                  </div>
                </div>
              </div>
              <div class="col m-4">
                <h6 class="text-secondary mb-2">Alamat</h6>
                <h5 class="fw-bold">{{ $detailSupplier->alamat_supplier }}</h3>
              </div>
              <div class="col-5">
                <div class="w-75 m-4" style="margin: 0 0 10 0; ">
                  <img alt="Belum ada foto :("
                    src="{{ asset('storage/post-images/' . $detailSupplier->foto_supplier) }}"
                    class="img-fluid rounded">
                  <a href="{{ url('/admin/supplier') }}">
                    <button class="btn btn-primary float-end mt-2">Kembali</button>
                  </a>
                </div>

              </div>
            </div>

          </div>

        </div>
</x-app-layout>

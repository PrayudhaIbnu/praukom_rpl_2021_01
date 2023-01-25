<x-app-layout>
  <x-dashboard-admin />
  {{-- tilte --}}
  @section('title')
    Detail Produk
  @endsection
  {{-- end title --}}
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Produk</h1>
          </div>
        </div>
        <div class="container-fluid">
          <div class="card mt-5">
            <div class="row">
              <div class="col-5">
                <div class="row gx-5 m-4">
                  <div class="col">
                    <h6 class="mb-0 text-secondary">Kode Produk</h6>
                    <h6 class="fw-bold mt-0">{{ $detailProduk->id_produk }}</h6>
                  </div>
                </div>
                <div class="row gx-5 m-4">
                  <div class="col">
                    <h6 class="mb-0 text-secondary">Nama Produk</h6>
                    <h6 class="fw-bold mt-0">{{ $detailProduk->nama_produk }}</h6>
                  </div>
                </div>

                <div class="row gx-5 m-4">
                  <div class="col">
                    <h6 class="mb-0 text-secondary">Kategori</h6>
                    <h6 class="fw-bold mt-0">{{ $detailProduk->kategori_produk }}</h6>
                  </div>
                  <div class="col">
                    <h6 class="mb-0 text-secondary">Stok</h6>
                    <h6 class="fw-bold mt-0">{{ $detailProduk->stok }}</h6>
                  </div>
                </div>
                <div class="row gx-5 m-4">
                  <div class="col">
                    <h6 class="mb-0 text-secondary">Satuan Produk</h6>
                    <h6 class="fw-bold mt-0">{{ $detailProduk->satuan_produk }}</h6>
                  </div>
                  <div class="col">
                    <h6 class="mb-0 text-secondary">Harga Jual</h6>
                    <h6 class="fw-bold mt-0">{{ $detailProduk->harga_jual }}</h6>
                  </div>
                </div>
              </div>
              <div class="col m-4">
                <h6 class="mb-0 text-secondary">Harga Beli</h6>
                <h6 class="fw-bold mt-0">{{ $detailProduk->harga_beli }}</h6>
              </div>


              <div class="col-5">
                <div class="w-75 m-4" style="margin: 0 0 10 0; ">
                  <img alt="Belum ada foto :(" src="{{ asset('storage/post-images/' . $detailProduk->foto) }}"
                    class="img-fluid rounded">
                  <a href="{{ url('/admin/produk') }}">
                    <button class="btn btn-primary float-end mt-2">Kembali</button>
                  </a>
                </div>

              </div>
            </div>

          </div>

        </div>
</x-app-layout>

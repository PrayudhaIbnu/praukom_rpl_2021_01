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
          <div class="card mt-5 w-100   ">
            <div class="container">
              <div class="col">
                <div class="row mt-3">
                  <div class="col-3">
                    <td>
                      <h6 class="mb-0 text-secondary">Kode Produk</h6>
                    </td>
                    <th>
                      <h6 class="fw-bold mt-0">{{ $detailProduk->id_produk }}</h6>
                    </th>
                  </div>
                  <div class="col-3">
                    <td>
                      <h6 class="mb-0 text-secondary">Nama Produk</h6>
                    </td>
                    <th>
                      <h6 class="fw-bold mt-0">{{ $detailProduk->nama_produk }}</h6>
                    </th>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-3">
                    <td>
                      <h6 class="mb-0 text-secondary">Kategori</h6>
                    </td>
                    <th>
                      <h6 class="fw-bold mt-0">{{ $detailProduk->kategori_produk }}</h6>
                    </th>
                  </div>
                  <div class="col-3">
                    <td>
                      <h6 class="mb-0 text-secondary">Stok</h6>
                    </td>
                    <th>
                      <h6 class="fw-bold mt-0">{{ $detailProduk->stok }}</h6>
                    </th>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-3">
                    <td>
                      <h6 class="mb-0 text-secondary">Satuan Produk</h6>
                    </td>
                    <th>
                      <h6 class="fw-bold mt-0">{{ $detailProduk->satuan_produk }}</h6>
                    </th>
                  </div>
                  <div class="col-3">
                    <td>
                      <h6 class="mb-0 text-secondary">Harga Jual</h6>
                    </td>
                    <th>
                      <h6 class="fw-bold mt-0">{{ $detailProduk->harga_jual }}</h6>
                    </th>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-3">
                    <td>
                      <h6 class="mb-0 text-secondary">Harga Beli</h6>
                    </td>
                    <th>
                      <h6 class="fw-bold mt-0">{{ $detailProduk->harga_beli }}</h6>
                    </th>
                  </div>
                </div>
              </div>
              <div class="col  ">
                <div class="card w-50 bg-dark">
                  <div class="w-75 m-4" style="margin: 0 0 10 0; ">
                    <img alt="Belum ada foto :(" src="{{ asset('storage/post-images/' . $detailProduk->foto) }}"
                      class="img-fluid rounded">
                    <a href="{{ url('/admin/produk') }}">
                      <button class="btn btn-primary  mt-2">Kembali</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</x-app-layout>

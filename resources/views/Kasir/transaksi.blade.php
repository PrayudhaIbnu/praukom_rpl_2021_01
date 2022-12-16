{{-- x-app-layout buat struktur html --}}
<x-app-layout>
  {{-- x-dashboard buat struktur dashboard --}}
  <x-dashboard-cashier />
  {{-- CONTENT --}}
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid transaksi">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="">Transaksi</h1>
          </div>
        </div>
        <div class="row gx-3 ">
          <div class="col-3 flex">
            <!-- Main content -->
            <div class="card" style="width: 100%; height: 165px;">
              <div class="card-body" style="vertical-align: middle; margin-top: 5px;">
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-5 col-form-label">Jam</label>
                  <div class="col-sm-7">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                      value="{{ date('H:i') }}">
                  </div>
                  <label for="staticEmail" class="col-sm-5 col-form-label">Tanggal</label>
                  <div class="col-sm-7">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                      value="{{ date('d-m-Y') }}">
                  </div>
                  <label for="staticEmail" class="col-sm-5 col-form-label">Kasir</label>
                  <div class="col-sm-7">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Vera Uhuyyy">
                  </div>
                </div>
              </div>
            </div>
            {{-- akhir card --}}
          </div>
          <div class="col-5">
            <!-- Main content -->
            <form action="addcart" method="post">
              <div class="card" style="width: 100%; height: 165px;">
                <div class="card-body">
                  <div class="mb-3 row">
                    <label for="staticEmail" id="produk" class="col-sm-3 col-form-label">Produk</label>
                    <div class="col-sm-9 mb-2">
                      <select class="form-select" id="produk" aria-label="Default select example">
                        <option disabled class="bg-light" selected>Pilih Produk...</option>
                        @foreach ($produk as $p)
                          <option value="{{ $p->id_produk }}">{{ $p->nama_produk }}</option>
                        @endforeach
                      </select>
                    </div>
                    <label for="qty" class="col-sm-3 col-form-label">Qty</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="qty">
                    </div>

                  </div>
                  <button type="submit" class="btn btn-primary btn-sm  float-end">Simpan</button>
                </div>
              </div>
            </form>
            {{-- akhir card --}}
          </div>
          <div class="col">
            <!-- Main content -->
            <div class="card" style="width: 100%; height: 165px;">
              <div class="card-body">
                <h2 class="h3" style="font-weight: 500; color: #a2a2a2">Grand Total</h2>
                <p class="float-end" style="font-size: 60px; font-weight: 600;">5000</p>
              </div>
            </div>
            {{-- akhir card --}}
          </div>
        </div>
        {{-- Akhir Card Grid --}}
        <div class="card" style="width: 100%; height: 220px; overflow-y: scroll;">
          <table class="table table-borderless ">
            <thead class="table-warning sticky-top">
              <tr>
                <th scope="col"style="width: 80px">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col" style="width: 180px">Harga Satuan</th>
                <th scope="col" style="width: 100px">Qty</th>
                <th scope="col" style="width: 180px">Harga Total</th>
                <th scope="col" style="width: 150px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Goodmood</td>
                <td>21000</td>
                <td>2</td>
                <td>42000</td>
                <td>
                  <a href="">
                    <button class="btn btn-warning">
                      <span class="fas fa-minus"></span>
                    </button>
                  </a>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
        {{-- akhir table   --}}
        <div class="row gx-3 ">
          <div class="col-5">
            <!-- Main content -->
            <div class="card" style="width: 100%; height: 130px;">
              <div class="card-body">
                <h2 class="h4" style="font-weight: 500; color: #a2a2a2">Cash</h2>
                <input class="form-control form-control-lg" type="number" placeholder="Masukan Tunai"
                  aria-label=".form-control-lg example">
              </div>
            </div>
            {{-- akhir card --}}
          </div>
          <div class="col-4">
            <!-- Main content -->
            <div class="card" style="width: 100%; height: 130px;">
              <div class="card-body">
                <h2 class="h4" style="font-weight: 500; color: #a2a2a2">Kembali</h2>
                <p class="float-end" style="font-size: 40px; font-weight: 600;">5000</p>
                {{-- <input class="form-control form-control-lg" type="number" placeholder="Masukan Tunai" aria-label=".form-control-lg example"> --}}
              </div>
            </div>
          </div>
          <div class="col-3">
            <!-- Main content -->
            <button class="btn btn-danger w-100 fw-bold" style="height: 130px; font-size: 30px">BAYAR!</button>
            {{-- akhir card --}}
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
  </div>

  <script>
    $('transaksi').each(function() {
      var sub_total_hrg = $(this).data('lat');
      var lon = $(this).data('lon');

      var mymap = new L.map('mapid').setView([lat, lon], 14);
    })
  </script>
</x-app-layout>

{{-- x-app-layout buat struktur html --}}
<x-app-layout>
  {{-- x-dashboard buat struktur dashboard --}}
  <x-dashboard-cashier />
  @section('title')
    Transaksi
  @endsection
  {{-- CONTENT --}}
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid transaksi">
        <div class="row mb-2">
          <div>
            <h1 class="float-start">Transaksi</h1>
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
                    <p class="form-control-plaintext" id="jam"></p>
                  </div>
                  <label for="staticEmail" class="col-sm-5 col-form-label">Tanggal</label>
                  <div class="col-sm-7">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                      value="{{ date('d-m-Y') }}">
                  </div>
                  <label for="staticEmail" class="col-sm-5 col-form-label">Kasir</label>
                  <div class="col-sm-7">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                      value="{{ Session::get('levelbaru')->nama }}">
                  </div>
                </div>
              </div>
            </div>
            {{-- akhir card --}}
          </div>
          <div class="col-5">
            <!-- Main content -->
            <form action="{{ route('tambah-cart') }}" method="post" id="tambahcart">
              @csrf
              <div class="card" style="width: 100%; height: 165px;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-3 mt-2">
                      <p class="font-weight-bold mt-2">Produk</p>
                      <p class="font-weight-bold mt-3">Barcode</p>
                      <p class="font-weight-bold mt-2">Qty</p>
                    </div>
                    <div class="col-7 mt-2">
                      <div class="container">
                        <select class="form-control js-example-basic-multiple" id="produk" name="produk"
                          aria-label="Default select example">
                          <option disabled class="bg-light" selected>Pilih Produk...</option>
                          @foreach ($produk as $p)
                            <option value="{{ $p->id_produk }}">{{ $p->nama_produk }} </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="container mt-2">
                        <input type="number" class="form-control form-control-sm" id="barcode" name="barcode"
                          aria-label=".form-control-sm example" autofocus>
                      </div>
                      <div class="container mt-2">
                        <input type="number" class="form-control form-control-sm" id="qty" name="qty"
                          value="1">
                      </div>
                    </div>
                    <div class="col-2 mt-2">
                      <div class="container ml-2">
                        <button type="submit" class="btn btn-primary btn-sm float-end tambah-cart">Simpan</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </form>
            {{-- akhir card --}}
          </div>
          <div class="col">
            <!-- Main content -->
            <div class="card" style="width: 100%; height: 165px;">
              <div class="card-body">
                <input type="text" class="form-control form-control-lg float-end" style="display: none" readonly
                  name="grand_total" id="grand_total" value="{{ $summary['total'] }}">
                <div class="container">
                  <h2 class="h3" style="font-weight: 500; color: #a2a2a2">Grand Total</h2>
                  <h1>Rp{{ number_format($summary['total'], 2, ',', '.') }}</h1>
                </div>
              </div>
            </div>
            {{-- akhir card --}}
          </div>
        </div>
        {{-- Akhir Card Grid --}}
        <div class="card" style="width: 100%; height: 220px; overflow-y: scroll;">
          <table class="table table-sm table-hover table-borderless ">
            <thead class="table-warning sticky-top">
              <tr>
                <th scope="col"style="width: 80px">No</th>
                <th scope="col" style="">Nama Produk</th>
                <th scope="col" style="width: 180px">Harga Satuan</th>
                <th scope="col" style="width: 100px">Qty</th>
                <th scope="col" style="width: 180px">Harga Total</th>
                <th scope="col" style="width: 150px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($carts as $index=>$cart)
                <tr>
                  <td scope="row">{{ $index + 1 }}</td>
                  <td>{{ $cart['name'] }}</td>
                  <td>Rp {{ number_format($cart['pricesingle'], 2, ',', '.') }}</td>
                  {{-- <td > <input id="qty" name="qty" style="width: 50%;" type="number" value="{{ $cart['qty'] }}"></td> --}}
                  <td>{{ $cart['qty'] }}</td>
                  <td>Rp {{ number_format($cart['price'], 2, ',', '.') }}</td>
                  <td style="display: flex">
                    <form action="{{ route('tambah-qty') }}" method="post">
                      @csrf
                      <input type="hidden" value="{{ $cart['rowId'] }}" name="id">
                      <button type="submit" class="mr-1 btn btn-primary btn-sm" style="padding:7px 10px"><i
                          class="fas fa-plus"></i></button>
                    </form>
                    <form action="{{ route('kurang-qty') }}" method="post">
                      @csrf
                      <input type="hidden" value="{{ $cart['rowId'] }}" name="id">
                      <button type="submit" class="mr-1 btn btn-info btn-sm" style="padding:7px 10px"><i
                          class="fas fa-minus"></i></button>
                    </form>
                    <form action="{{ route('hapus-cart') }}" method="post">
                      @csrf
                      <input type="hidden" value="{{ $cart['rowId'] }}" name="id">
                      <button type="submit" class="mr-1 btn btn-danger btn-sm" style="padding:7px 10px"><i
                          class="fas fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <td colspan="6">
                  <h6 class="text-center mt-3">Keranjang Kosong!</h6>
                </td>
              @endforelse
            </tbody>
          </table>
        </div>
        {{-- akhir table   --}}
        <form action="{{ route('transaksi') }}" method="POST">
          @csrf
          <div class="row gx-3 ">
            <div class="col-5">
              <!-- Main content -->
              <div class="card" style="width: 100%; height: 130px;">
                <div class="card-body">
                  <h2 class="h4" style="font-weight: 500; color: #a2a2a2">Cash</h2>
                  <input required class="form-control form-control-lg" style="font-weight: 600;" type="number"
                    name="tunai" id="tunai" placeholder="Masukan Tunai" aria-label=".form-control-lg example">
                </div>
              </div>
              {{-- akhir card --}}
            </div>
            <div class="col-4">
              <!-- Main content -->
              <div class="card" style="width: 100%; height: 130px;">
                <div class="card-body">
                  <h2 class="h4" style="font-weight: 500; color: #a2a2a2">Kembali</h2>
                  <input class="form-control form-control-lg form-control-plaintext" style="font-weight: 600;"
                    type="number" readonly id="kembalian" name="kembalian" aria-label=".form-control-lg example">
                </div>
              </div>
            </div>
            <div class="col-3">
              <!-- Main content -->
              <button class="btn btn-danger w-100 fw-bold" style="height: 130px; font-size: 30px" id="store"
                type="submit">BAYAR!</button>
              {{-- akhir card --}}
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
    $("#tunai").keyup(function() {
      var tunai = parseInt($("#tunai").val());
      var grand_total = parseInt($("#grand_total").val());

      var kembalian = tunai - grand_total;
      $("#kembalian").val(kembalian);
    })


    $(document).ready(function() {
      $('.js-example-basic-multiple').select2([{
        width: 'resolve'
      }]);
    });
  });

  window.onload = function() {
    jam();
  }

  function jam() {
    var e = document.getElementById('jam'),
      d = new Date(),
      h, m, s;
    h = d.getHours();
    m = set(d.getMinutes());
    s = set(d.getSeconds());

    e.innerHTML = h + ':' + m + ':' + s;

    setTimeout('jam()', 1000);
  }

  function set(e) {
    e = e < 10 ? '0' + e : e;
    return e;
  }
</script>

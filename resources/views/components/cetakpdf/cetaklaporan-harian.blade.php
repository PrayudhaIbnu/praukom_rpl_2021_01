<x-app-layout>
  @section('title')
  Laporan Harian
  @endsection
  <div class="form-group">
    <div class="d-flex align-items-center mb-3 pb-1">
      <img src="/img/logoblud.png" alt="Logo BLUD" class="img" style="width: 4%">
    </div>
    <p class="text-center h2">REKAPITULASI TRANSAKSI HARIAN</p>
    <br>
    <div class="row">
      <label for="staticEmail " class="col-sm-2 col-form-label">Hari/Tgl</label>
      <div class="col-sm-3">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail"
          value="{{ \Carbon\Carbon::now()->format('l, d F Y') }}">
      </div>
      <div class="col-7 ">
        <i class="float-end">*Menampilkan satuan harga dalam Rupiah</i>
      </div>
    </div>

    <h4></h4>
    <table class="static table table-bordered" id="harian-cetak">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Jam</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Qty</th>
          <th scope="col">Harga Jual</th>
          <th scope="col">Harga Beli</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($harian as $h)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $h->jam_jual }}</td>
            <td>{{ $h->nama_produk }}</td>
            <td>{{ $h->qty }}</td>
            <td>{{ $h->sub_total_hrg }}</td>
            <td>{{ $h->laba_bersih }}</td>
          </tr>
        @empty
          <td colspan="6">
            <h6 class="text-center mt-3">Belum ada Transaksi Hari Ini</h6>
          </td>
        @endforelse
        <tr class="table-borderless">
          <td>
          </td>
          <td>
          </td>
          <td>
            <b class="float-end">TOTAL</b>
          </td>
          <td id="sum1"></td>
          <td id="sum2"></td>
          <td id="sum3"></td>
        </tr>
      </tbody>
    </table>
</x-app-layout>
<script type="text/javascript">
  window.print();

  var sum1 = 0;
  var sum2 = 0;
  var sum3 = 0;
  $("#harian-cetak tr").not(':first').not(':last').each(function() {
    sum1 += getnum($(this).find("td:eq(2)").text());
    sum2 += getnum($(this).find("td:eq(3)").text());
    sum3 += getnum($(this).find("td:eq(4)").text());

    function getnum(t) {
      if (isNumeric(t)) {
        return parseInt(t, 10);
      }
      return 0;

      function isNumeric(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
      }
    }
  });
  $("#sum1").text(sum1);
  $("#sum2").text(sum2);
  $("#sum3").text(sum3);
</script>

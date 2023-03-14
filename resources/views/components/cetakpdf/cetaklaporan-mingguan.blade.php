<x-app-layout>
  @section('title')
  Laporan Mingguan
  @endsection
  <div class="form-group align-items-center">
    <div class="d-flex align-items-center mb-3 pb-1">
      <img src="/img/logoblud.png" alt="Logo BLUD" class="img" style="width: 4%">
    </div>
    <p class="text-center h2"><b>REKAPITULASI TRANSAKSI MINGGUAN</b></p>
    <div class="row">
      <label for="staticEmail" class="col-sm-1 col-form-label">Periode</label>
      <div class="col-sm-3">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail"
          value="{{ $tglAwal }} / {{ $tglAkhir }}">
      </div>
      <div class="col-8 ">
        <i class="float-end">*Menampilkan satuan harga dalam Rupiah</i>
      </div>
    </div>

    <h4></h4>
    <table class="static table table-bordered" id="mingguan-cetak">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Kode struk</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Qty</th>
          <th scope="col">Harga Jual</th>
          <th scope="col">Harga Beli</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($mingguan as $m)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $m->tanggal }}</td>
            <td>{{ $m->id_struk }}</td>
            <td>{{ $m->nama_produk }}</td>
            <td>{{ $m->qty }}</td>
            <td>{{ $m->sub_total_hrg }}</td>
            <td>{{ $m->laba_bersih }}</td>
          </tr>
        @endforeach
        <tr class="table-borderless">
          <td>
          </td>
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
  </div>
</x-app-layout>
<script type="text/javascript">
  window.print();

  var sum1 = 0;
  var sum2 = 0;
  var sum3 = 0;
  $("#mingguan-cetak tr").not(':first').not(':last').each(function() {
    sum1 += getnum($(this).find("td:eq(3)").text());
    sum2 += getnum($(this).find("td:eq(4)").text());
    sum3 += getnum($(this).find("td:eq(5)").text());

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

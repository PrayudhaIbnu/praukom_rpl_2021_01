<x-app-layout>
  @section('title')
  Laporan Bulanan
  @endsection
  <div class="form-group align-items-center">
    <div class="d-flex align-items-center mb-3 pb-1">
      <img src="/img/logoblud.png" alt="Logo BLUD" class="img" style="width: 4%">
    </div>
    <p class="text-center h2"><b>REKAPITULASI TRANSAKSI BULANAN</b></p>
    <div class="row">
      <label for="staticEmail" class="col-sm-1 col-form-label">Periode</label>
      <div class="col-sm-3">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail"
          value="{{ $tglBulanan }} / {{ $tglBulanan2 }}">
      </div>
      <div class="col-7 ">
        <i class="float-end">*Menampilkan satuan harga dalam Rupiah</i>
      </div>
    </div>

    <h4></h4>
    <table class="static table table-bordered" id="bulanan-cetak">
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
        @foreach ($bulanan as $b)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $b->tanggal }}</td>
            <td>{{ $b->id_struk }}</td>
            <td>{{ $b->nama_produk }}</td>
            <td>{{ $b->qty }}</td>
            <td>{{ $b->sub_total_hrg }}</td>
            <td>{{ $b->laba_bersih }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-app-layout>
<script type="text/javascript">
  window.print();

  var sum1 = 0;
  var sum2 = 0;
  var sum3 = 0;
  $("#bulanan-cetak tr").not(':first').not(':last').each(function() {
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

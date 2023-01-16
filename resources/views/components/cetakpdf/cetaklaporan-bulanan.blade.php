<x-app-layout>
  <div class="form-group align-items-center">
    <div class="d-flex align-items-center mb-3 pb-1">
      <img src="/img/logoblud.png" alt="Logo BLUD" class="img" style="width: 4%">
    </div>
    <p class="text-center h2"><b>REKAPITULASI TRANSAKSI BULANAN</b></p>
    <div class="row">
      <label for="staticEmail" class="col-sm-1 col-form-label">Bulan Ke</label>
      <div class="col-sm-3">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" {{-- value="{{ $getBulanan }}" --}}>
      </div>
    </div>

    <h4></h4>
    <table class="static table table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Kode Faktur</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Qty</th>
          <th scope="col">Hartga Jual</th>
          <th scope="col">Harga Beli</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($bulanan as $b)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $b->tanggal }}</td>
            <td>{{ $b->id_faktur }}</td>
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
</script>

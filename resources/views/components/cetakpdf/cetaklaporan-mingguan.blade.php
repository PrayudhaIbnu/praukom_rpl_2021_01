<x-app-layout>
  <div class="form-group align-items-center">
    <p class="text-center h2"><b>REKAPITULASI TRANSAKSI MINGGUAN</b></p>
    <div class="row">
      <label for="staticEmail" class="col-sm-1 col-form-label">Periode</label>
      <div class="col-sm-3">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail"
          value="{{ $tglAwal }} / {{ $tglAkhir }}">
      </div>
    </div>

    <h4></h4>
    <table class="static table table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Jam</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Laba Kotor</th>
          <th scope="col">Laba Bersih</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($mingguan as $m)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $m->tanggal }}</td>
            <td>{{ $m->id_faktur }}</td>
            <td>{{ $m->nama_produk }}</td>
            <td>{{ $m->sub_total_hrg }}</td>
            <td>{{ $m->laba_bersih }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-app-layout>
<script type="text/javascript">
  window.print();
</script>

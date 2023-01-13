<div class="float-start">
  <h2 class="h3">Today, {{ date('j F Y') }}</h2>
</div>
<div class="float-end"><a href="{{ route('cetak-harian') }}">
    <button class="btn btn-warning btn-sm"> Download <i class="fas fa-cloud-download"></i></button></a>
</div>
<div class="table-responsive-xl">
  <table class="table mt-3 table-borderless " id="harian">
    <thead class="table-warning">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Jam</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Qty</th>
        <th scope="col">Laba Kotor</th>
        <th scope="col">Laba Bersih</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($harian as $h)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $h->jam_jual }}</td>
          <td>{{ $h->nama_produk }}</td>
          <td>{{ $h->qty }}</td>
          <td>{{ $h->sub_total_hrg }} </td>
          <td>{{ $h->laba_bersih }}</td>
        </tr>
      @empty
        <td colspan="6">
          <h6 class="text-center mt-3">Belum ada Transaksi Hari Ini</h6>
        </td>
      @endforelse
      <tr>
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

<div class="row">
  <p><i>*Menampilkan transaksi pada bulan <b>{{ \Carbon\Carbon::now()->format('F') }}</b></i></p>
  <div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
          Atur Tanggal Cetak Laporan
        </button>
      </h2>
      <form action="{{ route('atur-tanggal') }}" method="post">
        @csrf
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <div class="row ">
              <div class="col mb-1">
                <label for="tglawal" name="tglawal" class="form-label font-weight-normal">Tanggal
                  Awal Cetak</label>
                <div class="input-group date" id="datepicker">
                  <input type="date" required class="form-control" id="date" name="tglawal" />
                </div>
              </div>
            </div>
            <button type="submit" class="w-100 mt-1 btn btn-warning btn-sm">Download <i
                class="fas fa-cloud-download"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>

<div class="table-responsive-xl">
  <table class="table mt-3 table-borderless " id="mingguan">
    <thead class="table-warning">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Kode Faktur</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Qty</th>
        <th scope="col">Harga Jual</th>
        <th scope="col">Harga Beli</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($mingguan as $m)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $m->tanggal }}</td>
          <td>{{ $m->id_faktur }}</td>
          <td>{{ $m->nama_produk }}</td>
          <td>{{ $m->qty }}</td>
          <td>{{ $m->sub_total_hrg }}</td>
          <td>{{ $m->laba_bersih }}</td>
        </tr>
      @empty
        <td colspan="6">
          <h6 class="text-center mt-3">Belum ada Transaksi Minggu Ini</h6>
        </td>
      @endforelse
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><b class="float-end">TOTAL</b> </td>
        <td id="sum4"></td>
        <td id="sum5"></td>
        <td id="sum6"></td>
      </tr>

    </tbody>
  </table>
</div>

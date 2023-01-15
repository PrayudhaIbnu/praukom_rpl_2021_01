<div class="row">

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
                  Awal </label>
                <div class="input-group date" id="datepicker">
                  <input type="date" class="form-control" id="date" name="tglawal" />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col mb-1">
                <label for="tglakhir" name="tglakhir" class="form-label font-weight-normal">Tanggal
                  Akhir</label>
                <div class="input-group date" id="datepicker">
                  <input type="date" class="form-control" id="date" name="tglakhir" />
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
  <table class="table mt-3 table-borderless ">
    <thead class="table-warning">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Laba Kotor</th>
        <th scope="col">Laba Bersih</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($mingguan as $m)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $m->tanggal }}</td>
          <td>{{ $m->id_faktur }}</td>
          <td>{{ $m->grand_total }}</td>
          <td>{{ $m->grand_bersih }}</td>
        </tr>
      @empty
        <td colspan="6">
          <h6 class="text-center mt-3">Belum ada Transaksi Hari Ini</h6>
        </td>
      @endforelse
    </tbody>
  </table>
</div>

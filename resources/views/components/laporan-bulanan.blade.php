<div class="row">

  <p><i>*Menampilkan transaksi pada tahun <b>
        {{ date('Y') }}</b></i></p>
  <div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed bg-white" type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
          Atur Tanggal Cetak Laporan
        </button>
      </h2>
      <form action="{{ route('atur-tanggal-bulanan') }}" method="post">
        @csrf
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <div class="row ">
              <div class="col mb-1">
                <label for="tglawal" name="tglawal" class="form-label font-weight-normal">Tanggal Awal Cetak</label>
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

<div class="table-responsive-xl mt-3">
  <table class="table mt-3 table-borderless" id="bulanan">
    <thead class="table-warning">
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
@include('sweetalert::alert')

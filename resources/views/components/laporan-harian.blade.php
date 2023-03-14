{{-- <form action="{{ route('cetak-harian') }}" method="post">
  <input type="date" required class="form-control" id="date" name="tgl" />
  <div class="">
    <button class="btn btn-warning btn-sm w-100"> Download <i class="fas fa-cloud-download"></i></button>
  </div>
</form> --}}

<div class="row">
  <div class="col">
    <h4 class="">Today, {{ date('j F Y') }}</h4>

    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button collapsed bg-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Atur Tanggal Cetak Laporan
          </button>
        </h2>
        <form action="{{ route('cetak-harian') }}" method="post">
          @csrf
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <div class="row ">
                <div class="col mb-1">
                  <label for="date" class="form-label font-weight-normal">Pilih Tanggal Cetak</label>
                  <div class="input-group date" id="datepicker">
                    <input type="date" required class="form-control" id="date" name="tgl" />
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
</div>
<div class="table-responsive-xl mt-3">
  <table class="table mt-3 table-borderless " id="harian">
    <thead class="table-warning">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Jam</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Qty</th>
        <th scope="col">Harga Jual</th>
        <th scope="col">Harga Beli</th>
      </tr>
    </thead>
    @foreach ($harian as $h)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $h->jam_jual }}</td>
        <td>{{ $h->nama_produk }}</td>
        <td>{{ $h->qty }}</td>
        <td>{{ $h->sub_total_hrg }} </td>
        <td>{{ $h->laba_bersih }}</td>
      </tr>
    @endforeach
  </table>
</div>

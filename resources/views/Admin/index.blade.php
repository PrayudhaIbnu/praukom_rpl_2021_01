<x-app-layout>
    <x-dashboard-admin />
    {{-- Dashboard Admin dan Pengawas --}}
{{-- tilte --}}
@section('title')
Dashboard
@endsection
{{-- end title --}}

{{-- CONTENT --}}
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div>
    </div>
  </div>
</div>
<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row gx-3">
      <div class="col-4">
        <div class="card ">
          <div class="card-body">
            <h5 class="h3">{{ $totalProduk[0]->total }}</h5>
            <p class="card-text">Total Produk</p>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card ">
          <div class="card-body">
            <h5 class="h3">
              {{ $totalStokProduk[0]->total }}
            </h5>
            <p class="card-text">Total Stok Produk</p>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card ">
          <div class="card-body">
            <h5 class="h3">
              {{ $totalSupplier[0]->total }}
            </h5>
            <p class="card-text">Total Supplier</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card" style="overflow-y: scroll; height:95%; ">
          <h6 class="fw-lighter text-center p-2">Daftar Stok Produk yang Hampir Habis</h6>
          <table class="table">
            <thead class="sticky-top table-warning">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Stok</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($leastStock as $l)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $l->nama_produk }}</td>
                  <td>{{ $l->stok }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="col ">
        <div class="card" style="overflow-y: scroll; height:95%; ">
          <h6 class="fw-lighter text-center p-2">Daftar Produk yang Paling sedikit Terjual</h6>
          <table class="table">
            <thead class="sticky-top table-warning">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Terjual</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($leastSell as $l)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $l->nama_produk }}</td>
                  <td>{{ $l->terjual }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row gx-3">
      <div class="col-md-8">
        <div class="card" style="overflow-y: scroll; height:100%; ">
          <h6 class="fw-lighter text-center p-2">Daftar Produk yang Hampir Kadaluarsa</h6>
          <table class="table">
            <thead class="sticky-top table-warning">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Supplier</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Tanggal Exp</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($expiredProduct as $e)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $e->nama_produk }}</td>
                  <td>{{ $e->nama_supplier }}</td>
                  <td>{{ $e->tanggal_masuk }}</td>
                  <td>{{ $e->tanggal_exp }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="card p-2">
          <h6 class="fw-bold text-center p-2">Top 5 Produk Terlaris</h6>
          <canvas id="produkTerlaris" style="height:400px;"></canvas>
        </div>
      </div>
    </div>
    <div class="row pt-3">
      <div class="col-12 container ">
        {{-- <div class="card">
            <h6 class="fw-bold text-center p-2">Top 5 Produk Terlaris</h6>
            <canvas id="grafikBulanan" class="p-2" style="height: 400px;"></canvas>
          </div> --}}
      </div>
    </div>
  </div>
</div>
</div>
@include('sweetalert::alert')
<script>
// CHART JS PINDAH SINI...

var labels = [
  @foreach ($bestSell as $b)
    '{{ $b->nama_produk }}',
  @endforeach
];
var product = [
  @foreach ($bestSell as $b)
    '{{ $b->terjual }}',
  @endforeach
];
const data = {
  labels: labels,
  datasets: [{
    label: "My First dataset",
    backgroundColor: ["#E53945", "#52499C", "#00798C", "#EDAD49"],
    borderColor: ["#E53945", "#52499C", "#00798C", "#EDAD49"],
    fill: false,
    data: product,
  }, ],
};

const config = {
  type: "pie",
  data: data,
  options: {},
};

const myChart = new Chart(document.getElementById("produkTerlaris"), config);
</script>

</x-app-layout>
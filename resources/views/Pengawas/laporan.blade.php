<x-app-layout>
  <x-dashboard-pengawas />
  @section('title')
  Laporan
  @endsection
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="mb-2">Laporan</h1>
          </div>
        </div>
        <div class="container-fluid-6">
          <div class="float-start w-100">
            <ul class="nav nav-pills my-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active btn-sm" id="pills-harian-tab" data-bs-toggle="pill"
                  data-bs-target="#pills-harian" type="button" role="tab" aria-controls="pills-harian"
                  aria-selected="false">Harian</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link btn-sm" id="pills-migguan-tab" data-bs-toggle="pill" data-bs-target="#pills-mingguan"
                  type="button" role="tab" aria-controls="pills-mingguan" aria-selected="false">Mingguan</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link btn-sm" id="pills-bulanan-tab" data-bs-toggle="pill" data-bs-target="#pills-bulanan"
                  type="button" role="tab" aria-controls="pills-bulanan" aria-selected="false">Bulanan</button>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-harian" role="tabpanel"
                aria-labelledby="pills-harian-tab" tabindex="0">
                @include('components.laporan-harian')
              </div>
              <div class="tab-pane fade" id="pills-mingguan" role="tabpanel" aria-labelledby="pills-mingguan-tab"
                tabindex="0">@include('components.laporan-mingguan')</div>
              <div class="tab-pane fade" id="pills-bulanan" role="tabpanel" aria-labelledby="pills-bulanan-tab"
                tabindex="0">@include('components.laporan-bulanan')</div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</x-app-layout>

<script>
  // SUM Kolom
  var sum1 = 0;
  var sum2 = 0;
  var sum3 = 0;
  var sum4 = 0;
  var sum5 = 0;
  var sum6 = 0;
  $("#harian tr").not(':first').not(':last').each(function() {
    sum1 += getnum($(this).find("td:eq(2)").text());
    sum2 += getnum($(this).find("td:eq(3)").text());
    sum3 += getnum($(this).find("td:eq(4)").text());

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

  $("#mingguan tr").not(':first').not(':last').each(function() {
    sum4 += getnum($(this).find("td:eq(3)").text());
    sum5 += getnum($(this).find("td:eq(4)").text());
    sum6 += getnum($(this).find("td:eq(5)").text());

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
  $("#sum4").text(sum4);
  $("#sum5").text(sum5);
  $("#sum6").text(sum6);
</script>

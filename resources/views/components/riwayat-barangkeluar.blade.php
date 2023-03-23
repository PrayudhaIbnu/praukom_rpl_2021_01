<x-app-layout>
  <x-menu-navigasi />
  {{-- tilte --}}
  @section('title')
    Riwayat Barang Keluar
  @endsection
  {{-- end title --}}
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Riwayat Barang Keluar</h1>
          </div>
          <!-- /.col search -->
          {{-- <div class="col-sm-6">
            <form action="" method="GET">
              <div class="input-group">
                <input class="form-control" name="search" id="search-input" type="text" placeholder="Search"
                  autocomplete="off">
                <div class="input-group-append">
                  <button class="btn btn-warning" type="submit">
                    <i class="fas fa-search fa-fw"></i>
                  </button>
                </div>
              </div>
            </form>
          </div> --}}
        </div>
        <div class="container-fluid-6">
          <div class="table-responsive-lg mt-4">
            <table class="table mt-4 table-borderless " id="barang_keluar">
              <thead class="table-warning">

                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col">Jumlah Keluar</th>
                  <th scope="col">Tanggal Keluar</th>
                  <th scope="col">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($brg_keluar as $key => $item)
                  <tr>
                    <td>{{ $brg_keluar->firstItem() + $key }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->tanggal_keluar }}</td>
                    <td>{{ $item->keterangan }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div>
              {{-- {{ $brg_keluar->links() }} --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>

<script>
  // data table
  $(document).ready(function() {
    responsive: true,
    $('#barang_keluar').DataTable({
      "language": {
        "emptyTable": "Tidak ada Barang Keluar"
      }
    });
  });
</script>

<x-app-layout>
  <x-menu-navigasi />
  {{-- tilte --}}
@section('title')
  Riwayat Barang Masuk
@endsection
{{-- end title --}}
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Riwayat Barang Masuk</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
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
          </div>
        </div>
        <div class="container-fluid-6">
          <div class="table-responsive-lg">
            <table class="table mt-4 table-borderless ">
              <thead class="table-warning">
                
                <tr>                
                  <th scope="col">No</th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col">Jumlah Masuk</th>
                  <th scope="col">Tanggal Masuk</th>
                  <th scope="col">Tanggal Expired</th>
                  <th scope="col">Supplier</th>
                </tr>
              </thead>
              <tbody>
                {{-- ($collection as $item) --}}
                    
        
                @forelse  ($brg_masuk as $key => $item)
                <tr>
                  <td>{{ $brg_masuk->firstItem()+$key }}</td>
                  <td>{{ $item->nama_produk }}</td>
                  <td>{{ $item->qty }}</td>
                  <td id="s">{{ $item->tanggal_masuk }}</td>
                  <td>{{ $item->tanggal_exp }}</td>
                  <td>{{ $item->nama_supplier }}</td>
                </tr>
                @empty
                <td colspan="6">
                  <h6 class="text-center mt-3 opacity-50">Tidak ada data.</h6>
                </td>
                @endforelse
              </tbody>       
            </table>
            <div>
              {{ $brg_masuk->links() }}
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
  
</x-app-layout>
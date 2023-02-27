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
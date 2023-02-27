<div class="table-responsive-lg">
    <table class="table mt-4 table-borderless ">
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
        @forelse ($brg_keluar as $key => $item)
        <tr>
          <td>{{ $brg_keluar->firstItem()+$key }}</td>
          <td>{{ $item->nama_produk }}</td>
          <td>{{ $item->qty }}</td>
          <td id='s'>{{ $item->tanggal_keluar }}</td>
          <td>{{ $item->keterangan }}</td>
        </tr>
        @empty
        <td colspan="6">
          <h6 class="text-center mt-3 opacity-50">Tidak ada data.</h6>
        </td>
      @endforelse
      </tbody>       
    </table>
    <div>
      {{ $brg_keluar->links() }}
    </div>
  </div> 
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
        @foreach ($brg_keluar as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->nama_produk }}</td>
          <td>{{ $item->qty }}</td>
          <td>{{ $item->tanggal_keluar }}</td>
          <td>{{ $item->keterangan }}</td>
        </tr>
        @endforeach
      </tbody>       
    </table>
    <div>
      {{ $brg_keluar->withQueryString()->links() }}
    </div>
  </div> 
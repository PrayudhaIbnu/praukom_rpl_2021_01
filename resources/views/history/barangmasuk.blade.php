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
        @foreach ($brg_masuk as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->nama_produk }}</td>
          <td>{{ $item->qty }}</td>
          <td>{{ $item->tanggal_masuk }}</td>
          <td>{{ $item->tanggal_exp }}</td>
          <td>{{ $item->nama_supplier }}</td>
        </tr>
        @endforeach
      </tbody>       
    </table>
    <div>
      {{ $brg_masuk->withQueryString()->links() }}
    </div>
  </div> 
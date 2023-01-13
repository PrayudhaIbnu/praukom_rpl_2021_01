<x-app-layout>
  <x-dashboard-admin /> 
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="card w-50 m-auto">
            <form method="POST" action="{{ url('/admin/tambah-kategori') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-1">
                            <label for="kategori" class="form-label font-weight-normal">Tambah Kategori :</label>
                            <input autocomplete="off" required  name="nama_kategori" id="kategori" class="form-control form-control-sm" type="text"
                            aria-label=".form-control-sm example">
                            <button type="submit" class="mt-3 float-end btn btn-primary rounded-3 btn-sm pl-3 pr-3">Tambah</button>
                            <button type="button" class="mt-3 mr-3 float-end btn btn-secondary rounded-3 btn-sm pl-3 pr-3" data-dismiss="modal"><a href="{{ route('produk') }}" style="color: rgb(255, 255, 255)">Kembali</a></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <div class="card w-50 m-auto">
          <table class="table">
            <thead class="table-warning">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Produk Kategori</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kategori as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kategori_produk }}</td>
                <td>
                  <button type="button" value="{{ $item->id_kategori }}" class="btn btn-edit btn-primary" data-bs-toggle="modal" >
                    <i class="fa-solid fa-pen-to-square"></i>
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div> 
      </div>
    </div>
</div>


{{-- modal edit --}}
<div class="modal fade" id="editkategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Perbarui Kategori</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('/admin/update-kategori') }}" method="POST" >
        @csrf
        @method('PUT')
        <input type="hidden" name="kategori_id" id="kategori_id">
        <div class="modal-body">
          <div class="row align-items-start">
            <div class="col mb-3">
              <label for="namauser" class="form-label font-weight-normal">Nama Kategori</label>
              <input required name="nama_kategori" id="nama_kategori" class="form-control form-control-sm" type="text"
                aria-label=".form-control-sm example">
            </div>
            <div class="modal-footer-noline">
              <button type="submit" class="btn btn-primary btn-simpan float-end mt-2">Perbarui</button>
              <button type="button" class="btn btn-secondary float-end mt-2 mr-3" data-bs-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>  
      </form>
    </div>
  </div>
</div>
{{-- end modal edit --}}
  @include('sweetalert::alert')
</x-app-layout>
<script>
      $(document).on('click', '.btn-edit', function() {
      var kategori_id = $(this).val();
      $.ajax({
        type: "GET",
        url: "edit-kategori/" + kategori_id,
        dataType: "json",
        success: function(response) {
          console.log(response);
          $('#editkategori').modal('show');
          $('#kategori_id').val(response.kategori.id_kategori);
          $('#nama_kategori').val(response.kategori.kategori_produk);
        }
      })
    });

</script>


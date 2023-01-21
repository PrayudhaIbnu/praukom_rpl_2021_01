<x-app-layout>
  <x-dashboard-admin />
  {{-- tilte --}}
  @section('title')
    Daftar Supplier
  @endsection
  {{-- end title --}}
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Supplier</h1>
          </div>
          <!-- /.col -->
          <div class="row col-sm-6">
            <div class="input-group">
              <input class="form-control" id="search-input" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="float-end">
            <div class="dropdown mb-2 mt-4">
              <button class="btn btn-success rounded-3 btn" data-toggle="modal" data-target="#tambahsupplier">+
                Tambah Supplier</button>
            </div>
          </div>
          @if (count($errors) > 0)
            <br><br><br>
            <div class="alert alert-dismissible fade show alert-danger" role="alert">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
          @endif
          <div class="table-responsive-xl">
            <table class="table mt-4 table-borderless ">
              <thead class="table-warning">
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Nama Supplier</th>
                  <th scope="col" style="width: 450px;">Alamat Supplier</th>
                  <th scope="col">No. Telp</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($data as $d)
                  <tr>
                    <th style="vertical-align: middle" scope="row">{{ $loop->iteration }}</th>
                    <td style="vertical-align: middle">
                      <img id="foto_supplier" src="{{ asset('storage/post-images/' . $d->foto_supplier) }}"
                        alt="" style="width: 100px">
                    </td>
                    </td>
                    <td id="s"style="vertical-align: middle">{{ $d->nama_supplier }}</td>
                    <td style="vertical-align: middle">{{ $d->alamat_supplier }}</td>
                    <td style="vertical-align: middle">{{ $d->telp_supplier }}</td>
                    <td style="vertical-align: middle">
                      <a href="supplier/detail/{{ $d->id_supplier }}">
                        <button class="btn btn-detail btn-warning"><i class="fa-solid fa-info"></i></button>
                      </a>
                      <button class="btn btn-edit btn-primary" value="{{ $d->id_supplier }}"><i
                          class="fa-solid fa-pen-to-square"></i></button>
                      <button class="btn btn-hapus btn-danger" value="{{ $d->id_supplier }}"><i
                          class="fa-solid fa-trash"></i></button>
                    </td>
                  </tr>
                @empty
                  <td colspan="6">
                    <h6 class="text-center mt-3">Belum ada Transaksi Hari Ini</h6>
                  </td>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')


  <!-- modal tambah -->
  <div class="modal fade" id="tambahsupplier" tabindex="-1" aria-labelledby="tambahsupplier" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="tambahsupplier">Tambah Supplier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ url('tambah-supplier') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row align-items-start">
              <div class="col mb-3">
                <label for="foto_supplier" class="form-label font-weight-normal">Foto Supplier</label>
                <input name="foto_supplier" id="foto_supplier" class="form-control form-control-sm" type="file"
                  accept="image/*">

              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-3">
                <label for="nama_supplier" class="form-label font-weight-normal">Nama Supplier</label>
                <input required name="nama_supplier" id="nama" class="form-control form-control-sm" type="text"
                  aria-label=".form-control-sm example">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-2">
                <label for="telp_supplier" class="form-label font-weight-normal">No. Telp</label>
                <input required name="telp_supplier" id="telp_supplier" class="form-control form-control-sm"
                  type="text" aria-label=".form-control-sm example">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-2">
                <label for="alamat_supplier" name="alamat_supplier"
                  class="form-label font-weight-normal">Alamat</label>
                <textarea class="form-control" name="alamat_supplier" id="alamat_supplier" rows="4"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary rounded-3 btn-sm pl-3 pr-3"
              data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary rounded-3 btn-sm pl-3 pr-3">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- modal edit -->
  <div class="modal fade" id="editsupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ url('update-supplier') }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" id="supplier_id" name="supplier_id">
          <div class="modal-body">
            <div class="row align-items-start">
              <div class="col mb-3">
                <label for="foto_supplier" class="form-label font-weight-normal">Foto Supplier</label>
                <input name="foto_supplier" class="form-control form-control-sm" type="file" accept="image/*">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-3">
                <label for="nama_supplier" class="form-label font-weight-normal">Nama Supplier</label>
                <input required name="nama_supplier" id="nama_spr" class="form-control form-control-sm"
                  type="text" aria-label=".form-control-sm example">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-2">
                <label for="telp_supplier" class="form-label font-weight-normal">No. Telp</label>
                <input required name="telp_supplier" id="telp_spr" class="form-control form-control-sm"
                  type="number" aria-label=".form-control-sm example">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-2">
                <label for="alamat_supplier" class="form-label font-weight-normal">Alamat</label>
                <textarea class="form-control" name="alamat_supplier" id="alamat_spr" rows="4"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary rounded-3 btn-sm pl-3 pr-3"
              data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary rounded-3 btn-sm pl-3 pr-3">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- akhir modal edit --}}

  <div class="modal fade" id="deletesupplier" tabindex="-1" aria-labelledby="hapussupplier" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content text-center">
        <div class="modal-header flex-column">
          <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
          <h4 class="modal-title w-100">Apakah Anda yakin?</h4>
        </div>
        <div class="modal-body">
          <p>Apakah Anda benar-benar ingin menghapus? Anda tidak akan dapat mengembalikan ini! </p>
        </div>
        <form method="POST" action="{{ url('delete-supplier') }}" enctype="multipart/form-data">
          @csrf
          @method('DELETE')
          <input type="hidden" id="delete_id" name="delete_supplier_id">
          <div class="modal-footer ">
            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-danger ">Iya</button>
          </div>
      </div>
    </div>
  </div>

</x-app-layout>

<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(document).ready(function() {
    // edit pop up 
    $(document).on('click', '.btn-edit', function() {
      var supplier_id = $(this).val();
      // console.log(supplier_id);
      $.ajax({
        type: "GET",
        url: "edit-supplier/" + supplier_id,
        dataType: "json",
        success: function(response) {
          console.log(response);
          $('#editsupplier').modal('show');
          $('#supplier_id').val(supplier_id);
          $('#foto_supplier').val(response.supplier.foto_supplier);
          // $('#foto').html(
          //   `<img src="/storage /post-images/${response.supplier.foto_supplier}" width="100" class="img-fluid img-thumbnail">`
          // );
          $('#nama_spr').val(response.supplier.nama_supplier);
          $('#telp_spr').val(response.supplier.telp_supplier);
          $('#alamat_spr').val(response.supplier.alamat_supplier);
        }
      })
    });

    // delete
    $('.btn-hapus').on('click', function() {
      // alert('aku');
      var supplier_id = $(this).val();
      $('#deletesupplier').modal('show');
      $('#delete_id').val(supplier_id);
    });
  });
</script>

<x-app-layout>
  <x-menu-navigasi />
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
          <div class="float-end">
            <button type="button" class="btn btn-success my-2 btn-sm" data-toggle="modal"
              data-target="#tambahsupplier">Tambah Supplier</button>
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
                  <th scope="col">Nama Supplier</th>
                  <th scope="col">Alamat Supplier</th>
                  <th scope="col">No. Telp</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($data as $d)
                  <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td scope="row" id="s">{{ $d->nama_supplier }}</td>
                    <td scope="row">{{ $d->alamat_supplier }}</td>
                    <td scope="row">{{ $d->telp_supplier }}</td>
                    <td scope="row">
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
                    <h6 class="text-center mt-3 opacity-50">TIDAK ADA SUPPLIER</h6>
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
  @include('Admin.modal-daftarsupplier')
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

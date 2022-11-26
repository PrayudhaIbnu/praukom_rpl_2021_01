<x-app-layout>
  <x-dashboard-super-admin />

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Kelola Akun</h1>
          </div>
          <!-- /.col -->
          <div class="row col-sm-6">
            {{-- Search --}}
            <div class="input-group">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
            {{-- End Search --}}
          </div>
        </div>
        <div class="container-fluid-6">
          <div class="float-start">
            {{-- alert --}}
            @if (session('success_message'))
              <div class="alert alert-success">
                {{ session('success_message') }}
              </div>
            @endif

            {{-- End allert --}}
          </div>
          <!-- Button  modal -->
          <div class="float-end">
            <button type="button" class="btn btn-success my-3 btn-sm" data-toggle="modal" data-target="#tambahuser">
              Tambah User</button>
          </div>
          {{-- End button modal --}}

          {{-- TABEL --}}
          <table class="table table-hover mt-4 ">
            <thead class="table-warning">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama User</th>
                <th scope="col">Role</th>
                <th scope="col">Username</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($user as $item)
                <tr>
                  <th> {{ $loop->iteration }}</th>
                  <th>
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="" style="width: 100px">
                  </th>
                  <th>{{ $item->nama }}</th>
                  <th>{{ $item->nama_level }}</th>
                  <th>{{ $item->username }}</th>

                  <td>
                    <button class="btn btn-edit btn-primary" data-toggle="modal" data-target="#edituser"><i
                        class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-hapus btn-danger"><i class="fa-solid fa-trash"></i></button>

                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{-- End Table --}}
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Tambah User -->
  <div class="modal fade" id="tambahuser" tabindex="-1" aria-labelledby="tambahuserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="tambahuserLabel">Tambah User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ url('tambah-user') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row align-items-start">
              <div class="col mb-3">
                <label for="foto" class="form-label font-weight-normal">Foto User</label>
                <input required name="foto" class="form-control form-control-sm" id="foto" type="file">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-3">
                <label for="namauser" class="form-label font-weight-normal">Nama User</label>
                <input required name="nama" class="form-control form-control-sm" type="text"
                  id="namauser"aria-label=".form-control-sm example">
              </div>
              <div class="col mb-3">
                <label for="role" class="form-label font-weight-normal">Sebagai</label>
                <select name="id_level" class="form-select" id="role" aria-label="Default select example">
                  @foreach ($level_user as $item)
                    <option value="{{ $item->id_level }}">{{ $item->nama_level }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row align-items-end">
              <div class="col mb-2">
                <label for="username" class="form-label font-weight-normal">Username</label>
                <input required name="username" class="form-control form-control-sm" type="text"
                  id="username"aria-label=".form-control-sm example">
              </div>
              <div class="col mb-2">
                <label for="password" class="form-label font-weight-normal">Password</label>
                <input required name="password" class="form-control form-control-sm" type="password"
                  id="password"aria-label=".form-control-sm example">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Modal Tambah User -->

  <!-- Modal Edit User -->
  <div class="modal fade" id="edituser" tabindex="-1" aria-labelledby="edituserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="edituserLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ url('edit-user') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row align-items-start">
              <div class="col mb-3">
                <label for="foto" class="form-label font-weight-normal">Foto User</label>
                <input value="" required name="foto" class="form-control form-control-sm" id="foto"
                  type="file">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-3">
                <label for="namauser" class="form-label font-weight-normal">Nama User</label>
                <input required name="nama" class="form-control form-control-sm" type="text" id="namauser"
                  aria-label=".form-control-sm example">
              </div>
              <div class="col mb-3">
                <label for="role" class="form-label font-weight-normal">Sebagai</label>
                <select name="id_level" class="form-select" id="role" aria-label="Default select example">
                  @foreach ($level_user as $item)
                    <option value="{{ $item->id_level }}">{{ $item->nama_level }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row align-items-end">
              <div class="col mb-2">
                <label for="username" class="form-label font-weight-normal">Username</label>
                <input required name="username" class="form-control form-control-sm" type="text"
                  id="username"aria-label=".form-control-sm example">
              </div>
              <div class="col mb-2">
                <label for="password" class="form-label font-weight-normal">Password</label>
                <input required name="password" class="form-control form-control-sm" type="password"
                  id="password"aria-label=".form-control-sm example">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @include('sweetalert::alert')
  <!-- End Modal Edit User -->

</x-app-layout>

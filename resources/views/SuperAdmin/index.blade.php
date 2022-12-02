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
            {{-- <form action="/superadmin/kelolaakun/search" method="GET"> --}}
            <div class="input-group">
              <input class="form-control" name="search" id="search-input" type="text" placeholder="Search"
                autocomplete="off">
              <div class="input-group-append">
                <button class="btn btn-info" type="submit">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
            {{-- </form> --}}

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
            <button type="button" class="btn btn-success my-3 btn-sm" data-bs-toggle="modal"
              data-bs-target="#tambahuser">
              Tambah User
            </button>
          </div>
          {{-- End button modal --}}

          {{-- TABEL --}}
          <table class="table table-hover mt-4 ">
            <thead class="table-warning" style="vertical-align: middle;">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama User</th>
                <th scope="col">Role</th>
                <th scope="col">Username</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            @foreach ($user as $item)
              <tr style="vertical-align: middle;">
                <td> {{ $loop->iteration }}</td>
                <td>
                  <img id="gambar" src="{{ asset('storage/post-images/' . $item->foto) }}" alt=""
                    style="width: 100px">
                </td>
                <td id="s">{{ $item->nama }}</td>
                <td>{{ $item->nama_level }}</td>
                <td>{{ $item->username }}</td>
                <td>
                  <button type="button" value="{{ $item->id_user }}" class="btn btn-edit btn-primary"><i
                      class="fa-solid fa-pen-to-square"></i></button>
                  <button type="button" value="{{ $item->id_user }}" class="btn btn-hapus btn-danger"><i
                      class="fa-solid fa-trash"></i></button>
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
  @include('SuperAdmin.modal')
  @include('sweetalert::alert')
</x-app-layout>
@include('SuperAdmin.script')

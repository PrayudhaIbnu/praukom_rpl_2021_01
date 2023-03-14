<x-app-layout>
  <x-dashboard-super-admin />
  {{-- tilte --}}
  @section('title')
    Kelola Akun
  @endsection
  {{-- end title --}}
  @php
  if (count($errors) > 0) {
    alert()->error('Gagal', ($errors->all()));
  }
  @endphp
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Kelola Akun</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            {{-- Search --}}
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
          {{-- End Search --}}
        </div>
      </div>
      <!-- Button  modal -->
      <div class="container-fluid">
        <div class="float-end">
          <button type="button" class="btn btn-success my-2 btn-sm" data-bs-toggle="modal"
            data-bs-target="#tambahuser">
            Tambah User
          </button>
        </div>
      </div>
      {{-- End button modal --}}
      <div class="container-fluid">

        {{-- TABEL --}}
        <div class="table-responsive-xl">
          <table class="table table-hover mt-2 table-borderless ">
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
              @foreach ($user as $key => $item)
                <tr>
                  <td> {{ $user->firstItem()+$key }}</td>
                  <td>
                    @if ($item->foto)
                      <img style="object-fit: cover;width:90px;height:90px;" class="img img-circle" id="gambar" src="{{ asset('storage/post-images/' . $item->foto) }}"
                      style="width: 100px">
                    @else
                      <img src="/img/user.jpg" style="object-fit: cover;width:90px;height:90px;" class="img img-circle">
                    @endif
                  </td>
                  <td id="s">{{ $item->nama }}</td>
                  <td>{{ $item->nama_level }}</td>
                  <td>{{ $item->username }}</td>
                  <td>
                    <button type="button" value="{{ $item->id_user }}" class="btn btn-edit btn-primary"><i
                        class="fa-solid fa-pen-to-square"></i></button>
                    <button type="button" value="{{ $item->id_user }}" class="btn btn-password btn-info"><i
                        class="fa-solid fa-key"></i></button>
                    <button type="button" value="{{ $item->id_user }}" class="btn btn-hapus btn-danger"><i
                        class="fa-solid fa-trash"></i></button>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        {{-- End Table --}}
      </div>
      {{-- pagination --}}
      <div class="container-fluid">
        <div class="float-right">
          {{ $user->links() }}
        </div>
        <div>
          showing
          {{ $user->firstItem() }}
          to
          {{ $user->lastItem() }}
          of
          {{ $user->total() }}
       </div>
      </div>


    </div>
  </div>
  @include('SuperAdmin.modal')
  @include('sweetalert::alert')

</x-app-layout>
@include('SuperAdmin.script')

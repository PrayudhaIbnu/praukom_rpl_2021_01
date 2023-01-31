<x-app-layout>
  <x-dashboard-super-admin />
  {{-- tilte --}}
  @section('title')
    Edit Profil
  @endsection
  {{-- end title --}}
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="mb-6">Kelola Akun</h1>
        <div class="card w-50 m-auto bg-transparent shadow-none">
          <form method="POST" action="{{ url('update-user') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $id_user }}" name="user_id" id="user_id">
            <div class="modal-body">
              <div class="row align-items-start">
                <div class="col mb-2">
                  <label for="foto" class="form-label font-weight-normal">Foto User</label>
                  <input name="foto" class="form-control form-control-sm" value="{{ $foto }}" type="file"
                    accept="image/*">
                </div>
                <div class="mb-2" id="foto"> </div>
              </div>
              <div class="row align-items-center">
                <div class="col mb-3">
                  <label for="namauser" class="form-label font-weight-normal">Nama User</label>
                  <input name="nama_usr" value="{{ $nama }}" class="form-control form-control-sm" type="text"
                    aria-label=".form-control-sm example @error('nama') is-invalid @enderror">
                </div>
                <div class="col mb-3">
                  <label for="id_level" class="form-label font-weight-normal">Sebagai</label>
                  <select name="id_level" id="nama_level" class="form-select" aria-label="Default select example">

                    <option value="1" {{ $level == '1' ? 'selected' : null }}>Super Admin</option>
                    <option value="2" {{ $level == '2' ? 'selected' : null }}>Admin</option>
                    <option value="3" {{ $level == '3' ? 'selected' : null }}>Kasir</option>
                    <option value="4" {{ $level == '4' ? 'selected' : null }}>Pengawas</option>
                  </select>
                </div>
              </div>
              <div class="row align-items-end">
                <div class="">
                  <label for="username" class="form-label font-weight-normal">Username</label>
                  <input required name="username" value="{{ $username }}" id="username"
                    class="form-control form-control-sm" type="text" aria-label=".form-control-sm example">
                </div>

              </div>
            </div>
            <div class="modal-footer" style="padding-top: 0;">
              <a href="{{ route('superadmin') }}"><button type="button"
                  class="btn btn-secondary btn-sm">Kembali</button></a>

              <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>

@include('SuperAdmin.script')

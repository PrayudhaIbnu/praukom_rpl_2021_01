  <!-- Modal Tambah User -->
  <div class="modal fade" id="tambahuser" tabindex="-1" aria-labelledby="tambahuserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ url('tambah-user') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row align-items-start">
              <div class="col mb-3">
                <label for="foto" class="form-label font-weight-normal">Foto User</label>
                <input name="foto" class="form-control form-control-sm" type="file" accept="image/*">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-3">
                <label for="namauser" class="form-label font-weight-normal">Nama User</label>
                <input required name="nama" class="form-control form-control-sm" type="text"
                  aria-label=".form-control-sm example">
              </div>
              <div class="col mb-3">
                <label for="id_level" class="form-label font-weight-normal">Sebagai</label>
                <select name="id_level" class="form-select" aria-label="Default select example">
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
                  aria-label=".form-control-sm example">
              </div>
              <div class="col mb-2">
                <label for="password" class="form-label font-weight-normal">Password</label>
                <input required name="password" class="form-control form-control-sm" type="password" autocomplete="on"
                  aria-label=".form-control-sm example">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Modal Tambah User -->

  <!-- Modal Edit User -->
  <div class="modal fade" id="edituser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('update-user') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="user_id" id="user_id">
          {{-- <input type="hidden" name="path_foto" id="path_foto"> --}}
          <div class="modal-body">
            <div class="row align-items-start">
              <div class="col mb-2">
                <label for="foto" class="form-label font-weight-normal">Foto User</label>
                <input name="foto" class="form-control form-control-sm" type="file" accept="image/*">
                {{-- <img src="{{ asset('storage/post-images/' . $user->foto) }} alt=""> --}}
              </div>
              <div class="mb-2" id="foto"> </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-3">
                <label for="namauser" class="form-label font-weight-normal">Nama User</label>
                <input required name="nama" id="nama" class="form-control form-control-sm" type="text"
                  aria-label=".form-control-sm example">
              </div>
              <div class="col mb-3">
                <label for="id_level" class="form-label font-weight-normal">Sebagai</label>
                <select name="id_level" id="nama_level" class="form-select" aria-label="Default select example">
                  @foreach ($level_user as $item)
                    <option value="{{ $item->id_level }}">{{ $item->nama_level }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row align-items-end">
              <div class="col mb-2">
                <label for="username" class="form-label font-weight-normal">Username</label>
                <input required name="username" id="username" class="form-control form-control-sm" type="text"
                  aria-label=".form-control-sm example">
              </div>
              <div class="col mb-2">
                <label for="password" class="form-label font-weight-normal">Password</label>
                <input required name="password" id="password" autocomplete="on"
                  class="form-control form-control-sm" type="password" aria-label=".form-control-sm example">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary btn-simpan">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Modal Edit User -->

  {{-- delete modal --}}
  <div class="modal fade" id="deleteuser" tabindex="-1" aria-labelledby="tambahuserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content text-center">
        <div class="modal-header flex-column">
          <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
          <h4 class="modal-title w-100">Apakah Anda yakin?</h4>
        </div>
        <div class="modal-body">
          <p>Apakah Anda benar-benar ingin menghapus? Anda tidak akan dapat mengembalikan ini! </p>
        </div>
        <form method="POST" action="{{ url('delete-user') }}" enctype="multipart/form-data">
          @csrf
          @method('DELETE')
          <input type="hidden" id="delete_id" name="delete_user_id">
          <div class="modal-footer ">
            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-danger ">Iya</button>
          </div>
      </div>
    </div>
  </div>
  {{-- end delete modal --}}

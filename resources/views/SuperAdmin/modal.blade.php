{{-- style css vibilisty password --}}
<style>
  #eye-tambah {
    position: absolute;
    transform: translateY(-25px);
    right: 10%;
  }
  #eye-edit {
    position: absolute;
    transform: translateY(-25px);
    right: 5%;
  }
</style>
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
                <input id="img_tambah"  name="foto" class="image form-control form-control-sm" type="file" accept="image/*" onchange="previewImgTambah()">
                <img  class="img-tambah img-fluid img-thumbnail mt-2" style="object-fit:cover;width:90px;height:90px;">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col mb-3">
                <label for="namauser" class="form-label font-weight-normal ">Nama User</label>
                <input placeholder="Hanya mengandung huruf" value="{{ old('nama') }}" name="nama" class="form-control form-control-sm @error('nama') is-invalid @enderror"
                  type="text"aria-label=".form-control-sm example">
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
                <input placeholder="Gunakan huruf kecil" value="{{ old('username') }}" name="username" class="form-control form-control-sm @error('username') is-invalid @enderror "
                  type="text" aria-label=".form-control-sm example">
              </div>
              <div class="col mb-2">
                <label for="password" class="form-label font-weight-normal">Password</label>
                <input id="password" placeholder="Minimal 8 karakter" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror"
                  type="password" autocomplete="on" aria-label=".form-control-sm example">
                  <i class="fa-regular fa-eye-slash" id="eye-tambah" onclick="toggleTambah()"></i>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
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
          <div class="modal-body">
            <div class="row align-items-start">
              <div class="col mb-2">
                <label for="img_edit" class="form-label font-weight-normal">Foto User</label>
                <input id="img_edit" name="foto_e" class="image form-control form-control-sm" type="file" accept="image/*" onchange="previewImgEdit()">
              </div>
              {{-- untuk img preview lewat js  --}}
              <div class="mb-2" id="foto"> </div>
              {{-- end img preview --}}
            </div>
            <div class="row align-items-center">
              <div class="col mb-3">
                  <label for="username" class="form-label font-weight-normal">Username</label>
                  <input placeholder="Gunakan huruf kecil" required name="username_e" id="username" class="form-control form-control-sm @error('username_e') is-invalid @enderror" type="text"
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
              <div class="col">
                <label for="nama" class="form-label font-weight-normal">Nama User</label>
                <input placeholder="Hanya mengandung huruf" name="nama_e" id="nama" class="form-control form-control-sm @error('nama_e') is-invalid @enderror" type="text"
                  aria-label=".form-control-sm example @error('nama') is-invalid @enderror">
                  @if ($errors->has('nama'))
                    <div class="invalid-feedback">{{ $errors->first('nama') }}</div>
                  @endif
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary btn-simpan">Perbarui</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Modal Edit User -->

  {{-- modal edit password --}}
  <div class="modal fade" id="editpassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="row">
            <h1 class="col-sm-5 modal-title fs-5" id="exampleModalLabel">Edit Password
            </h1>
            <div class="col-sm-5" style="margin-top: -4px; margin-left: -10px;">
              <input readonly class="modal-title form-control-plaintext" id="namaa" name="nama">
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('update-password') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="user_id" id="user">
          <div class="modal-body">
            <div class="row align-items-start">
              <div class="col">
                <label for="password_e" class="form-label font-weight-normal">Password Baru</label>
                <input placeholder="minimal 8 karakter"  name="password_e" autocomplete="on" class="form-control form-control-sm"
                  type="password" aria-label=".form-control-sm example" id="password_e">
                  <i class="fa-regular fa-eye-slash" id="eye-edit" onclick="toggleEdit()"></i>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary btn-simpan">Perbarui</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- end edit password --}}

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



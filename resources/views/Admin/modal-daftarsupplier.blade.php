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
                  type="tel" aria-label=".form-control-sm example">
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
        <form method="POST" action="{{ url('admin/update-supplier') }}" enctype="multipart/form-data">
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
                  type="tel" type="number" aria-label=".form-control-sm example">
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

  {{-- modal hapus --}}
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
        <form method="POST" action="{{ url('/admin/delete-supplier') }}" enctype="multipart/form-data">
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
{{-- akhir modal hapus --}}
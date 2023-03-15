    <!-- modal tambah -->
    <div class="modal fade" id="tambahproduk" tabindex="-1" aria-labelledby="tambahproduk" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title font-weight-bold" id="tambahproduk">Tambah Produk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{ route('tambah-produk') }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="row align-items-start">
                  <div class="col mb-3">
                    <label for="foto" class="form-label font-weight-normal">Foto produk</label>
                    <input name="foto"  class="form-control form-control-sm" type="file">
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col mb-3">
                    <label for="kode_produk" class="form-label font-weight-normal">Kode Produk (Barcode ID)</label>
                    <input  value="{{ old('kode_produk') }}" name="kode_produk"  class="form-control form-control-sm @error('kode_produk') is-invalid @enderror" type="number"
                      aria-label=".form-control-sm example">
                      @error('kode_produk')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror   
                  </div>
                  <div class="col mb-3">
                    <label for="id_kategori" class="form-label font-weight-normal">Kategori</label>
                    <select  name="id_kategori"  class="form-select"
                      aria-label="Default select example">
                      @foreach ($kategori as $k)
                        <option value="{{ $k->id_kategori }}">{{ $k->kategori_produk }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row align-items-end">
                  <div class="col mb-2">
                    <label for="nama_produk" class="form-label font-weight-normal">Nama Produk</label>
                    <input value="{{ old('nama_produk') }}" name="nama_produk"  class="form-control form-control-sm @error('nama_produk') is-invalid @enderror"
                      type="text" aria-label=".form-control-sm example">
                      @error('nama_produk')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror   
                  </div>
                  <div class="col mb-2">
                    <label for="satuan_produk" class="form-label font-weight-normal">Satuan Produk</label>
                    <input readonly value="pcs" name="satuan_produk"  class="form-control form-control-sm "
                      type="text" aria-label=".form-control-sm example">
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col mb-2">
                    <label for="harga_beli" class="form-label font-weight-normal">Harga Beli</label>
                    <input value="{{ old('harga_beli') }}" name="harga_beli"  class="form-control form-control-sm @error('harga_beli') is-invalid @enderror"
                      type="text" aria-label=".form-control-sm example">
                      @error('harga_beli')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror   
                  </div>
                  <div class="col mb-2">
                    <label for="harga_jual" class="form-label font-weight-normal">Harga Jual</label>
                    <input value="{{ old('harga_jual') }}" name="harga_jual"  class="form-control form-control-sm @error('harga_jual') is-invalid @enderror"
                      type="text" aria-label=".form-control-sm example">
                      @error('harga_jual')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror   
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
    
      <!-- Modal Edit Produk -->
      <div class="modal fade" id="editproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Produk</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/update-produk') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <input type="hidden" name="produk_id" id="produk_id">
              {{-- <input type="hidden" name="path_foto" id="path_foto"> --}}
              <div class="modal-body">
                <div class="row align-items-start">
                  <div class="col mb-2">
                    <label for="foto_produk" class="form-label font-weight-normal">Foto produk</label>
                    <input name="foto" id="foto_produk" class="form-control form-control-sm" type="file">
                  </div>
                  <div class="mb-2" id="foto"> </div>
                </div>
                <div class="row align-items-center">
                  <div class="col mb-3">
                    <label for="kode_produk" class="form-label font-weight-normal">Kode Produk (Barcode ID)</label>
                    <input readonly name="kode_produk" id="kode_produk" class="form-control form-control-sm"
                      type="number" aria-label=".form-control-sm example">
                  </div>
                  <div class="col mb-3">
                    <label for="id_kategori" class="form-label font-weight-normal">Kategori</label>
                    <select required name="id_kategori" id="id_kategori" class="form-select"
                      aria-label="Default select example">
                      @foreach ($kategori as $k)
                        <option value="{{ $k->id_kategori }}">{{ $k->kategori_produk }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row align-items-end">
                  <div class="col mb-2">
                    <label for="nama_produk" class="form-label font-weight-normal">Nama Produk</label>
                    <input required name="nama_produk" id="nama_produk" class="form-control form-control-sm"
                      type="text" aria-label=".form-control-sm example">
                  </div>
                  <div class="col mb-2">
                    <label for="satuan_produk" class="form-label font-weight-normal">Satuan Produk</label>
                    <input required name="satuan_produk" id="satuan_produk" class="form-control form-control-sm"
                      type="text" aria-label=".form-control-sm example">
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col mb-2">
                    <label for="harga_beli" class="form-label font-weight-normal">Harga Beli</label>
                    <input required name="harga_beli" id="harga_beli" class="form-control form-control-sm"
                      type="text" aria-label=".form-control-sm example">
                  </div>
                  <div class="col mb-2">
                    <label for="harga_jual" class="form-label font-weight-normal">Harga Jual</label>
                    <input required name="harga_jual" id="harga_jual" class="form-control form-control-sm"
                      type="text" aria-label=".form-control-sm example">
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
    
      {{-- delete modal --}}
      <div class="modal fade" id="deleteproduk" tabindex="-1" aria-labelledby="tambahuserLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content text-center">
            <div class="modal-header flex-column">
              <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
              <h4 class="modal-title w-100">Apakah Anda yakin?</h4>
            </div>
            <div class="modal-body">
              <p>Apakah Anda benar-benar ingin menghapus? Anda tidak akan dapat mengembalikan ini! </p>
            </div>
            <form method="POST" action="{{ url('delete-produk') }}" enctype="multipart/form-data">
              @csrf
              @method('DELETE')
              <input type="hidden" id="delete_id" name="delete_produk_id">
              <div class="modal-footer ">
                <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-danger ">Iya</button>
              </div>
          </div>
        </div>
      </div>
      {{-- end delete modal --}}
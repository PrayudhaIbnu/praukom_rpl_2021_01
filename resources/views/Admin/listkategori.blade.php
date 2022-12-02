<x-app-layout>
  <x-dashboard-admin /> 
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="card w-50 m-auto">
            <form method="POST" action="{{ url('tambah-kategori') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-2">
                            <label for="harga_jual" class="form-label font-weight-normal">Harga Jual</label>
                            <input required name="harga_jual" id="harga_jual" class="form-control form-control-sm" type="text"
                            aria-label=".form-control-sm example">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-3 btn-sm pl-3 pr-3" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary rounded-3 btn-sm pl-3 pr-3">Simpan</button>
                </div>
            </form>
        </div>
        <br>
        <div class="card w-50 m-auto">
          <table class="table">
            <thead class="table-warning">
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
        </div> 
      </div>
    </div>
</div>

</x-app-layout>


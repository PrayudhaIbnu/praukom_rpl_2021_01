<x-app-layout>
    <x-dashboard-pengawas />
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0">Log Kelola Akun</h1>
            </div>
            <!-- /.col -->
            <div class="row col-sm-6">
              <div class="input-group">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                  <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                  </button>
               </div>
             </div>
            </div>
          </div>
          <div class="container-fluid-6">
            <div class="table-responsive-xl">
              <table class="table mt-4 table-borderless ">
                <thead class="table-warning">
                  <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>17-11-2022</th>
                    <td>tambah</td>
                    <td>Super Admin menambahkan akun user</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </x-app-layout>
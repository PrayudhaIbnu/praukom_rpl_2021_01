<x-app-layout>
    <x-dashboard-pengawas />
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0">History Penjualan</h1>
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
                    <th scope="col">No</th>
                    <th scope="col">Faktur</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Grand Total</th>
                    <th scope="col">Tunai</th>
                    <th scope="col">Kembalian</th>
                    <th scope="col">Detail</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>1</th>
                    <td>fk200221711</td>
                    <td>17-11-2022</td>
                    <td>10.30</td>
                    <td>47000</td>
                    <td>50000</td>
                    <td>3000</td>
                    <td>
                        <button class="btn btn-detail btn-warning"><i class="fa-solid fa-info"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </x-app-layout>
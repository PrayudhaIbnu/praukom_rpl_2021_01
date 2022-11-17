<x-app-layout>
    <x-dashboard-pengawas />
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0">Laporan</h1>
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
            <div class="float-start">
                <ul class="nav nav-pills my-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link btn-sm border active mr-2   " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Harian</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link btn-sm border mr-2 bg-white"  id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Mingguan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link btn-sm border mr-2 bg-white" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Bulanan</button>
                    </li>
                  </ul>
                  {{-- <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
                  </div> --}}
            </div>

            <div class="float-end">
              <button class="btn btn-warning mt-4 btn-sm">Download <i class="fas fa-cloud-download"></i></button>
            </div>
            <div class="table-responsive-xl">
              <table class="table mt-4 table-borderless ">
                <thead class="table-warning">
                  <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Laba Kotor</th>
                    <th scope="col">Laba Bersih</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Minuman Saya</td>
                    <td>Rp.200</td>
                    <td>2</td>
                    <td>
                        
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
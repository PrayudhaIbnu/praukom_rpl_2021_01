<x-app-layout>
    <x-dashboard-admin />
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
                <ul class="nav nav-pills my-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link btn-sm border active mr-2   " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Barang Masuk</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link btn-sm border mr-2 "  id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Barang Keluar</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">brg masuk</div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                      <div class="table-responsive-lg">
                        <table class="table mt-4 table-borderless ">
                          <thead class="table-warning">
                            
                            <tr>                
                              <th scope="col">No</th>
                              <th scope="col">Nama Produk</th>
                              <th scope="col">Jumlah Keluar</th>
                              <th scope="col">Tanggal Keluar</th>
                              <th scope="col">Keterangan</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($brg_keluar as $item)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->nama_produk }}</td>
                              <td>{{ $item->qty }}</td>
                              <td>{{ $item->tanggal_keluar }}</td>
                              <td>{{ $item->keterangan }}</td>
                            </tr>
                            @endforeach
                          </tbody>       
                        </table>
                        <div>
                          {{ $brg_keluar->withQueryString()->links() }}
                        </div>
                      </div>
                    </div>
                  </div>
            

           
          </div>
        </div>
      </div>
    </div>
    
  </x-app-layout>
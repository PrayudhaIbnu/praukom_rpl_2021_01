<x-app-layout>
  <x-dashboard-admin /> 
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Supplier</h1>
          </div>
        </div>
        <div class="container-fluid">
          <div class="card mt-5 w-50">
            <div class="container">
              <div class="col">
                <div class="row mt-3">              
                  <div class="col-3">
                    <td><h6 class="mb-0 text-secondary">Nama supplier</h6></td>
                    <th><h6 class="fw-bold mt-0">{{ $detailSupplier->nama_supplier }}</h6></th>
                  </div>  
                </div>
                <div class="row mt-3">
                  <div class="col-3">
                    <td><h6 class="mb-0 text-secondary">No. Telepon</h6></td>
                    <th><h6 class="fw-bold mt-0">{{ $detailSupplier->telp_supplier }}</h6></th>
                  </div>
                  <div class="col-3">
                    <td><h6 class="mb-0 text-secondary">Alamat</h6></td>
                    <th><h6 class="fw-bold mt-0">{{ $detailSupplier->alamat_supplier }}</h6></th>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card w-25 float-end" style="margin: 0 0 10 0">
                <img src="https://img.icons8.com/ios-filled/300/null/noodles.png" class="img-fluid rounded-start" alt="...">
            </div>
          </div>              
        </div>
</x-app-layout>

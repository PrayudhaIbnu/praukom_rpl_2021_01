{{-- x-app-layout buat struktur html --}}
<x-app-layout>
  {{-- x-dashboard buat struktur dashboard --}}
  <x-dashboard-cashier />
  {{-- CONTENT --}}
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Transaksi</h1>
            </div>
          </div>
          <div class="row gx-3 ">
            <div class="col-3 flex">
              <!-- Main content --> 
              <div class="card" style="width: 100%; height: 165px;">
                <div class="card-body" style="vertical-align: middle; margin-top: 20px;">

                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Tanggal</label>
                    <div class="col-sm-7">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ date('d-m-Y') }}">
                    </div>
                    <label for="staticEmail" class="col-sm-5 col-form-label">Kasir</label>
                    <div class="col-sm-7">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Vera Uhuyyy">
                    </div>
                  </div>        
                </div>
              </div>
              {{-- akhir card --}}
            </div>
            <div class="col-5">
              <!-- Main content --> 
              <div class="card" style="width: 100%; height: 165px;">
                <div class="card-body">
                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Produk</label>
                    <div class="col-sm-9 mb-2">
                      <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                    <label for="inputPassword" class="col-sm-3 col-form-label">Qty</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="inputPassword">
                    </div>
                    
                  </div>        
                  <button class="btn btn-primary btn-sm  float-end">Simpan</button>
                </div>
              </div>
              {{-- akhir card --}}
            </div>
            <div class="col">
              <!-- Main content --> 
              <div class="card" style="width: 100%; height: 165px;">
                <div class="card-body">
                  <h2 class="h3" style="font-weight: 500; color: #a2a2a2">Grand Total</h2>
                  <p class="float-end" style="font-size: 60px; font-weight: 600;">5000</p>
                </div>
              </div>
              {{-- akhir card --}}
            </div>
          </div>
          {{-- Akhir Card Grid --}}
          <div class="card" style="width: 100%; height: 210px; overflow-y: scroll;">
            <table class="table table-borderless " >
              <thead class="table-warning sticky-top">
                <tr>
                  <th scope="col"style="width: 80px">No</th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col" style="width: 180px">Harga Satuan</th>
                  <th scope="col" style="width: 100px">Qty</th>
                  <th scope="col" style="width: 180px">Harga Total</th>
                  <th scope="col" style="width: 150px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                
              </tbody>
            </table>
          </div>
            {{-- akhir table   --}}
            <div class="row gx-3 ">
              <div class="col-3 flex">
                <!-- Main content --> 
                <div class="card" style="width: 100%; height: 120px;">
                  <div class="card-body" >
  
                    <div class=" row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">Tanggal</label>
                      <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ date('d-m-Y') }}">
                      </div>
                      <label for="staticEmail" class="col-sm-5 col-form-label">Kasir</label>
                      <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Vera Uhuyyy">
                      </div>
                    </div>        
                  </div>
                </div>
                {{-- akhir card --}}
              </div>
              <div class="col-5">
                <!-- Main content --> 
                <div class="card" style="width: 100%; height: 120px;">
                  <div class="card-body">
                    <div class="row">
                      
                    </div>        
                    
                  </div>
                </div>
                {{-- akhir card --}}
              </div>
              <div class="col">
                <!-- Main content --> 
                <div class="card" style="width: 100%; height: 120px;">
                  <div class="card-body">
                    <h2 class="h3" style="font-weight: 500; color: #a2a2a2">Grand Total</h2>
                    <p class="float-end" style=" font-weight: 600;">5000</p>
                  </div>
                </div>
                {{-- akhir card --}}
              </div>
            </div>
        </div>
      </div>
  </div>  
</x-app-layout>

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

            <ul class="nav nav-pills mt-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active btn-sm" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Harian</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link btn-sm" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Mingguan</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link btn-sm" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Bulanan</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link btn-sm" id="pills-kerugian-tab" data-bs-toggle="pill" data-bs-target="#pills-kerugian" type="button" role="tab" aria-controls="pills-kerugian" aria-selected="false" >Kerugian</button>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                @include('Pengawas.laporanharian')
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">Mingguan</div>
              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">Bulanan</div>
              <div class="tab-pane fade" id="pills-kerugian" role="tabpanel" aria-labelledby="pills-kerugian-tab" tabindex="0">Kerugian</div>
            </div>

  
          </div>
        </div>
      </div>
    </div>
    
  </x-app-layout>
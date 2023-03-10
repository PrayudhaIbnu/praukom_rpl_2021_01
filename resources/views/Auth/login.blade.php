<!-- Section: Design Block -->
<x-app-layout>
  <style>
    #eye {
      position: absolute;
      transform: translateY(-32px);
      right: 15%;
    }
  </style>
  {{-- tilte --}}
  @section('title')
      Login
  @endsection
  {{-- end title --}}
  <section class="vh-100" style="background-color: #f2f2f2  ;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="/img/kranjang.jpg" alt="login form" class="img-fluid h-100"
                  style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">   
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <img src="/img/logoblud.png" alt="Logo BLUD" class="img">
                    </div>
                    <h2 class="text-center fst-italic"><span class="font-weight-bold text-yellow">One</span><span
                        class="font-weight-bold text-orange">Mart</span></h2>
                    <h6 class="fw-normal mb-3 pb-1" style="letter-spacing: 1px; color: orange; text-align:center;">
                      Aplikasi Manajemen Waserba SMKN 1 Kota Bekasi</h6>
                    <form method="POST" action="{{ url('/auth') }}">  
                    @csrf
                    <div class="form-outline mb-4">
                      <input autocomplete="off" autofocus type="text" id="username" name="username"
                        class="form-control form-control-lg  border-warning form-control-sm
                          @error('username')
                            is-invalid
                          @enderror
                          " placeholder="Username" style="border-radius:10px;" value="{{ old('username') }}" />
                        @error('username')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror   
                    </div>
                    
                    <div class="form-outline mb-4">
                      <input type="password" id="password" name="password"
                        class="form-control form-control-lg border-warning form-control-sm
                          @error('password')
                            is-invalid
                          @enderror
                          " placeholder="Password" style="border-radius:10px; " />
                            <i class="fa-regular fa-eye-slash" id="eye" onclick="toggle()"></i>
                        @error('password')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                   
                    <div class="pt-1 mb-4">
                      <button class="btn btn-lg btn-block bg-orange text-white" type="submit"
                        style="border-radius:50px;">
                        <h5 class="text-white">Masuk</h5>
                      </button>
                    </div>
                  </form>
                    <footer>
                      <h5 class="small text-muted fw-bolder text-center"><i class="fa-regular fa-copyright"></i> 2022
                        One Mart</h5>
                    </footer>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>

<script>
  let state = false;
  function toggle(){
    if (state) {
      document.getElementById("password").setAttribute("type","password");
      document.getElementById("eye").className = "fa-regular fa-eye-slash";
      state = false;
        
    } else {
      document.getElementById("password").setAttribute("type","text");
      document.getElementById("eye").className = "fa-regular fa-eye";
      state = true;
    }
  }
</script>

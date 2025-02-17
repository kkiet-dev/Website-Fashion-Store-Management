<div class="fixed-plugin">
    {{-- <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a> --}}
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">SHOP KT MANAGER</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <div class="card-header pb-0 pt-3 bg-secondary rounded-2">
        <form action="{{ route('logout') }}" method="POST">
          <div class="float-start">
            <h5 class="mt-3 mb-0">Logout</h5>
          </div>
          <div class="float-end mt-2">
            @csrf
            <button type="submit" name="logout" id="logout" class="btn bg-dark" required>
              <img class="p-1" src="{{ asset('assets/img/icons/flags/logout.png') }}" alt="User Icon" style="width:32px">
            </button>
          </div>
      </form>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        {{-- <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a> --}}
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">GO TO SHOP KT</h6>
          {{-- <p class="text-sm">Choose between 2 different sidenav types.</p> --}}
        </div>
        <div class="d-flex">
          <a href="{{ route('home.users')}}">
            <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white">Go to shops</button>
          </a>
        </div>
     
      </div>
    </div>
</div>
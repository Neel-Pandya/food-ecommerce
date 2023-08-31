<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
   
    <div class="search-field d-none d-md-block">
      <form class="d-flex align-items-center h-100" action="#">
        <div class="input-group">
          <div class="input-group-prepend bg-transparent">
            <i class="input-group-text border-0 mdi mdi-magnify"></i>
          </div>
          <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
        </div>
      </form>
    </div>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link " id="profileDropdown" href="" >
          <div class="nav-profile-img">
            <img src="{{ URL::to('/') }}/assets/images/faces/face1.jpg" alt="image">
            
          </div>
          <div class="nav-profile-text">
            <p class="mb-1 text-black">Neel pandya</p>
          </div>
        </a>
       
      </li>
      
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
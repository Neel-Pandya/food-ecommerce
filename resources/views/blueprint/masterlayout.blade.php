<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ URL::to('/') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{ URL::to('/') }}/assets/vendors/css/vendor.bundle.base.css">


  @stack('css')
  
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ URL::to('/') }}/assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ URL::to('/') }}/assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    @include('partials.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('partials.sidebar')
      <!-- partial -->
      @yield('content')
      
      <!-- main-panel ends -->
    </div>
    
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ URL::to('/') }}/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ URL::to('/') }}/assets/vendors/chart.js/Chart.min.js"></script>
  <script src="{{ URL::to('/') }}/assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ URL::to('/') }}/assets/js/off-canvas.js"></script>
  <script src="{{ URL::to('/') }}/assets/js/hoverable-collapse.js"></script>
  <script src="{{ URL::to('/') }}/assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="{{ URL::to('/') }}/assets/js/dashboard.js"></script>
  <script src="{{ URL::to('/') }}/assets/js/todolist.js"></script>
  <script src="{{ asset('assets/js/toastr.min.js') }}"></script>


  {{-- @stack('scripts') --}}
  <!-- End custom js for this page -->

</body>

</html>
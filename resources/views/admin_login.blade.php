<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin login</title>
    <!-- plugins:css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ URL::to('/') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/assets/vendors/css/vendor.bundle.base.css">


    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ URL::to('/') }}/assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->

        <!-- partial -->
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
            @if (session()->has('Error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
                    <strong>{{ session('Error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(() => {
                        $('.alert').alert('close');
                    }, 5000);
                </script>

                @endif


                <div class="content-wrapper d-flex align-items-center auth">
                    <div class="row flex-grow">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light  text-left p-5">
                                <h4 class="login text-center text-primary">Admin login</h6>
                                    <form class="pt-3" action="{{ route('admin.login.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-lg" id=""
                                                placeholder="Email" name="Email">
                                            <span class="text-danger">
                                                @error('Email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg"
                                                id="exampleInputPassword1" placeholder="Password" name="Password">
                                            <span class="text-danger">
                                                @error('Password')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <center>
                                            <div class="mt-3">
                                                <input type="submit"
                                                    class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn rounded-pill"
                                                    value="Sign in">

                                            </div>
                                        </center>

                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
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


    {{-- @stack('scripts') --}}
    <!-- End custom js for this page -->

</body>

</html>
